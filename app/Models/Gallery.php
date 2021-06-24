<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    use HasFactory;
    protected $guarded;
    protected $fillable = [
        'galleryname',
        'coverimg'
    ];
    protected $table = 'gallery';
    public function news()
    {
        return $this->belongsTo(News::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }


}
