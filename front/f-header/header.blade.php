<!doctype html>
<html lang="en" data-layout="horizontal" data-layout-style=""
    data-layout-position="fixed" data-topbar="light">

<head>

    <meta charset="utf-8" />
    <title>
        @isset($Title)
            {{ $Title }} | {{ $Desc }}

        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="{{ $Title }}" name="{{ $Desc }}" />
        <meta content=" {{ $Title }}" name=" {{ $Desc }}" />
    @endisset
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/assets/favicon.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet"
        type="text/css" />

    @include('f-scripts.flatpickrcss')

    <style>
        .pdfobject-container {
            height: 100vh;
            border: 1rem solid rgba(0, 0, 0, .1);
        }
    </style>

    {{-- <link href="{{ asset('assets/css/selectize.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/selectize.bootstrap5.css') }}"
        rel="stylesheet" /> --}}

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
