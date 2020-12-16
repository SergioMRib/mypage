@extends('layouts.dashboard', ["current" => "tags"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>

    <form action="{{route('tags.store')}}" method="post" class="block">
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
        <div class="grid-dashboard grid-tags block">
            @foreach ($tags as $tag)
                <div class="box">
                    <p class="title is-6 is-info">{{$tag->name}}</p>
                    <span class="tag is-info">{{count($tag->projects)}} project{{count($tag->projects) === 1 ? '' : 's'}}.</span>
                    <form action="{{route('tags.destroy', $tag->id)}}" 
                        method="post" 
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button is-small is-dark">
                            <i class="far fa-times-circle fa-2x"></i>
                        </button>
                    </form>

                </div>
            @endforeach
        </div>
    @else
        <p>Não existem tags</p>
    @endif





@endsection
