<!DOCTYPE html>
<html>

   @include('Frontend.layouts.head')


   <body data-plugin-page-transition>
      <div class="body">

        @include('Frontend.layouts.header')

         <div role="main" class="main">

            @include('Frontend.layouts.topbar')

            <div class="container py-4">
               <div class="row">

                @include('Frontend.layouts.sidebar')

                @section('main-content')
                @show

               </div>
            </div>
         </div>

         @include('Frontend.layouts.footer')


      </div>


      @include('Frontend.layouts.partials.scripts')
   </body>


   </html>
