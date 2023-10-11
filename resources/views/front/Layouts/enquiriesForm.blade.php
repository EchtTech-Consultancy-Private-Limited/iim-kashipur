@extends('front.Layouts.master')

@section('content')
    <section class="withsidebar-wrap ptb-60">

        <div class="container">

            <div class="row">

                <div class="col-md-1">

                </div>



                <div class="col-md-12 mb-3">
                    <b> <u> enquiries : </u> </b>
                </div>

                <div class="com-md-12">



                    <form action="{{ url('enquirie') }}" method="post" >
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
                                        <h6 class="mb-0" tabindex="0">Full Name <span class="text-danger">*</span> </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" value="" name="name" class="form-control special_no"
                                            maxlength="250" minlength="2" placeholder="Enter Your Name" maxlength="250"
                                            minlength="2">
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif

                                    </div>
                                </div>

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0" tabindex="0">Email<span class="text-danger">*</span> </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" value="" name="email" class="form-control"
                                            placeholder="Enter Your Email">
                                        @if ($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif

                                    </div>
                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Mobile No. <span class="text-danger">*</span> </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text"  name="mobile_no" id="mobile_no"
                                            class="form-control" placeholder="Enter your Contact Number" maxlength="10">

                                        @if ($errors->has('mobile_no'))
                                            <div class="text-danger">{{ $errors->first('mobile_no') }}</div>
                                        @endif

                                    </div>

                                </div>

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0" tabindex="0">Organization<span class="text-danger">*</span>
                                        </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text"  name="origination" class="form-control"
                                            placeholder="Enter Your Organization">
                                        @if ($errors->has('origination'))
                                            <div class="text-danger">{{ $errors->first('origination') }}</div>
                                        @endif

                                    </div>
                                </div>



                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Query<span class="text-danger">*</span> </h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea class="form-control " rows="3" name="query_Details" maxlength="250" minlength="2" placeholder="Enter your query"></textarea>

                                        @if ($errors->has('query_Details'))
                                        <div class="text-danger">{{ $errors->first('query_Details') }}</div>
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
                                        <button type="submit"
                                            class="btn btn-primary btn-sm submit-btn-apply">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>

    </section>


    <script>
        // disable special character
        $('.special_no').keypress(function(e) {

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
        $('#mobile_no').keypress(function(e) {
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
