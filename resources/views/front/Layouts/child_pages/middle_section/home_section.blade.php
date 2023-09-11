@extends('front.Layouts.master')

@section('content')


    @foreach ($item as $items)
        <div class="internalpagebanner">




            @if ($item[0]->banner_image != '')


                    <img src="{{ asset('uploads/site-logo/' . GetOrganisationAllDetails('default_banner_image')) }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;" alt="{{ $item[0]->name ?? '' }}"
                    title="{{ $item[0]->name ?? '' }}">
            @else

            <img src="{{ asset('page/banner/' . $item[0]->banner_image) ?? '' }}"
                    style="height:auto;  min-height:200px; max-height:500px overflow:hidden;"
                    alt="{{ $item[0]->banner_alt ?? '' }}" title="{{ $item[0]->banner_title ?? '' }}">

            @endif

            <div class="imagecaption">

                <div class="container">

                    <h1>{{ $items->name }}</h1>

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
                    <li><span>{{ $items->name }}</span></li>
                </ul>
            </div>
        </div>
    @endforeach

    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col-md-1">

                </div>

                @if (collect($item)->isEmpty())
                    {{-- remember that $contact is your variable --}}

                    <div class="alert alert-success" role="alert">

                        <h4 class="alert-heading">something went wrong </h4>

                        <p>Data Not Found</p>



                    </div>
                @else

                        <div class="col-md-12">

                            <div class="innerpagecontent">

                                <h3>{{ $item[0]->name }}</h3>

                                <div class="commontxt">

                                    <div class="row">

                                        <div class="col-md-12 col-lg-12">

                                            <p>
                                                {!! $item[0]->content !!}
                                            </p>


                                        </div>

                                        @isset($data)

                                                @foreach ($data as $datas )

                                                <h5><span>{{ $datas->name }}</span></h5>


                                                <div class="col-md-12 col-lg-12">

                                                    <p>
                                                        {!! $datas->content !!}
                                                    </p>


                                                </div>

                                                @endforeach

                                        @endisset



                                    </div>

                                </div>

                            </div>

                        </div>

                @endif



               @if(request()->path() == 'scstobc-cell' || request()->path() == 'sc-st-obc-cell')

               <div class="col-md-12 mb-3">
                <b> <u> Online Portal for registering your complaint: </u> </b>
               </div>

                <div class="com-md-12">



                    <form action="{{ url('sc-st-obc') }}" method="post"  enctype="multipart/form-data">
                        <div class="card">
                         @csrf

                            <div class="card-body">

                            @if (Session::has('success'))
                                <div class="alert alert-success alert-block" role="alert">
                                    <button class="close" data-dismiss="alert"></button>
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0" tabindex="0">Name <span class="text-danger">*</span> </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" value="" name="name" class="form-control special_no" maxlength="250" minlength="2" placeholder="Enter Your Name" maxlength="250" minlength="2">
                                        @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                       @endif

                                    </div>
                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0" tabindex="0">Type <span class="text-danger">*</span> </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <select class="form-control" name="Type">
                                            <option value="">Select Type</option>
                                            <option value="0"> Student</option>
                                            <option value="1">Faculty</option>
                                            <option value="2">Non-Teaching Staff</option>
                                        </select>
                                        @if ($errors->has('Type'))
                                        <div class="text-danger">{{ $errors->first('Type') }}</div>
                                        @endif
                                    </div>

                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Roll No/ Employee Id </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" class="form-control" name="roll_no" placeholder="Roll No/ Employee Id ">

                                        @if ($errors->has('roll_no'))
                                        <div class="text-danger">{{ $errors->first('roll_no') }}</div>
                                       @endif
                                    </div>

                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0" tabindex="0">Complaint Discrimination <span class="text-danger">*</span> </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <select class="form-control" name="Discrimination">
                                            <option value="">Select Type</option>
                                            <option value="0"> Scheduled Caste & Tribe (SC/ST)</option>
                                            <option value="1">Other Backward Caste (OBC)</option>
                                            <option value="2">Minority</option>
                                            <option value="3">Disability</option>
                                        </select>
                                        @if ($errors->has('Discrimination'))
                                        <div class="text-danger">{{ $errors->first('Discrimination') }}</div>
                                       @endif
                                    </div>

                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Complaint Details  <span class="text-danger">*</span> </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea class="form-control special_no" rows="3" name="Complaint_Details" maxlength="250" minlength="2" placeholder="Complaint Details "></textarea>

                                        @if ($errors->has('Complaint_Details'))
                                        <div class="text-danger">{{ $errors->first('Complaint_Details') }}</div>
                                        @endif
                                    </div>

                                </div>


                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Contact No. <span class="text-danger">*</span> </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" value="" name="mobile_no" id="mobile_no"
                                            class="form-control" placeholder="Enter your Contact Number" minlength="10" maxlength="10">
                                            @if ($errors->has('mobile_no'))
                                            <div class="text-danger">{{ $errors->first('mobile_no') }}</div>
                                            @endif
                                    </div>

                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Attachment (only Image, if any)</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="file" name="image" class="form-control">
                                        @if ($errors->has('image'))
                                        <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>

                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Captcha Code <span class="text-danger">*</span> </h6>

                                    </div>
                                    <div class="col-md-4 pe-5">
                                        <input id="captcha" type="text" class="form-control"
                                            placeholder="Enter Captcha" name="captcha">
                                            {{-- @error('captcha')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror --}}
                                           @if ($errors->has('captcha'))
                                           <div class="text-danger">{{ $errors->first('captcha') }}</div>
                                           @endif
                                    </div>

                                    <div class="col-md-4 pe-5">

                                        <div class="captcha d-flex">
                                            <span style="margin-right: 10px;">{!! captcha_img('math') !!}</span>
                                            <button type="button"
                                                class="btn btn-danger px-3 py-1 refresh-captcha text-white"
                                                id="refresh-captcha" style="background:#f03340;color:#fff !important">
                                                &#x21bb;
                                            </button>
                                        </div>

                                    </div>


                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-12 text-ceter">
                                        <button type="submit" class="btn btn-primary btn-sm submit-btn-apply">Submit Your Complaint</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
                @endif

            </div>
        </div>

    </section>


    <script>
        // disable special character
        $('.special_no').keypress(function (e) {

            var regex = new RegExp("^[a-zA-Z_]");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            e.preventDefault();
            return false;
        });
    </script>

    <script type="text/javascript">
        $('#refresh-captcha').click(function() {
            $.ajax({
                type: 'GET',
                url: '<?php echo url('refresh-captcha'); ?>',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>

<script>
    // disable alphate
    $('#mobile_no').keypress(function (e) {
        var regex = new RegExp("^[0-9_]");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });
    </script>
@endsection
