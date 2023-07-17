<!--------------------------- url links in website ------------------------>
{{-- <style>

    .center{
        background: #D8D8D8;
         display: flex;
         flex-wrap: wrap;
    }
    @media(max-width:900px){
        ul{

         flex-wrap: wrap;
    }
    }
    .centers{
        list-style: none;
        width: auto;
        text-align: center;
        padding: 1rem 0rem;
        flex-wrap: wrap;
    }

</style> --}}

@foreach(GETurl() as $key=>$M)

 <section class="excellence-wrap pt-5">

        <div class="container">

            <div class="row">

                <div class="col-md-12 text-center" data-aos="fade-up" data-aos-duration="3000">

                    <h2 class="heading-black text-white">

                    @if(GetLang()=='en') {{ $M->Section }} @else {{ $M->Section_h }}  @endif

                    </h2>

                    <p class="desc-grey text-white">

                      @if(GetLang()=='en') {{ $M->short_note }} @else {{ $M->short_note_h }}  @endif

                    </p>

                </div>

            </div>

        

            <div class="row">

                <div class="col-md-12 p-0">

                    <ul class="nav nav-tabs ptb-30 tab-center" id="excellenceTab" role="tablist">


                          @foreach(Geturldetail($M->id) as $key=>$M)


                            <li class="nav-item" role="presentation">
                            <a @if($M->external=='yes')
                                onclick="return confirm('Are you sure  external window open?')"  target="_blank" href="{{url($M->url)}}" @elseif($M->external=='no')  href="{{url($M->url)}}" @else href="{{url($M->slug)}}" @endif>
                            <button   class="nav-link"  data-bs-toggle="tab"  type="button" role="tab" aria-controls="fied" aria-selected="false" >  @if(GetLang()=='en') {{ $M->title }} @else {{ $M->title_h }}  @endif <i class="material-icons-round ml-2">east</i></button>
                            </a>
                            </li>

                    @endforeach

                    </ul>




                 {{-- <ul class="nav nav-tabs ptb-30" id="excellenceTab" role="tablist">


                    @foreach(Geturldetail($M->id) as $key=>$M)

                    <li class="nav-item"  role="presentation">
                        <a @if($M->external=='yes')
                            onclick="return confirm('Are you sure  external window open?')"  target="_blank" href="{{url($M->url)}}" @elseif($M->external=='no')  href="{{url($M->url)}}" @else href="{{url($M->slug)}}" @endif>
                         <button   class="nav-link"  data-bs-toggle="tab"  type="button" role="tab" aria-controls="fied" aria-selected="false" >  @if(GetLang()=='en') {{ $M->title }} @else {{ $M->title_h }}  @endif</button>
                        </a>
                      </li>

                    @endforeach


                </ul> --}}



                </div>

            </div>

        </div>

    </section>

@endforeach







<!---------------------------- photo  gallery --------------------------------->



<section class="excellence-wrap ptb-25 bg-light-grey">

        <div class="container-fluid container-lg-sm">

            <div class="row">

                <div class="col-md-12 p-0 bg-light-grey">

                    <ul class="nav nav-tabs li-display pb-5" id="excellenceTab" role="tablist">

                        <li class="nav-item" role="presentation">

                          <button class="nav-link active" id="innovation-tab" data-bs-toggle="tab" data-bs-target="#innovation" type="button" role="tab" aria-controls="innovation" aria-selected="true"> @lang('common.Photo_Gallery')</button>

                        </li>

                        <li class="nav-item" role="presentation">

                          <button class="nav-link" id="coe-tab" data-bs-toggle="tab" data-bs-target="#coe" type="button" role="tab" aria-controls="coe" aria-selected="false">@lang('common.Video_Gallery')</button>

                        </li>

                    </ul>



                    @foreach(GETphoto() as $key=>$M)

                    <div class="tab-content" id="excellenceTabContent">

                        <div class="tab-pane fade show active" id="innovation" role="tabpanel" aria-labelledby="innovation-tab">

                            <div class="excellence-gallery">



                                <div class="row masonry-grid m-0">



                                    @foreach(getphoto_link($M->id) as $key=>$Ms)


                                    <div class="col-md-3 col-lg-3 masonry-column p-0" class=" margin-right">

                                        <div class="d-flex flex-column h-100">
                                        <a href="{{url($Ms->slug)}}">
                                            <div class="thumbnail p-relative">
                                              <span class="top-text">@if(GetLang()=='en') {{ $Ms->title }} @else {{ $Ms->title_h }}  @endif</span>
                                                <img src="{{asset('uploads/header_top'."/".$Ms->image)}}"  title="{{ $Ms->Image_Title }}" alt="{{ $Ms->Image_Alt }}"  class="img-fluid">
                                            </div>
                                            </a>

                                        </div>

                                    </div>

                                    @endforeach

                                </div>

                            </div>




                                <div class="btn-wrap my-4 d-flex justify-content-center pt-3">

                                    <a href="{{url('Multi-image')}}" class="btn btn-white">

                                    @lang('common.view_all')

                                    </a>

                                </div>



                    </div>

                    @endforeach



<!-------------------------------------------------------- video gallery section   ----------------------------------------------------->



                      @foreach(GEtvideo() as $key=>$M)



                        <div class="tab-pane fade" id="coe" role="tabpanel" aria-labelledby="coe-tab">

                            <div class="excellence-gallery">

                                <div class="row masonry-grid m-0">

                                    @foreach(getVideo_link($M->id) as $key=>$Ms)

                                    <div class="col-md-3 col-lg-3 masonry-column p-0">

                                        <div class="d-flex flex-column h-100">
                                        <a href="{{url($Ms->slug)}}" class="">

                                            <div class="thumbnail p-relative">
                                            <span class="top-text"> @if(GetLang()=='en') {{ $Ms->title }} @else {{ $Ms->title_h }}  @endif </span>
                                               <span class="btn-p"><i class="fa fa-play-circle" aria-hidden="true" title="Play"></i> </span>
                                            <img src="{{asset('uploads/header_top'."/".$Ms->image)}}" alt="{{ $Ms->cover_alt}}" title="{{ $Ms->Image_Title }}" alt="{{ $Ms->Image_Alt }}"  style="height: 280px;"  class="img-fluid">

                                            </div>
                                            </a>

                                        </div>

                                    </div>

                                    @endforeach

                                </div>

                            </div>

                                <div class="btn-wrap my-4 d-flex justify-content-center">

                                    <a  href="{{url('/Multi-video')}}"  class="btn btn-white">

                                        @lang('common.view_all')

                                    </a>

                                </div>

                            </div>

                         </div>

                         @endforeach

                      </div>



                    </div>

        </div>

    </section>

<section class="client-wrap ptb-60 ">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="client-slider">

                        <div class="owl-carousel owl-theme" id="clientSlider">

                        @foreach(Getsmallphoto() as $key=>$Ms)

                            <div class="item">

                                <a href="{{ url($Ms->url) }}"  onclick="return confirm('Are you sure  external window open?')"  target="_blank" 

                                 class="client-slider-img">

                                    <img  src="{{ asset('uploads'."/".$Ms->file)}}" alt="skill" title="{{$Ms->title}}" class="img-fluid">

                                </a>

                            </div>

                        @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

