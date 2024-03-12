@extends('front.Layouts.master')

@section('content')
    <div class="internalpagebanner">

        <img src="https://iimkashipur.ac.in/uploads/site-logo/170228510481.png" alt="Doctoral Programme" title="Doctoral Programme" loading="lazy">

        <div class="imagecaption">
            <div class="container">
                <h1 tabindex="0">
                    {{$pageDetails->banner_title ?? ''}}
                </h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="https://dev.iim.staggings.in"><svg viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"></path>
                        </svg></a></li>


                <li>

                        <span tabindex="0">
                                                          {{ $pageDetails->name ?? ''  }}
                                                    </span>


                </li>
            </ul>
        </div>
    </div>


    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">


                <div class="col-md-12">
                    <div class="innerpagecontent master-class">
                        <h3 tabindex="0"><span tabindex="0">
                                                                                    {{ $pageDetails->name ?? ''  }}
                                                                            </span>
                        </h3>
                        <div class="commontxt">
                            <div class="row">

                                <div class="col-md-12 col-lg-12">





                                 {!! $pageDetails->content !!}



                                </div>



                            </div>



                        </div>

                    </div>
                </div>
            </div>
    </section>

@endsection
