<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    // Define the table name if it's not automatically determined
    protected $table = 'schedules';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'trainer_id', // This is the foreign key for the trainer
        'day',         // Day of the week (e.g., Monday, Tuesday)
        'time',        // The time of the session (e.g., 10:00 AM)
    ];

    // Define the relationship with the Trainer model
    public function trainer()
    {
        return $this->belongsTo(Trainer::class); // A schedule belongs to a trainer
    }
}
