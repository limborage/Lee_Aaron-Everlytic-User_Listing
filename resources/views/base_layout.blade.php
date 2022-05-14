<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    @yield('custom-styles')

    <title>@yield('title')</title>
</head>
<body>
<div class="list-user-bg">
    <div class="heading-text">
        <h1 class="user-list-heading">User Listing</h1>
    </div>
</div>

@yield('content')

<footer class="footer">
    <p class="footer-text">
        Copyright User Listing App
    </p>
</footer>
</body>

<script src="{{asset('js/app.js')}}"></script>
@yield('post_scripts')

</html>