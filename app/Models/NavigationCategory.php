<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationCategory extends Model
{
    use HasFactory;


    public function navigation(){
        return $this->hasMany(Navigation::class);
    }
}
