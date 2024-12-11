<?php

// app/Models/Report.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    protected $table = 'reports';

    // Define the fillable properties (columns that can be mass-assigned)
    protected $fillable = [
        'member_id',
        'report_date',  // Make sure the column exists in your table
        'status',
        // Add any other columns that are relevant to your report
    ];

    // Define the relationship to the Member model (assuming a member can have many reports)
    // app/Models/Report.php

public function member()
{
    return $this->belongsTo(Member::class);
}

}

