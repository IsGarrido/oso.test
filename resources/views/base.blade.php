<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', "OSO")</title>
    <!--<link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">-->
    <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cards.css') }}" rel="stylesheet">


</head>

<body>

    @include('template.nav')

    @yield('content')

    <script src="{{ asset('js/bulma.js') }}"></script>
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</body>

</html>
