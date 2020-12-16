@extends('layouts.dashboard', ["current" => "categories"])


@section('content')

    <h3 class="is-title is-size-3">{{$current}}</h3>

    <a href="{{route('categories.create')}}" class="button">
        <i class="fas fa-plus-square"></i>
    </a>

    @if (count($categories) > 0)
        <div class="grid-dashboard grid-categories">
            @foreach ($categories as $category)
                    <div class="box">
                        <p class="title is-6">{{$category->name}}</p>
                        <p class="">
                            {{$category->description}}
                        </p>
                        <div class="">
                            <a href="{{route('categories.edit', $category->id)}}" class="button">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('categories.destroy', $category->id)}}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </div>
            @endforeach
        </div>
    @else
        <p>Não existem categorias</p>
    @endif



@endsection
