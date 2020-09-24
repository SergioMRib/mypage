@extends('layouts.dashboard', ["current" => "tags"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>

    <form action="{{route('tags.store')}}" method="post">
        @csrf
        <div class="field">
            <label for="name">Add tag</label>
                <input type="text" class="input"
                    name="name" id="tagName"
                    placeholder="Name"
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
    @if (count($tags) > 0)
        @foreach ($tags as $tag)
            <div class="card">
                <div class="card-header">{{$tag->name}}</div>
                <div class="card-content">
                    <p>Nome: {{$tag->name}} has {{count($tag->projects)}} project{{count($tag->projects) === 1 ? '' : 's'}}.</p>
                    <p>
                        <form action="{{route('tags.destroy', $tag->id)}}" method="post">
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
        <p>Não existem tags</p>
    @endif



@endsection
