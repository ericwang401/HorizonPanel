<?php

namespace HorizonPanel\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    public function packages()
    {
        return $this->hasMany(Packages::class, 'category_id');
    }
}
