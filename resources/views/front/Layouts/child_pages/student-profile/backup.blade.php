@extends('front.Layouts.master')

@section('content')
<style>
    .txt_formate
    {
        font-size: 16px;
        font-weight:600;
    }
</style>
    @php
        $mmenu = @content_menus($type[0]->menu_id);
    @endphp


    {{-- banner and  breadcrumbs   --}}

    @if (isset($sub_menu))

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
                                {{ $item[0]->title ?? '' }}
                            @else
                                {{ $item[0]->tittle_h ?? '' }}
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

                    <li><a href="javascript:void(0)">
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
                                <a href="javascript:void(0);">
                                    <span>
                                Academics
                            </span></a></li>
                            <li> <a href="javascript:void(0);"><span>
                                Doctoral Programme
                            </span><a></li>


                            <li><a href="{{  URL::previous()  }}"><span>
                                Student Profiles
                            </span></a></li>


                        <li><span>
                            @if (GetLang() == 'en')
                                {{ $item[0]->name ?? '' }} {{ $item[0]->last_name ?? '' }}
                            @else
                                {{ $item[0]->title_h ?? '' }}
                            @endif
                        </span></li>


                </ul>
            </div>
        </div>
    @endif



    @if (isset($sub_menu))


    <section class="content-section ptb-60">

        <div class="container ">

            <div class="content-main row">

                <div class="col-md-3">

                    <div class="sidebarwraper">


                        @if (@isset($gets))

                            @foreach (GetSubMenusFront($gets[0]->menu_id) as $key1 => $S)
                                <ul>

                                    @if (count(GetchildMenusFront($gets[0]->menu_id, $S->id)) > 0)
                                        <li class="hasnested"><a
                                                @if ($S->id == $gets[0]->id) class="active" @endif>
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

                                            <ul>

                                                @foreach (GetchildMenusFront($gets[0]->menu_id, $S->id) as $key2 => $C)
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
                                                        <li><a
                                                                href={{ url($mmenu[0]->slug . '/' . $S->slug . '/' . $C->slug) }}>
                                                                @if (GetLang() == 'en')
                                                                    {{ $C->name ?? '' }}
                                                                @else
                                                                    {{ $C->name_h ?? '' }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>

                                        </li>
                                    @else
                                        @if ($S->external == 'yes')
                                            <li><a href="{{ url($S->url) }}"
                                                    onclick="return confirm('Are you sure  external window open?')"
                                                    target="_blank">
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

                        @endisset


                </div>



            </div>

            <div class="col-md-9">
                <div class="content-desc">
                    <div class="innerpagecon">
                        <a href="#" class="btn2">{{ $item[0]->designation ?? '' }}</a>
                        @foreach ($item as $items)
                            <div class="row mt-4">

                                <div class="col-lg-3 col-xl-3 col-md-3">

                                    <div class=" top text-center mt-0">
                                        <div class="profile-img">

                                            @if ($items->image != '')
                                            <img src="{{ asset('uploads/organisation/'.$items->image) }}"
                                            alt="{{ $items->title }}">
                                              @else
                                            <img src="{{ asset('admin/images/faces/default.jpg') }}">
                                            @endif

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
                                                        onclick="return confirm('Are you sure  external window open?')"
                                                        target="_blank">
                                                        <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->instagram != '')
                                                    <a href="{{ url($item[0]->instagram) }}"
                                                        alt="{{ $item[0]->Instagram_title }}"
                                                        title="{{ $item[0]->Instagram_title }}"
                                                        onclick="return confirm('Are you sure  external window open?')"
                                                        target="_blank">
                                                        <i class="fa fa-instagram fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->Facebook != '')
                                                    <a href="{{ url($item[0]->Facebook) }}"
                                                        alt="{{ $item[0]->Facebook_title }}"
                                                        title="{{ $item[0]->Facebook_title }}"
                                                        onclick="return confirm('Are you sure  external window open?')"
                                                        target="_blank">
                                                        <i class="fa fa-facebook fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->linkedin != '')
                                                    <a href="{{ url($item[0]->linkedin) }}"
                                                        alt="{{ $item[0]->linkedIn_title }}"
                                                        title="{{ $item[0]->linkedIn_title }}"
                                                        onclick="return confirm('Are you sure  external window open?')"
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
                                        role="tab"
                                        aria-controls="profile-tab-pane">{{ $datas->Title }}</button>
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




    @elseif(isset($sub_menu))


        <section class="content-section ptb-60">

            <div class="container ">

                <div class="content-main row">

                    <div class="col-md-3">

                        <div class="sidebarwraper">


                            @if (@isset($gets))

                                @foreach (GetSubMenusFront($gets[0]->menu_id) as $key1 => $S)
                                    <ul>

                                        @if (count(GetchildMenusFront($gets[0]->menu_id, $S->id)) > 0)
                                            <li class="hasnested"><a
                                                    @if ($S->id == $gets[0]->id) class="active" @endif>
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

                                                <ul>

                                                    @foreach (GetchildMenusFront($gets[0]->menu_id, $S->id) as $key2 => $C)
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
                                                            <li><a
                                                                    href={{ url($mmenu[0]->slug . '/' . $S->slug . '/' . $C->slug) }}>
                                                                    @if (GetLang() == 'en')
                                                                        {{ $C->name ?? '' }}
                                                                    @else
                                                                        {{ $C->name_h ?? '' }}
                                                                    @endif
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach

                                                </ul>

                                            </li>
                                        @else
                                            @if ($S->external == 'yes')
                                                <li><a href="{{ url($S->url) }}"
                                                        onclick="return confirm('Are you sure  external window open?')"
                                                        target="_blank">
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

                            @endisset


                    </div>



                </div>


                <div class="col-md-9">
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
                                                            onclick="return confirm('Are you sure  external window open?')"
                                                            target="_blank">
                                                            <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                                aria-hidden="true"></i>
                                                        </a>&nbsp;
                                                    @endif

                                                    @if ($item[0]->instagram != '')
                                                        <a href="{{ url($item[0]->instagram) }}"
                                                            alt="{{ $item[0]->Instagram_title }}"
                                                            title="{{ $item[0]->Instagram_title }}"
                                                            onclick="return confirm('Are you sure  external window open?')"
                                                            target="_blank">
                                                            <i class="fa fa-instagram fa-2x" class="w3-xxlarge"
                                                                aria-hidden="true"></i>
                                                        </a>&nbsp;
                                                    @endif

                                                    @if ($item[0]->Facebook != '')
                                                        <a href="{{ url($item[0]->Facebook) }}"
                                                            alt="{{ $item[0]->Facebook_title }}"
                                                            title="{{ $item[0]->Facebook_title }}"
                                                            onclick="return confirm('Are you sure  external window open?')"
                                                            target="_blank">
                                                            <i class="fa fa-facebook fa-2x" class="w3-xxlarge"
                                                                aria-hidden="true"></i>
                                                        </a>&nbsp;
                                                    @endif

                                                    @if ($item[0]->linkedin != '')
                                                        <a href="{{ url($item[0]->linkedin) }}"
                                                            alt="{{ $item[0]->linkedIn_title }}"
                                                            title="{{ $item[0]->linkedIn_title }}"
                                                            onclick="return confirm('Are you sure  external window open?')"
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

                                @foreach ($item as $key => $datas)
                                    {{-- {{ $key }} --}}
                                    <li class="nav-item " role="presentation">
                                        <button
                                            @if ($key == '0') class="nav-link active"  @else  class="nav-link" @endif
                                            id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile-tab-pane{{ $key }}" type="button"
                                            role="tab"
                                            aria-controls="profile-tab-pane">{{ $datas->name }}</button>
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



    @else{{-- main menu --}}

    <section class="content-section ptb-60">

        <div class="container ">

            <div class="content-main row">

            <div class="col-md-12">
                <div class="content-desc">
                    <div class="innerpagecon">
                        <a href="#" class="btn2">{{ $item[0]->name ?? '' }} {{ $item[0]->last_name ?? '' }}</a>
                        @foreach ($item as $items)
                            <div class="row mt-4">

                                <div class="col-lg-4 col-xl-4 col-md-4">

                                    <div class=" top text-center image-box-border mt-0">
                                        <div class="profile-img">
                                            <img src="{{ asset('uploads/' . $items->student_image) }}"
                                                alt="{{ $items->title }}">
                                        </div>

                                        <h6>{{ $items->area_specialization }} </h6>




                                        <?php
                                            $email_address = $item[0]->email;
                                            $str = $email_address;
                                            $var = str_replace('@', '[at]', $str);
                                            $email = str_replace('.', '[dot]', $var);
                                        ?>


                                   <span>  {{ $email }} </span> <br>
                                   <span> {{$item[0]->contact}} </span>

                                        <div class="social-icon">
                                        <ul>
                                            <li>
                                                @if ($item[0]->twitter != '')
                                                    <a href="{{ url($item[0]->twitter) }}"
                                                        alt="{{ $item[0]->Twitter_title }}"
                                                        title="{{ $item[0]->Twitter_title }}"
                                                        onclick="return confirm('Are you sure  external window open?')"
                                                        target="_blank">
                                                        <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->instagram != '')
                                                    <a href="{{ url($item[0]->instagram) }}"
                                                        alt="{{ $item[0]->Instagram_title }}"
                                                        title="{{ $item[0]->Instagram_title }}"
                                                        onclick="return confirm('Are you sure  external window open?')"
                                                        target="_blank">
                                                        <i class="fa fa-instagram fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->Facebook != '')
                                                    <a href="{{ url($item[0]->Facebook) }}"
                                                        alt="{{ $item[0]->Facebook_title }}"
                                                        title="{{ $item[0]->Facebook_title }}"
                                                        onclick="return confirm('Are you sure  external window open?')"
                                                        target="_blank">
                                                        <i class="fa fa-facebook fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->linkedin != '')
                                                    <a href="{{ url($item[0]->linkedin) }}"
                                                        alt="{{ $item[0]->linkedIn_title }}"
                                                        title="{{ $item[0]->linkedIn_title }}"
                                                        onclick="return confirm('Are you sure  external window open?')"
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




                    </div>


                    <div class="col-xl-8 col-md-8 col-lg-12">



                    <div class="import-dates">
                        <div class="title"></div>
                        <div class="import-main">
                            <div class="import-left"></div>
                            <div class="import-right"></div>
                        </div>
                    </div>
                    <div class="tab-section">
                        <ul class="nav nav-tabs d-none d-lg-flex" id="myTab" role="tablist">

                            @foreach ($item as $key => $datas)
                                {{-- {{ $key }} --}}
                                <li class="nav-item " role="presentation">
                                    <button
                                        @if ($key == '0') class="nav-link active"  @else  class="nav-link" @endif
                                        id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane{{ $key }}" type="button"
                                        role="tab"
                                        aria-controls="profile-tab-pane"><!-- {{ $datas->Title }} -->  Profile</button>
                                </li>
                            @endforeach
                        </ul>

                        @foreach ($item as $key => $datas)
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

                                               <!--  <p>{!! $datas->about !!}</p> -->
                                                <div class="container">
                                                    {{-- <div class="row">
                                                        <div class="col-sm-6">
                                                            <P class="h6 txt_formate"  >Email:  </P> <P> {{$datas->email}}</P>

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <P class="h6 txt_formate"  >Contact No:  </P> <P> {{$datas->contact}}</P>

                                                        </div>



                                                    </div><hr>


                                                    </div>
                                                    <hr> --}}


                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <P class="h6 txt_formate"  >About Me:  </P> <P> {{$datas->about}}</P>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <P class="h6 txt_formate"  >Area Specialization: </P> <P> {{$datas->area_specialization}}</P>

                                                        </div>
                                                        <div class="col-sm-12">
                                                            <P class="h6 txt_formate"  >Educational Background: </P> <P> {!! $datas->educational_background !!}</P>

                                                        </div>
                                                        <div class="col-sm-12">
                                                            <P class="h6 txt_formate"  >Work Experience: </P> <P> {!! $datas->work_experience !!}</P>

                                                        </div>

                                                        <div class="col-sm-12">
                                                            <P class="h6 txt_formate"  >Research Interests: </P> <P> {!! $datas->research_interests !!}</P>

                                                        </div><div class="col-sm-12">
                                                            <P class="h6 txt_formate"  >Papers and Publications: </P> <P> {!! $datas->papers_publications !!}</P>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            </div>
</section>


@endif

@endsection
