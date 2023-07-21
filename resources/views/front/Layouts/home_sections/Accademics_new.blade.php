<section class="academic-wrap ptb-60">
        <div class="container">

          @foreach(GETServiecscontent() as $key=>$M)
            <div class="row">
                <div class="col-md-12 text-center" data-aos="fade-up" data-aos-duration="3000">

                   <h2 class="heading-light">
                       @if(GetLang()=='en') {{ $M->Section }} @else {{ $M->Section_h }}  @endif
                    </h2>
                    <p class="desc-grey">
                       @if(GetLang()=='en') {{ $M->short_note }} @else {{ $M->short_note_h }}  @endif
                    </p>
                </div>

                <div class="col-md-12">
                    <div class="academic-slider">

                        <div class="owl-carousel owl-theme" id="academicSlider">

                            @if(count(GETcontentservices($M->id))>0)
                            @foreach(GETcontentservices($M->id) as $key=>$Ms)

                            <div class="item">
                                <a  @if($Ms->external=='yes')  onclick="return confirm('Are you sure  external window open?')" target="_blank" href="{{$Ms->url}}" @elseif($Ms->external=='no')  href="{{url($Ms->url)}}" @endif>
                                <div class="academic-card">
                                    <div class="academic-img">
                                        <img  src="{{asset('uploads/header_top'."/".$Ms->image)}}"  title="{{ $Ms->Image_Title }}"  alt="{{ $Ms->Image_Alt }}" class="img-fluid" />
                                    </div>
                                    <div class="academic-body">
                                        <h3 class="title title-green">
                                            @if(GetLang()=='en')  {{ $Ms->title }} @else {{ $Ms->title_h }}  @endif
                                        </h3>
                                        <p class="desc">
                                          @if(GetLang()=='en')   {{substr_replace($Ms->short,'...',130)}} @else  {{substr_replace($Ms->short_h,'...',400)}}  @endif
                                        </p>
                                        <span class="education">
                                            {{-- <img src="{{asset('assets/images/education.svg')}}" alt="education" class="img-fluid" /> Post Graduation (Analytics) --}}
                                        </span>
                                    </div>
                                </div>
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-12">
                    <div class="academic-slider">

                        <div class="owl-carousel owl-theme" id="academicSlider">

                          
                       </div>
                    </div>
                </div> -->

                
            </div>
            @endforeach
        </div>
    </section>


