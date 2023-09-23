<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body>
    <body id="page-top">
        <div id="wrapper">
@include('layouts.sidebar')
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        @include('layouts.topbar')
            <!-- Sidebar Toggle (Topbar) -->
            @yield('content')
            @include('layouts.footer')
        
        
        </body>
        </html>