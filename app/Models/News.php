<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class News extends Model
{
    use HasFactory;
    protected $guarded;
    protected $fillable = [
        'topic',
        'image',
        'description'
    ];
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
    use Sortable;
    public $sortable = ['id','topic','view','created_at','updated_at'];
}
