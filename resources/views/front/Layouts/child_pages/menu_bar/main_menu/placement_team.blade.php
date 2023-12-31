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
                    <li><a href="{{ URL::previous() }}">
                            <span>
                                @if (GetLang() == 'en')
                                    {{ $gets[0]->name ?? '' }}
                                @else
                                    {{ $gets[0]->name_h ?? '' }}
                                @endif
                            </span>
                        </a>
                    </li>

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
                {{--
                        <h4 class="hp-4"> @if (GetLang() == 'en') {{ $type[0]->name ?? '' }}  @else {{ $type[0]->name_h ?? '' }}  @endif</h4> --}}

                {{-- <a href="javascript:void(0)" class="btn2">The Team
                            @if (GetLang() == 'en')
                                {{ $type[0]->name ?? '' }}
                            @else
                                {{ $type[0]->name_h ?? '' }}
                            @endif
                        </a> --}}

                <h4 class="hp-4">
                    @if (GetLang() == 'en')
                        {{ $type[0]->name ?? '' }}
                    @else
                        {{ $type[0]->name_h ?? '' }}
                    @endif
                </h4>
                {{-- <a href="javascript:void(0)" class="btn2"> THE TEAM </a> --}}






                @foreach ($item as $items)
                    @if ($items->department == '8')
                        <div class="row mt-4">

                            <div class="col-md-3">

                                <div class="addevent-box top text-center mt-0">

                                    <div class="profile-img">

                                        <img src="{{ asset('uploads/organisation/' . $items->image) ?? '' }}"
                                            alt="{{ $items->title }}" title="{{ $items->title }}">

                                    </div>

                                    <h5>
                                        @if (GetLang() == 'en')
                                            {{ $items->title ?? '' }}
                                        @else
                                            {{ $items->title_h ?? '' }}
                                        @endif
                                    </h5>
                                    <h6>
                                        @if (GetLang() == 'en')
                                            {{ $items->designation ?? '' }}
                                        @else
                                            {{ $items->designation_h ?? '' }}
                                        @endif
                                    </h6>



                                    {{-- <div class="profile-socail-icon information">

                                                        <a href="javascript:void(0)" class="socail-icon"><i
                                                                class="fab fa fa-facebook-f"></i></a>

                                                        <a href="javascript:void(0)" class="socail-icon"><i
                                                                class="fab fa fa-twitter"></i></a>



                                                    </div> --}}

                                </div>

                            </div>






                            <div class="col-md-7 col-lg-8">

                                <p>
                                    @if (GetLang() == 'en')
                                        {!! $items->description ?? '' !!}
                                    @else
                                        {!! $items->description_h ?? '' !!}
                                    @endif
                                </p>
                            </div>
                    @endif
                @endforeach


            </div>







            <a href="javascript:void(0)" class="btn2 margin_top margin_bottom">SENIOR MEMBERS</a><br><br>

            <div class="profilewithinfo">



                <div class="row">

                    @foreach ($item as $items)
                        @if ($items->department == '9')
                            <div class="col-6 col-lg-4 col-xxl-3 mb-4">

                                <div class="profilewraper">

                                    <figure><img src="{{ asset('uploads/organisation/' . $items->image) ?? '' }}"
                                            alt="{{ $items->title ?? '' }}" title="{{ $items->title ?? '' }}">
                                    </figure><br>

                                    <h4>
                                        @if (GetLang() == 'en')
                                            {{ $items->title ?? '' }}
                                        @else
                                            {{ $items->title_h ?? '' }}
                                        @endif
                                    </h4>

                                    @if (GetLang() == 'en')
                                        {{ $items->designation ?? '' }}
                                    @else
                                        {{ $items->designation_h ?? '' }}
                                    @endif

                                </div>

                            </div>
                        @endif
                    @endforeach

                </div>



            </div>


        </div>

        </div>

        </div>
    @endif

    </div>
    </div>
    </div>

    </section>

    {{-- -------------------------------------- sub menu content --------------------------------------------- --}}
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

                            {{-- <h4 class="hp-4">
                                @if (GetLang() == 'en')
                                    {{ $type[0]->name ?? '' }}
                                @else
                                    {{ $type[0]->name_h ?? '' }}
                                @endif
                            </h4> --}}
                            <a href="javascript:void(0)" class="btn2">
                                @if (GetLang() == 'en')
                                    {{ $type[0]->name ?? '' }}
                                @else
                                    {{ $type[0]->name_h ?? '' }}
                                @endif
                            </a>

                            @if ($chairperson != '')
                                @if ($chairperson->department == '11')
                                    <div class="row mt-4">

                                        <div class="col-md-3">

                                            <div class="addevent-box top text-center mt-0">

                                                <div class="profile-img">

                                                    <img src="{{ asset('uploads/organisation/' . $chairperson->image) ?? '' }}"
                                                        alt="{{ $chairperson->title }}"
                                                        title="{{ $chairperson->title }}">

                                                </div>

                                                <h5>
                                                    @if (GetLang() == 'en')
                                                        {{ $chairperson->title ?? '' }}
                                                    @else
                                                        {{ $chairperson->title_h ?? '' }}
                                                    @endif
                                                </h5>

                                                <h6>
                                                    @if (GetLang() == 'en')
                                                        {{ $chairperson->designation ?? '' }}
                                                    @else
                                                        {{ $chairperson->designation_h ?? '' }}
                                                    @endif
                                                </h6>

                                                <span> {{ $chairperson->extension ?? '' }}</span>

                                            </div>

                                        </div>

                                        <div class="col-md-7 col-lg-8">

                                            <p>
                                                @if (GetLang() == 'en')
                                                    {!! $chairperson->description ?? '' !!}
                                                @else
                                                    {!! $chairperson->description_h ?? '' !!}
                                                @endif
                                            </p>
                                        </div>
                                @endif
                            @endif


                        </div>

                        @if (count($Administrative) > 0)
                            <a href="javascript:void(0)" class="btn2 margin_top margin_bottom">Administrative</a><br><br>

                            <div class="profilewithinfo">

                                <div class="row">
                                    @foreach ($Administrative as $items)
                                        @if ($items->department == '12')
                                            <div class="col-6 col-lg-4 col-xxl-4 mb-4">


                                                <div class="addevent-box top text-left mt-0">

                                                    <div class="profile-img">
                                                        <img src="{{ asset('uploads/organisation/' . $items->image) ?? '' }}"
                                                            alt="{{ $items->title ?? '' }}"
                                                            title="{{ $items->title ?? '' }}">
                                                    </div>

                                                    <div class="senear-box">
                                                        <h5>
                                                            @if (GetLang() == 'en')
                                                                {{ $items->title ?? '' }}
                                                            @else
                                                                {{ $items->title_h ?? '' }}
                                                            @endif
                                                        </h5>
                                                        <p>
                                                            @if (GetLang() == 'en')
                                                                {{ $items->designation ?? '' }}
                                                            @else
                                                                {{ $items->designation_h ?? '' }}
                                                            @endif
                                                        </p>

                                                        <p>
                                                            {{ $items->phone ?? '' }}
                                                        </p>

                                                        <?php
                                                        $email_address = $items->email;
                                                        $str = $email_address;
                                                        $var = str_replace('@', '[at]', $str);
                                                        $email = str_replace('.', '[dot]', $var);
                                                        ?>

                                                        <p class="mail-team-2" title="{{ $email ?? '' }}">
                                                            {{ $email ?? '' }}
                                                        </p>

                                                        <p> {{ $items->extension ?? '' }}</p>

                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                        @endif

                        @if (count($Coordinator) > 0)
                            <a href="javascript:void(0)" class="btn2 margin_top margin_bottom">Senior Student
                                Coordinator</a><br>

                            <span>Email-id: placecomm[at]iimkashipur[dot]ac[dot]in</span>
                            <div class="profilewithinfo">

                                <div class="row">

                                    @foreach ($Coordinator as $items)
                                        @if ($items->department == '13')
                                            <div class="col-6 col-lg-4 col-xxl-3 mb-4">

                                                <div class="addevent-box top text-left mt-0">

                                                    <div class="profile-img">
                                                        <img src="{{ asset('uploads/organisation/' . $items->image) ?? '' }}"
                                                            alt="{{ $items->title ?? '' }}"
                                                            title="{{ $items->title ?? '' }}">
                                                    </div>

                                                    <h5>
                                                        @if (GetLang() == 'en')
                                                            {{ $items->title ?? '' }}
                                                        @else
                                                            {{ $items->title_h ?? '' }}
                                                        @endif
                                                    </h5>
                                                    <h6>
                                                        @if (GetLang() == 'en')
                                                            {{ $items->designation ?? '' }}
                                                        @else
                                                            {{ $items->designation_h ?? '' }}
                                                        @endif
                                                    </h6>

                                                    <p> {{ $items->phone ?? '' }}</p>

                                                </div>

                                            </div>
                                        @endif
                                    @endforeach

                                </div>



                            </div>
                        @endif


                        @if (count($junior_Coordinator) > 0)
                            <a href="javascript:void(0)" class="btn2 margin_top margin_bottom">Junior Student
                                Coordinator</a><br>

                            {{-- <span>Email-id: placecomm[at]iimkashipur[dot]ac[dot]in</span> --}}
                            <div class="profilewithinfo">

                                <div class="row">

                                    @foreach ($junior_Coordinator as $items)
                                        @if ($items->department == '20')
                                            <div class="col-6 col-lg-4 col-xxl-3 mb-4">

                                                <div class="addevent-box top text-left mt-0">

                                                    <div class="profile-img">
                                                        <img src="{{ asset('uploads/organisation/' . $items->image) ?? '' }}"
                                                            alt="{{ $items->title ?? '' }}"
                                                            title="{{ $items->title ?? '' }}">
                                                    </div>

                                                    <h5>
                                                        @if (GetLang() == 'en')
                                                            {{ $items->title ?? '' }}
                                                        @else
                                                            {{ $items->title_h ?? '' }}
                                                        @endif
                                                    </h5>
                                                    <h6>
                                                        @if (GetLang() == 'en')
                                                            {{ $items->designation ?? '' }}
                                                        @else
                                                            {{ $items->designation_h ?? '' }}
                                                        @endif
                                                    </h6>

                                                    <p> {{ $items->phone ?? '' }}</p>

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
        @endif

        </div>

        </div>

    </section>
