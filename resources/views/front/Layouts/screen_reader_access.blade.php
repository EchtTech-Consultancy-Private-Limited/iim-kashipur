
@extends('front.Layouts.master')

@section('content')



    {{-- banner image upload --}}

    <div class="internalpagebanner">
        @if(GetOrganisationAllDetails('default_banner_image')!='')
            <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('default_banner_image'))}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
        @else
            <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? ''}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"   alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
        @endif
    <div class="imagecaption">
            <div class="container">
                <h3 class="text-light">@lang('common.SCREEN_READER_ACCESS')</h3>
            </div>
        </div>
    </div>


{{--breadcrumbs --}}

    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>
                <li><a href="javascript:void(0);"> @lang('common.SCREEN_READER_ACCESS')</a></li>
            </ul>
        </div>
    </div>




{{-- page content --}}



    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col-md-11">


                    <div class="innerpagecontent">

                            <div class="wrapper" id="skipCont"></div>

                        <h3><span>@lang('common.SCREEN_READER_ACCESS')</span></h3>

                            <p>The website of Indian Institute of Management Kashipur complies with Guidelines for Indian Government Websites and World Wide Web Consortium (W3C) Web Content Accessibility Guidelines (WCAG) 2.0 level A. This will enable people with visual impairments access the website using technologies, such as screen readers. The information of the website is accessible with different screen readers, such as JAWS, NVDA, SAFA, Supernova and Window-Eyes.</p>

                            <p>Following table lists the information about different screen readers:</p>

                            <p>  Information related to the various screen readers</p><br><br>


         <table class="">

            <thead>

                <tr>

                    <td ><strong>Screen Reader</strong></td>
                    <td ><strong>Website</strong></td>
                    <td ><strong>Free / Commercial</strong></td>

                </tr>

            </thead>

            <tbody>
                    <tr>
                    <td>Non Visual Desktop Access (NVDA)</td>
                    <td><a class="ext" href="http://www.nvda-project.org/" target="_BLANK" title="External site that opens in a new window">http://www.nvda-project.org/ (link is external)</a><br/>(External website that opens in a new window)</td>
                    <td>Free</td>
                    </tr>
                    <tr>
                        <td>System Access To Go</td>
                        <td><a class="ext" href="http://www.satogo.com/" target="_BLANK" title="External site that opens in a new window">http://www.satogo.com/ (link is external)</a><br/>(External website that opens in a new window)</td>
                        <td>Free</td> </tr><tr><td>Web Anywhere</td>
                        <td><a class="ext" href="http://webanywhere.cs.washington.edu/wa.php" target="_BLANK" title="External site that opens in a new window">http://webanywhere.cs.washington.edu/wa.php (link is external)</a><br/>(External website that opens in a new window)</td>
                        <td>Free</td> </tr><tr><td>Hal</td>
                        <td><a class="ext" href="http://www.yourdolphin.co.uk/productdetail.asp?id=5" target="_BLANK" title="External site that opens in a new window">http://www.yourdolphin.co.uk/productdetail.asp?id=5 (link is external)</a><br />(External website that opens in a new window)</td>
                        <td>Commercial</td> </tr><tr>
                        <td>JAWS</td> <td><a class="ext" href="http://www.freedomscientific.com/jaws-hq.asp" target="_BLANK" title="External site that opens in a new window">http://www.freedomscientific.com/jaws-hq.asp (link is external)</a><br /> 						(External website that opens in a new window)</td>
                        <td>Commercial</td> </tr><tr><td> Supernova</td> <td> 						<a class="ext" href="http://www.yourdolphin.co.uk/productdetail.asp?id=1" target="_BLANK" title="External site that opens in a new window">http://www.yourdolphin.co.uk/productdetail.asp?id=1 (link is external)</a><br /> 						(External website that opens in a new window)</td> <td> 						Commercial</td> </tr><tr><td> 						Window-Eyes</td> <td> 						<a class="ext" href="http://www.gwmicro.com/Window-Eyes/" target="_BLANK" title="External site that opens in a new window">http://www.gwmicro.com/Window-Eyes/ (link is external)</a><br /> 						(External website that opens in a new window)</td> <td>Commercial</td>


                    </tr>
            </tbody>

        </table>



            </div>

        </div>

    </section>

@endsection




