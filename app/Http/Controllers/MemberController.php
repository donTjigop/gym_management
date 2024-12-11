<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member; // Ensure you have a Member model

class MemberController extends Controller
{
    /**
     * Display a listing of the members.
     */
    public function index()
    {
        $members = Member::paginate(10); // Adjust the number of items per page as needed
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new member.
     */
    public function create()
    {
        return view('members.create'); // Return the create member form
    }

    /**
     * Store a newly created member in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:members',
        'phone' => 'required|string|max:15',
        'address' => 'required|string',
        'membership_type' => 'required|string', // Validate membership type
        'status' => 'required|string',
    ]);

    Member::create($validated); // Save all fields, including membership_type

    return redirect()->route('members.index')->with('success', 'Member added successfully!');
}

    /**
     * Display the specified member.
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id); // Find the member by ID
        return view('members.edit', compact('member')); // Pass member to the view
    }
    /**
     * Update the specified member in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $id, // Ensure unique email
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'membership_type' => 'required|string',
            'status' => 'required|string',
        ]);

        // Find the member and update its details
        $member = Member::findOrFail($id);
        $member->update($validated);

        // Redirect back to the members list with a success message
        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

    /**
     * Remove the specified member from storage.
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id); // Fetch the member by ID
        $member->delete(); // Delete the member

        // Redirect back with a success message
        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }
}
