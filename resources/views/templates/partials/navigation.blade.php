<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home')}}"><img height="170%" src="/img/logo.png"></img></a>
        </div>
        <div class="collapse navbar-collapse">
           @if (Auth::check()) 
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home')}}">Timeline</a></li>
                    <li><a href="#">Amigos</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search" action="{{route('search.results')}}">
                    <div class="form-group">
                        <input type="text" name="query" class="form-control" placeholder="Find people">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
           @endif 
            <ul class="nav navbar-nav navbar-right">
               @if (Auth::check()) 
                    <li><img vspace="5"height="40px" class="media-object" alt="{{ Auth::user()->getUsername() }}" src="{{Auth::user()->getAvatarUrl()}}"></li>
                    <li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getUsername() }}</a></li>
                    <li><a href="#">Editar perfil</a></li>
                    <li><a href="{{ route('auth.signout')}}">Cerrar Sesión</a></li>
               @else 
                    <li><a href="{{ route('auth.signup')}}">Registro</a></li>
                    <li><a href="{{ route('auth.signin')}}">Iniciar sesión</a></li>
               @endif 
            </ul>
        </div>
    </div>
</nav>
