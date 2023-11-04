<?php

namespace App\Models;
use App\Models\PhotoshootType;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'albumID',
        'image_path',
    ];

    public function photoshootType()
    {
        return $this->belongsTo(PhotoshootType::class, 'typeID');
    }
    public function album()
    {
        return $this->belongsTo(Album::class, 'albumID');
    }
}
