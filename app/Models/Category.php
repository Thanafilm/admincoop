<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasFactory,LogsActivity;
    protected $guarded;
    protected $fillable = [
        'name',
        'desc'
    ];
    protected $table = 'category';
    public function category()
    {
        return $this->hasMany(Category::class);
    }
    public function subcategory()
    {
        return $this->hasMany(Subcategory::class);
    }
}
