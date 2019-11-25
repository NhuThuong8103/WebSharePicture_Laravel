<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>



    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('css/main_hover_album.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ URL::asset('css/sim-prev-anim.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">



</head>
<body>
    <header>
        <div class="container">
            <div class="row p-1">
                <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                    <div class="logo-head">
                        <span class="title-header">Fotobook</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-5 col-6 pl-0">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control input-search" id="search-foto" placeholder="Search Photo / Album">
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 d-none d-md-block">
                    <div class="name-user">
                        <a href="google.com" title="Trang ca nhan">
                            <span class="icon-user">
                                @if(Auth::check())
                                    {{ Auth::user()->ho}}
                                @else
                                    {{ "" }}
                                @endif
                            </span>
                            <img src="{{ URL::asset('image/icon-user.jpg') }}" class="boder-icon">
                        </a>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 d-none d-md-block">
                    <div class="logout-acount">
                        <a href="{{ Auth::logout() }}" title="Logout">
                            <span class="link-log">Logout</span>
                        </a>
                    </div>
                </div>
                    <!-- <div class="col-sm-3 d-md-none d-none d-sm-block">
                        <div class="name-user">
                            <a href="google.com" title="Trang ca nhan">
                                <img src="image/icon-user.jpg" class="boder-icon">
                                <img src="image/icon-user.jpg" class="boder-icon">
                            </a>
                        </div>
                    </div> -->
                    <div class="col-2 d-md-none">
                        <a href="#" title="Menu quản lý">
                            <!-- <h6 style="font-size: 16px;margin-top: 2%;float: right;">menu</h6> -->
                            <span class="navTrigger">
                                <i></i>
                                <i></i>
                                <i></i>
                            </span>
                        </a>
                        
                    </div>
                    <div id="menu-mobile" class="menu-lists d-md-none">
                        <ul>
                            <li>Hi, Nhu Thuong <3 </li>
                                <li>Feeds</li>
                                <li>My Photos</li>
                                <li>My Albums</li>
                                <li>Sign In</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="backdrop"></div>
            </header>

            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="sidebar">
                                <ul>
                                    <li><a href="feedsAlbum.html">Feeds</a> </li>
                                    <li><a href="myphoto.html">My Photo</a></li>
                                    <li class="active" style="color: #359624"><a href="myalbum.html">My Album</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8 bg-white mt-3">
                            <div class="row">
                                <div class="first-row-body p-3 text-center">
                                    <div class="btn-group btn-group-toggle">

                                        <a href="feedsPhoto.html" class="btn btn-secondary radio-seentype active">Photo</a>
                                        <a href="feedsAlbum.html" class="btn btn-secondary radio-seentype">Album</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row feeds-album">

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card mb-3 one-news-album">
                                        <div class="row no-gutters">
                                            <div class="col-lg-6 col-md-6 col-6">
                                                <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                    <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                                </div>

                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <h2 aria-hidden="true" class="text-primary">&times;</h2>
                                                                </button>
                                                                <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                            </div>
                                                            <div class="modal-body">

                                                                <img src="{{ URL::asset('image/1.jpg') }}"/>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card-body">
                                                    <div class="name-user user-in-feeds-title">
                                                        <a href="google.com" title="Trang ca nhan" class="title-name">
                                                            <span class="acount-image">NT</span>
                                                            <span class="name-acount">
                                                                Nhu Thuong
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <label class="strong-title-news">
                                                        <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                    </label>
                                                    <p class="card-text description">with supporting text below</p>
                                                </div>
                                                <div class="info-card-album">
                                                    <p class="info-album like-album">
                                                        <small class="text-muted text-left">
                                                            <input id="heart" type="checkbox" name="check1" />
                                                            <label for="heart"><i class="fas fa-heart"></i></label>
                                                            123
                                                        </small>
                                                    </p>
                                                    <p class="info-album time-album">
                                                        <small class="text-muted text-right">
                                                            4.56PM 01/01/2020
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card mb-3 one-news-album">
                                        <div class="row no-gutters">
                                            <div class="col-lg-6 col-md-6 col-6">
                                                <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                    <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                                </div>

                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <h2 aria-hidden="true" class="text-primary">&times;</h2>
                                                                </button>
                                                                <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                            </div>
                                                            <div class="modal-body">

                                                                <img src="{{ URL::asset('image/1.jpg') }}"/>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card-body">
                                                    <div class="name-user user-in-feeds-title">
                                                        <a href="google.com" title="Trang ca nhan" class="title-name">
                                                            <span class="acount-image">NT</span>
                                                            <span class="name-acount">
                                                                Nhu Thuong
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <label class="strong-title-news">
                                                        <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                    </label>
                                                    <p class="card-text description">with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                </div>
                                                <div class="info-card-album">
                                                    <p class="info-album like-album">
                                                        <small class="text-muted text-left">
                                                            <input id="heart" type="checkbox" name="check2"/>
                                                            <label for="heart"><i class="fas fa-heart"></i></label>
                                                            123
                                                        </small>
                                                    </p>
                                                    <p class="info-album time-album">
                                                        <small class="text-muted text-right">
                                                            4.56PM 01/01/2020
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card mb-3 one-news-album">
                                        <div class="row no-gutters">
                                            <div class="col-lg-6 col-md-6 col-6">
                                                <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                    <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                                </div>

                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <h2 aria-hidden="true" class="text-primary">&times;</h2>
                                                            </button>
                                                            <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                        </div>
                                                        <div class="modal-body">

                                                            <img src="{{ URL::asset('image/1.jpg') }}"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <div class="name-user user-in-feeds-title">
                                                    <a href="google.com" title="Trang ca nhan" class="title-name">
                                                        <span class="acount-image">NT</span>
                                                        <span class="name-acount">
                                                            Nhu Thuong
                                                        </span>
                                                    </a>
                                                </div>
                                                <label class="strong-title-news">
                                                    <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                </label>
                                                <p class="card-text description">with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="info-card-album">
                                                <p class="info-album like-album">
                                                    <small class="text-muted text-left">
                                                        <3 123
                                                    </small>
                                                </p>
                                                <p class="info-album time-album">
                                                    <small class="text-muted text-right">
                                                        4.56PM 01/01/2020
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card mb-3 one-news-album">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                            </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                        </div>
                                                        <div class="modal-body">

                                                            <img src="{{ URL::asset('image/1.jpg') }}"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <div class="name-user user-in-feeds-title">
                                                    <a href="google.com" title="Trang ca nhan" class="title-name">
                                                        <span class="acount-image">NT</span>
                                                        <span class="name-acount">
                                                            Nhu Thuong
                                                        </span>
                                                    </a>
                                                </div>
                                                <label class="strong-title-news">
                                                    <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                </label>
                                                <p class="card-text description">with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="info-card-album">
                                                <p class="info-album like-album">
                                                    <small class="text-muted text-left">
                                                        <3 123
                                                    </small>
                                                </p>
                                                <p class="info-album time-album">
                                                    <small class="text-muted text-right">
                                                        4.56PM 01/01/2020
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card mb-3 one-news-album">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                            </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                        </div>
                                                        <div class="modal-body">

                                                            <img src="image/1.jpg"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <div class="name-user user-in-feeds-title">
                                                    <a href="google.com" title="Trang ca nhan" class="title-name">
                                                        <span class="acount-image">NT</span>
                                                        <span class="name-acount">
                                                            Nhu Thuong
                                                        </span>
                                                    </a>
                                                </div>
                                                <label class="strong-title-news">
                                                    <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                </label>
                                                <p class="card-text description">with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="info-card-album">
                                                <p class="info-album like-album">
                                                    <small class="text-muted text-left">
                                                        <3 123
                                                    </small>
                                                </p>
                                                <p class="info-album time-album">
                                                    <small class="text-muted text-right">
                                                        4.56PM 01/01/2020
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card mb-3 one-news-album">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                            </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                        </div>
                                                        <div class="modal-body">

                                                            <img src="{{ URL::asset('image/1.jpg') }}"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <div class="name-user user-in-feeds-title">
                                                    <a href="google.com" title="Trang ca nhan" class="title-name">
                                                        <span class="acount-image">NT</span>
                                                        <span class="name-acount">
                                                            Nhu Thuong
                                                        </span>
                                                    </a>
                                                </div>
                                                <label class="strong-title-news">
                                                    <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                </label>
                                                <p class="card-text description">with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="info-card-album">
                                                <p class="info-album like-album">
                                                    <small class="text-muted text-left">
                                                        <3 123
                                                    </small>
                                                </p>
                                                <p class="info-album time-album">
                                                    <small class="text-muted text-right">
                                                        4.56PM 01/01/2020
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card mb-3 one-news-album">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                            </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                        </div>
                                                        <div class="modal-body">

                                                            <img src="{{ URL::asset('image/1.jpg') }}"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <div class="name-user user-in-feeds-title">
                                                    <a href="google.com" title="Trang ca nhan" class="title-name">
                                                        <span class="acount-image">NT</span>
                                                        <span class="name-acount">
                                                            Nhu Thuong
                                                        </span>
                                                    </a>
                                                </div>
                                                <label class="strong-title-news">
                                                    <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                </label>
                                                <p class="card-text description">with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="info-card-album">
                                                <p class="info-album like-album">
                                                    <small class="text-muted text-left">
                                                        <3 123
                                                    </small>
                                                </p>
                                                <p class="info-album time-album">
                                                    <small class="text-muted text-right">
                                                        4.56PM 01/01/2020
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card mb-3 one-news-album">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                            </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                        </div>
                                                        <div class="modal-body">

                                                            <img src="{{ URL::asset('image/1.jpg') }}"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <div class="name-user user-in-feeds-title">
                                                    <a href="google.com" title="Trang ca nhan" class="title-name">
                                                        <span class="acount-image">NT</span>
                                                        <span class="name-acount">
                                                            Nhu Thuong
                                                        </span>
                                                    </a>
                                                </div>
                                                <label class="strong-title-news">
                                                    <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                </label>
                                                <p class="card-text description">with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="info-card-album">
                                                <p class="info-album like-album">
                                                    <small class="text-muted text-left">
                                                        <3 123
                                                    </small>
                                                </p>
                                                <p class="info-album time-album">
                                                    <small class="text-muted text-right">
                                                        4.56PM 01/01/2020
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card mb-3 one-news-album">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                            </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                        </div>
                                                        <div class="modal-body">

                                                            <img src="{{ URL::asset('image/1.jpg') }}"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <div class="name-user user-in-feeds-title">
                                                    <a href="google.com" title="Trang ca nhan" class="title-name">
                                                        <span class="acount-image">NT</span>
                                                        <span class="name-acount">
                                                            Nhu Thuong
                                                        </span>
                                                    </a>
                                                </div>
                                                <label class="strong-title-news">
                                                    <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                </label>
                                                <p class="card-text description">with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="info-card-album">
                                                <p class="info-album like-album">
                                                    <small class="text-muted text-left">
                                                        <3 123
                                                    </small>
                                                </p>
                                                <p class="info-album time-album">
                                                    <small class="text-muted text-right">
                                                        4.56PM 01/01/2020
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card mb-3 one-news-album">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="albums-tab-thumb sim-anim-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                                <img src="{{ URL::asset('image/1.jpg') }}" class="all studio img-thumbnail album-feeds"/>
                                            </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                        </div>
                                                        <div class="modal-body">

                                                            <img src="{{ URL::asset('image/1.jpg') }}"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p class="modal-detail" id="exampleModalLabel">Detail</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <div class="name-user user-in-feeds-title">
                                                    <a href="google.com" title="Trang ca nhan" class="title-name">
                                                        <span class="acount-image">NT</span>
                                                        <span class="name-acount">
                                                            Nhu Thuong
                                                        </span>
                                                    </a>
                                                </div>
                                                <label class="strong-title-news">
                                                    <strong class="mt-2 mb-2 tieude-photo">This is a wider card </strong>
                                                </label>
                                                <p class="card-text description">with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            <div class="info-card-album">
                                                <p class="info-album like-album">
                                                    <small class="text-muted text-left">
                                                        <3 123
                                                    </small>
                                                </p>
                                                <p class="info-album time-album">
                                                    <small class="text-muted text-right">
                                                        4.56PM 01/01/2020
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                        </div>
                    </div>
                </div>
            </main>
            <footer>

            </footer>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
                <script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
                <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
                <script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>


            <script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
            <script>
                //phaan trang 
                $("#tab").pagination({
                    items: 6,
                    contents: 'feeds-album',
                    previous: 'Previous',
                    next: 'Next',
                    position: 'bottom',
                });
            </script>
        </body>
        </html>