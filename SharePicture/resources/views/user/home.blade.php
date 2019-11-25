<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fotobook</title>



    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('css/main_hover_album.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ URL::asset('css/sim-prev-anim.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">
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
                    <div class="row">
                        <div class="first-row-body p-3 text-center">
                            <div class="btn-group btn-group-toggle">

                                <a href="{{ url('/') }}" class="btn btn-secondary radio-seentype active">Photo</a>
                                <a href="{{ url('/feedsAlbum') }}" class="btn btn-secondary radio-seentype">Album</a>
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