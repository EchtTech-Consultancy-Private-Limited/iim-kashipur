<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav" style="position:fixed; overflow:auto; height: 100%">

        <li class="nav-item">

            <a class="nav-link" href="{{ route('admin.dashboard') }}">

                <i class="icon-grid menu-icon"></i>

                <span class="menu-title">Dashboard</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link" href="{{ route('admin.individual-pages') }}">

                <i class="icon-grid menu-icon"></i>

                <span class="menu-title">Individual Content Pages</span>

            </a>

        </li>

        @if (\Auth::guard('admin')->user()->id == 1 || @checkRoute('View_Admins') || @checkRoute('View_Roles'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">

                    <i class="icon-head menu-icon"></i>

                    <span class="menu-title">User Management</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="auth">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.manageadmin') }}"> Manage Users
                            </a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.roles') }}"> Manage Roles </a>
                        </li>

                    </ul>

                </div>

            </li>
        @endif

        @if (
            \Auth::guard('admin')->user()->id == 1 ||
                @checkRoute('View_OrganisationDetails') ||
                @checkRoute('View_Counter') ||
                @checkRoute('view_ClientLogo') ||
                @checkRoute('View_OrganisationStructure') ||
                @checkRoute('view_profile') ||
                @checkRoute('View_Banners') ||
                @checkRoute('View_industry') ||
                @checkRoute('View_NewsEvent'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">

                    <i class="icon-contract menu-icon"></i>

                    <span class="menu-title">Manage Masters</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="master">

                    <ul class="nav flex-column sub-menu">

                        @if (@checkRoute('View_OrganisationDetails'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ route('admin.organisation') }}">Organisation Details</a></li>
                        @endif

                        @if (@checkRoute('View_Counter'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('/Accounts/website-index') }}">Organisation Counter </a></li>
                        @endif

                        @if (@checkRoute('view_ClientLogo'))
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.filetourl') }}">Client
                                    Logo</a></li>
                        @endif

                        @if (@checkRoute('View_OrganisationStructure'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.people') }}">Organisation
                                    Members</a></li>
                        @endif


                        @if (@checkRoute('view_profile'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('/Accounts/Manage-students-profile') }}">
                                    Manage Student Profile</a></li>
                        @endif


                        @if (@checkRoute('View_Banners'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.banners') }}">Organisation
                                    Banner</a></li>
                        @endif

                        @if (@checkRoute('View_industry'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.industry') }}">Manage
                                    Industry Connect</a></li>
                        @endif

                        @if (@checkRoute('View_NewsEvent'))
                            <li class="nav-item"><a class="nav-link" href="{{ url('Accounts/News-Event') }}">Manage
                                    News & Events</a></li>
                        @endif

                    </ul>

                </div>

            </li>

        @endif





        @if (
            \Auth::guard('admin')->user()->id == 1 ||
                @checkRoute('View_journey') ||
                @checkRoute('View_EventsActivites') ||
                @checkRoute('View_studentCouncil') ||
                @checkRoute('View_WellnessFacilities') ||
                @checkRoute('View_dissertation') ||
                @checkRoute('View_report') ||
                @checkRoute('View_research_seminar') ||
                @checkRoute('view_pdfImage'))

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-basicss" aria-expanded="false"
                    aria-controls="ui-basic">

                    <i class="icon-layout menu-icon"></i>

                    <span class="menu-title">Manage Menu Forms</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-basicss">

                    <ul class="nav flex-column sub-menu">



                        @if (@checkRoute('View_journey'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('/Accounts/Org-journey-index') }}">Manage Our Journey</a></li>
                        @endif



                        @if (@checkRoute('View_EventsActivites'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('Accounts/Event-Activites') }}">Manage Events
                                    & Activities </a></li>
                        @endif

                        @if (@checkRoute('View_studentCouncil'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('Accounts/student-council') }}">Manage Student Council</a></li>
                        @endif

                        @if (@checkRoute('View_journalPublications'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('Accounts/journal-publications') }}">Manage Journal Publications </a>
                            </li>
                        @endif


                        @if (@checkRoute('View_WellnessFacilities'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('Accounts/Wellness-Facilities') }}">Manage Wellness Facilities </a>
                            </li>
                        @endif


                        @if (@checkRoute('View_dissertation'))
                            <li class="nav-item"><a class="nav-link" href="{{ url('Accounts/dissertation') }}">Manage
                                    Dissertation </a>
                            </li>
                        @endif

                        @if (@checkRoute('View_report'))
                            <li class="nav-item"><a class="nav-link" href="{{ url('Accounts/report') }}">Manage
                                    placement report</a>
                            </li>
                        @endif


                        @if (@checkRoute('View_research_seminar'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('Accounts/research-seminar') }}">Manage Research
                                    Seminar</a>
                            </li>
                        @endif

                        @if (@checkRoute('viewTedx'))
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('/Accounts/tdex') }}">Manage Tedx</a></li>
                        @endif

                        @if (@checkRoute('view_pdfImage'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Accounts/pdf-image') }}"> File/Image Upload </a>
                            </li>
                        @endif

                    </ul>

                </div>

            </li>

        @endif



        @if (
            \Auth::guard('admin')->user()->id == 1 ||
                @checkRoute('View_vendor') ||
                @checkRoute('View_antiRagging') ||
                @checkRoute('View_tender') ||
                @checkRoute('View_Career') ||
                @checkRoute('view_RTI') ||
                @checkRoute('View_PressMedia'))

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-basics" aria-expanded="false"
                    aria-controls="ui-basic">

                    <i class="icon-layout menu-icon"></i>

                    <span class="menu-title">Manage Footer Forms</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-basics">

                    <ul class="nav flex-column sub-menu">



                        @if (@checkRoute('View_vendor'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ route('admin.vendordebarred') }}">Manage Vendors Debarred</a></li>
                        @endif


                        @if (@checkRoute('View_antiRagging'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('Accounts/ANTI-RAGGING') }}">Manage
                                    Anti-Ragging </a></li>
                        @endif


                        @if (@checkRoute('View_tender'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.viewtenders') }}">Manage
                                    Tenders</a></li>
                        @endif

                        @if (@checkRoute('View_Career'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.careershow') }}">Manage
                                    Career</a></li>
                        @endif

                        @if (@checkRoute('view_RTI'))
                            <li class="nav-item"><a class="nav-link" href="{{ url('Accounts/RTI') }}">Manage RTI</a>
                            </li>
                        @endif

                        @if (@checkRoute('View_PressMedia'))
                            <li class="nav-item"><a class="nav-link" href="{{ url('Accounts/press-media') }}">Manage
                                    Press & Media</a></li>
                        @endif

                    </ul>

                </div>

            </li>

        @endif


        @if (\Auth::guard('admin')->user()->id == 1)
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">

                    <i class="icon-layout menu-icon"></i>

                    <span class="menu-title">Layout Management</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-basic">

                    <ul class="nav flex-column sub-menu">



                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.sitesetting') }}">Site
                                Setting</a></li>


                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.topbar') }}">Manage
                                Headers</a>
                        </li>


                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.footer') }}">Manage
                                Footer</a>
                        </li>


                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.homeslider') }}">Manage
                                Section1 {Home} </a></li>



                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.homeabout') }}">Manage
                                Section2 {Home} </a></li>



                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.usps') }}">Manage Section3
                                {Home} </a></li>



                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.upcoming') }}">Manage
                                Section4 {Home} </a></li>



                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.homegallery') }}">Manage
                                Section5 {Home} </a></li>



                    </ul>

                </div>

            </li>
        @endif

        <!--     <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#sitesetting" aria-expanded="false" aria-controls="sitesetting">

              <i class="icon-columns menu-icon"></i>

              <span class="menu-title">Site Settings</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="sitesetting">

              <ul class="nav flex-column sub-menu">





              </ul>

            </div>

          </li>-->


        @if (
            @checkRoute('View_Menus') ||
                @checkRoute('View_OrganisationStructure') ||
                @checkRoute('view_club') ||
                @checkRoute('view_Committee') ||
                @checkRoute('View_cells'))

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#sections" aria-expanded="false"
                    aria-controls="sections">

                    <i class="icon-bar-graph menu-icon"></i>

                    <span class="menu-title">Manage Sections</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="sections">

                    <ul class="nav flex-column sub-menu">
                        @if (@checkRoute('View_Menus'))
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.menusetting') }}">Manage
                                    Menus </a></li>
                        @endif


                        @if (@checkRoute('view_club'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('Accounts/manage-clubs') }}">Manage Club</a></li>
                        @endif

                        @if (@checkRoute('view_Committee'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('Accounts/manage-committee') }}">Manage Committee </a></li>
                        @endif


                        @if (@checkRoute('View_cells'))
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('Accounts/manage-cells') }}">Manage Cell</a></li>
                        @endif




                        {{-- @if (@checkRoute('View_Banners'))
                <li class="nav-item"><a class="nav-link" href="{{route('admin.banners')}}">Banner/Sliders</a></li>
                @endif --}}

                        {{-- @if (@checkRoute('View_Announcements'))
                <li class="nav-item"><a class="nav-link" href="{{route('admin.announcements')}}">Manage Announcements</a></li>
                @endif --}}
                        {{-- @if (@checkRoute('View_USPs'))
               <li class="nav-item"><a class="nav-link" href="{{route('admin.usp')}}">Manage USPs</a></li>
               @endif --}}
                        {{-- @if (@checkRoute('CForm'))
               <li class="nav-item"><a class="nav-link" href="{{url('/Accounts/dynamic-form')}}">Dynamic Forms</a></li>
               @endif --}}


                    </ul>

                </div>

            </li>

        @endif


        @if (@checkRoute('View_Content') || @checkRoute('Show_Content'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#cmspages" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-grid-2 menu-icon"></i>

                    <span class="menu-title">Manage Content Pages</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="cmspages">

                    <ul class="nav flex-column sub-menu">

                        @if (@checkRoute('View_Content'))
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/pages-list') }}">
                                    Show Content List</a></li>
                        @endif

                    </ul>
                </div>
            </li>
        @endif

        @if (@checkRoute('View_pgallery') || @checkRoute('Show_Pgallery'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#cmspagess" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-grid-2 menu-icon"></i>

                    <span class="menu-title">Manage Photo Gallery</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="cmspagess">

                    <ul class="nav flex-column sub-menu">

                        @if (@checkRoute('View_pgallery'))
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/show_gallery') }}">
                                    Show Photo Gallery </a></li>
                        @endif

                    </ul>
                </div>
            </li>
        @endif


        @if (@checkRoute('View_Vgallery') || @checkRoute('Show_Vgallery'))

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-grid-2 menu-icon"></i>

                    <span class="menu-title">Manage Video Gallery</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="tables">

                    <ul class="nav flex-column sub-menu">

                        @if (@checkRoute('View_Vgallery'))
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ url('/Accounts/show_videogallery') }}">Show Video Gallery</a></li>
                        @endif

                    </ul>
                </div>
            </li>
        @endif

        @if (@checkRoute('Show_Section') || @checkRoute('show_link') || @checkRoute('View_QuickLinks'))

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#cmspagesss" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-grid-2 menu-icon"></i>


                    <span class="menu-title">Manage Link Sections</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="cmspagesss">

                    <ul class="nav flex-column sub-menu">
                        @if (@checkRoute('Add_Section'))
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/add_link') }}">
                                    Add Link Section</a></li>
                        @endif
                    </ul>
                    <ul class="nav flex-column sub-menu">
                        @if (@checkRoute('Show_Section'))
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/show_link') }}">
                                    Manage Link Section</a></li>
                        @endif
                    </ul>

                    <ul class="nav flex-column sub-menu">
                        @if (@checkRoute('View_QuickLinks'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.quicklink') }}">Manage
                                    Quick Links</a></li>
                        @endif
                    </ul>

                </div>

            </li>

        @endif

        {{-- <li class="nav-item">

  <a class="nav-link" data-toggle="collapse" href="#cmspagessss" aria-expanded="false" aria-controls="tables">

  <i class="icon-grid-2 menu-icon"></i>

  <span class="menu-title">Manage Blog section </span>

  <i class="menu-arrow"></i>

  </a>

  <div class="collapse" id="cmspagessss">

  <ul class="nav flex-column sub-menu">
  @if (@checkRoute('add_blog_content_page'))
  <li class="nav-item"> <a class="nav-link" href="/Accounts/add_blog">Add Blog</a></li>
  @endif
  </ul>
  <ul class="nav flex-column sub-menu">
  @if (@checkRoute('show_blog_page_list'))
  <li class="nav-item"> <a class="nav-link" href="/Accounts/show_blog"> Show Blog </a></li>
  @endif
  </ul>



  </div>

  </li>
 --}}



        @if (@checkRoute('datefillerdata'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#cmspagesssss" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-grid-2 menu-icon"></i>

                    <span class="menu-title"> Audit log section </span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="cmspagesssss">

                    <ul class="nav flex-column sub-menu">
                        @if (@checkRoute('datefillerdata'))
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ url('/Accounts/Audit-data-show') }}">Show Audit log</a></li>
                        @endif
                    </ul>



                </div>

            </li>

        @endif

        @if (@checkRoute('View_enquirie'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#managments" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-head menu-icon"></i>

                    <span class="menu-title">Enquirie List</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="managments">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/enquirie-list') }}">
                                Enquirie
                            </a>
                        </li>

                    </ul>

                </div>

            </li>
        @endif


        @if (@checkRoute('View_Admins'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#managment" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Feedback List</span>
                    <i class="menu-arrow"></i>
                </a>

                <div class="collapse" id="managment">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/feedback') }}"> Feedback
                            </a>
                        </li>

                    </ul>

                </div>

            </li>
        @endif

        @if (@checkRoute('View_scstobc'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#managment6" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-head menu-icon"></i>

                    <span class="menu-title">SC ST OBC List</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="managment6">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/sc-st-obc-list') }}">
                               SC ST OBC List
                            </a>
                        </li>

                    </ul>

                </div>

            </li>
        @endif

        @if (@checkRoute('View_scstobc'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#managment0" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-head menu-icon"></i>

                    <span class="menu-title">MDP Programmes List</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="managment0">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item"> <a class="nav-link"
                                href="{{ url('/Accounts/guidelines-participants-list') }}">
                                MDP Programmes List
                            </a>
                        </li>

                    </ul>

                </div>

            </li>
        @endif


        @if (@checkRoute('viewPlacement'))
            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#managment19" aria-expanded="false"
                    aria-controls="tables">

                    <i class="icon-head menu-icon"></i>

                    <span class="menu-title">Placement list</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="managment19">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item"> <a class="nav-link"
                                href="{{ url('/Accounts/placement') }}">
                                placement list
                            </a>
                        </li>

                    </ul>

                </div>

            </li>
        @endif


    </ul>
</nav>

<!-- partial -->
