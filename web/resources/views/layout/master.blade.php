<?php
/**
 * Created by PhpStorm.
 * User: wes_x
 * Date: 5/4/2018
 * Time: 6:38 AM
 */
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Fila N1 - {{ $title }}</title>
    @yield("css")
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Anton|Oswald" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/img/favicon.ico')}}">
    <script>
        var baseurl = "{{ url("/") }}/";
        var _token = "{{ csrf_token() }}";
    </script>
</head>
<body>
@auth
    @yield("menu")
@endauth
@yield("content")

@yield("js")

</body>
</html>