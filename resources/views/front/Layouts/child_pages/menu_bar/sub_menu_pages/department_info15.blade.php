<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{GetOrganisationDetails('meta_title')}}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/swiper-bundle.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/aos.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="{{asset('uploads/site-logo/'.GetOrganisationDetails('fevicon'))}}">

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

    <meta name="description" content="{{GetOrganisationAllDetails('meta_description') ?? ''}}">

@endif


</style>



</head>



<body>





    @include('front.Layouts.child_pages.header')







        <div class="wrapper" id="skipCont"></div>



        @php

        $mmenu=@content_menus($type[0]->menu_id);

        @endphp





    <div class="internalpagebanner">

        <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? ''}}" style="height:auto;  min-height:200px; max-height:350% overflow:hidden;"  alt="Board of governers banner">

        <div class="imagecaption">

            <div class="container">

                <h1>{{ $type[0]->name ?? '' }}</h1>

            </div>

        </div>

    </div>

    <div class="breadcrumbs">

        <div class="container">

            <ul>

                <li><a href="index.html"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>

                <li><a href="javascript:void(0)">{{ @$mmenu[0]->name ?? '' }}</a></li>

                <li><span>{{ $type[0]->name ?? '' }}</span></li>

            </ul>

        </div>

    </div>





    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col-md-3">

                    <div class="sidebarwraper">



                        @foreach(GetSubMenus($type[0]->menu_id) as $key1=>$S)

                        <ul>
                         @if(count(GetChildMenus($type[0]->menu_id,$S->id))>0)

                         <li class="hasnested"><a  @if($S->id==$type[0]->id) class="active" @endif >{{ $S->name ?? ''}}<svg class="minus" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus"/></g></svg><svg viewBox="0 0 24 24" class="plus"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg></a>

                                <ul>

                                    @foreach(GetChildMenus($type[0]->menu_id,$S->id) as $key2=>$C)
                                        @if($C->external=='yes')
                                            <li><a href="{{url($C->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank" >{{ $C->name ?? ''}}</a></li>
                                        @else
                                            <li><a href={{url($C->url."/".$mmenu[0]->slug."/".$S->slug."/".$C->slug)}}>{{ $C->name ?? ''}}</a></li>
                                        @endif


                                   @endforeach

                                </ul>

                            </li>


                            @else

                                @if($S->external=='yes')
                                    <li><a href="{{ url($S->url) }}" onclick="return confirm('Are you sure  external window open?')" target="_blank"> {{ $S->name  ?? ''}}  </a></li>
                                @else
                                <li><a href="{{ url($S->url."/".$mmenu[0]->slug."/".$S->slug) }}" @if($S->id==$type[0]->id) class="active" @endif> {{ $S->name  ?? ''}}  </a></li>
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

                    <div class="innerpagecontent">

                         <h4 class="hp-4">{{ $type[0]->name ?? '' }}</h4>

                               <a href="javascript:void(0)" class="btn2">Chairperson</a>

                                 @foreach ($item as $items)

                                  @if(($items->department) == '2')

                                    <div class="row mt-4">

                                     <div class="col-md-3">

                                        <div class="addevent-box top text-center mt-0">

                                        <div class="profile-img">

                                            <img src="{{asset('uploads/organisation/'.$items->image) ?? ''}}" alt="">

                                        </div>

                                        <h5>{{ $items->title ?? '' }}</h5>

                                        <p> {{ $items->designation  ?? ''}}</p>



                                        <div class="profile-socail-icon information">

                                            <a href="javascript:void(0)" class="socail-icon"><i class="fab fa-facebook-f"></i></a>

                                            <a href="javascript:void(0)" class="socail-icon"><i class="fab fa-twitter"></i></a>



                                        </div>

                                        </div>

                                    </div>






                                <div class="col-md-7 col-lg-8">

                                    <p> {!! $items->description  ?? '' !!}</p>
                                </div>

                                @endif

                                @endforeach


                    </div>

                </div>





                        <a href="javascript:void(0)" class="btn2 margin_top margin_bottom">MEMBERS</a><br>

                        <div class="profilewithinfo">



                            <div class="row">

                                @foreach ($item as $items)

                                @if(($items->department) == '3')

                                <div class="col-6 col-lg-4 col-xxl-3 mb-4">

                                    <div class="profilewraper">

                                        <figure><img src="{{asset('uploads/organisation/'.$items->image) ?? ''}}" alt="{{ $items->title ?? '' }}" title="{{ $items->title ?? '' }}"></figure><br>

                                        <h4>{{ $items->title ?? '' }}</h4>

                                       {{ $items->designation ?? '' }}

                                    </div>

                                </div>

                                @endif

                                @endforeach

                            </div>



                        </div>







                        <a href="javascript:void(0)" class="btn2 margin_bottom">Secretary to the Board</a><br>

                        <div class="profilewithinfo mb-0">

                            @foreach ($item as $items)

                            @if(($items->department) == '4')

                            <div class="row">

                                <div class="col-md-5 col-lg-4">

                                    <div class="profilewraper withinfo">

                                        <figure><img src="{{asset('uploads/organisation/'.$items->image)}}"  alt="{{ $items->title ?? '' }}" title="{{ $items->title ?? '' }}"></figure>

                                        <h4>{{ $items->title  ?? ''}}</h4>

                                        <p>{{ $items->designation ?? '' }}</p>



                                    </div>

                                </div>

                                <div class="col-md-7 col-lg-8">

                                   <p>{!! $items->description !!}</p>

                                </div>

                            </div>

                            @endif

                            @endforeach

                        </div>

                    </div>

                </div>

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









</body>



</html>

