@if (Session::has('info'))
    <div class="alert alertinfo" role="alert">
        {{Session::get('info') }}
    </div>
@endif