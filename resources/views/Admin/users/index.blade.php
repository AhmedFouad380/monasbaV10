@extends('layout.layout')
@php
    $route = 'users';
@endphp
@section('title',__('lang.users'))
@section('header')
    <!--begin::Heading-->
    <h1 class="text-dark fw-bolder my-0 fs-2">{{trans('lang.'.$route)}} </h1>
    <!--end::Heading-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}" class="text-muted">
                {{trans('lang.Dashboard')}} </a>
        </li>
        <li class="breadcrumb-item">
            {{trans('lang.'.$route)}}
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-0">

                    <!--begin::Table-->
                    <table class="table  align-middle table-row-bordered  text-center fs-4 gy-5" id="users_table">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->

                        <tr class="bg-secondary text-dark  fw-bolder fs-5 text-capitalize gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#users_table .checkbox" value="1"/>
                                </div>
                            </th>

                            <th class="min-w-125px">{{__('lang.image')}}</th>
                            <th class="min-w-125px">{{__('lang.name')}}</th>
                            <th class="min-w-125px">{{__('lang.email')}}</th>
                            <th class="min-w-125px">{{__('lang.username')}}</th>
                            <th class="min-w-125px">{{__('lang.phone')}}</th>
                            <th class="min-w-125px">{{__('lang.Users_active')}}</th>
                            <th class="min-w-125px">{{__('lang.Actions')}}</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->


                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Post-->
    </div>
    <div class="modal fade" id="kt_modal_filter" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_filter_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">{{__('lang.filter')}}</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                        <form method="get">
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">


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

                                <div class="col m-1">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">{{__('lang.cities')}} </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    @isset($data)
                                        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="cities2" data-num="1" name="city_id"
                                        >
                                            <option value="{{$data->city_id}}">{{$data->City->name}}</option>

                                        </select>
                                    @else
                                        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="cities2" data-num="1" name="city_id"
                                        >

                                        </select>
                                    @endif
                                </div>

                            </div>
                            <div class="row g-2 m-1">
                                <!--begin::Label-->
                                <div class="col m-1">
                                    <label class="required fw-bold fs-6 mb-2">{{__('lang.states')}} </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    @isset($data)
                                        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="states2" data-num="1" name="state_id"
                                        >
                                            <option value="{{$data->state_id}}">{{$data->State->name}}</option>

                                        </select>
                                    @else
                                        <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products"  id="states2" data-num="1" name="state_id"
                                        >

                                        </select>
                                    @endif
                                </div>

                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2">{{__('lang.phone')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="tel" name="phone" id="phone"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="" value=""/>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">

                                <label class="required fw-semibold fs-6 mb-2">{{__('lang.active')}}</label>
                                <select name="status" id="status" data-control="select2"  data-hide-search="true" class="form-select form-select-solid fw-bold">
                                    <option value="">--------</option>
                                    <option value="active">{{__('lang.active')}}</option>
                                    <option value="inactive">{{__('lang.inactive')}} </option>
                                </select>
                            </div>

                        </div>

                        <div class="text-center pt-15">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">{{__('lang.discard')}}</button>
                            <button type="submit" class="btn btn-primary" id="submit">
                                <span class="indicator-label">{{__('lang.submit')}}</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                aaSorting: [],
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'Search',
                    url: "@if(Session('lang')  ==  'ar') //cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json @endif"
                },
                buttons: [
                    {
                        extend: 'colvis',
                        text: '{{__('lang.Show column')}}',
                        title: '',

                        className: 'btn btn-primary me-3',
                        customize: function (win) {
                            $(win.document).css('direction', '{{__('lang.lang-direction')}}');
                        }
                    },

                    {
                        extend: 'print',
                        className: 'btn btn-primary me-3',
                        text: '<i class="bi bi-printer-fill fs-2x"></i>',
                        titleAttr: "{{__('lang.print')}}",
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', '{{__('lang.lang-direction')}}').prepend(
                                ' <table> ' +
                                '                        <tbody> ' +
                                '                                <tr>' +
                                '                                    <td style="text-align: right"> <img src="{{asset('logo.png')}}" width="150px" height="150px" /> </td>' +
                                '                                    <td style="text-align: right"><p>{{__("lang.title")}} : {{__('lang.'.$route)}}</p>' +
                                '                                                                  <p>{{__('lang.date')}} : {{ Carbon\Carbon::now()->translatedFormat('l Y/m/d') }}</p>' +
                                '                                                                  <p>{{__('lang.time')}} : {{ Carbon\Carbon::now()->translatedFormat('h:i a') }}</p></td>' +
                                '                                </tr> ' +
                                '                        </tbody>' +
                                '                    </table>'
                            );
                        },

                        exportOptions: {
                            columns: [0, ':visible'],
                            stripHtml: false
                        }
                    },

                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {
                        extend: 'excel',
                        className: 'btn btn-primary me-3',
                        text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i> ',
                        title: '',
                        titleAttr: "{{__('lang.excel')}}",
                        customize: function (win) {
                            $(win.document)
                                .css('direction', 'rtl');
                        },
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },

                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                ],
                ajax: {
                    url: '{{ route($route.'.datatable') }}',
                    data: {
                        @if(Request::get('country_id'))
                            'country_id': {{Request::get('country_id')}},
                        @endif
                            @if(Request::get('city_id'))
                            'city_id': {{Request::get('city_id')}},
                        @endif
                            @if(Request::get('state_id'))
                            'state_id': {{Request::get('state_id')}},
                        @endif
                            @if(Request::get('is_active'))
                        'is_active': {{Request::get('is_active')}},
                        @endif
                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {
                        data: 'image', name: 'image', "searchable": false, "orderable": false,
                        render: function (data) {
                            return "<img src=\"" + data + "\" height=\"50\"/>";
                        }
                    },
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'email', name: 'email', "searchable": true, "orderable": true},
                    {data: 'username', name: 'username', "searchable": true, "orderable": true},
                    {data: 'phone', name: 'phone', "searchable": true, "orderable": true},
                    {data: 'status', name: 'status', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},
                ]
            });

            $('#submit').click(function(){
            $("#kt_modal_filter").modal('hide');
                table.draw();
            });

            $.ajax({
                url: "{{ URL::to($route.'/add-button')}}",
                success: function (data) {
                    $('.add_button').append(data);
                },
                dataType: 'html'
            });
        });
    </script>


@endsection

