@extends('front.Layouts.master')

@section('content')


@isset($type)
@php
    $mmenu = @content_menus($type[0]->menu_id);
@endphp
@endisset

@isset($get)
@php
$mmenu = @content_menus($get[0]->id );
@endphp

@endisset


@isset($subchildmenu)
@php
$mmenu = @content_menus($menu[0]->id);
@endphp
@endisset

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
                    <li><a href="{{  URL::previous()  }}">
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

{{-- ------------------------------------------Layout ---------------------------------------------------------------- --}}


<section class="withsidebar-wrap ptb-60 pb-0">

    <div class="container">

        <div class="row">

            <div class="col-md-3">

                <div class="sidebarwraper">



                    @if (isset($get))
                      @foreach (GetSubMenusFront($gets[0]->menu_id) as $key1 => $S)
                    <ul>

                        @if (count(GetchildMenusFront($gets[0]->menu_id, $S->id)) > 0)
                            <li class="hasnested @if ($S->id == $gets[0]->id)opened @endif"><a @if ($S->id == $gets[0]->id) class="active" @endif>
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
                                            <li><a href={{ url($mmenu[0]->slug . '/' . $S->slug . '/' . $C->slug) }}  class="@if ($C->id == $type_child[0]->id) active-sub @endif">
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

@elseif(isset($sub_menu))




                @foreach(GetSubMenusFront($type[0]->menu_id) as $key1=>$S)

                <ul>

                    @if(count(GetchildMenusFront($type[0]->menu_id,$S->id))>0)

                    <li class="hasnested"><a @if($S->id==$type[0]->id) class="active" @endif> @if(GetLang()=='en') {{ $S->name ?? '' }} @else {{ $S->name_h ?? '' }} @endif<svg class="minus" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus"/></g></svg><svg viewBox="0 0 24 24" class="plus"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg></a>

                        <ul>

                            @foreach(GetchildMenusFront($type[0]->menu_id,$S->id) as $key2=>$C)

                                @if($C->external=='yes')
                                    <li><a href="{{url($C->url)}}"   @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank" > @if(GetLang()=='en') {{ $C->name ?? ''}} @else {{ $C->name_h ?? ''}} @endif</a></li>

                                 @elseif($C->external=='no')

                                 <li><a href="{{url($C->url)}}"  > @if(GetLang()=='en') {{ $C->name ?? ''}} @else {{ $C->name_h ?? ''}} @endif</a></li>


                                 @else
                                    <li><a href={{url($mmenu[0]->slug."/".$S->slug."/".$C->slug)}}>  @if(GetLang()=='en') {{ $C->name ?? ''}} @else {{ $C->name_h ?? ''}} @endif</a></li>
                                 @endif

                             @endforeach

                        </ul>

                    </li>

                    @else

                            @if($S->external=='yes')
                                <li><a href="{{ url($S->url) }}"   @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank">  @if(GetLang()=='en') {{ $S->name ?? ''}} @else {{ $S->name_h ?? ''}} @endif </a></li>

                            @elseif($S->external=='no')

                                <li><a href="{{ url($S->url) }}" >  @if(GetLang()=='en') {{ $S->name ?? ''}} @else {{ $S->name_h ?? ''}} @endif </a></li>

                            @else

                            <li><a href="{{ url($mmenu[0]->slug."/".$S->slug) }}" @if($S->id==$type[0]->id) class="active" @endif>  @if(GetLang()=='en') {{ $S->name ?? ''}} @else {{ $S->name_h ?? ''}} @endif  </a></li>

                            @endif


                    @endif





                </ul>



               @endforeach

               @endif

                </div>

            </div>




@isset($item)
<div class="col master-class">
    <div class="innerpagecontent">

        <!-- Heading section Start -->
            <h3>
                @if (GetLang() == 'en')
                {{ $item[0]->name ?? '' }}
            @else
                {{ $item[0]->name_h ?? '' }}
            @endif
            </h3>
        <!-- Heading section End -->

        <!-- Content section  start-->

            @if (GetLang() == 'en')
                {!! $item[0]->content ?? '' !!}
            @else
                {!! $item[0]->content_h ?? '' !!}
            @endif





         <!-- Content Section End -->
    </div>



