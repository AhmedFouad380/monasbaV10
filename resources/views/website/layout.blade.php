<!DOCTYPE html>
<html     @if(session()->get('lang')=='ar')
           dir="rtl " @else dir="ltr" @endif lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    @yield('meta')
    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.css')}}" type="text/css" />
    @if(session()->get('lang')=='ar')
        <link rel="stylesheet" href="{{asset('website/style.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('website/style-rtl.css')}}" type="text/css" />
        <style>
            .rev_slider_wrapper, .rev_slider_wrapper *{direction:ltr;}
        </style>
    @else
        <link rel="stylesheet" href="{{asset('website/style.css')}}" type="text/css" />
    @endif

    <link rel="stylesheet" href="{{asset('website/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('website/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('website/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('website/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('website/css/custom.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('website/include/rs-plugin/css/settings.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('website/include/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/include/rs-plugin/css/navigation.css')}}">
@yield('css')
    <!-- Document Title
    ============================================= -->
    <title>Monsbah || @yield('title') </title>

    <style>

        .revo-slider-emphasis-text {
            font-size: 58px;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Poppins', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Poppins', sans-serif;
        }

        .tp-video-play-button { display: none !important; }

        .tp-caption { white-space: nowrap; }

    </style>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Top Bar
    ============================================= -->
    <div id="top-bar">
        <div class="container">

            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-auto">
                    <p class="mb-0 py-2 text-center text-md-start">   <strong>{{__('lang.email')}}:</strong> monsbah@gmail.com
                    </p>
                </div>

                <div class="col-12 col-md-auto">

                    <!-- Top Links
                    ============================================= -->
                    <div class="top-links on-click">
                        <ul class="top-links-container">
                            @if(session()->get('lang') == 'en')
                                <li class="top-links-item"><a href="#">EN</a>
                                    <ul class="top-links-sub-menu">
                                        <li class="top-links-item"><a href="{{url('lang/ar')}}"><img src="{{asset('website/images/kwiet.png')}}" alt="French"> AR </a></li>
                                    </ul>
                                </li>

                            @else
                                <li class="top-links-item"><a href="#">AR</a>
                                    <ul class="top-links-sub-menu">
                                        <li class="top-links-item"><a href="{{url('lang/en')}}"><img src="{{asset('website/images/english.svg')}}" alt="French"> EN </a></li>
                                    </ul>
                                </li>
                            @endif
{{--                            <li class="top-links-item"><a href="{{url('user_login')}}">{{__('lang.Login')}}</a>--}}
{{--                                <div class="top-links-section">--}}
{{--                                    <form id="top-login" autocomplete="off">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>{{__('lang.email')}}</label>--}}
{{--                                            <input type="email" class="form-control" placeholder="Email address">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>{{__('lang.password')}}</label>--}}
{{--                                            <input type="password" class="form-control" placeholder="Password" required="">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="" id="top-login-checkbox">--}}
{{--                                            <label class="form-check-label" for="top-login-checkbox">Remember Me</label>--}}
{{--                                        </div>--}}
{{--                                        <button class="btn btn-danger w-100" type="submit">Sign in</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                        </ul>
                    </div><!-- .top-links end -->

                </div>
            </div>

        </div>
    </div><!-- #top-bar end -->

    <!-- Header
    ============================================= -->
    <header id="header">
        <div id="header-wrap">
            <div class="container">
                <div class="header-row">

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="{{url('/')}}" class="standard-logo" data-dark-logo="logo.png"><img src="{{asset('logo/logo.png')}}" alt="Monsbah Logo"></a>
                        <a href="{{url('/')}}" class="retina-logo" data-dark-logo="logo.png"><img src="{{asset('logo/logo.png')}}" alt="Monsbah Logo"></a>
                    </div><!-- #logo end -->

                    <div class="header-misc">

                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search" class="header-misc-icon">
                            <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                        </div><!-- #top-search end -->

                        <!-- Top Cart
                        ============================================= -->
{{--                        <div id="top-cart" class="header-misc-icon d-none d-sm-block">--}}
{{--                            <a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span class="top-cart-number">5</span></a>--}}
{{--                            <div class="top-cart-content">--}}
{{--                                <div class="top-cart-title">--}}
{{--                                    <h4>Shopping Cart</h4>--}}
{{--                                </div>--}}
{{--                                <div class="top-cart-items">--}}
{{--                                    <div class="top-cart-item">--}}
{{--                                        <div class="top-cart-item-image">--}}
{{--                                            <a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="top-cart-item-desc">--}}
{{--                                            <div class="top-cart-item-desc-title">--}}
{{--                                                <a href="#">Blue Round-Neck Tshirt with a Button</a>--}}
{{--                                                <span class="top-cart-item-price d-block">$19.99</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="top-cart-item-quantity">x 2</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="top-cart-item">--}}
{{--                                        <div class="top-cart-item-image">--}}
{{--                                            <a href="#"><img src="images/shop/small/6.jpg" alt="Light Blue Denim Dress" /></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="top-cart-item-desc">--}}
{{--                                            <div class="top-cart-item-desc-title">--}}
{{--                                                <a href="#">Light Blue Denim Dress</a>--}}
{{--                                                <span class="top-cart-item-price d-block">$24.99</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="top-cart-item-quantity">x 3</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="top-cart-action">--}}
{{--                                    <span class="top-checkout-price">$114.95</span>--}}
{{--                                    <a href="#" class="button button-3d button-small m-0">View Cart</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div><!-- #top-cart end -->--}}

                    </div>

                    <div id="primary-menu-trigger">
                        <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                    </div>

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav class="primary-menu">

                        <ul class="menu-container">
                            <li class="menu-item current"><a class="menu-link" href="{{url('/')}}"><div>{{__('lang.Home')}}</div></a>
                            </li>
                         @foreach(\App\Models\Category::where('status','active')->get() as $category)
                            <li class="menu-item mega-menu mega-menu-small"><a class="menu-link" href="#"><div>{{$category->name}}</div></a>
                                <div class="mega-menu-content mega-menu-style-2">
                                    <div class="container">
                                        <div class="row">
                                            <ul class="sub-menu-container mega-menu-column col-lg-12">
                                                <li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div></div></a>
                                                    <ul class="sub-menu-container">
                                                        @foreach($category->SubCategories as $sub)
                                                        <li class="menu-item"><a class="menu-link" href="{{url('category',$sub->id)}}"><div>
                                                            {{$sub->name}}</div></a></li>
                                                            @endforeach

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li><!-- .mega-menu end -->
                            @endforeach
{{--                            <li class="menu-item"><a class="menu-link" href="{{url('blogs')}}"><div>{{__('lang.Blogs')}}</div><span></span></a></li>--}}
                            <!--								<li class="menu-item"><a class="menu-link" href="#"><div>Videos</div><span>Latest News</span></a></li>-->
                            <li class="menu-item"><a class="menu-link" href="{{url('Contact')}}"><div>{{__('lang.Contacts')}}</div><span></span></a></li>
                        </ul>

                    </nav><!-- #primary-menu end -->

                    <form class="top-search-form" action="{{url('search')}}" method="get">
                        <input type="text" name="search" class="form-control" value="" placeholder="{{__('lang.search')}}.." autocomplete="off">
                    </form>

                </div>
            </div>
        </div>
        <div class="header-wrap-clone"></div>
    </header><!-- #header end -->


    @yield('content')
    <!-- Footer
      ============================================= -->
    <footer id="footer" class="dark">
        <div class="container">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap">

                <div class="row col-mb-50">
                    <div class="col-lg-8">

                        <div class="row col-mb-50">
                            <div class="col-md-6">

                                <div class="widget clearfix">

                                    <img src="{{asset('logo/logo.png')}}" alt="Image" class="footer-logo">

{{--                                    <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>--}}

                                    <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">

                                        <abbr title="Phone Number"><strong>Phone:</strong></abbr> (1) 8547 632521<br>
                                        <abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
                                        <abbr title="Email Address"><strong>Email:</strong></abbr> monsbah@gmail.com
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="widget widget_links clearfix">

                                    <h4>{{__('lang.Categories')}}</h4>

                                    <ul>
                                        @foreach(\App\Models\SubCategory::where('status','active')->InRandomOrder()->limit(8)->get() as $Sub)
                                        <li><a href="{{url('category',$Sub->id)}}">{{$Sub->name}}</a></li>
                                            @endforeach
                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="row col-mb-50">
                            <div class="col-md-4 col-lg-12">
                                <div class="widget clearfix" style="margin-bottom: -20px;">

                                    <div class="row">
                                        <div class="col-lg-6 bottommargin-sm">
                                            <div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                            <h5 class="mb-0">{{__('lang.Total Downloads')}}</h5>
                                        </div>

                                        <div class="col-lg-6 bottommargin-sm">
                                            <div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                            <h5 class="mb-0">{{__('lang.Clients')}}</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-5 col-lg-12">
                                <div class="     clearfix">
                                    <h5><strong>{{__('lang.Subscribe to Our Newsletter to get Important News, Amazing Offers Inside Scoops')}}</strong> </h5>
                                    <div class="widget-subscribe-form-result"></div>
                                    <form id="widget-subscribe-form" action="{{url('store-subscribe')}}" method="get" class="mb-0">
                                        <div class="input-group mx-auto">
                                            <div class="input-group-text"><i class="icon-email2"></i></div>
                                            <input type="email" name="widget-subscribe-form-email" class="form-control " required placeholder="{{__('lang.Enter Your Email')}}">
                                            <button class="btn btn-success" type="submit">{{__('lang.Subscribe Now')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-12">
                                <div class="widget clearfix" style="margin-bottom: -20px;">

                                    <div class="row">
                                        <div class="col-6 col-md-12 col-lg-6 clearfix bottommargin-sm">
                                            <a href="#" class="social-icon si-dark si-colored si-facebook mb-0" style="margin-right: 10px;">
                                                <i class="icon-app-store-ios"></i>
                                                <i class="icon-app-store-ios"></i>
                                            </a>
                                            <a href="https://apps.apple.com/us/app/%D9%85%D9%86%D8%A7%D8%B3%D8%A8%D8%A9/id1589937521" target="_blank"><small style="display: block; margin-top: 3px;"><strong>{{__('lang.Get App')}}</strong><br>Apple Store</small></a>
                                        </div>
                                        <div class="col-6 col-md-12 col-lg-6 clearfix">
                                            <a href="#" class="social-icon si-dark si-colored si-rss mb-0" style="margin-right: 10px;">
                                                <i class="icon-play"></i>
                                                <i class="icon-play"></i>
                                            </a>
                                            <a href="https://play.google.com/store/search?q=%D9%85%D9%86%D8%A7%D8%B3%D8%A8%D8%A9&c=apps" target="_blank"><small style="display: block; margin-top: 3px;"><strong>{{__('lang.Get App')}}</strong><br>Play Store</small></a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div><!-- .footer-widgets-wrap end -->

        </div>

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">
            <div class="container">

                <div class="row col-mb-30">

                    <div class="col-md-6 text-center text-md-start">
                        Copyrights &copy; 2024 All Rights Reserved by Monsbah .<br>
{{--                        <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>--}}
                    </div>


                </div>

            </div>
        </div><!-- #copyrights end -->
    </footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
============================================= -->
<script src="{{asset('website/js/jquery.js')}}"></script>
<script src="{{asset('website/js/plugins.min.js')}}"></script>

<!-- Footer Scripts
============================================= -->
<script src="{{asset('website/js/functions.js')}}"></script>

<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
<script src="{{asset('website/include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('website/include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<script src="{{asset('website/include/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('website/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('website/include/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('website/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('website/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('website/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('website/include/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('website/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>

<script>

    var tpj=jQuery;
    tpj.noConflict();
    var $ = jQuery.noConflict();

    tpj(document).ready(function() {

        var apiRevoSlider = tpj('#rev_slider_ishop').show().revolution(
            {
                sliderType:"standard",
                jsFileLocation:"include/rs-plugin/js/",
                sliderLayout:"fullwidth",
                dottedOverlay:"none",
                delay:9000,
                navigation: {},
                responsiveLevels:[1200,992,768,480,320],
                gridwidth:1140,
                gridheight:500,
                lazyType:"none",
                shadow:0,
                spinner:"off",
                autoHeight:"off",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    disableFocusListener:false,
                },
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "ares",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder"></span> </div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    }
                }
            });

        apiRevoSlider.on("revolution.slide.onloaded",function (e) {
            SEMICOLON.slider.sliderDimensions();
        });

    }); //ready

</script>
<script></script>
<?php
$message = session()->get("message");
?>
@if( session()->has("message"))
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{__('lang.Success')}}",
            text: "{{__('lang.Success_text')}}",
            type: "success",
            timer: 3000,
            showConfirmButton: false
        });

    </script>

@endif
@foreach ($errors->all() as $error)
    <script>
        Swal.fire({
            icon: 'error',
            title: "{{__('lang.error')}}",
            text: "{{ $error }}",
            type: "error",
            timer: 3000,
            showConfirmButton: false
        });

    </script>
@endforeach

@if( session()->has("error"))
    <?php
    $e = session()->get("error");
    ?>

    <script>
        Swal.fire({
            icon: 'warning',
            title: "برجاء التأكد من البيانات.",
            text: "{{$e}} ",
            type: "error",
            timer: 5000,
            showConfirmButton: false
        });
    </script>

@endif
@yield('js')
</body>
</html>
