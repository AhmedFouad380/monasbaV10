@extends('website.layout')
@section('title')
    {{$data->title}}
@endsection

@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('lang.Home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{url('Blogs')}}">{{__('lang.Blogs')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">    {{$data->title}}
                </li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="single-post mb-0">

                    <!-- Single Post
                    ============================================= -->
                    <div class="entry clearfix">

                        <!-- Entry Title
                        ============================================= -->
                        <div class="entry-title">
                            <h2> {{$data->title}}</h2>
                        </div><!-- .entry-title end -->

                        <!-- Entry Meta
                        ============================================= -->
                        <div class="entry-meta">
                            <ul>
                                <li><i class="icon-calendar3"></i> {{\Carbon\Carbon::parse($data->created_at)->format('Y-m-d')}}</li>
{{--                                <li><a href="#"><i class="icon-user"></i> }}</a></li>--}}
{{--                                <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>--}}
                                <li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>
                                <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                            </ul>
                        </div><!-- .entry-meta end -->

                        <!-- Entry Image
                        ============================================= -->
                        <div class="entry-image bottommargin">
                            <a href="#"><img src=" {{$data->image}}" alt=" {{$data->title}}"></a>
                        </div><!-- .entry-image end -->

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content mt-0">

                            <p>
                                {!! $data->description !!}
                            </p><!-- Post Single - Content End -->

                            <!-- Tag Cloud
                            ============================================= -->
{{--                            <div class="tagcloud clearfix bottommargin">--}}
{{--                                <a href="#">general</a>--}}
{{--                                <a href="#">information</a>--}}
{{--                                <a href="#">media</a>--}}
{{--                                <a href="#">press</a>--}}
{{--                                <a href="#">gallery</a>--}}
{{--                                <a href="#">illustration</a>--}}
{{--                            </div><!-- .tagcloud end -->--}}

                            <div class="clear"></div>

                            <!-- Post Single - Share
                            ============================================= -->
                            <div class="si-share border-0 d-flex justify-content-between align-items-center">
                                <div class="si-share d-flex justify-content-between align-items-center mt-4">
                                    <span>{{__('lang.Share')}}:</span>
                                    <div>
                                        <!-- AddToAny BEGIN -->
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                            <a class="a2a_button_facebook"></a>
                                            <a class="a2a_button_whatsapp"></a>
                                            <a class="a2a_button_x"></a>
                                            <a class="a2a_button_linkedin"></a>
                                            <a class="a2a_button_telegram"></a>
                                            <a class="a2a_button_facebook_messenger"></a>
                                        </div>
                                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                                        <!-- AddToAny END -->
                                    </div>
                                </div><!-- Product Single - Share End -->

                            </div><!-- Post Single - Share End -->

                        </div>
                    </div><!-- .entry end -->

                    <div class="line"></div>

                    <h4>Related Posts:</h4>

                    <div class="related-posts row posts-md col-mb-30">
                        @foreach(\App\Models\Blog::where('status','active')->where('country_id',$data->country_id)->limit(4)->get() as $blog)
                        <div class="entry col-12 col-md-6">
                            <div class="grid-inner row align-items-center gutter-20">
                                <div class="col-4 col-xl-5">
                                    <div class="entry-image">
                                        <a href="{{url('blog',$blog->id)}}"><img src="{{$blog->image}}" alt="{{$blog->title}}"></a>
                                    </div>
                                </div>
                                <div class="col-8 col-xl-7">
                                    <div class="entry-title title-xs nott">
                                        <h3><a href="{{url('blog',$blog->id)}}">{{$blog->title}}</a></h3>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="icon-calendar3"></i> {{\Carbon\Carbon::parse($data->created_at)}}</li>
                                        </ul>
                                    </div>
                                    <div class="entry-content d-none d-xl-block">{{substr($data->description,1,150)}}.</div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Comments
                    ============================================= -->

                </div>

            </div>
        </div>
    </section><!-- #content end -->

@endsection
