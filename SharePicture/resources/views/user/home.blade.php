<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> @yield('title') </title>

    @yield('style')
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

</body>
</html>