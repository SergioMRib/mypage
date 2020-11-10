@extends('layouts.dashboard', ["current" => "projects"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>
    <h3>This is the edit page</h3>

    <form action="{{route('projects.update', $project->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="name">Add title</label>
            <input type="text" class="input"
                name="name" id="tagName"
                value="{{$project->name}}"
                >
        </div>
        <div class="field">
            <label for="description">Add description</label>
            <textarea type="text" class="input"
                name="description" id="description"
                style="white-space: pre-line; white-space: pre-wrap; "
                >{{$project->description}}</textarea>
        </div>
        <div class="field">
            {{-- <label for="categories">Add categories</label> --}}
            @foreach ($categories as $category)
                <label for="{{$category->id}}">{{$category->name}}</label>
                <input type="checkbox" id="{{$category->id}}" name="categories[]" value="{{$category->id}}">
                |
            @endforeach
        </div>
        <div class="field">
            {{-- <label for="tags">Add tags</label> --}}
            {{-- @foreach ($tags as $tag)
                <label for="{{$tag->id}}">{{$tag->name}}</label>
                <input type="checkbox" id="{{$tag->id}}" name="tags[]" value="{{$tag->id}}">
                |
            @endforeach --}}
        </div>
        <div class="field">
            <label for="image">Add image</label>
                <input type="file" class="input"
                    name="image" id="image"
                    value="{{$project->image}}"
                    >
        </div>
        <div class="field">
            <label for="">Add link</label>
                <input type="text" class="input"
                    name="link" id="link"
                    value="{{$project->link}}"
                    >
        </div>
        <div class="field">
            <label for="">Add Github link</label>
                <input type="text" class="input"
                    name="githublink" id="githublink"
                    value="{{$project->githublink}}"
                    >
        </div>
        <div class="form-group">
            <button type="submit" class="button is-primary">Save</button>
            <a href="{{route('projects.index')}}" class="button is-warning">Cancel</a>
        </div>
        @if ($errors->any())
            <div class="is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>



@endsection
