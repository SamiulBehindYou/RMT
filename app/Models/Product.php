<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function rel_to_brand(){
        return $this->belongsTo(Brand::class, 'brand');
    }
    function rel_to_subcategory(){
        return $this->belongsTo(SubCategory::class, 'subcategory');
    }


}
