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

    <meta name="title" content="{{$item[0]->meta_title }}">

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







        <div class="wrapper" id="skipCont"></div>



    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col-md-3">

                    <div class="sidebarwraper">



                        @foreach(GetSubMenusFront($type[0]->menu_id) as $key1=>$S)

                        <ul>



                            @if(count(GetchildMenusFront($type[0]->menu_id,$S->id))>0)


                            <li class="hasnested"><a  @if($S->id==$type[0]->id) class="active" @endif >{{ $S->name }}<svg class="minus" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus"/></g></svg><svg viewBox="0 0 24 24" class="plus"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg></a>

                                <ul>

                                    @foreach(GetchildMenusFront($type[0]->menu_id,$S->id) as $key2=>$C)

                                    <li><a href="javascript:void(0);">{{ $C->name }}</a></li>

                                    @endforeach

                                </ul>

                            </li>

                            @else

                            <li><a href="{{ url($S->url."/".$type[0]->slug."/".$S->slug) }}"  @if($S->id==$type[0]->id) class="active" @endif > {{ $S->name }}  </a></li>


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

                    <div class="innerpagecontent">

                         <h4 class="hp-4">Board of Governors</h4>

                               <a href="javascript:void(0);" class="btn2">Chairperson</a>

                                 @foreach ($item as $items)

                                  @if(($items->department) == 'CHAIRPERSON')

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

                                    @endif

                                 @endforeach



                                <div class="col-md-7 col-lg-8">

                                    <h5>Greetings!</h5>

                                    <p>Celebrating ten years of serving the education and management sector, IIM Kashipur is committed to its four core values: collegiality, transparency, green consciousness, pro-active engagement with all stakeholders. The institute believes that as an institution of national importance, it has a larger role to play in the field of management education and social transformation. Our strategic goals include improvement of the academic ecosystem; synergy between educational theory, practice and research; promotion of innovation, entrepreneurship and public service; empowerment of local stakeholders; upliftment of economically challenged sections of the society; and gender diversity. </p>

                                </div>

                    </div>

                </div>





                        <a href="javascript:void(0);" class="btn2">MEMBERS</a><br>

                        <div class="profilewithinfo">

                            @foreach ($item as $items)

                            @if(($items->department) == 'MEMBERS')

                            <div class="row">

                                <div class="col-6 col-lg-4 col-xxl-3 mb-4">

                                    <div class="profilewraper">

                                        <figure><img src="{{url('uploads/organisation/'.$items->image)}}" alt=""></figure><br>

                                        <h4>{{ $items->title }}</h4>

                                        <p>{{ $items->designation }}</p>

                                        <p>{{ $items->department }}</p>

                                    </div>

                                </div>

                            </div>

                            @endif

                            @endforeach

                        </div>







                        <a href="javascript:void(0);" class="btn2">Secretary to the board</a><br>

                        <div class="profilewithinfo mb-0">

                            @foreach ($item as $items)

                            @if(($items->department) == 'SECRETARY')

                            <div class="row">

                                <div class="col-md-5 col-lg-4">

                                    <div class="profilewraper withinfo">

                                        <figure><img src="{{url('uploads/organisation/'.$items->image)}}" alt=""></figure>

                                        <h4>{{ $items->title }}</h4>

                                        <p>{{ $items->designation }}</p>

                                        <p>{{ $items->department }}</p>

                                    </div>

                                </div>

                                <div class="col-md-7 col-lg-8">

                                    <h5>Greetings!</h5>

                                   <p>{!! $items->description !!}</p>

                                </div>

                            </div>

                            @endif

                            @endforeach

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

