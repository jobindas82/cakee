<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Pawlycare') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('styles')
</head>
@php
    $config = request()->user()->config;
@endphp

<body id="main-body" class="hold-transition sidebar-mini layout-fixed {{ $config['darkMode']=='dark' ? 'dark-mode' : '' }}">
<div class="wrapper">

    @include('layouts.navigation')

    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ mix('js/app.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
@stack('scripts')
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
</body>
</html>
