<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />

<head>
    <base href="">
    <title>ECSA-Health Community | @isset($Title)
            {{ $Title }} | The East, Central and Southern Africa Health
            Community (ECSA-HC) is an inter-governmental
            health organization that fosters and promotes regional cooperation in
            health among member states. Member states
            of the ECSA Health Community are Kenya, Lesotho, Malawi, Mauritius,
            Eswatini, United Republic of Tanzania,
            Uganda, Zambia and Zimbabwe. |Mandate
            The mandate of ECSA-HC is to promote and encourage efficiency and
            relevance in the provision of health services
            in the region.

            | Vision
            To be the leader in health in East, Central and Southern Africa,
            contributing towards the attainment of the
            highest standard of physical, mental and social well-being of the people
            in the region.

            | Mission
            ECSA Health Community recognizes health as a fundamental human right. As
            an inter-governmental organization,
            ECSA promotes the highest standards of health for the individuals,
            families and communities through advocacy,
            capacity building, brokerage, coordination, inter-sectoral collaboration
            and harmonization of health policies
            and programmes.
        @endisset </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="{{ asset('logos/logo.png') }}" />

    @auth
        @if (Auth::user()->role == 'viewer')
            <style>
                .viewer_only {
                    display: none !important;
                }
            </style>
        @endif



    @endauth



    <style>
        .pdfobject-container {
            height: 100vh;
            border: 1rem solid rgba(0, 0, 0, .1);
        }
    </style>

    <style>
        select,
        input,
        textarea,
        .select2-container--bootstrap5,
        .select2-dropdown,
        .select2-search,
        .select2-search__field {

            color: black !important;

        }

        select,
        input,
        textarea,
        label {

            color: black !important;

        }


        option,
        label {

            color: black !important;

        }





        .CutText {

            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            max-width: 400px !important;
        }

        body::-webkit-scrollbar {
            width: 12px;
            /* width of the entire scrollbar */
        }

        body::-webkit-scrollbar-track {
            background: #181c32;
            /* color of the tracking area */
        }

        body::-webkit-scrollbar-thumb {
            background-color: #f1416c;
            /* color of the scroll thumb */
            border-radius: 20px;
            /* roundness of the scroll thumb */
            border: 3px solid;
            /* creates padding around scroll thumb */
        }

        /* ubuntu-regular - latin-ext_latin_greek-ext_greek_cyrillic-ext_cyrillic */
        @font-face {
            font-family: 'Ubuntu';
            font-style: normal;
            font-weight: 400;
            src: local(''),
                url("{{ asset('assets/fonts/ubuntu-v20-latin.woff2') }}") format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url("{{ asset('assets/fonts/ubuntu-v20-regular.woff') }}") format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        body,
        aside,
        header,
        section,
        html,
        span,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        div,
        p,
        strong,
        a,
        li,
        ul,
        ol {
            font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 30px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #51c4ca;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #51c4ca;
        }


        .select2-container--bootstrap5 .select2-selection--single .select2-selection__rendered {
            color: black !important;
        }

        select {
            color: black !important
        }
    </style>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @vite(['compiler/compiler.css'])
    <style>
        .aside-menu .menu-item .menu-link.active {
            background-color: #f1416c !important;
        }

        .btn-group-sm>.btn,
        .btn-sm {
            padding: .25rem .4rem;
            font-size: .875rem;
            line-height: .5;
            border-radius: .2rem;
        }

        .table-pad {
            padding-top: 3px !important;
        }

        table>tbody>tr>td {
            font-weight: 900 !important;
        }

        #boomRoom {
            display: none;
        }

        tr,
        td,
        th,
        tbody,
        thead {
            font-size: 11px !important;
            padding: 6px !important;
        }

        .redMe {
            color: red !important;
        }

        .pulse_note:hover {
            color: black !important;
        }

        .form-select-solid,
        .form-select {
            background-color: white !important;
            color: black !important;
        }

        .spinner {
            position: absolute;
            left: 46%;
            top: 40%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 8px solid lightgray;
            border-top: 8px solid tomato;
            border-bottom: 8px solid tomato;
            animation: anime 1.4s ease infinite
        }

        @keyframes anime {
            from {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(360deg)
            }
        }

        .spinner::before {
            position: absolute;
            content: "";
            width: 200%;
            height: 200%;
            left: 50%;
            top: 50%;
            border-radius: inherit;
            opacity: 0.6;
            transform: translate(-50%, -50%);
            border: 10px solid lightgray;
            border-left: 10px solid red;
            border-right: 10px solid red
        }

        .spinner::after {
            position: absolute;
            content: "";
            width: 300%;
            height: 300%;
            left: 50%;
            top: 50%;
            border-radius: inherit;
            opacity: 0.6;
            transform: translate(-50%, -50%);
            border: 12px solid lightgray;
            border-top: 12px solid red;
            border-bottom: 12px solid red
        }
    </style>

</head>
<!--end::Head-->
<!--begin::Body-->
