@extends('website.layout')
@section('title')

    {{$category->name}}
@endsection
@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1> {{$category->name}}
            </h1>
{{--            <span>Start Buying your Favourite Theme</span>--}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('lang.Home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row gutter-40 col-mb-80">
                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent col-lg-9 order-lg-last">

                        <!-- Shop
                        ============================================= -->
                        <div id="shop" class="shop row grid-container gutter-30" data-layout="fitRows">
                        @foreach($data as $pro)
                            <div class="product col-12 col-sm-6 col-lg-12">
                                <div class="grid-inner row g-0">
                                    <div class="product-image col-lg-4 col-xl-3">
                                        <a href="{{url('product',$pro->id)}}"><img src="{{$pro->image}}" style="height: 250px !important" alt="{{$pro->name}}"></a>
                                        <a href="{{url('product',$pro->id)}}"><img src="{{$pro->image}}"  style="height: 250px !important"  alt="{{$pro->name}}"></a>
                                        <div class="sale-flash badge bg-secondary p-2">{{__('lang.'.$pro->type)}}</div>
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
{{--                                                <a href="#" class="btn btn-dark me-2"><i class="icon-shopping-cart"></i></a>--}}
                                                <a href="{{url('ajax/product',$pro->id)}}" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                            </div>
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>
                                    <div class="product-desc col-lg-8 col-xl-9 px-lg-5 pt-lg-0">
                                        <div class="product-title"><h3><a href="{{url('product',$pro->id)}}">{{$pro->name}}</a></h3></div>
                                        <div class="product-price"> <ins>{{$pro->price}}</ins> ({{$pro->Currency->name}})</div>
{{--                                        <div class="product-rating">--}}
{{--                                            <i class="icon-star3"></i>--}}
{{--                                            <i class="icon-star3"></i>--}}
{{--                                            <i class="icon-star3"></i>--}}
{{--                                            <i class="icon-star3"></i>--}}
{{--                                            <i class="icon-star-half-full"></i>--}}
{{--                                        </div>--}}

                                        <p class="mt-3 d-none d-lg-block">{{$pro->description}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div><!-- #shop end -->
                        <br><br><br>
                        <hr>
                        <nav aria-label="Page navigation example">

                            @php
                                $paginator =$data->appends(request()->input())->links()->paginator;
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
                                <ul class="pagination">
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

                        </nav>
                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar col-lg-3">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links">

                                <h4>{{__('lang.filter')}}</h4>
                                <ul>
                                  <label>{{__('lang.Country')}}</label>
                                    <select name="country_id" class="form-control countryAjax" >
                                        @foreach(\App\Models\Country::where('status','active')->get() as $country)
                                            <option @if(session()->get('country') == $country->id)  selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                    </select>

                                </ul>

                            </div>

                            <div class="widget widget_links">

                                <h4>{{__('lang.categories')}}</h4>
                                <ul>
                                    @foreach(\App\Models\SubCategory::where('category_id',$category->category_id)->get() as $cat)
                                        <li><a href="{{url('category',$cat->id)}}">{{$cat->name}}</a></li>
                                    @endforeach
                                </ul>

                            </div>



                            <div class="widget subscribe-widget">

                                <h4>{{__('lang.Subscribe For Latest Offers')}}</h4>
                                <h5>{{__('lang.Subscribe to Our Newsletter to get Important News, Amazing Offers Inside Scoops')}}:</h5>
                                <form action="{{url('store-subscribe')}}" method="get" class="my-0">
                                    <div class="input-group mx-auto">
                                        <input type="text" class="form-control" placeholder="{{__('lang.Enter Your Email')}}" required="">
                                        <button class="btn btn-success" type="submit"><i class="icon-email2"></i></button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div><!-- .sidebar end -->
                </div>

            </div>
        </div>
    </section><!-- #content end -->

@endsection

@section('js')
    <script>
        $('.countryAjax').change(function () {
        val = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{url('change_country')}}",
                data: {"id": val},
                success: function (data) {
                    location.reload()

                    Swal.fire({
                        icon: 'success',
                        title: "{{__('lang.Success')}}",
                        text: "{{__('lang.Success_text')}}",
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                    });
                }
            })
        })
    </script>
    @endsection
