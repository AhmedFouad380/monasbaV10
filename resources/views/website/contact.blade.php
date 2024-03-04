@extends('website.layout')
@section('title')
    {{__('lang.contact_us')}}
@endsection
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>    {{__('lang.contact_us')}}
            </h1>
            <span>{{__('lang.stay in touch')}}</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('lang.Home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">    {{__('lang.contact_us')}}
                </li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Google Map
    ============================================= -->

    <!-- Page Sub Menu
    ============================================= -->
    <div id="page-menu">
        <div id="page-menu-wrap">
            <div class="container">
                <div class="page-menu-row">

                    <div class="page-menu-title">    {{__('lang.contact_us')}}
                        <span></span></div>



                    <div id="page-menu-trigger"><i class="icon-reorder"></i></div>

                </div>
            </div>
        </div>
    </div><!-- #page-menu end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">

                <div class="row gutter-40 col-mb-80">
                    <!-- Postcontent
                    ============================================= -->
                    <div class="postcontent col-lg-9">

                        <h3>{{__('lang.Send us an Email')}}</h3>

                        <div class="form-widget">

                            <div class="form-result"></div>

                            <form class="mb-0"  name="template-contactform" action="{{url('store_contact')}}" method="post">
                            @csrf
                                <div class="form-process">
                                    <div class="css3-spinner">
                                        <div class="css3-spinner-scaler"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="template-contactform-name">{{__('lang.name')}} <small>*</small></label>
                                        <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="template-contactform-email">{{__('lang.email')}} <small>*</small></label>
                                        <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="template-contactform-phone">{{__('lang.phone')}}</label>
                                        <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                                    </div>



                                    <div class="w-100"></div>

                                    <div class="col-12 form-group">
                                        <label for="template-contactform-message">{{__('lang.message')}} <small>*</small></label>
                                        <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                                    </div>

                                    <div class="col-12 form-group d-none">
                                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                                    </div>

                                    <div class="col-12 form-group">
                                        <button class="button button-3d m-0" type="submit"  value="submit">{{__('lang.Send Message')}}</button>
                                    </div>
                                </div>

                                <input type="hidden" name="prefix" value="template-contactform-">

                            </form>
                        </div>

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar col-lg-3">

                        <abbr title="Phone Number"><strong>Phone:</strong></abbr> (1) 8547 632521<br>
                        <abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
                        <abbr title="Email Address"><strong>Email:</strong></abbr> monsbah@gmail.com



                        <div class="widget border-0 pt-0">

                            <a href="#" class="social-icon si-small si-dark si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-dark si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-dark si-dribbble">
                                <i class="icon-dribbble"></i>
                                <i class="icon-dribbble"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-dark si-forrst">
                                <i class="icon-forrst"></i>
                                <i class="icon-forrst"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-dark si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-dark si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                        </div>

                    </div><!-- .sidebar end -->
                </div>

            </div>
        </div>
    </section><!-- #content end -->

@endsection
