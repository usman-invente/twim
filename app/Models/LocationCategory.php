<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LocationCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name','name_ar','description_ar','description', 'is_featured', 'status' , 'color'
    ];
}
