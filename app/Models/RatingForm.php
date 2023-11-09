<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookingID',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookingID');
    }
}