@else
    <section class="withsidebar-wrap ptb-60">



        <div class="container">

            <div class="row">

                {{-- <div class="col-md-3">

                <div class="sidebarwraper">

                    <ul>
                    @foreach (content_menus() as $key => $S)

                        @if ($S->external == 'yes')
                          <li><a href="{{ url($S->url) }}" onclick="return confirm('Are you sure  external window open?')" target="_blank">  @if (GetLang() == 'en') {{ $S->name  ?? ''}}  @else {{ $S->name_h  ?? ''}}  @endif </a></li>
                         @elseif($S->external=='no')
                           <li><a href="{{ url($S->url) }}">  @if (GetLang() == 'en') {{ $S->name  ?? ''}}  @else {{ $S->name_h  ?? ''}}  @endif </a></li>
                        @else
                          <li><a href="{{ url($S->slug) }}" @if ($S->id == $type[0]->id) class="active" @endif>  @if (GetLang() == 'en') {{ $S->name  ?? ''}}  @else {{ $S->name_h  ?? ''}}  @endif  </a></li>
                        @endif

                        @endforeach

                    </ul>
                </div>

            </div> --}}



                @if (collect($item)->isEmpty())
                    {{-- remember that $contact is your variable --}}

                    <div class="alert alert-success" role="alert">

                        <h4 class="alert-heading">something went wrong </h4>

                        <p>Data Not Found</p>



                    </div>
                @else
                    <div class="col-md-12">

                        <div class="innerpagecontent">

                            <h4 class="hp-4">
                                @if (GetLang() == 'en')
                                    {{ $type[0]->name ?? '' }}
                                @else
                                    {{ $type[0]->name_h ?? '' }}
                                @endif
                            </h4>
                            <a href="javascript:void(0)" class="btn2"> THE TEAM </a>

                            @foreach ($item as $items)
                                @if ($items->department == '8')
                                    <div class="row mt-4">

                                        <div class="col-md-3">

                                            <div class="addevent-box top text-center mt-0">

                                                <div class="profile-img">

                                                    <img src="{{ asset('uploads/organisation/' . $items->image) ?? '' }}"
                                                        alt="{{ $items->title }}" title="{{ $items->title }}">

                                                </div>

                                                <h5>
                                                    @if (GetLang() == 'en')
                                                        {{ $items->title ?? '' }}
                                                    @else
                                                        {{ $items->title_h ?? '' }}
                                                    @endif
                                                </h5>
                                                <h6>
                                                    @if (GetLang() == 'en')
                                                        {{ $items->designation ?? '' }}
                                                    @else
                                                        {{ $items->designation_h ?? '' }}
                                                    @endif
                                                </h6>



                                                {{-- <div class="profile-socail-icon information">

                                                    <a href="javascript:void(0)" class="socail-icon"><i
                                                            class="fab fa fa-facebook-f"></i></a>

                                                    <a href="javascript:void(0)" class="socail-icon"><i
                                                            class="fab fa fa-twitter"></i></a>



                                                </div> --}}

                                            </div>

                                        </div>


                                        <div class="col-md-7 col-lg-8">

                                            <p>
                                                @if (GetLang() == 'en')
                                                    {!! $items->description ?? '' !!}
                                                @else
                                                    {!! $items->description_h ?? '' !!}
                                                @endif
                                            </p>
                                        </div>
                                @endif
                            @endforeach


                        </div>

                    </div>





                    <a href="javascript:void(0)" class="btn2 margin_top margin_bottom">SENIOR MEMBERS</a><br><br>

                    <div class="profilewithinfo">



                        <div class="row">

                            @foreach ($item as $items)
                                @if ($items->department == '9')
                                    <div class="col-6 col-lg-4 col-xxl-3 mb-4">

                                        <div class="profilewraper">

                                            <figure><img src="{{ asset('uploads/organisation/' . $items->image) ?? '' }}"
                                                    alt="{{ $items->title ?? '' }}" title="{{ $items->title ?? '' }}">
                                            </figure><br>

                                            <h4>
                                                @if (GetLang() == 'en')
                                                    {{ $items->title ?? '' }}
                                                @else
                                                    {{ $items->title_h ?? '' }}
                                                @endif
                                            </h4>
                                            @if (GetLang() == 'en')
                                                {{ $items->designation ?? '' }}
                                            @else
                                                {{ $items->designation_h ?? '' }}
                                            @endif

                                        </div>

                                    </div>
                                @endif
                            @endforeach

                        </div>



                    </div>

            </div>

        </div>
        @endif

        </div>

        </div>

    </section>
    @endif




@endsection
