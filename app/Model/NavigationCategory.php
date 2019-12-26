<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NavigationCategory extends Model
{
    public function navigation()
    {
        return $this->hasMany('App\Model\Navigation');
    }
}
