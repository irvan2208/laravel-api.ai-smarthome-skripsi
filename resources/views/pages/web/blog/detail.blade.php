@extends('layouts.app')

@push('custom_meta')
<meta property="og:url"                content="{{Request::url()}}" />
<meta property="og:type"               content="Blog" />
<meta property="og:title"              content="{{$blog->title}}" />
<meta property="og:description"        content="{{$blog->content}}" />
<meta property="og:image"              content="{{ $blog->image_url }}" />
@endpush
@push('custom_css')
<style type="text/css">
  #social-links ul {
    padding-left: 0;
  }
  #social-links li {
    list-style: none;
  }

  #social-links {
    display: -webkit-inline-box;
  }
  #comment-btn-div {
    display: flex;
    flex: 1;
    justify-content: flex-end;
  }
  .lqt-post-text p span {
    word-break: break-all;
    display: block;
}
  }
</style>
@endpush
@section('content')
<section id="lqt-banner">
    <div class="lqt-header-banner">
        <div class="container">
            <div class="lqt-title">
                <h1>Blog</h1>
            </div>
        </div>
    </div>
</section>
<section id="lqt-content">
    <div class="lqt-content-wrapper lqt-blog-detail">
        <div class="container">
            <h1 class="lqt-m0 text-center">{{ $blog->title }}</h1>
            <div class="row lqt-blog-detail-content">
                <div class="col-md-6">
                    <img class="lqt-img-full" src="{{ $blog->image_url }}">
                    <br>
                    <br>
                </div>
                <div class="col-md-6">
                    <h2 class="lqt-mt0 lqt-fw300">{!! $blog->content !!}</h2>
                </div>
                <div class="col-md-12 lqt-blog-comment">
                    <h2 class="lqt-fw400">{{ $blog->created_at->format('F, jS h:i A') }}</h2>
                    <span>{{ $blog->comments->count() }} Comment(s)</span>
                    <span><span id="likes-count" style="margin-right: 5px">{{ $blog->likes->count() }}</span><a href="javascript:void(0)" @if(Auth::check()) id="like-button" @endif>Like(s)</a></span>
                    <span>Share : {!!Share::currentPage()->facebook()!!}</span>
                    {{-- <span>4 Shares</span> --}}
                    @if (Auth::check())
                      <div class="lqt-blog-comment-box">
                          <img src="{{ Auth::user()->profile ? Auth::user()->profile->avatar_url : '' }}">
                          <textarea rows="4" placeholder="Write someting..." id="comment-box"></textarea>
                          <div id="comment-btn-div">
                            <button type="button" class="btn btn-primary" id="comment-btn">Post</button>
                          </div>
                      </div>
                    @endif
                    <div id="blog-comments">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('pushscript')
  <script>
    function loadComments() {
      $.ajax({
        type: 'POST',
        url: '{{ route('blog.comments', ['blog' => $blog]) }}',
        data: {
          _token : '{{ csrf_token() }}'
        },
        success: function (comments) {
          $('#blog-comments').html('');
          $.each(comments, function (index, comment) {
            var avatar_url = '';
            if (comment.user) {
              if (comment.user.profile) {
                avatar_url = comment.user.profile.avatar_url;
              }
            }

            var result = `<div class="lqt-post-list lqt-list-second">
                              <img class="lqt-user-photo lqt-photo-post-list" src="`+avatar_url+`">
                              <div class="lqt-post-text">
                                  <p class="lqt-m0"><a class="lqt-fco" href="#">`+comment.user.fullname+`</a> <span>`+comment.message+`</span></p>
                                  <small class="lqt-fcg">`+comment.posted_on+`</small>
                                  <div class="lqt-post-action">
                                  </div>
                              </div>
                          </div>`;

            $('#blog-comments').append(result);
          })


        }
      });
    }

    function postComment() {
      $.ajax({
        url: '{{ route('blog.comments.store', ['blog' => $blog]) }}',
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          message: $('#comment-box').val()
        },
        success: function (data) {
          $('#comment-box').val('');
          loadComments();
        }
      });
    }

    $(document).ready( function () {
      loadComments();

      $('#comment-box').on('keydown', function (e) {
        if (e.keyCode == '13') {
          postComment();
        }
      });

      $('#comment-btn').on('click', function() {
        postComment();
      });

      $('#like-button').click( function () {
        $.ajax({
          url: '{{ route('user.blog.like', ['blog' => $blog]) }}',
          type: 'POST',
          data: {
            _token: '{{ csrf_token() }}'
          },
          success : function (data) {
            var likeCount = $('#likes-count').text();

            var latestLikeCount = parseFloat(likeCount) + parseFloat(data);

            $('#likes-count').text(latestLikeCount);
          }
        });
      });
    })
  </script>
  <script src="{{ asset('js/share.js') }}"></script>
@endpush