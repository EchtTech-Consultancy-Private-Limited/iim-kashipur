<div class="header-top">

    <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="header-top-content">

                            <div class="header-top-left">

                                <div class="datewrap">

                                    <p>@lang('common.page_last_updated_on'): {{ now()->format('j F Y') }}</p>

                                </div>

                            </div>

                            <div class="header-top-right">

                                <div class="skipwrap">

                                    <ul>

                                        <li><a href="{{url('/')}}">@lang('common.home')</a></li>





                                        <li><a href="#skipCont">@lang('common.skip_to_main_content')</a></li>







                                        <li><a href="{{ url('/screen_reader_access') }}">@lang('common.screen_reader_access')</a></li>

                                        <li>

                                            <div class="d-flex">

                                                <button class="text-increment-btn"  onclick="textnormal()">A</button>

                                                <button class="text-increment-btn"  onclick="textincrease()">A+</button>

                                                <button class="text-increment-btn"  onclick="textincrease2()">A++</button>

                                            </div>

                                        </li>

                                        <li>

                                            <div class="d-flex">

                                                <button class="theme-btn-light" onclick="lightmode()"  id="mybtn">L</button>

                                                <button class="theme-btn-dark" onclick="darkmode()" id="mybtn" >D</button>

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

                                            <a href="{{GetOrganisationAllDetails('facebook')}}" alt="{{GetOrganisationAllDetails('Facebook_Alt')}}"  title="{{GetOrganisationAllDetails('Facebook_title')}}"  onclick="return confirm('Are you sure  external window open?')" target="_blank">

                                                <i class="fa fa-facebook" aria-hidden="true"></i>

                                            </a>

                                        </li>

                                    @endif

                                    @if(GetOrganisationAllDetails('twitter')!='')

                                        <li>

                                            <a href="{{GetOrganisationAllDetails('twitter')}}" alt="{{GetOrganisationAllDetails('twitter_Alt')}}" title="{{GetOrganisationAllDetails('Twitter_title')}}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >

                                                <i class="fa fa-twitter" aria-hidden="true"></i>

                                            </a>

                                        </li>

                                    @endif



                                    @if(GetOrganisationAllDetails('instagram')!='')

                                    <li>

                                        <a href="{{GetOrganisationAllDetails('instagram')}}" alt="{{GetOrganisationAllDetails('Instagram_Alt')}}" title="{{GetOrganisationAllDetails('Instagram_title')}}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >

                                            <i class="fa fa-instagram" aria-hidden="true"></i>

                                        </a>

                                    </li>

                                   @endif



                                   @if(GetOrganisationAllDetails('linkedin')!='')

                                   <li>

                                       <a href="{{GetOrganisationAllDetails('linkedin')}}" alt="{{GetOrganisationAllDetails('LinkedIn_Alt')}}" title="{{GetOrganisationAllDetails('LinkedIn_title')}}"  onclick="return confirm('Are you sure  external window open?')"  target="_blank">

                                           <i class="fa fa-linkedin" aria-hidden="true"></i>

                                       </a>

                                   </li>

                                  @endif





                                  <li>

                                    <a href="{{ url('/sitemap') }}" alt="@lang('common.sitemap')" title="@lang('common.sitemap')">

                                        <i class="fa fa-sitemap" aria-hidden="true"></i>

                                    </a>

                                </li>



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

                            @if(GetOrganisationAllDetails('logo')!='')

                            <div class="logo-left">

                                <a href="{{ url(GetOrganisationAllDetails('url_logo'))}}">

                                    <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('logo'))}}" alt="{{ GetOrganisationAllDetails('Logo_Alt1')}}" title="{{ GetOrganisationAllDetails('Logo_Title1')}}" class="img-fluid">

                                </a>

                            </div>

                            @endif

                        </div>

                        <div class="col-md-6">

                            <div class="logo-right">

                                @if(GetOrganisationAllDetails('logo2')!='')

                                <a href="{{ url(GetOrganisationAllDetails('url_logo2'))}}" target="_blank">

                                    <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('logo2'))}}" alt="{{ GetOrganisationAllDetails('Logo_Alt2')}}" title="{{ GetOrganisationAllDetails('Logo_Title2')}}" class="img-fluid"  onclick="return confirm('Are you sure  external window open?')" target="_blank">

                                </a>

                                @endif

                                @if(GetOrganisationAllDetails('logo3')!='')

                                <a href="{{ url(GetOrganisationAllDetails('url_logo3'))}}" target="_blank">

                                    <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('logo3'))}}" alt="{{ GetOrganisationAllDetails('Logo_Alt3')}}" title="{{ GetOrganisationAllDetails('Logo_Title3')}}" class="img-fluid dic"  onclick="return confirm('Are you sure  external window open?')" target="_blank">

                                </a>

                                @endif

                                @if(GetOrganisationAllDetails('logo4')!='')

                                <a href="{{ url(GetOrganisationAllDetails('url_logo4'))}}" target="_blank">

                                    <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('logo4'))}}" alt="{{ GetOrganisationAllDetails('Logo_Alt4')}}" title="{{ GetOrganisationAllDetails('Logo_Title4')}}" class="img-fluid"  onclick="return confirm('Are you sure  external window open?')" target="_blank">

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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">

                  <i class="fas fa-bars"></i>

                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavbar">

                  <ul class="navbar-nav ml-auto">

                            @foreach(content_menus() as $key=>$M)

                                @if(count(GetSubMenusFront($M->id))>0)

                                    <li class="nav-item dropdown">

                                            <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown">@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a>

                                            <ul class="dropdown-menu">



                                        @foreach(GetSubMenusFront($M->id) as $key1=>$S)

                                            @if(count(GetchildMenusFront($M->id,$S->id))>0)

                                                <li class="dropdown-item dropdown">

                                                <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown">@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a>

                                                <ul class="dropdown-menu">



                                                    @foreach(GetchildMenusFront($M->id,$S->id) as $key2=>$C)

                                                        @if($C->external=='yes')

                                                        <li class="dropdown-item"><a href="{{url($C->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank">@if(GetLang()=='en'){{$C->name}} @else {{$C->name_h}} @endif</a></li>

                                                        @elseif($C->external=='no')

                                                        <li class="dropdown-item"><a href="{{url($C->url)}}" >@if(GetLang()=='en'){{$C->name}} @else {{$C->name_h}} @endif</a></li>

                                                        @else

                                                        <li class="dropdown-item"><a href="{{url($C->url."/".$M->slug."/".$S->slug."/".$C->slug)}}">@if(GetLang()=='en'){{$C->name}} @else {{$C->name_h}} @endif</a></li>

                                                        @endif

                                                    @endforeach

                                                </ul>

                                                </li>

                                            @else

                                                @if($S->external=='yes')

                                                <li class="dropdown-item"><a href="{{url($S->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank">@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a></li>

                                                @elseif($S->external=='no')

                                                <li class="dropdown-item"><a href="{{url($S->url)}}" >@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a></li>

                                                @else

                                                <li class="dropdown-item"><a href="{{url($M->slug."/".$S->slug)}}">@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a></li>

                                                @endif

                                                @endif

                                             @endforeach



                                            </ul>



                                       </li>

                                 @else

                                    @if($M->external=='yes')

                                     <li class="nav-item"><a href="{{url($M->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank">@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a></li>

                                     @elseif($M->external=='no')


                                     <li class="nav-item"><a href="{{url($M->url)}}" >@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a></li>

                                     @else

                                      <li class="nav-item"><a href="{{url($M->slug)}}">@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a></li>

                                     @endif

                                    @endif

                    @endforeach

                  </ul>

                </div>

               </div>

              </nav>

      </div>







    {{--  main menu or child menu two layer  complete

      <nav class="navbar navbar-expand-lg">

        <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav">

                @foreach(content_menus() as $key=>$M)



                @if(count(GetSubMenusFront($M->id))==0)

                 <li class="nav-item">

                        @if($M->external=='yes')

                        <a class="nav-link" href="{{url($M->url)}}" target="_blank">{{$M->name}}</a>

                        @else

                        <a class="nav-link" href="{{url($M->url."/".$M->slug)}}">{{$M->name}}</a>

                        @endif

                    </li>

                  @else

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="javascrip:void(0);">{{$M->name}}</a>

                        <ul class="dropdown-menu">

                           @foreach(GetSubMenusFront($M->id) as $key=>$n)

                            <li>

                            @if($n->external=='yes')

                                <a class="dropdown-item" href="{{url($n->url)}}" target="_blank">{{$n->name}}</a>

                            @else

                                <a class="dropdown-item" href="{{url($M->url."/".$M->slug."/".$n->slug)}}">{{$n->name}}</a>

                            @endif



                        </li>

                            @endforeach

                        </ul>



                    </li>

                   @endif

                @endforeach

                </ul>

            </div>

        </div>

    </nav>

    </div>

















     --}}













        <!--------------------------------- banner   --------------------------------------->



        <section class="hero-banner">





        </section>





