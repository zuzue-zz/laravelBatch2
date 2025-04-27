<!DOCTYPE html>
<htmL>

<head>
    <title>{{ config('app.name') }}</title>

    {{-- 8-bit Unicode Transformation Format --}}
    <meta charset="utf-8" />

    {{-- fav icon   --}}
    <link href="{{ asset('./assets/img/fav/favicon.png') }}" rel="icon" type="image/png" sizes="16x16" />
    {{-- bootstrap css1 js1   --}}
    <link href="{{ asset('./assets/libs/bootstrap-5.3.2-dist/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    {{-- fontawesome css1   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- toaser notification css 1 js 1  --}}
    <link href="{{ asset('assets/libs/toastr-master/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />


    {{-- custom css  --}}
    <link href="{{ asset('./assets/dist/css/style.css') }}" rel="stylesheet" type="text/css" />

    {{-- extra css  --}}
    @yield('css')


</head>

<body>
