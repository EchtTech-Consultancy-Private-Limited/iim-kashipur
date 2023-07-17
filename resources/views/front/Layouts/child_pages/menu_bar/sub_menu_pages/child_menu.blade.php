
@extends('front.Layouts.child_pages.master')

@include('front.Layouts.headers.Header_new')

@section('content')



    @php
    $mmenu=@content_menus($type[0]->menu_id);
    @endphp

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
                        <li><a href="javascript:void(0);"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>
                        <li><a href="javascript:void(0);">{{ $get[0]->name  ?? '' }}</a></li>
                        <li><span>{{ $gets[0]->name  ?? '' }}</span></li>
                        <li><span>{{ $type_child[0]->name  ?? '' }}</span></li>
                    </ul>
                </div>
            </div>


            </ul>
        </div>
    </div>






    <section class="withsidebar-wrap ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebarwraper">


                        @foreach(GetSubMenusFront($gets[0]->menu_id) as $key1=>$S)
                        <ul>

                            @if(count(GetchildMenusFront($gets[0]->menu_id,$S->id))>0)


                            <li class="hasnested"><a @if($S->id==$gets[0]->id) class="active" @endif>{{ $S->name ?? '' }}<svg class="minus" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus"/></g></svg><svg viewBox="0 0 24 24" class="plus"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg></a>
                                <ul>
                                    @foreach(GetchildMenusFront($gets[0]->menu_id,$S->id) as $key2=>$C)
                                        @if($C->external=='yes')
                                            <li><a href="{{url($C->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank" >{{ $C->name ?? ''}}</a></li>

                                        @if($C->external=='no')

                                        <li><a href="{{url($C->url)}}"  >{{ $C->name ?? ''}}</a></li>

                                        @else
                                            <li><a href={{url($mmenu[0]->slug."/".$S->slug."/".$C->slug)}}>{{ $C->name ?? ''}}</a></li>
                                        @endif

                                     @endforeach
                                </ul>
                            </li>


                            @else
                                @if($S->external=='yes')
                                    <li><a href="{{ url($S->url) }}" onclick="return confirm('Are you sure  external window open?')" target="_blank"> {{ $S->name  ?? ''}}  </a></li>

                                 @elseif($S->external=='no')

                                 <li><a href="{{ url($S->url) }}" > {{ $S->name  ?? ''}}  </a></li>

                                @else

                                <li><a href="{{ url($mmenu[0]->slug."/".$S->slug) }}" @if($S->id==$gets[0]->id) class="active" @endif> {{ $S->name  ?? ''}}  </a></li>

                                @endif

                             @endif

                        </ul>

                       @endforeach



                        {{-- <ul>

                            @if(count(GetchildMenusFront($type_sub[0]->menu_id,$type_child[0]->sub_id))>0)

                                    @foreach(GetchildMenusFront($type_sub[0]->menu_id,$type_child[0]->sub_id) as $key2=>$C)

                                    <li><a href="{{url($C->url."/".$mmenu[0]->slug."/".$gets[0]->slug."/".$C->slug)}}">{{ $C->name }}</a></li>

                                     @endforeach


                            @endif


                        </ul> --}}




                    </div>
                </div>





                @foreach ($item as $items)
                <div class="col-md-9">
                    <div class="innerpagecontent">

                        <h3><span>{{ $items->name ?? ''}}</span></h3>
                        <div class="commontxt">
                            <div class="row">

                                <div class="col-md-13 col-lg-12">
                                  <p>
                                   {!! $items->content !!}

                                  </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach




            </div>

        </div>
    </section>

