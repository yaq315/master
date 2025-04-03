<!DOCTYPE html>
<html lang="en">

@include('layouts.topdash')


<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-success position-absolute w-100"></div>

  @include('layouts.sidebardash')
  <main class="main-content position-relative border-radius-lg ">

@include('layouts.navdash')
 
@yield('content1')


  </main>
  @yield('content2')
  <!--   Core JS Files   -->
@include('layouts.bottomdash')
</body>

</html>