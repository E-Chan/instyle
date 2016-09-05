@extends('templates.default')

@section('content')

<div class="row">

    <div class="col-lg-6 col-lg-offset-3">
    <p>Publicaciones de éste usuario:</p> <br>
    @foreach($user->posts as $post)
    <div class="well">
        <p>{{ $post->user->username }} -{{ $post->relativeCreatedAt}}</p>
        <h4> {{ $post->body}}</h4>
    </div>
    @endforeach


    </div>

    <div class="col-lg-3">
        @include('user.partials.userblock')
        <hr>

    </div>
</div>

@stop

