<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The project that belong to the categories.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_project');
    }
}
