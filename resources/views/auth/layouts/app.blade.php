<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('description')">
    <meta name="keyword" content="@yield('keyword')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libraries\assets\icon\font-awesome\css\font-awesome.min.css') }}">

    <!-- Ico Font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libraries\assets\icon\icofont\css\icofont.css') }}">

    <!-- Vendor css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css\vendors.min.css') }}">
</head>

<body class="fix-menu">

    @yield('content')

    <!-- Vendor js -->
    <script type="text/javascript" src="{{ asset('js/vendors.min.js') }}"></script>

    @stack('page-scripts')
</body>
</html>
