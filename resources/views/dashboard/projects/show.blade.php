@extends('layouts.dashboard', ["current" => "projects"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>
    <div class="card">
        <div class="card-header">{{$project->name}} || id: {{$project->id}}</div>
        <div class="card-content">
            <p>Nome: {{$project->name}}</p>
            <p>Descrição:</p>
            <p>
                {!! nl2br(e($project->description ?? 'No description')) !!}
            </p>
            <p>
                {{-- <img src="/storage/original_photos/{{$project->image}}" alt="{{$project->name}} image">
 --}}
                <img src="{{asset('storage/large_photos/'.$project->image)}}"
                srcset="{{asset('storage/large_photos/'.$project->image.' 860w')}},
                {{asset('storage/medium_photos/'.$project->image.' 640w')}},
                {{asset('storage/mobile_photos/'.$project->image.' 420w')}}">

                Related categories:
                @foreach ($project->categories as $cat)
                    <p>
                        {{$cat->name}}
                    </p>
                @endforeach
            </p>
            @if (isset($project->link) || isset($project->githublink))
                <p>
                    <a href="{{$project->link ?? ''}}">{{$project->link ?? ''}}</a> |
                    <a href="{{$project->githublink ?? ''}}">{{$project->githublink ?? ''}}</a>
                </p>
            @endif

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

@endsection
