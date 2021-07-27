<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Company extends Model
{
    use HasFactory,LogsActivity;
    protected static $logAttributes = ['corpname','suppbranch','corpdetail','year'];
    public $table = 'company';
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
