<!DOCTYPE html>
<html lang="en">

<head>
    
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    @include('layout.header')

    @yield('css')

 
</head>

<body class="fixed-sidebar fixed-nav fixed-nav-basic">

    <div id="wrapper">

    @include('layout.side_nav')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">

                @include('layout.top_nav')

            </div>

            @yield('breadcrumb')

            @yield('content')

            @include('layout.footer')

        </div>
    </div>

    @include('layout.script')

    @yield('script')

</body>

</html>
