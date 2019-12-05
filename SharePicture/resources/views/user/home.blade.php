<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> @yield('title') </title>
    
    @yield('style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/loading.css') }}">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
     <script>
         $(window).on('load', function(){
          $(".wrap").fadeOut("slow");
        });
     </script>
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
                <div class="col-lg-2">
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
</body>
</html>