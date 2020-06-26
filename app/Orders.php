<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    protected $fillable = ['products_id','customers_id','qty','status'];

    /**
     * Get the phone record associated with the product.
     */
    public function products()
    {
        return $this->belongsTo(Products::class);
    }

}
