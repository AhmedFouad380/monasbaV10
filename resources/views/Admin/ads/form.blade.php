@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
          integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush

<!--end::Input group-->  <!--begin::Input group-->

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.link')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="url" name="link"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('link',$data->link ?? '')}}" required/>
    <!--end::Input-->
</div>
<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.image')}}</label>
    <div class="col-lg-9 col-xl-12">
        <input accept="image/*"  type="file" @if(request()->segment(2) != 'edit') required @endif name="image" class="dropify"
               data-default-file="{{old('image',$data->image ?? '')}}">
        <span class="form-text text-muted">{{trans('lang.allows_files_type')}}:  png, jpg, jpeg , svg.</span>
    </div>
</div>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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


