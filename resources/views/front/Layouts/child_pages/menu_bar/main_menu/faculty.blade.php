@extends('front.Layouts.master')

@section('content')


    @php
        $mmenu = @content_menus($type[0]->menu_id);
    @endphp



    {{-- banner and  breadcrumbs   --}}

    @if (isset($get))
        {{-- child menu section  --}}
        {{-- banner setion --}}
        <div class="internalpagebanner">
            @if (GetOrganisationAllDetails('default_banner_image') != '')
                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                    alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
            @else
                <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? '' }}"
                    style="height:auto;  min-height:200px; max-height:350% overflow:hidden;"
                    alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
            @endif
            <div class="imagecaption">
                <div class="container">
                    <h1>
                        @if (GetLang() == 'en')
                            {{ $type_child[0]->name ?? '' }}
                        @else
                            {{ $type_child[0]->name_h ?? '' }}
                        @endif
                    </h1>
                </div>
            </div>
        </div>


        {{-- breadcrumbs setion --}}
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="javascript:void(0);"><svg viewBox="0 0 24 24">
                                <path fill="none" d="M0 0h24v24H0V0z" />
                                <path
                                    d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                            </svg></a></li>
                    <li><a href="javascript:void(0);">
                            @if (GetLang() == 'en')
                                {{ $get[0]->name ?? '' }}
                            @else
                                {{ $get[0]->name_h ?? '' }}
                            @endif
                        </a>
                    </li>
                    <li><span>
                            @if (GetLang() == 'en')
                                {{ $gets[0]->name ?? '' }}
                            @else
                                {{ $gets[0]->name_h ?? '' }}
                            @endif
                        </span>
                    </li>
                    <li><span>
                            @if (GetLang() == 'en')
                                {{ $type_child[0]->name ?? '' }}
                            @else
                                {{ $type_child[0]->name_h ?? '' }}
                            @endif
                        </span>
                    </li>

                </ul>
            </div>
        </div>


        </ul>
        </div>
        </div>
    @elseif(isset($sub_menu))
        {{-- sub menu section --}}


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

                    <h1>
                        @if (GetLang() == 'en')
                            {{ $type[0]->name ?? '' }}
                        @else
                            {{ $type[0]->name_h ?? '' }}
                        @endif
                    </h1>

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

                    <li><a href="{{  URL::previous()  }}">
                            @if (GetLang() == 'en')
                                {{ @$mmenu[0]->name ?? '' }}
                            @else
                                {{ @$mmenu[0]->name_h ?? '' }}
                            @endif
                        </a>
                    </li>

                    <li><span>
                            @if (GetLang() == 'en')
                                {{ $type[0]->name ?? '' }}
                            @else
                                {{ $type[0]->name_h ?? '' }}
                            @endif
                        </span>
                    </li>

                </ul>

            </div>

        </div>
    @else
        {{-- main banner --}}
        {{-- banner section --}}
        <div class="internalpagebanner">
            @if (GetOrganisationAllDetails('default_banner_image') != '')
                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                    alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
            @else
                <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? '' }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                    alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
            @endif
            <div class="imagecaption">
                <div class="container">
                    <h1>{{ $type_child[0]->name ?? '' }}</h1>
                </div>
            </div>
        </div>

        {{-- breadcrumbs section  --}}
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/') }}"><svg viewBox="0 0 24 24">
                                <path fill="none" d="M0 0h24v24H0V0z" />
                                <path
                                    d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                            </svg></a></li>

                    <li>
                        <span>
                            @if (GetLang() == 'en')
                                {{ $type[0]->name ?? '' }}
                            @else
                                {{ $type[0]->name_h ?? '' }}
                            @endif
                        </span></li>
                </ul>
            </div>
        </div>
    @endif



    @if (isset($get))

    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <div class="sidebarwraper">

                        @foreach (GetSubMenusFront($gets[0]->menu_id) as $key1 => $S)
                            <ul>

                                @if (count(GetchildMenusFront($gets[0]->menu_id, $S->id)) > 0)
                                    <li class="hasnested"><a @if ($S->id == $gets[0]->id) class="active" @endif>
                                            @if (GetLang() == 'en')
                                                {{ $S->name ?? '' }}
                                            @else
                                                {{ $S->name_h ?? '' }}
                                            @endif
                                            <svg class="minus" viewBox="0 0 24 24">
                                                <g data-name="Layer 2">
                                                    <path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z"
                                                        data-name="minus" />
                                                </g>
                                            </svg><svg viewBox="0 0 24 24" class="plus">
                                                <path
                                                    d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" />
                                            </svg>
                                        </a>


                                        {{-- child menu --}}
                                        <ul>
                                            @foreach (GetchildMenusFront($gets[0]->menu_id, $S->id) as $key2 => $C)
                                                @if (count(GetsubchildMenusFront($gets[0]->menu_id, $S->id, $C->id)) > 0)
                                                    <li class="hasnested">
                                                        <a @if ($C->id == $gets[0]->id) class="active" @endif>
                                                            @if (GetLang() == 'en')
                                                                {{ $C->name ?? '' }}
                                                            @else
                                                                {{ $C->name_h ?? '' }}
                                                            @endif

                                                            <svg class="minus internal-menu-minus" viewBox="0 0 24 24">
                                                                <g data-name="Layer 2">
                                                                    <path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z"
                                                                        data-name="minus" />
                                                                </g>
                                                            </svg><svg viewBox="0 0 24 24" class="plus internal-menu-plus">
                                                                <path
                                                                    d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" />
                                                            </svg>
                                                            </a>


                                                        @foreach (GetsubchildMenusFront($gets[0]->menu_id, $S->id, $C->id) as $k => $D)
                                                            <ul>
                                                                @if ($D->external == 'yes')
                                                                    <li><a href="{{ url($D->url) }}"
                                                                            onclick="return confirm('Are you sure  external window open?')"
                                                                            target="_blank">
                                                                            @if (GetLang() == 'en')
                                                                                {{ $D->name ?? '' }}
                                                                            @else
                                                                                {{ $D->name_h ?? '' }}
                                                                            @endif
                                                                        </a>
                                                                    </li>
                                                                @elseif($D->external == 'no')
                                                                    <li><a href="{{ url($D->url) }}">
                                                                            @if (GetLang() == 'en')
                                                                                {{ $D->name ?? '' }}
                                                                            @else
                                                                                {{ $D->name_h ?? '' }}
                                                                            @endif
                                                                        </a>
                                                                    </li>
                                                                @else
                                                                    <li><a
                                                                            href={{ url($mmenu[0]->slug . '/' . $S->slug . '/' . $C->slug . '/' . $D->slug) }}>
                                                                            @if (GetLang() == 'en')
                                                                                {{ $D->name ?? '' }}
                                                                            @else
                                                                                {{ $D->name_h ?? '' }}
                                                                            @endif
                                                                        </a></li>
                                                                @endif
                                                            </ul>
                                                        @endforeach
                                                    </li>


                                    </li>
                                @else
                                    @if ($C->external == 'yes')
                                        <li><a href="{{ url($C->url) }}"
                                                onclick="return confirm('Are you sure  external window open?')"
                                                target="_blank">
                                                @if (GetLang() == 'en')
                                                    {{ $C->name ?? '' }}
                                                @else
                                                    {{ $C->name_h ?? '' }}
                                                @endif
                                            </a>
                                        </li>
                                    @elseif($C->external == 'no')
                                        <li><a href="{{ url($C->url) }}">
                                                @if (GetLang() == 'en')
                                                    {{ $C->name ?? '' }}
                                                @else
                                                    {{ $C->name_h ?? '' }}
                                                @endif
                                            </a>
                                        </li>
                                    @else
                                        <li><a href={{ url($mmenu[0]->slug . '/' . $S->slug . '/' . $C->slug) }}>
                                                @if (GetLang() == 'en')
                                                    {{ $C->name ?? '' }}
                                                @else
                                                    {{ $C->name_h ?? '' }}
                                                @endif
                                            </a></li>
                                    @endif
                                @endif
                        @endforeach
                        </ul>

                        </li>
                    @else
                        @if ($S->external == 'yes')
                            <li><a href="{{ url($S->url) }}"
                                    onclick="return confirm('Are you sure  external window open?')" target="_blank">
                                    @if (GetLang() == 'en')
                                        {{ $S->name ?? '' }}
                                    @else
                                        {{ $S->name_h ?? '' }}
                                    @endif
                                </a></li>
                        @elseif($S->external == 'no')
                            <li><a href="{{ url($S->url) }}">
                                    @if (GetLang() == 'en')
                                        {{ $S->name ?? '' }}
                                    @else
                                        {{ $S->name_h ?? '' }}
                                    @endif
                                </a></li>
                        @else
                            <li><a href="{{ url($mmenu[0]->slug . '/' . $S->slug) }}"
                                    @if ($S->id == $get[0]->id) class="active" @endif>
                                    @if (GetLang() == 'en')
                                        {{ $S->name ?? '' }}
                                    @else
                                        {{ $S->name_h ?? '' }}
                                    @endif
                                </a></li>
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




                  <a href="javascript:void(0)" class="btn2 margin_bottom"> @if(GetLang()=='en') {{ $type[0]->name ?? '' }}  @else {{ $type[0]->name_h ?? '' }}  @endif</a><br>

                        <div class="profilewithinfo mb-0">

                            <div class="row">

                                @foreach ($item as $items)

                                @if(($items->department) == '6')

                                <div class="col-md-5 col-lg-4 ">

                                    <a href="{{ url($items->slug)}}">

                                    <div class="profilewraper withinfo addevent-box">

                                        <figure>

                                            @if ($items->image != '')
                                            <img src="{{asset('uploads/organisation/'.$items->image)}}"  alt="{{ $items->title ?? '' }}" title="{{ $items->title ?? '' }}">
                                            @else
                                            <img src="{{ asset('admin/images/faces/default.jpg') }}">
                                            @endif

                                        </figure>

                                        <h4> @if(GetLang()=='en') {{ $items->title  ?? ''}}  @else {{ $items->title_h  ?? ''}}  @endif</h4>

                                        <p> @if(GetLang()=='en') {{ $items->designation ?? '' }}  @else {{ $items->designation_h ?? '' }}  @endif</p>

                                    </div>



                                     </a>

                                </div>

                                @endif

                                @endforeach

                            </div>

                        </div>

                        {{$item->links('pagination::bootstrap-5')}}

                    </div>

                </div>

                @endif

            </div>

        </div>

    </section>


    {{------------------------------------------- Sub menu page content-------------------------------------------------------  --}}

   @elseif(isset($sub_menu))

   <section class="withsidebar-wrap ptb-60">

    <div class="container">

        <div class="row">


            <div class="col-md-3">

                <div class="sidebarwraper">

                    @foreach (GetSubMenusFront($type[0]->menu_id) as $key1 => $S)
                        <ul>
                            @if (count(GetchildMenusFront($type[0]->menu_id, $S->id)) > 0)
                                <li class="hasnested"><a @if ($S->id == $type[0]->id) class="active" @endif>
                                        @if (GetLang() == 'en')
                                            {{ $S->name ?? '' }}
                                        @else
                                            {{ $S->name_h ?? '' }}
                                        @endif
                                        <svg class="minus" viewBox="0 0 24 24">
                                            <g data-name="Layer 2">
                                                <path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z"
                                                    data-name="minus" />
                                            </g>
                                        </svg><svg viewBox="0 0 24 24" class="plus">
                                            <path
                                                d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" />
                                        </svg>
                                    </a>

                                    {{-- child menu --}}
                                    <ul>
                                        @foreach (GetchildMenusFront($type[0]->menu_id, $S->id) as $key2 => $C)
                                            @if (count(GetsubchildMenusFront($type[0]->menu_id, $S->id, $C->id)) > 0)
                                                <li class="hasnested">
                                                    <a @if ($C->id == $type[0]->id) class="active" @endif>
                                                        @if (GetLang() == 'en')
                                                            {{ $C->name ?? '' }}
                                                        @else
                                                            {{ $C->name_h ?? '' }}
                                                        @endif

                                                        <svg class="minus internal-menu-minus" viewBox="0 0 24 24">
                                                            <g data-name="Layer 2">
                                                                <path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z"
                                                                    data-name="minus" />
                                                            </g>
                                                        </svg><svg viewBox="0 0 24 24" class="plus internal-menu-plus">
                                                            <path
                                                                d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" />
                                                        </svg>
                                                        </a>
                                                    <ul>
                                                    @foreach (GetsubchildMenusFront($type[0]->menu_id, $S->id, $C->id) as $k => $D)

                                                            @if ($D->external == 'yes')
                                                                <li><a href="{{ url($D->url) }}"
                                                                        onclick="return confirm('Are you sure  external window open?')"
                                                                        target="_blank">
                                                                        @if (GetLang() == 'en')
                                                                            {{ $D->name ?? '' }}
                                                                        @else
                                                                            {{ $D->name_h ?? '' }}
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                            @elseif($D->external == 'no')
                                                                <li><a href="{{ url($D->url) }}">
                                                                        @if (GetLang() == 'en')
                                                                            {{ $D->name ?? '' }}
                                                                        @else
                                                                            {{ $D->name_h ?? '' }}
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li><a
                                                                        href={{ url($mmenu[0]->slug . '/' . $S->slug . '/' . $C->slug . '/' . $D->slug) }}>
                                                                        @if (GetLang() == 'en')
                                                                            {{ $D->name ?? '' }}
                                                                        @else
                                                                            {{ $D->name_h ?? '' }}
                                                                        @endif
                                                                    </a></li>
                                                            @endif

                                                    @endforeach
                                                </ul>
                                                </li>


                                </li>
                            @else
                                @if ($C->external == 'yes')
                                    <li><a href="{{ url($C->url) }}"
                                            onclick="return confirm('Are you sure  external window open?')"
                                            target="_blank">
                                            @if (GetLang() == 'en')
                                                {{ $C->name ?? '' }}
                                            @else
                                                {{ $C->name_h ?? '' }}
                                            @endif
                                        </a>
                                    </li>
                                @elseif($C->external == 'no')
                                    <li><a href="{{ url($C->url) }}">
                                            @if (GetLang() == 'en')
                                                {{ $C->name ?? '' }}
                                            @else
                                                {{ $C->name_h ?? '' }}
                                            @endif
                                        </a>
                                    </li>
                                @else
                                    <li><a href={{ url($mmenu[0]->slug . '/' . $S->slug . '/' . $C->slug) }}>
                                            @if (GetLang() == 'en')
                                                {{ $C->name ?? '' }}
                                            @else
                                                {{ $C->name_h ?? '' }}
                                            @endif
                                        </a></li>
                                @endif
                            @endif
                    @endforeach
                    </ul>

                    </li>
                @else
                    @if ($S->external == 'yes')
                        <li><a href="{{ url($S->url) }}"
                                onclick="return confirm('Are you sure  external window open?')" target="_blank">
                                @if (GetLang() == 'en')
                                    {{ $S->name ?? '' }}
                                @else
                                    {{ $S->name_h ?? '' }}
                                @endif
                            </a></li>
                    @elseif($S->external == 'no')
                        <li><a href="{{ url($S->url) }}">
                                @if (GetLang() == 'en')
                                    {{ $S->name ?? '' }}
                                @else
                                    {{ $S->name_h ?? '' }}
                                @endif
                            </a></li>
                    @else
                        <li><a href="{{ url($mmenu[0]->slug . '/' . $S->slug) }}"
                                @if ($S->id == $type[0]->id) class="active" @endif>
                                @if (GetLang() == 'en')
                                    {{ $S->name ?? '' }}
                                @else
                                    {{ $S->name_h ?? '' }}
                                @endif
                            </a></li>
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

                <div class="row mb-4">
                    <div class="col-md-6">
                        <form role="form" method="get" action="{{ url('/faculty/faculty-directory') }}" id="frmtypes">

                            @csrf

                             <select name="dp" class="form-control" onchange="javascript:$('#frmtypes').submit();" style="padding:10px 15px 9px ">

                                <option value="">Filter Deparment </option>

                                @foreach($departments as $k=>$v)

                                   <option value="{{$v->id}}"  {{ ( $v->id == request('dp') ) ? 'selected' : '' }} >{{$v->dept_name}}</option>

                                @endforeach

                             </select>

                        </form>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ url('/faculty/faculty-directory') }}" method="get">
                            <div class="d-flex">

                              <input type="text" class="form-control" placeholder="search name or deparment!!!!" value="{{ request('search') ??''}} " name="search">

                                <button type="submit" class="btn-info submit-btn-apply">Apply</button>

                            </div>
                        </form>
                    </div>
                </div

              <a href="javascript:void(0)" class="btn2 margin_bottom"> @if(GetLang()=='en') {{ $type[0]->name ?? '' }}  @else {{ $type[0]->name_h ?? '' }}  @endif</a><br>


                    <div class="profilewithinfo mb-0">

                        <div class="row">

                            @foreach ($item as $items)

                            @if(($items->department) == '6')

                            <div class="col-md-5 col-lg-4 ">

                                <a  href="{{ url(@$mmenu[0]->slug.'/'.$type[0]->slug.'/'.$items->slug) }}" >

                                <div class="profilewraper withinfo addevent-box">

                                    <figure>

                                        @if ($items->image != '')
                                        <img src="{{asset('uploads/organisation/'.$items->image)}}"  alt="{{ $items->title ?? '' }}" title="{{ $items->title ?? '' }}">
                                        @else
                                        <img src="{{ asset('admin/images/faces/default.jpg') }}">
                                        @endif

                                    </figure>

                                    <h4> @if(GetLang()=='en') {{ $items->title  ?? ''}}  @else {{ $items->title_h  ?? ''}}  @endif</h4>

                                    <p> @if(GetLang()=='en') {{ $items->designation ?? '' }}  @else {{ $items->designation_h ?? '' }}  @endif</p>
                                    <p> @if(GetLang()=='en')  @if(isset($items->id))   <?php echo get_dept_name($items->id); ?> @endif @endif</p>
                                </div>



                                 </a>

                            </div>



                            @endif

                            @endforeach




                        </div>




                    </div>

                    {{$item->links('pagination::bootstrap-5')}}


                </div>

            </div>

            @endif

        </div>

    </div>

