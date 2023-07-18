
      <nav class="sidebar sidebar-offcanvas" id="sidebar"   >

        <ul class="nav" style="position:fixed; overflow:auto; height: 100%">

          <li class="nav-item"  >

            <a class="nav-link" href="{{route('admin.dashboard')}}">

              <i class="icon-grid menu-icon"></i>

              <span class="menu-title">Dashboard</span>

            </a>

          </li>


      @if(@checkRoute('View_Admins'))

          <li class="nav-item" >

            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">

              <i class="icon-head menu-icon"></i>

              <span class="menu-title">User Management</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="auth">

              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{route('admin.manageadmin')}}">  Manage Users </a></li>

                <li class="nav-item"> <a class="nav-link" href="{{route('admin.roles')}}"> Manage Roles </a></li>

              </ul>

            </div>

          </li>

         @endif

         @if(\Auth::guard('admin')->user()->id==1 || @checkRoute('View_OrganisationDetails') || @checkRoute('website_index') || @checkRoute('FileToURL'))
          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">

              <i class="icon-contract menu-icon"></i>

              <span class="menu-title">Manage Masters</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="master">

              <ul class="nav flex-column sub-menu">

              @if(@checkRoute('View_OrganisationDetails'))
                 <li class="nav-item"><a class="nav-link" href="{{route('admin.organisation')}}">Organisation Details</a></li>
              @endif
              @if(@checkRoute('website_index'))
                 <li class="nav-item"><a class="nav-link"   href="{{url('/Accounts/website-index')}}">Organisation Counter </a></li>
              @endif

              @if(@checkRoute('View_OrganisationDetails'))
                 <li class="nav-item"> <a class="nav-link" href="{{route('admin.filetourl')}}">Client Logo</a></li>
              @endif

              @if(@checkRoute('View_OrganisationStructure'))
              <li class="nav-item"><a class="nav-link" href="{{route('admin.people')}}">Organisation Members</a></li>
              @endif

              @if(@checkRoute('View_Banners'))
              <li class="nav-item"><a class="nav-link" href="{{route('admin.banners')}}">Organisation Banner</a></li>
              @endif

              @if(@checkRoute('Industry'))
              <li class="nav-item"><a class="nav-link" href="{{route('admin.industry')}}">Manage Industry Connect</a></li>
              @endif


            @if(@checkRoute('View_Banners'))
            <li class="nav-item"><a class="nav-link" href="{{url('Accounts/News-Event')}}">Manage News & Events</a></li>
            @endif


            @if(@checkRoute('View_Banners'))
            <li class="nav-item"><a class="nav-link" href="{{url('Accounts/press-media')}}">Manage Press & Media</a></li>
            @endif

            @if(@checkRoute('ANTI-RAGGING'))
            <li class="nav-item"><a class="nav-link" href="{{url('Accounts/ANTI-RAGGING')}}">Manage Anti-Ragging  </a></li>
            @endif


            @if(@checkRoute('tenders'))
            <li class="nav-item"><a class="nav-link" href="{{route('admin.viewtenders')}}">Manage Tenders</a></li>
            @endif

            @if(@checkRoute('careershow'))
            <li class="nav-item"><a class="nav-link" href="{{route('admin.careershow')}}">Manage Career</a></li>
            @endif

            @if(@checkRoute('RTI'))
            <li class="nav-item"><a class="nav-link" href="{{url('Accounts/RTI')}}">Manage RTI</a></li>
            @endif

              </ul>

            </div>

          </li>

      @endif


  @if(\Auth::guard('admin')->user()->id==1)

          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">

              <i class="icon-layout menu-icon"></i>

              <span class="menu-title">Layout Management</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="ui-basic">

              <ul class="nav flex-column sub-menu">



                <li class="nav-item"> <a class="nav-link" href="{{route('admin.sitesetting')}}">Site Setting</a></li>


                <li class="nav-item"> <a class="nav-link" href="{{route('admin.topbar')}}">Manage Headers</a></li>


                <li class="nav-item"> <a class="nav-link" href="{{route('admin.footer')}}">Manage Footer</a></li>


                <li class="nav-item"> <a class="nav-link" href="{{route('admin.homeslider')}}">Manage Section1 {Home} </a></li>



                <li class="nav-item"> <a class="nav-link" href="{{route('admin.homeabout')}}">Manage Section2 {Home} </a></li>



                <li class="nav-item"> <a class="nav-link" href="{{route('admin.usps')}}">Manage Section3 {Home} </a></li>



                 <li class="nav-item"> <a class="nav-link" href="{{route('admin.upcoming')}}">Manage Section4 {Home} </a></li>



                 <li class="nav-item"> <a class="nav-link" href="{{route('admin.homegallery')}}">Manage Section5 {Home} </a></li>



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


          @if(@checkRoute('View_Menus') || @checkRoute('View_OrganisationStructure') || @checkRoute('View_Banners') || @checkRoute('View_Announcements') || @checkRoute('View_USPs') || @checkRoute('CForm'))
          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#sections" aria-expanded="false" aria-controls="sections">

               <i class="icon-bar-graph menu-icon"></i>

              <span class="menu-title">Manage Sections</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="sections">

              <ul class="nav flex-column sub-menu">
              @if(@checkRoute('View_Menus'))
                 <li class="nav-item"> <a class="nav-link" href="{{route('admin.menusetting')}}">Manage Menus </a></li>
                 @endif


                 @if(@checkRoute('manage-club'))
                 <li class="nav-item"><a class="nav-link" href="{{url('Accounts/manage-clubs')}}">Manage Club</a></li>
                 @endif

                 @if(@checkRoute('manage-committee'))
                 <li class="nav-item"><a class="nav-link" href="{{url('Accounts/manage-committee')}}">Manage Committee </a></li>
                 @endif


                 @if(@checkRoute('manage-cells'))
                 <li class="nav-item"><a class="nav-link" href="{{url('Accounts/manage-cells')}}">Manage Cell</a></li>
                 @endif


                 @if(@checkRoute('Org-journey-index'))
                 <li class="nav-item"><a class="nav-link"   href="{{url('/Accounts/Org-journey-index')}}">Manage Our Journey</a></li>
                 @endif


                 @if(@checkRoute('tenders'))
                 <li class="nav-item"><a class="nav-link" href="{{route('admin.vendordebarred')}}">Manage Vendors Debarred</a></li>
                 @endif

                  @if(@checkRoute('Events & Activites'))
                <li class="nav-item"><a class="nav-link" href="{{route('admin.title')}}">Manage Events & Activites</a></li>
                @endif

                 @if(@checkRoute('student-council'))
                 <li class="nav-item"><a class="nav-link" href="{{url('Accounts/student-council')}}">Manage Student Council</a></li>
                 @endif

                 @if(@checkRoute('journal-publications'))
                 <li class="nav-item"><a class="nav-link" href="{{url('Accounts/journal-publications')}}">Manage Journal Publications </a></li>
                 @endif


                @if(@checkRoute('Wellness-Facilities'))
                <li class="nav-item"><a class="nav-link" href="{{url('Accounts/Wellness-Facilities')}}">Manage Wellness Facilities </a></li>
                @endif




              {{-- @if(@checkRoute('View_Banners'))
                <li class="nav-item"><a class="nav-link" href="{{route('admin.banners')}}">Banner/Sliders</a></li>
                @endif --}}

                {{-- @if(@checkRoute('View_Announcements'))
                <li class="nav-item"><a class="nav-link" href="{{route('admin.announcements')}}">Manage Announcements</a></li>
                @endif --}}
                {{-- @if(@checkRoute('View_USPs'))
               <li class="nav-item"><a class="nav-link" href="{{route('admin.usp')}}">Manage USPs</a></li>
               @endif --}}
               {{-- @if(@checkRoute('CForm'))
               <li class="nav-item"><a class="nav-link" href="{{url('/Accounts/dynamic-form')}}">Dynamic Forms</a></li>
               @endif --}}


              </ul>

            </div>

          </li>

          @endif




          @if(@checkRoute('add_content_page') || @checkRoute('content_pages_list') || @checkRoute('deletedata'))
          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#cmspages" aria-expanded="false" aria-controls="tables">

              <i class="icon-grid-2 menu-icon"></i>

              <span class="menu-title">Manage Content Pages</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="cmspages">

              {{-- <ul class="nav flex-column sub-menu">
              @if(@checkRoute('add_content_page'))
                <li class="nav-item"> <a class="nav-link" href="{{ url("/Accounts/add-page") }}">Add new page</a></li>
              @endif
              </ul> --}}
              <ul class="nav flex-column sub-menu">
              @if(@checkRoute('content_pages_list'))
              <li class="nav-item"> <a class="nav-link" href="{{ url("/Accounts/pages-list")}}">Pages List</a></li>
              @endif


              </ul>

              {{-- <ul class="nav flex-column sub-menu">
              @if(@checkRoute('deletedata'))
                 <li class="nav-item"> <a class="nav-link" href="{{url('/Accounts/deletedata')}}">Archive List</a></li>
              @endif
              </ul> --}}



            </div>

          </li>
          @endif

          @if(@checkRoute('add_gallery_data_page') || @checkRoute('show_gallery_data_list'))
          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#cmspagess" aria-expanded="false" aria-controls="tables">

              <i class="icon-grid-2 menu-icon"></i>

              <span class="menu-title">Manage Image Gallery</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="cmspagess">

              {{-- <ul class="nav flex-column sub-menu">
              @if(@checkRoute('add_gallery_data_page'))
                <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/add_gallery') }}">Add Gallery</a></li>
              @endif
              </ul> --}}
              <ul class="nav flex-column sub-menu">
              @if(@checkRoute('show_gallery_data_list'))
              <li class="nav-item"> <a class="nav-link" href="{{url('/Accounts/show_gallery')}}"> Show Gallary </a></li>
              @endif
              </ul>



            </div>

          </li>

          @endif


          @if(@checkRoute('add_videoget') || @checkRoute('show_videogallery'))

          <li class="nav-item">

          <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">

           <i class="icon-grid-2 menu-icon"></i>

            <span class="menu-title">Manage Video Gallery</span>

           <i class="menu-arrow"></i>

          </a>

         <div class="collapse" id="tables">

           {{-- <ul class="nav flex-column sub-menu">
           @if(@checkRoute('add_videoget'))
          <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/add_videoget') }}">Add video Gallery</a></li>
          @endif
          </ul> --}}

          <ul class="nav flex-column sub-menu">
          @if(@checkRoute('show_videogallery'))
          <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/show_videogallery') }}">Show Video Gallery</a></li>
          @endif
         </ul>

       </div>

        </li>

        @endif

        @if(@checkRoute('add_link') || @checkRoute('show_link') || @checkRoute('View_QuickLinks'))

               <li class="nav-item">

               <a class="nav-link" data-toggle="collapse" href="#cmspagesss" aria-expanded="false" aria-controls="tables">

               <i class="icon-grid-2 menu-icon"></i>


               <span class="menu-title">Manage Link Sections</span>

               <i class="menu-arrow"></i>

                 </a>

                <div class="collapse" id="cmspagesss">

                <ul class="nav flex-column sub-menu">
                @if(@checkRoute('add_link'))
               <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/add_link') }}">Add Link Sections</a></li>
               @endif
                 </ul>
               <ul class="nav flex-column sub-menu">
               @if(@checkRoute('show_link'))
                <li class="nav-item"> <a class="nav-link" href="{{ url('/Accounts/show_link') }}"> List Link Sections</a></li>
                @endif
                 </ul>

                 <ul class="nav flex-column sub-menu">
                 @if(@checkRoute('View_QuickLinks'))
                 <li class="nav-item"><a class="nav-link" href="{{route('admin.quicklink')}}">Manage Quick Links</a></li>
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
  @if(@checkRoute('add_blog_content_page'))
  <li class="nav-item"> <a class="nav-link" href="/Accounts/add_blog">Add Blog</a></li>
  @endif
  </ul>
  <ul class="nav flex-column sub-menu">
  @if(@checkRoute('show_blog_page_list'))
  <li class="nav-item"> <a class="nav-link" href="/Accounts/show_blog"> Show Blog </a></li>
  @endif
  </ul>



  </div>

  </li>
 --}}



 @if(@checkRoute('datefillerdata'))
  <li class="nav-item">

  <a class="nav-link" data-toggle="collapse" href="#cmspagesssss" aria-expanded="false" aria-controls="tables">

  <i class="icon-grid-2 menu-icon"></i>

  <span class="menu-title"> Audit log section </span>

  <i class="menu-arrow"></i>

  </a>

  <div class="collapse" id="cmspagesssss">

  <ul class="nav flex-column sub-menu">
  @if(@checkRoute('datefillerdata'))
  <li class="nav-item"> <a class="nav-link" href="{{url('/Accounts/Audit-data-show')}}">Show Audit log</a></li>
  @endif
  </ul>



  </div>

  </li>

  @endif

<li class="nav-item"><a class="nav-link" href="{{ url('/Accounts/view-students-profile') }}"><i class="icon-grid-2 menu-icon"></i>Add Student Profile</i></li></a></li>


        </ul>

      </nav>

      <!-- partial -->
