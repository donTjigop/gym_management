<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Trainer;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // Display a list of schedules with associated trainer information
    public function index()
    {
        // Retrieve all schedules with their associated trainer's name
        $schedules = Schedule::with('trainer')->get();
        return view('schedules.index', compact('schedules'));
    }

    // Show the form for creating a new schedule
    public function create()
    {
        // Get all trainers to display in the dropdown
        $trainers = Trainer::all();
        return view('schedules.create', compact('trainers'));
    }

    // Store a newly created schedule
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'trainer_id' => 'required|exists:trainers,id', // Ensure the trainer exists
            'day' => 'required|string', // Ensure the day is a string
            'time' => 'required|date_format:H:i', // Ensure the time is in HH:MM format
        ]);

        // Create the schedule record
        Schedule::create($request->all());

        // Redirect back to the schedules index with success message
        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully!');
    }

    // Show the form for editing a specific schedule
    public function edit(Schedule $schedule)
    {
        // Get all trainers to display in the dropdown
        $trainers = Trainer::all();
        return view('schedules.edit', compact('schedule', 'trainers'));
    }

    // Update the specified schedule
    public function update(Request $request, Schedule $schedule)
    {
        // Validate the incoming data
        $request->validate([
            'trainer_id' => 'required|exists:trainers,id', // Ensure the trainer exists
            'day' => 'required|string', // Ensure the day is a string
            'time' => 'required|date_format:H:i', // Ensure the time is in HH:MM format
        ]);

        // Update the schedule record
        $schedule->update($request->all());

        // Redirect back to the schedules index with success message
        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully!');
    }

    // Remove the specified schedule
    public function destroy(Schedule $schedule)
    {
        // Delete the schedule
        $schedule->delete();

        // Redirect back to the schedules index with success message
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully!');
    }
}
