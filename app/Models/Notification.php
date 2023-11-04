<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'clientID',
        'message',
        'read',
    ];

    public function clients()
    {
        return $this->belongsTo(User::class, 'clientID');
    }
}
