@extends('layouts.app')
@push('custom_css')
  <style>
    .lqt-vendor .lqt-header-banner {
        background: url(../img/bg-separator.png), linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ $vendor->wallpaper_url }}');
        background-size: 100% auto, auto, cover;
        background-position: bottom, center, center;
        background-repeat: no-repeat, no-repeat, no-repeat;
    }
    .lqt-place-desc {
        padding: 0;
    }
    .lqt-star-gray {
        color: #dad9d9;
    }
    #modalRating {
        margin-top: 5px;
    }
    img.lqt-today-attc {
        cursor: pointer;
        transition: 0.3s;
    }
    img.lqt-today-attc:hover {
        opacity: 0.7;
    }
    img.menu-img {
        cursor: pointer;
    }
    .lqt-list-content {
        width: 100%
    }
    .lqt-list-content > div {
        display: flex;
    }
    .lqt-list-content > div > h3:first-child {
        flex: 1;
    }

    
    /* The Modal (background) */
    .modal-img {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        padding-bottom: 50px;
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }
    /* Modal Content (image) */
    .modal-content-img {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        border-radius: 0;
    }
    /* Add Animation */
    .modal-content-img, #caption {    
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }
    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
    }
    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }
    /* The Close Button */
    .close-img {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    .close-img:hover,
    .close-img:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content-img {
            width: 100%;
        }
    }
  </style>
@endpush
@section('content')
<section id="lqt-banner">
    <div class="lqt-header-banner">
        <div class="container">
            <div class="lqt-vendor-main">
                <div class="lqt-vendor-rating">
                    @for ($i = 1; $i <= 5; $i++)
                      @if($i <= $vendor->average_rating)
                        <i class="fa fa-star full" aria-hidden="true"></i>
                      @else
                        <i class="fa fa-star" aria-hidden="true"></i>
                      @endif
                    @endfor
                </div>
                <img class="lqt-vendor-img" src="{{ $vendor->logo_url }}">
                <h1 class="lqt-m0">{{ $vendor->name }}</h1>
                <p class="lqt-m0">{{ $vendor->address }}</p>
                {{-- <p class="lqt-m0">Batam Center - 29464</p> --}}
                <p class="lqt-m0">{{ $vendor->phone }}</p>
                <p class="lqt-m0"><a href="http://{{ $vendor->website }}" target="_blank">{{ $vendor->website }}</a></p>
            </div>
        </div>
    </div>