</section>

@else


    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

            </div>


            @if (collect($item)->isEmpty())
                {{-- remember that $contact is your variable --}}

                <div class="alert alert-success" role="alert">

                    <h4 class="alert-heading">something went wrong </h4>

                    <p>Data Not Found</p>



                </div>
            @else
                <div class="col-md-12">

                    <div class="innerpagecontent">

                        <a href="javascript:void(0)" class="btn2 margin_bottom">
                            @if (GetLang() == 'en')
                                {{ $type[0]->name ?? '' }}
                            @else
                                {{ $type[0]->name_h ?? '' }}
                            @endif
                        </a>
                        <br>

                        <div class="profilewithinfo mb-0">

                            <div class="row">

                                @foreach ($item as $items)
                                    @if ($items->department == '6')
                                        <div class="col-md-5 col-lg-4 ">

                                            <a href="{{ url($items->slug) }}">

                                                <div class="profilewraper withinfo addevent-box">

                                                    <figure><img src="{{ asset('uploads/organisation/' . $items->image) }}"
                                                            alt="{{ $items->title ?? '' }}"
                                                            title="{{ $items->title ?? '' }}"></figure>

                                                    <h4>
                                                        @if (GetLang() == 'en')
                                                            {{ $items->title ?? '' }}
                                                        @else
                                                            {{ $items->title_h ?? '' }}
                                                        @endif
                                                    </h4>
                                                    <p>
                                                        @if (GetLang() == 'en')
                                                            {{ $items->designation ?? '' }}
                                                        @else
                                                            {{ $items->designation_h ?? '' }}
                                                        @endif
                                                    </p>

                                                </div>



                                            </a>

                                        </div>
                                    @endif
                                @endforeach

                            </div>

                        </div>

                        {{ $item->links('pagination::bootstrap-5') }}

                    </div>

                </div>
            @endif

        </div>

        </div>

    </section>

 @endif

@endsection





