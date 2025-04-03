<!DOCTYPE html>
<html lang="en">

@include('layouts.top')




<body>
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>
    
   @include('layouts.header')

   @yield('content')

   @include('layouts.footer')

   @include('layouts.bottom')


</body>

</html>




