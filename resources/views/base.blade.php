<!DOCTYPE html>
<html lang="en">
<head>
@include('Partials._head')
<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@include('Partials._logo')
<div id="app">
    @include('Partials._nav');
</div>
<div class="col-sm-8 col-md-offset-2">
    @yield('content')
</div>
@include('Partials._scripts');
@yield('scripts');
<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>