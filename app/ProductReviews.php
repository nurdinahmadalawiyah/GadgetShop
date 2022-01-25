<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    protected $fillable = [
        'user_id', 'description', 'rating', 'product_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
