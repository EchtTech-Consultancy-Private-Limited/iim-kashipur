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
                <h1> Archive </h1>
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

                <li><span>{{ $bread }}</span></li>
                <li><span>Archive</span></li>

            </ul>
        </div>
    </div>


    {{-- remember that $contact is your variable --}}
    <section class="withsidebar-wrap innerpagecontent ptb-60">
        <div class="container">



            @if ($bread == 'Career')
                <table id="careerTable" class="display">
                    <thead>
                    <tr>
                        <th class="text-nowrap">S.No</th>
                        <th class="text-nowrap">Name Of The Post</th>
                        <th class="text-nowrap">Opening Date</th>
                        <th class="text-nowrap">Closing Date</th>
                        <th class="text-nowrap">Online Link</th>
                        <th class="text-nowrap">Document</th>
                        <th class="text-nowrap">Note</th>
                        <th class="text-nowrap">Corrigendum</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; ?>
                    @foreach ($data as $value)
                        {{-- {{ Getarchivedata($value->created_at->format('Y-m-d'), $value->archive_date) }} --}}

                        @if (Getarchivedata(now()->format('Y-m-d'), $value->archive_date) == 'True')
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $value->name_of_the_post }}</td>
                                <td>{{ $value->opening_date }}</td>
                                <td>{{ $value->closing_date }}</td>

                                <td>
                                    @if ($value->online_link != '')
                                        <a @if ($value->external == '1') @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')" @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank" href="{{ url($value->online_link) ?? '' }}" @else href="{{ url($value->online_link) ?? '' }}" @endif>Apply Here</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ asset('uploads/fo/' . $value->detail_advertisement) }}" download target="_blank"><i class="fa fa-download"></i> Download</a>

                                    <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">({{ formatSizeUnits($value->pdfsize) }})</span>
                                </td>
                                <td>{{ $value->note }}</td>

                                <td>
                                    @if ($value->corrigendum != '')
                                        <a href="{{ asset('uploads/fo/' . $value->corrigendum) }}" download target="_blank"><i class="fa fa-download"></i> Download</a>
                                        <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">({{ formatSizeUnits($value->pdf_corrigendum) }})</span>
                                    @endif
                                </td>
                            </tr>
                                <?php $number++; ?>
                        @endif
                    @endforeach
                    </tbody>
                </table>

            @endif

            @if ($bread == 'Tender')
                <table>
                    <tr>
                        <th class="text-nowrap">Sr.No</th>
                        <th class="text-nowrap">Published Date</th>
                        <th class="text-nowrap">Submission Date</th>
                        <th class="text-nowrap" style="width: 25%">Title</th>
                        <th class="text-nowrap">Document Size</th>
                        <th class="text-nowrap">Corrigendum</th>
                    </tr>


                    <?php $number = 1; ?>
                    @foreach ($data as $K => $value)
                        {{-- {{ Getarchivedata($value->created_at->format('Y-m-d'), $value->archive_date) }} --}}

                        @if (Getarchivedata(now()->format('Y-m-d'), $value->archive_date) == 'True')
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $value->published_date }}</td>
                                <td>{{ $value->submission_date }}</td>
                                <td>{{ $value->title }}</td>
                                <td>
                                    <a href="{{ asset('uploads/tenders/' . $value->tender_document) }}" download><i
                                            class="fa fa-download"></i> Download</a>


                                    <span style="font-size: 10px;margin-left: 5px;color: #ed2044;">
                                        (<?php
                                        echo formatSizeUnits($value->pdfsize);
                                        ?>)
                                    </span>


                                </td>

                                <td>{{ $value->corrigendum }}</td>


                            </tr>
                            <?php $number++; ?>
                        @endif
                    @endforeach

                </table>
            @endif


            @if ($bread == 'Vendors-Debarred')
                <table>
                    <tr>
                        <th>S.No</th>
                        <th>Vendor Name</th>
                        <th>Related Documents</th>
                    </tr>
                    <?php $number = 1; ?>

                    @foreach ($data as $K => $value)
                        {{--
                    {{ Getarchivedata($value->created_at->format('Y-m-d'), $value->archive_date) }} --}}

                        @if (Getarchivedata(now()->format('Y-m-d'), $value->archive_date) == 'True')
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $value->vendor_name }} </td>

                                <td>
                                    <a href="{{ asset('uploads/vendorsdebarred/' . $value->related_document) }}" download
                                        target="_blank" class="pdf-links">
                                        <i class="fa fa-file-pdf-o"></i> </a>

                                    <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                        (<?php
                                        echo formatSizeUnits($value->pdfsize);
                                        ?>)
                                    </span>



                                </td>
                            </tr>
                            <?php $number++; ?>
                        @endif
                    @endforeach

                </table>
            @endif


            @if ($bread == 'industry-connect')
                <table>
                    <thead>
                        <tr>
                            <td>S.No </td>
                            <td>DATE </td>
                            <td>TITLE </td>
                            <td>ATTACHMENT FILE </td>

                        </tr>
                    </thead>

                    <tbody>

                        <?php $number = 1; ?>

                        @foreach ($data as $K => $value)
                            @if (Getarchivedata(now()->format('Y-m-d'), $value->archive_date) == 'True')
                                <tr>
                                    <td>{{ $number }}</td>
                                    <td>{{ $value->date }}</td>
                                    <td>{{ $value->title }}</td>

                                    @if ($value->attachement_file != '')
                                        <td>
                                            <a href="{{ url('uploads/view/attach/' . $value->attachement_file) }}" download
                                                class="pdf-links"> <i class="fa fa-file-pdf-o"></i><span>PDF</span></a>
                                            <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                                (<?php
                                                echo formatSizeUnits($value->pdfsize);
                                                ?>)
                                            </span>
                                        </td>
                                    @endif

                                </tr>
                                <?php $number++; ?>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            @endif

        </div>
    </section>
@endsection