@endisset

   @if(isset($value))


     <!-- Photo Gallery Section Start -->

     <div class="excellence-wrap back-img Activities img-gallery mt-3 mb-3">
        <div class="container">
            <div class="row">

                <div class="col-md-12 p-0">
                    <div class="excellence-gallery partnership-img">
                        <div class="row masonry-grid">

                            @foreach ($value as $values )

                            <div class="col-md-4 col-lg-4">
                                <div class="d-flex flex-column h-100">
                                    <?php //dd($values->url); ?>
                                    @if($values->external =='yes' &&  $values->url != null)
                                        <a @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                        target="_blank"
                                        href="{{url($values->url) }}">


                                        <div class="thumbnail p-relative">
                                            <img  src="{{ asset('gallery/multipimage/'.$values->large_image) }}"
                                                alt="gallery-img" class="img-fluid"
                                                loading="lazy">
                                            <div class="top-text " title="{{ $values->image_title }}"> {{ $values->image_title }} </div>
                                        </div>


                                    </a>
                                    @else
                                        <a href="{{ asset('gallery/multipimage/'.$values->large_image) }}"class="image-link">

                                            <div class="thumbnail p-relative">
                                                <img  src="{{ asset('gallery/multipimage/'.$values->large_image) }}"
                                                    alt="gallery-img" class="img-fluid"
                                                    loading="lazy">
                                                <div class="top-text mail-team" title="{{ $values->image_title }}"> {{ $values->image_title }} </div>
                                            </div>

                                        </a>
                                    @endif


                                </div>
                            </div>


                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Photo Gallery section End -->


