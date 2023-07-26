<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-top-content">
                    <div class="header-top-left">

                    </div>
                    <div class="header-top-right">
                        <div class="skipwrap">
                            <ul>
                                <!-- <li><a href="{{ url('/') }}">@lang('common.home')</a></li> -->
                                <li><a href="{{ url('/') }}" title="@lang('common.home')"><i
                                            class="fa fa-home"></i></a></li>


                                <!-- <li><a href="#skipCont">@lang('common.skip_to_main_content')</a></li> -->
                                <li><a href="#skipCont" title="@lang('common.skip_to_main_content')"><i class="fa fa-arrow-down"></i></a>
                                </li>



                                <!-- <li><a href="{{ url('/screen_reader_access') }}">@lang('common.screen_reader_access')</a></li> -->
                                <li><a href="{{ url('/screen_reader_access') }}" title="@lang('common.screen_reader_access')"><i
                                            class="fa fa-volume-up"></i></a></li>


                                <li>

                                    <div class="text-assesbility p-relative" title="Accessibility Dropdown"
                                        alt="incease">
                                        <img src="{{ asset('ico-accessibility.png') }}" title="Accessibility Dropdown"
                                            alt="Accessibility Dropdown" />

                                        <div class="text-assesbility-button">
                                            {{-- <button class="text-increment-btn button" onclick="textnormal()">A</button>
                                            <button class="text-increment-btn button active" onclick="textincrease()">A+</button>
                                            <button class="text-increment-btn button" onclick="textincrease2()">A+</button> --}}

                                            <button class="text-increment-btn button" onclick="decreaseFontSize()"
                                                title="Decrease Font SIze">A-</button>
                                            <button class="text-increment-btn button active" onclick="normaltext()"
                                                title="Normal Font Size">A</button>
                                            <button class="text-increment-btn button" onclick="increaseFontSize()"
                                                title="Increase Font Size">A+</button>

                                        </div>
                                    </div>

                                </li>

                                <li>
                                    <div class="d-flex">
                                        <button class="theme-btn-light" title="Light"
                                            onclick="swapStyleSheet('{{ asset('/assets/css/style.css') }}')">L</button>
                                        <button class="theme-btn-dark" title="Dark"
                                            onclick="swapStyleSheet('{{ asset('assets/css/site-change.css') }}')">D</button>
                                    </div>
                                </li>
                                <li>

                                    <div class="select-wrap">
                                        <select class="form-select" onchange="javascript:setlang(value);">
                                            <option value="en" @if (GetLang() == 'en') selected @endif>
                                                English</option>
                                            <option value="hi" @if (GetLang() == 'hi') selected @endif>
                                                Hindi</option>
                                        </select>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="social-icon">
                            <ul>
                                <!-- @if (GetOrganisationAllDetails('facebook') != '')
<li>
                                        <a href="{{ GetOrganisationAllDetails('facebook') }}"
                                            alt="{{ GetOrganisationAllDetails('Facebook_Alt') }}"
                                            title="{{ GetOrganisationAllDetails('Facebook_title') }}"
                                            onclick="return confirm('Are you sure  external window open?')"
                                            target="_blank">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
@endif
                                @if (GetOrganisationAllDetails('twitter') != '')
<li>
                                        <a href="{{ GetOrganisationAllDetails('twitter') }}"
                                            alt="{{ GetOrganisationAllDetails('twitter_Alt') }}"
                                            title="{{ GetOrganisationAllDetails('Twitter_title') }}"
                                            onclick="return confirm('Are you sure  external window open?')"
                                            target="_blank">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
@endif

                                @if (GetOrganisationAllDetails('instagram') != '')
<li>
                                        <a href="{{ GetOrganisationAllDetails('instagram') }}"
                                            alt="{{ GetOrganisationAllDetails('Instagram_Alt') }}"
                                            title="{{ GetOrganisationAllDetails('Instagram_title') }}"
                                            onclick="return confirm('Are you sure  external window open?')"
                                            target="_blank">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
@endif

                                @if (GetOrganisationAllDetails('linkedin') != '')
<li>
                                        <a href="{{ GetOrganisationAllDetails('linkedin') }}"
                                            alt="{{ GetOrganisationAllDetails('LinkedIn_Alt') }}"
                                            title="{{ GetOrganisationAllDetails('LinkedIn_title') }}"
                                            onclick="return confirm('Are you sure  external window open?')"
                                            target="_blank">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
