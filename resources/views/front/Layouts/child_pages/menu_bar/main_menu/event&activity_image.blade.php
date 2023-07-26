
@extends('front.Layouts.master')


@section('content')

<div class="internalpagebanner">
    @if(GetOrganisationAllDetails('default_banner_image')!='')
        <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('default_banner_image'))}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
    @else
        <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? ''}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"   alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
    @endif
<div class="imagecaption">
        <div class="container">
            <h1>{{ $item[0]->title ?? '' }}</h1>
        </div>
    </div>
</div>

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>
            <li>
                <span>Students Corner</span>
            </li>
            <li>
                <a href="{{  URL::previous()  }}">
                    <span>Event & Activity</span>
                </a>
            </li>
            <li><span>{{ $item[0]->title ?? '' }}</span></li>
        </ul>
    </div>
</div>


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
                                                                    <a href="{{ asset('uploads/multiple/event_image/'.$item->image) }}" class="image-link">
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
