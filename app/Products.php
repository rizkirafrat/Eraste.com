<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = "products";

    protected $fillable = ['code_product','img_url','name','price','stock'];

    public function orders()
    {
        return $this->hasOne(Orders::class);
    }
}
