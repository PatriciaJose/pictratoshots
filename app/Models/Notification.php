<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'clientID',
        'bookingID',
        'ratingFormID',
        'weatherID',
        'notification_type',
        'status',
        'read_at',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function client()
    {
        return $this->belongsTo(User::class, 'clientID');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookingID');
    }

    public function ratingForm()
    {
        return $this->belongsTo(RatingForm::class, 'ratingFormID');
    }

    public function weather()
    {
        return $this->belongsTo(Weather::class, 'weatherID');
    }
}
