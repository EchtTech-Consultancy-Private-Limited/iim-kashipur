@extends('front.Layouts.master')

@section('content')
    {{-- banner image upload --}}

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
                <h3 class="text-light">@lang('common.feedback')</h3>
            </div>
        </div>
    </div>


    {{-- breadcrumbs --}}

    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}"><svg viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z" />
                            <path
                                d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                        </svg></a></li>
                <li><a href="javascript:void(0);"> @lang('common.feedback')</a></li>
            </ul>
        </div>
    </div>






    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">


                @if (Session::has('success'))
                    <div class="alert alert-success col-md-12 text-center">
                        <strong>Success!</strong> {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger col-md-12 text-center">
                        <strong>Oops!</strong> {{ Session::get('error') }}
                    </div>
                @endif



                <div class="col-md-10 mx-auto">

                    <div class="innerpagecontent">

                        <h3><span>@lang('common.feedback') </span></h3>
                    </div>


                    <div class="">

                        <form action="{{ url('add_feedback') }}" method="post">


                            @csrf

                            <input type="hidden" name="form_type" value="feedback" class="form-control form-control-lg">

                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body">

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Name <span class="text-danger">*</span> </h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input type="text"  value="{{ old('name') }}"  name="name"
                                                class="form-control special_no" placeholder="Enter Your Name"  maxlength="250" maxlength="2" />
                                                @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                                @endif



                                        </div>


                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Email address <span class="text-danger">*</span> </h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input type="email" value="{{ old('email') }}" name="email"
                                                class="form-control" placeholder="example@example.com" />

                                                @if ($errors->has('email'))
                                                <div class="text-danger">{{ $errors->first('email') }}</div>
                                                @endif




                                        </div>

                                    </div>
                                    <hr>

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Type <span class="text-danger">*</span> </h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <select class="form-control" name="Type">
                                                <option value="">Select Type</option>
                                                <option value="Suggestion"
                                                    {{ old('Type') == 'Suggestion' ? 'selected' : '' }}> Suggestion
                                                </option>
                                                <option value="Question" {{ old('Type') == 'Question' ? 'selected' : '' }}>
                                                    Question</option>
                                                <option value="Feedback" {{ old('Type') == 'Feedback' ? 'selected' : '' }}>
                                                    Feedback</option>
                                            </select>
                                            @if ($errors->has('Type'))
                                            <div class="text-danger">{{ $errors->first('Type') }}</div>
                                            @endif


                                        </div>


                                    </div>
                                    <hr>

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Mobile Number <span class="text-danger">*</span> </h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input type="text" value="{{ old('mobile_no') }}" name="mobile_no" id="mobile_no"
                                                class="form-control" placeholder="Enter your Mobile Number" maxlength="10"  />

                                                @if ($errors->has('mobile_no'))
                                                <div class="text-danger">{{ $errors->first('mobile_no') }}</div>
                                                @endif


                                        </div>

                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Feedback <span class="text-danger">*</span> </h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <textarea class="form-control special_no"  maxlength="250" maxlength="2" rows="3" name="feedback" placeholder="Feedback">{{ old('feedback') }}</textarea>




                                            @if ($errors->has('feedback'))
                                            <div class="text-danger">{{ $errors->first('feedback') }}</div>
                                            @endif

                                        </div>
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Captcha Code <span class="text-danger">*</span> </h6>

                                        </div>
                                        <div class="col-md-4 pe-5">
                                            <input id="captcha" type="text" class="form-control"
                                                placeholder="Enter Captcha" name="captcha">
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

                                          @if ($errors->has('captcha'))
                                            <div class="text-danger">{{ $errors->first('captcha') }}</div>
                                            @endif
                                        </div>


                                    </div>


                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-12 text-ceter">
                                            <button type="submit"
                                                class="btn btn-primary btn-sm submit-btn-apply">Send</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>

                    </form>

                </div>

            </div>
        </div>
    </section>


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

@endsection
