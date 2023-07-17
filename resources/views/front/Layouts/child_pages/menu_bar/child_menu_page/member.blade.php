<!doctype html>

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







</head>



<body>





    @include('front.Layouts.child_pages.header')





            @if (collect($item)->isEmpty()) {{-- remember that $contact is your variable --}}

            <div class="alert alert-success" role="alert">

                <h4 class="alert-heading">something went wrong </h4>

                <p>Data Not Found</p>



              </div>



            @else



   @foreach ($item as $items)

   <div class="internalpagebanner">
                @if($item[0]->banner_image!='')
                <img src="{{ asset('page/banner/'.$item[0]->banner_image) ?? '' }}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $item[0]->banner_alt ?? '' }}" title="{{ $item[0]->banner_title ?? '' }}">
                @else
                <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('default_banner_image'))}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $item[0]->name ?? '' }}" title="{{ $item[0]->name ?? '' }}">
                @endif
       <div class="imagecaption">

           <div class="container">

               <h1></h1>

           </div>

       </div>

   </div>





   <div class="wrapper" id="skipCont"></div>





   <div class="breadcrumbs">

       <div class="container">

           <ul>

               <li><a href="javascript:void(0);"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>



               <li><span></span></li>

           </ul>

       </div>

   </div>



   @endforeach

   <section class="withsidebar-wrap ptb-60">

       <div class="container">

           <div class="row">

            <div class="col-md-3">

                <div class="sidebarwraper">





                    <ul>



                        @if(count(GetchildMenusFront($type_sub[0]->menu_id,$type_child[0]->sub_id))>0)


                                    @foreach(GetchildMenusFront($type_sub[0]->menu_id,$type_child[0]->sub_id) as $key2=>$C)

                                   <li><a href="javascript:void(0);">{{ $C->name }}</a></li>

                                   @endforeach


                            @endif

                    </ul>

                </div>

            </div>



            @if (collect($item)->isEmpty()) {{-- remember that $contact is your variable --}}

            <div class="alert alert-success" role="alert">

                <h4 class="alert-heading">something went wrong </h4>

                <p>Data Not Found</p>

              </div>

            @else

               <div class="col-md-9">

                <div class="innerpagecontent">

                     <h4 class="hp-4">Board of Governors</h4>

                            @foreach ($item as $items)

                               <div class="row mt-4">

                                 <div class="col-md-3">

                                    <div class="addevent-box top text-center mt-0">

                                    <div class="profile-img">

                                        <img src="{{url('uploads/organisation/'.$items->image)}}" alt="{{ $items->title }}"  title="{{ $items->title }}">

                                    </div>

                                    <h5>{{ $items->title }}</h5>

                                    <p> {{ $items->designation }}</p>

                                    <p>{{ $items->department }}</p>

                                    <div class="profile-socail-icon information">

                                        <a href="javascript:void(0);" class="socail-icon"><i class="fab fa-facebook-f"></i></a>

                                        <a href="javascript:void(0);" class="socail-icon"><i class="fab fa-twitter"></i></a>

                                        <a href="javascript:void(0);" class="readmore">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>

                                    </div>

                                    </div>

                                </div>

                             @endforeach

                            <div class="col-md-7 col-lg-8">

                                <h5>Greetings!</h5>

                                <p>Celebrating ten years of serving the education and management sector, IIM Kashipur is committed to its four core values: collegiality, transparency, green consciousness, pro-active engagement with all stakeholders. The institute believes that as an institution of national importance, it has a larger role to play in the field of management education and social transformation. Our strategic goals include improvement of the academic ecosystem; synergy between educational theory, practice and research; promotion of innovation, entrepreneurship and public service; empowerment of local stakeholders; upliftment of economically challenged sections of the society; and gender diversity. </p>

                            </div>

                </div>

            </div>





           </div>

       </div>

   </section>





    @if(FindSiteSettings('Home','footer'))

    @include('front.Layouts.footers.'.FindSiteSettings('Home','footer'))

    @endif











    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/aos.js')}}"></script>

    <script src="{{asset('assets/js/custom.js')}}"></script>





<!-- custom js file link  -->

<script src="{{ asset('assets/js/scripts.js') }}"></script>





    <script>

        AOS.init({

            disable: 'mobile'

        });

    </script>



















<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>



<script>













    $(".theme-btn-dark").click(function(){



        $('a').css({color: '#FFFF00'});



    });







</script>


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

