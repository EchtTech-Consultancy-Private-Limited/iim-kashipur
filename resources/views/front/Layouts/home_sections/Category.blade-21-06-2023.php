
    <!-- <section class="corner-wrap">

<div class="container-fluid container-lg-sm">

    <div class="row">



      @foreach(GETstudent() as $key=>$M)

        <div class="col-md-6 col-lg-4 p-0">

            <div class="student-wrap">

                <div class="mb-5 width-max">

                    <h2 class="heading-white">

                         @if(GetLang()=='en') {{ $M->Section }} @else {{ $M->Section_h }}  @endif

                    </h2>

                    <a href="javascript:void(0);" class="white-link text-end">

                        @lang('common.READ_MORE')

                        <span class="material-icons-round">east</span>

                    </a>

                </div>


                <ul class="list" data-aos="fade-right" data-aos-duration="3000">


                    @if(count(Getstundentdetail($M->id))>0)

                    @foreach(Getstundentdetail($M->id) as $key=>$n)

                    <li>

                        <a  @if($n->external=='yes') onclick="return confirm('Are you sure  external window open?')" target="_blank"  href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif href="{{$n->slug}}">   @if(GetLang()=='en') {{ $n->title }} @else {{ $n->title_h }}  @endif

                            <span class="material-icons-round">east</span>

                        </a>

                    </li>



                    @endforeach

                   @endif

                </ul>

            </div>

        </div>

     @endforeach


 -->




<!------------------------------------------- facebook --------------------------------------------- -->





<!--

        <div class="col-md-6 col-lg-4 p-0">

             <div class="post-wrap">

                <div class="post-card mb-3">

                    <div class="post-header facebook">

                        <h2 class="heading">

                        Facebook Latest Post

                            <i class="fa fa-facebook" aria-hidden="true"></i>

                        </h2>

                    </div>

                    <div class="post-body">

                        <ul>

                            <li>

                                <div class="media d-flex">

                                    <div class="flex-shrink-0">

                                        <div class="user-img">

                                            <img src="assets/images/user.svg" alt="user" class="img-fluid">

                                        </div>

                                    </div>

                                    <div class="flex-grow-1 ms-2">



                                       IIM Kashipur

                                        <span class="time">

                                            20 Min

                                        </span>

                                    </div>

                                </div>

                                <p class="desc">

                                    Dear Aspirants, Many questions about the interview will be on your minds as you all are getting ready for CAT Interviews.

                                </p>

                                <div class="action">

                                    <a href="javascript:void(0);"><i class="fa fa-heart" aria-hidden="true"></i>9K</a>

                                    <a href="javascript:void(0);"><i class="fa fa-share" aria-hidden="true"></i>9K</a>

                                </div>

                            </li>

                            <li>

                                <div class="media d-flex">

                                    <div class="flex-shrink-0">

                                        <div class="user-img">

                                            <img src="assets/images/user.svg" alt="user" class="img-fluid">

                                        </div>

                                    </div>

                                    <div class="flex-grow-1 ms-2">

                                        IIM Kashipur

                                        <span class="time">

                                            20 Min

                                        </span>

                                    </div>

                                </div>

                                <p class="desc">

                                    With post-graduation in Public Administration and Policy Studies, I am poised to embark on a fulfilling career in.

                                </p>

                                <div class="action">

                                    <a href="javascript:void(0);"><i class="fa fa-heart" aria-hidden="true"></i>9K</a>

                                    <a href="javascript:void(0);"><i class="fa fa-share" aria-hidden="true"></i>9K</a>

                                </div>

                            </li>

                        </ul>

                    </div>

                </div>

                <div class="post-card">

                    <div class="post-header linkedin">

                        <h2 class="heading">

                            Linkedin Latest Post

                            <i class="fa fa-linkedin" aria-hidden="true"></i>

                        </h2>

                    </div>

                    <div class="post-body">

                        <ul>

                            <li>

                                <div class="media d-flex">

                                    <div class="flex-shrink-0">

                                        <div class="user-img">

                                            <img src="assets/images/user.svg" alt="user" class="img-fluid">

                                        </div>

                                    </div>

                                    <div class="flex-grow-1 ms-2">

                                        IIM Kashipur

                                        <span class="time">

                                            20 Min

                                        </span>

                                    </div>

                                </div>



                                <p class="desc">

                                    Dear Aspirants, Many questions about the interview will be on your minds as you all are getting ready for CAT Interviews.

                                </p>

                                <div class="action">

                                    <a href="javascript:void(0);"><i class="fa fa-heart" aria-hidden="true"></i>9K</a>

                                    <a href="javascript:void(0);"><i class="fa fa-share" aria-hidden="true"></i>9K</a>

                                </div>

                            </li>

                            <li>

                                <div class="media d-flex">

                                    <div class="flex-shrink-0">

                                        <div class="user-img">

                                            <img src="assets/images/user.svg" alt="user" class="img-fluid">

                                        </div>

                                    </div>

                                    <div class="flex-grow-1 ms-2">

                                        IIM Kashipur

                                        <span class="time">

                                            20 Min

                                        </span>

                                    </div>

                                </div>

                                <p class="desc">

                                    With post-graduation in Public Administration and Policy Studies, I am poised to embark on a fulfilling career in.

                                </p>

                                <div class="action">

                                    <a href="javascript:void(0);"><i class="fa fa-heart" aria-hidden="true"></i>9K</a>

                                    <a href="javascript:void(0);"><i class="fa fa-share" aria-hidden="true"></i>9K</a>

                                </div>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div> -->



