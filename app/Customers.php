<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = "customers";
    protected $fillable = ['id','phone','fullname','address'];

    public function orders()
    {
        return $this->hasOne(Orders::class);
    }
}
