@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
          integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.Events')}} </label>
    <!--end::Label-->
    <select class="form-control form-select form-control-solid mb-3 mb-lg-0" name="event_id"
    >
        @foreach (\App\Models\event::get() as $item)

            <option value="{{$item->id}}"
                    @if(isset($data)) @if($data->event_id == $item->id) selected @endif @endif>{{$item->name}}</option>
        @endforeach
    </select>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.quantity')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="number" name="quantity"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('quantity',$data->quantity ?? 1)}}" required/>
    <!--end::Input-->
</div>

{{--<div class="fv-row mb-7">--}}
{{--    <!--begin::Label-->--}}
{{--    <label class="required fw-bold fs-6 mb-2">{{__('lang.quantity_per_user')}}</label>--}}
{{--    <!--end::Label-->--}}
{{--    <!--begin::Input-->--}}
<input type="hidden" name="quantity_per_user"
       class="form-control form-control-solid mb-3 mb-lg-0"
       placeholder="" value="{{old('quantity_per_user',$data->quantity_per_user ?? 1)}}" required/>
<!--end::Input-->
{{--</div>--}}

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.price')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="number" name="price"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('price',$data->price ?? 1)}}" required/>
    <!--end::Input-->
</div>
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-bold fs-6 mb-2">{{__('lang.expire_date')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="date" name="expire_date"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('expire_date',$data->expire_date ?? '')}}"/>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.type')}} </label>
    <!--end::Label-->
    <select class="form-control form-select form-control-solid mb-3 mb-lg-0" name="type" id="cmd_type"
    >
        <option value="free"
                @if(isset($data)) @if($data->type == "free") selected @endif @endif>{{__('lang.Free')}}</option>
        <option value="payable"
                @if(isset($data)) @if($data->type == "payable") selected @endif @endif>{{__('lang.payable')}}</option>
    </select>
    <!--end::Input-->
</div>

<div class="fv-row mb-7" id="payable_type_container"
     @if(isset($data)) @if($data->type == 'free' ) style="display: none;" @endif @else style="display: none;" @endif >
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.payable_type')}} </label>
    <!--end::Label-->
    <select class="form-control form-select form-control-solid mb-3 mb-lg-0" name="payable_type">
        <option value="online"
                @if(isset($data)) @if($data->payable_type == "online") selected @endif @endif>{{__('lang.payable_type_online')}}</option>
        <option value="offline"
                @if(isset($data)) @if($data->payable_type == "offline") selected @endif @endif>{{__('lang.payable_type_offline')}}</option>
        <option value="both"
                @if(isset($data)) @if($data->payable_type == "both") selected @endif @endif>{{__('lang.payable_type_both')}}</option>
    </select>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <div
        class="form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.need_approve')}}
            ؟</label>
        <input class="form-check-input" name="need_approve" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="need_approve" type="checkbox"
               value="active" @if(isset($data)) @if($data->need_approve == 'active') checked
               @endif @endif id="flexSwitchDefault"/>
    </div>
</div>

<div class="fv-row mb-7">
    <div
        class="form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.is_recommended')}}
            ؟</label>
        <input class="form-check-input" name="is_recommended" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="is_recommended" type="checkbox"
               value="active" @if(isset($data)) @if($data->is_recommended == 'active') checked
               @endif @endif id="flexSwitchDefault"/>
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
               value="active" @if(isset($data)) @if($data->status == 'active') checked
               @endif @endif id="flexSwitchDefault"/>
    </div>
</div>

<!--begin::Input group-->
