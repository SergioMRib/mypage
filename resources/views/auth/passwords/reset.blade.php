<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Sérgio's homepage</title>


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    </head>
    <body class="bg-img">

        <main>
 

{{-- @extends('layouts.dashboard') --}}

{{-- @section('content') --}}
    @component('components.full-page-section')
        @component('components.card')
            @slot('title')
                {{ __('Reset Password') }}
            @endslot

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field">
                    <label class="label" for="email">{{ __('E-Mail Address') }}</label>
                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    </div>

                    @error('email')
                        <p class="help is-danger" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <hr>

                <div class="field">
                    <label class="label" for="password">{{ __('Password') }}</label>
                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="new-password">
                    </div>

                    @error('password')
                        <p class="help is-danger" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="password-confirm">{{ __('Confirm Password') }}</label>
                    <div class="control">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <hr>

                <div class="field is-form-action-buttons">
                    <button type="submit" class="button is-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>

            </form>

        @endcomponent
    @endcomponent
    </main>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
