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
                    @foreach($blogs as $blog)
                    <div class="entry col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="grid-inner">
                            <div class="entry-image">
                                <a href="{{$blog->image}}" data-lightbox="image"><img src="{{$blog->image}}" alt="{{$blog->title}}"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="{{url('blog',$blog->id)}}">{{$blog->title}}</a></h2>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="icon-calendar3"></i> {{\Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}</li>
{{--                                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>--}}
                                    <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>{{substr($blog->description,1,200)}}</p>
                                <a href="{{url('blog',$blog->id)}}" class="more-link">{{__('lang.readMore')}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!-- #posts end -->

                <!-- Pagination
                ============================================= -->
                <ul class="pagination mt-5 pagination-circle justify-content-center">
                    @php
                        $paginator =$blogs->appends(request()->input())->links()->paginator;
                            if ($paginator->currentPage() < 2 ){
                                $link = $paginator->currentPage();
                            }else{
                                 $link = $paginator->currentPage() -1;
                            }
                            if($paginator->currentPage() == $paginator->lastPage()){
                                       $last_links = $paginator->currentPage();
                            }else{
                                       $last_links = $paginator->currentPage() +1;

                            }
                    @endphp
                    @if ($paginator->lastPage() > 1)

                        <ul class="pagination  mt-5 pagination-circle justify-content-center">
                            <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} page-item">
                                <a class="page-link" href="{{ $paginator->url(1) }}">{{__('lang.first')}} </a>
                            </li>
                            @for ($i = $link; $i <= $last_links; $i++)
                                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }} page-item">
                                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} page-item">
                                <a class="page-link"
                                   href="{{ $paginator->url($paginator->lastPage()) }}">{{__('lang.Last')}}</a>
                            </li>
                        </ul>
                    @endif

                </ul>

            </div>
        </div>
    </section><!-- #content end -->

@endsection
