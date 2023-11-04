<?php

namespace App\Models;
use App\Models\Package;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'packageID',
        'clientID',
        'session_date',
        'location',
        'session_time',
        'status',
    ];
    
    

    public function package()
    {
        return $this->belongsTo(Package::class, 'packageID');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'clientID');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'feedbackID');
    }
}
