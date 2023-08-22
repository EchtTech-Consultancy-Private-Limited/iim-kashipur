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
                <h1>Careers</h1>
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

                <li><span>Careers</span></li>
            </ul>
        </div>
    </div>




    {{-- remember that $contact is your variable --}}
    <section class="withsidebar-wrap innerpagecontent ptb-60">
        <div class="container">

            @if(Count($item) < 0)
            <div class="d-flex justify-content-end">
                <a href="{{url(request()->path().'/archive')}}" class="btn2 float-right mb-3" style="border-radius: 30px; background:#0d6efd">
                   Archive List
                  </a>
            </div>
            @endif

            <table>
                <tr>
                    <th class="text-nowrap">NAME OF THE POST</th>
                    <th class="text-nowrap"> OPENING DATE</th>
                    <th class="text-nowrap">CLOSING DATE</th>
                    <th class="text-nowrap">ONLINE LINK</th>
                    <th class="text-nowrap">DETAIL ADVERTISEMENT</th>
                    <th class="text-nowrap">NOTE</th>
                    <th class="text-nowrap">CORRIGENDUM</th>
                </tr>

                @foreach ($item as $value)

                {{-- {{Getarchivedata($value->created_at->format('Y-m-d'),$value->archive_date)}} --}}


                @if(Getarchivedata($value->created_at->format('Y-m-d'),$value->archive_date) != 'True')
                    <tr>
                        <td>{{ $value->name_of_the_post }} </td>
                        <td> {{ $value->opening_date }} </td>
                        <td> {{ $value->closing_date }} </td>


                        <td>
                            @if($value->online_link != '')
                            <a href="{{ $value->online_link }}" target="_blank">Apply Here</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ asset('uploads/fo/' . $value->detail_advertisement) }}" download  target="_blank"><i
                                    class="fa fa-download"></i> Download</a>

                        <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                            (
                            <?php
                                echo formatSizeUnits($value->pdfsize);
                            ?>)
                        </span>
                        </td>
                        <td>{{ $value->note }}</td>

                        <td>{{ $value->corrigendum }}</td>
                    </tr>

                    @endif
                @endforeach

            </table>




        </div>
    </section>
@endsection
