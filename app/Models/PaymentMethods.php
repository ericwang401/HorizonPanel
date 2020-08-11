<?php

namespace HorizonPanel\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    /**
     * The attributes that are mass assignable. (See: https://laravel.com/docs/7.x/eloquent#mass-assignment)
     *
     * @var array
     */
    protected $fillable = ['name'];
}
