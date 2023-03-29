<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationCategory extends Model
{
    use HasFactory;

    public function navigation()
    {
        return $this->hasMany(Navigation::class)->orderBy('sort','desc');
    }

    public function children()
    {
        return $this->hasMany(NavigationCategory::class, 'parent_id', 'id')->withCount('navigation');
    }

    public function recursiveChildren()
    {
        $children = $this->children;

        if ($children->isEmpty()) {
            return null;
        }
        
        foreach ($children as $child) {
            $child->children = $child->recursiveChildren();
            $child->label = $child->title;
            $child->value = $child->id;
            
        }
       
        return $children;
    }
}
