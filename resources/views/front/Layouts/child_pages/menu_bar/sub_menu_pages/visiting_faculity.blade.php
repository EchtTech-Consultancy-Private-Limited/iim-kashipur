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

    <meta name="title" content="{{$item[0]->meta_title ?? ''}}">

    <meta name="keywords" content="{{$item[0]->meta_keywords ?? ''}}">

    <meta name="description" content="{{$item[0]->meta_description ?? ''}}">

@else

    <meta name="title" content="{{GetOrganisationAllDetails('meta_title') ?? ''}}">

    <meta name="keywords" content="{{GetOrganisationAllDetails('meta_keywords') ?? ''}}">

    <meta name="description" content="{{GetOrganisationAllDetails('meta_description')}}">

@endif



<style>

.col-lg-8 {
    flex: 0 0 auto;
    width: 75%;
}

</style>







</head>



<body>





    @include('front.Layouts.child_pages.header')



    @php

    $mmenu=@content_menus($type[0]->menu_id);

    @endphp





            <div class="internalpagebanner">
                @if($item[0]->banner_image!='')
                <img src="{{ asset('page/banner/'.$item[0]->banner_image) ?? '' }}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $item[0]->banner_alt ?? '' }}" title="{{ $item[0]->banner_title ?? '' }}">
                @else
                <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('default_banner_image'))}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $item[0]->name ?? '' }}" title="{{ $item[0]->name ?? '' }}">
                @endif
                <div class="imagecaption">

                    <div class="container">

                        <h1>@if(GetLang()=='en') {{ $type[0]->name ?? '' }} @else {{ $type[0]->name_h ?? '' }} @endif</h1>

                    </div>

                </div>

            </div>

            <div class="breadcrumbs">

                <div class="container">

                    <ul>

                        <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>

                        <li><a href="javascript:void(0);"> @if(GetLang()=='en') {{ @$mmenu[0]->name  ?? ''}} @else {{ @$mmenu[0]->name_h  ?? ''}} @endif</a></li>

                         <li><span> @if(GetLang()=='en') {{ $type[0]->name ?? ''}} @else {{ $type[0]->name_h ?? ''}} @endif </span></li>

                    </ul>

                </div>

            </div>



<div class="wrapper" id="skipCont"></div>





   <section class="withsidebar-wrap ptb-60">

       <div class="container">

           <div class="row">

            <div class="col-md-3">

                <div class="sidebarwraper">

                    @foreach(GetSubMenusFront($type[0]->menu_id) as $key1=>$S)

                        <ul>

                            @if(count(GetchildMenusFront($type[0]->menu_id,$S->id))>0)

                                    <li class="hasnested"><a @if($S->id==$type[0]->id) class="active" @endif> @if(GetLang()=='en') {{ $S->name ?? '' }} @else {{ $S->name_h ?? '' }} @endif<svg class="minus" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus"/></g></svg><svg viewBox="0 0 24 24" class="plus"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg></a>

                                        <ul>

                                            @foreach(GetchildMenusFront($type[0]->menu_id,$S->id) as $key2=>$C)

                                                @if($C->external=='yes')
                                                    <li><a href="{{url($C->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank" > @if(GetLang()=='en') {{ $C->name ?? ''}} @else {{ $C->name_h ?? ''}} @endif</a></li>

                                                @elseif($C->external=='no')

                                                <li><a href="{{url($C->url)}}"  > @if(GetLang()=='en') {{ $C->name ?? ''}} @else {{ $C->name_h ?? ''}} @endif</a></li>


                                                @else
                                                    <li><a href={{url($C->url."/".$mmenu[0]->slug."/".$S->slug."/".$C->slug)}}>  @if(GetLang()=='en') {{ $C->name ?? ''}} @else {{ $C->name_h ?? ''}} @endif</a></li>
                                                @endif

                                            @endforeach

                                        </ul>

                                    </li>

                            @else

                                @if($S->external=='yes')
                                    <li><a href="{{ url($S->url) }}" onclick="return confirm('Are you sure  external window open?')" target="_blank">  @if(GetLang()=='en') {{ $S->name ?? ''}} @else {{ $S->name_h ?? ''}} @endif </a></li>

                                @elseif($S->external=='no')

                                    <li><a href="{{ url($S->url) }}" >  @if(GetLang()=='en') {{ $S->name ?? ''}} @else {{ $S->name_h ?? ''}} @endif </a></li>

                                @else

                                <li><a href="{{ url($S->url."/".$mmenu[0]->slug."/".$S->slug) }}" @if($S->id==$type[0]->id) class="active" @endif>  @if(GetLang()=='en') {{ $S->name ?? ''}} @else {{ $S->name_h ?? ''}} @endif  </a></li>

                                @endif


                             @endif





                        </ul>



                    @endforeach





                </div>

            </div>





                            @if (collect($item)->isEmpty()) {{-- remember that $contact is your variable --}}

                                                <div class="alert alert-success" role="alert">

                                                    <h4 class="alert-heading">something went wrong </h4>

                                                    <p>Data Not Found</p>



                                                </div>



                            @else


                                    <div class="col-md-9">
                                        @foreach ($item as $items)
                                            @if(($items->department) == '7')
                                                <div class="innerpagecontent">
                                                  <h3><span> @if(GetLang()=='en') {{ $items->title ?? '' }} @else {{ $items->title_h ?? '' }} @endif</span></h3>
                                                    @if($items->image!='' && $items->image!='default.jpg')
                                                        <div class="row mt-4">
                                                                <div class="col-md-3">

                                                                    <div class=" top text-center mt-0">
                                                                        <div class="profile-img">
                                                                            <img src="{{asset('uploads/organisation/'.$items->image)}}"  alt="{{ $items->title }}" title="{{ $items->title }}">
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-7 col-lg-8">

                                                                    <p>  @if(GetLang()=='en') {!! $items->designation !!} @else {!! $items->designation_h !!} @endif</p>

                                                                    <p>  @if(GetLang()=='en') {!! $items->description !!} @else {!! $items->description_h !!} @endif</p>
                                                                </div>
                                                        </div>
                                                    @endif
                                                </div>

                                            @endif
                                        @endforeach
                                    </div>

                            @endif

                </div>

                {{$item->links('pagination::bootstrap-5')}}

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

