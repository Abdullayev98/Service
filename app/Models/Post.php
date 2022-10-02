<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'cover'
    ];
    public function Image(){
        return $this->hasMany(Image::class);
    }
}
