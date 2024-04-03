@extends('website.layout')
@section('meta')
    <meta property="og:title" content="{{$data->name}}" />
    <meta property="og:description" content="{{$data->about}}" />
    <meta property="og:url" content="{{url('profile',$data->id)}}" />
    <meta property="og:image" content="{{$data->image}}" />

@endsection
@section('title')
    {{$data->name}}
@endsection
@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row clearfix">

                    <div class="col-md-11">

                        <img src="{{$data->image}}" class="alignleft img-circle img-thumbnail my-0" alt="Avatar" style="max-width: 84px;">

                        <div class="heading-block border-0">
                            <h3>{{$data->name}}</h3>
                            <span>{{$data->about}}</span>
                        </div>

                        <div class="clear"></div>

                        <div class="row clearfix">

                            <div class="col-lg-12">

                                <div class="tabs tabs-alt clearfix" id="tabs-profile">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tab-feeds"><i class="icon-rss2"></i> {{__('lang.Rates')}}</a></li>
                                        <li><a href="#tab-posts"><i class="icon-pencil2"></i> {{__('lang.ads')}}</a></li>
                                        <li><a href="#tab-replies"><i class="icon-users"></i> {{__('lang.Followers')}}</a></li>
                                        <li><a href="#tab-connections"><i class="icon-users"></i> {{__('lang.Following')}}</a></li>
                                    </ul>

                                    <div class="tab-container">

                                        <div class="tab-content clearfix" id="tab-feeds">

{{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium harum ea quo! Nulla fugiat earum, sed corporis amet iste non, id facilis dolorum, suscipit, deleniti ea. Nobis, temporibus magnam doloribus. Reprehenderit necessitatibus esse dolor tempora ea unde, itaque odit. Quos.</p>--}}

                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>{{__('lang.date')}}</th>
                                                    <th>{{__('lang.Comments')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data->Rates as $rate)
                                                <tr>
                                                    <td>
                                                        <code>{{\Carbon\Carbon::parse($rate->created_at)->format('Y-m-d')}}</code>
                                                    </td>
                                                    <td>{{$rate->comment}}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="tab-content clearfix" id="tab-posts">

                                            <!-- Posts
                                            ============================================= -->
                                            <div class="row gutter-40 posts-md mt-4">

                                                @foreach($data->Products as $product)
                                                <div class="entry col-12">
                                                    <div class="grid-inner row align-items-center g-0">
                                                        <div class="col-md-4">
                                                            <a class="entry-image" href="{{url('product',$product->id)}}" data-lightbox="image"><img style="max-height: 350px!important;" src="{{$product->image}}" alt="{{$product->name}}"></a>
                                                        </div>
                                                        <div class="col-md-7 m-4 ps-md-4">
                                                            <div class="entry-title title-sm">
                                                                <h3><a href="{{url('product',$product->id)}}">{{$product->name}}</a></h3>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li><i class="icon-calendar3"></i> {{{\Carbon\Carbon::parse($product->created_at)->format('Y-m-d')}}}}</li>
                                                                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> {{$product->comments->count()}}</a></li>
                                                                    <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="entry-content">
                                                                <p>{{$product->description}}.</p>
                                                                <a href="{{url('product',$product->id)}}" class="more-link">{{__('lang.Read More')}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>

                                        </div>
                                        <div class="tab-content clearfix" id="tab-replies">

                                            <div class="row topmargin-sm">
                                                @foreach($data->followers as $follower)
                                                <div class="col-lg-3 col-md-6 bottommargin">

                                                    <div class="team">
                                                        <div class="team-image">
                                                            <img src="{{$follower->image}}" alt="{{$follower->name}}">
                                                        </div>
                                                        <div class="team-desc">
                                                            <div class="team-title"><h4>{{$follower->name}}</h4></div>
                                                            <a href="{{url('user',$follower->id)}}" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                                                <i class="icon-profile"></i>
                                                                <i class="icon-profile"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                                @endforeach

                                            </div>

                                        </div>
                                        <div class="tab-content clearfix" id="tab-connections">

                                            <div class="row topmargin-sm">
                                                                                       @foreach($data->followers as $follower)
                                                    <div class="col-lg-3 col-md-6 bottommargin">

                                                        <div class="team">
                                                            <div class="team-image">
                                                                <img src="{{$follower->image}}" alt="{{$follower->name}}">
                                                            </div>
                                                            <div class="team-desc">
                                                                <div class="team-title"><h4>{{$follower->name}}</h4></div>
                                                                <a href="{{url('user',$follower->id)}}" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                                                    <i class="icon-profile"></i>
                                                                    <i class="icon-profile"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endforeach

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="w-100 line d-block d-md-none"></div>


                </div>

            </div>
        </div>
    </section><!-- #content end -->


@endsection
