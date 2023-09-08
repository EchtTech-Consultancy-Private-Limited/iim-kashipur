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
            <h1>Press & Media</h1>
        </div>
    </div>
</div>

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>

            <li><span>Press & Media</span></li>
        </ul>
    </div>
</div>


    @if(@isset($item))

        {{-- remember that $contact is your variable --}}

    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col master-class">
                    <div class="innerpagecontent">

                       {{-- Heading section Start  --}}

                        <h3>
                            PRESS & MEDIA
                        </h3>
                         {{-- Heading section End Table --}}

                        <h5>
                            <span>Press Releases</span>
                        </h5>

                        <table>
                            <tbody>
                                <tr>
                                    <td>Sr.no</td>
                                    <td>Headlines</td>
                                    <td>Media/Publication</td>
                                    <td>Publishing Link</td>

                            </tr>

                            @if(count($item) <0 )
                            @foreach ($item as $K=>$items)
                            <tr>
                                <td>{{ $K+1 }}</td>
                                <td>{{ $items->heading ??''}}</td>
                                <td>{{ $items->media_publication	??''}}</td>
                                <td>
                                <a @if($items->external=='1')  @if (GetLang() == 'en') onclick="return confirm('This link will take you to an external web site.')"  @else onclick="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।')" @endif target="_blank" href="{{url($items->publishing_link) ??''}}"  @else href="{{url($items->publishing_link) ??''}}" @endif  > Read More </a>  </td>
                            </tr>
                            @endforeach
                           @endif

                        </tbody>
                    </table>



                        <!-- Content section  start-->
                        <h5>
                            <span>Media Contacts</span>
                        </h5>

                        <p>Please use the following media and public relations contacts for inquiries by the media only. Journalists on deadline are advised to contact by phone rather than email.</p>



                        <!-- Chairpersons-->

                        <h5>
                            <span>Media And Public Relation Committee</span>
                        </h5>

                            <span>
                                Indian Institute of Management Kashipur<br>
                                Kundeshwari, District- Udham Singh Nagar,<br>
                                Kashipur 244713 Uttarakhand<br>
                                Email: mprc[at]iimkashipur.ac.in<br>
                                Tel: +91-7900444090/91/91/93,7088270882<br>
                            </span>


                   @if(isset($chairperson))
                        <div class="row mt-4 mb-5">
                            <div class="col-md-3">
                                <div class="top text-center mt-0">
                                    <div class="profile-img img-fac">
                                        <img src="{{ asset('uploads/organisation/' . $chairperson[0]->image)}}"
                                            alt="A VENKATARAMAN" loading="lazy" class="mb-0">
                                        <div class="d-flex justify-content-center">
                                            <div class="top-text mb-0 p-relative"> {{ $chairperson[0]->title ?? '' }} </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-9">
                                <div class="designation">
                                    <h4>{{ $chairperson[0]->designation ?? '' }} </h4>
                                    <h6>{{ $chairperson[0]->title ?? '' }} </h6>
                                    <h6>{{ $chairperson[0]->phone ?? '' }} </h6>
                                    <?php
                                    $email_address=$chairperson[0]->email ;
                                    $str = $email_address;
                                    $var= str_replace('@','[at]',$str);
                                    $email= str_replace('.','[dot]',$var);
                                    ?>

                                  <h6>{{ $email ?? '' }} </h6>
                                </div>
                            </div>
                        </div>
                    @endisset


                        <!-- Photo Gallery Section Start -->
                        <h5>
                            <span> Media Coordinators</span>
                        </h5>
                        <div class="excellence-wrap back-img Activities gallery-member img-gallery mb-3 mt-4">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-12 p-0">
                                        <div class="excellence-gallery partnership-img">
                                            <div class="row masonry-grid">

                                           @if(count($chairpersons) > 0)
                                            @foreach ($chairpersons as $value)
                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">

                                                        <a href="{{ asset('uploads/organisation/' . $value->image) ?? '' }}"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="{{ asset('uploads/organisation/' . $value->image) ?? '' }}"
                                                                    alt="gallery-img" class="img-fluid"
                                                                    loading="lazy">
                                                                <div class="top-text">
                                                                    {{ $value->title ??'' }}
                                                                </div>

                                                            </div>
                                                        </a>

                                                    </div>
                                                </div>
                                            @endforeach

                                             @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Photo Gallery section End -->

                    </div>

                </div>
            </div>
        </div>
    </section>

        @else

    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col master-class">
                    <div class="innerpagecontent">

                       {{-- Heading section Start  --}}

                        <h3>
                            PRESS & MEDIA
                        </h3>
                         {{-- Heading section End Table --}}

                        <h5>
                            <span>PRESS RELEASES</span>
                        </h5>

                        <table>
                            <tbody>
                                <tr>
                                <td>Sr.No </td>
                                <td>HEADLINES</td>
                                <td>MEDIA/PUBLICATION</td>
                                <td>PUBLISHING LINK</td>

                            </tr>

                            @foreach ($item as $items)
                            <tr>
                                <td>1</td>
                                <td>{{ $items->heading ??''}}</td>
                                <td>{{ $items->media_publication	??''}}</td>
                                <td>
                                <a @if($items->external=='1')  onclick="return confirm('Are you sure  external window open?')"  target="_blank" href="{{url($items->publishing_link) ??''}}"  @else href="{{url($items->publishing_link) ??''}}" @endif  > Read More </a>  </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>



                        <!-- Content section  start-->
                        <h5>
                            <span>MEDIA CONTACTS</span>
                        </h5>

                        <p>Please use the following media and public relations contacts for inquiries by the media only. Journalists on deadline are advised to contact by phone rather than email.</p>

                        <!-- Chairpersons-->

                        <h5>
                            <span>MEDIA AND PUBLIC RELATION COMMITTEE</span>
                        </h5>

                        <div class="row mt-4 mb-5">
                            <div class="col-md-3">
                                <div class="top text-center mt-0">
                                    <div class="profile-img img-fac">
                                        <img src="{{ asset('uploads/organisation/' . $chairperson[0]->image)}}"
                                            alt="A VENKATARAMAN" loading="lazy" class="mb-0">
                                        <div class="d-flex justify-content-center">
                                            <div class="top-text mb-0 p-relative"> {{ $chairperson[0]->title ?? '' }} </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-9">
                                <div class="designation">
                                    <h4>{{ $chairperson[0]->designation ?? '' }} </h4>
                                    <h6>{{ $chairperson[0]->title ?? '' }} </h6>
                                    <h6>{{ $chairperson[0]->phone ?? '' }} </h6>
                                    <?php
                                    $email_address=$chairperson[0]->email ;
                                    $str = $email_address;
                                    $var= str_replace('@','[at]',$str);
                                    $email= str_replace('.','[dot]',$var);
                                    ?>

                                  <h6>{{ $email ?? '' }} </h6>
                                </div>
                            </div>
                        </div>



                        <!-- Photo Gallery Section Start -->
                        <h5>
                            <span> MEDIA COORDINATORS</span>
                        </h5>
                        <div class="excellence-wrap back-img Activities gallery-member img-gallery mb-3 mt-4">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-12 p-0">
                                        <div class="excellence-gallery partnership-img">
                                            <div class="row masonry-grid">


                                            @foreach ($chairpersons as $value)
                                                <div class="col-md-2 col-lg-2">
                                                    <div class="d-flex flex-column h-100">

                                                        <a href="{{ asset('uploads/organisation/' . $value->image) ?? '' }}"
                                                            class="image-link">
                                                            <div class="thumbnail p-relative">
                                                                <img src="{{ asset('uploads/organisation/' . $value->image) ?? '' }}"
                                                                    alt="gallery-img" class="img-fluid"
                                                                    loading="lazy">
                                                                <div class="top-text">{{ $value->title }}
                                                                </div>

                                                            </div>
                                                        </a>

                                                    </div>
                                                </div>
                                            @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Photo Gallery section End -->

                    </div>

                </div>
            </div>
        </div>
    </section>

    @endif

@endsection
