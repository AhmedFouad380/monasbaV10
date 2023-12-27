<div
    class="form-check form-switch form-check-custom form-check-solid">

    <input class="form-check-input" name="is_popular" type="hidden"
           value="inactive" id="flexSwitchDefault"/>
    <input
        class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
        onchange="update_active(this,'{{route('news.change_popular')}}')"
        value="{{ $id }}" name="is_popular" type="checkbox" @if($is_popular == 'active') checked @endif
        id="flexSwitchDefault"/>
</div>
