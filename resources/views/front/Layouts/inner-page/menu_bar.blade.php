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









    <link rel="shortcut icon" href="@if(GetOrganisationAllDetails('fevicon')){{asset('uploads/site-logo/'.GetOrganisationAllDetails('fevicon'))}} @else {{asset('assets/images/'.GetOrganisationAllDetails('fevicon'))}} @endif" type="image/vnd.microsoft.icon" />

    <meta name="title" content="{{GetOrganisationAllDetails('meta_title')}}">

    <meta name="keywords" content="{{GetOrganisationAllDetails('meta_keywords')}}">

    <meta name="description" content="{{GetOrganisationAllDetails('meta_description')}}">

</head>



<body>





    <div class="header-top">

        <div class="container">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="header-top-content">

                                <div class="header-top-left">

                                    <div class="datewrap">

                                        <p>@lang('common.page_last_updated_on'): {{ now()->format('j F, Y') }}</p>

                                    </div>

                                </div>

                                <div class="header-top-right">

                                    <div class="skipwrap">

                                        <ul>

                                            <li><a href="{{url('/')}}">@lang('common.home')</a></li>

                                            <li><a href="#skipCont">@lang('common.skip_to_main_content')</a></li>

                                            <li><a href="javascript:void(0);">@lang('common.screen_reader_access')</a></li>

                                            <li>

                                                <div class="d-flex">

                                                    <button class="text-increment-btn">A</button>

                                                    <button class="text-increment-btn">A+</button>

                                                    <button class="text-increment-btn">A++</button>

                                                </div>

                                            </li>

                                            <li>

                                                <div class="d-flex">

                                                    <button class="theme-btn-light">L</button>

                                                    <button class="theme-btn-dark">D</button>

                                                </div>

                                            </li>

                                            <li>

                                                <a>

                                                    <div class="select-wrap">

                                                        <select class="form-select" onchange="javascript:setlang(value);">

                                                            <option value="en" @if(GetLang()=='en')selected @endif>English</option>

                                                            <option value="hi" @if(GetLang()=='hi')selected @endif>हिन्दी</option>

                                                        </select>

                                                    </div>

                                                </a>

                                            </li>

                                        </ul>

                                    </div>

                                    <div class="social-icon">

                                        <ul>

                                            @if(GetOrganisationAllDetails('facebook')!='')

                                            <li>

                                                <a href="{{GetOrganisationAllDetails('facebook')}}">

                                                    <i class="fa fa-facebook" aria-hidden="true"></i>

                                                </a>

                                            </li>

                                        @endif

                                        @if(GetOrganisationAllDetails('twitter')!='')

                                            <li>
