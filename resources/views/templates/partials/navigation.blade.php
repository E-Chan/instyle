<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><img height="170%" src="logo.png"></img></a>
        </div>
        <div class="collapse navbar-collapse">
           @if (Auth::check()) 
                <ul class="nav navbar-nav">
                    <li><a href="#">Timeline</a></li>
                    <li><a href="#">Amigos</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search" action="#">
                    <div class="form-group">
                        <input type="text" name="query" class="form-control" placeholder="Find people">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
           @endif 
            <ul class="nav navbar-nav navbar-right">
               @if (Auth::check()) 
                    <li><a href="#">E-Chan42</a></li>
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
