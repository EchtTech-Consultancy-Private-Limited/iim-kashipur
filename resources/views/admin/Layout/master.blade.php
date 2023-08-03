<!DOCTYPE html>

<html lang="en">



<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title> @yield('title') | {{GetOrganisationDetails('name')}}</title>

  <!-- plugins:css -->

  <link rel="stylesheet" href="{{url('admin/vendors/feather/feather.css')}}">

  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">

  <link rel="stylesheet" href="{{url('admin/vendors/css/vendor.bundle.base.css')}}">

  <!-- endinject -->

  <!-- Plugin css for this page -->

  {{-- <link rel="stylesheet" href="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}"> --}}

  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">

  {{-- <link rel="stylesheet" type="text/css" href="{{url('admin/js/select.dataTables.min.css')}}"> --}}

  <!-- End plugin css for this page -->

  <!-- inject:css -->

  <link rel="stylesheet" href="{{url('admin/css/vertical-layout-light/style.css')}}">

 <link rel="stylesheet" href="{{url('admin/css/custom.css')}}">

  <!-- endinject -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <link rel="shortcut icon" href="{{asset('uploads/site-logo/'.GetOrganisationDetails('fevicon'))}}" />


   <script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>


  <meta name="csrf_token" content="{{ csrf_token() }}" />




   <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
       <!-- <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}"> -->
	     	{{-- <link rel="stylesheet" href="{{asset('assets/css/form-elements.css')}}"> --}}
       <!-- <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
       {{-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('assets/ico/apple-touch-icon-57-precomposed.png')}}"> --}}

</head>

<body>

  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <a class="navbar-brand brand-logo mr-2" href="{{route('admin.dashboard')}}"><img src="{{asset('uploads/site-logo/'.GetOrganisationDetails('logo'))}}"  style="height:100px;" style="width:200px;" class="ml-2" alt="logo"/></a>

        <a class="navbar-brand brand-logo-mini" href="{{route('admin.dashboard')}}"><img src="{{asset('uploads/site-logo/'.GetOrganisationDetails('logo'))}}" style="height:100px;" style="width:200px;" alt="logo"/></a>

      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

          <span class="icon-menu"></span>

        </button>

        <!--<ul class="navbar-nav mr-lg-2">

          <li class="nav-item nav-search d-none d-lg-block">

            <div class="input-group">

              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">

                <span class="input-group-text" id="search">

                  <i class="icon-search"></i>

                </span>

              </div>

              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">

            </div>

          </li>

        </ul>-->

        <ul class="navbar-nav navbar-nav-right">



          <li class="nav-item nav-profile dropdown">
            <span style="margin-right:10px;"><b>{{\Auth::guard('admin')->user()->name}}</b></span>
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

              <img src="{{url('admin/images/default-profile-icon.jpg')}}" alt="profile"/>

            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

              {{-- <a class="dropdown-item" href="{{route('admin.password-change')}}">

                <i class="ti-settings text-primary"></i>

                Change Password

              </a> --}}

              <a class="dropdown-item" href="{{route('admin.logout')}}">

                <i class="ti-power-off text-primary"></i>

                Logout

              </a>

            </div>

          </li>



        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

          <span class="icon-menu"></span>

        </button>

      </div>

    </nav>

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_settings-panel.html -->





       @include('admin.Layout.sidebar')



       @yield('content')





       <!-- partial:partials/_footer.html -->

        <footer class="footer">

          <div class="d-sm-flex justify-content-center justify-content-sm-between">

            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©  {{ now()->format('Y') }}.  {{GetOrganisationDetails('name')}}. All rights reserved.</span>



          </div>



        </footer>

        <!-- partial -->

      </div>

      <!-- main-panel ends -->

    </div>

    <!-- page-body-wrapper ends -->

  </div>

  <!-- container-scroller -->



  <!-- plugins:js -->



  <script src="{{url('admin/vendors/js/vendor.bundle.base.js')}}"></script>

  <!-- endinject -->

  <!-- Plugin js for this page -->

  <script src="{{url('admin/vendors/chart.js/Chart.min.js')}}"></script>

   {{-- <script src="{{url('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>

  <script src="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>

  <script src="{{url('admin/js/dataTables.select.min.js')}}"></script> --}}



  <!-- End plugin js for this page -->

  <!-- inject:js -->

  <script src="{{url('admin/js/off-canvas.js')}}"></script>

  <script src="{{url('admin/js/hoverable-collapse.js')}}"></script>

  <script src="{{url('admin/js/template.js')}}"></script>

  <script src="{{url('admin/js/settings.js')}}"></script>

  <script src="{{url('admin/js/todolist.js')}}"></script>





  <!-- endinject -->

  <!-- Custom js for this page-->

  <script src="{{url('admin/js/dashboard.js')}}"></script>

  <script src="{{url('admin/js/Chart.roundedBarCharts.js')}}"></script>




  <!-- End custom js for this page-->

        <!-- Javascript -->
      <!--  <script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script> -->
      <!--  <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>-->
           {{-- <script src="{{asset('assets/js/jquery.backstretch.min.js')}}"></script> --}}
           <script src="{{asset('assets/js/scripts.js')}}"></script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>


  <script src="{{url('admin/js/validtion.js')}}"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

  <script type="text/javascript">
    $(window).on('load', function () {
        $('img').attr('loading', 'lazy');
        $('input[type="text"]').attr('autocomplete', 'off');
        $('input[type="email"]').attr('autocomplete', 'off');
        $('input[type="password"]').attr('autocomplete', 'off');
    });
  </script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        let lazyloadImages = document.querySelectorAll("img.lazy-load");
        let lazyloadThrottleTimeout;

        function lazyload() {
          if(lazyloadThrottleTimeout) {
            clearTimeout(lazyloadThrottleTimeout);
          }
          lazyloadThrottleTimeout = setTimeout(function() {
            let scrollTop = window.pageYOffset;
            lazyloadImages.forEach(function(img) {
              if(img.offsetTop < (window.innerHeight + scrollTop)) {
                img.src = img.dataset.src;
                img.classList.remove('lazy');
              }
            });
            if(lazyloadImages.length == 0) {
              document.removeEventListener("scroll", lazyload);
              window.removeEventListener("resize", lazyload);
              window.removeEventListener("orientationChange", lazyload);
            }
          }, 20);
        }
        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
      });
    </script>

<style>
button.btn {
   width:auto;
}
</style>


<script>
    function load(){
      $('.btn').prop('disabled', true);
     setTimeout(function() {
           $('.btn').prop('disabled', false);
     }, 10000);
        $("#regForm").submit();
    }
</script>


</body>



</html>





