@extends('layouts.dashboard', ["current" => "admins"])


@section('content')

    <h3 class="is-title is-size-3">All admins</h3>

    <a href="{{route('register')}}" class="button">
        <i class="fas fa-plus-square"></i>
    </a>
    @foreach ($admins as $admin)
        <div class="card">
            <div class="card-header">{{$admin->name}}</div>
            <div class="card-content">
                <p>Nome: {{$admin->name}}</p>
                <p>
                    email: {{$admin->email}}
                </p>
                <p>
                    <button disabled href="" class="button">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button disabled href="" class="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </p>
            </div>
        </div>
    @endforeach


@endsection
