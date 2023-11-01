<?php

namespace App\Models;
use App\Models\PhotoshootType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'typeID',
        'album_name',
    ];

    public function photoshootType()
    {
        return $this->belongsTo(PhotoshootType::class, 'typeID');
    }

    public function images()
    {
        return $this->hasMany(Gallery::class, 'albumID');
    }
}
