<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = [
        'donation_id',
        'snap_token',
        'amount',
        'status',
    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
