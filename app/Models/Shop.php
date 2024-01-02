<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Shop extends Model implements  HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia;
    protected $table = "shops";
    protected $fillable = [
        'title','category_id','image'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(ShopCategory::class,'category_id','id');
    }
}
