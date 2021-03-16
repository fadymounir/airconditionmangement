<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{env('projectName','DashBaord')}} | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{env('projectPathFiles','/dashbaord')}}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
          href="{{env('projectPathFiles','/dashbaord')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{env('projectPathFiles','/dashbaord')}}/plugins/daterangepicker/daterangepicker.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{env('projectPathFiles','/dashbaord')}}/dist/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    @include('dashboard.layouts.style')


    @yield('link-css')
    @stack('custom-css')

    <style>
        .loading-container {
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            background: rgba(0,0,0, .5);
            z-index: 99;
            justify-content: center;
            display: flex;
            align-items: center;
            top: 0;
        }
        .d-none{
            display: none;
        }
    </style>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
        @csrf
<div class="loading-container d-none">
    <div class="spinner-border text-danger" role="status">
    </div>
</div>
