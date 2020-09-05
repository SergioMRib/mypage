@extends('layouts.app')

@push('bottom')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
        @csrf
        <button class="submit">Logout</button>
    </form>
@endpush

@section('content')
    @component('components.full-page-section')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content">
                <p>
                    Welcome to <b>{{ config('app.name') }}</b>
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
    @endcomponent
@endsection
