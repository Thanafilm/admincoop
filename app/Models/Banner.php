<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Banner extends Model
{
    use HasFactory,LogsActivity;
    protected static $logAttributes = ['image','path'];
    protected $guarded;
    protected $fillable = [
        'image'
    ];
    public $table = 'banner';
    public function image()
    {
        return $this->hasMany(Banner::class);
    }
}
