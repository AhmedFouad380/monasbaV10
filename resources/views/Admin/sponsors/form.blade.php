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
                       placeholder="" value="{{old('name_ar',$data->name_ar ?? '')}}" required/>
                <!--end::Input-->
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

        </div>
    </div>




    <div class="fv-row mb-7" id="speech_video_link_dev">
        <!--begin::Label-->
        <label class="required fw-bold fs-6 mb-2">{{__('lang.link')}}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="url"
               class="form-control form-control-solid mb-3 mb-lg-0"
               placeholder="" value="{{old('url',$data->url ?? '')}}" required/>
        <!--end::Input-->
    </div>

    @if(Auth::guard('admin')->check())
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-bold fs-6 mb-2">{{__('lang.Host')}} </label>
            <!--end::Label-->
            <select  data-control="select2" id="host2" data-placeholder="Select an option" class=" input-text form-control  form-select  mb-3 mb-lg-0"  name="host_id"
            >
                @foreach(\App\Models\Host::all() as $host)
                    <option @if(isset($data) && $data->host_id == $host->id) selected @endif value="{{$host->id}}">
                        {{$host->name}}</option>
                @endforeach
            </select>
            <!--end::Input-->
        </div>
    @else
        <input type="hidden" name="host_id" value="{{Auth::guard('host')->id()}}">
    @endif

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="required fw-bold fs-6 mb-2">{{__('lang.events')}} </label>
        <!--end::Label-->
        <select  data-control="select2" id="speaker_id2" multiple data-placeholder="Select an option" class="form-control  input-text form-select  mb-3 mb-lg-0"  name="event_id"
        >
            @if(Auth::guard('admin')->check())
                @foreach(\App\Models\event::all() as $host)
                    <option @if(isset($data) && $data->event_id == $host->id) selected @endif value="{{$host->id}}">
                        {{$host->name}}</option>
                @endforeach
            @else
                @foreach(\App\Models\event::where('host_id',Auth::guard('host')->id())->get() as $host)
                    <option @if(isset($data) && $data->host_id == $host->id) selected @endif value="{{$host->id}}">
                        {{$host->name}}</option>
                @endforeach
            @endif

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
                   name="status" type="checkbox"    @if(isset($data) && $data->status == 'active') checked @endif
                   value="active" id="flexSwitchDefault" />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.image')}}</label>
        <div class="col-lg-9 col-xl-12">
            <input accept="image/*"  type="file" @if(request()->segment(2) != 'edit') required @endif name="image" class="dropify"
                   data-default-file="@if(isset($data) && $data->image == 'active') checked @endif">
            <span class="form-text text-muted">{{trans('lang.allows_files_type')}}:  png, jpg, jpeg , svg.</span>
        </div>
    </div>

    <!--begin::Input group-->
</div>

@section('script')







@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        CKEDITOR.replace('editor4');
        @if(isset($data))
            $(document).ready(function() { /* code here */
                var wahda = $('#speech_type').val();
                if (wahda == 'text') {
                    document.getElementById("speech_video_link_dev").style.display = "none";
                    document.getElementById("speech_ar_dev").style.display = "block";
                    document.getElementById("speech_en_dev").style.display = "block";
                }else{
                    document.getElementById("speech_video_link_dev").style.display = "block";
                    document.getElementById("speech_ar_dev").style.display = "none";
                    document.getElementById("speech_en_dev").style.display = "none";
                }
        });
        @endif
        $("#speech_type").change(function () {
            var wahda = $(this).val();

            if (wahda == 'text') {
                document.getElementById("speech_video_link_dev").style.display = "none";
                document.getElementById("speech_ar_dev").style.display = "block";
                document.getElementById("speech_en_dev").style.display = "block";
            }else{
                document.getElementById("speech_video_link_dev").style.display = "block";
                document.getElementById("speech_ar_dev").style.display = "none";
                document.getElementById("speech_en_dev").style.display = "none";
            }
        });
    </script>


    <script>
        $('#host2').change(function(){
            var level = $(this).val();
            $.ajax({
                url: "{{url('events/get_host_events')}}/" + level ,
                dataType: 'html',
                type: 'get',
                success: function (data) {
                    $('#speaker_id2').html(data);
                }
            });
        });
    </script>

@endpush
