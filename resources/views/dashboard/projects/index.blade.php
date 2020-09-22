@extends('layouts.dashboard', ["current" => "projects"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>
    <a href="{{route('projects.create')}}" class="button">
        <i class="fas fa-plus-square"></i>
    </a>

    @if (count($projects) > 0)
        @foreach ($projects as $project)
            <div class="card">
                <div class="card-header">{{$project->name}}</div>
                <div class="card-content">
                    <p>Nome: {{$project->name}}</p>
                    <p>
                        Related categories:
                        @foreach ($project->categories as $cat)
                            <p>
                                {{$cat->name}}
                            </p>
                        @endforeach
                    </p>
                    <p>
                        {{-- <form action="{{route('project.destroy', $project->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form> --}}
                    </p>
                </div>
            </div>
        @endforeach
    @else
        <p>No projects found</p>
    @endif



@endsection
