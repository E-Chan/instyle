@extends('templates.default')

@section('content')
    <h3>Resultados de la búsqueda:</h3>

    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            
            @if (!$users->count())
                <h1>No se han encontrado resultados :<</h1>
            @else

            @foreach ($users as $user)
                @include('user/partials/userblock')
            @endforeach


        </div>
        <div class="col-lg-4">
        </div>
    </div>
    @endif
@stop