<?php

namespace App\Model;

use App\Model\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name', 'detail', 'stock', 'price', 'discount'
    ];
    public function reviews(){
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}
