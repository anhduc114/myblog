<!DOCTYPE html>
<html lang="en">
@include('partials._head')

@include('partials._nav')

<body>

<!-- Default Bootstrap navbar -->
<div class="container">
    @include('partials._messages')

    {{--{{Auth::check() ? "Logged In" : "Logged Out"}}--}}

    @yield('content')
    @include('partials._footer')
</div>

@include('partials._javascript')
@yield('scripts')
</body>
</html>
