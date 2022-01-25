<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'status', 'total_price', 'shipping_address', 'zip_code'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
}