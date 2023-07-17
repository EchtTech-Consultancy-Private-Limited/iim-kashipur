@extends('front.Layouts.master')

@section('content')
    
    @if(FindSiteSettings('Home','section1'))
         @include('front.Layouts.home_sections.'.FindSiteSettings('Home','section1'))
    @endif

    @if(FindSiteSettings('Home','section2'))
         @include('front.Layouts.home_sections.'.FindSiteSettings('Home','section2'))
    @endif

    @if(FindSiteSettings('Home','section3'))
         @include('front.Layouts.home_sections.'.FindSiteSettings('Home','section3'))
    @endif

    @if(FindSiteSettings('Home','section4'))
         @include('front.Layouts.home_sections.'.FindSiteSettings('Home','section4'))
    @endif

    @if(FindSiteSettings('Home','section5'))
         @include('front.Layouts.home_sections.'.FindSiteSettings('Home','section5'))
    @endif

     @if(FindSiteSettings('Home','section6'))
         @include('front.Layouts.home_sections.'.FindSiteSettings('Home','section6'))
    @endif

  

@endsection