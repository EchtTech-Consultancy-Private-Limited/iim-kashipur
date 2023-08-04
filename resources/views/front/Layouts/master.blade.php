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

    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">



    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/swiper-bundle.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/aos.css')}}" rel="stylesheet">


   

    <link rel="shortcut icon" type="image/png" href="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('fevicon'))}}">
  <!-- custom css file link  -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  {{-- banner page css  --}}

  

  <link rel="stylesheet" href="{{asset('assets/bannercss/style.css')}}" type="text/css">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/magnific-popup.min.css')}}" rel="stylesheet">


    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/cdnjs.cloudflare.com_ajax_libs_slick-carousel_1.6.0_slick.min.js')}}"></script>
    <link rel="shortcut icon" href="@if(GetOrganisationAllDetails('fevicon')){{asset('uploads/site-logo/'.GetOrganisationAllDetails('fevicon'))}} @else {{asset('assets/images/'.GetOrganisationAllDetails('fevicon'))}} @endif" type="image/vnd.microsoft.icon" />
  
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}"  id="pageStyle">

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



    @php
          html_entity_decode(GetOrganisationAllDetails('head_google_tags'));
    @endphp






<script>
    var baseurl=  '{{ url('/') }}';
</script>


</head>







<body class="defult-home">







           @if(FindSiteSettings('Home','header'))

           @include('front.Layouts.headers.'.FindSiteSettings('Home','header'))

           @endif



           @yield('content')









        <!-- Main content End -->





            @if(FindSiteSettings('Home','footer'))

            @include('front.Layouts.footers.'.FindSiteSettings('Home','footer'))

            @endif

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/aos.js')}}"></script>

    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script src="{{asset('front/js/custom.js')}}"></script>



<!-- custom js file link  -->

<script src="{{ asset('assets/js/scripts.js') }}"></script>



    <script>



        AOS.init({

            disable: 'mobile'

        });

    </script>



    <?php

    echo html_entity_decode(GetOrganisationAllDetails('body_google_tags'));

    ?>

 <script src="{{asset('assets/js/cdnjs.cloudflare.com_ajax_libs_magnific-popup.js_1.1.0_jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript">
    $(window).on('load', function () {
        $('img').attr('loading', 'lazy');
        $('input[type="text"]').attr('autocomplete', 'off');
        $('input[type="email"]').attr('autocomplete', 'off');
        $('input[type="password"]').attr('autocomplete', 'off');
        $(".innerpagecontent").addClass('master-class')
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


    // change darkemode

    function swapStyleSheet(path){
  document.getElementById('pageStyle').setAttribute('href', path);

  window.localStorage.setItem("pageStyle", path);


}

window.onload = function() {
  swapStyleSheet(window.localStorage.getItem("pageStyle"));
}


</script>

<script>
    $('.count').each(function () {

        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    </script>




<script>

$(window).scroll(function(){
  var sticky = $('.sticky-i'),
      scroll = $(window).scrollTop();

  if (scroll >= 500) sticky.addClass('d-block');
  else sticky.removeClass('d-block');
});

</script>

<script>

$(document).ready(function () {

$('.image-link').magnificPopup({

type: 'image',

mainClass: 'mfp-with-zoom',

gallery: {

enabled: true

},



zoom: {

enabled: true,



duration: 300, // duration of the effect, in milliseconds

easing: 'ease-in-out', // CSS transition easing function



opener: function (openerElement) {



return openerElement.is('img') ? openerElement : openerElement.find('img');

}

}



});



});



</script>



</body>



</html>









