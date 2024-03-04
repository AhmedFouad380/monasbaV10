@extends('website.layout')
@section('title')
    {{__('lang.Home')}}
@endsection
@section('content')
    <section id="slider" class="rev-slider-element slider-element slider-parallax revslider-wrap overflow-hidden clearfix">

        <div id="rev_slider_ishop_wrapper" class="rev_slider_wrapper fullwidth-container" data-alias="default-slider" style="padding:0px;">
            <!-- START REVOLUTION SLIDER 5.1.4 fullwidth mode -->
            <div id="rev_slider_ishop" class="rev_slider fullwidthbanner" style="display:none;" data-version="5.1.4">
                <ul>    <!-- SLIDE  -->
                    @foreach(\App\Models\Slider::where('status','active')->get() as $slider)
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="5000" data-saveperformance="off" data-title="Latest Collections" style="background-color: #F6F6F6;">
                        <!-- LAYERS -->


                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text text-uppercase"
                             data-x="100"
                             data-y="50"
                             data-transform_in="x:-200;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"><img src="{{$slider->image}}" alt="Girl"></div>

                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text text-uppercase"
                             data-x="570"
                             data-y="75"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;"></div>

                        <div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text p-0 border-0"
                             data-x="570"
                             data-y="105"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; max-width: 430px; line-height: 1.15;">
                            {{$slider->title}}</div>

                        <div class="tp-caption ltl tp-resizeme revo-slider-desc-text text-start"
                             data-x="570"
                             data-y="275"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; max-width: 550px; white-space: normal;">
                            {{$slider->description }}.</div>

                        <div class="tp-caption ltl tp-resizeme"
                             data-x="570"
                             data-y="375"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"><a href="{{$slider->link}}" class="button button-border button-large button-rounded text-end m-0"><span>{{$slider->button}}</span> <i class="icon-angle-right"></i></a></div>

                    </li>
                    @endforeach
                        <!-- SLIDE  -->

                </ul>
            </div>
        </div><!-- END REVOLUTION SLIDER -->

    </section>
    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row align-items-stretch gutter-20 min-vh-60">
                    <div class="col-md-8">

                        <div class="row align-items-stretch gutter-20 h-100">
                            <div class="col-md-6 min-vh-25 min-vh-md-0">
                                <a href="{{\App\Models\Ads::find(1)->link}}" class="grid-inner d-block h-100" style="background-image: url({{\App\Models\Ads::find(1)->image}});"></a>
                            </div>

                            <div class="col-md-6 min-vh-25 min-vh-md-0">
                                <a href="{{\App\Models\Ads::find(2)->link}}" class="grid-inner d-block h-100" style="background-image: url({{\App\Models\Ads::find(2)->image}}); background-position: right center;"></a>
                            </div>

                            <div class="col-md-12 min-vh-25 min-vh-md-0 pb-md-0">
                                <a href="{{\App\Models\Ads::find(4)->link}}" class="grid-inner d-block h-100" style="background-image: url({{\App\Models\Ads::find(4)->image}});"></a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 min-vh-50">
                        <a href="{{\App\Models\Ads::find(3)->link}}" class="grid-inner d-block h-100" style="background-image: url('{{\App\Models\Ads::find(3)->image}}'); background-position: center top;"></a>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="tabs topmargin-lg clearfix" id="tab-3">

                    <ul class="tab-nav clearfix">
                        <li><a href="#tabs-9">{{__('lang.New Arrivals')}}</a></li>
                        <li><a href="#tabs-10">{{__('lang.Best sellers')}}</a></li>
                        <li><a href="#tabs-11">{{__('lang.You may like')}}</a></li>
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content" id="tabs-9">

                            <div class="shop row gutter-30">
                                @foreach(\App\Models\Product::where('country_id',session()->get('country'))->where('status','active')->OrderBy('id','desc')->limit(8)->get() as $pro)
                                <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="grid-inner">
                                        <div class="product-image">
                                            <a href="{{url('product',$pro->id)}}"><img src="{{$pro->image}}" height="320" alt="{{$pro->name}}"></a>
                                            <a href="{{url('product',$pro->id)}}"><img src="{{$pro->image}}"  height="320" alt="{{$pro->name}}"></a>
                                            <div class="sale-flash badge bg-success p-2">{{__('lang.'.$pro->type)}}*</div>
                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
{{--                                                    <a href="#" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>--}}
                                                    <a href="{{url('ajax/product',$pro->id)}}" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                                </div>
                                                <div class="bg-overlay-bg bg-transparent"></div>
                                            </div>
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-title"><h3><a href="{{url('product',$pro->id)}}">{{$pro->name}}</a></h3></div>
                                            <div class="product-price"> <ins>{{$pro->price}}</ins> {{$pro->Currency->name}}</div>
{{--                                            <div class="product-rating">--}}
{{--                                                <i class="icon-star3"></i>--}}
{{--                                                <i class="icon-star3"></i>--}}
{{--                                                <i class="icon-star3"></i>--}}
{{--                                                <i class="icon-star3"></i>--}}
{{--                                                <i class="icon-star-half-full"></i>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>

                        <div class="tab-content" id="tabs-10">

                            <div class="shop row gutter-30">

                                    @foreach(\App\Models\Product::where('country_id',session()->get('country'))->where('status','active')->where('type','rent')->limit(8)->get() as $pro)
                                    <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="grid-inner">
                                            <div class="product-image">
                                                <a href="{{url('product',$pro->id)}}"><img src="{{$pro->image}}" height="320" alt="{{$pro->name}}"></a>
                                                <a href="{{url('product',$pro->id)}}"><img src="{{$pro->image}}"  height="320" alt="{{$pro->name}}"></a>
                                                <div class="sale-flash badge bg-success p-2">{{__('lang.'.$pro->type)}}*</div>
                                                <div class="bg-overlay">
                                                    <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                                                        {{--                                                    <a href="#" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>--}}
                                                        <a href="{{url('ajax/product',$pro->id)}}" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                                    </div>
                                                    <div class="bg-overlay-bg bg-transparent"></div>
                                                </div>
                                            </div>
                                            <div class="product-desc">
                                                <div class="product-title"><h3><a href="{{url('product',$pro->id)}}">{{$pro->name}}</a></h3></div>
                                                <div class="product-price"> <ins>{{$pro->price}}</ins> {{$pro->Currency->name}}</div>
                                                {{--                                            <div class="product-rating">--}}
                                                {{--                                                <i class="icon-star3"></i>--}}
                                                {{--                                                <i class="icon-star3"></i>--}}
                                                {{--                                                <i class="icon-star3"></i>--}}
                                                {{--                                                <i class="icon-star3"></i>--}}
                                                {{--                                                <i class="icon-star-half-full"></i>--}}
                                                {{--                                            </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-content" id="tabs-11">

                            <div class="shop row gutter-30">


                                @foreach(\App\Models\Product::where('country_id',session()->get('country'))->where('status','active')->where('type','sale')->limit(8)->get() as $pro)
                                    <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="grid-inner">
                                            <div class="product-image">
                                                <a href="{{url('product',$pro->id)}}"><img src="{{$pro->image}}" height="320" alt="{{$pro->name}}"></a>
                                                <a href="{{url('product',$pro->id)}}"><img src="{{$pro->image}}"  height="320" alt="{{$pro->name}}"></a>
                                                <div class="sale-flash badge bg-success p-2">{{__('lang.'.$pro->type)}}*</div>
                                                <div class="bg-overlay">
                                                    <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                                                        {{--                                                    <a href="#" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>--}}
                                                        <a href="{{url('ajax/product',$pro->id)}}" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                                    </div>
                                                    <div class="bg-overlay-bg bg-transparent"></div>
                                                </div>
                                            </div>
                                            <div class="product-desc">
                                                <div class="product-title"><h3><a href="{{url('product',$pro->id)}}">{{$pro->name}}</a></h3></div>
                                                <div class="product-price"> <ins>{{$pro->price}}</ins> {{$pro->Currency->name}}</div>
                                                {{--                                            <div class="product-rating">--}}
                                                {{--                                                <i class="icon-star3"></i>--}}
                                                {{--                                                <i class="icon-star3"></i>--}}
                                                {{--                                                <i class="icon-star3"></i>--}}
                                                {{--                                                <i class="icon-star3"></i>--}}
                                                {{--                                                <i class="icon-star-half-full"></i>--}}
                                                {{--                                            </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div>

                <div class="clear bottommargin-sm"></div>


                <div class="clear"></div>


            </div>

            <div class="section mb-0">
                <div class="container">

                    <div class="row col-mb-50">
                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                <div class="fbox-icon">
                                    <i class="icon-thumbs-up2"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3>{{__('lang.trusted')}}</h3>
                                    <p class="mt-0">{{__('lang.We guarantee you the sale of trusted Brands')}}.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                <div class="fbox-icon">
                                    <i class="icon-credit-cards"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3>{{__('lang.Payment Options')}}</h3>
                                    <p class="mt-0">{{__('lang.We accept Visa, MasterCard and American Express')}}.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                <div class="fbox-icon">
                                    <i class="icon-truck2"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3>{{__('lang.Free Shipping')}}</h3>
                                    <p class="mt-0">{{__('lang.Free Delivery to 100+ Locations')}}.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                <div class="fbox-icon">
                                    <i class="icon-undo"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3>{{__('lang.15-Days Returns')}}</h3>
                                    <p class="mt-0">{{__('lang.Return or exchange items purchased within 30 days')}}.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="section border-top-0 border-bottom-0 mb-0 p-0 bg-transparent footer-stick">
                <div class="container clearfix">

                    <div class="row col-mb-50">
                        <div class="col-md-6 d-none d-md-flex align-self-end">
                            <img src="{{asset('website/images/4.jpg')}}" alt="Image" class="mb-0">
                        </div>

                        <div class="col-md-6 mb-5 subscribe-widget">
                            <div class="heading-block">
                                <h3><strong>{{__('lang.GET All Updates')}}*</strong></h3>
                                <span>{{__('lang.Our App scales beautifully to different Devices')}}.</span>
                            </div>

{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet cumque, perferendis accusamus porro illo exercitationem molestias.</p>--}}

{{--                            <div class="widget-subscribe-form-result"></div>--}}
                            <form  action="{{url('store-subscribe')}}" method="get" class="mb-0">
                                @csrf
                                <div class="input-group" style="max-width:400px;">
                                    <div class="input-group-text"><i class="icon-email2"></i></div>
                                    <input type="email"  class="form-control" required placeholder="{{__('lang.Enter Your Email')}}">
                                    <button class="btn btn-danger" type="submit">{{__('lang.Subscribe Now')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- #content end -->
@endsection

