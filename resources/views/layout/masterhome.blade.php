<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    @include('layout.header')

    @yield('css')

 
</head>


        
            <div class="row border-bottom">

                @include('layout.tophome_nav')

            </div>

            @yield('breadcrumb')

            @yield('content')

           

        </div>
    </div>

    @include('layout.script')

    @yield('script')

</body>

</html>