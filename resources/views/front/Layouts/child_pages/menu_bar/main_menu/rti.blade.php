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
            <h1>RTI</h1>
        </div>
    </div>
</div>

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>

            <li><span>RTI</span></li>
        </ul>
    </div>
</div>


@if(@isset($item))

<section class="withsidebar-wrap ptb-60">

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="innerpagecontent">
                    <h3>
                        RTI
                    </h3>

                    <div class="commontxt">
                        <div class="row">

                            <div class="col-md-6 col-lg-6 mb-4">

                                <div class="box-rti">
                                    <h5><span class="bg-white mb-3">CPIO</span></h5>

                                     {!! $item[0]->CPIO !!}


                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 mb-4">

                                <div class="box-rti">
                                    <h5><span class="bg-white mb-3">First Appellate Authority</span></h5>

                                  {!! $item[0]->Authority !!}

                                </div>
                            </div>


                             @foreach ($item as $items)


                            <div class="col-md-6 mt-3">
                                <div class="box-rti-pdf">
                                  <a   href="{{url('uploads/rti/'.$items->pdf)}}" download   class="pdf-links"> <i class="fa fa-file-pdf-o"></i><span>{{$items->title}}</span></a>
                                </div>
                             </div>


                             @endforeach

                            <div class="col-md-12 mt-3">
                                <h3>
                                        Annual Report
                                </h3>

                                <table class="mt-2">

                                    <thead>
                                        <tr>
                                            <td>Sl. No </td>
                                            <td>TITLE </td>
                                            <td>ATTACHMENT FILE </td>

                                        </tr>
                                    </thead>

                                    <tbody>


                                        @foreach ($data as $K=>$datas)

                                            @if($datas->Quarterly_section == '1')

                                        <tr>
                                            <td>{{ $K+1 }}</td>
                                            <td>{{ $datas->title }}</td>
                                            <td><a href="{{url('uploads/rti/'.$datas->pdf)}}" download  class="pdf-links"> <i class="fa fa-file-pdf-o"></i>  <span>{{ $datas->title }}
</span></a></td>
                                        </tr>

                                          @endif

                                        @endforeach

                                    </tbody>
                                </table>


                                <h3 class="mt-4">
                                    Comptroller And Auditor General Audit Report
                                </h3>

                            <table class="mt-2">

                                <thead>
                                    <tr>
                                        <td>Sl. No </td>
                                        <td>TITLE </td>
                                        <td>ATTACHMENT FILE </td>

                                    </tr>
                                </thead>

                                <tbody>
									<?php $i=1; ?>
                                    @foreach ($data as $s=>$datas)

                                    @if($datas->Quarterly_section == '2')

                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $datas->title }}</td>
                                    <td><a href="{{url('uploads/rti/'.$datas->pdf)}}" download  class="pdf-links"> <i class="fa fa-file-pdf-o"></i>  <span>{{ $datas->title }} </span></a></td>
                                </tr>

                                  @endif

                                @endforeach


                                </tbody>
                            </table>


                            <h3 class="mt-4">
                                Quarterly Return
                            </h3>

                        <table class="mt-2">

                            <thead>
                                <tr>
                                    <td>Sl. No </td>
                                    <td>YEAR</td>
                                    <td>QUARTER-1</td>
                                    <td>QUARTER-2</td>
                                    <td>QUARTER-3</td>
                                    <td>QUARTER-4</td>

                                </tr>
                            </thead>

                            <tbody>

                             @foreach ($value as $K=>$values)



                                <tr>
                                    <td>{{ $K+1 }}</td>
                                    <td> {{ date('Y', strtotime($values->year )) -1}} - {{ date('Y', strtotime($values->year ))}} </td>



                                    <td>
                                        @if($values->pdf_first != "" )
                                        <a href="{{url('uploads/rti/'.$values->pdf_first)}}" download class="pdf-links"> <i class="fa fa-file-pdf-o"></i>  <span>{{ $values->pdf_first }} </span></a>
                                        @endif
                                    </td>



                                    <td>

                                        @if($values->pdf_second != "" )
                                        <a href="{{url('uploads/rti/'.$values->pdf_second)}}" download class="pdf-links"> <i class="fa fa-file-pdf-o"></i>  <span>{{ $values->pdf_second }}  </span></a>
                                        @endif

                                    </td>



                                    <td>
                                        @if($values->pdf_third != "" )
                                        <a href="{{url('uploads/rti/'.$values->pdf_third)}}" download class="pdf-links"> <i class="fa fa-file-pdf-o"></i>   <span>{{ $values->pdf_third }}</span></a>
                                        @endif
                                    </td>



                                    <td>
                                        @if($values->pdf_fourth != "" )
                                        <a href="{{url('uploads/rti/'.$values->pdf_fourth)}}" download class="pdf-links"> <i class="fa fa-file-pdf-o"></i><span>{{ $values->pdf_fourth }}</span></a>
                                        @endif
                                    </td>



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
