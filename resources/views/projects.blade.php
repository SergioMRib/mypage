@extends('layouts.layout', ["current" => "indevelopment"])

@section('body')

        <section class="hero is-fullheight">
            <div class="hero-body">
                <h1 class="title is-size-1">Projects:</h1>
                @foreach ($data as $item)
                    <p>{{$item->name}} / </p>
                @endforeach
            </div>
        </section>


@endsection
