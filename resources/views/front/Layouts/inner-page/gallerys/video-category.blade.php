@extends('front.Layouts.master')

@section('content')

<div class="internalpagebanner">
        @if(GetOrganisationAllDetails('default_banner_image')!='')
            <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('default_banner_image'))}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
        @else
            <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? ''}}" style="height:auto;  min-height:200px; max-height:350% overflow:hidden;"   alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
        @endif
        <div class="imagecaption">
            <div class="container">
                <h1>Video Category </h1>
            </div>
        </div>
    </div>

    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>
                <li><a href="javascript:void(0);"> Video Category </a></li>

            </ul>
        </div>
    </div>


    <section class="event-wrap ptb-60">

            <div class="container">

            <a href="javascript:void(0)" class="btn2 margin_bottom mb-4"> Video Category  </a><br>

              <div class="row mt-5">

                    @foreach($item as  $M)

                    <div class="col-md-4">

                        <div class="event-card" data-aos="fade-up" data-aos-duration="3000">

                            <div class="event-body">

                            <div class="event-image p-relative">

                                <a  class="popup-border popup-videos" href="{{ url($M->video_slug) }}"  title=" {{ $M->image_title }}"  class="lightbox-processed">

                                <span class="top-text">   @if(GetLang()=='en') {{ $M->name }} @else {{ $M->name_h }}  @endif  </span>
                                <span class="btn-p"><i class="fa fa-play-circle" aria-hidden="true" title="Play"></i> </span>
                                <img typeof="foaf:Image"  src="{{asset('video/image/'.$M->cover_image)}}"  title="{{ $M->cover_title }}" style="height:250px;width:100%"  class="img-fluid" alt="">
                                </a>



                                </div>

                            </div>

                        </div>

                    </div>

                   @endforeach

                </div>

            </div>

        </section>

@endsection
