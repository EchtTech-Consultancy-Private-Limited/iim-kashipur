<div class="site-footer">

    <div class="footer-top ptb-60">

        <div class="container">
            <div class="row">

                <div class="col-md-7 p-lg-0">
                    <div class="row">
                        @foreach (Getfooterlink() as $key => $M)
                            <div class="col-md-4 width50 p-lg-0">

                                <h2 class="footer-top-title">

                                    {{ $M->Section }}

                                </h2>

                                <div class="footer-link">

                                    <ul>

                                        @foreach (GETfooterdatalink($M->id) as $key => $Ms)
                                            <li>
                                                <img src="{{ asset('assets/images/arrow.svg') }}" alt="arrow"
                                                    class="img-fluid">

                                                <a
                                                    @if ($Ms->external == 'yes' && $Ms->url != '') @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank" href="{{ url($Ms->url) }}" @elseif($Ms->external == 'no' && $Ms->url != '')  href="{{ url($Ms->url) }}" @else href="{{ url($Ms->slug) }}" @endif>
                                                    @if (GetLang() == 'en')
                                                        {{ $Ms->title }}
                                                    @else
                                                        {{ $Ms->title_h }}
                                                    @endif
                                                </a>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>
                        @endforeach



                      @foreach(Getfooterlink2() as $key=>$M)

                        <div class="col-md-4 width50 p-lg-0">


                            {{-- <h2 class="footer-top-title">

                            </h2> --}}

                          <div class="footer-link mt-58">

                                    <ul>

                                        @foreach (GETfooterdatalink($M->id) as $key => $Ms)
                                            <li>

                                                <img src="{{ asset('assets/images/arrow.svg') }}" alt="arrow"
                                                    class="img-fluid">

                                                <a
                                                    @if ($Ms->external == 'yes' && $Ms->url != '') @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank" href="{{ url($Ms->url) }}" @elseif($Ms->external == 'no' && $Ms->url != '')  href="{{ url($Ms->url) }}" @else href="{{ url($Ms->slug) }}" @endif>
                                                    @if (GetLang() == 'en')
                                                        {{ $Ms->title }}
                                                    @else
                                                        {{ $Ms->title_h }}
                                                    @endif
                                                </a>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>
                        @endforeach


                            @foreach (Getfooterlink3() as $key => $M)


                                    <div class="col-md-4 p-lg-0">

                                       <div class="footer-link mt-58">

                                            <ul>
                                                @foreach (GETfooterdatalink($M->id) as $key => $Ms)
                                                    <li>


                                                        <img src="{{ asset('assets/images/arrow.svg') }}"
                                                            alt="arrow" class="img-fluid">

                                                        <a
                                                            @if ($Ms->external == 'yes' && $Ms->url != '') @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif  target="_blank" href="{{ url($Ms->url) }}" @elseif($Ms->external == 'no' && $Ms->url != '')  href="{{ url($Ms->url) }}" @else href="{{ url($Ms->slug) }}" @endif>
                                                            @if (GetLang() == 'en')
                                                                {{ $Ms->title }}
                                                            @else
                                                                {{ $Ms->title_h }}
                                                            @endif
                                                        </a>

                                                    </li>
                                                @endforeach

                                            </ul>

                                        </div>

                                    </div>
                            @endforeach
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-7 p-lg-0">

                            <h2 class="footer-top-title">

                                 @lang('common.CONTACT')

                            </h2>

                            <div class="address-wrap">

                                <p class="address">

                                    @if (GetLang() == 'en')
                                        {{ GetOrganisationAllDetails('address') }}
                                    @else
                                        {{ GetOrganisationAllDetails('address_h') }}
                                    @endif

                                </p>

                                <p class="phone">Phone :&nbsp;{{ chunk_split(GetOrganisationAllDetails('contact')) }}
                                </p>

                                <?php
                                    $email_address = GetOrganisationAllDetails('email');
                                    $str = $email_address;
                                    $var = str_replace('@', '[at]', $str);
                                    $email = str_replace('.', '[dot]', $var);
                                ?>



                                <p class="tel-no">Email : &nbsp;{{ $email }}</p>


                            </div>

                            <div class="social-icon">

                                <ul>
                                    @if (GetOrganisationAllDetails('facebook') != '')
                                        <li>
                                            <a href="{{ GetOrganisationAllDetails('facebook') }}"
                                                title="{{ GetOrganisationAllDetails('Facebook_title') }}"
                                                @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                target="_blank">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if (GetOrganisationAllDetails('twitter') != '')
                                        <li>
                                            <a href="{{ GetOrganisationAllDetails('twitter') }}"
                                                title="{{ GetOrganisationAllDetails('Twitter_title') }}"
                                                @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                target="_blank">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif

                                    @if (GetOrganisationAllDetails('instagram') != '')
                                        <li>
                                            <a href="{{ GetOrganisationAllDetails('instagram') }}"
                                                title="{{ GetOrganisationAllDetails('Instagram_title') }}"
                                                @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                target="_blank">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif

                                    @if (GetOrganisationAllDetails('linkedin') != '')
                                        <li>
                                            <a href="{{ GetOrganisationAllDetails('linkedin') }}"
                                                title="{{ GetOrganisationAllDetails('LinkedIn_title') }}"
                                                @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif
                                                target="_blank">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif

                                </ul>

                            </div>

                        </div>


                        <div class="col-md-5">
                            <h2 class="footer-top-title"> @lang('common.LOCATE-US') </h2>

                            <div class="footer-widget">

                                @if (GetOrganisationAllDetails('location') != '')
                                    <iframe src="{{ GetOrganisationAllDetails('location') }}" height="200" width="100%"
                                        style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                @endif

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="footer-bottom">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6 order-s-2">

                    <div class="copyright-text">

                        @lang('common.copyright') © {{ now()->format('Y') }} | @if (GetLang() == 'en')
                            {!! GetOrganisationAllDetails('name') !!}
                        @else
                            {!! GetOrganisationAllDetails('name_h') !!}
                        @endif

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="visitor-wrap">

                        <h2 class="visitor-title">@lang('common.page_last_updated_on'): {{ now()->format('j F Y') }} &nbsp;&nbsp;&nbsp;
                            @lang('common.visitor_counter'): <span class="visitor-count">{{ GetVisits() }}</span></h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function changeURL(){
        alert();
        //var temp = new Array();
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const pageval = urlParams.get('page');
        const yearval = urlParams.get('year');
       // var temp= e.split(',');
        document.location.href = "journal-publications?page="+pageval+'&'+'year='+yearval;
        }
        $(document).ready(function() {
            $(".btn2").click(function() {
                $(".grid-item.filter2").removeClass('d-none');
            });
            $(".btn3").click(function() {
                $(".grid-item.filter3").removeClass("d-none");
            });
        });
