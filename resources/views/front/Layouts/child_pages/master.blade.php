<!DOCTYPE html >

<html lang="en">

<head>

     <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(isset($item[0]))
        <title>@if(GetLang()=='en'){{GetOrganisationAllDetails('name')}} @else {{GetOrganisationAllDetails('name_h')}} @endif - {{$item[0]->meta_title}}</title>
    @else
        <title>@if(GetLang()=='en'){{GetOrganisationAllDetails('name')}} @else {{GetOrganisationAllDetails('name_h')}} @endif</title>
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/swiper-bundle.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/aos.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('fevicon'))}}">

    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">

  <!-- custom css file link  -->

  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

   {{-- banner page css  --}}

  <link rel="stylesheet" href="{{asset('assets/bannercss/style.css')}}" type="text/css">




    <link rel="shortcut icon" href="@if(GetOrganisationAllDetails('fevicon')){{asset('uploads/site-logo/'.GetOrganisationAllDetails('fevicon'))}} @else {{asset('assets/images/'.GetOrganisationAllDetails('fevicon'))}} @endif" type="image/vnd.microsoft.icon" />

@if(isset($item[0]))

    <meta name="title" content="{{$item[0]->meta_title}}">

    <meta name="keywords" content="{{$item[0]->meta_keywords}}">

    <meta name="description" content="{{$item[0]->meta_description}}">

@else

    <meta name="title" content="{{GetOrganisationAllDetails('meta_title')}}">

    <meta name="keywords" content="{{GetOrganisationAllDetails('meta_keywords')}}">

    <meta name="description" content="{{GetOrganisationAllDetails('meta_description')}}">

@endif





    <style>

    .site-header .logo-right a:nth-child(2) img, .site-header .logo-right img {

    border-left: 0px solid;

    border-right: 0px solid;

    margin: 0 10px;

    padding: 0 10px;

    max-width: 135px;

    max-height:50px;

    }

    .about-body h1,.about-body h2,.about-body h3 {

    font-size: 4.5em;

    font-weight: bold;

    letter-spacing: 0px;

    color: #FFFFFF;

    margin-bottom: 30px;

    }

    .about-body p {

    font-size: 1em;

    letter-spacing: 0px;

    color: #FFFFFF;

    }

    </style>



    <?php

    echo html_entity_decode(GetOrganisationAllDetails('head_google_tags'));

    ?>


<script>
    var baseurl=  '{{ url('/') }}';
</script>


</head>



<body>





       @if(FindSiteSettings('Home','header'))

       @include('front.Layouts.headers.'.FindSiteSettings('Home','header'))

       @endif





          @yield('content')



        @if(FindSiteSettings('Home','footer'))
        @include('front.Layouts.footers.'.FindSiteSettings('Home','footer'))
        @endif

        <script src="{{asset('front/js/custom.js')}}"></script>

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/aos.js')}}"></script>

    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script src="{{asset('front/js/custom.js')}}"></script>

    <script>



        AOS.init({

            disable: 'mobile'

        });

    </script>



    <?php

    echo html_entity_decode(GetOrganisationAllDetails('body_google_tags'));

    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
</body>
</html>
