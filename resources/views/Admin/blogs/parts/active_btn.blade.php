<div
    class="form-check form-switch form-check-custom form-check-solid">

    <input class="form-check-input" name="status" type="hidden"
           value="inactive" id="flexSwitchDefault"/>
    <input
        class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
        onchange="update_active(this,'{{route('blogs.change_active')}}')"
        value="{{ $id }}" name="status" type="checkbox" @if($status == 'active') checked @endif
        id="flexSwitchDefault"/>
</div>
<script>
    $("#categories").on('click , change',function () {
        var www = $(this).val();
        console.log(dsdsa);

        if (category_id != '') {
            $.get("{{ URL::to('sub_categories/get-products-sub-categories/')}}" + '/' + category_id, function ($data) {
                $('#subcategories').html($data);
            });
        }
    });
</script>
