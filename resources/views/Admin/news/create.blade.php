@extends('layout.layout')

@php
    $route = 'news';
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
    <h1 class="text-dark fw-bolder my-0 fs-2"> {{trans('lang.add')}}</h1>
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
            {{trans('lang.add')}}
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
                        <h3 class="fw-bolder m-0">{{__('lang.add')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" action="{{url($route.'/store')}}"
                          class="form"
                          method="post"  enctype="multipart/form-data" >
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">{{__('lang.arabic')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">{{__('lang.english')}}</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">{{__('lang.name_ar')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="name_ar"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="" value="{{old('name_ar')}}" required/>
                                        <!--end::Input-->
                                    </div>

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">{{__('lang.description_ar')}}</label>
                                        <textarea name="description_ar" id="editor1">{{old('description_ar')}}</textarea>
                                    </div>


                                </div>

                                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">{{__('lang.name_en')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="name_en"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="" value="{{old('name_en',$data->name_en ?? '')}}" required/>
                                        <!--end::Input-->
                                    </div>

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">{{__('lang.description_en')}}</label>
                                        <textarea name="description_en" id="editor2">{{old('description_en')}}</textarea>
                                    </div>
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">{{__('lang.type')}} </label>
                                    <!--end::Label-->
                                    <select class="form-control form-select form-control-solid mb-3 mb-lg-0" name="type"
                                    >
                                        <option value="public">{{__('lang.public')}}</option>
                                        <option value="private">{{__('lang.private')}}</option>
                                    </select>
                                    <!--end::Input-->
                                </div>

                                <div class="fv-row mb-7">
                                    <div
                                        class="form-check form-switch form-check-custom form-check-solid">
                                        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.active')}}</label>
                                        <input class="form-check-input" name="status" type="hidden"
                                               value="inactive" id="flexSwitchDefault"/>
                                        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                               name="status" type="checkbox"
                                               value="active" id="flexSwitchDefault" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.image')}}</label>
                                    <div class="col-lg-9 col-xl-12">
                                        <input type="file" @if(request()->segment(2) != 'edit') required @endif name="image" class="dropify"
                                               data-default-file="{{old('price')}}">
                                        <span class="form-text text-muted">{{trans('lang.allows_files_type')}}:  png, jpg, jpeg , svg.</span>
                                    </div>
                                </div>

                            </div>
                            <!--begin::Input group-->
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






@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
    </script>
@endpush
