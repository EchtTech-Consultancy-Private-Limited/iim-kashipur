@extends('front.Layouts.master')

@section('content')


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
                    <li><a href="{{ URL::previous() }}">
                            @if (GetLang() == 'en')
                                {{ $mmenu[0]->name ?? '' }}
                            @else
                                {{ $mmenu[0]->name_h ?? '' }}
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::previous() }}">
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
                        <a href="{{ URL::previous() }}">
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

            @if (GetOrganisationAllDetails('default_banner_image') != '')
                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                    alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
            @else
                <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? '' }}"
                    style="height:auto;  min-height:200px; max-height:350% overflow:hidden;"
                    alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
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
                    <li><a href="{{ URL::previous() }}">
                            @if (GetLang() == 'en')
                                {{ $get[0]->name ?? '' }}
                            @else
                                {{ $get[0]->name_h ?? '' }}
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::previous() }}">
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
                    <li><a href="{{ URL::previous() }}">
                            @if (GetLang() == 'en')
                                {{ @$mmenu[0]->name ?? '' }}
                            @else
                                {{ @$mmenu[0]->name_h ?? '' }}
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::previous() }}">
                            <span>
                                @if (GetLang() == 'en')
                                    {{ ucfirst(strtolower($item[0]->name)) ?? '' }}
                                @else
                                    {{ ucfirst(strtolower($item[0]->name_h)) ?? '' }}
                                @endif
                            </span>
                        </a>

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
                                        <li class="hasnested @if ($S->id  == $sub[0]->id)opened @endif">
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
                                                        <li class="hasnested @if ($C->id  == $child[0]->id)opened @endif">
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
                                                                                      class="@if ($D->id  == $type[0]->id) active-sub @endif">
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

    @if($item[0]->video_url  != '')

    <div class="col-md-8 mx-auto">

       <iframe width="100%" height="315" src="{{ $item[0]->video_url  ??'' }}" title="{{ url($item[0]->video_title)  ??''}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

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
                                                    alt="{{ $item[0]->cover_alt ?? '' }}"
                                                    title="{{ $item[0]->cover_title ?? '' }}">
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

            @if($item[0]->video_url  != '')

            <div class="col-md-8 mx-auto">

               <iframe width="100%" height="315" src="{{ $item[0]->video_url  ??'' }}" title="{{ url($item[0]->video_title)  ??''}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

            </div>

            @endif
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
                        </div>
                    @endforeach
                @endif

                @if($item[0]->video_url  != '')

                <div class="col-md-8 mx-auto">

                   <iframe width="100%" height="315" src="{{ $item[0]->video_url  ??'' }}" title="{{ url($item[0]->video_title)  ??''}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                </div>

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

                            @if($item[0]->video_url  != '')

                            <div class="col-md-8 mx-auto">

                               <iframe width="100%" height="315" src="{{ $item[0]->video_url  ??'' }}" title="{{ url($item[0]->video_title)  ??''}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

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



@endsection