GetSubMenusFront
                                                <a href="{{GetOrganisationAllDetails('twitter')}}">

                                                    <i class="fa fa-twitter" aria-hidden="true"></i>

                                                </a>GetSubMenusFront

                                            </li>

                                        @endif



                                        @if(GetOrganisationAllDetails('instagram')!='')

                                        <li>

                                            <a href="{{GetOrganisationAllDetails('instagram')}}">

                                                <i class="fa fa-instagram" aria-hidden="true"></i>

                                            </a>

                                        </li>

                                       @endif



                                       @if(GetOrganisationAllDetails('linkedin')!='')

                                       <li>

                                           <a href="{{GetOrganisationAllDetails('linkedin')}}">

                                               <i class="fa fa-linkedin" aria-hidden="true"></i>

                                           </a>

                                       </li>

                                      @endif



                                        </ul>

                                    </div>

                                </div>

                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"

                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"

                                    aria-expanded="false" aria-label="Toggle navigation">

                                    <span class="navbar-toggler-icon"></span>

                                    <span class="navbar-toggler-icon"></span>

                                    <span class="navbar-toggler-icon"></span>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



        <!--------------------------------------- website logo ----------------------------------->



            <div class="site-header">

                <div class="logo-wrap">

                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-md-6">

                                <div class="logo-left">

                                    <a href="javascript:void(0);">

                                        <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('logo'))}}" alt="logo" class="img-fluid">

                                    </a>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="logo-right">

                                    <a href="javascript:void(0);">

                                        <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('logo2'))}}" alt="fied" class="img-fluid">

                                    </a>

                                    <a href="javascript:void(0);">

                                        <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('logo3'))}}" alt="dic" class="img-fluid dic">

                                    </a>

                                    <a href="javascript:void(0);">

                                        <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('logo4'))}}" alt="aasab" class="img-fluid">

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!--------------------------------------- menu bar    ----------------------------------->





                <nav class="navbar navbar-expand-lg navbar-dark">

                    <div class="container">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">

                      <i class="fas fa-bars"></i>

                    </button>

                    <div class="collapse navbar-collapse" id="collapsibleNavbar">

                      <ul class="navbar-nav ml-auto">

                                @foreach(content_menus() as $key=>$M)

                                    @if(count(GetSubMenus($M->id))>0)

                                        <li class="nav-item dropdown">

                                                <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown">@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a>

                                                <ul class="dropdown-menu">



                                            @foreach(GetSubMenus($M->id) as $key1=>$S)

                                                @if(count(GetchildMenusFront($M->id,$S->id))>0)

                                                    <li class="dropdown-item dropdown">

                                                    <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown">@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a>

                                                    <ul class="dropdown-menu">



                                                        @foreach(GetchildMenusFront($M->id,$S->id) as $key2=>$C)

                                                            @if($S->external=='yes')

                                                            <li class="dropdown-item"><a href="{{url($C->url)}}" target="_blank">@if(GetLang()=='en'){{$C->name}} @else {{$C->name_h}} @endif</a></li>

                                                            @else

                                                            <li class="dropdown-item"><a href="{{url($C->url."/".$M->slug."/".$S->slug."/".$C->slug)}}">@if(GetLang()=='en'){{$C->name}} @else {{$C->name_h}} @endif</a></li>

                                                            @endif

                                                        @endforeach

                                                    </ul>

                                                    </li>

                                                @else

                                                    @if($S->external=='yes')

                                                    <li class="dropdown-item"><a href="{{url($S->url)}}" target="_blank">@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a></li>

                                                    @else

                                                    <li class="dropdown-item"><a href="{{url($S->url."/".$M->slug."/".$S->slug)}}">@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a></li>

                                                    @endif

                                                    @endif

                                                 @endforeach



                                                </ul>



                                           </li>

                                     @else

                                        @if($M->external=='yes')

                                         <li class="nav-item"><a href="{{url($M->url)}}" target="_blank">@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a></li>

                                        @else

                                          <li class="nav-item"><a href="{{url($M->url."/".$M->slug)}}">@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a></li>

                                         @endif

                                        @endif

                        @endforeach

                      </ul>

                    </div>

                   </div>

                  </nav>

          </div>





            <!--------------------------------- banner   --------------------------------------->



            <section class="hero-banner">





            </section>





   @foreach ($item as $items)

    <div class="internalpagebanner">
            @if($item[0]->banner_image!='')
            <img src="{{ asset('page/banner/'.$item[0]->banner_image) ?? '' }}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $item[0]->banner_alt ?? '' }}" title="{{ $item[0]->banner_title ?? '' }}">
            @else
            <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('default_banner_image'))}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $item[0]->name ?? '' }}" title="{{ $item[0]->name ?? '' }}">
            @endif
        <div class="imagecaption">

            <div class="container">

                <h1>{{ $items->name  }}</h1>

            </div>

        </div>

    </div>











    <div class="breadcrumbs">

        <div class="container">

            <ul>

                <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>



                <li><span>{{ $items->name }}</span></li>

            </ul>

        </div>

    </div>



    @endforeach

    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

               <div class="col-md-3">

                    <div class="sidebarwraper">



                    image



                    </div>

                </div>









                @if (collect($item)->isEmpty()) {{-- remember that $contact is your variable --}}

                <div class="alert alert-success" role="alert">

                    <h4 class="alert-heading">something went wrong </h4>

                    <p>Data Not Found</p>



                  </div>



                @else



                @foreach ($item as $items)

                <div class="col-md-9">

                    <div class="innerpagecontent">



                        <h3><span>{{ $items->name }}</span></h3>

                        <div class="commontxt">

                            <div class="row">



                                <div class="col-md-13 col-lg-12">

                                  <p>

                                   {!! $items->content !!}



                                  </p>



                                </div>

                            </div>

                        </div>

                    </div>

                </div>

               @endforeach



             @endif





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



    <script>

        AOS.init({

            disable: 'mobile'

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

