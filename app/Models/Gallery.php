<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Gallery extends Model
{

    use HasFactory,LogsActivity;
    protected $guarded;
    protected $fillable = [
        'galleryname',
        'news_id'
    ];
    protected static $logAttributes = ['galleryname', 'news_id'];
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
