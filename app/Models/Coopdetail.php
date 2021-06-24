<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coopdetail extends Model
{
    use HasFactory;
    protected $guarded;
    protected $fillable = [
        'detail'
    ];
    protected $table = 'coopdetail';
}
