
@extends('front.Layouts.master')


@section('content')

<div class="internalpagebanner">
    @if(GetOrganisationAllDetails('default_banner_image')!='')
        <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('default_banner_image'))}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
    @else
        <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? ''}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"   alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
    @endif
<div class="imagecaption">
        <div class="container">
            <h1>{{ $type_child[0]->name  ?? '' }}</h1>
        </div>
    </div>
</div>

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>

            <li><span> @if(GetLang()=='en') {{ $type[0]->name ?? ''}}  @else {{ $type[0]->name_h ?? ''}}  @endif</span></li>
        </ul>
    </div>
</div>


    @if(@isset($item))

        {{-- remember that $contact is your variable --}}
            <section class="withsidebar-wrap ptb-60">
                <div class="container">
                    <div class="row">
                        @if($item[0]->cover_image!='')
                        <div class="col-md-3">
                            <div class="sidebarwraper">
                            <img src="{{ asset('page/image/'.$item[0]->cover_image) ?? ''}}"  style="height:259px;"     alt="{{$type[0]->cover_alt ?? ''}}" title="{{$type[0]->cover_title ?? ''}}">
                            </div>
                        </div>
                         @else
                        <div class="col-md-3">
                            <div class="sidebarwraper">
                              <img src="{{ asset('default.jpg.jpg') ?? ''}}"  style="height:259px;"     alt="{{$type[0]->cover_alt ?? ''}}" title="{{$type[0]->cover_title ?? ''}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-9">
                            <div class="innerpagecontent">
                                <h3><span>@if(GetLang()=='en') {{$item[0]->name ?? ''}} @else {{$item[0]->name_h ?? ''}} @endif</span></h3>
                                <div class="commontxt">
                                    <div class="row">
                                        <div class="col-md-13 col-lg-12">
                                        <p>
                                            @if(GetLang()=='en') {!! $item[0]->content !!} @else {!! $item[0]->content_h !!} @endif
                                        </p>
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
                    @if($org[0]->image!='')
                    <div class="col-md-2">
                        {{-- <div class="sidebarwraper">
                        <img src="{{ asset('uploads/organisation/'.$org->image) ?? ''}}"  style="height:150px;"     alt="{{$type[0]->cover_alt ?? ''}}" title="{{$type[0]->cover_title ?? ''}}">
                        </div> --}}
                    </div>
                    @endif
                    <div class="col-md-10">
                        <div class="innerpagecontent">
                            <h3><span>@if(GetLang()=='en') {{$org[0]->title ?? ''}} @else {{$org[0]->title_h ?? ''}} @endif</span></h3>
                            <div class="commontxt">
                                <div class="row">
                                    <div class="col-md-13 col-lg-12">
                                    <p>
                                        @if(GetLang()=='en') {!! $org[0]->description !!} @else {!! $org[0]->description_h !!} @endif
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

@endsection