</section>
@if(!$vendor->userReviewed())
<section id="lqt-vendor-content">
    <div class="lqt-vendor-content-wrapper">
        <div class="container">
            <h1 class="text-center lqt-fcw lqt-m0">Kindly Review</h1>
            <h1 class="text-center lqt-fcw lqt-m0 lqt-fw300">our restaurant</h1>
            <div class="lqt-submit-stars text-center">
                {{ Form::open(['url' => route('user.review', ['restaurant' => $vendor]), 'method' => 'POST']) }}
                    <div class="lqt-star-wrapper">
                        <input class="lqt-star lqt-star-5" id="lqt-star-5-2" type="radio" name="star" value="5">
                        <label class="lqt-star lqt-star-5" for="lqt-star-5-2"></label>
                        <input class="lqt-star lqt-star-4" id="lqt-star-4-2" type="radio" name="star" value="4">
                        <label class="lqt-star lqt-star-4" for="lqt-star-4-2"></label>
                        <input class="lqt-star lqt-star-3" id="lqt-star-3-2" type="radio" name="star" value="3">
                        <label class="lqt-star lqt-star-3" for="lqt-star-3-2"></label>
                        <input class="lqt-star lqt-star-2" id="lqt-star-2-2" type="radio" name="star" value="2">
                        <label class="lqt-star lqt-star-2" for="lqt-star-2-2"></label>
                        <input class="lqt-star lqt-star-1" id="lqt-star-1-2" type="radio" name="star" value="1">
                        <label class="lqt-star lqt-star-1" for="lqt-star-1-2"></label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-offset-3 col-md-6">
                        {{-- <div class="form-group">
                            <input class="form-control lqt-form-control" type="text" placeholder="Title..." name="title">
                        </div> --}}
                        <div class="form-group">
                            <textarea name="message" class="form-control lqt-form-control" name="name" rows="3" placeholder="Type your review..."></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default lqt-btn-submit" type="submit">Submit</button>
                        </div>
                    </div>
                  {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@endif

@if (!Auth::check())
    
<section id="lqt-vendor-content">
    <div class="lqt-vendor-content-wrapper">
        <div class="container">
            <h1 class="text-center lqt-fcw lqt-m0">Login to review</h1>
            <div class="lqt-submit-stars text-center">
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-group">
                        <a href="#" class="btn btn-default lqt-btn-submit" style="margin-top: 20px" data-toggle="modal" data-target="#lqt-modal-login">Login</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endif

<section id="lqt-vendor-content">
    <div class="lqt-vendor-content-wrapper lqt-vendor-content-rating">
        <div class="container">
            @if($vendor->reviews->count())
            <div class="lqt-rating-slider">
                <div class="carousel slide" id="lqt-review">
                    <div class="carousel-inner">
                        @foreach($vendor->reviews as $key => $review)
                        <div class="item @if($key == 0) active @endif">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="lqt-review-list">
                                    <img src="{{ $review->user()->withTrashed()->first()->profile ? $review->user()->withTrashed()->first()->profile->avatar_url : '' }}">
                                    <p class="lqt-m0">{{ $review->user()->withTrashed()->first()->fullname }}</p>
                                    <div class="lqt-vendor-rating">
                                      @for ($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                        <i class="fa fa-star full" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        @endif
                                      @endfor
                                    </div>
                                    <h5>{{ $review->title }}</h5>
                                    <p class="lqt-m0 lqt-fw300 lqt-wrap">
                                        {{ $review->content_preview }} <br />
                                        @if (strlen($review->content_preview) > 30) <!-- Change this limit, also need change App\Model\Review.php -->
                                            <a class="lqt-fco read-more" review="{{ $review->id }}" href="#" data-toggle="modal" data-target="#myModal">Read More</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#lqt-review" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#lqt-review" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
            @endif

            @if (count($vendor->userStories))
            <h1 class="text-center lqt-fcw">CUSTOMER'S STORY</h1>
            <div class="lqt-rating-slider">
                <div class="carousel slide" id="lqt-today">
                    <div class="carousel-inner">
                        @foreach($vendor->userStories as $key => $userStory)
                          <div class="item  @if($key == '0') active @endif">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                  <div class="lqt-today-list">
                                      <div class="row">
                                          <div class="col-md-3 lqt-pr0">
                                              <img class="lqt-today-pp" src="{{ $userStory->user()->withTrashed()->first()->profile ? $userStory->user()->withTrashed()->first()->profile->avatar_url : '' }}">
                                          </div>
                                          <div class="col-md-9 lqt-today-right-col">
                                              <p class="lqt-mb0 lqt-fcw">{{ $userStory->user()->withTrashed()->first()->fullname }}</p>
                                              <p class="lqt-m0 lqt-fcw">{{ $userStory->body }}</p>
                                              @if ($userStory->medias->count())
                                                @if($userStory->medias->first()->type == MediaType::IMAGE)
                                                <img class="lqt-today-attc" src="{{ $userStory->medias->first()->image_url }}" onclick="onClickImg(this)">
                                                @endif
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#lqt-today" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#lqt-today" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<section id="lqt-banner-title">
    <div class="lqt-banner-title lqt-title-place">
        Our Place
    </div>
</section>
<section id="lqt-place-desc" class="lqt-bgdb">
    <div class="lqt-place-desc">
        <div class="container">
            <div class="col-md-offset-1 col-md-10">
                <br>
                <h4 class="lqt-m0 lqt-fw300 lqt-fcw text-center">{{ $vendor->description }}</h4>
            </div>
            <div class="clearfix"></div>
            <div class="row lqt-masonry">
                @foreach($vendor->medias as $media)
                    <div class="col-md-3 col-xs-6 lqt-masonry-item"><img src="{{ $media->image_url }}"></div>
                @endforeach
                {{--  <div class="col-md-3 col-xs-6 lqt-masonry-item"><img src="img/masonry-2.jpg"></div>
                <div class="col-md-3 col-xs-6 lqt-masonry-item"><img src="img/masonry-3.jpg"></div>
                <div class="col-md-3 col-xs-6 lqt-masonry-item"><img src="img/masonry-4.jpg"></div>
                <div class="col-md-3 col-xs-6 lqt-masonry-item"><img src="img/masonry-5.jpg"></div>
                <div class="col-md-3 col-xs-6 lqt-masonry-item"><img src="img/masonry-6.jpg"></div>
                <div class="col-md-3 col-xs-6 lqt-masonry-item"><img src="img/masonry-7.jpg"></div>
                <div class="col-md-3 col-xs-6 lqt-masonry-item"><img src="img/masonry-8.jpg"></div>
                <div class="col-md-3 col-xs-6 lqt-masonry-item"><img src="img/masonry-9.jpg"></div>  --}}
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div id="map" style="height: 450px;"></div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('pushmodal')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" id="modalFullName"></h4>
            </div>
            <div class="modal-body text-center">
                <div class="lqt-review-list" style="color: black">
                    <img id="modalProfileAvatar"/>
                    <div class="lqt-vendor-rating" id="modalRating">

                    </div>
                    <h5 id="modalTitle"></h5>
                    <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <p class="lqt-m0 lqt-fw300 lqt-wrap" id="modalContent"></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="imgPopup" class="modal-img">
    <span class="close-img" id="closeModalImgClose">&times;</span>
    <img class="modal-content-img" id="imgModalImgContent">
</div>
@endpush

@push('pushscript')
<script>
    function initMap() {
        @if($vendor && ($vendor->latitude!='' && $vendor->longitude!=''))
            var posL = {lat: {{$vendor->latitude}}, lng: {{$vendor->longitude}}};
        @else
            var posL = {lat: 1.1272642, lng: 104.01432};
        @endif
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: posL
        });
        var marker = new google.maps.Marker({
        position: posL,
        map: map,
        animation: google.maps.Animation.DROP,
        });

        map.setCenter(marker.position);
        marker.setMap(map);
    }

    function onClickImg(img) {
        var imgSrc = $(img).attr('src');
        $('#imgPopup').css('display', 'block');
        $('#imgModalImgContent').attr('src', imgSrc);
        $(".lqt-vendor").css('overflow', 'hidden');
    }

  $(document).ready(function() {
        $('.read-more').click( function() {
            var reviewId = $(this).attr('review');
            var url = "{{ route('get.vendor.review', ['review' => 'REVIEW']) }}";
            url = url.replace('REVIEW', reviewId);
            
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(review) {
                    $('#modalRating').empty();
                    var imgProfile = review.user.profile ? review.user.profile.avatar_url : "";
                    $('#modalProfileAvatar').attr('src', imgProfile);
                    $('#modalFullName').text(review.user.fullname + "'s review");
                    var rating = '';
                    for (var i = 1; i <= 5; i++) {
                        if (i <= review.rating) {
                            rating += '<i class="fa fa-star full" aria-hidden="true"></i>';
                        } else {
                            rating += '<i class="fa fa-star lqt-star-gray" aria-hidden="true"></i>'
                        }
                    }
                    $('#modalRating').append(rating);
                    $('#modalTitle').text(review.title);
                    $('#modalContent').text(review.message);
                }
            });
        });

        $('#imgPopup, #closeModalImgClose').on('click', function() {
            $('#imgPopup').css('display', 'none');
            $(".lqt-vendor").css('overflow', 'auto');
        });
  });
</script>
@endpush