@endif -->


                                <li>
                                    <a href="{{ url('/sitemap') }}" title="@lang('common.sitemap')">
                                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                <span class="navbar-toggler-icon"></span>
                                <span class="navbar-toggler-icon"></span>
                            </button> -->
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
                <div class="col-md-5">
                    @if (GetOrganisationAllDetails('logo') != '')
                        <div class="logo-left">
                            <a href="{{ url(GetOrganisationAllDetails('url_logo')) }}">
                                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('logo')) }}"
                                    alt="{{ GetOrganisationAllDetails('Logo_Alt1') }}"
                                    title="{{ GetOrganisationAllDetails('Logo_Title1') }}" class="img-fluid">
                            </a>
                        </div>
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="logo-right">

                        <div class="header-top-left top-text-highlighted">

                            <ul>
                               
                                    <span class="text-hili-top">
                                        Admission Offer :
                                    </span>
                                
                                <li>
                                    <a href="javascript:void();">
                                        <b class="text-special">MBA</b>
                                    </a>
                                </li>

                                <li>
                                    <a href="javascript:void();">
                                       
                                        <b class="text-special"> MBA (ANALYTICS) </b>
                                    </a>

                                </li>
                                                            
                            </ul>

                        </div>

                        @if (GetOrganisationAllDetails('logo2') != '')
                            <a href="{{ url(GetOrganisationAllDetails('url_logo2')) }}" target="_blank">
                                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('logo2')) }}"
                                    alt="{{ GetOrganisationAllDetails('Logo_Alt2') }}"
                                    title="{{ GetOrganisationAllDetails('Logo_Title2') }}" class="img-fluid"
                                    onclick="return confirm('Are you sure  external window open?')">
                            </a>
                        @endif
                        @if (GetOrganisationAllDetails('logo3') != '')
                            <a href="{{ url(GetOrganisationAllDetails('url_logo3')) }}" target="_blank">
                                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('logo3')) }}"
                                    alt="{{ GetOrganisationAllDetails('Logo_Alt3') }}"
                                    title="{{ GetOrganisationAllDetails('Logo_Title3') }}" class="img-fluid dic"
                                    onclick="return confirm('Are you sure  external window open?')">
                            </a>
                        @endif
                        @if (GetOrganisationAllDetails('logo4') != '')
                            <a href="{{ url(GetOrganisationAllDetails('url_logo4')) }}" target="_blank">
                                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('logo4')) }}"
                                    alt="{{ GetOrganisationAllDetails('Logo_Alt4') }}"
                                    title="{{ GetOrganisationAllDetails('Logo_Title4') }}" class="img-fluid"
                                    onclick="return confirm('Are you sure  external window open?')">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--------------------------------------- menu bar    ----------------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavbar" aria-label="Toggler">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">

                    @foreach (content_menus() as $key => $M)
                        @if (count(GetSubMenusFront($M->id)) > 0)
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown">
                                    @if (GetLang() == 'en')
                                        {{ $M->name }}
                                    @else
                                        {{ $M->name_h }}
                                    @endif
                                </a>
                                <ul class="dropdown-menu">

                                    @foreach (GetSubMenusFront($M->id) as $key1 => $S)
                                        @if (count(GetchildMenusFront($M->id, $S->id)) > 0)
                                            <li class="dropdown-item dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle"
                                                    data-bs-toggle="dropdown">
                                                    @if (GetLang() == 'en')
                                                        {{ $S->name }}
                                                    @else
                                                        {{ $S->name_h }}
                                                    @endif
                                                </a>
                                                <ul class="dropdown-menu">

                                                    @foreach (GetchildMenusFront($M->id, $S->id) as $key2 => $C)
                                                        @if ($C->external == 'yes')
                                                            <li class="dropdown-item"><a href="{{ url($C->url) }}"
                                                                    onclick="return confirm('Are you sure  external window open?')"
                                                                    target="_blank">
                                                                    @if (GetLang() == 'en')
                                                                        {{ $C->name }}
                                                                    @else
                                                                        {{ $C->name_h }}
                                                                    @endif
                                                                </a></li>
                                                        @elseif($C->external == 'no')
                                                            <li class="dropdown-item"><a href="{{ url($C->url) }}">
                                                                    @if (GetLang() == 'en')
                                                                        {{ $C->name }}
                                                                    @else
                                                                        {{ $C->name_h }}
                                                                    @endif
                                                                </a></li>
                                                        @else
                                                            <li class="dropdown-item"><a
                                                                    href="{{ url($M->slug . '/' . $S->slug . '/' . $C->slug) }}">
                                                                    @if (GetLang() == 'en')
                                                                        {{ $C->name }}
                                                                    @else
                                                                        {{ $C->name_h }}
                                                                    @endif
                                                                </a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            @if ($S->external == 'yes')
                                                <li class="dropdown-item"><a href="{{ url($S->url) }}"
                                                        onclick="return confirm('Are you sure  external window open?')"
                                                        target="_blank">
                                                        @if (GetLang() == 'en')
                                                            {{ $S->name }}
                                                        @else
                                                            {{ $S->name_h }}
                                                        @endif
                                                    </a>
                                                </li>
                                            @elseif($S->external == 'no')
                                                <li class="dropdown-item"><a href="{{ url($S->url) }}">
                                                        @if (GetLang() == 'en')
                                                            {{ $S->name }}
                                                        @else
                                                            {{ $S->name_h }}
                                                        @endif
                                                    </a></li>
                                            @else
                                                <li class="dropdown-item"><a
                                                        href="{{ url($M->slug . '/' . $S->slug) }}">
                                                        @if (GetLang() == 'en')
                                                            {{ $S->name }}
                                                        @else
                                                            {{ $S->name_h }}
                                                        @endif
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach

                                </ul>

                            </li>
                        @else
                            @if ($M->external == 'yes')
                                <li class="nav-item"><a href="{{ url($M->url) }}"
                                        onclick="return confirm('Are you sure  external window open?')"
                                        target="_blank">
                                        @if (GetLang() == 'en')
                                            {{ $M->name }}
                                        @else
                                            {{ $M->name_h }}
                                        @endif
                                    </a></li>
                            @elseif($M->external == 'no')
                                <li class="nav-item"><a href="{{ url($M->url) }}">
                                        @if (GetLang() == 'en')
                                            {{ $M->name }}
                                        @else
                                            {{ $M->name_h }}
                                        @endif
                                    </a></li>
                            @else
                                <li class="nav-item"><a href="{{ url($M->slug) }}">
                                        @if (GetLang() == 'en')
                                            {{ $M->name }}
                                        @else
                                            {{ $M->name_h }}
                                        @endif
                                    </a></li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</div>


