<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'amount', 'payment_date','status'];

    // Cast the payment_date to Carbon instance
    protected $casts = [
        'payment_date' => 'datetime',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
};