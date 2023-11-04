<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookingID',
        'message',
        'rating',
    ];
    
    public function bookings()
    {
        return $this->belongsTo(Booking::class, 'bookingID');
    }

}
