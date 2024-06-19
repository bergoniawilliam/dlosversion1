<!DOCTYPE >
<html lang="en">

<head>
<script src="path/to/popper.min.js"></script>
  <!-- Load inspinia.js after Popper -->
  <script src="path/to/inspinia.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    @include('layout.header')

    @yield('css')

</head>

<body class="fixed-sidebar fixed-nav fixed-nav-basic">


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
