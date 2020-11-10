@extends('layouts.dashboard', ["current" => "projects"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>
    <a href="{{route('projects.create')}}" class="button">
        <i class="fas fa-plus-square"></i>
    </a>

    @if (count($projects) > 0)
        @foreach ($projects as $project)
            <div class="card">
                <div class="card-header">{{$project->name}} || id: {{$project->id}}</div>
                <div class="card-content">
                    <p>Nome: {{$project->name}}</p>
                    <a href="{{route('projects.show', $project->id)}}" class="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <a href="{{route('projects.edit', $project->id)}}" class="button">
                        <i class="fas fa-edit"></i>
                    </a>
                    <p>Descrição:</p>
                    <p>
                        {!! nl2br(e($project->description ?? 'No description')) !!}
                    </p>
                    {{-- <p>
                        <img src="/storage/{{$project->image}}" alt="{{$project->name}} image">
                        Related categories:
                        @foreach ($project->categories as $cat)
                            <p>
                                {{$cat->name}}
                            </p>
                        @endforeach
                    </p> --}}
                    {{-- @if (isset($project->link) || isset($project->githublink))
                        <p>
                            <a href="{{$project->link ?? ''}}">{{$project->link ?? ''}}</a> |
                            <a href="{{$project->githublink ?? ''}}">{{$project->githublink ?? ''}}</a>
                        </p>
                    @endif --}}

                    <p>
                        <form action="{{route('projects.destroy', $project->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </p>
                </div>
            </div>
        @endforeach
    @else
        <p>No projects found</p>
    @endif



@endsection
