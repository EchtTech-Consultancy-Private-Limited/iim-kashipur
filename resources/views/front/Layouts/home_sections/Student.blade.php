   <!--  <section class="event-wrap ptb-80">
     @foreach (GETprocces() as $key => $M)
<div class="container">
            <div class="row">

                @if (count(Getheading($M->id)) > 0)
@foreach (Getheading($M->id) as $key => $Ms)
<div class="col-md-4">
                    <div class="event-card" data-aos="fade-up" data-aos-duration="3000">
                        <h2 class="heading-black text-start">
                         @if (GetLang() == 'en')
{{ $Ms->title }}
@else
{{ $Ms->title_h }}
@endif
                        </h2>
                        <div class="event-body">
                            <div class="event-image">
                                <img src="{{ asset('uploads/header_top/' . $Ms->image) }}" title="{{ $Ms->title }}"  alt="{{ $Ms->title }}" class="img-fluid">
                            </div>
                            <div class="event-content">
                                <div class="d-flex">
                                    <p class="date"><i class="fa fa-calendar" alt="calendar"></i> {{ $Ms->created_at }}</p>
                                </div>
                                <h3 class="title">
                             @if (GetLang() == 'en')
{{ $Ms->short }}
@else
{{ $Ms->short_h }}
@endif
                                </h3>

                                <div class="btn-wrap">

                                    <a  @if ($Ms->external == 'yes') onclick="return confirm('Are you sure  external window open?')"  href="{{ $Ms->url }}" @elseif($Ms->external == 'no')  href="{{ url($Ms->url) }}" @endif href="{{ $Ms->slug }}" class="red-link">
                                        @lang('common.READ_MORE')  <img src="assets/images/read-more.svg" alt="read-more" class="img-fluid">
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
@endforeach
@endif
            </div>
        </div>
