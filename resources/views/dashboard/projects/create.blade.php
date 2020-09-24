@extends('layouts.dashboard', ["current" => "projects"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>
    <h3>This is the create page</h3>

    <form action="{{route('projects.store')}}" method="post">
        @csrf
        <div class="field">
            <label for="name">Add title</label>
            <input type="text" class="input"
                name="name" id="tagName"
                placeholder="Name"
                >
        </div>
        <div class="field">
            <label for="description">Add description</label>
            <textarea type="text" class="input"
                name="description" id="description"
                placeholder="Description" style="white-space: pre-line; white-space: pre-wrap; "
                ></textarea>
        </div>
        <div class="field">
            {{-- <label for="categories">Add categories</label> --}}
            @foreach ($categories as $category)
                <label for="{{$category->id}}">{{$category->name}}</label>
                <input type="checkbox" id="{{$category->id}}" name="categories[]" value="{{$category->id}}">

            @endforeach
        </div>
        <div class="field">
            {{-- <label for="tags">Add tags</label> --}}
            @foreach ($tags as $tag)
                <label for="{{$tag->id}}">{{$tag->name}}</label>
                <input type="checkbox" id="{{$tag->id}}" name="tags[]" value="{{$tag->id}}">

            @endforeach
        </div>
        <div class="field">
            <label for="">Add image</label>
                <input type="text" class="input"
                    name="" id=""
                    placeholder=""
                    >
        </div>
        <div class="field">
            <label for="">Add link</label>
                <input type="text" class="input"
                    name="" id=""
                    placeholder=""
                    >
        </div>
        <div class="form-group">
            <button type="submit" class="button is-primary">Register</button>
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
