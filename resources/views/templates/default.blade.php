<!DOCTYPE html>
<html lang="en" id="">
<head>
    <meta charset="UTF-8">
    <title>Instyle</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
</head>

<body>
    @include('templates.partials.navigation')
    <div class="container">
        @include('templates.partials.alerts')
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.js"></script>
    <script src="https://use.fontawesome.com/8320e6f605.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>