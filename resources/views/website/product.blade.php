@extends('website.layout')
@section('meta')
    <meta property="og:title" content="{{$data->name}}" />
    <meta property="og:description" content="{{$data->description}}" />
    <meta property="og:url" content="{{url('product',$data->id)}}" />
    <meta property="og:image" content="{{$data->image}}" />

@endsection
@section('title')
{{$data->name}}
@endsection
@section('content')

    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{$data->name}}
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('lang.Home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{url('category',$data->sub_category_id)}}">{{$data->SubCategory->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$data->name}}
                </li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="single-product">
                    <div class="product">
                        <div class="row gutter-40">

                            <div class="col-md-6">

                                <!-- Product Single - Gallery
                                ============================================= -->
                                <div class="product-image">
                                    <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                        <div class="flexslider">
                                            <div class="slider-wrap" data-lightbox="gallery">

                                                <div class="slide" data-thumb="{{$data->image}}"><a href="{{$data->image}}" title="{{$data->name}}" data-lightbox="gallery-item"><img   src="{{$data->image}}" alt="{{$data->name}}"></a></div>
                                              @foreach($data->images as $image)
                                                <div class="slide" data-thumb="{{$image->image}}"><a href="{{$image->image}}" title="{{$data->name}}" data-lightbox="gallery-item"><img    src="{{$image->image}}" alt="{{$data->name}}"></a></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sale-flash badge bg-danger p-2">{{__('lang.'.$data->type)}}</div>
                                </div><!-- Product Single - Gallery End -->

                            </div>

                            <div class="col-md-6 product-desc">

                                <div class="d-flex align-items-center justify-content-between">

                                    <!-- Product Single - Price
                                    ============================================= -->
                                    <div class="product-price"><ins>{{$data->price}}</ins> ({{$data->Currency->name}})</div><!-- Product Single - Price End -->

                                    <!-- Product Single - Rating
                                    ============================================= -->
                                    <div class="d-flex align-items-center">
{{--                                        <div class="product-rating">--}}
{{--                                            <i class="icon-star3"></i>--}}
{{--                                            <i class="icon-star3"></i>--}}
{{--                                            <i class="icon-star3"></i>--}}
{{--                                            <i class="icon-star-half-full"></i>--}}
{{--                                            <i class="icon-star-empty"></i>--}}
{{--                                        </div><!-- Product Single - Rating End -->--}}
                                        <button type="button" class="btn btn-sm btn-secondary ms-3"><i class="icon-heart"></i></button>
                                    </div>

                                </div>

                                <div class="line"></div>

                                <!-- Product Single - Quantity & Cart Button
{{--                                ============================================= -->--}}
{{--                                <form class="cart mb-0 d-flex justify-content-between align-items-center" method="post" enctype='multipart/form-data'>--}}
{{--                                    <div class="quantity clearfix">--}}
{{--                                        <input type="button" value="-" class="minus">--}}
{{--                                        <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" />--}}
{{--                                        <input type="button" value="+" class="plus">--}}
{{--                                    </div>--}}
{{--                                    <button type="submit" class="add-to-cart button m-0">Add to cart</button>--}}
{{--                                </form><!-- Product Single - Quantity & Cart Button End -->--}}

                                <div class="line"></div>

                                Product Single - Short Description
                                ============================================= -->
                                <p>{!! $data->description !!}</p>

                                <div >
                                    <a href="https://apps.apple.com/us/app/%D9%85%D9%86%D8%A7%D8%B3%D8%A8%D8%A9/id1589937521" target="_blank">
                                        <img src="{{asset('website/images/app-storepng.png')}}" width="184px">
                                    </a>
                                    <a href="https://play.google.com/store/search?q=%D9%85%D9%86%D8%A7%D8%B3%D8%A8%D8%A9&c=apps">
                                        <img src="{{asset('website/images/googleplay.png')}}" width="160px">
                                    </a>
                                </div>

                                <!-- Product Single - Share
                                ============================================= -->
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

                            </div>

                            <div class="w-100"></div>

                            <div class="col-12 mt-5">

                                <div class="tabs clearfix mb-0" id="tab-1">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tabs-3"><i class="icon-star3"></i><span class="d-none d-md-inline-block"> {{__('lang.Comments')}} ({{$data->Comments->count()}})</span></a></li>
                                    </ul>

                                    <div class="tab-container">


                                        <div class="tab-content clearfix" id="tabs-3">

                                            <div id="reviews" class="clearfix">

                                                <ol class="commentlist clearfix">
                                                    @foreach($data->Comments as $Comment)
                                                    <li class="comment even thread-even depth-1" id="li-comment-1">
                                                        <div id="comment-1" class="comment-wrap clearfix">

                                                            <div class="comment-meta">
                                                                <div class="comment-author vcard">
																		<span class="comment-avatar clearfix">
																		<img alt='Image' src='{{$Comment->User->image}}' height='60' width='60' /></span>
                                                                </div>
                                                            </div>

                                                            <div class="comment-content clearfix">
                                                                <div class="comment-author">{{$Comment->User->name}}<span><a href="#" title="Permalink to this comment">{{\Carbon\Carbon::parse($Comment->created_at)->diffForHumans()}}</a></span></div>
                                                                <p>{{$Comment->comment}} !</p>

                                                            </div>

                                                            <div class="clear"></div>

                                                        </div>
                                                    </li>
                                                        @endforeach

                                                </ol>

                                                <!-- Modal Reviews
                                                ============================================= -->
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#reviewFormModal" class="button button-3d m-0 float-end">{{__('lang.Add Comment')}}</a>

                                                <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="reviewFormModalLabel">{{__('lang.Add Comment')}}</h4>
                                                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="row mb-0" id="template-reviewform" name="template-reviewform" action="{{url('add-comment')}}" method="post">
                                                                    @csrf
                                                                    <div class="col-12 mb-3">
                                                                        <label for="template-reviewform-comment">{{__('lang.Comment')}} <small>*</small></label>
                                                                        <textarea class="required form-control" id="template-reviewform-comment" name="template-reviewform-comment" rows="6" cols="30"></textarea>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <button class="button button-3d m-0" type="submit" id="template-reviewform-submit" name="template-reviewform-submit" value="submit">{{__('lang.Submit')}}</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('lang.Close')}}</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- Modal Reviews End -->

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="line"></div>

                <div class="w-100">

                    <h4>{{__('lang.Related Products')}}</h4>

                    <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">
                        @foreach($related as $pro)
                        <div class="oc-item">
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="{{$pro->image}}" height="300" alt="{{$pro->name}}"></a>
                                    <a href="#"><img src="{{$pro->image}}" height="300" alt="{{$pro->name}}"></a>
                                    <div class="badge bg-success p-2"></div>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
{{--                                            <a href="#" class="btn btn-dark me-2"><i class="icon-shopping-cart"></i></a>--}}
                                            <a href="{{url('ajax/product',$pro->id)}}" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg bg-transparent"> </div>
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title"><h3><a href="#">{{$pro->name}}</a></h3></div>
                                    <div class="product-price"> <ins>{{$pro->price}}</ins> {{$pro->Currency->name}}</div>

                                </div>
                            </div>
                        </div>
                            @endforeach


                    </div>

                </div>

            </div>
        </div>
    </section><!-- #content end -->

@endsection
