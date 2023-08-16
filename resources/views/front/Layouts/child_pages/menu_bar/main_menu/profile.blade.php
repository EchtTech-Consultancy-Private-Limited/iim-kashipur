<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (isset($item[0]))
        <title>
            @if (GetLang() == 'en')
                {{ GetOrganisationAllDetails('name') }}
            @else
                {{ GetOrganisationAllDetails('name_h') }}
            @endif - {{ $item[0]->meta_title }}
        </title>
    @else
        <title>
            @if (GetLang() == 'en')
                {{ GetOrganisationAllDetails('name') }}
            @else
                {{ GetOrganisationAllDetails('name_h') }}
            @endif
        </title>
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png"
        href="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('fevicon')) }}">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('profile/css/owl.carousel.min.css') }}">
    <link href="{{ asset('profile/css/custom.css') }}" rel="stylesheet" type="text/css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">



    <link rel="shortcut icon"
        href="@if (GetOrganisationAllDetails('fevicon')) {{ asset('uploads/site-logo/' . GetOrganisationAllDetails('fevicon')) }} @else {{ asset('assets/images/' . GetOrganisationAllDetails('fevicon')) }} @endif"
        type="image/vnd.microsoft.icon" />
    @if (isset($item[0]))
        <meta name="title" content="{{ $item[0]->meta_title }}">
        <meta name="keywords" content="{{ $item[0]->meta_keywords }}">
        <meta name="description" content="{{ $item[0]->meta_description }}">
    @else
        <meta name="title" content="{{ GetOrganisationAllDetails('meta_title') }}">
        <meta name="keywords" content="{{ GetOrganisationAllDetails('meta_keywords') }}">
        <meta name="description" content="{{ GetOrganisationAllDetails('meta_description') }}">
    @endif



</head>