<!--------------------------------- banner   --------------------------------------->

@if (Getsliderimage() != '')

    @if (request()->path() == '/')

        <section class="banner">
            <div id="carouselExampleCaptions" class="carousel slide container-lg-sm" data-bs-ride="carousel">
                <ul class="carousel-indicators">
                    @foreach (Getsliderimage() as $key => $M)
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}"
                            @if ($key == 0) class="active " @endif aria-current="true"
                            aria-label="Slide{{ $key }}"></li>
                    @endforeach
                </ul>

                <div class="carousel-inner">


                    @foreach (Getsliderimage() as $key => $M)
                        <div class="carousel-item @if ($key == 0) active @endif">

                            <div class="d-lg-flex">

                                @if ($M->heading1 != '' && $M->short != '')
                                    <div class="carousel-caption ">

                                        <div class="text-banner">
                                            <p class="b-white mb-2">
                                                @lang('common.WELCOME_TO')
                                            </p>
                                            <h2>
                                                @if (GetLang() == 'en')
                                                    {{ $M->heading1 }}
                                                @else
                                                    {{ $M->heading1_h }}
                                                @endif
                                            </h2>

                                            <p class="text-nb">

                                                @if (GetLang() == 'en')
                                                    {{ $M->short }}
                                                @else
                                                    {{ $M->short_h }}
                                                @endif

                                            </p>

                                            <div class="btn-wrap about-body">
                                                <a @if ($M->external == 'yes') onclick="return confirm('Are you sure  external window open?')"  target="_blank" href="{{ url($M->url) }}" @else    href="{{ url($M->url) }}" @endif
                                                    class="btn btn-orange">@lang('common.read_more')</a>
                                            </div>

                                        </div>
                                        {{--
                                                                                                                    <!-- @if ("$M->image" != '')
                                                                                <a  @if ($M->external == 'yes') target="_blank" href="{{ $M->url }}" @elseif($M->external == 'no')  href="{{ url($M->url) }}" @endif href="{{ $M->url }}">

                                                                                                        @if (GetLang() == 'en')
                                                                                {{ $M->heading1 }}
                                                                                @else
                                                                                {{ $M->heading1_h }}
                                                                                @endif
                                                                                                    </a>
                                                                                @endif

                                                                                                    @if ("$M->image" != '')
                                                                                <p> @if (GetLang() == 'en')
                                                                                {{ $M->short }}
                                                                                @else
                                                                                {{ $M->short_h }}
                                                                                @endif   </p>
                                                                                @endif --> --}}

                                    </div>
                                @endif
                                <div class="banner-image-70">
                                    @if ("$M->image" != '')
                                        <!-- ../public/banner/banner-1.jpg-->
                                        <img src="{{ asset('/banner/' . $M->image) }}"
                                            class="d-block w-100 @if ($key == 0) img-responsive @endif "
                                            alt="{{ $M->banner_Alt }}" title="{{ $M->banner_title }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev" title="Previous">
                    <i class="fa-solid fa fa-chevron-left" aria-hidden="true"></i>
                    <span class="visually-hidden ">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next" title="Next">
                    <i class="fa-solid fa fa-chevron-right" aria-hidden="true"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </section>


    @endif

@endif


<!--Start Sticky Icon-->
<div class="sticky-i d-none">
    <div class="sticky-icon">
        <a href="https://www.facebook.com/IndianInstituteOfManagementKashipur" target="_blank" class="Facebook"
            title="Facebook"><i class="fa fa-facebook-f"> </i> Facebook </a>
        <a href="https://twitter.com/IIMKsp" class="Twitter" target="_blank" title="Twitter"><i
                class="fa fa-twitter" title="Twitter"> </i> Twitter </a>
        <a href="https://www.instagram.com/iimkashipur/" class="Instagram" target="_blank" title="Instagram"><i
                class="fa fa-instagram"></i> Instagram </a>
        <a href="https://www.linkedin.com/school/iimkashipur/" class="Youtube" target="_blank" title="Linkedin"><i
                class="fa fa-linkedin"> </i> Linkedin </a>
    </div>

</div>
<!--End Sticky Icon-->



<div class="wrapper" id="skipCont"></div>
