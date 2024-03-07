@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<!--begin::Input group-->

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


