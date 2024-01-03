
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
   <div class="container container-lg-sm">
      <div class="row">



        <div class="col-md-12 mb-5">
            <div class="row image-section-iimkashipur p-relative mb-3">

                   <div class="col-md-6">
                    @foreach(GetstundentdetailS($M->id) as $key=>$n)
                    <div class="post-card col-md-12 box-3">

                       <div class="blog-newstyle-2">
                          <div class="section-title-box pt-50">

                             <h2 class="life_kashipur">

                             <a style="color:#181832;"  @if($n->external=='yes') @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank"   href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif>
                                 {{-- @if(GetLang()=='en') {{ $n->title }} @else {{ $n->title_h }}  @endif --}}

                                 @lang('common.Life') <br> <span style="color:#c1272d"> @ </span> @lang('common.IIM-Kashipur')



                                </a>

                           </h2>

                          </div>
                          <h3 style="font-size: 18px;color: #181832;font-weight: 600;line-height: 30px;}"> @if(GetLang()=='en') {{substr_replace($n->short,'...',150)}} @else  {{substr_replace($n->short_h,'...',200)}}  @endif</h3>

                          <a  @if($n->external=='yes') @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank"   href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif class="view-btn pt-4" style="font-size: 18px;background:transparent;"> @lang('common.view_all') <i class="material-icons-round">east</i></a>

                        </div>

                    </div>
                    @endforeach
                </div>
                   <div class="col-md-6 p-0">
                    <img src="{{ asset('uploads/LifeatIIMKSP template.PNG') }}" alt="IIM Kashipur" title="IIM Kashipur" />
                   </div>


                 <div class="post-card Student_Corner box-1">
                    <div class="col-d">
                       <div class="mb-2 width-max">
                          <h2 class="heading-white text-right">
                             @if(GetLang()=='en') {{ $M->Section }} @else {{ $M->Section_h }}  @endif
                          </h2>

                       </div>
                       <ul class="list text-right">
                          @if(count(Getstundentdetail($M->id))>0)
                          @foreach(Getstundentdetail($M->id) as $key=>$n)
                          <li>
                             <a  @if($n->external=='yes')  @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank"  href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif>   @if(GetLang()=='en') {{ $n->title }} @else {{ $n->title_h }}  @endif
                             <i class="material-icons-round">east</i>
                             </a>
                          </li>
                          @endforeach
                          @endif
                       </ul>
                    </div>
                 </div>
                </div>
        </div>



           <!-- Linkedin Api  Start -->

           <div class="col-md-4 col-lg-4 mb-4">
            <div class="linkedin-set">


            <h3 class="social-heading">  @lang('common.Linkedin-Feed')</h3>

            <iframe src="https://www.linkedin.com/embed/feed/update/urn:li:ugcPost:6966090170878050305" allowfullscreen="" title="Embedded post" width="100%" height="350" frameborder="0"></iframe>

            </div>
          </div>

           <!-- Linkedin Api  End -->


              <!-- Linkedin Api  Start -->

         <div class="col-md-4 col-lg-4 mb-4">
            <div class="linkedin-set instagram-bg">


            <h3 class="social-heading">  @lang('common.Instagram-Feed')</h3>

            <!-- <iframe src="https://www.linkedin.com/embed/feed/update/urn:li:ugcPost:6966090170878050305" allowfullscreen="" title="Embedded post" width="100%" height="350" frameborder="0"></iframe> -->

                 <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/iimkashipur/" data-instgrm-version="12" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:100%; min-width:100%; padding:0; width:99.375%; width:undefinedpx;height:undefinedpx;max-height:358PX; width:undefinedpx;"><div style="padding:16px;"> <a id="main_link" href="iimkashipur" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="iimkashipur" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Shared post</a> on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;">Time</time></p></div></blockquote><script src="https://www.instagram.com/embed.js"></script><script type="text/javascript" src="https://www.embedista.com/j/instagramfeed.js"></script><div style="overflow: auto; position: absolute; height: 0pt; width: 0pt;"><a href="https://www.embedista.com/instagramfeed">Embed Instagram Post</a> Code Generator</div></div><style>.boxes3{height:175px;width:153px;} #n img{max-height:none!important;max-width:none!important;background:none!important} #inst i{max-height:none!important;max-width:none!important;background:none!important}</style>


            </div>
        

           <!-- Linkedin Api  End -->


         <!------------------------------------------- facebook Start --------------------------------------------- -->
         <div class="col-md-4 col-lg-4 mb-4">
           <div class="fb-set">
             <h3 class="social-heading">  @lang('common.Facebook-Feed') </h3>
             <div class="fb-page" style="width: 100%;" data-href="https://www.facebook.com/IndianInstituteOfManagementKashipur" data-tabs="timeline" data-width="" data-height="358" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/IndianInstituteOfManagementKashipur" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/IndianInstituteOfManagementKashipur">IIM Kashipur</a></blockquote></div>
            </div>
         </div>

         <!------------------------------------------- facebook End--------------------------------------------- -->

{{--

         <div class="col-md-8 col-lg-8">
            <div class="post-wrap row p-0">
               <div class="post-card col-md-6 box-1">
                  <div class="col-d">
                     <div class="mb-3 width-max">
                        <h2 class="heading-white text-right">
                           @if(GetLang()=='en') {{ $M->Section }} @else {{ $M->Section_h }}  @endif
                        </h2>
                     </div>
                     <ul class="list text-right" data-aos="fade-right" data-aos-duration="3000">
                        @if(count(Getstundentdetail($M->id))>0)
                        @foreach(Getstundentdetail($M->id) as $key=>$n)
                        <li>
                           <a  @if($n->external=='yes') onclick="return confirm('Are you sure  external window open?')" target="_blank"  href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif href="{{$n->slug}}">   @if(GetLang()=='en') {{ $n->title }} @else {{ $n->title_h }}  @endif
                           <i class="material-icons-round">east</i>
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

                     <a style="color:#c1272d"  @if($n->external=='yes') onclick="return confirm('Are you sure  external window open?')" target="_blank"   href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif href="{{$n->slug}}">   @if(GetLang()=='en') {{ $n->title }} @else {{ $n->title_h }}  @endif </a>

                      </h2>

                     </div>
                     <h3 style="font-size: 30px;"> @if(GetLang()=='en') {{substr_replace($n->short,'...',150)}} @else  {{substr_replace($n->short_h,'...',200)}}  @endif</h3>
                     <a @if($n->external=='yes') onclick="return confirm('Are you sure  external window open?')" target="_blank"   href="{{$n->url}}" @elseif($n->external=='no')  href="{{url($n->url)}}" @endif href="{{$n->slug}}" class="view-btn" style="font-size: 18px;">View all <i class="material-icons-round">east</i></a>
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
    </div> --}}
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
      </div>
   </div>
   </div>
</section>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0&appId=223731790466061&autoLogAppEvents=1" nonce="w0TkJS7B"></script>



