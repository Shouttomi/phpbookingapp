<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="theme-color" content="#712cf9">
        <title>Booking Management System | @yield('title')</title>
        @include('layout.css')
        @yield('style')
    </head>
    <body>
        @yield('content')
        @include('layout.js')
        @yield('customjs')
    </body>
</html>
