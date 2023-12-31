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

                    <li><a href="javascript:void(0);">
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

                    <li><span>
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



    @if (collect($item)->isEmpty())
        {{-- remember that $contact is your variable --}}
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">something went wrong </h4>
            <p>Data Not Found</p>

        </div>
    @else
        <div class="col-md-9">
            <div class="innerpagecontent">
                <a href="javascript:void(0);" class="btn2">
                    @if (GetLang() == 'en')
                        {{ $item[0]->designation ?? '' }}
                    @else
                        {{ $item[0]->designation_h ?? '' }}
                    @endif
                </a>
                @foreach ($item as $items)
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="addevent-box top text-center mt-0">
                                <div class="profile-img">
                                    <img src="{{ asset('uploads/organisation/' . $items->image) }}"
                                        alt="{{ $items->title }}" title="{{ $items->title }}">
                                </div>
                                <h5>
                                    @if (GetLang() == 'en')
                                        {{ $items->title }}
                                    @else
                                        {{ $items->title_h }}
                                    @endif
                                </h5>
                                {{-- <div class="profile-socail-icon information">
                                                    <a href="javascript:void(0);" class="socail-icon"><i
                                                            class="fab fa fa-facebook-f"></i></a>
                                                    <a href="javascript:void(0);" class="socail-icon"><i
                                                            class="fab fa fa-twitter"></i></a>
                                                </div> --}}
                            </div>
                        </div>



                        <div class="col-md-7 col-lg-8">
                            {{-- <p>{{ $items->department  }}</p> --}}

                            <p>
                                @if (GetLang() == 'en')
                                    {!! $items->description !!}
                                @else
                                    {!! $items->description_h !!}
                                @endif
                            </p>
                        </div>
                @endforeach
            </div>
        </div>
    @endif
    </div>
    </section>

    {{-- ----------------------------------------------- sub menu content --------------------------------------------- --}}
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
                    <div class="col-md-9">
                        <div class="innerpagecontent">
                            <a href="javascript:void(0);" class="btn2">
                                @if (GetLang() == 'en')
                                    {{ $item->designation ?? '' }}
                                @else
                                    {{ $item->designation_h ?? '' }}
                                @endif
                            </a>

                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <div class="addevent-box top text-center mt-0">
                                        <a href="javascript:void(0)">
                                            <div class="profile-img">
                                                <img src="{{ asset('uploads/organisation/' . $item->image) }}"
                                                    alt="{{ $item->title ?? '' }}" title="{{ $items->title ?? ' ' }}">
                                            </div>
                                            <h5>
                                                @if (GetLang() == 'en')
                                                    {{ $item->title }}
                                                @else
                                                    {{ $item->title_h }}
                                                @endif
                                            </h5>
                                        </a>

                                        <div class="social-icon">
                            <ul class="social-pl-0">
                                <li class="text-lg-left1 dot-not-in">
                                    @if ($item->twitter != '')
                                        <a href="{{ url($item->twitter) }}" alt="{{ $item->Twitter_title }}"
                                            title="{{ $item->Twitter_title }}"
                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                            target="_blank">
                                            <i class="fa fa-twitter fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                        </a>&nbsp;
                                    @endif

                                    @if ($item->instagram != '')
                                        <a href="{{ url($item->instagram) }}" alt="{{ $item->Instagram_title }}"
                                            title="{{ $item->Instagram_title }}"
                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                            target="_blank">
                                            <i class="fa fa-instagram fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                        </a>&nbsp;
                                    @endif

                                    @if ($item->Facebook != '')
                                        <a href="{{ url($item->Facebook) }}" alt="{{ $item->Facebook_title }}"
                                            title="{{ $item->Facebook_title }}"
                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                            target="_blank">
                                            <i class="fa fa-facebook fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                        </a>&nbsp;
                                    @endif

                                    @if ($item->linkedin != '')
                                        <a href="{{ url($item->linkedin) }}" alt="{{ $item->linkedIn_title }}"
                                            title="{{ $item->linkedIn_title }}"
                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                            target="_blank">
                                            <i class="fa fa-linkedin fa-2x" class="w3-xxlarge" aria-hidden="true"></i>
                                        </a>&nbsp;
                                    @endif


                                    @if ($item->orcid != '')
                                        <a href="{{ url($item->orcid) }}" alt="{{ $item->orcid_title }}"
                                            title="{{ $item->orcid_title }}"
                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                            target="_blank">
                                            <img src="{{ asset('icon/orcid.png') }}">
                                        </a>&nbsp;
                                    @endif

                                    @if ($item->webofscience != '')
                                        <a href="{{ url($item->webofscience) }}" alt="{{ $item->webofscience_title }}"
                                            title="{{ $item->webofscience_title }}"
                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                            target="_blank">
                                            <img src="{{ asset('icon/publon.png') }}">
                                        </a>&nbsp;
                                    @endif

                                    @if ($item->scopus != '')
                                        <a href="{{ url($item->scopus) }}" alt="{{ $item->scopus_title }}"
                                            title="{{ $item->scopus_title }}"
                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                            target="_blank">
                                            <img src="{{ asset('icon/scopus.png') }}">
                                        </a>&nbsp;
                                    @endif

                                    @if ($item->scholar != '')
                                        <a href="{{ url($item->scholar) }}" alt="{{ $item->scholar_title }}"
                                            title="{{ $item->scholar_title }}"
                                            @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                            target="_blank">
                                            <img src="{{ asset('icon/google_scholers.png') }}">
                                        </a>&nbsp;
                                    @endif

                                </li>
                            </ul>
                        </div>
                                    </div>
                                </div>



                                <div class="col-md-7 col-lg-8">
                                    {{-- <p>{{ $items->department  }}</p> --}}

                                    <p>
                                        @if (GetLang() == 'en')
                                            {!! $item->description !!}
                                        @else
                                            {!! $item->description_h !!}
                                        @endif
                                    </p>
                                </div>

                            </div>

                        </div>
                       

                        <h6>{{ $item->video_title }}</h6>

                        @if ($item->video_url != '')
                            <div class="col-md-12 mx-auto">

                                <iframe width="100%" height="315" src="{{ $item->video_url ?? '' }}"
                                    title="{{ url($item->video_title) ?? '' }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>

                            </div>
                        @endif


                        @if($person != '')
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="addevent-box top text-center mt-0">
                                    <a href="javascript:void(0)">
                                        <div class="profile-img">
                                            <img src="{{ asset('uploads/organisation/'.$person->image) }}"
                                                alt="{{ $person->title ?? '' }}" title="{{ $person->title ?? ' ' }}">
                                        </div>
                                        <h5>
                                            @if (GetLang() == 'en')
                                                {{ $person->Title }}
                                            @else
                                                {{ $person->Title_h }}
                                            @endif
                                        </h5>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-7 col-lg-8">
                                <p>
                                    @if (GetLang() == 'en')
                                        {!! $person->description !!}
                                    @else
                                        {!! $person->description_h !!}
                                    @endif
                                </p>
                            </div>

                        </div>


                        @endif

                    </div>
                @endif


            </div>
    </section>
