<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookingID',
        'weather_description',
        'temperature',
    ];
    
    public function bookings()
    {
        return $this->belongsTo(Booking::class, 'bookingID');
    }

}
