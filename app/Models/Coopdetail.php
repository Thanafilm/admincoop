<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Coopdetail extends Model
{
    use HasFactory,LogsActivity;
    protected $guarded;
    protected $fillable = [
        'detail'
    ];
    protected $table = 'coopdetail';
}
