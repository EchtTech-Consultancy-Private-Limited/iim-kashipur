@extends('front.Layouts.master')

@section('content')
    <div class="internalpagebanner">
        @isset($item)
            @if ($item->bannerimage != '')
                <img src="{{ asset('page/banner/' . $item->bannerimage) ?? '' }}" alt="" title="" loading="lazy">
                <div class="imagecaption">
                    <div class="container">
                        <h1 tabindex="0"> {{ ucwords(str_replace(['_', '-'], ' ', $data->name)) ?? '' }}</h1>
                    </div>
                </div>
            @endif
        @endisset
    </div>

    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ url('/') }}">
                        <svg viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path
                                d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z">
                            </path>
                        </svg>
                    </a>
                </li>
                <li>
                    <span tabindex="0">

                        {{ ucwords(str_replace(['_', '-'], ' ', $main_slug)) ?? '' }}

                    </span>
                </li>
                <li>
                    <span tabindex="0">
                        {{ ucwords(str_replace(['_', '-'], ' ', $data->name)) ?? '' }}
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <section class="withsidebar-wrap ptb-60">
        <div class="container">
            <div class="row">
                <div class="col master-class">
                    <div class="innerpagecontent master-class">
                        <!-- Heading section Start -->
                        <h3 tabindex="0">
                            <span tabindex="0">
                                {{ ucwords(str_replace(['_', '-'], ' ', $data->name)) ?? '' }}
                            </span>
                        </h3>
                        <!-- Heading section End -->
                        @isset($item)
                            @if ($item->about_details != '')
                                {!! $item->about_details !!}
                            @endif
                            @endif

                            <!-- Chairpersons -->
                            @isset($chairperson)
                                @if ($chairperson != '')
                                    <h5 tabindex="0">
                                        <span tabindex="0"> Chairperson </span>
                                    </h5>

                                    <div class="row mt-4 mb-5">
                                        <div class="col-md-2">
                                            <div class="top text-left mt-0">
                                                <div class="profile-img img-fac">
                                                    <img src="{{ asset('uploads/organisation/' . $chairperson->image) }}"
                                                        alt="A VENKATARAMAN" loading="lazy" class="mb-0">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="top-text mb-0 p-relative"> {{ $chairperson->title ?? '' }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="designation">
                                                <h4 tabindex="0">{{ $chairperson->designation ?? '' }} </h6>
                                                    <h6 tabindex="0">{{ $chairperson->title ?? '' }} </h6>
                                                    <h6 tabindex="0">{{ $chairperson->phone ?? '' }} </h6>

                                                    @if ($chairperson->email != '')
                                                        <?php
                                                        $email_address = $chairperson->email;
                                                        $str = $email_address;
                                                        $var = str_replace('@', '[at]', $str);
                                                        $email = str_replace('.', '[dot]', $var);
                                                        ?>
                                                        <h6 tabindex="0">{{ $email ?? '' }} </h6>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endisset
                            <!-- Photo Gallery Section Start -->

                            @isset($chairpersons)

                                @if (count($chairpersons) > 0)
                                    <h5 tabindex="0">
                                        <span tabindex="0">Members</span>
                                    </h5>
                                    <div class="excellence-wrap back-img Activities gallery-member img-gallery mb-3 mt-4">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 p-0">
                                                    <div class="excellence-gallery partnership-img">
                                                        <div class="row masonry-grid">


                                                            @foreach ($chairpersons as $value)
                                                                <div class="col-md-2 col-lg-2">
                                                                    <div class="d-flex flex-column h-100">
                                                                        <a href="javascript:void();" class="">
                                                                            <div class="thumbnail p-relative text-center">
                                                                                <img src="{{ asset('uploads/organisation/' . $value->image) ?? '' }}"
                                                                                    alt="gallery-img" class="img-fluid"
                                                                                    loading="lazy">
                                                                                <div class="top-text">{{ $value->title }}
                                                                                </div>

                                                                            </div>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            @endforeach


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endisset

                            <!-- Event section start  -->
                            @isset($data_image)

                                @if (count($data_image) > 0)
                                    <h5>
                                        <span>Events Images</span>
                                    </h5>

                                    <div class="excellence-wrap event-text mb-3 mt-4">
                                        <div class="container p-0">
                                            <div class="row">
                                                <!-- Multiple Image Popup -->
                                                <div id="gallery-1" class="hidden">
                                                    @foreach ($data_image as $k => $datas)
                                                        <a
                                                            href="{{ asset('uploads/multiple/tdex/' . $datas->filename) ?? '' }}"></a>
                                                    @endforeach
                                                </div>

                                                @foreach ($data_image as $k => $datas)
                                                    @if ($k == '1')
                                                        <div class="col-md-3">

                                                            <div class="multi-image-popup p-relative">
                                                                <a href="#gallery-1" class="btn-gallery multi-card">
                                                                    <div class="card1"></div>
                                                                    <div class="card3"></div>
                                                                    <div class="card4"></div>
                                                                    <div class="card5"></div>
                                                                    <img
                                                                        src="{{ asset('uploads/multiple/tdex/' . $datas->filename) ?? '' }}" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach


                                            </div>
                                        </div>
                                @endif
                            @endisset

                            <!-- Event section end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script>
            $(document).ready(function() {

                $('.image-link').magnificPopup({

                    type: 'image',

                    mainClass: 'mfp-with-zoom',

                    gallery: {

                        enabled: true

                    },



                    zoom: {

                        enabled: true,



                        duration: 300, // duration of the effect, in milliseconds

                        easing: 'ease-in-out', // CSS transition easing function



                        opener: function(openerElement) {



                            return openerElement.is('img') ? openerElement : openerElement.find('img');

                        }

                    }



                });


                $('a.btn-gallery').on('click', function(event) {
                    event.preventDefault();

                    var gallery = $(this).attr('href');

                    $(gallery).magnificPopup({
                        delegate: 'a',
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    }).magnificPopup('open');
                });

            });
        </script>
    @endsection
