<?php

namespace HorizonPanel\Models;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    // Fetch the corresponding category for a package (NOT A SUBSCRIPTION)
    public function category()
    {
        return $this->belongsTo(PackageCategory::class);
    }
}
