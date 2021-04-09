<div class="sidebar" id="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        @if(Auth::user()->is_admin)
        @endif
        <ul class="nav">
            <li class="nav-item" id="dashboard">
                <a href="{{ route('dashboard') }}">
                    <i class="la la-home"></i>
                    <p>{{ __('lang.home') }}</p>
                </a>
            </li>
            <li class="nav-item" id="new_case">
                <a href="{{ route('add_new_case') }}">
                    <i class="la la-ticket"></i>
                    <p>{{ __('lang.add_new_case') }}</p>
                </a>
            </li>

            @if(!Auth::user()->is_admin &&  Auth::user()->user_type == 0)

                <li class="nav-item" id="dashboard">
                    <a href="{{ route('KnowledgeBaseIndex') }}" target="_blank">
                        <i class="la la-book"></i>
                        <p>{{ __('lang.knowledge') }}</p>
                    </a>
                </li>
            @endif
            @if($permission->manageTicket() == 1)
                {{--Customer Ticket Start--}}
                <li id="tickets" class="nav-item">
                    <div id="ticketsID">
                        <a href="#submenuTickets" data-toggle="collapse" aria-expanded="false"
                           class="list-group-item border-0">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-ticket fa-fw mr-3"></span>
                                <span class="menu-collapsed">{{ __('lang.case') }}</span>
                                 <span class="submenu-icon ml-auto"></span>
                            </div>
                        </a>
                    </div>
        <!-- Submenu content -->
                    <ul id='submenuTickets' class="collapse sidebar-submenu">
                        <li class="all-cases {{ (request()->segment(1) == 'all-case') ? 'active': '' }}">
                            <a href="{{ route('all-case') }}" class="border-0">
                                <span class="menu-collapsed">{{ __('lang.all-case') }}</span>
                            </a>
                        </li>
                        <li class="opened-cases {{ (request()->segment(1) == 'opened-cases') ? 'active': '' }}">
                            <a href="{{ route('opened-tickets.openedCases') }}" class="border-0">
                                <span class="menu-collapsed">{{ __('lang.open_cases') }}</span>
                            </a>
                        </li>
                        <li class="closed-cases {{ (request()->segment(1) == 'closed-cases') ? 'active': '' }}">
                            <a href="{{ route('closed-tickets.ClosedCases') }}" class="border-0">
                                <span class="menu-collapsed">{{ __('lang.closed_cases') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li id="complains" class="nav-item">
                    <div id="complainID">
                        <a href="#submenuComplain" data-toggle="collapse" aria-expanded="false"
                           class="list-group-item border-0">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-ticket fa-fw mr-3"></span>
                                <span class="menu-collapsed">{{ __('lang.tickets') }}</span>
                                <span class="submenu-icon ml-auto"></span>
                            </div>
                        </a>
                    </div>
                    <!-- Submenu content -->
                    <ul id='submenuComplain' class="collapse sidebar-submenu">
                        <li class="all-tickets {{ (request()->segment(1) == 'all-tickets') ? 'active': '' }}">
                            <a href="{{ route('all-tickets') }}" class="border-0">
                                <span class="menu-collapsed">{{ __('lang.all_tickets') }}</span>
                            </a>
                        </li>
                        <li class="opened-tickets {{ (request()->segment(1) == 'opened-tickets') ? 'active': '' }}">
                            <a href="{{ route('opened-tickets.openedTickets') }}" class="border-0">
                                <span class="menu-collapsed">{{ __('lang.open_tickets') }}</span>
                            </a>
                        </li>
                        <li class="closed-tickets {{ (request()->segment(1) == 'closed-tickets') ? 'active': '' }}">
                            <a href="{{ route('closed-tickets.ClosedTickets') }}" class="border-0">
                                <span class="menu-collapsed">{{ __('lang.closed_tickets') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>


            @endif
            @if($permission->manageDepartment() == 1 )
                <li class="nav-item" id="department">
                    <a href="{{ route('departments.index') }}">
                        <i class="la la-th-list"></i>
                        <p>{{ __('lang.brand') }}</p>

                        <!--This is actually Departments-->

                    </a>

                </li>

                <li class="nav-item" id="managers">

                    <div id="managersID">

                        <a href="#submenuManager" data-toggle="collapse" aria-expanded="false"
                           class="list-group-item border-0">

                            <i class="la la-male"></i> <span>{{ __('lang.manager') }}</span>

                            <span class="submenu-icon ml-auto"></span>

                        </a>

                    </div>


                    <ul id='submenuManager' class="collapse sidebar-submenu">
                        @if($permission->manageDepartment() == 1)
                            <li class="region-manager {{ (request()->segment(1) == 'region-manager-list') ? 'active': '' }}">
                                <a href="{{ route('region-manager-list') }}" class="border-0">
                                    <span class="menu-collapsed">{{ __('lang.rm') }}</span>
                                </a>
                            </li>
                        @endif
                        @if($permission->manageDepartment() == 1)

                            <li class="area-manager {{ (request()->segment(1) == 'area-manager-list') ? 'active': '' }}">
                                <a href="{{ route('area-manager-list') }}" class="border-0">
                                <span class="menu-collapsed">{{ __('lang.am') }}</span>
                                </a>
                            </li>

                            @endif
                            @if($permission->manageDepartment() == 1)
                             <li class="territory-manager {{ (request()->segment(1) == 'territory-manager-list') ? 'active': '' }}">
                                    <a href="{{ route('territory-manager-list') }}" class="border-0">
                                        <span class="menu-collapsed">{{ __('lang.tm') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if($permission->manageDepartment() == 1)

                                <li class="sales-manager {{ (request()->segment(1) == 'sales-officer-list') ? 'active': '' }}">
                                    <a href="{{ route('sales-officer-list') }}" class="border-0">
                                        <span class="menu-collapsed">{{ __('lang.so') }}</span>
                                    </a>
                                </li>
                            @endif
                    </ul>
                </li>

                {{--Location start--}}
                <li class="nav-item" id="location">
                    <div id="locations">
                        <a href="#submenuLocation" data-toggle="collapse" aria-expanded="false"
                                           class="list-group-item border-0"><i class="la la-male"></i>
                            <span>{{ __('lang.location') }}</span><span class="submenu-icon ml-auto"></span>
                        </a>
                    </div>

                    <ul id='submenuLocation' class="collapse sidebar-submenu">
                        @if($permission->manageItem() == 1)
                            <li class="region {{ (request()->segment(1) == 'regions') ? 'active': '' }}">
                                <a href="{{ route('regions') }}" class="border-0">
                                    <span class="menu-collapsed">{{ __('lang.region') }}</span>
                                </a>
                            </li>
                        @endif
                        @if($permission->manageItem() == 1)
                                <li class="area {{ (request()->segment(1) == 'areaList') ? 'active': '' }}">
                                    <a href="{{ route('areaList') }}" class="border-0">
                                        <span class="menu-collapsed">{{ __('lang.areas') }}</span>
                                    </a>
                                </li>
                        @endif
                        @if($permission->manageItem() == 1)

                                <li class="territory {{ (request()->segment(1) == 'territories') ? 'active': '' }}">
                                    <a href="{{ route('territoryList') }}" class="border-0">
                                        <span class="menu-collapsed">{{ __('lang.territory') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if($permission->manageItem() == 1)

                                <li class="town {{ (request()->segment(1) == 'towns') ? 'active': '' }}">
                                    <a href="{{ route('townList') }}" class="border-0">
                                        <span class="menu-collapsed">{{ __('lang.town') }}</span>
                                    </a>
                                </li>
                        @endif
                    </ul>

                </li>

                {{--Location End--}}

                {{--Manage ITEM start--}}
                 @if($permission->manageItem() == 1)
                <li class="nav-item" id="item">
                    <div id="items">
                        <a href="#submenuItem" data-toggle="collapse" aria-expanded="false"
                           class="list-group-item border-0"><i class="la la-male"></i>
                            <span>{{ __('lang.manage_item') }}</span><span class="submenu-icon ml-auto"></span>
                        </a>
                    </div>

                    <ul id='submenuItem' class="collapse sidebar-submenu">
                        @if($permission->manageItem() == 1)
                            <li class="call_type {{ (request()->segment(2) == 'call-type') ? 'active': '' }}">
                                <a href="{{ url('/items/call-type') }}" class="border-0">
                                    <span class="menu-collapsed">{{ __('lang.call_type') }}</span>
                                </a>
                            </li>
                        @endif
                        @if($permission->manageItem() == 1)
                            <li class="complain-type {{ (request()->segment(2) == 'complain-type') ? 'active': '' }}">
                                <a href="{{ url('/items/complain-type') }}" class="border-0">
                                    <span class="menu-collapsed">{{ __('lang.complain_type') }}</span>
                                </a>
                            </li>
                        @endif
                        @if($permission->manageItem() == 1)

                            <li class="root-cause {{ (request()->segment(2) == 'root-cause') ? 'active': '' }}">
                                <a href="{{ url('/items/root-cause') }}" class="border-0">
                                    <span class="menu-collapsed">{{ __('lang.root_cause') }}</span>
                                </a>
                            </li>
                        @endif
                        @if($permission->manageItem() == 1)

                            <li class="market-channel {{ (request()->segment(2) == 'market-channel') ? 'active': '' }}">
                                <a href="{{ url('/items/market-channel') }}" class="border-0">
                                    <span class="menu-collapsed">{{ __('lang.market_channel') }}</span>
                                </a>
                            </li>
                        @endif
                        @if($permission->manageItem() == 1)
                            <li class="retailers {{ (request()->segment(1) == 'retailers') ? 'active': '' }}">
                                <a href="{{ url('retailers') }}" class="border-0">
                                    <span class="menu-collapsed">{{ __('lang.retailer') }}</span>
                                </a>
                            </li>
                        @endif
                        @if($permission->manageItem() == 1)
                            <li class="distributions {{ (request()->segment(1) == 'distributions') ? 'active': '' }}">
                                <a href="{{ url('distributions') }}" class="border-0">
                                    <span class="menu-collapsed">{{ __('lang.distribution') }}</span>
                                </a>
                            </li>
                        @endif


                    </ul>

                </li>
             @endif
                {{--Manage ITEM End--}}

            @endif



            @if($permission->manageKB() == 1 )

                <li class="nav-item" id="kb">

                    <a href="{{ route('Knowledge-Ba-Index') }}">

                        <i class="la la-leanpub"></i>

                        <p>{{ __('lang.knowledge_base') }}</p>

                    </a>

                </li>

            @endif

            @if($permission->manageStaff() == 1 )

                <li class="nav-item" id="staff">

                    <a href="{{ route('staffs.staffList') }}">

                        <i class="la la-user-secret"></i>

                        <p>{{ __('lang.staffs') }}</p>

                    </a>

                </li>

            @endif

            @if($permission->manageUser() == 1 )

                <li class="nav-item" id="users">

                    <a href="{{ route('users.userList') }}">

                        <i class="la la-user"></i>

                        <p>{{ __('lang.users') }}</p>

                    </a>

                </li>

            @endif

            @if($permission->manageRole() == 1 )

                <li class="nav-item" id="roles">

                    <a href="{{ route('roles.index') }}">

                        <i class="la la-shield"></i>

                        <p>{{ __('lang.manage_roles') }}</p>

                    </a>

                </li>

            @endif



            @if($permission->manageAppSetting() == 1 || $permission->manageEmailSetting() == 1 || $permission->manageEmailTemplate() == 1)

                <li class="nav-item" id="settings">

                    <div id="appSettings">

                        <a href="#submenuSetting" data-toggle="collapse" aria-expanded="false"
                           class="list-group-item border-0">

                            <i class="la la-gears"></i> <span>{{ __('lang.settings') }}</span>

                            <span class="submenu-icon ml-auto"></span>

                        </a>

                    </div>


                    <ul id='submenuSetting' class="collapse sidebar-submenu">

                        @if($permission->manageAppSetting() == 1)

                            <li><a href="{{ route('app-settings.settingIndex') }}">{{ __('lang.app_setting') }}</a></li>

                        @endif

                        @if($permission->manageEmailSetting() == 1)

                            <li><a href="{{ route('emailSetting') }}">{{ __('lang.email_setting') }}</a></li>

                        @endif

                        @if($permission->manageEmailTemplate() == 1)

                            <li><a href="{{ route('email-template.index') }}">{{ __('lang.email_template') }}</a></li>

                        @endif

                    </ul>

                </li>

            @endif



            @if($permission->manageUser() == 1 && $permission->manageLogoIcon() == 1 || $permission->manageSocialLink() == 1 || $permission->manageHowWork() == 1 || $permission->manageCounter() == 1 || $permission->manageBanerText() == 1 || $permission->manageTestimonial() == 1 || $permission->manageService() == 1 || $permission->manageAboutUs() == 1 || $permission->manageFooter() == 1)

                <li class="nav-item" id="frontend">

                    <div id="webSetting">

                        <a href="#submenuFrontend" data-toggle="collapse" aria-expanded="false"
                           class="list-group-item border-0">

                            <i class="fa fa-fw fa-list"></i> <span>{{ __('lang.frontend_settings') }}</span>

                            <span class="submenu-icon ml-auto"></span>

                        </a>

                    </div>


                    <ul id='submenuFrontend' class="collapse sidebar-submenu">

                        @if($permission->manageLogoIcon() == 1)

                            <li><a href="{{ route('logoIcon.Setting') }}">{{ __('lang.logo_icon') }}</a></li>

                        @endif

                        @if($permission->manageSocialLink() == 1)

                            <li><a href="{{ route('social.Setting') }}">{{ __('lang.social_link') }}</a></li>

                        @endif

                        @if($permission->manageBanerText() == 1)

                            <li><a href="{{ route('headerTextSetting') }}">{{ __('lang.banner_text') }}</a></li>

                        @endif

                        @if($permission->manageHowWork() == 1)

                            <li><a href="{{ route('how-we-work.index') }}">{{ __('lang.how_we_work') }}</a></li>

                        @endif

                        @if($permission->manageService() == 1)

                            <li><a href="{{ route('service.index') }}">{{ __('lang.service_setting') }}</a></li>

                        @endif

                        @if($permission->manageCounter() == 1)

                            <li><a href="{{ route('counter.Setting') }}">{{ __('lang.counter_setting') }}</a></li>

                        @endif

                        @if($permission->manageTestimonial() == 1)

                            <li><a href="{{ route('testimonial.index') }}">{{ __('lang.testimonial') }}</a></li>

                        @endif

                        @if($permission->manageAboutUs() == 1)

                            <li><a href="{{ route('aboutus.Setting') }}">{{ __('lang.about_us') }}</a></li>

                        @endif

                        @if($permission->manageFooter() == 1)

                            <li><a href="{{ route('footer.Setting') }}">{{ __('lang.footer') }}</a></li>

                        @endif

                    </ul>

                </li>

            @endif

            @if(Auth::user()->is_admin)

                <li class="nav-item" id="inbox">

                    <a href="{{ route('contactMessage') }}">

                        <i class="la la-envelope"></i>

                        <p>{{ __('lang.inbox') }}</p>

                    </a>

                </li>

            @endif

        </ul>

    </div>

</div>