@extends('layout.layout', ["current" => ""])

@section('body')

    <h2 class="title">Contact me:</h2>
    <form action="#" method="post">
        <label for="name">Your name</label>
        <input type="text" name="name" id="name">

        <label for="email">Your email</label>
        <input type="email" name="email" id="email">

        <label for="message">What's your message</label>
        <input type="text" name="message" id="message">

        <input class="button" type="submit" value="Send">
        <a href="/" class="button is-warning">Cancel</a>
    </form>


@endsection
