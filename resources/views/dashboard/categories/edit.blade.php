@extends('layouts.dashboard', ["current" => "categories"])


@section('content')

    <h3 class="is-title is-size-3">{{$current}}</h3>

    <div class="card">
        <div class="card-body">

            <form action="{{route('categories.update', $category->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="field">
                    <label for="name">Category name</label>
                        <input type="text" class="input"
                            name="name" id="categoryName"
                            value="{{$category->name}}"
                            >
                </div>
                <div class="field">
                    <label for="description">Description</label>
                        <input type="text" class="input"
                            name="description" id="description"
                            value="{{$category->description}}"
                        >
                </div>
                <div class="form-group">
                    <button type="submit" class="button is-primary">Save</button>
                    <a href="{{route('categories.index')}}" class="button is-warning">Cancel</a>
                </div>
            </form>
            @if ($errors->any())
                <div class="is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>


@endsection
