<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'name',
        'specialty',
    ];

    // Define the relationship between the Trainer and the Schedule model
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
