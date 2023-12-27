<div
    class="form-check form-switch form-check-custom form-check-solid">

    <input class="form-check-input" name="is_approved" type="hidden"
           value="0" id="flexSwitchDefault"/>
    <input
        class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
        onchange="update_approved(this,'{{url('user-verifications/change_active')}}')"
        value="{{ $id }}" name="is_approved" type="checkbox" @if($is_approved == '1') checked @endif
        id="flexSwitchDefault"/>
</div>
