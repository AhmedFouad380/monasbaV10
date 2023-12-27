@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush


    <input type="hidden" name="product_id" value="{{$id}}">

<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.images')}}</label>
    <div class="col-lg-9 col-xl-12">
        <input type="file" @if(request()->segment(2) != 'edit') required @endif name="images[]" class="dropify" multiple
               data-default-file="">
        <span class="form-text text-muted">{{trans('lang.allows_files_type')}}:  png, jpg, jpeg , svg.</span>
    </div>
</div>
<!--begin::Input group-->


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


