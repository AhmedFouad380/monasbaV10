<div class="tab-pane fade
@if(request()->segment(1) == 'products' || request()->segment(1) == 'questions' || request()->segment(1) == 'categories'|| request()->segment(1) == 'customfields' || request()->segment(1) == 'tickets' || request()->segment(1) == 'speakers' || request()->segment(1) == 'partners' || request()->segment(1) == 'sponsors' || request()->segment(1) == 'exhibitors'  || request()->segment(1) == 'surveys'  || request()->segment(1) == 'surveyquestions'  ) active show @endif
    " id="kt_aside_nav_tab_front"
     role="tabpanel">
    <div
        class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0"
        id="kt_aside_menu" data-kt-menu="true">
        <div id="kt_aside_menu_wrapper" class="menu-fit">
            <div class="menu-item">
                <div class="menu-content pb-2">
                    <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">
                        {{__('lang.Products')}}
                    </h2>
                </div>
            </div>
{{--            <div class="menu-item">--}}
{{--                <a class="menu-link  @if(request()->routeIs('categories.*') || request()->routeIs('sub_categories.*')) active @endif "--}}
{{--                   href="{{url('/categories')}}">--}}
{{--                   <span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/communication/com001.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"--}}
{{--                                                                              fill="black"></path>--}}
{{--																		<path--}}
{{--                                                                            d="M19 10.4C19 10.3 19 10.2 19 10C19 8.9 18.1 8 17 8H16.9C15.6 6.2 14.6 4.29995 13.9 2.19995C13.3 2.09995 12.6 2 12 2C11.9 2 11.8 2 11.7 2C12.4 4.6 13.5 7.10005 15.1 9.30005C15 9.50005 15 9.7 15 10C15 11.1 15.9 12 17 12C17.1 12 17.3 12 17.4 11.9C18.6 13 19.9 14 21.4 14.8C21.4 14.8 21.5 14.8 21.5 14.9C21.7 14.2 21.8 13.5 21.9 12.7C20.9 12.1 19.9 11.3 19 10.4Z"--}}
{{--                                                                            fill="black"></path>--}}
{{--																		<path--}}
{{--                                                                            d="M12 15C11 13.1 10.2 11.2 9.60001 9.19995C9.90001 8.89995 10 8.4 10 8C10 7.1 9.40001 6.39998 8.70001 6.09998C8.40001 4.99998 8.20001 3.90005 8.00001 2.80005C7.30001 3.10005 6.70001 3.40002 6.20001 3.90002C6.40001 4.80002 6.50001 5.6 6.80001 6.5C6.40001 6.9 6.10001 7.4 6.10001 8C6.10001 9 6.80001 9.8 7.80001 10C8.30001 11.6 9.00001 13.2 9.70001 14.7C7.10001 13.2 4.70001 11.5 2.40001 9.5C2.20001 10.3 2.10001 11.1 2.10001 11.9C4.60001 13.9 7.30001 15.7 10.1 17.2C10.2 18.2 11 19 12 19C12.6 20 13.2 20.9 13.9 21.8C14.6 21.7 15.3 21.5 15.9 21.2C15.4 20.5 14.9 19.8 14.4 19.1C15.5 19.5 16.5 19.9 17.6 20.2C18.3 19.8 18.9 19.2 19.4 18.6C17.6 18.1 15.7 17.5 14 16.7C13.9 15.8 13.1 15 12 15Z"--}}
{{--                                                                            fill="black"></path>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                       <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                    <span class="menu-title">{{__('lang.categories')}}</span>--}}

{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="menu-item">--}}
{{--                <a class="menu-link  @if(request()->segment(1) == 'countries' || request()->routeIs('cities.*') ||  request()->segment(1) == 'states') active @endif "--}}
{{--                   href="{{url('/countries')}}">--}}
{{--                 <span class="menu-icon">--}}
{{--																<!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->--}}
{{--																<span class="svg-icon svg-icon-2">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path--}}
{{--                                                                            d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"--}}
{{--                                                                            fill="black"></path>--}}
{{--																		<path opacity="0.3"--}}
{{--                                                                              d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"--}}
{{--                                                                              fill="black"></path>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                     <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                    <span class="menu-title">{{__('lang.Countries')}}</span>--}}

{{--                </a>--}}
{{--            </div>--}}
            <div class="menu-item">
                <a class="menu-link  @if(request()->segment(1) == 'products' || request()->routeIs('products.*') ||  request()->segment(1) == 'products') active @endif "
                   href="{{url('/products')}}">
                 <span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                                                            fill="black"></path>
																		<path opacity="0.3"
                                                                              d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                                                              fill="black"></path>
																	</svg>
																</span>
                     <!--end::Svg Icon-->
															</span>
                    <span class="menu-title">{{__('lang.products')}}</span>

                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link  @if(request()->segment(1) == 'questions' || request()->routeIs('questions.*') ||  request()->segment(1) == 'questions' || request()->routeIs('question-comments.*')) active @endif "
                   href="{{url('/questions')}}">
                 <span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                                                            fill="black"></path>
																		<path opacity="0.3"
                                                                              d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                                                              fill="black"></path>
																	</svg>
																</span>
                     <!--end::Svg Icon-->
															</span>
                    <span class="menu-title">{{__('lang.Questions')}}</span>

                </a>
            </div>


        </div>
    </div>
</div>
