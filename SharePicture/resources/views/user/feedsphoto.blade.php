@extends('user.home')

@section('title','Feeds Photo')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{URL::asset('css/heart.css')}}">

    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('css/main_hover_album.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ URL::asset('css/sim-prev-anim.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('css/pagination.css') }}" rel="stylesheet" type="text/css">
@endsection



@section('content')
<div class="row">
    <div class="first-row-body p-3 text-center">
        <div class="btn-group btn-group-toggle">

            <a href="{{ url('/') }}" class="btn btn-secondary radio-seentype active">Photo</a>
            <a href="{{ url('/feedsalbum') }}" class="btn btn-secondary radio-seentype">Album</a>
        </div>
    </div>
</div> 
<div class="row feeds-album">
    @foreach($value as $photo)
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card mb-3 one-news-album">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-6 col-6">
                    <div class="albums-tab-thumb sim-anim-3 p-3"  data-toggle="modal" data-target="#exampleModal{{ $photo['idPhoto'] }}">
                        <input type="hidden" value="{{ $photo['idPhoto'] }}">
                        <img src="https://drive.google.com/uc?export=view&id={{ $photo['pathimg'] }}" class="all studio img-thumbnail album-feeds"/>
                    </div>
                    <div class="modal fade" id="exampleModal{{ $photo['idPhoto'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">{{ $photo['tieude'] }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <img src="https://drive.google.com/uc?export=view&id={{ $photo['pathimg'] }}"/>
                          </div>
                          <div class="modal-footer" style="justify-content: normal">
                            <p>{{ $photo['mota'] }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card-body">
                        <div class="name-user user-in-feeds-title">
                            <a href="google.com" title="Trang ca nhan" class="title-name">
                                <span><img class="img-avatar" src="https://drive.google.com/uc?export=view&id={{ $photo['pathavatar'] }}" alt=""></span>
                                <span class="name-acount">
                                   {{ $photo['username'] }}
                                </span>
                            </a>
                        </div>
                        <label class="strong-title-news">
                            <strong class="mt-2 mb-2 tieude-photo">{{ substr($photo['tieude'],0,16) }}</strong>
                        </label>
                        <p class="card-text description">{{ substr($photo['mota'],0,80) }}</p>
                    </div>
                    <div class="info-card-album">
                            <input type="checkbox" name="checkbox{{ $photo['idPhoto'] }}" id="checkbox{{ $photo['idPhoto'] }}" class="css-checkbox" />
                            <label for="checkbox{{ $photo['idPhoto'] }}" class="css-label">1234</label>
                        <p class="info-album time-album">
                            <small class="text-muted text-right">
                                {{ $photo['ngaygio']->format('d-m-Y H:i') }}
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection

@section('script')

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
@endsection
