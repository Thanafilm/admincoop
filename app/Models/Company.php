<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded;
    public $table = 'company';
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
