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
                        <button v-if="post.length" style="display: inline;" type="button" class="btn-lg btn-info">
                        <i class="fa fa-plus-square"></i>
                        <i class="fa fa-picture-o"></i>
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
    <div class="row" id="timeline">
    <div id="photos">
        <img id="photo1" src="/bgPhotos/photo1.png">
        <img id="photo2" src="/bgPhotos/photo2.png">
        <img id="photo3" src="/bgPhotos/photo3.png">
        <img id="photo4" src="/bgPhotos/photo4.png">
        <img id="photo5" src="/bgPhotos/photo5.png">
    </div>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <div class="col-md-3" id="padding">
    </div>
    <div class="col-md-6" id="padding"><br><br><br><br><br><br><br><br><br><br>
            <img src="logo.png"></img><br><br>
{{--                <center>                    
                    <a class="btn btn-info" id="loginBtn">
                    <i class="fa fa-key"></i> Iniciar sesión</a>
                    &nbsp;&nbsp;
                    <a href="{{ route('auth.signup')}}" class="btn btn-primary" id="registerBtn">
                    <i class="fa fa-user-plus"></i> Registrate</a>                    
                </center>
--}}
        <br>
        <div id="signInBox" class="well">
            <form class="form-vertical" role="form" method="post" action="{{ route('auth.signin')}}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @if($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info"> <i class="fa fa-key"></i>Iniciar sesión</button>
                    <a href="{{ route('auth.signup')}}" id="noAccount" class="btn btn-primary" id="registerBtn">
                    <i class="fa fa-user-plus"></i> ¿No tienes cuenta?</a>  
                </div>
                <input type="hidden" name="_token" value="{{ Session::token()}}">
            </form>
        </div>
    </div>
    </div>

    <div class="col-md-3" id="padding">
    </div>
    @endif 


@stop
