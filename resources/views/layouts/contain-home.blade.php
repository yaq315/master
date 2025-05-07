<!DOCTYPE html>
<html lang="en">

@include('layouts.top')




<body>
    <!-- Preloader -->
     <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            {{-- <img src="img/core-img/leaf.png" alt=""> --}}
        </div>
    </div> 

     
  @include("layouts.header")

    
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
   @yield("contant1")


    <!-- ##### Service Area Start ##### -->
    @yield("contant2")
    <!-- ##### Service Area End ##### -->

    <!-- ##### About Area Start ##### -->
    @yield("contant3")
    <!-- ##### About Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
    @yield("contant4")
    <!-- ##### Testimonial Area End ##### -->

    <!-- ##### Product Area Start ##### -->
 @yield('contant5')
    <!-- ##### Product Area End ##### -->


    <!-- ##### Contact Area Start ##### -->
    @yield('contant6')
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
 <!-- ##### Footer Area Start ##### -->
@include("layouts.footer")
<!-- ##### Footer Area End ##### -->
    

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
   @include('layouts.bottom')
</body>

</html>