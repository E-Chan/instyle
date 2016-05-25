@extends('templates.default')

@section('content')
    @if (Auth::check()) 
        <div class="row" id="timeline">
            <div class="col-md-3" id="padding">
            </div>

            <div class="col-md-6">
                <div class="row" id="newPost" v-on:hover="focusNewPost()">
                    <form style="margin: 0; padding=0;" action="#" v-on:submit="postStatus">
                        <div class="form-group" style="white-space: normal">
                            <textarea id="postInput" class="form-control"  cols="35"  rows="2" maxlength="600" placeholder="¿Que estilo luces hoy?" v-model="post"></textarea>
                        </div>
                    </form>
                        <button v-if="post.length" style="display: inline;" type="button" class="btn-lg btn-default">
                        <span v-if="post.length" class="glyphicon glyphicon-plus"></span>
                        <span v-if="post.length" class="glyphicon glyphicon-camera"></span>
                        </button>
                        <input v-if="post.length" id="postBtn" style="display: inline;" type="submit" value="Submit" class="btn btn-primary btn-block"  v-on:click="postStatus">
                </div>
                <br><br>
                <div class="row posts">
                <p v-if="!posts.length"> <strong>¿No sigues a nadie aún?</strong><br> Utiliza la función de búsqueda en la barra superior y descubre nuevos estilos</p>
                <div v-if="posts.length"  class="well media" v-for="post in posts" track-by="id">
                    <div class="media-left">
                    <img class="media-object" v-bind:src="post.user.avatar">
                    </div>
                    <div class="media-body">
                        <div class="user">
                            <a href="http://instytle.social/user/".@{{ post.user.username }}><strong>@{{ post.user.username }}</strong></a> - @{{ post.relativeCreatedAt }}
                    
                        </div>
                        <p>@{{ post.body }}</p>
                    </div>
                </div>
                

                </div>
            </div>

            <div class="col-md-3" id="padding">
            </div>


        </div>
    @else
        <h1>Bienvenido a instyle.social</h1>
        <h3>La red social 'a la última'.</h3>
    @endif 


@stop
