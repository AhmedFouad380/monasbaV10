@extends('layout.layout')

@section('title')
    {{__('lang.General Setting')}}
@endsection

@section('content')

    <!--begin::Entry-->
        <!--begin::Container-->

        <div class="container">
         <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{__('lang.General Setting')}}
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('Setting/update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="kt-section__body">

                                    <div class="form-group">
                                        <label>{{__('lang.name_ar')}} :</label>
                                        <input class="form-control form-control-solid" type="text" value="{{$Setting->name_ar}}" name="name_ar">
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('lang.name_en')}} :</label>
                                        <input class="form-control form-control-solid" type="text" value="{{$Setting->name_en}}" name="name_en">
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('lang.about_ar')}} :</label>
                                        <textarea class="form-control form-control-solid" id="editor1"  name="about_ar" rows="5" value=""> {{$Setting->about_ar}} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('lang.about_en')}} :</label>
                                        <textarea class="form-control form-control-solid"  id="editor2"  name="about_en" rows="5" value=""> {{$Setting->about_en}} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Terms & Policy Arabic :</label>
                                        <textarea class="form-control form-control-solid"  id="editor3"   name="terms_ar" rows="5" value=""> {{$Setting->terms_ar}} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Terms & Policy  English:</label>
                                        <textarea class="form-control form-control-solid"   id="editor4" name="terms_en" rows="5" value=""> {{$Setting->terms_en}} </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('lang.users_status')}} :</label>
                                        <select name="users_status" class="form-control">
                                            <option @if($Setting->users_status == 'active')  selected  @endif value="active">{{__('lang.active')}}</option>
                                            <option @if($Setting->users_status == 'inactive')  selected  @endif  value="inactive">{{__('lang.inactive')}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('lang.ads_count_per_month')}} :</label>
                                        <input class="form-control form-control-solid" type="number" value="{{$Setting->ads_count_per_month}}" name="ads_count_per_month">
                                    </div>
                                    <input type="hidden" name="id" value="{{$Setting->id}}" />

                                    <div class="form-group">
                                        <label>Android Version :</label>
                                        <input class="form-control form-control-solid" type="text" value="{{$Setting->android_version}}" name="android_version">
                                    </div>

                                    <div class="form-group">
                                        <label>ios_version :</label>
                                        <input class="form-control form-control-solid" type="text" value="{{$Setting->ios_version}}" name="ios_version">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="kt-section__body">

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">@if(session('lang') == 'ar')
                                            اللوجو@else  Logo @endif</label>
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="card">
                                                <div class="card-block">
                                                    <h4 class="card-title"></h4>
                                                    <div class="controls">
                                                        <input type="file" id="input-file-now" class="dropify"  data-default-file="{{asset($Setting->logo)}}" name="logo"   data-validation-required-message="{{trans('word.This field is required')}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->








@section('script')
{{--    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditorv4.js')}}"></script>--}}
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.replace( 'editor3' );
        CKEDITOR.replace( 'editor4' );

    </script>

    <script>

        $("#checker").click(function(){
            var items = document.getElementsByTagName("input");

            for(var i=0; i<items.length; i++){
                if(items[i].type=='checkbox') {
                    if (items[i].checked==true) {
                        items[i].checked=false;
                    } else {
                        items[i].checked=true;
                    }
                }
            }

        });

        //Delete Row
        $("body").on("click", "#delete", function () {
            var dataList = [];
            dataList = $("#kt_datatable input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();

            if(dataList.length >0){
                Swal.fire({
                    title: "{{trans('word.Are you sure?')}}",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{trans('word.Yes, Sure it!')}}",
                    cancelButtonText: "{{trans('word.No')}}",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function (result) {
                    if (result.value) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url:'{{url("Delete_Language")}}',
                            type:"get",
                            data:{'id':dataList,_token: CSRF_TOKEN},
                            dataType:"JSON",
                            success: function (data) {
                                if(data.message == "Success")
                                {
                                    $("#kt_datatable .selected").hide();
                                    @if( Request::segment(1) == "ar")
                                    $('#delete').text('حذف 0 سجل');
                                    @else
                                    $('#delete').text('Delete 0 row');
                                    @endif
                                    Swal.fire("{{trans('word.Deleted')}}", "{{trans('word.Message_Delete')}}", "success");
                                    location.reload();
                                }else{
                                    Swal.fire("{{trans('word.Sorry')}}", "{{trans('word.Message_Fail_Delete')}}", "error");
                                }
                            },
                            fail: function(xhrerrorThrown){
                                Swal.fire("{{trans('word.Sorry')}}", "{{trans('word.Message_Fail_Delete')}}", "error");
                            }
                        });
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire("{{trans('word.Cancelled')}}", "{{trans('word.Message_Cancelled_Delete')}}", "error");
                    }
                });
            }
        });

        $(document).ready(function() {
            // Basic
            $('.dropify').dropify({
            messages: {
                'default': "{{trans('lang.dropify-default')}}",
                'replace': "{{trans('lang.dropify-replace')}}",
                'remove':  "{{trans('lang.dropify-remove')}}",
                'error':   "{{trans('lang.dropify-error')}}"
            }
        });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });

        //End Delete Row
        $(".edit-Advert").click(function(){
            var id=$(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('Edit_Language')}}",
                data: {"id":id},
                success: function (data) {
                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal',function (e){
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })

        $(".switchery-demo").click(function(){
            var id =$(this).data('id');
            console.log(id);
            $.ajax({
                type: "get",
                url: "{{url('UpdateStatusUser')}}",
                data: {"id":id },
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: "@if(Request::segment(1)=='ar')  نجاح @else success @endif",
                        text: "@if(Request::segment(1) == 'ar' ) تم التعديل بنجاح   @else Successfully changed @endif",
                        type:"success" ,
                        timer: 1000,
                        showConfirmButton: false
                    });


                }
            })
        })
    </script>

    <?php
    $message=session()->get("message");
    ?>



    @if( session()->has("message"))
        @if( $message == "Success")
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "{{__('lang.Success')}}",
                    text: "{{__('lang.Success_text')}}",
                    type:"success" ,
                    timer: 1000,
                    showConfirmButton: false
                });

            </script>
        @elseif ( $message == "Failed")
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "{{__('lang.Sorry')}}",
                    text: "{{__('lang.operation_failed')}}",
                    type:"error" ,
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
    @endif
@endsection
@endsection
