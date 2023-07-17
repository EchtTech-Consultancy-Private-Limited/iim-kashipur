<section class="event-wrap ptb-80">
     @foreach(GETprocces() as $key=>$M)
        <div class="container">
            <div class="row">
                @if(count(Getheading($M->id))>0)
                @foreach(Getheading($M->id) as $key=>$Ms)


                
                <div class="col-md-4">
                    <div class="event-card" data-aos="fade-up" data-aos-duration="3000">
                        <h2 class="heading-black text-start">
                         @if(GetLang()=='en') {{$Ms->title}} @else {{ $Ms->title_h}}  @endif
                        </h2>
                        <div class="event-body">
                            <div class="event-image">
                                <img src="{{ asset('uploads/header_top/'.$Ms->image) }}" title="{{ $Ms->title }}"  alt="{{ $Ms->title }}" class="img-fluid">
                            </div>
                            <div class="event-content">
                                <div class="d-flex">
                                    <p class="name"><i class="fa fa-user" alt="user"> </i> {{ $Ms->By_user }}  </p>
                                    <p class="date"><i class="fa fa-calendar" alt="calendar"></i> {{ $Ms->created_at }}</p>
                                </div>
                                <h3 class="title">
                             @if(GetLang()=='en') {{  $Ms->short}} @else {{  $Ms->short_h }}  @endif
                                </h3>

                                <div class="btn-wrap">

                                    <a  @if($Ms->external=='yes') onclick="return confirm('Are you sure  external window open?')"  href="{{$Ms->url}}" @elseif($Ms->external=='no')  href="{{url($Ms->url)}}"  @endif href="{{$Ms->slug}}" class="red-link">
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

    </section>
