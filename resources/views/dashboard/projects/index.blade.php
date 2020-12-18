@extends('layouts.dashboard', ["current" => "projects"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>
    <a href="{{route('projects.create')}}" class="button is-outlined">
        <i class="fas fa-plus-square"></i>
    </a>

    @if (count($projects) > 0)
    <div class="grid-dashboard grid-projects">
        @foreach ($projects as $project)
            <div class="box">
                <h6 class="title is-6">id: {{$project->id}} || {{$project->name}} </h6>
                <div class="">
                    <div >
                        <p >
                            Related categories:
                            @foreach ($project->categories as $cat)
                                <span class="text-light">
                                    {{$cat->name}}
                                </span>
                            @endforeach
                        </p>
                        <p>
                            Tags: 
                            @foreach ($project->tags as $tag)
                            <span>
                                {{$tag->name}} *
                            </span>
                        @endforeach
                        </p>
                        
                    </div>
                    <div class="">
                        <a href="{{route('projects.show', $project->id)}}" class="button is-primary is-outlined is-small">
                            <i class="fas fa-search"></i>
                        </a>
                        <a href="{{route('projects.edit', $project->id)}}" class="button is-warning is-outlined is-small">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{route('projects.destroy', $project->id)}}" 
                            method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button is-danger is-outlined is-small" 
                                style="display: inline-block;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        
    @else
        <p>No projects found</p>
    @endif



@endsection