@else
    <section class="withsidebar-wrap ptb-60">
        <div class="container">
            <div class="row">




                @if (collect($item)->isEmpty())
                    {{-- remember that $contact is your variable --}}
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">something went wrong </h4>
                        <p>Data Not Found</p>

                    </div>
                @else
                    <div class="col-md-11">
                        <div class="innerpagecontent">
                            <a href="javascript:void(0);" class="btn2">
                                @if (GetLang() == 'en')
                                    {{ $item[0]->designation ?? '' }}
                                @else
                                    {{ $item[0]->designation_h ?? '' }}
                                @endif
                            </a>
                            @foreach ($item as $items)
                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        <div class="addevent-box top text-center mt-0">
                                            <div class="profile-img">
                                                <img src="{{ asset('uploads/organisation/' . $items->image) }}"
                                                    alt="{{ $items->title }}" title="{{ $items->title }}">
                                            </div>
                                            <h5>
                                                @if (GetLang() == 'en')
                                                    {{ $items->title }}
                                                @else
                                                    {{ $items->title_h }}
                                                @endif
                                            </h5>
                                            {{-- <div class="profile-socail-icon information">
                                                    <a href="javascript:void(0);" class="socail-icon"><i
                                                            class="fab fa fa-facebook-f"></i></a>
                                                    <a href="javascript:void(0);" class="socail-icon"><i
                                                            class="fab fa fa-twitter"></i></a>

                                                </div> --}}
                                        </div>
                                    </div>



                                    <div class="col-md-7 col-lg-8">
                                        {{-- <p>{{ $items->department  }}</p> --}}

                                        <p>
                                            @if (GetLang() == 'en')
                                                {!! $items->description !!}
                                            @else
                                                {!! $items->description_h !!}
                                            @endif
                                        </p>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>


    @endif

@endsection
