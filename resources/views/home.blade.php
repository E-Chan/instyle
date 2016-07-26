@extends('templates.default')

@section('content')
    @if (Auth::check()) 
        <div class="row" id="timeline">
            <div class="col-md-3" id="padding">
            </div>

            <div class="col-md-6">
                <div class="row" id="newPost">
                    <h3> New post </h3>
                    <form style="margin: 0; padding=0;" action="#" v-on:submit="postStatus">
                        <div class="form-group" style="white-space: normal">
                            <textarea class="form-control"  cols="35" rows="2" maxlength="600" placeholder="¿Que estilo luces hoy?" v-model="post"></textarea>
                        </div>
                    </form>
                        <button style="display: inline;" type="button" class="btn-lg btn-default">
                        <span class="glyphicon glyphicon-plus"></span>
                        <span class="glyphicon glyphicon-camera"></span>
                        </button>
                        <input style="display: inline;" type="submit" value="Submit" class="btn btn-primary btn-block" v-on:click="postStatus">
                </div>

                <div class="row" id="posts">
                    <h1>Timeline</h1>

                </div>
            </div>

            <div class="col-md-3" id="padding">
            </div>


        </div>
    @else
        <h1>Bienvenido a instyle.social</h1>
        <h3>La red social 'a la últimsa'.</h3>
    @endif 


@stop
