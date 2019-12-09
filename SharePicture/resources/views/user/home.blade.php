<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> @yield('title') </title>
    
    @yield('style')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/loading.css') }}">
</head>

<body>
    <div class="wrap">
      <div class="loading">
        <div class="bounceball"></div>
        <div class="text">NOW LOADING</div>
      </div>
    </div>
    @include('user.header')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-">
                    @include('user.sidebar')
                </div>
                <div class="col-lg-8 bg-white mt-3">

                 @yield('content')

             </div>
             <div class="col-lg-2">
             </div>
         </div>
     </div>
 </main>
 <footer>

 </footer>

 @yield('script')
  <script>
         $(window).on('load', function(){
          $(".wrap").fadeOut("slow");
        });
     </script>
</body>
</html>