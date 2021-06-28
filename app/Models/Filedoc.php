<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filedoc extends Model
{
    use HasFactory;
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
