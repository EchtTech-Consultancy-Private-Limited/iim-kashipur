@extends('front.Layouts.master')

<style>
.row.vid-list-container .col-md-6.p-relative {
    height: 155px;
    margin-bottom: 16px
}
    </style>

@section('content')
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
                <h1>Video Gallery </h1>
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
                <li><a href="javascript:void(0);"> Video Gallery </a></li>

            </ul>
        </div>
    </div>

    <section class="event-wrap ptb-60">

        <div class="container">

            <a href="javascript:void(0)" class="btn2 margin_bottom mb-4"> Video Gallery </a><br>


            <div class="row mt-5">
                <!--
                            @foreach ($item as $M)
    <div class="col-md-4">
                                <div class="event-card" data-aos="fade-up" data-aos-duration="3000">
                                    <div class="event-body">
                                        <div class="event-image">


                                        <a href="{{ url($M->video_url) }} " class="play-icon"  title="{{ $M->video_title }}"  class="lightbox-processed">
                                            <span class="material-icons">
                                                <img typeof="foaf:Image"  src="{{ asset('video/multiple-image/' . $M->video_title) }}"  title="{{ $M->Image_Alt }}" alt="{{ $M->Image_Alt }}" style="height:300px;" width="500" height="600"    class="img-fluid" >
                                            </span>
                                        </a>


                                        </div>
                                    </div>
                                </div>
                            </div>
    @endforeach -->


                <div class="col-md-6">
                    <div class="vid-container">
                        <iframe id="vid_frame" src="https://www.youtube.com/embed/q1onzvBSdJM" frameborder="0"
                            width="100%" height="330"></iframe>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="row vid-list-container">

                        @foreach ($item as $M)

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
    </section>
@endsection
