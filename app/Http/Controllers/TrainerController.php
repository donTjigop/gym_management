<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all(); // Get all trainers from the database
        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {
        // Validate the request input
        $request->validate([
            'name' => 'required',
            'specialty' => 'required',
        ]);

        // Create the trainer record
        Trainer::create($request->all());
        
        return redirect()->route('trainers.index');
    }

    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        // Validate the request input
        $request->validate([
            'name' => 'required',
            'specialty' => 'required',
        ]);

        // Update the trainer record
        $trainer->update($request->all());

        return redirect()->route('trainers.index');
    }

    public function destroy(Trainer $trainer)
    {
        // Delete the trainer record
        $trainer->delete();
        
        return redirect()->route('trainers.index');
    }
}