{{--------------------------------- student corner slider--------------------------------- --}}







<!--


    @foreach(GETstudent() as $key=>$M)

    <div class="col-md-12 col-lg-4 p-0">

        <div class="slider-wrap">

            <div class="owl-carousel owl-theme" id="studentSlider">

                @if(count(Getstundentdetail($M->id))>0)

                @foreach(Getstundentdetail($M->id) as $key=>$n)

               <div class="item">



                    <div class="img-wrap">

                     <img src="{{ asset('uploads/header_top/'.$n->image) }}" title="{{ $n->Image_Title }}" alt="{{ $n->Image_Alt }}" class="img-fluid">

                    </div>

                </div>

                @endforeach

                @endif

            </div>

        </div>

    </div>

  @endforeach



</div>

</div>

</section> -->




<!-- New Section -->


<section class="corner-wrap mt-5">
   <div class="container-fluid container-lg-sm">
      <div class="row">
         <!------------------------------------------- facebook Start --------------------------------------------- -->
         <div class="col-md-4 col-lg-4 p-0">
           <div class="fb-set">
             <h3 class="social-heading"> Facebook Feed </h3>
             <img src="{{ asset('assets/images/fb-img.PNG') }}" alt="facebook" title="facebook">
             </div>
              
         </div>
         <!------------------------------------------- facebook End--------------------------------------------- -->
        <div class="col-md-8 col-lg-8">
            <div class="post-wrap row p-0">
               <div class="post-card col-md-6 box-1">
                  <div class="col-d">
                     <div class="mb-3 width-max">
                        <h2 class="heading-white text-right">
                           @if(GetLang()=='en') {{ $M->Section }} @else {{ $M->Section_h }}  @endif
                        </h2>
                        <a href="javascript:void(0);" class="white-link text-end">
                        @lang('common.READ_MORE')
                        <span class="material-icons-round">east</span>
                        </a>
                     </div>
                     <ul class="list text-right" data-aos="fade-right" data-aos-duration="3000">
                        @if(count(Getstundentdetail($M->id))>0)
                        @foreach(Getstundentdetail($M->id) as $key=>$n)
                        <li>
                           <a  @if($n->external=='yes') onclick="return confirm('Are you sure  external window open?')" target="_blank"  href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif href="{{$n->slug}}">   @if(GetLang()=='en') {{ $n->title }} @else {{ $n->title_h }}  @endif
                           <span class="material-icons-round">east</span>
                           </a>
                        </li>
                        @endforeach
                        @endif
                     </ul>
                  </div>
               </div>


               @foreach(GetstundentdetailS($M->id) as $key=>$n)
               <div class="post-card col-md-6 box-2">
               <img src="{{ asset('uploads/header_top/'.$n->image) }}" title="{{ $n->Image_Title }}" alt="{{ $n->Image_Alt }}" class="img-fluid">
                </div>
               <div class="post-card col-md-12 box-3">

                  <div class="blog-newstyle-2" style="font-size: 20px;">
                     <div class="section-title-box" style="font-size: 20px;">

                        <h2 style="font-size: 40px;color">

                            <a style="color:#c1272d"  @if($n->external=='yes') onclick="return confirm('Are you sure  external window open?')" target="_blank"   href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif href="{{$n->slug}}">   @if(GetLang()=='en') {{ $n->title }} @else {{ $n->title_h }}  @endif

                            </a></h2>


                     </div>
                     <h3 style="font-size: 30px;"> @if(GetLang()=='en') {{substr_replace($n->short,'...',150)}} @else  {{substr_replace($n->short_h,'...',200)}}  @endif</h3>

                     {{-- @if(GetLang()=='en')   {{substr_replace($n->short,'...',135)}} @else  {{substr_replace($n->short,'...',400)}}  @endif --}}

                     <a href="#" class="view-btn" style="font-size: 18px;">View all <i class="material-icons-round">east</i></a>
                  </div>

               </div>
               @endforeach
            </div>
        </div>

    <div class="col-md-8 col-lg-8 p-0">
          <div class="slider-wrap social">
            <div class="owl-carousel owl-theme" id="studentSlider">
               @if(count(Getstundentdetail($M->id))>0)
               @foreach(Getstundentdetail($M->id) as $key=>$n)
               <div class="item">
                  <div class="img-wrap">
                     <img src="{{ asset('uploads/header_top/'.$n->image) }}" title="{{ $n->Image_Title }}" alt="{{ $n->Image_Alt }}" class="img-fluid">
                  </div>
               </div>
               @endforeach
               @endif
            </div>
        </div>
    </div>
        <!-- <div class="col-md-4 col-lg-4 p-0">
            <div class="post-wrap p-0">
               <div class="post-card box-4"></div>
               <div class="post-card box-5">
                  <div class="col-d">
                     <div class="mb-5 width-max">
                        <h2 class="heading-white text-right">
                           @if(GetLang()=='en') {{ $M->Section }} @else {{ $M->Section_h }}  @endif
                        </h2>
                        <a href="javascript:void(0);" class="white-link text-end">
                        @lang('common.READ_MORE')
                        <span class="material-icons-round">east</span>
                        </a>
                     </div>
                     <ul class="list text-right" data-aos="fade-right" data-aos-duration="3000">
                        @if(count(Getstundentdetail($M->id))>0)
                        @foreach(Getstundentdetail($M->id) as $key=>$n)
                        <li>
                           <a  @if($n->external=='yes') onclick="return confirm('Are you sure  external window open?')" target="_blank"  href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif href="{{$n->slug}}">   @if(GetLang()=='en') {{ $n->title }} @else {{ $n->title_h }}  @endif
                           <span class="material-icons-round">east</span>
                           </a>
                        </li>
                        @endforeach
                        @endif
                     </ul>
                  </div>
               </div>
            </div>
        </div> -->



        <!-- Linkedin Api  Start -->

         <div class="col-md-4 col-lg-4 p-0">
           <div class="linkedin-set">

           <h3 class="social-heading"> Linkedin Feed </h3>

           <iframe src="https://www.linkedin.com/embed/feed/update/urn:li:ugcPost:6966090170878050305" allowfullscreen="" title="Embedded post" width="100%" height="530" frameborder="0"></iframe>
           </div>
         </div>

          <!-- Linkedin Api  End -->
      </div>
   </div>
   </div>
</section>




