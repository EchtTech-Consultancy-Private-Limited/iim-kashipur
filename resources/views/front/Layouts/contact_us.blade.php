
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
                <h3 class="text-light">@lang('common.contact-us')</h3>
            </div>
        </div>
    </div>


{{--breadcrumbs --}}

    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><svg viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg></a></li>
                <li><a href="javascript:void(0);">@lang('common.contact-us')</a></li>
            </ul>
        </div>
    </div>


    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">


                @if(Session::has('success'))
                <div class="alert alert-success col-md-12 text-center">
                    <strong>Success!</strong> {{ Session::get('success') }}
                  </div>
                   @endif
                  @if(Session::has('error'))
                <div class="alert alert-danger col-md-12 text-center">
                    <strong>Oops!</strong> {{ Session::get('error') }}
                  </div>
                   @endif



                <div class="col-md-11">

                    <div class="innerpagecontent">

                            <div class="wrapper" id="skipCont"></div>

                        <h3><span>@lang('common.contact-us') </span></h3>
                    </div>


                    <div class="col-xl-11 ">

                  <form action="{{url('add_contact')}}"  method="post">


                          @csrf



                          <input type="hidden" name="form_type" value="contact_us" class="form-control form-control-lg">


                        <div class="card" style="border-radius: 15px;">
                          <div class="card-body">

                            <div class="row align-items-center pt-4 pb-3">
                              <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Full name *</h6>

                              </div>
                              <div class="col-md-9 pe-5">

                                <input type="text" value="{{ old('name') }}" name="name" class="form-control form-control-lg" placeholder="Enter Your Name" />


                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                              </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                              <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Email address *</h6>

                              </div>
                              <div class="col-md-9 pe-5">

                                <input type="email" value="{{ old('email') }}"  name="email" class="form-control form-control-lg" placeholder="example@example.com" />


                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror





                              </div>
                            </div><hr>

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                  <h6 class="mb-0">Mobile Number *</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                  <input type="number" value="{{ old('mobile_no') }}"  name="mobile_no" class="form-control form-control-lg" placeholder="Enter your Mobile Nunber" />





                                  @error('mobile_no')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror



                                </div>
                              </div><hr>

                              <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                  <h6 class="mb-0">Type *</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                  <select class="form-control form-control-lg" name="Type">
                                    <option value="">Select tittle</option>
                                    <option value="Suggestion" {{ old('Type') == "Suggestion" ? "selected" : "" }}> Suggestion</option>
                                    <option value="Question" {{ old('Type') == "Question" ? "selected" : "" }}>Question</option>
                                    <option value="Feedback" {{ old('Type') == "Feedback" ? "selected" : "" }}>Feedback</option>
                                  </select>

                                  @error('Type')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror


                                </div>
                              </div>



                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                              <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Message *</h6>

                              </div>
                              <div class="col-md-9 pe-5">

                                <textarea class="form-control" rows="3"   name="feedback" placeholder="">{{ old('feedback') }}</textarea>


                                @error('feedback')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                              </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="px-5 py-4">
                              <button type="submit" class="btn btn-primary btn-lg">Send</button>
                            </div>

                          </div>
                        </div>

                      </div>

                  </form>

                </div>

            </div>
        </div>
    </section>

@endsection
