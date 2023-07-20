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
            <h1>Anti Raggings</h1>
        </div>
    </div>
</div>

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>

            <li><span>Anti Raggings</span></li>
        </ul>
    </div>
</div>



<section class="withsidebar-wrap ptb-60">

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="innerpagecontent">
                    <h3>
                        <span>
                             Anti Raggings
                        </span>
                    </h3>
                    @foreach ($data as $item)
                    <div class="commontxt">
                        <div class="row">
                            <div class="col-md-11 col-lg-11">
                             <iframe src="{{ asset('uploads/pdf/'.$item->pdf) }}" height="800px" width="100%"></iframe>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                {{ $item->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>



@endsection

