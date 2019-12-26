<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    public function navigation_category()
    {
        return $this->belongsTo('App\Model\NavigationCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
