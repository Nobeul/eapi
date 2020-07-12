<?php

namespace App\Model;

use App\Model\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public function reviews(){
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}
