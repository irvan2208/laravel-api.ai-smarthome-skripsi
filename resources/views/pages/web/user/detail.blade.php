@extends('layouts.app')
@push('custom_css')
  <style>
    .profile-wrapper {
      padding: 20px 0;
    }

    .no-padding-left {
      padding-left: 0 !important;
    }

    .no-padding-right {
      padding-right: 0 !important;
    }
    img.lqt-post-photo {
      cursor: pointer;
      transition: 0.3s;
    }
    img.lqt-post-photo:hover {
      opacity: 0.7;
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
            <div class="lqt-title">
                <h1>{{ $user->fullname }}</h1>
            </div>
        </div>
    </div>
</section>
<section id="lqt-content">
    <div class="lqt-content-wrapper lqt-user-post profile-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <img class="lqt-user-photo" src="{{ $user->profile ? $user->profile->avatar_url : '' }}">
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="lqt-post-box">
                        <form id="post-form" file="true">
                          <textarea rows="5" placeholder="Write something..." id="post-textarea" name="post"></textarea>
                          <div>
                            <div class="row" id="media-box"></div>
                          </div>
                          <a class="lqt-box-attc" href="javascript:void(0)" id="image-icon"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                          <input type="file" multiple style="display: none;" id="fileInput" name="files[]">
                          <a class="lqt-box-attc" data-toggle="modal" href="#locationPopOut"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                          <a class="lqt-box-attc" href="javascript:void(0)" id="location-label"></a>
                          <input type="hidden" id="locationId" name="location_id">
                          <div class="pull-right">
                            <a class="btn btn-default" id="clear-post-btn">Cancel</a>
                            <a class="btn btn-primary" id="submit-post-btn">Post</a>
                          </div>
                        </form>
                    </div>
                    <div id="post-area" style="min-height: 50vh;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" role="dialog" id="locationPopOut">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="text-center">
          <h3>Search For Vendor</h3>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="search">Input a vendor name</label>
          <br>
          <select class="form-control" id="location-search"></select>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('pushmodal')
<div id="imgPopup" class="modal-img">
  <span class="close-img" id="closeModalImgClose">&times;</span>
  <img class="modal-content-img" id="imgModalImgContent">
</div>
@endpush

@push('pushscript')
  <script>
  $(document).ready(function () {
    $('#post-textarea').on('keydown', function (e) {
      if (e.which == 13) {
        e.preventDefault();
        sendPost();
      }
    });

    $('#image-icon').click(function () {
      $('#fileInput').trigger('click');
    });

    $('#fileInput').change(function () {
      var files = this.files;

      $.each(files, function (index, file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var image = `<div class="col-md-4"><img class="img-responsive" style="max-width: 240px;" src="`+e.target.result+`"></img></div>`;
            $('#media-box').append(image);
        }

        reader.readAsDataURL(file);
      })
    })

    $('#location-search').select2({
      width: '100%',
      ajax: {
        url: '{{ route('vendor.get.names') }}',
        dataType: 'json',
        type: "GET",
        quietMillis: 50,
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
        },
        cache: true
      }
    })
    .on('change', function (){
      $('#location-label').html('');
      $('#locationPopOut').modal('toggle');
      var id = $(this).val();
      var data = ($(this).select2('data'));
      var text = data[0].text;

      $('#locationId').val(id);
      $('#location-label').html('<span class="label label-warning location-tag">'+text+' &nbsp;<i class="fa fa-times"></i></span>');
    });

    $('#clear-post-btn').click( function () {
      clearPost();
    });

    $('#submit-post-btn').click( function () {
      sendPost();
    })

    loadPost();
  });

  function loadPost() {
    $.ajax({
      url: '{{ route('user.post.list', ['user' => $user]) }}',
      type: 'post',
      data: {
        _token: '{{ csrf_token() }}',
      },
      success: function (data) {
        $('#post-area').html('');
        $.each(data, function (index, post) {

          var container = $('<div class="lqt-post-list"></div>');
          var userImage = $('<img class="lqt-user-photo lqt-photo-post-list first" src="'+post.user.profile.avatar_url+'">');
          var postBody = $('<div class="lqt-post-text"></div>');

          var location = '';

          if (post.location) {
            var url = 'javascript:void(0)';
            post.location.vendorable_type = post.location.vendorable_type.replace(/\\/g, '');
            if (post.location.vendorable_type == '{{ VendorableType::RESTAURANT }}') {
              url = '{{ route('vendor.detail', ['slug' => 'SLUG']) }}';
              url = url.replace('SLUG', post.location.slug);
            }

            var location = ` - <a class="lqt-fco" href="`+ url +`"><span class="fa fa-map-marker"></span> `+post.location.name+`</a>`;
          }

          postBody.append(`<p class="lqt-m0">`+post.body + location +`</p>
                          <small class="lqt-fcg">`+post.posted_on+`</small>`);

          if (post.medias.length) {
              var row = $(`<div class="row"></div>`)
              $.each(post.medias, function (index, media) {
                if (index == 0) {
                  postBody.append(`<img class="lqt-post-photo" src="`+media.image_url+`" onclick="onClickImg(this)">`);
                }

                if (index == 1) {
                  row.append(`<div class="col-md-6"><img class="lqt-post-photo" src="`+media.image_url+`" onclick="onClickImg(this)"></div>`);
                }

                if (index == 2) {
                  if (post.medias.length > 3) {
                    row.append(`<div class="col-md-6">`+ (post.medias.length - 2)+` more </div>`);
                  } else {
                    row.append(`<div class="col-md-6"><img class="lqt-post-photo" src="`+media.image_url+`" onclick="onClickImg(this)"></div>`);
                  }
                }
              });

              if (post.medias.length > 1) {
                postBody.append(row);
              }

          }

          postBody.append(`<div class="lqt-post-action">
                              <a href="javascript:void(0)" class="like-button" post-id="`+post.id+`">Like</a>
                              <a href="javascript:void(0)" onclick="openCommentBox(this)">Comment</a>
                          </div>`);

          postBody.append(`<div class="lqt-post-status">
                              <span><span style="margin-right: 5px" class="like-count">`+post.like_count+`</span>Like(s)</span>
                          </div>`);

          postBody.append(`
            <div class="lqt-post-box" style="display:none">
              <textarea rows="5" post-id="`+post.id+`" placeholder="Write something..." class="comment-textarea"></textarea>
            </div>`
            );

          container.append(userImage);
          container.append(postBody);

          $('#post-area').append(container);

          $.each(post.comments, function (index, comment) {
            var avatar_url = '';
            var commentContainer = $('<div class="lqt-post-list lqt-list-second"></div>`');

            if (comment.user.profile) {
              avatar_url = comment.user.profile.avatar_url;
            }

            var commentUserImage = $('<img class="lqt-user-photo lqt-photo-post-list" src="'+avatar_url+'">');

            var commentBody = $(`<div class="lqt-post-text">
                                  <p class="lqt-m0"><a class="lqt-fco" href="javascript:void(0)">`+comment.user.fullname+`</a> `+ comment.message +`</p>
                                  <small class="lqt-fcg">`+comment.posted_on+`</small>
                                </div>`);

            commentContainer.append(commentUserImage);
            commentContainer.append(commentBody);

            $('#post-area').append(commentContainer);

          });
        });
      }
    })
  }

  function onClickImg(img) {
    var imgSrc = $(img).attr('src');
    $('#imgPopup').css('display', 'block');
    $('#imgModalImgContent').attr('src', imgSrc);
    $(".lqt-home").css('overflow', 'hidden');
  }

  function sendPost() {
    var formData = new FormData($('#post-form')[0]);
    $.ajax({
      processData: false,
      contentType: false,
      type: 'POST',
      url: '{{ route('user.post') }}',
      data: formData,
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
      success: function (data) {
        clearPost();
        loadPost();
      }
    });
  }

  function clearPost()
  {
    $('#post-textarea').val('');
    $('#media-box').html('');
    $('#locationId').val(null);
    $('#location-label').html('');
    $('#fileInput').val(null);
  }

  function openCommentBox(element) {
    $(element).parent().next().next().show();
  }

  $('#imgPopup, #closeModalImgClose').on('click', function() {
    $('#imgPopup').css('display', 'none');
    $(".lqt-home").css('overflow', 'auto');
  });

  $('#post-area').on('keydown', '.comment-textarea', function (e) {
    if (e.keyCode == '13') {
      e.preventDefault();

      var element = $(this);
      var message = element.val();
      var postId = element.attr('post-id');

      $.ajax({
        url: '{{ route('user.post.comment') }}',
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          post_id: postId,
          message: message
        },
        success: function (response) {
          loadPost();
        }
      });
    }
  });

  $('#post-area').on('click', '.like-button', function () {

    var url = '{{ route('user.post.like', ['post' => 'POSTID']) }}';

    url = url.replace('POSTID', $(this).attr('post-id'));;

    var element = $(this);

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        _token: '{{ csrf_token() }}'
      },
      success : function (data) {

        var likeElement = element.parent().next().find('.like-count');

        var likeCount = likeElement.text();

        var latestLikeCount = parseFloat(likeCount) + parseFloat(data);

        $(likeElement).text(latestLikeCount);
      }
    });
  });

  $('#location-label').on('click', '.location-tag', function () {
    $('#locationId').val(null);
    $('#location-label').html('');
  })

  </script>
@endpush