<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Filedoc extends Model
{
    use HasFactory,LogsActivity;
    protected static $logAttributes = ['category_id','subcate_id','filename','filepath'];
    protected $guarded;
    public $table = 'filedoc';
    protected $fillable = [
        'filename',
        'filepath',
        'category_id',
        'subcate_id'
    ];
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
