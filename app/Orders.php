<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = "orders";
    protected $fillable = ['products_id','customers_id','qty','status'];

    /**
     * Get the phone record associated with the product.
     */
    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    /**
     * Get the phone record associated with the product.
     */
    public function customers()
    {
        return $this->belongsTo(Customers::class);
    }

}
