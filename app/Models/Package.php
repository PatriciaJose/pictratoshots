<?php

namespace App\Models;
use App\Models\PhotoshootType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_name',
        'typeID',
        'package_desc',
        'price',
        'inclusions',
    ];

    public function photoshootType()
    {
        return $this->belongsTo(PhotoshootType::class, 'typeID');
    }

}
