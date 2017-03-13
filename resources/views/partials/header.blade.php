<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0"
          name="viewport"/>
    <meta http-equiv="Content-type"
          content="text/html; charset=utf-8">
    <meta name="description" content="Bill Maker">
    <base href="{{url('/')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bill Maker') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="shortcut icon" href="{{url('builder/images')}}/favicon.png" type="image/png">

    <link href="{{url('builder/css')}}/style.css" rel="stylesheet">
    <link href="{{url('builder/css')}}/theme.css" rel="stylesheet">
    <link href="{{url('builder/css')}}/ui.css" rel="stylesheet">
    <link href="{{url('builder/main/css')}}/layout.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="{{url('builder/plugins/datatables')}}/dataTables.min.css" rel="stylesheet">
    <link href="{{url('builder/email-builder/plugins/slider-pips')}}/jquery-ui-slider-pips.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
    <script src="{{url('builder/plugins/modernizr')}}/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- ************************************************************************ !-->
    <!-- *****                                                              ***** !-->
    <!-- *****       ¤ Designed and Developed by  Muhammad Muzammil         ***** !-->
    <!-- *****               http://www.mmuzammilq.com                      ***** !-->
    <!-- *****                                                              ***** !-->
    <!-- ************************************************************************ !-->
    
</head>

<body class="sidebar-top fixed-topbar fixed-sidebar theme-sdtl color-default builder-page">
    
    