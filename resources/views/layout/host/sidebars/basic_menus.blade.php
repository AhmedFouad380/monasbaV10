{{--@if(request()->segment(1) != 'ready' && request()->segment(1) != 'cars') active show @endif--}}
<div class="tab-pane fade
@if(request()->segment(2) == 'employees' || request()->segment(2) == 'news' || request()->segment(2) == 'surveys' || request()->segment(2) == 'surveyquestions') active show @endif
    " id="kt_aside_nav_tab_menu"

     role="tabpanel">
    <div
        class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0"
        id="kt_aside_menu" data-kt-menu="true">
        <div id="kt_aside_menu_wrapper" class="menu-fit">
            <div class="menu-item">
                <div class="menu-content pb-2">
                    <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">
                        {{trans('lang.basic_menus')}}
                    </h2>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{trans('lang.settings')}}</span>
                </div>
            </div>

            <div class="menu-item">
                <a class="menu-link @if(request()->routeIs('host.employees.*')) active @endif "
                   href="{{url('host/employees')}}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"></polygon>
        <path
            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
        <path
            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"></path>
    </g>
</svg><!--end::Svg Icon--></span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">{{__('lang.employees')}}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link  @if(request()->routeIs('host.surveys.*') || request()->routeIs('host.surveyquestions.*')) active @endif "
                   href="{{url('host/surveys')}}">
                   <span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/communication/com001.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3"
                                                                              d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                                              fill="black"></path>
																		<path
                                                                            d="M19 10.4C19 10.3 19 10.2 19 10C19 8.9 18.1 8 17 8H16.9C15.6 6.2 14.6 4.29995 13.9 2.19995C13.3 2.09995 12.6 2 12 2C11.9 2 11.8 2 11.7 2C12.4 4.6 13.5 7.10005 15.1 9.30005C15 9.50005 15 9.7 15 10C15 11.1 15.9 12 17 12C17.1 12 17.3 12 17.4 11.9C18.6 13 19.9 14 21.4 14.8C21.4 14.8 21.5 14.8 21.5 14.9C21.7 14.2 21.8 13.5 21.9 12.7C20.9 12.1 19.9 11.3 19 10.4Z"
                                                                            fill="black"></path>
																		<path
                                                                            d="M12 15C11 13.1 10.2 11.2 9.60001 9.19995C9.90001 8.89995 10 8.4 10 8C10 7.1 9.40001 6.39998 8.70001 6.09998C8.40001 4.99998 8.20001 3.90005 8.00001 2.80005C7.30001 3.10005 6.70001 3.40002 6.20001 3.90002C6.40001 4.80002 6.50001 5.6 6.80001 6.5C6.40001 6.9 6.10001 7.4 6.10001 8C6.10001 9 6.80001 9.8 7.80001 10C8.30001 11.6 9.00001 13.2 9.70001 14.7C7.10001 13.2 4.70001 11.5 2.40001 9.5C2.20001 10.3 2.10001 11.1 2.10001 11.9C4.60001 13.9 7.30001 15.7 10.1 17.2C10.2 18.2 11 19 12 19C12.6 20 13.2 20.9 13.9 21.8C14.6 21.7 15.3 21.5 15.9 21.2C15.4 20.5 14.9 19.8 14.4 19.1C15.5 19.5 16.5 19.9 17.6 20.2C18.3 19.8 18.9 19.2 19.4 18.6C17.6 18.1 15.7 17.5 14 16.7C13.9 15.8 13.1 15 12 15Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                       <!--end::Svg Icon-->
															</span>
                    <span class="menu-title">{{__('lang.surveys')}}</span>

                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link  @if(request()->routeIs('host.news.*')) active @endif "
                   href="{{url('/host/news')}}">
                   <span class="menu-icon">
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3"
                                                                              d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                                                                              fill="black"></path>
																		<path
                                                                            d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z"
                                                                            fill="black"></path>
																		<path
                                                                            d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                                                                            fill="black"></path>
																	</svg>
																</span>
                       <!--end::Svg Icon-->
															</span>
                    <span class="menu-title">{{__('lang.news')}}</span>

                </a>
            </div>

{{--            <div class="menu-item">--}}
{{--                <a class="menu-link  @if(request()->routeIs('subscribes.*')) active @endif "--}}
{{--                   href="{{url('host/subscribes')}}">--}}
{{--                  <span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path--}}
{{--                                                                            d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"--}}
{{--                                                                            fill="black"></path>--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"--}}
{{--                                                                              fill="black"></path>--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"--}}
{{--                                                                              fill="black"></path>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                      <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                    <span class="menu-title">{{__('lang.subscribes')}}</span>--}}

{{--                </a>--}}
{{--            </div>--}}


        </div>
    </div>
</div>
