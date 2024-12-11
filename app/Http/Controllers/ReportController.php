<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Member;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Display the list of generated reports with filters
    public function index(Request $request)
    {
        // Fetch members
        $members = Member::all();  // Adjust this according to your model's name
    
        // Fetch the report data based on any filters you want
        $query = Report::query();
    
        if ($request->start_date) {
            $query->where('report_date', '>=', $request->start_date);
        }
    
        if ($request->end_date) {
            $query->where('report_date', '<=', $request->end_date);
        }
    
        if ($request->status) {
            $query->where('status', $request->status);
        }
    
        if ($request->member_id) {
            $query->where('member_id', $request->member_id);
        }
    
        $reportData = $query->get();
    
        return view('reports.index', compact('members', 'reportData'));
    }
    

    // Show the report generation form
    public function showReportForm()
    {
        // Fetch all members for the form dropdown
        $members = Member::all();

        return view('reports.create', compact('members'));
    }

    // Generate the report based on the form filters
    public function generateReport(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'nullable|in:pending,paid', // Only 'pending' and 'paid' are valid
            'member_id' => 'nullable|exists:members,id',
        ]);

        // Build the query for the report based on the filters
        $query = Report::with('member') // Load the member relationship
                        ->whereBetween('report_date', [$request->start_date, $request->end_date]);

        // Apply the filters for status and member
        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->member_id) {
            $query->where('member_id', $request->member_id);
        }

        // Get the results of the query
        $reportData = $query->get();

        // Fetch all members for the filter dropdown
        $members = Member::all();

        // Return the results to the view along with the members
        return view('reports.index', compact('reportData', 'members'));
    }
}
