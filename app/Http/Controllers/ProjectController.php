<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use App\Tag;

class ProjectController extends Controller
{

    public function __construct() {
        $this->current = "Projects";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('categories')->get();
        $current = $this->current;
        //return $projects->toJson();
        return view('dashboard.projects.index', compact('projects', 'current'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current = $this->current;
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.projects.create', compact('current', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|unique:projects',
            'categories' => 'required',
        ]);
        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->save();

        //Link to categories
        $categories = $request->input('categories');
        $project->categories()->sync($categories);

        //Link to tags
        $tags = $request->input('tags');
        $project->tags()->sync($tags);

        //dd($project);
        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current = $this->current;
        return view('dashboard.projects.show', compact('', 'current'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current = $this->current;
        //return view('dashboard.projects.edit', compact('', 'current'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (isset($project)) {
            $project->delete();
        }
        return redirect(route('projects.index'));
    }
}
