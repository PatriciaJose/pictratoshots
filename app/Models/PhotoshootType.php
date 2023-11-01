<?php

namespace App\Models;
use App\Models\Package;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoshootType extends Model
{
    use HasFactory;
    protected $fillable = ['type_name', 'type_desc'];

    public function packages()
    {
        return $this->hasMany(Package::class, 'typeID');
    }
    public function albums()
    {
        return $this->hasMany(Album::class, 'typeID');
    }
}
