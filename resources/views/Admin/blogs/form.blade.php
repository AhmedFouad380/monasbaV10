@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<!--begin::Input group-->
<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">{{__('lang.title_ar')}}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="title_ar"
               class="form-control form-control-solid mb-3 mb-lg-0"
               placeholder="" value="{{old('title_ar',$data->title_ar ?? '')}}" />
        <!--end::Input-->
    </div>

    <div class="col m-1">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">{{__('lang.title_en')}}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="title_en"
               class="form-control form-control-solid mb-3 mb-lg-0"
               placeholder="" value="{{old('title_en',$data->title_en ?? '')}}" />
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


<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-bold fs-6 mb-2">{{__('lang.description_ar')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea type="text" name="description_ar"
              class="form-control form-control-solid mb-3 mb-lg-0"
              placeholder="" >{{old('description_ar',$data->description_ar ?? '')}}</textarea>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-bold fs-6 mb-2">{{__('lang.description_en')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea type="text" name="description_en"
              class="form-control form-control-solid mb-3 mb-lg-0"
              placeholder="">{{old('description_en',$data->description_en ?? '')}}</textarea>
    <!--end::Input-->
</div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fw-bold fs-6 mb-2">meta description</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea type="text" name="meta_description"
                  class="form-control form-control-solid mb-3 mb-lg-0"
                  placeholder="">{{old('meta_description',$data->meta_description ?? '')}}</textarea>
        <!--end::Input-->
    </div>
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fw-bold fs-6 mb-2">meta tags</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea type="text" name="meta_tags"
                  class="form-control form-control-solid mb-3 mb-lg-0"
                  placeholder="">{{old('meta_tags',$data->meta_tags ?? '')}}</textarea>
        <!--end::Input-->
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



</div>
<!--begin::Input group-->

<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.image')}}</label>
    <div class="col-lg-9 col-xl-12">
        <input accept="image/*"  type="file" @if(request()->segment(2) != 'edit')  @endif name="image" class="dropify"
               data-default-file="{{old('price',$data->image ?? '')}}">
        <span class="form-text text-muted">{{trans('lang.allows_files_type')}}:  png, jpg, jpeg , svg.</span>
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


