@extends('layouts.dashboard', ["current" => "categories"])


@section('content')

    <h3 class="is-title is-size-3">{{$current}}</h3>

    <a href="{{route('categories.create')}}" class="button">
        <i class="fas fa-plus-square"></i>
    </a>

    @if (count($categories) > 0)
        @foreach ($categories as $category)
            <div class="card">
                <div class="card-header">{{$category->name}}</div>
                <div class="card-content">
                    <p>Nome: {{$category->name}}</p>
                    <p>
                        Descrição: {{$category->description}}
                    </p>
                    <p>
                        <a href="{{route('categories.edit', $category->id)}}" class="button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{route('categories.destroy', $category->id)}}" method="post">
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
        <p>Não existem categorias</p>
    @endif



@endsection
