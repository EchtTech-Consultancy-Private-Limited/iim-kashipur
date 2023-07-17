    
    <section class="about-wrap ptb-80" >
        <div class="container">
            <div class="row">

                @if(GetOrganisationAllDetails('about_image')!='' || GetOrganisationAllDetails('about')!='')
                <div class="col-md-12">
                    <div class="about-body">

                        <!-- <div class="img-wrap" data-aos="fade-right" data-aos-duration="3000">
                            <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('about_image'))}}" style="height:500px;" alt="{{GetOrganisationAllDetails('about_Alt')}}" title="{{ GetOrganisationAllDetails('about_title') }}" class="img-fluid">
                        </div> -->
                        <div class="img-wrap" data-aos="fade-right" data-aos-duration="3000">

                        <video controls autoplay muted id="video">
                            <source src="{{ asset('assets/images/banners/about_video.webm') }}">
                            </video>
                        </div>

                        <div class="about-content row">
                           <div class="col-md-8">
                           <div data-aos="fade-left" data-aos-duration="3000" class="about_con">
                                @if(GetOrganisationAllDetails('about')!='')
                                <p class="desc-white" id="para">
                                @if(GetLang()=='en') {!! GetOrganisationAllDetails('about') !!} @else {!! GetOrganisationAllDetails('about_h') !!}  @endif
                                </p>
                                @endif
                                <div class="btn-wrap">
                                    <a href="javascript:void(0);" class="btn btn-orange">@lang('common.read_more')</a>
                                </div>
                            </div>
                           </div>
                           <div class="col-md-4">
                           <div class="counter-wrap mt-2 pt-1" data-aos="fade-up" data-aos-duration="3000">

                            <ul>
                                @foreach(getproject_logo() as $key=>$logo)
                                        <li>

                                            <span class="counter-no">
                                            {{$logo->number}}
                                            </span>
                                            <p class="counter-title">
                                                    @if(GetLang()=='en') {{ $logo->name }} @else {{ $logo->name_h }}  @endif
                                            </p>
                                        </li>
                                @endforeach
                            </ul>

                            </div>
                           </div>

                        </div>
                    </div>
                </div>
                @endif


{{-- project logo in website --}}


            </div>
        </div>
    </section>
