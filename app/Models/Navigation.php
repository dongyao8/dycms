<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(NavigationCategory::class,'navigation_category_id');
    }
}