@else


   @isset($values)


       <!-- Video Gallery Section Start -->

       <div class="excellence-wrap back-img Activities video-gallery mt-3 mb-3">
        <div class="container">
            <div class="row">


                <div class="col-md-6">
                    <div class="vid-container">
                        <iframe id="vid_frame" src="https://www.youtube.com/embed/q1onzvBSdJM" frameborder="0" width="100%" height="300"></iframe>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row vid-list-container">


                                @foreach ($values as $M)

                                <div class="col-md-6 p-relative">
                                    <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='{{ url($M->video_url) }}'">
                                        <span class="vid-thumb"><img src="{{ asset('video/multiple-image/' . $M->video_image) }}" title="{{ $M->video_title }}" alt="{{ $M->video_title }}" /></span>
                                        <span class="top-text">  {{ $M->video_title }} </span>
                                        <span class="btn-p"><i class="fa fa-play-circle" aria-hidden="true" title="Play"></i>
                                        </span>
                                    </a>
                                </div>

                                @endforeach


                    </div>
                </div>

            </div>
        </div>
       </div>

    <!-- Video Gallery section End -->

    @endisset

 @endif

  {{-- <!-- Tab Section -->

    <div class="wrapper">
        <nav class="tabs">
            <div class="selector"></div>
            <a href="javascript:void();" class="active tablinks" onclick="openCity(event, 'Events')">
                Events
            </a>
            <a href="javascript:void();" class="tablinks" onclick="openCity(event, 'Activities')">
                Activities
            </a>
            <a href="javascript:void();" class="tablinks" onclick="openCity(event, 'Portal')">
                Alumni Portal
            </a>
            <a href="javascript:void();" class="tablinks" onclick="openCity(event, 'Association')">
                Alumni Association
            </a>
            <a href="javascript:void();" class="tablinks">
                Team ARC
            </a>
            <a href="javascript:void();" class="tablinks">
                Contact Us
            </a>
        </nav>

        <div id="Events" class="tabcontent">
            <div class="excellence-wrap back-img">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <div class="tab-content" id="excellenceTabContent">
                                <div class="tab-pane fade show active" id="innovation" role="tabpanel"
                                    aria-labelledby="innovation-tab">
                                    <div class="excellence-gallery partnership-img">
                                        <div class="row masonry-grid">

                                            <div class="col-md-6 col-lg-6">
                                                <div class="d-flex flex-column h-100">
                                                    <a href="Events.html">
                                                        <div class="thumbnail p-relative">
                                                            <img src="http://localhost/kashipur-design1/public/gallery/image/1677405700.png"
                                                                alt="gallery-img" class="img-fluid"
                                                                loading="lazy">
                                                            <div class="top-text"> HOMECOMING </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6">
                                                <div class="d-flex flex-column h-100">
                                                    <a href="Events.html">
                                                        <div class="thumbnail p-relative">
                                                            <img src="http://localhost/kashipur-design1/public/gallery/image/1677405680.png"
                                                                alt="gallery-img" class="img-fluid"
                                                                loading="lazy">
                                                            <div class="top-text">CITY MEETS
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-lg-6">
                                                <div class="d-flex flex-column h-100">
                                                    <a href="Events.html">
                                                        <div class="thumbnail p-relative">
                                                            <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                                alt="gallery-img" class="img-fluid"
                                                                loading="lazy">
                                                            <div class="top-text">Linnaeus University,
                                                                Sweden </div>

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
                </div>
            </div>
        </div>

        <div id="Activities" class="tabcontent" style="display: none;">

            <div class="commontxt">
                <div class="row">

                    <div class="col-md-12 col-lg-12">
                        <h5 class="internal-h">I-MENTORSHIP PROGRAM</h5>
                        <p>
                            I-Mentorship program is designed to integrate our alumni into the personal
                            mentoring of our present students. Students are mapped to our distinguished
                            alumni based on mutual domain interests. The personal mentoring helps our
                            students in cracking corporate competitions, academic support and career
                            guidance.
                        </p>


                    </div>

                </div>
            </div>

             <!-- Photo Gallery Section Start -->

     <div class="excellence-wrap back-img Activities img-gallery mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-0">
                    <div class="excellence-gallery partnership-img">
                        <div class="row masonry-grid">

                            <div class="col-md-4 col-lg-4">
                                <div class="d-flex flex-column h-100">
                                    <a href="http://localhost/kashipur-design1/public/gallery/image/1677405700.png"
                                        class="image-link">
                                        <div class="thumbnail p-relative">
                                            <img src="http://localhost/kashipur-design1/public/gallery/image/1677405700.png"
                                                alt="gallery-img" class="img-fluid"
                                                loading="lazy">
                                            <div class="top-text"> Event 1 </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4">
                                <div class="d-flex flex-column h-100">
                                    <a href="http://localhost/kashipur-design1/public/gallery/image/1677405680.png"
                                        class="image-link">
                                        <div class="thumbnail p-relative">
                                            <img src="http://localhost/kashipur-design1/public/gallery/image/1677405680.png"
                                                alt="gallery-img" class="img-fluid"
                                                loading="lazy">
                                            <div class="top-text">Event 2
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>


                            <div class="col-md-4 col-lg-4">
                                <div class="d-flex flex-column h-100">
                                    <a href="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                        class="image-link">
                                        <div class="thumbnail p-relative">
                                            <img src="http://localhost/kashipur-design1/public/gallery/image/1677559777.png"
                                                alt="gallery-img" class="img-fluid"
                                                loading="lazy">
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

    <h5 class="internal-h">SARATHI NEWSLETTER</h5>
    <p>
        SARATHI is the quarterly newsletter published by Team ARC, aimed to keep our
        alumni updated with happenings at their alma-mater while concurrently
        apprising our current students of the developments in our alumni community.
    </p>

       <!-- Video Gallery Section Start -->

       <div class="excellence-wrap back-img Activities video-gallery mt-3 mb-3">
        <div class="container">
            <div class="row mt-3">


                <div class="col-md-6">
                    <div class="vid-container">
                        <iframe id="vid_frame1" src="https://www.youtube.com/embed/q1onzvBSdJM" frameborder="0" width="100%" height="300"></iframe>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="row vid-list-container">


                        <div class="col-md-6 p-relative">
                            <a href="javascript:void();" onclick="document.getElementById('vid_frame1').src='http://localhost/kashipur-design1/public/IIM Kashipur'">
                                <span class="vid-thumb"><img src="http://localhost/kashipur-design1/public/video/multiple-image/1684993025.png" title="Building Video" alt="Building Video" loading="lazy"></span>
                                <span class="top-text">  Building Video </span>
                                <span class="btn-p"><i class="fa fa-play-circle" aria-hidden="true" title="Play"></i>
                                </span>
                            </a>
                        </div>


                        <div class="col-md-6 p-relative">
                            <a href="javascript:void();" onclick="document.getElementById('vid_frame1').src='http://localhost/kashipur-design1/public/BG-VIDEO'">
                                <span class="vid-thumb"><img src="http://localhost/kashipur-design1/public/video/multiple-image/1684993076.jpg" title="Video text" alt="Video text" loading="lazy"></span>
                                <span class="top-text">  Video text </span>
                                <span class="btn-p"><i class="fa fa-play-circle" aria-hidden="true" title="Play"></i>
                                </span>
                            </a>
                        </div>

                        <div class="col-md-6 p-relative">
                            <a href="javascript:void();" onclick="document.getElementById('vid_frame1').src='http://localhost/kashipur-design1/public/IIM Kashipur'">
                                <span class="vid-thumb"><img src="http://localhost/kashipur-design1/public/video/multiple-image/1684993025.png" title="Building Video" alt="Building Video" loading="lazy"></span>
                                <span class="top-text">  Building Video </span>
                                <span class="btn-p"><i class="fa fa-play-circle" aria-hidden="true" title="Play"></i>
                                </span>
                            </a>
                        </div>


                        <div class="col-md-6 p-relative">
                            <a href="javascript:void();" onclick="document.getElementById('vid_frame1').src='http://localhost/kashipur-design1/public/BG-VIDEO'">
                                <span class="vid-thumb"><img src="http://localhost/kashipur-design1/public/video/multiple-image/1684993076.jpg" title="Video text" alt="Video text" loading="lazy"></span>
                                <span class="top-text">  Video text </span>
                                <span class="btn-p"><i class="fa fa-play-circle" aria-hidden="true" title="Play"></i>
                                </span>
                            </a>
                        </div>


                    </div>
                </div>

            </div>
        </div>
       </div>

    <!-- Video Gallery section End -->

    <!-- OL List start -->

    <h3>General</h3>

    <ol>
        <li>All Users of the library are requested to carry their Identity Cards, issued to them by the Institute, while visiting the library. </li>
        <li>The owner of the Identity card is responsible for the documents issued on his/her card. </li>
        <li>The Library will usually send reminders to the faculty and to research scholars for the book due, but non-receipt of reminders is no reason for returning books late.</li>
        <li>Books can be recalled in case of an urgent demand for the same. </li>
        <li>The borrower is fully responsible for the books borrowed on his ID card. </li>
        <li>All personal belongings, except money bag, mobile, notebooks, will be kept at the property counter of the library.</li>
        <li>Users must take care of their pen drives, CD/DVD ROMs, mobiles, laptop and wallets etc. Library/Identify card is Non-transferable.</li>
     </ol>

     <h3>Discipline</h3>

    <!-- OL List start End -->

    <!-- UL List start -->

    <ul>
         <li>The library should be used for academic and research purposes only.</li>
         <li> All users are requested to maintain silence in the library and adhere strictly to its rules and regulations.</li>
         <li> Chatting, smoking, eating, sleeping, making visual aids and using mobile phones etc. is strictly prohibited in the library premises.</li>
         <li> All users are requested to keep their mobiles switched off or in silent mode in the library</li>
         <li> Any irregularities found may kindly be brought to the notice of the Librarian for necessary action.</li>
         <li> The Librarian is authorized to terminate the membership of any borrower if he/she is found guilty of such misconduct.</li>
         <li> Seats in the reading area will be available on first come first-served basis. </li>
         <li>Users must take care of their pen drives, CD/DVD ROMs, mobiles, laptop and wallets etc. Library/Identify card is Non-transferable.</li>

    </ul>
    <!-- UL List End -->


        <!-- table section Start -->
            <table class="table-responsive">
                <tr>
                    <td>Sl. No </td>
                    <td>User </td>
                    <td>No.of Book </td>
                    <td>Loan Period   </td>
                    <td>No. of Bound Journals </td>
                    <td>Loan Period</td>
                    <td>No. of CD </td>
                    <td>Loan Period </td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Faculty </td>
                    <td>14 </td>
                    <td>120 days  </td>
                    <td>1 </td>
                    <td>Overnight</td>
                    <td>2 </td>
                    <td>Overnight </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Faculty </td>
                    <td>14 </td>
                    <td>120 days  </td>
                    <td>1 </td>
                    <td>Overnight</td>
                    <td>2 </td>
                    <td>Overnight </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Faculty </td>
                    <td>14 </td>
                    <td>120 days  </td>
                    <td>1 </td>
                    <td>Overnight</td>
                    <td>2 </td>
                    <td>Overnight </td>
                </tr>


            </table>
        <!-- table section Start -->

     <!-- Accordion Section start -->

      <div class="accordion accordion-flush" id="accordionFlushExample" style="border:var(--bs-accordion-border-width) solid var(--bs-accordion-border-color)">
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
            Accordion 1
            </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Accordion 2
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Accordion 3
            </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
            </div>
            </div>
     </div>

   <!-- Accordion Section end --> --}}
 </div>

</div>
</div>
</section>


    <!-- Tab Js -->
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    <script>
        var tabs = $('.tabs');
        var selector = $('.tabs').find('a').length;
        //var selector = $(".tabs").find(".selector");
        var activeItem = tabs.find('.active');
        var activeWidth = activeItem.innerWidth();
        $(".selector").css({
            "left": activeItem.position.left + "px",
            "width": activeWidth + "px"
        });

        $(".tabs").on("click", "a", function (e) {
            e.preventDefault();
            $('.tabs a').removeClass("active");
            $(this).addClass('active');
            var activeWidth = $(this).innerWidth();
            var itemPos = $(this).position();
            $(".selector").css({
                "left": itemPos.left + "px",
                "width": activeWidth + "px"
            });
        });
    </script>

@endsection
