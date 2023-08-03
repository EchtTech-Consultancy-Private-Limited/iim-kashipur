@extends('front.Layouts.master')

@section('content')

    <div class="internalpagebanner">
        @if (GetOrganisationAllDetails('default_banner_image') != '')
            <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
        @else
            <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? '' }}"
                style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
        @endif
        <div class="imagecaption">
            <div class="container">
                <h1>Search page</h1>
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

                <li><span>Search Page</span></li>
            </ul>
        </div>
    </div>


    <section class="content-section innerpagecontent ptb-60">

        <div class="container ">

            <div class="content-main row">

                <div class="col-md-12">
                    <div class="content-desc">
                        <div class="innerpagecon">
                            <a href="#" class="btn2">Search</a>

                            <div class="row mt-4">

                                <div class="col-md-5">
                                    <div class="serch-box-show s-box-page p-relative"
                                        style="position: static;display:block !important">
                                        <form action="#" method="get">
                                            <div class="d-flex">
                                                <input type="search" class="form-control" placeholder="Search here..."
                                                    value=" " name="search">
                                                <button type="submit" class="btn-info submit-btn-apply"> <i
                                                        class="fa fa-search"> </i> </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <p class="mt-4 mb-1 text-primary">Search Result</p>

                                    {{-- anti raggings --}}
                                    @if (count($anti_raggings) > 0)
                                        @foreach ($anti_raggings as $anti_raggingss)
                                            <div class="search-content-box">

                                                <h6>{{ $anti_raggingss->title ?? '' }}</h6>
                                                <p>

                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- BannerSlider --}}

                                    @if (count($BannerSlider) > 0)
                                        @foreach ($BannerSlider as $BannerSliders)
                                            <div class="search-content-box">

                                                <h6>{{ $BannerSliders->title ?? '' }}</h6>
                                                <p>

                                                    {{ $BannerSliders->short ?? '' }}

                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Career  --}}

                                    @if (count($Career) > 0)
                                        @foreach ($Career as $Careers)
                                            <div class="search-content-box">

                                                <h6>{{ $Careers->name_of_the_post ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- cell_multiple_image --}}

                                    @if (count($cell_multiple_image) > 0)
                                        @foreach ($cell_multiple_image as $cell_multiple_imagess)
                                            <div class="search-content-box">

                                                <h6>{{ $cell_multiple_imagess->title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- commmittee  --}}

                                    @if (count($commmittee) > 0)
                                        @foreach ($commmittee as $commmittees)
                                            <div class="search-content-box">

                                                <h6>{{ $commmittees->title ?? '' }}</h6>
                                                <p>

                                                </p>
                                            </div>
                                        @endforeach
                                    @endif



                                    {{-- content_page --}}

                                    @if (count($content_page) > 0)
                                        @foreach ($content_page as $content_pages)
                                            <div class="search-content-box">

                                                <h6>{{ $content_pages->name ?? '' }}</h6>
                                                <p>



                                                    {!!  substr_replace($content_pages->content,'...',200) !!}


                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Events  --}}

                                    @if (count($Events) > 0)
                                        @foreach ($Events as $Eventss)
                                            <div class="search-content-box">

                                                <h6>{{ $Eventss->title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                    {{-- Industry --}}

                                    @if (count($Industry) > 0)
                                        @foreach ($Industry as $Industrys)
                                            <div class="search-content-box">

                                                <h6>{{ $Industrys->title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- journal_publication

@if (count($journal_publication) > 0)

@foreach ($journal_publication as $journal_publications)

    <div class="search-content-box">

        <h6>{{ $journal_publications->title ??'' }}</h6>
        <p>

            {{ $journal_publications->title ??'' }}

        </p>
    </div>

@endforeach

@endif --}}

                                    {{-- journal_publication_child
@if (count($journal_publication_child) > 0)

@foreach ($journal_publication_child as $journal_publication_childs)

    <div class="search-content-box">

        <h6>{!!  $journal_publication_childs->about_details	 ??'' !!}</h6>
        <p>



        </p>
    </div>

@endforeach

@endif --}}


                                    {{-- multiple_profile --}}
                                    @if (count($multiple_profile) > 0)
                                        @foreach ($multiple_profile as $multiple_profiles)
                                            <div class="search-content-box">

                                                <h6>{{ $multiple_profiles->Title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif



                                    {{-- OrganisationStructure --}}
                                    @if (count($OrganisationStructure) > 0)
                                        @foreach ($OrganisationStructure as $OrganisationStructures)
                                            <div class="search-content-box">

                                                <h6>{{ $OrganisationStructures->title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif


                                    {{-- news_event --}}
                                    @if (count($news_event) > 0)
                                        @foreach ($news_event as $news_events)
                                            <div class="search-content-box">

                                                <h6>{{ $news_events->title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif


                                    {{-- org --}}
                                    @if (count($org) > 0)
                                        @foreach ($org as $orgs)
                                            <div class="search-content-box">

                                                <h6>{{ $orgs->name ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif


                                    {{-- org_journies --}}
                                    @if (count($org_journies) > 0)
                                        @foreach ($org_journies as $org_journiess)
                                            <div class="search-content-box">

                                                <h6>{{ $org_journiess->name ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- press_media --}}
                                    @if (count($press_media) > 0)
                                        @foreach ($press_media as $press_medias)
                                            <div class="search-content-box">

                                                <h6>{{ $press_medias->heading ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif


                                    {{-- project_logo --}}
                                    @if (count($project_logo) > 0)
                                        @foreach ($project_logo as $project_logos)
                                            <div class="search-content-box">

                                                <h6>{{ $project_logos->name ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- quick_linkcategory --}}

                                    @if (count($quick_linkcategory) > 0)
                                        @foreach ($quick_linkcategory as $quick_linkcategorys)
                                            <div class="search-content-box">

                                                <h6>{{ $quick_linkcategorys->Section ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- QuickLink  --}}

                                    @if (count($QuickLink) > 0)
                                        @foreach ($QuickLink as $QuickLinks)
                                            <div class="search-content-box">

                                                <h6>{{ $QuickLinks->title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- rit --}}


                                    @if (count($rit) > 0)
                                        @foreach ($rit as $rits)
                                            <div class="search-content-box">

                                                <h6>{{ $rits->title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif


                                    {{-- student_council --}}

                                    @if (count($student_council) > 0)
                                        @foreach ($student_council as $student_councils)
                                            <div class="search-content-box">

                                                <h6>{{ $student_councils->student_council ?? '' }}</h6>
                                                <p>


                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                    {{--  --}}

                                    @if (count($StudentProfile) > 0)
                                        @foreach ($StudentProfile as $StudentProfiles)
                                            <div class="search-content-box">

                                                <h6>{{ $StudentProfiles->name ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                    {{-- tender --}}

                                    @if (count($tender) > 0)
                                        @foreach ($tender as $tenders)
                                            <div class="search-content-box">

                                                <h6>{{ $tenders->title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Vendorsdebarred  --}}
                                    @if (count($Vendorsdebarred) > 0)
                                        @foreach ($Vendorsdebarred as $Vendorsdebarreds)
                                            <div class="search-content-box">

                                                <h6>{{ $Vendorsdebarreds->vendor_name ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                    {{--  video_gallery --}}
                                    @if (count($video_gallery) > 0)
                                        @foreach ($video_gallery as $video_gallerys)
                                            <div class="search-content-box">

                                                <h6>{{ $video_gallerys->title ?? '' }}</h6>
                                                <p>



                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                    {{-- wellness_facilitie --}}

                                    @if (count($wellness_facilitie) > 0)
                                        @foreach ($wellness_facilitie as $wellness_facilities)
                                            <div class="search-content-box">

                                                <h6>{{ $wellness_facilities->title ?? '' }}</h6>
                                                <p>

                                                    {!! $wellness_facilities->about_details !!}

                                                </p>
                                            </div>
                                        @endforeach
                                    @endif



                                </div>







                            </div>

                        </div>
    </section>



@endsection