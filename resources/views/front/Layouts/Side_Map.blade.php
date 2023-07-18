@extends('front.Layouts.master')
@section('content')




{{-- banner image upload --}}

<div class="internalpagebanner">
    @if(GetOrganisationAllDetails('default_banner_image')!='')
        <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('default_banner_image'))}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
    @else
        <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? ''}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"   alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
    @endif
<div class="imagecaption">
        <div class="container">
            <h1>@lang('common.sitemap')</h1>
        </div>
    </div>
</div>


{{--breadcrumbs --}}

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>
            <li><span>@lang('common.sitemap')</span></li>

        </ul>
    </div>
</div>









<section class="withsidebar-wrap ptb-60">

<div class="container">

    <div class="row">


            <div class="col-md-12">
                <div class="innerpagecontent">
                    <h3><span>@lang('common.sitemap')</span></h3>
<br>

                  @foreach(content_menus() as $key=>$M)
                      @if(count(GetSubMenusFront($M->id))>0)

                                  <a href="javascript:void(0);" >@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a>

                                  @foreach(GetSubMenusFront($M->id) as $key1=>$S)
                                  @if(count(GetchildMenusFront($M->id,$S->id))>0)

                                      <a href="javascript:void(0);">@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a>


                                          @foreach(GetchildMenusFront($M->id,$S->id) as $key2=>$C)
                                              @if($S->external=='yes')
                                              <li ><a href="{{url($C->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank">@if(GetLang()=='en'){{$C->name}} @else {{$C->name_h}} @endif</a></li>
                                              @else
                                              <li ><a href="{{url($M->slug."/".$S->slug."/".$C->slug)}}">@if(GetLang()=='en'){{$C->name}} @else {{$C->name_h}} @endif</a></li>
                                              @endif
                                          @endforeach

                                  @else
                                      @if($S->external=='yes')
                                      <li ><a href="{{url($S->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank">@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a></li>
                                      @else
                                      <li ><a href="{{url($M->slug."/".$S->slug)}}">@if(GetLang()=='en'){{$S->name}} @else {{$S->name_h}} @endif</a></li>
                                      @endif
                                      @endif
                                   @endforeach

                       @else
                          @if($M->external=='yes')
                           <li ><a href="{{url($M->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank">@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a></li>
                          @else
                            <li ><a href="{{url($M->slug)}}">@if(GetLang()=='en'){{$M->name}} @else {{$M->name_h}} @endif</a></li>
                           @endif
                          @endif
                @endforeach




                @foreach(Getfooterlink() as $key=>$M)
                <div class="col-md-3">
                    <h2 class="footer-top-title">

                    </h2>
                    <div class="footer-link">
                        <ul>
                          @foreach(GETfooterdatalink($M->id) as $key=>$Ms)
                            <li>
                                {{-- <img src="{{ asset('assets/images/arrow.svg')}}" alt="arrow" class="img-fluid"> --}}
                                <a href="{{url($Ms->slug)}}">@if(GetLang()=='en') {{ $Ms->title }} @else {{ $Ms->title_h }}  @endif</a>
                            </li>
                          @endforeach
                        </ul>
                    </div>
                </div>
               @endforeach



              @foreach(Getfooterlink2() as $key=>$M)
                <div class="col-md-3">
                    <h2 class="footer-top-title">

                    </h2>
                    <div class="footer-link mt-2">
                        <ul>
                          @foreach(GETfooterdatalink($M->id) as $key=>$Ms)
                            <li>
                                {{-- <img src="{{ asset('assets/images/arrow.svg')}}" alt="arrow" class="img-fluid"> --}}
                                <a href="{{url($Ms->slug)}}">@if(GetLang()=='en') {{ $Ms->title }} @else {{ $Ms->title_h }}  @endif</a>
                            </li>
                          @endforeach
                        </ul>
                    </div>
                </div>
              @endforeach



            </div>
            </div>
            </div>
            </div>
            </div>

    </section>

@endsection
