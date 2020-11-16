<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Project;
use App\Category;
use App\Tag;

class ProjectController extends Controller
{

    public function __construct() {
        $this->current = "Projects";
        $this->storage_paths = [
            900=>'original_photos/',
            860=>'large_photos/',
            640=>'medium_photos/',
            420=>'mobile_photos/',
            10=>'tiny_photos/'
        ];
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
            'image' => 'required|image|max:30000'
        ]);

        //$path = $request->file('image')->store('images', 'public');
        $file = $request->file('image');
        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        //$project->image = $path;
        $project->image = $file->hashName();
        $project->link = $request->input('link');
        $project->githublink = $request->input('githublink');

        // store images using intervention package
        $image = Image::make($file->getRealPath());

        foreach ($this->storage_paths as $size => $storage) {
            $image->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/'.$storage.$file->hashName(),85);
        }
        $project->save();

        //Link to categories
        //$categories = $request->input('categories');
        //$project->categories()->sync($categories);

        //Link to tags
        //$tags = $request->input('tags');
        //$project->tags()->sync($tags);

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
        $project = Project::find($id);
        if (isset($project)) {
            return view('dashboard.projects.show', compact('project', 'current'));
        } else {
            return view('projects.index');
        }
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
        $project = Project::find($id);
        if (isset($project)) {
            $categories = Category::all();
            $tags = Tag::all();
            return view('dashboard.projects.edit', compact('project', 'current', 'categories', 'tags'));
        } else {
            return view('projects.index');
        }
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
        $request->validate([
            'name' => 'required',
            'categories' => 'required',
        ]);
        //$path = $request->file('image')->store('images', 'public');
        $project = Project::find($id);

        if (isset($project)) {
            $project->name = $request->input('name');
            $project->description = $request->input('description');
            //$project->image = $path;
            $project->link = $request->input('link');
            $project->githublink = $request->input('githublink');

            // store images only if new image is uploaded; using intervention package
            // Checks for a new image upload
            // saves the image with the same name as the previous image (to handle deletion)
            if ($request->hasFile('image')) {
                $newImage = $request->file('image');
                $image = Image::make($newImage);

                foreach ($this->storage_paths as $size => $storage) {
                    $image->resize($size, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save('storage/'.$storage.$project->image,85);
                }
            }

            $project->save();
        }

        //Link to categories
        //$categories = $request->input('categories');
        //$project->categories()->sync($categories);

        //Link to tags
        //$tags = $request->input('tags');
        //$project->tags()->sync($tags);

        //dd($project);
        return redirect(route('projects.index'));
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
            foreach ($this->storage_paths as $storage) {
                Storage::disk('public')->delete($storage.$project->image);
            }
            $project->delete();
        }
        return redirect(route('projects.index'));
    }
}
