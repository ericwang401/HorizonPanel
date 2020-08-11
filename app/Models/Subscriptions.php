<?php

namespace HorizonPanel\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    // Fetch the package from the subscription to get more information
    public function package()
    {
        return $this->belongsTo(Packages::class);
    }
}
