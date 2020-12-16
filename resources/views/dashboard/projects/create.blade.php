@extends('layouts.dashboard', ["current" => "projects"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>

    <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- The title --}}
        <div class="field">
            <label for="name">Add title</label>
            <input type="text" class="input"
                name="name" id="tagName"
                placeholder="Name"
                >
        </div>

        {{-- The description --}}
        <div class="field">
            <label for="description">Add description</label>
            <textarea type="text" class="textarea"
                name="description" id="description"
                placeholder="Description" style="white-space: pre-line; white-space: pre-wrap; "
                ></textarea>
        </div>

        {{-- The categories --}}
        <div class="field">
            {{-- <label for="categories">Add categories</label> --}}
            @foreach ($categories as $category)
                <label for="{{$category->id}}">{{$category->name}}</label>
                <input type="checkbox" id="{{$category->id}}" name="categories[]" value="{{$category->id}}">
                |
            @endforeach
        </div>

        {{-- The tags --}}
        <div class="field">
            {{-- <label for="tags">Add tags</label> --}}
            @foreach ($tags as $tag)
                <label for="{{$tag->id}}">{{$tag->name}}</label>
                <input type="checkbox" id="{{$tag->id}}" name="tags[]" value="{{$tag->id}}">
                |
            @endforeach
        </div>


        {{-- The Image form field --}}
        <div class="field">
            <label for="image">Add image</label>
                <input type="file" class="input"
                    name="image" id="image"
                    >
        </div>


        {{-- The link --}}
        <div class="field">
            <label for="">Add link</label>
                <input type="text" class="input"
                    name="link" id="link"
                    placeholder="Add link"
                    >
        </div>

        {{-- The github link --}}
        <div class="field">
            <label for="">Add Github link</label>
                <input type="text" class="input"
                    name="githublink" id="githublink"
                    placeholder="Add github link"
                    >
        </div>

        {{-- Final action buttons --}}
        <div class="form-group">
            <button type="submit" class="button is-primary">Register</button>
            <a href="{{route('projects.index')}}" class="button is-warning">Cancel</a>
        </div>

        {{-- Errors --}}
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
