@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.hosts')}} </label>
    <!--end::Label-->
    <select class="form-control form-select form-control-solid mb-3 mb-lg-0" name="host_id"
    >
        @foreach (\App\Models\Host::get() as $item)

        <option value="{{$item->id}}" @if(isset($data)) @if($data->host_id == $item->id) selected @endif @endif>{{$item->name}}</option>
        @endforeach
    </select>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{$features[0]->name}} </label><span class="float-end">{{__('lang.price_per_ticket')}}: {{$features[0]->price}}</span>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="number" name="tickets"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('tickets',$data->qty ?? 1)}}" required/>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fs-6 fw-semibold mb-2">{{__('lang.event_type')}}</label>
    <!--end::Label-->
    <!--begin::Row-->
    <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
        <!--begin::Col-->
        <div class="col-md-6 col-lg-12 col-xxl-6">
            <!--begin::Option-->
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                <!--begin::Radio-->
                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                    <input class="form-check-input" type="radio" name="event_type" value="{{$features[1]->id}}" required />
                </span>
                <!--end::Radio-->
                <!--begin::Info-->
                <span class="ms-5">
                    <span class="fs-4 fw-bold text-gray-800 mb-2 d-block">{{$features[1]->name}}</span>
                    <span class="fw-semibold fs-7 text-gray-600">{{__('lang.price')}}: {{$features[1]->price}}</span>
                </span>
                <!--end::Info-->
            </label>
            <!--end::Option-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-12 col-xxl-6">
            <!--begin::Option-->
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                <!--begin::Radio-->
                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                    <input class="form-check-input" type="radio" name="event_type" value="{{$features[2]->id}}" />
                </span>
                <!--end::Radio-->
                <!--begin::Info-->
                <span class="ms-5">
                    <span class="fs-4 fw-bold text-gray-800 mb-2 d-block">{{$features[2]->name}}</span>
                    <span class="fw-semibold fs-7 text-gray-600">{{__('lang.price')}}: {{$features[2]->price}}</span>
                </span>
                <!--end::Info-->
            </label>
            <!--end::Option-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fs-6 fw-semibold mb-2">{{__('lang.payment_method')}}</label>
    <!--end::Label-->
    <!--begin::Row-->
    <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
        <!--begin::Col-->
        <div class="col-md-4 col-lg-12 col-xxl-4">
            <!--begin::Option-->
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                <!--begin::Radio-->
                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                    <input class="form-check-input" type="radio" name="payment_method" required value="{{$features[3]->id}}" />
                </span>
                <!--end::Radio-->
                <!--begin::Info-->
                <span class="ms-5">
                    <span class="fs-4 fw-bold text-gray-800 mb-2 d-block">{{$features[3]->name}}</span>
                    <span class="fw-semibold fs-7 text-gray-600">{{__('lang.price')}}: {{$features[3]->price}}</span>
                </span>
                <!--end::Info-->
            </label>
            <!--end::Option-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-4 col-lg-12 col-xxl-4">
            <!--begin::Option-->
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                <!--begin::Radio-->
                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                    <input class="form-check-input" type="radio" name="payment_method" value="{{$features[4]->id}}" />
                </span>
                <!--end::Radio-->
                <!--begin::Info-->
                <span class="ms-5">
                    <span class="fs-4 fw-bold text-gray-800 mb-2 d-block">{{$features[4]->name}}</span>
                    <span class="fw-semibold fs-7 text-gray-600">{{__('lang.price')}}: {{$features[4]->price}}</span>
                </span>
                <!--end::Info-->
            </label>
            <!--end::Option-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-4 col-lg-12 col-xxl-4">
            <!--begin::Option-->
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                <!--begin::Radio-->
                <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                    <input class="form-check-input" type="radio" name="payment_method" value="{{$features[5]->id}}" />
                </span>
                <!--end::Radio-->
                <!--begin::Info-->
                <span class="ms-5">
                    <span class="fs-4 fw-bold text-gray-800 mb-2 d-block">{{$features[5]->name}}</span>
                    <span class="fw-semibold fs-7 text-gray-600">{{__('lang.price')}}: {{$features[5]->price}}</span>
                </span>
                <!--end::Info-->
            </label>
            <!--end::Option-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>

<label class="fs-6 fw-semibold mb-2">{{__('lang.extra_feature')}}</label>

@foreach ($features as $k => $feature)
@if ($feature->id > 6)
<div class="fv-row mb-7">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="extra_feature[]" value="{{$feature->id}}" id="flexCheckDefault{{$k}}" />
        <label class="form-check-label" for="flexCheckDefault{{$k}}">
            {{$feature->name}} - {{__('lang.price')}}: {{$feature->price}}
        </label>
    </div>
</div>
@endif
@endforeach


<div class="fv-row mb-7">
    <div
        class="form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.paid_status')}}
            ؟</label>
        <input class="form-check-input" name="paid_status" type="hidden"
               value="not paid" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="paid_status" type="checkbox"
               value="paid" @if(isset($data)) @if($data->paid_status == 'paid') checked @endif @endif id="flexSwitchDefault" />
    </div>
</div>

<div class="fv-row mb-7">
    <div
        class="form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.active')}}</label>
        <input class="form-check-input" name="status" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="status" type="checkbox"
               value="active" @if(isset($data)) @if($data->status == 'active') checked @endif @endif id="flexSwitchDefault" />
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


