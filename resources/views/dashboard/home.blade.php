@extends('layouts.dashboard', ["current" => "dashboard"])


@section('content')

    <h3 class="is-title is-size-3">{{$current ?? ''}}</h3>

    <div class="container">
        You have {{count($projects)}} projects
        @foreach ($projects as $p)
            <div class="card">
                <div class="card-header">{{$p->name}}</div>
                <div class="card-body">
                    {{$p->description}}.
                    Also, this projects belongs to {{count($p->categories)}} categories.
                </div>
            </div>
        @endforeach
    </div>
    <div class="container">
        You have {{count($categories)}} categories
        @foreach ($categories as $c)
            <div class="card">
                <div class="card-header">{{$c->name}}</div>
                <div class="card-body">
                    {{$c->description}}.
                    Also, this category has {{count($c->projects)}} projects.
                </div>
            </div>
        @endforeach
    </div>
    <div class="container">
        You have {{count($tags)}} tags
        @foreach ($tags as $t)
            <div class="card">
                <div class="card-header">{{$t->name}}
                    with {{count($t->projects)}} project{{count($t->projects) === 1 ? '' : 's'}}.</div>
            </div>
        @endforeach
    </div>
    {{-- @component('components.full-page-section')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content">
                <p>
                    Welcome to <b>{{ config('app.name') }} dashboard</b>
                </p>
                <p>
                    You are logged in
                </p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf
                    <button class="submit">Logout</button>
                </form>
            </div>
        @endcomponent
    @endcomponent --}}
@endsection
