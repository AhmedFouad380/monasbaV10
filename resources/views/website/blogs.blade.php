@extends('website.layout')
@section('title')

    {{__('lang.blogs')}}
@endsection
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1> {{__('lang.blogs')}}</h1>
            <span>{{__('lang.Our Latest News in Grid Layout')}}</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('lang.Home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">    {{__('lang.blogs')}}
                </li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <!-- Posts
                ============================================= -->
                <div id="posts" class="post-grid row grid-container gutter-30" data-layout="fitRows">

                    <div class="entry col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="grid-inner">
                            <div class="entry-image">
                                <a href="images/blog/full/17.jpg" data-lightbox="image"><img src="images/blog/grid/17.jpg" alt="Standard Post with Image"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="icon-calendar3"></i> 10th Feb 2021</li>
                                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
                                    <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
                                <a href="blog-single.html" class="more-link">Read More</a>
                            </div>
                        </div>
                    </div>

                </div><!-- #posts end -->

                <!-- Pagination
                ============================================= -->
                <ul class="pagination mt-5 pagination-circle justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#"><i class="icon-angle-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="icon-angle-right"></i></a></li>
                </ul>

            </div>
        </div>
    </section><!-- #content end -->

@endsection
