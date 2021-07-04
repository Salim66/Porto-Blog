<!DOCTYPE html>
<html lang="en">

  @include('Backend.layout.head')
  <body>
    <!-- Loader starts-->
    {{-- <div class="loader-wrapper">
      <div class="typewriter">
        <h1>New Era Admin Loading..</h1>
      </div>
    </div> --}}
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      @include('Backend.layout.header')
      <!-- Page Body Start-->
      <div class="page-body-wrapper">


        @include('Backend.layout.sidebar')


        @section('main-content')
        @show


        @include('Backend.layout.footer')
      </div>
    </div>


    @include('Backend.layout.partials.scripts')
  </body>

</html>
