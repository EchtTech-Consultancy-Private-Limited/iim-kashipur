<style>

#shiva
{
  width: 100px;
	height: 100px;
	background: red;
	-moz-border-radius: 50px;
	-webkit-border-radius: 50px;
	border-radius: 50px;
  float:left;
  margin:5px;
}
.count
{
  line-height: 100px;
  color:white;
  margin-left:30px;
  font-size:25px;
}
#talkbubble {
   width: 120px;
   height: 80px;
   background: red;
   position: relative;
   -moz-border-radius:    10px;
   -webkit-border-radius: 10px;
   border-radius:         10px;
  float:left;
  margin:20px;
}
#talkbubble:before {
   content:"";
   position: absolute;
   right: 100%;
   top: 26px;
   width: 0;
   height: 0;
   border-top: 13px solid transparent;
   border-right: 26px solid red;
   border-bottom: 13px solid transparent;
}

span.percentage {
    font-size: 35px;
}

.linker
{
  font-size : 20px;
  font-color: black;
}

</style>





    <section class="about-wrap ptb-80" >
        <div class="container-fluid container-lg-sm">
            <div class="row">

                @if(GetOrganisationAllDetails('about_image')!='' || GetOrganisationAllDetails('about')!='')
                <div class="col-md-12">
                    <div class="about-body">

                        <!-- <div class="img-wrap" data-aos="fade-right" data-aos-duration="3000">
                            <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('about_image'))}}" style="height:500px;" alt="{{GetOrganisationAllDetails('about_Alt')}}" title="{{ GetOrganisationAllDetails('about_title') }}" class="img-fluid">
                        </div> -->
                        <div class="img-wrap" data-aos="fade-right" data-aos-duration="2000">

                        <video controls autoplay muted id="video">
                            <source src="{{asset('assets/images/banners/about_video.webm')}}" type="video/mp4">
                            </video>
                        </div>

                        <div class="about-content row">
                           <div class="col-md-8">
                           <div data-aos="fade-left" class="about_con">
                                @if(GetOrganisationAllDetails('about')!='')
                                <p class="desc-white" id="para">
                                @if(GetLang()=='en') {!! GetOrganisationAllDetails('about') !!} 
                                @else {!! GetOrganisationAllDetails('about_h') !!}  
                                @endif
                                </p>
                                @endif
                                <div class="btn-wrap">
                                    @if(GetOrganisationAllDetails('external')  == 'yes')
                                    <a onclick="return confirm('Are you sure  external window open?')" target="_blank" href="{{ GetOrganisationAllDetails('url')??''}}" class="btn btn-orange">@lang('common.read_more')</a> 
                                    @else  
                                    <a href="{{ GetOrganisationAllDetails('url')??''}}" class="btn btn-orange">@lang('common.read_more')</a>
                                    @endif
                                </div>
                            </div>
                           </div>
                           <div class="col-md-4">
                           <div class="counter-wrap mt-2 pt-1"  >

                            <ul>
                                @foreach(getproject_logo() as $key=>$logo)
                                        <li>

                                             <span class="counter-no count " >
                                            {{$logo->number}}
                                            </span>

                                            @if($key == 0)
                                            <span class="percentage">%</span>
                                             @elseif($key == 2)
                                             <span class="percentage">+</span>
                                             @endif

                                             <p class="counter-title">
                                                    @if(GetLang()=='en') {{ $logo->name }} @else {{ $logo->name_h }}  @endif
                                            </p>
                                        </li>


                                @endforeach
                            </ul>




                            {{-- <div id="shiva"><span class="count">200</span></div> --}}




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
<script>
    $('.count').each(function () {

        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                //$(this).text($('#get-val').val());
            }
        });
    });

    </script>
