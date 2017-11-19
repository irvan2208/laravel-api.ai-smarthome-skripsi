@extends('layouts.app')

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
    <div class="lqt-content-wrapper lqt-blog-list">
        <div class="container" style="min-height: 50vh;">
            <div class="row lqt-masonry">
                @foreach($blogs as $blog)
                <div class="col-md-4 col-sm-6 col-xs-12 lqt-masonry-item">
                    <a href="{{route('blog.details.web',$blog->slug)}}">
                        <img src="{{$blog->image_url}}">
                        <div class="lqt-blog-desc" style="opacity: 0.7;">
                            <h3 class="lqt-m0 lqt-desc-title">{{$blog->title}}</h3>
                            <h3 class="lqt-m0 lqt-fw300">{{ strip_tags($blog->content_preview) }}</h3>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <h3 class="lqt-m0 lqt-fw400 text-center"><a href="#">Older Post</a></h3>
        </div>
        {{-- <div class="container">
            <div class="row lqt-masonry">
                <div class="col-md-4 col-sm-6 col-xs-12 lqt-masonry-item">
                    <img src="img/blog-1.jpg">
                    <div class="lqt-blog-desc">
                        <h3 class="lqt-m0 lqt-desc-title">Healty Food or Just a Lie?</h3>
                        <h3 class="lqt-m0 lqt-fw300">In everyday life we are just an inch away from the...</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 lqt-masonry-item">
                    <img src="img/blog-2.jpg">
                    <div class="lqt-blog-desc">
                        <h3 class="lqt-m0 lqt-desc-title">Healty Food or Just a Lie?</h3>
                        <h3 class="lqt-m0 lqt-fw300">In everyday life we are just an inch away from the...</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 lqt-masonry-item">
                    <img src="img/blog-3.jpg">
                    <div class="lqt-blog-desc">
                        <h3 class="lqt-m0 lqt-desc-title">Healty Food or Just a Lie?</h3>
                        <h3 class="lqt-m0 lqt-fw300">In everyday life we are just an inch away from the...</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 lqt-masonry-item">
                    <img src="img/blog-4.jpg">
                    <div class="lqt-blog-desc">
                        <h3 class="lqt-m0 lqt-desc-title">Healty Food or Just a Lie?</h3>
                        <h3 class="lqt-m0 lqt-fw300">In everyday life we are just an inch away from the...</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 lqt-masonry-item">
                    <img src="img/blog-5.jpg">
                    <div class="lqt-blog-desc">
                        <h3 class="lqt-m0 lqt-desc-title">Healty Food or Just a Lie?</h3>
                        <h3 class="lqt-m0 lqt-fw300">In everyday life we are just an inch away from the...</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 lqt-masonry-item">
                    <img src="img/blog-6.jpg">
                    <div class="lqt-blog-desc">
                        <h3 class="lqt-m0 lqt-desc-title">Healty Food or Just a Lie?</h3>
                        <h3 class="lqt-m0 lqt-fw300">In everyday life we are just an inch away from the...</h3>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12 lqt-masonry-item">
                    <img src="img/blog-7.jpg">
                    <div class="lqt-blog-desc">
                        <h3 class="lqt-m0 lqt-desc-title">Healty Food or Just a Lie?</h3>
                        <h3 class="lqt-m0 lqt-fw300">In everyday life we are just an inch away from the...</h3>
                    </div>
                </div>
            </div>
            <h3 class="lqt-m0 lqt-fw400 text-center"><a href="#">Older Post</a></h3>
        </div> --}}
    </div>
</section>
@endsection

@push('pushscript')

@endpush