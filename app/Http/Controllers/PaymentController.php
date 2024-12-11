<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Member;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Display a listing of the payments
    public function index()
    {
        $payments = Payment::with('member')->get(); // Eager load the member relation
        return view('payments.index', compact('payments'));
    }

    // Show the form for creating a new payment
    public function create()
    {
        $members = Member::all(); // Get all members
        return view('payments.create', compact('members'));
    }

    // Store a newly created payment in storage
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'member_id' => 'required|exists:members,id', // Ensure the member exists
            'amount' => 'required|numeric', // Ensure the amount is numeric
            'payment_date' => 'required|date', // Ensure a valid date is provided
            'status' => 'required|in:paid,pending,canceled', // Validate the payment status
        ]);

        // Create the payment
        Payment::create([
            'member_id' => $request->member_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'status' => $request->status, // Add the status field
        ]);

        // Redirect back with success message
        return redirect()->route('payments.index')->with('success', 'Payment added successfully.');
    }

    // Show the form for editing the specified payment
    public function edit($id)
{
    // Fetch the payment record
    $payment = Payment::findOrFail($id);

    // Debug the payment_date to check its value and type
    // dd($payment->payment_date);

    // If everything looks good, fetch members and pass to the view
    $members = Member::all();  // Fetch all members
    return view('payments.edit', compact('payment', 'members'));
}

    // Update the specified payment in storage
    public function update(Request $request, $id)
{
    // Validate the input
    $request->validate([
        'member_id' => 'required|exists:members,id',
        'amount' => 'required|numeric',
        'payment_date' => 'required|date',
        'status' => 'required|in:pending,paid',
    ]);

    // Find the payment record
    $payment = Payment::findOrFail($id);

    // Update the payment record
    $payment->update([
        'member_id' => $request->member_id,
        'amount' => $request->amount,
        'payment_date' => $request->payment_date,
        'status' => $request->status,
    ]);

    // Redirect with a success message
    return redirect()->route('payments.index')->with('success', 'Payment updated successfully!');
}

    // Remove the specified payment from storage
    public function destroy(Payment $payment)
    {
        // Delete the payment
        $payment->delete();

        // Redirect back with success message
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
