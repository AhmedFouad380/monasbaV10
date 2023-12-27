@extends('layout.layout')

@php
    $route = 'surveyquestions';
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
            <a href="{{route($route.'.index', $data->survey_id)}}" class="text-muted">
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
                            <input type="hidden" value="{{$data->survey_id}}" name="survey_id" />
                            @include('Admin.'.$route.'.form')

                            @if($data->type != 'text' && $data->type != 'number')
                            
                                <div id="kt_docs_repeater_basic">
                                    <hr>
                                    <div class="card-title py-9 ">
                                        <h3 class="fw-bolder">{{__('lang.surveyanswers')}}</h3>
                                    </div>
                                    <div class="form-group">
                                        <div data-repeater-list="kt_docs_repeater_basic">
                                            <div data-repeater-item>
                                                <div class="form-group row mb-7">
                                                    <div class="col-md-3">
                                                        <label class="form-label">{{__('lang.name_ar')}}</label>
                                                        <input type="text" name="answer_name_ar" value="" class="form-control mb-2 mb-md-0" placeholder="{{__('lang.name_ar')}}" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">{{__('lang.name_en')}}</label>
                                                        <input type="text" name="answer_name_en" value="" class="form-control mb-2 mb-md-0" placeholder="{{__('lang.name_en')}}" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                            <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                            
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        @foreach ($data->Answers as $k => $anss)
                            
                                            <div class="form-group row mb-7">
                                                <div class="col-md-3">
                                                    <label class="form-label">{{__('lang.name_ar')}}</label>
                                                    <input type="text" name="answer_name_ar[]" value="{{$anss->name_ar}}" class="form-control mb-2 mb-md-0" placeholder="{{__('lang.name_ar')}}" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">{{__('lang.name_en')}}</label>
                                                    <input type="text" name="answer_name_en[]" value="{{$anss->name_en}}" class="form-control mb-2 mb-md-0" placeholder="{{__('lang.name_en')}}" />
                                                </div>

                                            </div>

                                        @endforeach
                                    </div>
                                    <!--end::Form group-->
                                    <!--begin::Form group-->
                                    
        
                                    <!--begin::Form group-->
                                    <div class="form-group mt-5">
                                        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                            <i class="ki-duotone ki-plus fs-3"></i>
                                            
                                        </a>
                                    </div>
                                    <!--end::Form group-->
                                </div>
                            @endif

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
<script src="{{ URL::asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
    <script>
        $('#kt_docs_repeater_basic').repeater({
            initEmpty: false,

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
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

        $("#typselect").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");

            if(optionValue != 'text' && optionValue != 'number'){
                $('#kt_docs_repeater_basic').show();
            } else{
                $("#kt_docs_repeater_basic").hide();
            }
        });
    }).change();
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



@endsection