</script>

<script>

function increaseFontSize() {
  const elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, a, span, li, button, .copyright-text');

  elements.forEach((element) => {
    // Get the current font size and convert it to a number
    let currentFontSize = parseFloat(window.getComputedStyle(element).fontSize);

    // Check if the current font size is less than the maximum size (25px)
    if (currentFontSize < 20) {
      // Increase the font size by 1px
      currentFontSize += 0.5;
      // Set the new font size
      element.style.fontSize = currentFontSize + 'px';
    }
  });
}


function normaltext() {
  const elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, a, span, li, button, .copyright-text');

  elements.forEach((element) => {
       // Check if the current font size is less than the maximum size (25px)
    element.style.fontSize ='';
  });
}


function decreaseFontSize() {
  const elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, a, span, li, button, .copyright-text');

  elements.forEach((element) => {
    // Get the current font size and convert it to a number
    let currentFontSize = parseFloat(window.getComputedStyle(element).fontSize);

    // Check if the current font size is less than the maximum size (25px)
    if (currentFontSize > 12) {
      // Increase the font size by 1px
      currentFontSize -= 1;
      // Set the new font size
      element.style.fontSize = currentFontSize + 'px';
    }
  });
}


    $(document).ready(function(){
        // $(".dropdown-toggle.focus-open-add").click(function(){
        //     $(".dropdown-toggle.focus-open-add.show").removeClass('show');
        //     $(".dropdown-menu.add-class-focus.show").removeClass('show');
        // });

        $("p, h1, h2, h3, h4, h5, h6,span,button, .copyright-text").attr('tabindex' , '0');

        $(".text-assesbility ").focus(function(){
            $(".text-assesbility-button").addClass('d-block');
        });

        $(".theme-btn-light").focus(function(){
            $(".text-assesbility-button").removeClass('d-block');
        });

        // $(".banner").focus(function(){
        //     $(".text-assesbility-button").removeClass('d-block');
        // });

    });



</script>


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