@endforeach

    </section> -->



   <!-- Static  Code -->

   <section class="event-wrap ptb-80">
       @foreach (GETprocces() as $key => $M)
       <div class="container">
           <div class="row">
               @if (count(GetheadingN($M->id)) > 0)
               @foreach (GetheadingN($M->id) as $key => $Ms)
               @if ($key == 0)
               <div class="col-md-4">
                   <div class="event-card" data-aos="fade-up" data-aos-duration="3000">
                       <h2 class="heading-black text-start" tabindex="0">
                           @lang('common.News-Events')
                       </h2>
                       <div class="event-body">
                           <div class="event-image">
                               <img src="{{ asset('uploads/header_top/' . $Ms->image) }}" title="{{ $Ms->title }}"
                                   alt="{{ $Ms->title }}" class="img-fluid">
                           </div>
                           <div class="event-content" tabindex="0">
                               <!-- <div class="d-flex">
                                    <p class="date"><i class="fa fa-calendar" alt="calendar"></i> {{ $Ms->created_at }}</p>
                                </div> -->
                               <h3 class="title">
                                   @if (GetLang() == 'en')
                                   {{ $Ms->short }}
                                   @else
                                   {{ $Ms->short_h }} @endif
                               </h3>

                               <div class="btn-wrap">

                                   <a @if ($Ms->external == 'yes') @if (GetLang() == 'en') onclick="return confirm('This
                                       link will take you to an external web site.')" @else onclick="return confirm('यह
                                       लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                       href="{{ $Ms->url }}" @elseif($Ms->external == 'no')
                                       href="{{ url($Ms->url) }}" @endif
                                       class="red-link">
                                       @lang('common.READ_MORE') <img src="assets/images/read-more.svg" alt="read-more"
                                           class="img-fluid">
                                   </a>

                               </div>

                           </div>
                       </div>
                   </div>
               </div>
               @endif
               @endforeach
               @endif

               @if (count(GetheadingI($M->id)) > 0)
               @foreach (GetheadingI($M->id) as $key => $Ms)
               @if ($key == 0)
               <div class="col-md-4">
                   <div class="event-card aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">
                       <h2 class="heading-black text-start" tabindex="0"> @lang('common.Industry-Connect')</h2>
                       <div class="event-body">
                           <div class="event-image">
                               <img src="{{ asset('uploads/header_top/' . $Ms->image) }}" title="{{ $Ms->title }}"
                                   alt="{{ $Ms->title }}" class="img-flud" loading="lazy">
                           </div>
                           <div class="event-content">
                               <!-- <div class="d-flex">
                                    <p class="date"><i class="fa fa-calendar" alt="calendar"></i> 2023-03-02 18:44:28</p>
                                </div> -->
                               <h3 class="title" tabindex="0">
                                   @if (GetLang() == 'en')
                                   {{ $Ms->short }}
                                   @else
                                   {{ $Ms->short_h }} @endif
                               </h3>

                               <div class="btn-wrap">

                                   <a @if ($Ms->external == 'yes') @if (GetLang() == 'en') onclick="return confirm('This
                                       link will take you to an external web site.')" @else onclick="return confirm('यह
                                       लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                       href="{{ $Ms->url }}" @elseif($Ms->external == 'no')
                                       href="{{ url($Ms->url) }}" @endif
                                       class="red-link">
                                       @lang('common.READ_MORE') <img src="assets/images/read-more.svg" alt="read-more"
                                           class="img-fluid">
                                   </a>

                               </div>

                           </div>
                       </div>
                   </div>
               </div>
               @endif
               @endforeach
               @endif


               <div class="col-md-4">
                   <div class="event-card aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">
                       <h2 class="heading-black text-start" tabindex="0">@lang('common.Notice-Board')</h2>
                       <div class="myslider">
                           <!-- ******************************************** -->

                           <!-- ******************************************** -->
                           <div class="marquee marquee-vertical" data-speed="50">
                               <div class="marquee-wrapper event-body   ">
                                   <div class="marquee-content">
                                       @if (count(Getheading($M->id)) > 0)
                                       @foreach (Getheading($M->id) as $key => $Ms)
                                       {{-- {{ Getarchivedata(now()->format('Y-m-d'), $Ms->archive_date) != 'True' }}
                                       --}}
                                       @if (Getarchivedata(now()->format('Y-m-d'), $Ms->archive_date) != 'True')
                                       <div class="event-content notice-body">
                                           <a @if ($Ms->external == 'yes') @if (GetLang() == 'en') onclick="return
                                               confirm('This link will take you to an external web site.')" @else
                                               onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले
                                               जाएगा।')"
                                               @endif
                                               href="{{ $Ms->url }}"
                                               @elseif($Ms->external == 'no')
                                               href="{{ url($Ms->url) }}" @endif
                                               class="red-link">
                                               <h3 class="title" tabindex="0">
                                                   @if (GetLang() == 'en')
                                                   {{ $Ms->short }}
                                                   @else
                                                   {{ $Ms->short_h }} @endif
                                               </h3>

                                               <div class="btn-wrap">
                                                   <a @if ($Ms->external == 'yes') @if (GetLang() == 'en')
                                                       onclick="return
                                                       confirm('This link will take you to an external web site.')"
                                                       @else
                                                       onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले
                                                       जाएगा।')"
                                                       @endif
                                                       href="{{ $Ms->url }}"
                                                       @elseif($Ms->external == 'no')
                                                       href="{{ url($Ms->url) }}" @endif
                                                       class="red-link">
                                                       @lang('common.READ_MORE') <img src="assets/images/read-more.svg"
                                                           alt="read-more" class="img-fluid">
                                                   </a>
                                               </div>
                                           </a>
                                       </div>
                                       @endif
                                       @endforeach
                                       @endif






                                   </div>
                               </div>
                           </div>
                           <!-- ************************************************* -->


                       </div>
                   </div>
               </div>
           </div>
       </div>
       @endforeach
   </section>
   <script src="{{ asset('/assets/js/marqueedirection.js') }}"></script>

   <script>
$(".marquee").marquee();


$(".marquee").trigger("forward");




$(".marquee").hover(function() {
    $(this).trigger("pause");
}, function() {
    $(this).trigger("forward");
});
console.log("marquee is running");
//
// marquee js
// $('.myslider').slick({
//     slidesToScroll: 1,
//     item: 4,
//     arrows: false,
//     dots: false,
//     autoplay: true,
//     vertical: true,
//     verticalSwiping: true,
//     margin: 20,

// });
   </script>

