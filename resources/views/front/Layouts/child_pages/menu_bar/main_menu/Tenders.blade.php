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
                <h1>Tenders</h1>
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

                <li><span>Tenders</span></li>
            </ul>
        </div>
    </div>




    <section class="withsidebar-wrap innerpagecontent ptb-60">
        <div class="container">


            <div class="d-flex justify-content-end">
                <a href="{{ url(request()->path() . '/archive') }}" class="btn2 float-right mb-3"
                    style="border-radius: 30px; background:#174e91">
                    Archive Tenders
                </a>
            </div>

            <table>
                <tr>
                    <th class="text-nowrap">Sr.No</th>
                    <th class="text-nowrap">Published Date</th>
                    <th class="text-nowrap">Submission Date</th>
                    <th class="text-nowrap" style="width: 25%">Title</th>
                    <th class="text-nowrap">Tender Document </th>
                    {{-- <th class="text-nowrap">Corrigendum</th> --}}
                    <th class="text-nowrap">Corrigendum Document</th>

                </tr>

                <?php $number = 1; ?>

                @foreach ($item as $K => $value)
                    @if (Getarchivedata(now()->format('Y-m-d'), $value->archive_date) != 'True')
                        <tr>
                            <td>{{ $number }}</td>
                            <td>{{ $value->published_date }}</td>
                            <td>{{ $value->submission_date }}</td>
                            <td>{{ $value->title }}</td>
                            <td>
                                @if ($value->tender_document != '')
                                    <a href="{{ asset('uploads/tenders/' . $value->tender_document) }}" download><i
                                            class="fa fa-download"></i> Download</a>


                                    <span style="font-size: 10px;margin-left: 5px;color: #ed2044;">
                                        (<?php
                                        echo formatSizeUnits($value->pdfsize);
                                        ?>)
                                    </span>
                                @endif
                            </td>

                            {{-- <td>{{ $value->corrigendum }}</td> --}}

                            <td>
                                @if ($value->Corrigendum_Documents != '')
                                    <a href="{{ asset('uploads/tenders/' . $value->Corrigendum_Documents) }}" download><i
                                            class="fa fa-download"></i> Download</a>


                                    <span style="font-size: 10px;margin-left: 5px;color: #ed2044;">
                                        (
                                        <?php
                                        echo formatSizeUnits($value->Corrigendum_pdfsize);
                                        ?>)
                                    </span>
                                @endif
                            </td>




                        </tr>

                        <?php $number++; ?>
                    @endif
                @endforeach

            </table>

        </div>
    </section>



@endsection
