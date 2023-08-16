@extends('front.Layouts.master')

@section('content')


    @php
        $mmenu = @content_menus($type[0]->menu_id);
    @endphp

    {{-- banner and breadcrumbs --}}

    @if (isset($get))
        {{-- child menu section --}}
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
            {{-- @if (GetOrganisationAllDetails('default_banner_image') != '')
                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                    alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
            @else
                <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? '' }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                    alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
            @endif --}}



            @if ($item[0]->bannerimage != '')
                <img src="{{ asset('page/banner/' . $item[0]->bannerimage) ?? '' }}"
                    alt="{{ $item[0]->banner_alt ?? '' }}" title="{{ $item[0]->banner_title ?? '' }}">
            @else
                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    alt="{{ $item[0]->name ?? '' }}" title="{{ $item[0]->name ?? '' }}">
            @endif

            <div class="imagecaption">
                <div class="container">
                    <h1>{{ $item[0]->title ?? '' }}</h1>
                </div>
            </div>
        </div>

        {{-- breadcrumbs section --}}
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
                            <a href="{{ URL::previous() }}">
                                @if (GetLang() == 'en')
                                    Students Corner
                                @else
                                    Students Corner
                                @endif
                        </span>
                        </a>
                    </li>

                    <li>
                        <span>
                            <a href="{{ URL::previous() }}">
                                @if (GetLang() == 'en')
                                    Club, Committee and Cells
                                @else
                                    Club, Committee and Cells
                                @endif
                        </span>
                        </a>
                    </li>

                    <li>
                        <span>
                            <a href="{{ URL::previous() }}">
                                @if (GetLang() == 'en')
                                    {{ $cccbreadcram }}
                                @else
                                    {{ $cccbreadcram }}
                                @endif
                        </span>
                        </a>
                    </li>


                    <li>
                        <span>
                            @if (GetLang() == 'en')
                                {{ ucfirst(strtolower($item[0]->title)) ?? '' }}
                            @else
                                {{ $item[0]->title_h ?? '' }}
                                {{ ucfirst(strtolower($item[0]->title)) ?? '' }}
                            @endif
                        </span>


                    </li>
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
                                                                </svg><svg viewBox="0 0 24 24"
                                                                    class="plus internal-menu-plus">
                                                                    <path
                                                                        d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" />
                                                                </svg>
                                                            </a>
                                                            <ul>
                                                                @foreach (GetsubchildMenusFront($gets[0]->menu_id, $S->id, $C->id) as $k => $D)
                                                                    @if ($D->external == 'yes')
                                                                        <li><a href="{{ url($D->url) }}"
                                                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
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
                                    @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank">
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

    <div class="col master-class">
        <div class="innerpagecontent">

            <!-- Heading section Start -->
            <h3>
                <span>
                    @if (GetLang() == 'en')
                        {{ $type[0]->name ?? '' }}
                    @else
                        {{ $type[0]->name_h ?? '' }}
                    @endif
                </span>
            </h3>
            <!-- Heading section End -->

            <!-- Content section  start-->
            <h5>
                <span>About Details</span>
            </h5>

            <p> </p>

            <!-- Chairpersons -->

            <h5>
                Chairperson
            </h5>

            <div class="row mt-4 mb-5">
                <div class="col-md-3">
                    <div class="top text-center mt-0">
                        <div class="profile-img img-fac">
                            <img src="http://localhost/kashipur-design1/public/uploads/organisation/167903612045.jpg"
                                alt="A VENKATARAMAN" loading="lazy" class="mb-0">
                            <div class="d-flex justify-content-center">
                                <div class="top-text mb-0 p-relative"> A Venkata Raman </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="designation">
                        <h4>Assistant Professor Organizational Behavior</h6>
                            <h6>Economics</h6>
                            <h6>7900444090</h6>
                            <h6>av.raman@iimkashipur.ac.in</h6>
                    </div>
                </div>
            </div>

            <!-- Photo Gallery Section Start -->
            <h5>
                <span> Members</span>
            </h5>
            <div class="excellence-wrap back-img Activities gallery-member img-gallery mb-3 mt-4">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 p-0">
                            <div class="excellence-gallery partnership-img">
                                <div class="row masonry-grid">

                                    <div class="col-md-2 col-lg-2">
                                        <div class="d-flex flex-column h-100">
                                            <a href="http://localhost/kashipur-design1/public/gallery/image/1677405700.png"
                                                class="image-link">
                                                <div class="thumbnail p-relative">
                                                    <img src="http://localhost/kashipur-design1/public/gallery/image/1677405700.png"
                                                        alt="gallery-img" class="img-fluid" loading="lazy">
                                                    <div class="top-text"> Event 1 </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2">
                                        <div class="d-flex flex-column h-100">
                                            <a href="http://localhost/kashipur-design1/public/gallery/image/1677405680.png"
                                                class="image-link">
                                                <div class="thumbnail p-relative">
                                                    <img src="http://localhost/kashipur-design1/public/gallery/image/1677405680.png"
                                                        alt="gallery-img" class="img-fluid" loading="lazy">
                                                    <div class="top-text">Event 2
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="col-md-2 col-lg-2">
                                        <div class="d-flex flex-column h-100">
                                            <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                class="image-link">
                                                <div class="thumbnail p-relative">
                                                    <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                        alt="gallery-img" class="img-fluid" loading="lazy">
                                                    <div class="top-text">Event 3</div>

                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2">
                                        <div class="d-flex flex-column h-100">
                                            <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                class="image-link">
                                                <div class="thumbnail p-relative">
                                                    <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                        alt="gallery-img" class="img-fluid" loading="lazy">
                                                    <div class="top-text">Event 3</div>

                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2">
                                        <div class="d-flex flex-column h-100">
                                            <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                class="image-link">
                                                <div class="thumbnail p-relative">
                                                    <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                        alt="gallery-img" class="img-fluid" loading="lazy">
                                                    <div class="top-text">Event 3</div>

                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2">
                                        <div class="d-flex flex-column h-100">
                                            <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                class="image-link">
                                                <div class="thumbnail p-relative">
                                                    <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                        alt="gallery-img" class="img-fluid" loading="lazy">
                                                    <div class="top-text">Event 3</div>

                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2">
                                        <div class="d-flex flex-column h-100">
                                            <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                class="image-link">
                                                <div class="thumbnail p-relative">
                                                    <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                        alt="gallery-img" class="img-fluid" loading="lazy">
                                                    <div class="top-text">Event 3</div>

                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2">
                                        <div class="d-flex flex-column h-100">
                                            <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                class="image-link">
                                                <div class="thumbnail p-relative">
                                                    <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                        alt="gallery-img" class="img-fluid" loading="lazy">
                                                    <div class="top-text">Event 3</div>

                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Photo Gallery section End -->

            <!-- Event section start  -->
            <h5>
                <span>Events</span>
            </h5>

            <p>Our wide network of Alumni has been the flag bearers of the IIM Kashipur brand, successfully
                establishing a professional network across industries.</p>

            <div class="excellence-wrap event-text mb-3 mt-4">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-box">
                                <div class="text-b">
                                    <p>
                                        A.V. Raman earned his PhD in the sociology of work, organisations
                                        and Industrial Relations from the University of Warwick, Coventry UK
                                        in 2013. He has an MPhil degree in Sociology with a distinction and
                                        a First Class MA respectively from the University of Hyderabad
                                        India, before his PhD. Subsequently, he has taught previously in
                                        XLRI and at IIM Kashipur from 2016.
                                    </p>
                                </div>
                                <div class="top-text"> Event 1 </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-box">
                                <div class="text-b">
                                    <p>
                                        A.V. Raman earned his PhD in the sociology of work, organisations
                                        and Industrial Relations from the University of Warwick, Coventry UK
                                        in 2013. He has an MPhil degree in Sociology with a distinction and
                                        a First Class MA respectively from the University of Hyderabad
                                        India, before his PhD. Subsequently, he has taught previously in
                                        XLRI and at IIM Kashipur from 2016.
                                    </p>
                                </div>
                                <div class="top-text"> Event 2 </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-box">
                                <div class="text-b">
                                    <p>
                                        A.V. Raman earned his PhD in the sociology of work, organisations
                                        and Industrial Relations from the University of Warwick, Coventry UK
                                        in 2013. He has an MPhil degree in Sociology with a distinction and
                                        a First Class MA respectively from the University of Hyderabad
                                        India, before his PhD. Subsequently, he has taught previously in
                                        XLRI and at IIM Kashipur from 2016.
                                    </p>
                                </div>
                                <div class="top-text"> Event 3 </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-box">
                                <div class="text-b">
                                    <p>
                                        A.V. Raman earned his PhD in the sociology of work, organisations
                                        and Industrial Relations from the University of Warwick, Coventry UK
                                        in 2013. He has an MPhil degree in Sociology with a distinction and
                                        a First Class MA respectively from the University of Hyderabad
                                        India, before his PhD. Subsequently, he has taught previously in
                                        XLRI and at IIM Kashipur from 2016.
                                    </p>
                                    <p>
                                        A.V. Raman earned his PhD in the sociology of work, organisations
                                        and Industrial Relations from the University of Warwick, Coventry UK
                                        in 2013. He has an MPhil degree in Sociology with a distinction and
                                        a First Class MA respectively from the University of Hyderabad
                                        India, before his PhD. Subsequently, he has taught previously in
                                        XLRI and at IIM Kashipur from 2016.
                                    </p>
                                </div>
                                <div class="top-text"> Event 4 </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event section end -->

            <h5>
                <span>Events Images</span>
            </h5>

            <div class="excellence-wrap event-text mb-3 mt-4">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="multi-image-popup">
                                <a href="#gallery-1" class="btn-gallery">
                                    <img src="https://iim.staggings.in/uploads/header_top/168690759793.jpg" />
                                </a>
                            </div>

                            <!-- Multiple Image Popup -->
                            <div id="gallery-1" class="hidden">
                                <a
                                    href="https://images.unsplash.com/photo-1462774603919-1d8087e62cad?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=0ebd884b4d6ac379f42146a2b26fbf2e">Image
                                    1</a>
                                <a
                                    href="https://images.unsplash.com/photo-1460499593944-39e14f96a8c6?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=d8bc3d45d5eeaaf4f576665707f4fddb">Image
                                    2</a>
                                <a
                                    href="https://images.unsplash.com/photo-1434434319959-1f886517e1fe?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=218dfdd2c0735dbd6ca0f718064a748b">Image
                                    3</a>
                                <a
                                    href="https://images.unsplash.com/photo-1431576901776-e539bd916ba2?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=a0941b28175909ca62f096eb533b0c97">Image
                                    4</a>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="multi-image-popup">
                                <a href="#gallery-2" class="btn-gallery">
                                    <img src="https://iim.staggings.in/uploads/header_top/168690671648.jpg" />
                                </a>
                            </div>

                            <!-- Multiple Image Popup -->
                            <div id="gallery-2" class="hidden">
                                <a
                                    href="https://images.unsplash.com/photo-1434434319959-1f886517e1fe?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=218dfdd2c0735dbd6ca0f718064a748b">Image
                                    3</a>
                                <a
                                    href="https://images.unsplash.com/photo-1431576901776-e539bd916ba2?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=a0941b28175909ca62f096eb533b0c97">Image
                                    4</a>
                                <a
                                    href="https://images.unsplash.com/photo-1462774603919-1d8087e62cad?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=0ebd884b4d6ac379f42146a2b26fbf2e">Image
                                    1</a>
                                <a
                                    href="https://images.unsplash.com/photo-1460499593944-39e14f96a8c6?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=d8bc3d45d5eeaaf4f576665707f4fddb">Image
                                    2</a>
                                <a
                                    href="https://images.unsplash.com/photo-1434434319959-1f886517e1fe?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=218dfdd2c0735dbd6ca0f718064a748b">Image
                                    3</a>
                                <a
                                    href="https://images.unsplash.com/photo-1431576901776-e539bd916ba2?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=a0941b28175909ca62f096eb533b0c97">Image
                                    4</a>
                                <a
                                    href="https://images.unsplash.com/photo-1462774603919-1d8087e62cad?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=0ebd884b4d6ac379f42146a2b26fbf2e">Image
                                    1</a>
                                <a
                                    href="https://images.unsplash.com/photo-1460499593944-39e14f96a8c6?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=d8bc3d45d5eeaaf4f576665707f4fddb">Image
                                    2</a>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </section>

    {{-- ------------------------------------------sub menu content-------------------------------------------------------- --}}
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
                                                            </svg><svg viewBox="0 0 24 24"
                                                                class="plus internal-menu-plus">
                                                                <path
                                                                    d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z" />
                                                            </svg>
                                                        </a>
                                                        <ul>
                                                            @foreach (GetsubchildMenusFront($type[0]->menu_id, $S->id, $C->id) as $k => $D)
                                                                @if ($D->external == 'yes')
                                                                    <li><a href="{{ url($D->url) }}"
                                                                        @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
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
                                @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank">
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


                <div class="col master-class">
                    <div class="innerpagecontent">

                        <!-- Heading section Start -->
                        <h3>
                            <span>
                                @if (GetLang() == 'en')
                                    {{ $type[0]->name ?? '' }}
                                @else
                                    {{ $type[0]->name_h ?? '' }}
                                @endif
                            </span>
                        </h3>
                        <!-- Heading section End -->

                        <!-- Content section  start-->
                        <h5>
                            <span>About Details</span>
                        </h5>

                        <p> </p>

                        <!-- Chairpersons -->

                        <h5>
                            Chairperson
                        </h5>

                        <div class="row mt-4 mb-5">
                            <div class="col-md-3">
                                <div class="top text-center mt-0">
                                    <div class="profile-img img-fac">
                                        <img src="http://localhost/kashipur-design1/public/uploads/organisation/167903612045.jpg"
                                            alt="A VENKATARAMAN" loading="lazy" class="mb-0">
                                        <div class="d-flex justify-content-center">
                                            <div class="top-text mb-0 p-relative"> A Venkata Raman </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-9">
                                <div class="designation">
                                    <h4>Assistant Professor Organizational Behavior</h6>
                                        <h6>Economics</h6>
                                        <h6>7900444090</h6>
                                        <h6>av.raman@iimkashipur.ac.in</h6>
                                </div>
                            </div>
                        </div>

                        <!-- Photo Gallery Section Start -->
                        <h5>
                            <span> Members</span>
                        </h5>
                        <div class="excellence-wrap back-img Activities gallery-member img-gallery mb-3 mt-4">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-12 p-0">
                                        <div class="excellence-gallery partnership-img">
                                            <div class="row masonry-grid">

                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">
                                                        <a href="http://localhost/kashipur-design1/public/gallery/image/1677405700.png"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="http://localhost/kashipur-design1/public/gallery/image/1677405700.png"
                                                                    alt="gallery-img" class="img-fluid" loading="lazy">
                                                                <div class="top-text"> Event 1 </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">
                                                        <a href="http://localhost/kashipur-design1/public/gallery/image/1677405680.png"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="http://localhost/kashipur-design1/public/gallery/image/1677405680.png"
                                                                    alt="gallery-img" class="img-fluid" loading="lazy">
                                                                <div class="top-text">Event 2
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>


                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">
                                                        <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                                    alt="gallery-img" class="img-fluid" loading="lazy">
                                                                <div class="top-text">Event 3</div>

                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">
                                                        <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                                    alt="gallery-img" class="img-fluid" loading="lazy">
                                                                <div class="top-text">Event 3</div>

                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">
                                                        <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                                    alt="gallery-img" class="img-fluid" loading="lazy">
                                                                <div class="top-text">Event 3</div>

                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">
                                                        <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                                    alt="gallery-img" class="img-fluid" loading="lazy">
                                                                <div class="top-text">Event 3</div>

                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">
                                                        <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                                    alt="gallery-img" class="img-fluid" loading="lazy">
                                                                <div class="top-text">Event 3</div>

                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">
                                                        <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                                    alt="gallery-img" class="img-fluid" loading="lazy">
                                                                <div class="top-text">Event 3</div>

                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Photo Gallery section End -->

                        <!-- Event section start  -->
                        <h5>
                            <span>Events</span>
                        </h5>

                        <p>Our wide network of Alumni has been the flag bearers of the IIM Kashipur brand, successfully
                            establishing a professional network across industries.</p>

                        <div class="excellence-wrap event-text mb-3 mt-4">
                            <div class="container p-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-box">
                                            <div class="text-b">
                                                <p>
                                                    A.V. Raman earned his PhD in the sociology of work, organisations
                                                    and Industrial Relations from the University of Warwick, Coventry UK
                                                    in 2013. He has an MPhil degree in Sociology with a distinction and
                                                    a First Class MA respectively from the University of Hyderabad
                                                    India, before his PhD. Subsequently, he has taught previously in
                                                    XLRI and at IIM Kashipur from 2016.
                                                </p>
                                            </div>
                                            <div class="top-text"> Event 1 </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="text-box">
                                            <div class="text-b">
                                                <p>
                                                    A.V. Raman earned his PhD in the sociology of work, organisations
                                                    and Industrial Relations from the University of Warwick, Coventry UK
                                                    in 2013. He has an MPhil degree in Sociology with a distinction and
                                                    a First Class MA respectively from the University of Hyderabad
                                                    India, before his PhD. Subsequently, he has taught previously in
                                                    XLRI and at IIM Kashipur from 2016.
                                                </p>
                                            </div>
                                            <div class="top-text"> Event 2 </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="text-box">
                                            <div class="text-b">
                                                <p>
                                                    A.V. Raman earned his PhD in the sociology of work, organisations
                                                    and Industrial Relations from the University of Warwick, Coventry UK
                                                    in 2013. He has an MPhil degree in Sociology with a distinction and
                                                    a First Class MA respectively from the University of Hyderabad
                                                    India, before his PhD. Subsequently, he has taught previously in
                                                    XLRI and at IIM Kashipur from 2016.
                                                </p>
                                            </div>
                                            <div class="top-text"> Event 3 </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="text-box">
                                            <div class="text-b">
                                                <p>
                                                    A.V. Raman earned his PhD in the sociology of work, organisations
                                                    and Industrial Relations from the University of Warwick, Coventry UK
                                                    in 2013. He has an MPhil degree in Sociology with a distinction and
                                                    a First Class MA respectively from the University of Hyderabad
                                                    India, before his PhD. Subsequently, he has taught previously in
                                                    XLRI and at IIM Kashipur from 2016.
                                                </p>
                                                <p>
                                                    A.V. Raman earned his PhD in the sociology of work, organisations
                                                    and Industrial Relations from the University of Warwick, Coventry UK
                                                    in 2013. He has an MPhil degree in Sociology with a distinction and
                                                    a First Class MA respectively from the University of Hyderabad
                                                    India, before his PhD. Subsequently, he has taught previously in
                                                    XLRI and at IIM Kashipur from 2016.
                                                </p>
                                            </div>
                                            <div class="top-text"> Event 4 </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Event section end -->

                        <h5>
                            <span>Events Images</span>
                        </h5>

                        <div class="excellence-wrap event-text mb-3 mt-4">
                            <div class="container p-0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="multi-image-popup">
                                            <a href="#gallery-1" class="btn-gallery">
                                                <img src="https://iim.staggings.in/uploads/header_top/168690759793.jpg" />
                                            </a>
                                        </div>

                                        <!-- Multiple Image Popup -->
                                        <div id="gallery-1" class="hidden">
                                            <a
                                                href="https://images.unsplash.com/photo-1462774603919-1d8087e62cad?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=0ebd884b4d6ac379f42146a2b26fbf2e">Image
                                                1</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1460499593944-39e14f96a8c6?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=d8bc3d45d5eeaaf4f576665707f4fddb">Image
                                                2</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1434434319959-1f886517e1fe?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=218dfdd2c0735dbd6ca0f718064a748b">Image
                                                3</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1431576901776-e539bd916ba2?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=a0941b28175909ca62f096eb533b0c97">Image
                                                4</a>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="multi-image-popup">
                                            <a href="#gallery-2" class="btn-gallery">
                                                <img src="https://iim.staggings.in/uploads/header_top/168690671648.jpg" />
                                            </a>
                                        </div>

                                        <!-- Multiple Image Popup -->
                                        <div id="gallery-2" class="hidden">
                                            <a
                                                href="https://images.unsplash.com/photo-1434434319959-1f886517e1fe?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=218dfdd2c0735dbd6ca0f718064a748b">Image
                                                3</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1431576901776-e539bd916ba2?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=a0941b28175909ca62f096eb533b0c97">Image
                                                4</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1462774603919-1d8087e62cad?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=0ebd884b4d6ac379f42146a2b26fbf2e">Image
                                                1</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1460499593944-39e14f96a8c6?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=d8bc3d45d5eeaaf4f576665707f4fddb">Image
                                                2</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1434434319959-1f886517e1fe?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=218dfdd2c0735dbd6ca0f718064a748b">Image
                                                3</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1431576901776-e539bd916ba2?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=a0941b28175909ca62f096eb533b0c97">Image
                                                4</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1462774603919-1d8087e62cad?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=0ebd884b4d6ac379f42146a2b26fbf2e">Image
                                                1</a>
                                            <a
                                                href="https://images.unsplash.com/photo-1460499593944-39e14f96a8c6?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=d8bc3d45d5eeaaf4f576665707f4fddb">Image
                                                2</a>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@else
    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                {{-- <div class="col-md-3">

                    <div class="sidebarwraper">

{{--
                        @foreach (GetSubMenusFront($type[0]->menu_id) as $key1 => $S)

                        <ul>

                            @if (count(GetchildMenusFront($type[0]->menu_id, $S->id)) > 0)

                            <li class="hasnested"><a @if ($S->id == $type[0]->id) class="active" @endif> @if (GetLang() == 'en') {{ $S->name ?? '' }} @else {{ $S->name_h ?? '' }} @endif<svg class="minus" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus"/></g></svg><svg viewBox="0 0 24 24" class="plus"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg></a>

                                <ul>

                                    @foreach (GetchildMenusFront($type[0]->menu_id, $S->id) as $key2 => $C)

                                        @if ($C->external == 'yes')
                                            <li><a href="{{url($C->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank" > @if (GetLang() == 'en') {{ $C->name ?? ''}} @else {{ $C->name_h ?? ''}} @endif</a></li>

                                         @elseif($C->external=='no')

                                         <li><a href="{{url($C->url)}}"  > @if (GetLang() == 'en') {{ $C->name ?? ''}} @else {{ $C->name_h ?? ''}} @endif</a></li>


                                         @else
                                            <li><a href={{url($mmenu[0]->slug."/".$S->slug."/".$C->slug)}}>  @if (GetLang() == 'en') {{ $C->name ?? ''}} @else {{ $C->name_h ?? ''}} @endif</a></li>
                                         @endif

                                     @endforeach

                                </ul>

                            </li>

                            @else

                                    @if ($S->external == 'yes')
                                        <li><a href="{{ url($S->url) }}" onclick="return confirm('Are you sure  external window open?')" target="_blank">  @if (GetLang() == 'en') {{ $S->name ?? ''}} @else {{ $S->name_h ?? ''}} @endif </a></li>

                                    @elseif($S->external=='no')

                                        <li><a href="{{ url($S->url) }}" >  @if (GetLang() == 'en') {{ $S->name ?? ''}} @else {{ $S->name_h ?? ''}} @endif </a></li>

                                    @else

                                    <li><a href="{{ url($mmenu[0]->slug."/".$S->slug) }}" @if ($S->id == $type[0]->id) class="active" @endif>  @if (GetLang() == 'en') {{ $S->name ?? ''}} @else {{ $S->name_h ?? ''}} @endif  </a></li>

                                    @endif


                            @endif





                        </ul>



                       @endforeach

                    </div>
                </div> --}}

                <div class="col master-class">
                    <div class="innerpagecontent">

                        <!-- Heading section Start -->
                        <h3>
                            <span>
                                @if (GetLang() == 'en')
                                    {{ $item[0]->title ?? '' }}
                                @else
                                    {{ $item[0]->title_h ?? '' }}
                                @endif
                            </span>
                        </h3>
                        <!-- Heading section End -->

                        <!-- Content section  start-->

                        <h5>
                            <span>About Details</span>
                        </h5>

                        <p>{!! $item[0]->about_details ?? '' !!}</p>

                        <!-- Chairpersons -->





                        @if(count($chairperson) > 0 )



                        <h5>
                           <span>  Chairperson </span>
                        </h5>

                        <div class="row mt-4 mb-5">
                            <div class="col-md-3">
                                <div class="top text-center mt-0">
                                    <div class="profile-img img-fac">
                                        <img src="{{ asset('uploads/organisation/' . $chairperson[0]->image) }}"
                                            alt="A VENKATARAMAN" loading="lazy" class="mb-0">
                                        <div class="d-flex justify-content-center">
                                            <div class="top-text mb-0 p-relative"> {{ $chairperson[0]->title ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="designation">
                                    <h4>{{ $chairperson[0]->designation ?? '' }} </h6>
                                        <h6>{{ $chairperson[0]->title ?? '' }} </h6>
                                        <h6>{{ $chairperson[0]->phone ?? '' }} </h6>



                                        <?php
                                        $email_address = $chairperson[0]->email;
                                        $str = $email_address;
                                        $var = str_replace('@', '[at]', $str);
                                        $email = str_replace('.', '[dot]', $var);
                                        ?>


                                        <h6>{{ $email ?? '' }} </h6>
                                </div>
                            </div>
                        </div>

                        @endif

                        <!-- Photo Gallery Section Start -->

                        @if (count($chairpersons) > 0)
                            <h5>
                                <span> Members</span>

                            </h5>
                            <div class="excellence-wrap back-img Activities gallery-member img-gallery mb-3 mt-4">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-12 p-0">
                                            <div class="excellence-gallery partnership-img">
                                                <div class="row masonry-grid">
                                                    @foreach ($chairpersons as $value)
                                                        <div class="col-md-2 col-lg-2">
                                                            <div class="d-flex flex-column h-100">

                                                                <a href="{{ asset('uploads/organisation/' . $value->image) ?? '' }}"
                                                                    class="image-link">
                                                                    <div class="thumbnail p-relative text-center">
                                                                        <img src="{{ asset('uploads/organisation/' . $value->image) ?? '' }}"
                                                                            alt="gallery-img" class="img-fluid"
                                                                            loading="lazy">
                                                                        <div class="top-text">{{ $value->title }}
                                                                        </div>

                                                                    </div>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- Photo Gallery section End -->

                        @if ($item[0]->activitie != '')
                            <h5>
                                <span>Activity</span>
                            </h5>

                            <p>{!! $item[0]->activitie ?? '' !!}</p>
                        @endif


                        @if ($item[0]->event != '')
                            <!-- Event section start  -->
                            <h5>
                                <span>Events</span>
                            </h5>

                            <p>{!! $item[0]->event ?? '' !!}</p>
                        @endif

                        <div class="excellence-wrap event-text mb-3 mt-4">
                            <div class="container p-0">
                                <div class="row">

                                    @foreach ($data as $datas)
                                        @if ($datas->event != '')
                                            <div class="col-md-4">
                                                <div class="text-box">
                                                    <div class="text-b">
                                                        <p>
                                                            {!! $datas->event !!}
                                                        </p>

                                                    </div>
                                                    <div class="top-text"> {{ $datas->image_title ?? '' }} </div>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- Event section end -->

                        @if (count($data) > 0)
                            <h5>
                                <span>Events Images</span>
                            </h5>

                            <div class="excellence-wrap event-text mb-3 mt-4">
                                <div class="container p-0">
                                    <div class="row">




                                        <!-- Multiple Image Popup -->
                                        <div id="gallery-1" class="hidden">
                                            @foreach ($data as $k=>$datas)
                                            <a href="{{ asset('uploads/multiple/club/' . $datas->image) ?? '' }}"></a>
                                            @endforeach
                                        </div>




                                        @foreach ($data as $k=>$datas)
                                        @if($k == '1')
                                            <div class="col-md-3">

                                                <div class="multi-image-popup p-relative">
                                                    <a href="#gallery-1" class="btn-gallery multi-card">
                                                        <div class="card1"></div>
                                                        <div class="card3"></div>
                                                        <div class="card4"></div>
                                                        <div class="card5"></div>
                                                        <img src="{{ asset('uploads/multiple/club/' . $datas->image) ?? '' }}" />
                                                    </a>
                                                </div>



                                            </div>
                                            @endif
                                        @endforeach


                                    </div>
                                </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        </div>
        </div>
    </section>



    @endif

    <script>
        $(document).ready(function() {

            $('.image-link').magnificPopup({

                type: 'image',

                mainClass: 'mfp-with-zoom',

                gallery: {

                    enabled: true

                },



                zoom: {

                    enabled: true,



                    duration: 300, // duration of the effect, in milliseconds

                    easing: 'ease-in-out', // CSS transition easing function



                    opener: function(openerElement) {



                        return openerElement.is('img') ? openerElement : openerElement.find('img');

                    }

                }



            });


$('a.btn-gallery').on('click', function(event) {
    event.preventDefault();

    var gallery = $(this).attr('href');

    $(gallery).magnificPopup({
  delegate: 'a',
        type:'image',
        gallery: {
            enabled: true
        }
    }).magnificPopup('open');
});

});



    </script>

@endsection
