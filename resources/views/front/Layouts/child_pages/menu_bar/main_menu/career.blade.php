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

        <div class="table-responsive mb-3">

       <table style="display:table">
        <tbody>
            <tr>
                <td colspan="2">Faculty Recruitment - Special Recruitment Drive for SC / ST / NC-OBC / EWS / PwD on Rolling Basis</td>
            </tr>
            <tr>
                <td style="width:52.5%">
                    <a href="{{asset('uploads/Faculty_Recruitment_Special_Recruitment_Drive_for_SC_ST _NC_OBC _EWS_PwD_on_Rolling_Basis.pdf')}}" target="_blank" class="pdf-links"> <i class="fa fa-file-pdf-o"></i> Detailed Advertisement</a> 
                    <span style="font-size: 10px;margin-left: 0px;color: #ed2044;" tabindex="0">(133.21KB)</span> 
                    <div class="mt-1" tabindex="0"><b>Opening Date : </b> 2023-10-28</div> 

                </td>
                <td>
                 <a  @if (GetLang() =='en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif href="{{url('https://faculty.iimkashipur.co.in/fac1023/')}}"  target="_blank">Apply Here</a>                
            
                </td>
            </tr>
            <tr>
                <td colspan="2">
                In case of any technical issue, please contact: <a href="javascript:void();">response[at]iimkashipur[dot]ac[dot]in</a>
                </td>
            </tr>
        </tbody>
       </table>

       <table class="mt-5" style="display:table">
        <tbody>
            <tr>
                <td colspan="2">Faculty Recruitment for Emeritus Professor on Rolling Basis</td>
            </tr>
            <tr>
                <td>
                    <a href="{{asset('uploads/Faculty_Recruitment_Emeritus_Professor_2023-24_adv.pdf')}}" target="_blank" class="pdf-links"> <i class="fa fa-file-pdf-o"></i> Detailed Advertisement</a> <span style="font-size: 10px;margin-left: 0px;color: #ed2044;" tabindex="0">
                                                        (153KB)
                                                    </span>
                </td>
                <td>
                Apply Here : <a  @if (GetLang() =='en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif href="{{url('http://58.84.23.59/faculty-recruitment/emeritus/0723/')}}"  target="_blank">Link 1</a> or 
                
                <a href="{{url('http://14.139.249.139/faculty-recruitment/emeritus/0723/')}}" @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif href="{{url('http://14.139.249.139/faculty-recruitment/emeritus/0723/')}}" target="_blank">Link 2</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                In case of any technical issue, please contact: <a href="javascript:void();">response[at]iimkashipur[dot]ac[dot]in</a>
                </td>
            </tr>
        </tbody>
       </table>

        </div>

            <div class="d-flex justify-content-end">
                <a href="{{url(request()->path().'/archive')}}" class="btn2 float-right mb-3" style="border-radius: 30px; background:#174e91">
                   Archive Careers
                  </a>
            </div>


            <table>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Name Of The Post</th>
                    <th class="text-nowrap">Opening Date</th>
                    <th class="text-nowrap">Closing Date</th>
                    <th class="text-nowrap">Online Link</th>
                    <th class="text-nowrap">Document </th>
                    <th class="text-nowrap">Note</th>
                    <th class="text-nowrap">Corrigendum</th>
                </tr>

                <?php $number = 1; ?>

                @foreach ($item as $value)

                {{-- {{Getarchivedata($value->created_at->format('Y-m-d'),$value->archive_date)}} --}}


                {{-- {{ Getarchivedata(now()->format('Y-m-d'),$value->closing_date)}} --}}
                @if(Getarchivedata(now()->format('Y-m-d'),$value->archive_date) != 'True')
                    <tr>
                        <td>{{ $number }}</td>
                        <td>{{ $value->name_of_the_post }} </td>
                        <td> {{ $value->opening_date }} </td>
                        <td> {{ $value->closing_date }} </td>


                        <td>
                            @if($value->online_link != '')
                            <a
                                @if($value->external=='1')  @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank" href="{{url($value->online_link) ??''}}"  @else href="{{url($value->online_link) ??''}}" @endif

                                >Apply Here</a>
                            @endif
                        </td>
                        <td>
                           @if($value->detail_advertisement != '')
                            <a href="{{ asset('uploads/fo/' . $value->detail_advertisement) }}" download  target="_blank"><i
                                    class="fa fa-download"></i> Download</a>

                        <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                            (
                            <?php
                                echo formatSizeUnits($value->pdfsize);
                            ?>)
                        </span>
                          @endif
                        </td>
                        <td>{{ $value->note }}</td>

                        <td>

                            @if($value->corrigendum != '')
                            <a href="{{ asset('uploads/fo/' . $value->corrigendum) }}" download  target="_blank"><i
                                    class="fa fa-download"></i> Download</a>

                        <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                            (
                            <?php
                                echo formatSizeUnits($value->pdf_corrigendum);
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
