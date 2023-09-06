@extends('front.Layouts.master')


<style>
    .social-icon i {
        margin-top: 10px;
        margin-bottom: 15px;
    }

    @media (max-width: 767.8px) {
        ul.nav.nav-tabs {
            display: block;
            gap: 20px;
            overflow-x: clip !important;
            flex-wrap: wrap !important;
        }
    }
</style>

@section('content')

    @php
        $mmenu = @content_menus($type[0]->menu_id);
    @endphp


    {{-- banner and  breadcrumbs   --}}

    @if (isset($get))

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

                                {{ ucfirst(strtolower($item[0]->title)) ?? '' }}
                            @else

                                {{ ucfirst(strtolower($item[0]->tittle_h)) ?? '' }}
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


                    @if (URL::previous() == url('/faculty/academic-areas/communications'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Communications</span></a></li>
                    @elseif(URL::previous() == url('/faculty/academic-areas/economics'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Economics</span></a></li>
                    @elseif(URL::previous() == url('/faculty/academic-areas/finance-and-accounting'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Fnance and Fccounting</span></a></li>
                    @elseif(URL::previous() == url('/faculty/academic-areas/information-technology-systems'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Information Technology Systems</span></a></li>
                    @elseif(URL::previous() == url('faculty/academic-areas/marketing'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Marketing</span></a></li>
                    @elseif(URL::previous() == url('/faculty/academic-areas/operations-management-decision-sciences'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Operations Management Decision Sciences</span></a></li>
                    @elseif(URL::previous() == url('/organisational-behaviour-human-resource-management'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Organisational Behaviour Human Resource
                                    Management</span></a></li>
                    @elseif(URL::previous() == url('/organisational-behaviour-human-resource-management'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Organisational Behaviour Human Resource
                                    Management</span></a></li>
                    @elseif(URL::previous() == url('/faculty/academic-areas/strategy'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Strategy</span></a></li>

                    @elseif(URL::previous() == url('/faculty/academic-areas/strategy'))
                        <li><a href="{{ url('/') }}"><span>Academics</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>MBA (Analytics)</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>MBA (Analytics) Testimonials</span></a></li>

                    @elseif(URL::previous() == url('/faculty/academic-areas/strategy'))
                        <li><a href="{{ url('/') }}"><span>Faculty</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Academic Areas</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>Strategy</span></a></li>

                    @elseif(URL::previous() == url('academics/mba/mba-testimonial'))
                        <li><a href="{{ url('/') }}"><span>Academics</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>MBA</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>MBA Testimonial</span></a></li>
                    @elseif(URL::previous() == url('academics/mba-analytics/mba-analytics-testimonials'))
                        <li><a href="{{ url('/') }}"><span>Academics</span></a></li>
                        <li><a href="{{ URL::previous() }}"><span>MBA Analytics</span></a></li>
                         <li><a href="{{ URL::previous() }}"><span>MBA Analytics Testimonials</span></a></li>


                    @endif

                    <li><span>
                            @if (GetLang() == 'en')

                                {{ ucfirst(strtolower($item[0]->title)) ?? '' }}
                            @else

                                {{ ucfirst(strtolower($item[0]->title_h)) ?? '' }}
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
                                                                    @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
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
                                                        @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
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
                            <a href="#" class="btn2">{{ $item[0]->title ?? '' }}</a>
                            @foreach ($item as $items)
                                <div class="row mt-4">

                                    <div class="col-lg-3 col-xl-3 col-md-3">

                                        <div class=" top text-center mt-0 image-box-border">
                                            <div class="profile-img">

                                                @if ($items->image != '')
                                                    <img src="{{ asset('uploads/organisation/' . $items->image) }}"
                                                        alt="{{ $items->title ?? '' }}"
                                                        title="{{ $items->title ?? '' }}">
                                                @else
                                                    <img src="{{ asset('admin/images/faces/default.jpg') }}">
                                                @endif

                                            </div>

                                            <h6>{{ $items->designation }}</h6>

                                        </div>
                                    </div>



                                    <div class="col-xl-9 col-md-9 col-lg-12">
                                        {{-- <p>{{ $items->department  }}</p> --}}
                                        {{-- <p>{!! $items->description !!} </p> --}}


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

                                                    @if ($item[0]->orcid != '')
                                                        <a href="{{ url($item[0]->orcid) }}"
                                                            alt="{{ $item[0]->orcid_title }}"
                                                            title="{{ $item[0]->orcid_title }}"
                                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                            target="_blank">
                                                            <i class="fa fa-orcid fa-2x" class="w3-xxlarge"
                                                                aria-hidden="true"></i>
                                                        </a>&nbsp;
                                                    @endif

                                                    @if ($item[0]->webofscience != '')
                                                        <a href="{{ url($item[0]->webofscience) }}"
                                                            alt="{{ $item[0]->webofscience_title }}"
                                                            title="{{ $item[0]->webofscience_title }}"
                                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                            target="_blank">
                                                            <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                                aria-hidden="true"></i>
                                                        </a>&nbsp;
                                                    @endif

                                                    @if ($item[0]->scopus != '')
                                                        <a href="{{ url($item[0]->scopus) }}"
                                                            alt="{{ $item[0]->scopus_title }}"
                                                            title="{{ $item[0]->scopus_title }}"
                                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                            target="_blank">
                                                            <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                                aria-hidden="true"></i>
                                                        </a>&nbsp;
                                                    @endif

                                                    @if ($item[0]->scholar != '')
                                                        <a href="{{ url($item[0]->scholar) }}"
                                                            alt="{{ $item[0]->scholar_title }}"
                                                            title="{{ $item[0]->scholar_title }}"
                                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                            target="_blank">
                                                            <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                                aria-hidden="true"></i>
                                                        </a>&nbsp;
                                                    @endif

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
                            <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">

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

                                        <div id="collapseTwo" class="accordion-collapse collapse d-block"
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
                                                                @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
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
                                                    @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
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

                        <a href="#" class="btn2">{{ ucfirst(strtolower($item[0]->title)) ?? '' }}</a>
                        @foreach ($item as $items)
                            <div class="row mt-4">

                                <div class="col-lg-4 col-xl-4 col-md-4">

                                    <div class=" top text-center mt-0 image-box-border">
                                        <div class="profile-img">

                                            @if ($items->image != '')
                                                <img src="{{ asset('uploads/organisation/' . $items->image) }}"
                                                    alt="{{ $items->title ?? '' }}"
                                                    title="{{ $items->title ?? '' }}">
                                            @else
                                                <img src="{{ asset('admin/images/faces/default.jpg') }}">
                                            @endif
                                        </div>

                                        <h6>{{ $items->designation }}</h6>

                                    </div>
                                </div>



                                <div class="col-xl-8 col-md-8 col-lg-8">
                                    {{-- <p>{{ $items->department  }}</p> --}}
                                    {{-- <p>{!! $items->description !!} </p> --}}


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

                                                @if ($item[0]->orcid != '')
                                                    <a href="{{ url($item[0]->orcid) }}"
                                                        alt="{{ $item[0]->orcid_title }}"
                                                        title="{{ $item[0]->orcid_title }}"
                                                        @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                        target="_blank">
                                                        <i class="fa fa-orcid fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->webofscience != '')
                                                    <a href="{{ url($item[0]->webofscience) }}"
                                                        alt="{{ $item[0]->webofscience_title }}"
                                                        title="{{ $item[0]->webofscience_title }}"
                                                        @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                        target="_blank">
                                                        <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->scopus != '')
                                                    <a href="{{ url($item[0]->scopus) }}"
                                                        alt="{{ $item[0]->scopus_title }}"
                                                        title="{{ $item[0]->scopus_title }}"
                                                        @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                        target="_blank">
                                                        <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

                                                @if ($item[0]->scholar != '')
                                                    <a href="{{ url($item[0]->scholar) }}"
                                                        alt="{{ $item[0]->scholar_title }}"
                                                        title="{{ $item[0]->scholar_title }}"
                                                        @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                        target="_blank">
                                                        <i class="fa fa-twitter fa-2x" class="w3-xxlarge"
                                                            aria-hidden="true"></i>
                                                    </a>&nbsp;
                                                @endif

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
                        <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">

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

                                    <div id="collapseTwo" class="accordion-collapse collapse d-block"
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
                        <a href="#" class="btn2">{{ ucfirst(strtolower($item[0]->title)) ?? '' }}</a>
                        {{-- <a href="#" class="btn2"><i class="fa fa-angle-left" aria-hidden="true" style="margin-right: 5px;"></i> Back</a> --}}
                        @foreach ($item as $items)
                            <div class="row mt-4">

                                <div class="col-lg-4 col-xl-4 col-md-4">

                                    <div class=" top text-center mt-0 image-box-border">
                                        <div class="profile-img">

                                            @if ($items->image != '')
                                                <img src="{{ asset('uploads/organisation/' . $items->image) }}"
                                                    alt="{{ $items->title ?? '' }}"
                                                    title="{{ $items->title ?? '' }}">
                                            @else
                                                <img src="{{ asset('admin/images/faces/default.jpg') }}">
                                            @endif
                                        </div>


                                        <h6> {{ $items->designation ?? '' }} </h6>

                                        <span>
                                            @if (GetLang() == 'en')
                                                {{ $items->more_designation ?? '' }}
                                            @else
                                                {{ $items->more_designation ?? '' }}
                                            @endif
                                        </span><br>

                                        <p> @if(GetLang()=='en')  @if(isset($items->id))   <?php echo get_dept_name($items->id); ?> @endif @endif</p>

                                        <span>{{ $items->phone ?? '' }}</span><br>
                                        <span>{{ $items->extension ?? '' }}</span>

                                        <?php
                                        $email_address = $items->email;
                                        $str = $email_address;
                                        $var = str_replace('@', '[at]', $str);
                                        $email = str_replace('.', '[dot]', $var);
                                        ?>
                                        <br><span> {{ $email ?? '' }} </span>

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


                                                    @if ($item[0]->orcid != '')
                                                        <a href="{{ url($item[0]->orcid) }}"
                                                            alt="{{ $item[0]->orcid_title }}"
                                                            title="{{ $item[0]->orcid_title }}"
                                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                            target="_blank">
                                                            <img src="{{ asset('icon/orcid.png') }}">
                                                        </a>&nbsp;
                                                    @endif

                                                    @if ($item[0]->webofscience != '')
                                                        <a href="{{ url($item[0]->webofscience) }}"
                                                            alt="{{ $item[0]->webofscience_title }}"
                                                            title="{{ $item[0]->webofscience_title }}"
                                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                            target="_blank">
                                                            <img src="{{ asset('icon/publon.png') }}">
                                                        </a>&nbsp;
                                                    @endif

                                                    @if ($item[0]->scopus != '')
                                                        <a href="{{ url($item[0]->scopus) }}"
                                                            alt="{{ $item[0]->scopus_title }}"
                                                            title="{{ $item[0]->scopus_title }}"
                                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                            target="_blank">
                                                            <img src="{{ asset('icon/scopus.png') }}">
                                                        </a>&nbsp;
                                                    @endif

                                                    @if ($item[0]->scholar != '')
                                                        <a href="{{ url($item[0]->scholar) }}"
                                                            alt="{{ $item[0]->scholar_title }}"
                                                            title="{{ $item[0]->scholar_title }}"
                                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                            target="_blank">
                                                            <img src="{{ asset('icon/google_scholers.png') }}">
                                                        </a>&nbsp;
                                                    @endif

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                        @endforeach
                    </div>

                    <div class="col-xl-8 col-md-8 col-lg-8">

                        <div class="import-dates">
                            <div class="title"></div>
                            <div class="import-main">
                                <div class="import-left"></div>
                                <div class="import-right"></div>
                            </div>
                        </div>
                        <div class="tab-section">
                            <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">

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
                                <div class="tab-content accordion master-class" id="myTabContent">
                                    <div @if ($key == '0') class="tab-pane fade accordion-item active show"  @else  class="tab-pane fade accordion-item" @endif
                                        id="profile-tab-pane{{ $key }}" role="tabpanel"
                                        aria-labelledby="profile-tab" tabindex="0">

                                        <div id="collapseTwo" class="accordion-collapse collapse d-block"
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

            </div>
</section>


@endif

@endsection
