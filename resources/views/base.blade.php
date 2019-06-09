<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', "OSO")</title>
    <!--<link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">-->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bulmatemplates.github.io/bulma-templates/css/cards.css">

</head>

<body>

    @include('template.nav')



    @yield('content')



    <script src="https://bulmatemplates.github.io/bulma-templates/js/bulma.js"></script>


    <style>
    .message-body{
        border-left-width: 0px;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    body{
        background-color: white
    }
    .place-detail{
        margin-top: 10px;
        background-color: #dff3ff;;
        /* border: 1px solid grey; */
        padding: 10px;
    }

    .place-detail> .subtitle{
        margin-bottom: 5px;
    }

    .container__base{
        box-shadow: 0 0 3px;
    }

    </style>

</body>

</html>
