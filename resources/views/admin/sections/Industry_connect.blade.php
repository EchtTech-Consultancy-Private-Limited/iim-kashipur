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
            <h1>Industry Connect</h1>
        </div>
    </div>
</div>

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>

            <li><span>Industry Connect</span></li>
        </ul>
    </div>
</div>


    @if(@isset($item))

        {{-- remember that $contact is your variable --}}


    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="innerpagecontent">

                        <div class="commontxt">
                            <div class="row">

                                <div class="col-md-12 col-lg-12">
                                    <table>

                                        <thead>
                                            <tr>
                                                <td>Sl. No </td>
                                                <td>DATE </td>
                                                <td>TITLE </td>
                                                <td>ATTACHMENT FILE </td>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($item as $K=>$data)
                                            <tr>
                                                <td>{{$K+1}}</td>
                                                <td>{{$data->date}}</td>
                                                <td>{{$data->title}}</td>
                                                <td><a   href="{{url('uploads/view/attach/'.$data->attachement_file)}}" download><img src="{{ asset('admin/images/viewpdf.jpg') }}" width="120px"></td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>




        @else


<section class="ptb-60">

    <div class="container">

        <a href="javascript:void(0)" class="btn2 margin_bottom mb-4"> News & Events </a><br>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="event-card news-card aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

                    <div class="event-body">
                        <div class="event-image">
                            <img src="http://localhost/kashipur-design1/public/uploads/header_top/167776088848.png" title="News &amp; Events" alt="News &amp; Events" class="img-fluid" loading="lazy">
                        </div>
                        <div class="event-content">
                            <h3 class="title">
                                Iim kashipur congratulates on clearing cfa level 2
                            </h3>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="event-card news-card aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

                    <div class="event-body">
                        <div class="event-image">
                            <img src="http://localhost/kashipur-design1/public/uploads/header_top/167776088848.png" title="News &amp; Events" alt="News &amp; Events" class="img-fluid" loading="lazy">
                        </div>
                        <div class="event-content">
                            <h3 class="title">
                                Iim kashipur congratulates on clearing cfa level 2
                            </h3>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="event-card news-card aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

                    <div class="event-body">
                        <div class="event-image">
                            <img src="http://localhost/kashipur-design1/public/uploads/header_top/167776088848.png" title="News &amp; Events" alt="News &amp; Events" class="img-fluid" loading="lazy">
                        </div>
                        <div class="event-content">
                            <h3 class="title">
                                Iim kashipur congratulates on clearing cfa level 2
                            </h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
</div>

</section>



    @endif

@endsection
