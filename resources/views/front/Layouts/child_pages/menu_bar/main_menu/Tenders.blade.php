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
            <h1>Tender</h1>
        </div>
    </div>
</div>

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>

            <li><span>Tender</span></li>
        </ul>
    </div>
</div>




<section class="withsidebar-wrap ptb-60">
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Sr.No</th>
                <th>Published Date</th>
                <th>Submission Date</th>
                <th>Title</th>
                <th>Tender Documents</th>
                <th>Corrigendum</th>
                </tr>



            @foreach($item as $K=>$value)
            <tr>
                <td>{{$K+1}}</td>
                <td>{{$value->published_date}}</td>
                <td>{{$value->submission_date}}</td>
                <td>{{$value->title}}</td>
                <td>
				<a href="{{ asset('uploads/tenders/' . $value->tender_document) }}" target="_blank"><i class="fa fa-download"></i> Download</a>
				</td>
                <td>{{$value->corrigendum}}</td>


            </tr>
            @endforeach

        </table>

    </div>
</section>



@endsection
