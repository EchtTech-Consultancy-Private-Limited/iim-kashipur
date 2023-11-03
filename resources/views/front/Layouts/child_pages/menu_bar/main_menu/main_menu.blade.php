@extends('front.Layouts.master')

@section('content')

    <script>
        const BASE_URL = window.location.origin;
    </script>
    @isset($type)
        @php
            $mmenu = @content_menus($type[0]->menu_id);
        @endphp
    @endisset

    @isset($get)
        @php
            $mmenu = @content_menus($get[0]->id);
        @endphp
    @endisset


    @isset($subchildmenu)
        @php
            $mmenu = @content_menus($menu[0]->id);
        @endphp
    @endisset

    {{-- banner and  breadcrumbs   --}}


    @if (isset($subchildmenu))
        {{-- super child menu section  --}}

        {{-- banner setion --}}
        <div class="internalpagebanner">
            @if (GetOrganisationAllDetails('default_banner_image') != '')
                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;" alt="{{ $type[0]->name ?? '' }}"
                    title="{{ $type[0]->name ?? '' }}">
            @else
                <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? '' }}"
                    style="height:auto;  min-height:200px; max-height:350% overflow:hidden;" alt="{{ $type[0]->name ?? '' }}"
                    title="{{ $type[0]->name ?? '' }}">
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


        {{-- breadcrumbs setion --}}
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/') }}"><svg viewBox="0 0 24 24">
                                <path fill="none" d="M0 0h24v24H0V0z" />
                                <path
                                    d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                            </svg></a></li>
                    <li><a href="javascript:void(0);">
                            @if (GetLang() == 'en')
                                {{ $mmenu[0]->name ?? '' }}
                            @else
                                {{ $mmenu[0]->name_h ?? '' }}
                            @endif
                        </a>

                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span>
                                @if (GetLang() == 'en')
                                    {{ $sub[0]->name ?? '' }}
                                @else
                                    {{ $sub[0]->name_h ?? '' }}
                                @endif
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span>
                                @if (GetLang() == 'en')
                                    {{ $child[0]->name ?? '' }}
                                @else
                                    {{ $child[0]->name_h ?? '' }}
                                @endif
                            </span>
                        </a>
                    </li>

                    <li>

                        <span>
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


        </ul>
        </div>
        </div>
    @elseif (isset($get))
        {{-- child menu section  --}}
        {{-- banner setion --}}
        <div class="internalpagebanner">

            @if ($item[0]->banner_image != '')
                <img src="{{ asset('page/banner/' . $item[0]->banner_image) ?? '' }}"
                    alt="{{ $item[0]->banner_alt ?? '' }}" title="{{ $item[0]->banner_title ?? '' }}">
            @else
                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    alt="{{ $item[0]->name ?? '' }}" title="{{ $item[0]->name ?? '' }}">
            @endif

            {{--
            @if ($item[0]->banner_image != '')

              <img src="{{ asset('page/banner/' . $item[0]->banner_image) ?? '' }}"
                alt="{{ $item[0]->banner_alt ?? '' }}" title="{{ $item[0]->banner_title ?? '' }}">

            @else

            <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
               alt="{{ $item[0]->name ?? '' }}" title="{{ $item[0]->name ?? '' }}">

            @endif --}}



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
                    <li><a href="{{ url('/') }}"><svg viewBox="0 0 24 24">
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
                    <li>
                        <a href="javascript:void(0);">
                            <span>
                                @if (GetLang() == 'en')
                                    {{ $gets[0]->name ?? '' }}
                                @else
                                    {{ $gets[0]->name_h ?? '' }}
                                @endif
                            </span>
                        </a>
                    </li>
                    <li>

                        <span>
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


        {{-- banner Section --}}

        <div class="internalpagebanner">

            @if ($item[0]->banner_image != '')
                <img src="{{ asset('page/banner/' . $item[0]->banner_image) ?? '' }}"
                    alt="{{ $item[0]->banner_alt ?? '' }}" title="{{ $item[0]->banner_title ?? '' }}">
            @else
                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    alt="{{ $item[0]->name ?? '' }}" title="{{ $item[0]->name ?? '' }}">
            @endif

            <div class="imagecaption">
                <div class="container">
                    <h1>
                        @if (GetLang() == 'en')
                            {{ $item[0]->name ?? '' }}
                        @else
                            {{ $item[0]->name_h ?? '' }}
                        @endif
                    </h1>
                </div>
            </div>
        </div>


        {{-- breadcrumbs Section --}}
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/') }}"><svg viewBox="0 0 24 24">
                                <path fill="none" d="M0 0h24v24H0V0z" />
                                <path
                                    d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                            </svg></a></li>
                    <li><a href="javascript:void(0);">
                            @if (GetLang() == 'en')
                                {{ @$mmenu[0]->name ?? '' }}
                            @else
                                {{ @$mmenu[0]->name_h ?? '' }}
                            @endif
                        </a>
                    </li>

                    <li>

                        <span>
                            @if (GetLang() == 'en')
                                {{ ucfirst(strtolower($item[0]->name)) ?? '' }}
                            @else
                                {{ ucfirst(strtolower($item[0]->name_h)) ?? '' }}
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

                    <li><a href="{{ URL::previous() }}">
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




    {{-- ------------------------------------------------ content setion  --------------------------------------------------- --}}



    @if (isset($subchildmenu))
        {{-- superhild value --}}
        <section class="withsidebar-wrap ptb-60">
            <div class="container">
                <div class="row">

                    <div class="col-md-3">

                        <div class="sidebarwraper">

                            @foreach (GetSubMenusFront($type[0]->menu_id) as $key1 => $S)
                                <ul>

                                    @if (count(GetchildMenusFront($type[0]->menu_id, $S->id)) > 0)
                                        <li class="hasnested @if ($S->id == $sub[0]->id) opened @endif">
                                            <a @if ($S->id == $type[0]->id) class="active" @endif
                                                href="javascript:void();">
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
                                                        <li
                                                            class="hasnested @if ($C->id == $child[0]->id) opened @endif">
                                                            <a @if ($C->id == $type[0]->id) class="active" @endif
                                                                href="javascript:void();">
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
                                                                        <li>


                                                                            <a href={{ url($mmenu[0]->slug . '/' . $S->slug . '/' . $C->slug . '/' . $D->slug) }}
                                                                                class="@if ($D->id == $type[0]->id) active-sub @endif">
                                                                                @if (GetLang() == 'en')
                                                                                    {{ $D->name ?? '' }}
                                                                                @else
                                                                                    {{ $D->name_h ?? '' }}
                                                                                @endif
                                                                            </a>
                                                                        </li>
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
                                        @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                        @if (GetLang() == 'en') {{ $S->name ?? '' }}
                                        @else
                                            {{ $S->name_h ?? '' }} @endif
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
                <h3><span>
                        @if (GetLang() == 'en')
                            {{ $item[0]->name ?? '' }}
                        @else
                            {{ $item[0]->name_h ?? '' }}
                        @endif
                    </span>
                </h3>
                @if ($item[0]->cover_image != '' && $item[0]->cover_image != 'default.jpg')
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class=" top text-center mt-0">
                                <div class="profile-img">
                                    <img src="{{ asset('page/image/' . $item[0]->cover_image ?? '') }}"
                                        alt="{{ $item[0]->cover_alt ?? '' }}" title="{{ $item[0]->cover_title ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div>

                            <div class="col-md-7 col-lg-8">
                                <p>
                                    @if (GetLang() == 'en')
                                        {!! $item[0]->content !!}
                                    @else
                                        {!! $item[0]->content_h !!}
                                    @endif
                                </p>
                            </div>
                        @else
                            <div class="commontxt">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <p>
                                            @if (GetLang() == 'en')
                                                {!! $item[0]->content !!}
                                            @else
                                                {!! $item[0]->content_h !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                @endif
            </div>
        </div>
    @endif
    </div>

    @if ($item[0]->video_url != '')
        <div class="col-md-8 mx-auto">

            <iframe width="100%" height="315" src="{{ $item[0]->video_url ?? '' }}"
                title="{{ url($item[0]->video_title) ?? '' }}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>

        </div>
    @endif
    </div>
    </section>
@elseif (isset($get))
    {{-- -----------------------------child menu content setion------------------------------------------------------------------------------ --}}

    <section class="withsidebar-wrap ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebarwraper">

                        @foreach (GetSubMenusFront($gets[0]->menu_id) as $key1 => $S)
                            <ul>


                                @if (count(GetchildMenusFront($gets[0]->menu_id, $S->id)) > 0)
                                    <li class="hasnested @if ($S->id == $gets[0]->id) opened @endif">
                                        <a @if ($S->id == $gets[0]->id) class="active" @endif
                                            href="javascript:void();">
                                            @if (GetLang() == 'en')
                                                {{ $S->name ?? '' }}
                                            @else
                                                {{ $S->name_h ?? '' }}
                                            @endif
                                            <svg class="minus" viewBox="0 0 24 24">
                                                <g data-name="Layer 2">
                                                    <path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus" />
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
                                        <li><a href={{ url($get[0]->slug . '/' . $S->slug . '/' . $C->slug) }}
                                                class="@if ($C->id == $type_child[0]->id) active-sub @endif">
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
                            <h3><span>
                                    @if (GetLang() == 'en')
                                        {{ $item[0]->name ?? '' }}
                                    @else
                                        {{ $item[0]->name_h ?? '' }}
                                    @endif
                                </span>
                            </h3>



                            @isset($membersList)
                                <div class="row">

                                    @foreach ($membersList as $membersLists)
                                        <div class="col-md-4 col-lg-4 mb-2">



                                            <a href="{{ url($membersLists->slug) }}">

                                                <a
                                                    href="{{ url(@$mmenu[0]->slug . '/' . $gets[0]->slug . '/' . $type_sub[0]->slug . '/' . $membersLists->slug) }}">

                                                    <div class="profilewraper withinfo addevent-box">

                                                        <figure>
                                                            <img src="{{ asset('uploads/organisation/' . $membersLists->image) }}"
                                                                alt="{{ $membersLists->title ?? '' }}"
                                                                title="{{ $membersLists->title ?? '' }}">
                                                        </figure>
                                                        <div class="text-scroll">
                                                            <h4>
                                                                @if (GetLang() == 'en')
                                                                    {{ $membersLists->title ?? '' }}
                                                                @else
                                                                    {{ $membersLists->title_h ?? '' }}
                                                                @endif
                                                            </h4>

                                                            <p>
                                                                @if (GetLang() == 'en')
                                                                    {{ $membersLists->designation ?? '' }}
                                                                @else
                                                                    {{ $membersLists->designation_h ?? '' }}
                                                                @endif
                                                            </p>

                                                            <p>
                                                                @if (GetLang() == 'en')
                                                                    {{ $membersLists->more_designation ?? '' }}
                                                                @else
                                                                    {{ $membersLists->more_designation ?? '' }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                </a>

                                        </div>



                                </div>
                    @endforeach

                </div>
            @endisset


            @if ($item[0]->cover_image != '' && $item[0]->cover_image != 'default.jpg')
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class=" top text-center mt-0">
                            <div class="profile-img">
                                <img src="{{ asset('page/image/' . $item[0]->cover_image ?? '') }}"
                                    alt="{{ $item[0]->cover_alt ?? '' }}" title="{{ $item[0]->cover_title ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div>

                        <div class="col-md-7 col-lg-8">
                            <p>
                                @if (GetLang() == 'en')
                                    {!! $item[0]->content !!}
                                @else
                                    {!! $item[0]->content_h !!}
                                @endif
                            </p>
                        </div>
                    @else
                        <div class="commontxt">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">



                                    @if (request()->path() == 'about-institute/library/about-library')
                                        <iframe frameborder="0" height="250px"
                                            sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                                            src="https://widgets.ebscohost.com/prod/customerspecific/testpv/IIMKashipur/iimkashipur_search.html"
                                            width="100%"></iframe>
                                    @endif


                                    <style>
                                        /* The Modal (background) */
                                        .modal.modal-internal {
                                            display: none;
                                            /* Hidden by default */
                                            position: fixed;
                                            /* Stay in place */
                                            z-index: 1;
                                            /* Sit on top */
                                            padding-top: 100px;
                                            /* Location of the box */
                                            left: 0;
                                            top: 0;
                                            width: 100%;
                                            /* Full width */
                                            height: 100%;
                                            /* Full height */
                                            overflow: auto;
                                            /* Enable scroll if needed */
                                            background-color: rgb(0, 0, 0);
                                            /* Fallback color */
                                            background-color: rgba(0, 0, 0, 0.4);
                                            /* Black w/ opacity */
                                        }

                                        .modal-internal .modal-header {
                                            justify-content: space-between;
                                            width: 100%;
                                            padding: 5px 24px;
                                        }

                                        /* Modal Content */
                                        .modal-internal .modal-content {
                                            background-color: #fefefe;
                                            margin: auto;
                                            padding: 0;
                                            border: 1px solid #888;
                                            width: 350px;
                                            padding-bottom: 20px;
                                        }

                                        /* The Close Button */
                                        .modal-internal .close {
                                            color: #aaaaaa;
                                            float: right;
                                            font-size: 28px;
                                            font-weight: bold;
                                        }

                                        .modal-internal .close:hover,
                                        .modal-internal .close:focus {
                                            color: #000;
                                            text-decoration: none;
                                            cursor: pointer;
                                        }

                                        .modal-internal h5.modal-title {
                                            font-size: 18px;
                                            font-weight: 600;
                                        }

                                        .box {
                                            width: 300px;
                                        }

                                        .box input {
                                            padding: 10px 0 5px;
                                            margin-bottom: 20px;
                                        }

                                        .box textarea {
                                            height: 80px;
                                            padding: 10px 0;
                                            margin-bottom: 40px;
                                        }

                                        .box input,
                                        .box textarea {
                                            width: 100%;
                                            box-sizing: border-box;
                                            box-shadow: none;
                                            outline: none;
                                            border: none;
                                            border-bottom: 2px solid #999;
                                        }

                                        .box textarea {
                                            margin-bottom: 20px;
                                        }

                                        .box input[type="submit"] {
                                            font-size: 1.1em;
                                            border-bottom: none;
                                            cursor: pointer;
                                            background: #f03340;
                                            color: #FFF;
                                            margin-bottom: 0;
                                            text-transform: uppercase;
                                        }

                                        .box form div {
                                            position: relative;
                                        }

                                        .box form div label {
                                            position: absolute;
                                            top: 10px;
                                            left: 0;
                                            color: #999;
                                            pointer-events: none;
                                            transition: .5s;
                                        }

                                        .box input:focus~label,
                                        .box textarea:focus~label,
                                        .box input:valid~label,
                                        .box textarea:valid~label {
                                            top: -15px;
                                            left: 0;
                                            color: #f03340;
                                            font-size: 1em;
                                            font-weight: bold;
                                        }

                                        .box input:focus~label,
                                        .box textarea:focus~label,
                                        .box input:valid,
                                        .box textarea:valid {
                                            border-bottom: 2px solid #f03340;
                                        }
                                    </style>


                                    <!-- The Modal -->
                                    <div id="myModal" class="modal modal-internal">

                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <!-- <div class="d-flex justify-content-between">
                                                                       <span class="close">&times;</span>
                                                                        <p>Some text in the Modal..</p>
                                                                       </div> -->
                                            <div class="modal-header border-bottom-0">
                                                <h5 class="modal-title">Create Account</h5>
                                                <a class="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </a>
                                                </button>
                                            </div>

                                            <div class="modal-body p-0">
                                                <div class="box-wrapper">
                                                    <div class="box">

                                                        <form id="form" action="">
                                                            @csrf
                                                            <div>
                                                                <input type="text" name="name" id="name"
                                                                    class="preventnumeric" required placeholder=" ">
                                                                <label>Name: </label>
                                                            </div>
                                                            <div>
                                                                <input type="email" name="email" required
                                                                    placeholder=" "
                                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
                                                                <label>Email </label>
                                                            </div>
                                                            <div>
                                                                <input type="text" name="mobile_no" required
                                                                    class="mobile_no" maxlength="10" minlength="10"
                                                                    placeholder=" ">
                                                                <label>Moblie Number</label>
                                                            </div>

                                                            <div>
                                                                <input type="text" name="organization" required
                                                                    placeholder=" ">
                                                                <label>Organization</label>
                                                            </div>

                                                            <div>
                                                                <input id="captcha" type="text" class="form-control"
                                                                    placeholder="Enter Captcha" name="captcha">

                                                                <div class="captcha d-flex justify-content-beetween">
                                                                    <span
                                                                        style="margin-right: 10px;">{!! captcha_img('math') !!}</span>
                                                                    <button type="button"
                                                                        class="btn btn-danger px-3 py-1 refresh-captcha text-white"
                                                                        id="refresh-captcha"
                                                                        style="background:#f03340;color:#fff !important">
                                                                        &#x21bb;
                                                                    </button>
                                                                </div>

                                                            </div>

                                                            <input id="submit" type="submit" class="mt-3"
                                                                value="Submit">


                                                    </div>




                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <script>
                                    // Get the modal
                                    var modal = document.getElementById("myModal");

                                    // Get the button that opens the modal
                                    var btn = document.getElementById("myBtn");

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];
                                    const closeButton = document.getElementsByClassName("close")[0];
                                    // When the user clicks the button, open the modal 
                                    btn.onclick = function() {
                                        modal.style.display = "block";
                                    }

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() {
                                        modal.style.display = "none";
                                    }

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    }

                                    function openmodle(id) {
                                        modal.style.display = "block";
                                    }
                                </script>

                                <p>
                                    @if (GetLang() == 'en')
                                        {!! $item[0]->content !!}
                                    @else
                                        {!! $item[0]->content_h !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
            @endif
        </div>

        @if ($item[0]->video_url != '')
            <div class="col-md-12 mx-auto">

                <iframe width="100%" height="315" src="{{ $item[0]->video_url ?? '' }}"
                    title="{{ url($item[0]->video_title) ?? '' }}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>

            </div>
        @endif
        </div>
        @endif
        </div>


        </div>
    </section>
@elseif(isset($sub_menu))
    {{-- submenu menu content setion --}}

    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col-md-3">

                    <div class="sidebarwraper">

                        @foreach (GetSubMenusFront($type[0]->menu_id) as $key1 => $S)
                            <ul>
                                @if (count(GetchildMenusFront($type[0]->menu_id, $S->id)) > 0)
                                    <li class="hasnested">
                                        <a @if ($S->id == $type[0]->id) class="active" @endif
                                            href="javascript:void();" class="open-tab-focus">
                                            @if (GetLang() == 'en')
                                                {{ $S->name ?? '' }}
                                            @else
                                                {{ $S->name_h ?? '' }}
                                            @endif
                                            <svg class="minus" viewBox="0 0 24 24">
                                                <g data-name="Layer 2">
                                                    <path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus" />
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
                                                    <li class="hasnested {{ $C->id == $type[0]->id ? 'opened' : '' }}">
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




                @if (collect($item)->isEmpty())
                    {{-- remember that $contact is your variable --}}

                    <div class="alert alert-success" role="alert">

                        <h4 class="alert-heading">something went wrong </h4>

                        <p>Data Not Found</p>

                    </div>
                @else
                    @foreach ($item as $items)
                        <div class="col-md-9">
                            <div class="innerpagecontent">
                                <h3><span>
                                        @if (GetLang() == 'en')
                                            {{ $items->name ?? '' }}
                                        @else
                                            {{ $items->name_h ?? '' }}
                                        @endif
                                    </span>
                                </h3>
                                @if ($items->cover_image != '' && $items->cover_image != 'default.jpg')
                                    <div class="row mt-4">
                                        <div class="col-md-3">


                                            <div class=" top text-center mt-0">
                                                <div class="profile-img">
                                                    <img src="{{ asset('page/image/' . $items->cover_image) }}"
                                                        alt="{{ $items->cover_alt }}"
                                                        title="{{ $items->cover_title }}">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-7 col-lg-8">

                                            <p>
                                                @if (GetLang() == 'en')
                                                    {!! $items->content !!}
                                                @else
                                                    {!! $items->content_h !!}
                                                @endif
                                            </p>
                                        </div>
                                    @else
                                        <div class="commontxt">
                                            <div class="row">

                                                <div class="col-md-12 col-lg-12">


                                                    {{-- {{ request()->path() }} --}}

                                                    @if (request()->path() == 'about-institute/library')
                                                        <iframe frameborder="0" height="250px"
                                                            sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                                                            src="https://widgets.ebscohost.com/prod/customerspecific/testpv/IIMKashipur/iimkashipur_search.html"
                                                            width="100%"></iframe>
                                                    @endif

                                                    <p>

                                                        @if (GetLang() == 'en')
                                                            {!! $items->content !!}
                                                        @else
                                                            {!! $items->content_h !!}
                                                        @endif

                                                    </p>

                                                </div>

                                            </div>

                                        </div>
                                @endif

                            </div>

                            @if ($item[0]->video_url != '')
                                <div class="col-md-12 mx-auto">

                                    <iframe width="100%" height="315" src="{{ $item[0]->video_url ?? '' }}"
                                        title="{{ url($item[0]->video_title) ?? '' }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>

                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@else
    @if (@isset($item))
        {{-- remember that $contact is your variable --}}
        <section class="withsidebar-wrap ptb-60">
            <div class="container">
                <div class="row">
                    @if ($item[0]->cover_image != '')
                        <div class="col-md-3">
                            <div class="sidebarwraper">
                                <img src="{{ asset('page/image/' . $item[0]->cover_image) ?? '' }}"
                                    style="height:259px;" alt="{{ $type[0]->cover_alt ?? '' }}"
                                    title="{{ $type[0]->cover_title ?? '' }}">
                            </div>
                        </div>
                    @else
                        <div class="col-md-3">
                            <div class="sidebarwraper">
                                <img src="{{ asset('default.jpg.jpg') ?? '' }}" style="height:259px;"
                                    alt="{{ $type[0]->cover_alt ?? '' }}" title="{{ $type[0]->cover_title ?? '' }}">
                            </div>
                        </div>
                    @endif
                    <div class="col-md-9">
                        <div class="innerpagecontent">
                            <h3><span>
                                    @if (GetLang() == 'en')
                                        {{ $item[0]->name ?? '' }}
                                    @else
                                        {{ $item[0]->name_h ?? '' }}
                                    @endif
                                </span></h3>
                            <div class="commontxt">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <p>
                                            @if (GetLang() == 'en')
                                                {!! $item[0]->content !!}
                                            @else
                                                {!! $item[0]->content_h !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            @if ($item[0]->video_url != '')
                                <div class="col-md-8 mx-auto">

                                    <iframe width="100%" height="315" src="{{ $item[0]->video_url ?? '' }}"
                                        title="{{ url($item[0]->video_title) ?? '' }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        {{-- main menu content setion --}}


        <section class="withsidebar-wrap ptb-60">
            <div class="container">
                <div class="row">
                    @if ($org[0]->image != '')
                        <div class="col-md-2">
                            {{-- <div class="sidebarwraper">
                <img src="{{ asset('uploads/organisation/'.$org->image) ?? ''}}"  style="height:150px;"     alt="{{$type[0]->cover_alt ?? ''}}" title="{{$type[0]->cover_title ?? ''}}">
                </div> --}}
                        </div>
                    @endif
                    <div class="col-md-10">
                        <div class="innerpagecontent">
                            <h3><span>
                                    @if (GetLang() == 'en')
                                        {{ $org[0]->title ?? '' }}
                                    @else
                                        {{ $org[0]->title_h ?? '' }}
                                    @endif
                                </span></h3>
                            <div class="commontxt">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <p>
                                            @if (GetLang() == 'en')
                                                {!! $org[0]->description !!}
                                            @else
                                                {!! $org[0]->description_h !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @endif

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.pdf-button').on('click', function() {


                let pdf = ($(this).val());
                console.log(pdf)
                let pdfFilename = ($(this).attr('data-id'));
                console.log(pdfFilename);

                $('#form').submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/Guidelines-for-Participants') }}",
                        data: $('#form').serialize() + '&pdf=' + pdf,
                        success: function(data) {

                            toastr.success('Form submitted successfully!', 'Success');

                            if (data.message == 'Form submitted successfully!') {
                                $('#myModal').hide();
                                $('#form')[0].reset();

                                setTimeout(function() {
                                    window.open(
                                        BASE_URL + '/admin/pdf/' +
                                        pdfFilename);

                                    // Reload the current page after the PDF is opened (e.g., after 2 seconds)
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1000); // 2000 milliseconds (2 seconds)
                                }, 1000); // 2000 milliseconds (2 seconds)
                            }
                        },
                        error: function(data) {
                           // console.log('Error:', data);
                            alert(data.responseJSON.message)
                            if (data.responseJSON.message == 'Invalid Captcha') {

                                $.ajax({
                                    type: 'GET',
                                    url: '<?php echo url('refresh-captcha'); ?>',
                                    success: function(data) {
                                        $(".captcha span").html(data
                                            .captcha);
                                    }
                                });
                            }
                        }
                    });
                });

            });

            closeButton.addEventListener('click', () => {
                $("#myModal").hide();
            });
        });




        $('.special_no').keypress(function(e) {
            var regex = new RegExp("^[a-zA-Z_]");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            e.preventDefault();
            return false;
        });


        $('.mobile_no').keypress(function(e) {
            var regex = new RegExp("^[0-9_]");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            e.preventDefault();
            return false;
        });


        $('.preventnumeric').keypress(function(e) {
            //alert("yes");
            var regex = new RegExp(/^[a-zA-Z\s]+$/);
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            e.preventDefault();
            return false;
        });

        $('#refresh-captcha').click(function() {
            $.ajax({
                type: 'GET',
                url: '<?php echo url('refresh-captcha'); ?>',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>

@endsection
