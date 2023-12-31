<section class="client-wrap ptb-60 ">

    <div class="container">

        <div class="row">

            <div class="col-md-12">



                <div class="client-slider">

                    <div class="owl-carousel owl-theme" id="clientSlider">

                    @foreach(Getsmallphoto() as $key=>$Ms)

                        <div class="item">

                            <a href="{{ url($Ms->url) }}"  onclick="return confirm('Are you sure  external window open?')"  target="_blank" class="client-slider-img">

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



<div class="site-footer">

    <div class="footer-top ptb-60">

        <div class="container">



            <div class="row">

              @foreach(Getfooterlink() as $key=>$M)

                <div class="col-md-3 width50"> 

                    <h2 class="footer-top-title">

                       {{$M->Section}}

                    </h2>

                    <div class="footer-link">

                        <ul>

                          @foreach(GETfooterdatalink($M->id) as $key=>$Ms)

                            <li>
                                <img src="{{ asset('assets/images/arrow.svg')}}" alt="arrow" class="img-fluid">

                                <a @if($Ms->external=='yes')  onclick="return confirm('Are you sure  external window open?')"  target="_blank" href="{{url($Ms->url)}}" @elseif($Ms->external=='no')  href="{{url($Ms->url)}}" @else href="{{url($Ms->Footer_info."/".$Ms->slug)}}" @endif>@if(GetLang()=='en') {{ $Ms->title }} @else {{ $Ms->title_h }}  @endif</a>

                            </li>

                          @endforeach

                        </ul>

                    </div>

                </div>

              @endforeach

              @foreach(Getfooterlink2() as $key=>$M)

                <div class="col-md-3 width50">

                    <h2 class="footer-top-title">



                    </h2>

                    <div class="footer-link mt-58">

                        <ul>

                          @foreach(GETfooterdatalink($M->id) as $key=>$Ms)

                            <li>

                                <img src="{{ asset('assets/images/arrow.svg')}}" alt="arrow" class="img-fluid">

                                <a  @if($Ms->external=='yes')  onclick="return confirm('Are you sure  external window open?')"  target="_blank" href="{{url($Ms->url)}}" @elseif($Ms->external=='no')  href="{{url($Ms->url)}}" @else href="{{url($Ms->Footer_info2."/".$Ms->slug)}}" @endif      >@if(GetLang()=='en') {{ $Ms->title }} @else {{ $Ms->title_h }}  @endif</a>

                            </li>

                          @endforeach

                        </ul>

                    </div>

                </div>

                @endforeach

                <div class="col-md-3">

                    <h2 class="footer-top-title">

                        CONTACT

                    </h2>

                    <div class="address-wrap">

                        <p class="address">

                          @if(GetLang()=='en'){{GetOrganisationAllDetails('address')}} @else {{GetOrganisationAllDetails('address_h')}}  @endif

                        </p>

                        <p class="phone">Phone:{{chunk_split(GetOrganisationAllDetails('contact'))}}</p>

                        <a href="#" class="tel-no">Email:{{GetOrganisationAllDetails('email')}}</a>

                    </div>



                    <div class="social-icon">

                        <ul>

                            @if(GetOrganisationAllDetails('facebook')!='')
                            <li>
                                <a href="{{GetOrganisationAllDetails('facebook')}}" alt="{{GetOrganisationAllDetails('Facebook_Alt')}}"  title="{{GetOrganisationAllDetails('Facebook_title')}}"  onclick="return confirm('Are you sure  external window open?')" target="_blank">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                           @endif
                           @if(GetOrganisationAllDetails('twitter')!='')
                           <li>
                               <a href="{{GetOrganisationAllDetails('twitter')}}" alt="{{GetOrganisationAllDetails('twitter_Alt')}}" title="{{GetOrganisationAllDetails('Twitter_title')}}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                                   <i class="fa fa-twitter" aria-hidden="true"></i>
                               </a>
                           </li>
                       @endif

                       @if(GetOrganisationAllDetails('instagram')!='')
                       <li>
                           <a href="{{GetOrganisationAllDetails('instagram')}}" alt="{{GetOrganisationAllDetails('Instagram_Alt')}}" title="{{GetOrganisationAllDetails('Instagram_title')}}"  onclick="return confirm('Are you sure  external window open?')" target="_blank" >
                               <i class="fa fa-instagram" aria-hidden="true"></i>
                           </a>
                       </li>
                      @endif

                      @if(GetOrganisationAllDetails('linkedin')!='')
                      <li>
                          <a href="{{GetOrganisationAllDetails('linkedin')}}" alt="{{GetOrganisationAllDetails('LinkedIn_Alt')}}" title="{{GetOrganisationAllDetails('LinkedIn_title')}}"  onclick="return confirm('Are you sure  external window open?')"  target="_blank">
                              <i class="fa fa-linkedin" aria-hidden="true"></i>
                          </a>
                      </li>
                     @endif




                        </ul>

                    </div>

                </div>

                <div class="col-md-3">
                <h2 class="footer-top-title">LOCATE US </h2>

                    <div class="footer-widget">
                    @if(GetOrganisationAllDetails('location')!='')
                    <iframe src="{{GetOrganisationAllDetails('location')}}" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @endif
                    </div>

                  </div>

            </div>

        </div>

    </div>

    <div class="footer-bottom">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <div class="copyright-text">

                    @lang('common.copyright') © {{ now()->format('Y') }} | @if(GetLang()=='en') {!! GetOrganisationAllDetails('name') !!} @else {!! GetOrganisationAllDetails('name_h') !!}  @endif

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="visitor-wrap">

                    <h2 class="visitor-title">@lang('common.visitor_counter'): <span class="visitor-count">{{GetVisits()}}</span></h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- <script>
    // disable right click
    document.addEventListener('contextmenu', event => event.preventDefault());

    document.onkeydown = function (e) {

        // disable F12 key
        if(e.keyCode == 123) {
            return false;
        }

        // disable I key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 73){
            return false;
        }

        // disable J key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }

        // disable U key
        if(e.ctrlKey && e.keyCode == 85) {
            return false;
        }
    }

</script> --}}

