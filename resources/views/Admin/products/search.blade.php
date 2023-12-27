@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<!--begin::Input group-->
<div class="fv-row mb-7">

    <!--begin::Input-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.user')}} </label>
    <!--end::Label-->
    <!--begin::Input-->
    <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-users2  "   data-num="1" name="user_id"
    >
        <option value="0" > {{__('lang.all')}} </option>
        @inject('users','App\Models\User')
        @foreach($users->select(['id','name'])->get() as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select>
    <!--end::Input-->
</div>

<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1">
        <label class="required fw-bold fs-6 mb-2">{{__('lang.Countries')}} </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products countries"  id="countries2" data-num="1" name="country_id"
        >
            <option value="0" > {{__('lang.all')}} </option>
            @inject('countries','App\Models\Country')
            @foreach($countries->all() as $country)

                <option value="{{$country->id}}" @isset($data) @if($data->country_id == $country->id) selected @endif @endisset >{{$country->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col m-1">
        <!--begin::Label-->
        <label class="required fw-bold fs-6 mb-2">{{__('lang.cities')}} </label>
        <!--end::Label-->
        <!--begin::Input-->
        @isset($data)
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="cities2" data-num="1" name="city_id"
        >
            <option value="{{$data->city_id}}">{{$data->City->name}}</option>

        </select>
        @else
            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="cities2" data-num="1" name="city_id"
            >

            </select>
        @endif
    </div>

</div>
<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1">
        <label class="required fw-bold fs-6 mb-2">{{__('lang.states')}} </label>
        <!--end::Label-->
        <!--begin::Input-->
        @isset($data)
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="states2" data-num="1" name="state_id"
        >
            <option value="{{$data->state_id}}">{{$data->State->name}}</option>

        </select>
        @else
            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="states2" data-num="1" name="state_id"
            >

            </select>
        @endif
    </div>

</div>

<div class="row g-2 m-1">
    <!--begin::Label-->

    <!--begin::Label-->
{{--    <div class="col m-1">--}}
{{--        <!--begin::Label-->--}}
{{--        <label class=" fw-bold fs-6 mb-2">{{__('lang.currency')}}</label>--}}
{{--        <!--end::Label-->--}}
{{--        @isset($data)--}}
{{--            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 " id="currency"  data-num="1" name="currency_id"--}}
{{--            >--}}
{{--                <option value="{{$data->currency_id}}">{{$data->Currency->name}}</option>--}}

{{--            </select>--}}
{{--        @else--}}
{{--            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 " id="currency"  data-num="1" name="currency_id"--}}
{{--            >--}}


{{--            </select>--}}
{{--        @endif--}}

{{--    </div>--}}

    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.type')}} </label>
    <!--end::Label-->
    <!--begin::Input-->
    <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products "   data-num="1" name="type"
    >
        <option value="0" > {{__('lang.all')}} </option>
        <option value="sale">{{__('lang.sale')}}</option>
        <option value="rent">{{__('lang.rent')}}</option>

    </select>
</div>
<!--begin::Input group-->


<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1">
        <label class="required fw-bold fs-6 mb-2">{{__('lang.category')}} </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic"  id="categories2" data-num="1" name="category_id"
        >
            <option value="0" > {{__('lang.all')}} </option>
            @inject('categories','App\Models\Category')
            @foreach($categories->all() as $category)
                <option value="{{$category->id}}" @isset($data) @if($data->category_id == $category->id) selected @endif @endisset >{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col m-1">
        <!--begin::Label-->
        <label class="required fw-bold fs-6 mb-2">{{__('lang.SubCategory')}} </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products subcategories"  id="subcategories2" data-num="1" name="sub_category_id"
        >
            @isset($data)
            <option value="{{$data->sub_category_id}}" >{{$data->subCategory->name}}</option>
            @endisset
        </select>

    </div>

</div>


@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script !src="">

        $('.dropify').dropify({
            messages: {
                'default': "{{trans('lang.dropify-default')}}",
                'replace': "{{trans('lang.dropify-replace')}}",
                'remove':  "{{trans('lang.dropify-remove')}}",
                'error':   "{{trans('lang.dropify-error')}}"
            }
        });
        var avatar1 = new KTImageInput('kt_image_1');
    </script>


@endpush