<body>


    @include('front.Layouts.headers.Header_new')


    <div class="wrapper" id="skipCont"></div>

    @php
        $mmenu = @content_menus($type[0]->menu_id);
    @endphp




    <div class="internalpagebanner">
        @if (GetOrganisationAllDetails('default_banner_image') != '')
            <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                alt="{{ $type[0]->name ?? '' }}" title="{{ $type[0]->name ?? '' }}">
        @else
            <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? '' }}"
                style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                alt="{{ $type[0]->name ?? '' }}" title="{{ $type[0]->name ?? '' }}">
        @endif
        <div class="imagecaption">
            <div class="container">
                <h1>{{ $type[0]->name ?? '' }}</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}"><svg viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z" />
                            <path
                                d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                        </svg></a></li>
                <li><a href="#">Profile Section </a></li>
            </ul>
        </div>
    </div>


    <section class="content-section">
        <div class="container">
            <div class="content-main">

                    {{-- <div class="sidebarwraper">

                @foreach (GetSubMenus($type[0]->menu_id) as $key1 => $S)
                <ul>

                    @if (count(GetChildMenus($type[0]->menu_id, $S->id)) > 0)


                    <li class="hasnested"><a @if ($S->id == $type[0]->id) class="active" @endif>{{ $S->name }}<svg class="minus" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus"/></g></svg><svg viewBox="0 0 24 24" class="plus"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg></a>
                        <ul>
                            @foreach (GetChildMenus($type[0]->menu_id, $S->id) as $key2 => $C)
                                @if ($C->external == 'yes')
                                    <li><a href="{{url($C->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank" >{{ $C->name ?? ''}}</a></li>

                                    @elseif($C->external=='no')

                                    <li><a href="{{url($C->url)}}" >{{ $C->name ?? ''}}</a></li>



                                 @else
                                    <li><a href={{url($mmenu[0]->slug."/".$S->slug."/".$C->slug)}}>{{ $C->name ?? ''}}</a></li>
                                @endif

                             @endforeach
                        </ul>
                    </li>

                    @else
                            @if ($S->external == 'yes')
                                <li><a href="{{ url($S->url) }}" onclick="return confirm('Are you sure  external window open?')" target="_blank"> {{ $S->name  ?? ''}}  </a></li>

                            @elseif($S->external=='no')

                            <li><a href="{{ url($S->url) }}" > {{ $S->name  ?? ''}}  </a></li>


                             @else
                            <li><a href="{{ url($mmenu[0]->slug."/".$S->slug) }}" @if ($S->id == $type[0]->id) class="active" @endif> {{ $S->name  ?? ''}}  </a></li>
                            @endif


                    @endif


                </ul>

               @endforeach


            </div><br> --}}


            <div class="col-md-12">
                <div class="content-desc">
                    <div class="innerpagecon">
                        <a href="#" class="btn2">{{ $item[0]->designation ?? '' }}</a>
                        @foreach ($item as $items)
                            <div class="row mt-4">

                                <div class="col-lg-3 col-xl-3 col-md-3">

                                    <div class=" top text-center mt-0">
                                        <div class="profile-img">
                                            <img src="{{ asset('uploads/organisation/' . $items->image) }}"
                                                alt="{{ $items->title }}">
                                        </div>

                                        <h6>{{ $items->title }}</h6>
                                    </div>
                                </div>



                                <div class="col-xl-9 col-md-9 col-lg-12">
                                    {{-- <p>{{ $items->department  }}</p> --}}
                                          <p>{!! $items->description !!} </p>


                                    <div class="social-icon">
                                        <ul>
                                            <li>
                                                @if ($item[0]->twitter != '')
                                                    <a href="{{ url($item[0]->twitter) }}"
                                                        alt="{{ $item[0]->Twitter_title }}"
                                                        title="{{ $item[0]->Twitter_title }}"
                                                       @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                        target="_blank">
                                                        <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->instagram != '')
                                                    <a href="{{ url($item[0]->instagram) }}"
                                                        alt="{{ $item[0]->Instagram_title }}"
                                                        title="{{ $item[0]->Instagram_title }}"
                                                       @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                        target="_blank">
                                                        <i class="fa fa-instagram fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->Facebook != '')
                                                    <a href="{{ url($item[0]->Facebook) }}"
                                                        alt="{{ $item[0]->Facebook_title }}"
                                                        title="{{ $item[0]->Facebook_title }}"
                                                       @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                        target="_blank">
                                                        <i class="fa fa-facebook fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->linkedin != '')
                                                    <a href="{{ url($item[0]->linkedin) }}"
                                                        alt="{{ $item[0]->linkedIn_title }}"
                                                        title="{{ $item[0]->linkedIn_title }}"
                                                       @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                        target="_blank">
                                                        <i class="fa fa-linkedin fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                {{-- @if ($item[0]->orcid != '')
                                    <a href="{{ url($item[0]->orcid) }}" alt="{{ $item[0]->orcid_title }}" title="{{ $item[0]->orcid_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                        <i class="fa fa-orcid fa-2x"  class="w3-xxlarge" aria-hidden="true"></i>
                                    </a>&nbsp;
                                   @endif

                                    @if ($item[0]->webofscience != '')
                                    <a href="{{ url($item[0]->webofscience) }}" alt="{{ $item[0]->webofscience_title }}" title="{{ $item[0]->webofscience_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                        <i class="fa fa-twitter fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                    </a>&nbsp;
                                   @endif

                                    @if ($item[0]->scopus != '')
                                    <a href="{{ url($item[0]->scopus) }}" alt="{{ $item[0]->scopus_title }}" title="{{ $item[0]->scopus_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                        <i class="fa fa-twitter fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                    </a>&nbsp;
                                   @endif

                                    @if ($item[0]->scholar != '')
                                    <a href="{{ url($item[0]->scholar) }}" alt="{{ $item[0]->scholar_title }}" title="{{ $item[0]->scholar_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                        <i class="fa fa-twitter fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                    </a>&nbsp;
                                   @endif --}}

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                    </div><br><br>

                    <div class="import-dates">
                        <div class="title"></div>
                        <div class="import-main">
                            <div class="import-left"></div>
                            <div class="import-right"></div>
                        </div>
                    </div>
                    <div class="tab-section">
                        <ul class="nav nav-tabs d-none d-lg-flex" id="myTab" role="tablist">

                            @foreach ($data as $key => $datas)
                                {{-- {{ $key }} --}}
                                <li class="nav-item " role="presentation">
                                    <button
                                        @if ($key == '0') class="nav-link active"  @else  class="nav-link" @endif
                                        id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane{{ $key }}" type="button"
                                        role="tab" aria-controls="profile-tab-pane">{{ $datas->Title }}</button>
                                </li>
                            @endforeach
                        </ul>

                        @foreach ($data as $key => $datas)
                            {{-- {{ $key }} --}}
                            <div class="tab-content accordion" id="myTabContent">
                                <div @if ($key == '0') class="tab-pane fade accordion-item active show"  @else  class="tab-pane fade accordion-item" @endif
                                    id="profile-tab-pane{{ $key }}" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">

                                    <div id="collapseTwo" class="accordion-collapse collapse d-lg-block"
                                        aria-labelledby="headingTwo" data-bs-parent="#myTabContent">
                                        <div class="accordion-body">
                                            <h6>{{ $datas->heading }}</h6>
                                            <div class="accordion-desc">

                                                <p>{!! $datas->description !!}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
    </section>




















































    {{--
   <section class="withsidebar-wrap ptb-60">
       <div class="container">
           <div class="row">
            <div class="col-md-3">
                <div class="sidebarwraper">

                    @foreach (GetSubMenus($type[0]->menu_id) as $key1 => $S)
                    <ul>

                        @if (count(GetChildMenus($type[0]->menu_id, $S->id)) > 0)


                        <li class="hasnested"><a @if ($S->id == $type[0]->id) class="active" @endif>{{ $S->name }}<svg class="minus" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus"/></g></svg><svg viewBox="0 0 24 24" class="plus"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg></a>
                            <ul>
                                @foreach (GetChildMenus($type[0]->menu_id, $S->id) as $key2 => $C)
                                    @if ($C->external == 'yes')
                                        <li><a href="{{url($C->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank" >{{ $C->name ?? ''}}</a></li>

                                        @elseif($C->external=='no')

                                        <li><a href="{{url($C->url)}}" >{{ $C->name ?? ''}}</a></li>



                                     @else
                                        <li><a href={{url($C->url."/".$mmenu[0]->slug."/".$S->slug."/".$C->slug)}}>{{ $C->name ?? ''}}</a></li>
                                    @endif

                                 @endforeach
                            </ul>
                        </li>

                        @else
                                @if ($S->external == 'yes')
                                    <li><a href="{{ url($S->url) }}" onclick="return confirm('Are you sure  external window open?')" target="_blank"> {{ $S->name  ?? ''}}  </a></li>

                                @elseif($S->external=='no')

                                <li><a href="{{ url($S->url) }}" > {{ $S->name  ?? ''}}  </a></li>


                                 @else
                                <li><a href="{{ url($S->url."/".$mmenu[0]->slug."/".$S->slug) }}" @if ($S->id == $type[0]->id) class="active" @endif> {{ $S->name  ?? ''}}  </a></li>
                                @endif


                        @endif


                    </ul>

                   @endforeach


                </div><br>





            </div>







            @if (collect($item)->isEmpty()) {{-- remember that $contact is your variable --}}
    {{-- <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">something went wrong </h4>
                <p>Data Not Found</p>

            </div>

            @else


            <div class="col-md-9">
                <div class="innerpagecontent">
                    <a href="#" class="btn2">sadsvsdfvsdfvs {{ $item[0]->designation ??'' }}</a>
                             @foreach ($item as $items)

                                <div class="row mt-4">
                                 <div class="col-md-3">
                                    <div class=" top text-center mt-0">
                                    <div class="profile-img">
                                        <img src="{{asset('uploads/organisation/'.$items->image)}}" alt="{{ $items->title }}">
                                    </div>

                                    <h7>{{ $items->title }}</h7>



                                    </div>
                                </div>



                            <div class="col-md-7 col-lg-8">
                                {{-- <p>{{ $items->department  }}</p> --}}

                        {{-- <p>{!! $items->description	!!} </p>


                                <div class="social-icon">
                                    <ul>
                                        <li >
                                            @if ($item[0]->twitter != '')
                                            <a href="{{ url($item[0]->twitter) }}" alt="{{ $item[0]->Twitter_title }}" title="{{ $item[0]->Twitter_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                                <i class="fa fa-twitter fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                            </a>&nbsp;
                                           @endif

                                            @if ($item[0]->instagram != '')
                                            <a href="{{ url($item[0]->instagram) }}" alt="{{ $item[0]->Instagram_title }}" title="{{ $item[0]->Instagram_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                                <i class="fa fa-instagram fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                            </a>&nbsp;
                                           @endif

                                            @if ($item[0]->Facebook != '')
                                            <a href="{{ url($item[0]->Facebook) }}" alt="{{ $item[0]->Facebook_title }}" title="{{ $item[0]->Facebook_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                                <i class="fa fa-facebook fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                            </a>&nbsp;
                                           @endif

                                            @if ($item[0]->linkedin != '')
                                            <a href="{{ url($item[0]->linkedin) }}" alt="{{ $item[0]->linkedIn_title }}" title="{{ $item[0]->linkedIn_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                                <i class="fa fa-linkedin fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                            </a>&nbsp;
                                           @endif --}}

                                       {{-- @if ($item[0]->orcid != '')
                                            <a href="{{ url($item[0]->orcid) }}" alt="{{ $item[0]->orcid_title }}" title="{{ $item[0]->orcid_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                                <i class="fa fa-orcid fa-2x"  class="w3-xxlarge" aria-hidden="true"></i>
                                            </a>&nbsp;
                                           @endif

                                            @if ($item[0]->webofscience != '')
                                            <a href="{{ url($item[0]->webofscience) }}" alt="{{ $item[0]->webofscience_title }}" title="{{ $item[0]->webofscience_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                                <i class="fa fa-twitter fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                            </a>&nbsp;
                                           @endif

                                            @if ($item[0]->scopus != '')
                                            <a href="{{ url($item[0]->scopus) }}" alt="{{ $item[0]->scopus_title }}" title="{{ $item[0]->scopus_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                                <i class="fa fa-twitter fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                            </a>&nbsp;
                                           @endif

                                            @if ($item[0]->scholar != '')
                                            <a href="{{ url($item[0]->scholar) }}" alt="{{ $item[0]->scholar_title }}" title="{{ $item[0]->scholar_title }}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                                <i class="fa fa-twitter fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                            </a>&nbsp;
                                           @endif

                                        </li>
                                    </ul>
                                </div>
                            </div>
                         @endforeach
                </div>





            </div>




           @endif




           </div>



       </div>
   </section> --}}

    @if (FindSiteSettings('Home', 'footer'))
        @include('front.Layouts.footers.' . FindSiteSettings('Home', 'footer'))
    @endif



    <script async src="https://static.addtoany.com/menu/page.js"></script>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('profile/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('profile/js/custom.js') }}"></script>


    <!-- custom js file link  -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>



    <script>
        AOS.init({
            disable: 'mobile'
        });
    </script>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>



</body>

</html>
