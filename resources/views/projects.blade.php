@extends('layouts.layout', ["current" => "projects"])

@section('body')

        <section class="section">
            <div class="container is-fullhd">
                <h3 class="title is-size-3 has-text-centered-tablet">{{$category}}</h3>
                @if (count($projects) > 0)
                    <div class="columns is-multiline is-centered"> 
                        @foreach ($projects as $project)
                            <div class="column is-half-desktop is-one-third-widescreen">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-header-icon"><img src="{{asset('storage/icon_photos/'.$project->image)}}" alt="Project icon"></div>
                                        <div class="card-header-title info">{{$project->name}}</div>
                                    </div>
                                    <div class="card-content">{!! nl2br(e($project->description ?? 'No description')) !!}</div>
                                    <div class="card-image">
                                        <img {{-- src="{{asset('storage/mobile_photos/'.$project->image)}}" --}}
                                            srcset="{{asset('storage/large_photos/'.$project->image.' 860w')}},
                                            {{asset('storage/medium_photos/'.$project->image.' 640w')}},
                                            {{asset('storage/mobile_photos/'.$project->image.' 420w')}}">
                                        </div>
                                        {{-- <div class="card-image">
                                        <img src="{{asset('storage/large_photos/'.$project->image)}}"
                                        srcset="{{asset('storage/large_photos/'.$project->image.' 860w')}},
                                        {{asset('storage/medium_photos/'.$project->image.' 640w')}},
                                        {{asset('storage/mobile_photos/'.$project->image.' 420w')}}">
                                        </div> --}}
                                    <div class="card-footer">
                                        <div class="card-footer-item">
                                        <a href="{{$project->link}}">{{$project->link}}</a> <br>
                                        <a href="{{$project->githublink}}">{{$project->githublink}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>Nothing was found for {{$category}} category.</p>
                @endif
                
            </div>
        </section>


@endsection
