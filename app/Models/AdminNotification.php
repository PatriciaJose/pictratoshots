<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookingID',
        'feedbackID',
        'notification_type',
        'status',
        'read_at',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookingID');
    }

    public function feedback()
    {
        return $this->belongsTo(Feedback::class, 'feedbackID');
    }
}
