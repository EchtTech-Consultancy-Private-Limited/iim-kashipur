@extends('front.Layouts.master')

@section('content')

<style>
img.hover-shadow.cursor {
    height: 135px !important;
}

.col-md-2.p-relative {
    padding-left: 15px;
}
.col-md-2.p-relative:not(:last-child) {
    padding-right: 3px;
}

  </style>
<link rel="stylesheet" href="{{asset('assets/csss/style.css')}}">
<div class="internalpagebanner">
        @if(GetOrganisationAllDetails('default_banner_image')!='')
            <img src="{{asset('uploads/site-logo/'.GetOrganisationAllDetails('default_banner_image'))}}" style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"  alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
        @else
            <img src="{{ asset('assets/images/banners/board-of-governer-banner.jpg') ?? ''}}" style="height:auto;  min-height:200px; max-height:350% overflow:hidden;"   alt="{{ $type_child[0]->name ?? '' }}" title="{{ $type_child[0]->name ?? '' }}">
        @endif
        <div class="imagecaption">
            <div class="container">
                <h1> <!-- Photo Gallery -->{{ $data[0]->cover_title }}</h1>

            </div>
        </div>
    </div>

    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>
                <li><a href="{{ url()->previous() }}">Photo Gallery </a></li>
                <li>{{ $data[0]->name ??''}}</li>
            </ul>
        </div>
    </div>

<section class="ptb-60">


            <div class="container">

            <a href="javascript:void(0)" class="btn2 margin_bottom"> <!-- Photo Gallery  --> {{ $item[0]->image_title }} </a><br>


               <div class="row mt-3">
                    @foreach($item as  $M)
                        <div class="col-md-2 p-relative mb-4">
                          <!-- Image text -->
                        <!-- <span class="top-text">  {{ $M->image_title}}  </span> -->

                        <a href="{{ asset('gallery/multipimage/'.$M->large_image)}}" class="image-link">
                        <img src="{{ asset('gallery/multipimage/'.$M->large_image)}}" title="{{ $M->image_title }}" style="height:250px; width:100%" class="hover-shadow cursor">

                        </a>

                        </div>
                    @endforeach
                </div>
            </div>




        <div id="myModal" class="modal">
          <span class="close cursor" onclick="closeModal()">&times;</span>
          <div class="modal-content">

            @foreach($item as $k=>$M)
            <div class="mySlides">
              <div class="numbertext">{{ $k }} / 4</div>
              <img src="{{ asset('gallery/multipimage/'.$M->large_image)}}" >
            </div>
            @endforeach


            <a class="prev" onclick="plusSlides(-1)">&lt;</a>
            <a class="next" onclick="plusSlides(1)">&gt;</a>

            <div class="caption-container">
              <p id="caption"></p>
            </div>


          </div>
        </div>
</section>

@endsection



<script>
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>







