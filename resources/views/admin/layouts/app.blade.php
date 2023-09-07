<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keyword" content="@yield('keyword')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css\vendors.min.css') }}">

    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libraries\assets\icon\themify-icons\themify-icons.css') }}">
    <!-- font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libraries\assets\icon\font-awesome\css\font-awesome.min.css') }}">
    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libraries\assets\icon\simple-line-icons\css\simple-line-icons.css') }}">
    <!-- glyphicon icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libraries\assets\icon\glyphicon\css\glyphicon.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libraries\assets\icon\icofont\css\icofont.css') }}">
    <!-- feather -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libraries\assets\icon\feather\css\feather.css') }}">
    <!-- Material Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libraries\assets\icon\material-design\css\material-design-iconic-font.min.css') }}">

    @stack('page-css')
</head>

<body>

<div class="theme-loader">
    <div class="ball-scale">
        <svg id="loader2" viewbox="0 0 100 100">
            <circle id="circle-loader2" cx="50" cy="50" r="45"></circle>
        </svg>
    </div>
</div>

@include('admin.partials.flash-message')

<div id="pcoded" class="pcoded" theme-layout="vertical" vertical-placement="left" vertical-layout="wide"
     vertical-nav-type="expanded" vertical-effect="shrink"
     pcoded-device-type="desktop">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        @include('admin.layouts._header')

        <div class="pcoded-main-container" style="margin-top: 56px;">
            <div class="pcoded-wrapper">

                @include('admin.layouts._sidebar')

                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body" >
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vendor js -->
<script type="text/javascript" src="{{ asset('js/vendors.min.js') }}"></script>

<!-- Custom js -->
<script type="text/javascript" src="{{ asset('js/custom.min.js') }}"></script>

@stack('page-scripts')

</body>
</html>
