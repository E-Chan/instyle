@extends('templates.default')

@section('content')
    @if (Auth::check()) 
        <h1>Timeline<h1>
    @else
        <h1>Bienvenido a instyle.social</h1>
        <h3>La red social 'a la última'.</h3>
    @endif 


@stop