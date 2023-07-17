
@extends('front.Layouts.master')


@section('content')


      <section class="withsidebar-wrap ptb-60">

            <div class="container">

                <div class="row">

               
                    @if (collect($item)->isEmpty())
                        {{-- remember that $contact is your variable --}}

                        <div class="alert alert-success" role="alert">

                            <h4 class="alert-heading">something went wrong </h4>

                            <p>Data Not Found</p>

                        </div>
                    @else
                        @foreach ($item as $items)


                            <div class="col-md-12">
                                <div class="innerpagecontent">
                                    <h3>
                                        <a href=""> 
                                        <span>
                                        
                                            @if (GetLang() == 'en')
                                                {{ $items->title ?? '' }}
                                            @else
                                                {{ $items->title ?? '' }}
                                            @endif
                                        </span>
                                       </a> 
                                    </h3>



                        

                                <!-- Gallery -->


                                    <div class="excellence-wrap back-img Activities img-gallery mt-3 mb-3">
                                        <div class="container">
                                            <div class="row">              
                                                <div class="col-md-12 p-0">
                                                    <div class="excellence-gallery partnership-img">
                                                        <div class="row masonry-grid">

                                                            
                                                            @foreach($data as $item)
                                                            <div class="col-md-3 col-lg-3">
                                                                <div class="d-flex flex-column h-100">
                                                                    <a href="" class="image-link">
                                                                        <div class="thumbnail p-relative">
                                                                            <img src="{{ asset('uploads/multiple/event_image/'.$item->image) }}"
                                                                alt="{{$item->image_alt}}" title="{{$item->image_title}}"
                                                                 loading="lazy">
                                                                            <div class="top-text"> {{$item->image_title}} </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            @endforeach



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                            </div>


                        @endforeach
                    @endif
                </div>
            </div>
        </section>


@endsection
