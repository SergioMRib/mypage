@extends('layouts.dashboard', ["current" => "categories"])


@section('content')

    <h3 class="is-title is-size-3">{{$current}}</h3>

    <div class="card">
        <div class="card-body">

            <form action="{{route('categories.store')}}" method="post">
                @csrf
                <div class="field">
                    <label for="name">Category name</label>
                        <input type="text" class="input"
                            name="name" id="categoryName"
                            placeholder="Name"
                            >
                </div>
                <div class="field">
                    <label for="description">Description</label>
                        <input type="text" class="input"
                            name="description" id="description"
                            placeholder="Description"
                        >
                </div>
                <div class="form-group">
                    <button type="submit" class="button is-primary">Register</button>
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
