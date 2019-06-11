<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', "OSO")</title>
    <!--<link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">-->
    <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>

    @include('template.nav')

    <div id="app">
        @yield('content')
    </div>

    <script src="{{ asset('js/bulma.js') }}"></script>
    <script src="{{ asset('js/bulma.js') }}"></script>
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>
    <script src="http://oso.test/js/app.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</body>

</html>
