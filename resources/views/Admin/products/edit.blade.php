@extends('layout.layout')

@php
    $route = 'products';
@endphp

@section('style')
    <style>
        @media (min-width: 992px) {
            .aside-me .content {
                padding-right: 30px;
            }
        }
    </style>
@endsection
@section('header')
    <!--begin::Heading-->
    <h1 class="text-dark fw-bolder my-0 fs-2"> {{trans('lang.edit')}}</h1>
    <!--end::Heading-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}" class="text-muted">
                {{trans('lang.Dashboard')}} </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route($route.'.index')}}" class="text-muted">
                {{trans('lang.'.$route)}} </a>
        </li>
        <li class="breadcrumb-item">
            {{trans('lang.edit')}}
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection


@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->

        <div class="content flex-row-fluid" id="kt_content">

            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_profile_details" aria-expanded="true"
                     aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">{{__('lang.Users_Edit')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" action="{{url($route.'/update/'.$data->id)}}"
                          class="form"
                          method="post"  enctype="multipart/form-data" >
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            @include('Admin.'.$route.'.form')
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">{{__('lang.save')}}
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->

        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')

    <script>

        $("#state").change(function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-branch')}}" + '/' + wahda, function ($data) {
                    var outs = "";
                    $.each($data, function (title, id) {
                        console.log(title)
                        outs += '<option value="' + id + '">' + title + '</option>'
                    });
                    $('#branche').html(outs);
                });
            }
        });
    </script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>

        tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  plugins: 'a_tinymce_plugin',
  a_plugin_option: true,
  a_configuration_option: 400
});
    </script>
    <script>
        $(document).ready(function() {

            $('.js-example-basic-users').select2({
                dropdownParent: $("#kt_modal_add_user")
            });
        });
        {{-- GET SUB CATEGORIES METHODS --}}
        $("#categories").on('click , change',function () {
            var category_id = $(this).val();
            console.log(category_id);

            if (category_id != '') {
                $.get("{{ URL::to('sub_categories/get-products-sub-categories/')}}" + '/' + category_id, function ($data) {
                    $('#subcategories').html($data);
                });
            }
        });

        {{-- GET CITIES METHODS --}}
        $("#countries").on('click , change',function () {
            var country_id = $(this).val();
            $('#states').children().remove();

            console.log(country_id);

            if (country_id != '') {
                $.get("{{ URL::to('cities/get-cities/')}}" + '/' + country_id, function ($data) {
                    $('#cities').html($data);
                });
                $.get("{{ URL::to('currencies/get-currencies/')}}" + '/' + country_id, function ($data) {
                    $('#currency').html($data);
                });
            }

        });

        {{-- GET STATES METHODS --}}
        $("#cities").on('click , change',function () {
            var city_id = $(this).val();
            console.log(city_id);

            if (city_id != '') {
                $.get("{{ URL::to('states/get-states/')}}" + '/' + city_id, function ($data) {
                    $('#states').html($data);
                });
            }
        });
    </script>



@endsection

