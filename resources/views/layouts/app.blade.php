<!DOCTYPE html>
<html lang="en">
<head>
    @include('Partials._head')

    <!-- Styles -->

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
    <div class="col-md-8 col-md-offset-2">
        @yield('content')
    </div>
    <!-- Scripts -->
{{--<script src="/js/app.js"></script>--}}

    @include('Partials._scripts')
</body>
</html>
