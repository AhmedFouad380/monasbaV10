@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<!--begin::Input group-->
<div class="fv-row mb-7">

    <!--begin::Input-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.user')}} </label>
    <!--end::Label-->
    <!--begin::Input-->
    <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-users "   data-num="1" name="user_id"
    >

        @inject('users','App\Models\User')
        @foreach($users->select(['id','name'])->get() as $user)
            <option value="{{$user->id}}" @if(isset($data) && $data->user_id == $user->id) selected @endif >{{$user->name}}</option>
        @endforeach

    </select>
    <!--end::Input-->
</div>
<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">{{__('lang.name_ar')}}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="name_ar"
               class="form-control form-control-solid mb-3 mb-lg-0"
               placeholder="" value="{{old('name_ar',$data->name_ar ?? '')}}" />
        <!--end::Input-->
    </div>

    <div class="col m-1">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">{{__('lang.name_en')}}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="name_en"
               class="form-control form-control-solid mb-3 mb-lg-0"
               placeholder="" value="{{old('name_en',$data->name_en ?? '')}}" />
        <!--end::Input-->
    </div>
</div>
<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1">
        <label class="required fw-bold fs-6 mb-2">{{__('lang.Countries')}} </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products countries"  id="countries" data-num="1" name="country_id"
        >
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
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="cities" data-num="1" name="city_id"
        >
            <option value="{{$data->city_id}}">{{$data->City->name}}</option>

        </select>
        @else
            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="cities" data-num="1" name="city_id"
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
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="states" data-num="1" name="state_id"
        >
            <option value="{{$data->state_id}}">{{$data->State->name}}</option>

        </select>
        @else
            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="states" data-num="1" name="state_id"
            >

            </select>
        @endif
    </div>

</div>

<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">{{__('lang.price')}}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="number" name="price"  step=".001"
               class="form-control form-control-solid mb-3 mb-lg-0"
               placeholder="" value="{{old('price',$data->price ?? '')}}" />
        <!--end::Input-->
    </div>
    <!--begin::Label-->
    <div class="col m-1">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">{{__('lang.currency')}}</label>
        <!--end::Label-->
        @isset($data)
            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 " id="currency"  data-num="1" name="currency_id"
            >
                <option value="{{$data->currency_id}}">{{$data->Currency->name}}</option>

            </select>
        @else
            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 " id="currency"  data-num="1" name="currency_id"
            >


            </select>
        @endif

    </div>
    <div class="col m-1">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">{{__('lang.phone')}}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="number" name="phone"
               class="form-control form-control-solid mb-3 mb-lg-0"
               placeholder="" value="{{old('phone',$data->phone ?? '')}}" />
        <!--end::Input-->
    </div>

    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.type')}} </label>
    <!--end::Label-->
    <!--begin::Input-->
    <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products "   data-num="1" name="type"
    >
        <option value="sale">{{__('lang.sale')}}</option>
        <option value="rent">{{__('lang.rent')}}</option>

    </select>
</div>
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-bold fs-6 mb-2">{{__('lang.ar_description')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea type="text" name="description_ar"
              class="form-control form-control-solid mb-3 mb-lg-0"
              placeholder="" >{{old('ar_description',$data->ar_description ?? '')}}</textarea>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-bold fs-6 mb-2">{{__('lang.description_en')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea type="text" name="en_description"
              class="form-control form-control-solid mb-3 mb-lg-0"
              placeholder="">{{old('en_description',$data->en_description ?? '')}}</textarea>
    <!--end::Input-->
</div>

<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1">
        <label class="required fw-bold fs-6 mb-2">{{__('lang.category')}} </label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic"  id="categories" data-num="1" name="category_id"
        >
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
        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products subcategories"  id="subcategories" data-num="1" name="sub_category_id"
        >
            @isset($data)
            <option value="{{$data->sub_category_id}}" >{{$data->subCategory->name}}</option>
            @endisset
        </select>

    </div>

</div>


<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1 form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.active')}}</label>
        <input class="form-check-input" name="status" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="status" type="checkbox"
               value="active" @if(isset($data)) @if($data->status == 'active') checked @endif @endif id="flexSwitchDefault" />
    </div>

    <div class="col m-1 form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.activeCall')}}</label>
        <input class="form-check-input" name="active_call" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="active_call" type="checkbox"
               value="active" @if(isset($data)) @if($data->active_call == 'active') checked @endif @endif id="flexSwitchDefault" />
    </div>

</div>
<!--begin::Input group-->
<div class="row g-2 m-1 ">
    <!--begin::Label-->
    <div class="col m-1 form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.activeWhatsapp')}}</label>
        <input class="form-check-input" name="active_whatsapp" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="active_whatsapp" type="checkbox"
               value="active" @if(isset($data)) @if($data->active_whatsapp == 'active') checked @endif @endif id="flexSwitchDefault" />
    </div>

    <div class="col m-1 form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.activeChat')}}</label>
        <input class="form-check-input" name="active_chat" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="active_chat" type="checkbox"
               value="active" @if(isset($data)) @if($data->active_call == 'active') checked @endif @endif id="flexSwitchDefault" />
    </div>

</div>
<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1 form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.show_username')}}</label>
        <input class="form-check-input" name="show_username" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="show_username" type="checkbox"
               value="active" @if(isset($data)) @if($data->active_username == 'active') checked @endif @endif id="flexSwitchDefault" />
    </div>

    <div class="col m-1 form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.active_video')}}</label>
        <input class="form-check-input" name="active_video" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="active_video" type="checkbox"
               value="active" @if(isset($data)) @if($data->active_video == 'active') checked @endif @endif id="flexSwitchDefault" />
    </div>

</div>

<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.image')}}</label>
    <div class="col-lg-9 col-xl-12">
        <input accept="image/*"  type="file" @if(request()->segment(2) != 'edit')  @endif name="image" class="dropify"
               data-default-file="{{old('price',$data->image ?? '')}}">
        <span class="form-text text-muted">{{trans('lang.allows_files_type')}}:  png, jpg, jpeg , svg.</span>
    </div>
</div>

<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.video')}}</label>
    <div class="col-lg-9 col-xl-12">
        <input accept="video/*"  type="file" @if(request()->segment(2) != 'edit')  @endif name="video" class="dropify"
               data-default-file="{{old('video',$data->video ?? '')}}">
        <span class="form-text text-muted">{{trans('lang.allows_files_type')}}:  mp4</span>
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


