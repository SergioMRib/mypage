@extends('layout.layout', ["current" => "index"])

@section('body')

        <section class="hero is-fullheight">
            <div class="hero-body">

              <div class="container columns">
                <div class="column is-two-thirds has-text-right">
                    <h1 class="title is-1 is-uppercase is-size-2-mobile">
                        Sérgio Ribeiro
                    </h1>
                    <h4 class="subtitle is-4 has-text-right">
                        <a href="{{ url('/') }}">
                            <i class="fab fa-pagelines"></i>
                            Environmental Consulting
                        </a>
                        <br>
                        <a href="{{ url('/') }}">
                            <i class="fas fa-laptop-code"></i>
                            Web Development
                        </a>
                        <br>
                        <a href="{{ url('/') }}">
                            <i class="fas fa-music"></i>
                            Music
                        </a>
                    </h4>
                </div>

                <div class="column has-text-centered">
                    <figure class="image is-128x128 is-inline-block">
                        <img class="is-rounded"
                            src="{{asset('/img/homepage-face.webp')}}"
                            alt="My photo">
                    </figure>
                </div>

              </div>

            </div>
        </section>


@endsection
