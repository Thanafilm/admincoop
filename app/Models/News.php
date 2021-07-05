<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class News extends Model
{
    use HasFactory,LogsActivity;
    protected $guarded;
    protected $fillable = [
        'topic',
        'image',
        'description'
    ];
    protected static $logAttributes = ['topic','image','description','user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function gallery()
    {
        return $this->hasOne(Gallery::class);
    }
    public function getgall($id)
    {
        $news = News::find($id)->gallery();
    }

}
