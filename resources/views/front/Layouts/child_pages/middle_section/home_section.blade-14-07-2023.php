@extends('front.Layouts.master')

@section('content')


    @foreach ($item as $items)
        <div class="internalpagebanner">

            @if ($item[0]->banner_image != '')
                <img src="{{ asset('page/banner/' . $item[0]->banner_image) ?? '' }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                    alt="{{ $item[0]->banner_alt ?? '' }}" title="{{ $item[0]->banner_title ?? '' }}">
            @else
                <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;" alt="{{ $item[0]->name ?? '' }}"
                    title="{{ $item[0]->name ?? '' }}">
            @endif

            <div class="imagecaption">

                <div class="container">

                    <h1>{{ $items->name }}</h1>

                </div>

            </div>

        </div>



        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/') }}"><svg viewBox="0 0 24 24">
                                <path fill="none" d="M0 0h24v24H0V0z" />
                                <path
                                    d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                            </svg></a></li>
                    <li><span>{{ $items->name }}</span></li>
                </ul>
            </div>
        </div>
    @endforeach

    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col-md-1">

                </div>

                @if (collect($item)->isEmpty())
                    {{-- remember that $contact is your variable --}}

                    <div class="alert alert-success" role="alert">

                        <h4 class="alert-heading">something went wrong </h4>

                        <p>Data Not Found</p>



                    </div>
                @else
                    @foreach ($item as $items)
                        <div class="col-md-11">

                            <div class="innerpagecontent">



                                <h3><span>{{ $items->name }}</span></h3>

                                <div class="commontxt">

                                    <div class="row">



                                        <div class="col-md-13 col-lg-12">

                                            <p>

                                                {!! $items->content !!}



                                            </p>

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
