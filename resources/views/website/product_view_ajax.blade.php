<div class="single-product shop-quick-view-ajax">

    <div class="ajax-modal-title">
        <h2>{{$data->name}}</h2>
    </div>

    <div class="product modal-padding">

        <div class="row gutter-40 col-mb-50">
            <div class="col-md-6">
                <div class="product-image">
                    <div class="fslider" data-pagi="false">
                        <div class="flexslider">
                            <div class="slider-wrap">
                                <div class="slide"><a href="{{$data->image}}" title="{{$data->title}}"><img src="{{$data->image}}" alt="{{$data->title}}"></a></div>
                                @foreach($data->images as $image)
                                <div class="slide"><a href="{{$image->image}}" title="{{$data->title}}"><img src="{{$image->image}}" alt="{{$data->title}}"></a></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="sale-flash badge bg-danger p-2">{{__('lang.'.$data->type)}}</div>
                </div>
            </div>
            <div class="col-md-6 product-desc">
                <div class="product-price"> <ins>{{$data->price}}</ins> {{$data->Currency->name}}</div>
{{--                <div class="product-rating">--}}
{{--                    <i class="icon-star3"></i>--}}
{{--                    <i class="icon-star3"></i>--}}
{{--                    <i class="icon-star3"></i>--}}
{{--                    <i class="icon-star-half-full"></i>--}}
{{--                    <i class="icon-star-empty"></i>--}}
{{--                </div>--}}
                <div class="clear"></div>
                <div class="line"></div>

                <!-- Product Single - Quantity & Cart Button
                ============================================= -->

                <div class="clear"></div>
                <div class="line"></div>
                <p>{{$data->description}}</p>


            </div>
        </div>

    </div>

</div>
