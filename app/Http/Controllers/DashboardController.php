<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use App\Tag;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $current = "Home";
        $projects = Project::with('categories')->get();
        $categories = Category::with('projects')->get();
        $tags = Tag::all();

        return view('dashboard.home', compact('projects', 'categories', 'tags','current'));
    }

    public function demo() {
        return view('demo');
    }
}
