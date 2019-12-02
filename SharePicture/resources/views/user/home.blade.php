<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> @yield('title') </title>
    
    @yield('style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
</head>
<body>
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
 <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.$.ajax({
            url: '/path/to/file',
            type: 'GET',
            dataType: 'text',
            data: {data: 'ok'},
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    });
</script>

</body>
</html>