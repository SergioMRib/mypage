<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Category;
use App\Tag;

class PublicProjectsController extends Controller
{
    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        
        $projects = Project::whereHas('categories', function($query) use($category) {
            $query->where('name', $category);
        })->get();

        
        return view('projects', compact('projects', 'category'));
    }
}
