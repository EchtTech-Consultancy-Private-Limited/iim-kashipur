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
                <h3 class="text-light">Registration</h3>
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
                <li><a href="javascript:void(0);">Registration</a></li>
            </ul>
        </div>
    </div>


    <section id="contact" class="section-bg">

        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="form-box">
                <div class="section-header">
                    <h2 id="value">Registration</h2>
                </div>

                <div class="form">

                    <form action="#" method="post" class="php-email-form">

                        <div class="mb-4">
                            <label class="note-field"><sup class="text-danger">*</sup> All fields are mandatory</label>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required="required">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Select Profession</label>
                                <select class="form-control" required="">
                                    <option>--Select--</option>
                                    <option>Student </option>
                                    <option>Faculty </option>
                                    <option>Industry Professionals. </option>

                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label>Gender</label>
                                <select class="form-control" required="">
                                    <option>--Select--</option>
                                    <option>Male </option>
                                    <option>Female </option>

                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label>Institute Name</label>
                                <input type="text" name="Institute_name" class="form-control" id="Institute_name"
                                    placeholder="Institute Name" required="">
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label>Author Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Author Email" required="">
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label>Author Contact No.</label>
                                <input type="tel" name="Author_Contact" class="form-control" id="Author_Contact"
                                    placeholder="Author Contact No." required="">
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label>Title of the Abstract</label>
                                <input type="text" name="Title_A" class="form-control" id="Title_A"
                                    placeholder="Title of the Abstract " required="">
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label>Track</label>
                                <select class="form-control" required="">
                                    <option>--Select--</option>
                                    <option>Sustainability & Marketing</option>
                                    <option>Consumer Well-being in Emerging Markets</option>
                                    <option>Product Development & Marketing Strategy</option>
                                    <option>Technological Innovation in Marketing</option>
                                    <option>Negative Events in Marketing: Role of Digital Media</option>
                                    <option>Innovative and Emerging Trends in Consumer Behavior, Advertising, and
                                        Branding</option>
                                    <option>Innovation in Consumer Experiences</option>
                                    <option>Innovation in Pricing</option>
                                </select>
                            </div>


                            <div class="form-group col-md-6 mb-3">
                                <label>Author Name</label>
                                <input type="text" name="Author_name " class="form-control" id="Author_name"
                                    placeholder="Author Name" required="">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Co-Author Name</label>
                                <input type="text" name="Co-Author_name " class="form-control" id="Co-Author_name"
                                    placeholder="Co-Author Name" required="">
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label>Co-Author Email</label>
                                <input type="email" class="form-control" name="Co-Author_Email" id="Co-Author_Email"
                                    placeholder="Co-Author Email" required="">
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label>Co-Author Contact No.</label>
                                <input type="tel" name="Co-Author_Contact No." class="form-control"
                                    id="Co-Author_Contact_No." placeholder="Co-Author Contact No." required="">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Upload the extended abstract (up to 2000 words) (10 MB uploading
                                    capacity)</label>
                                <input type="file" name="upload_file" class="form-control" id="upload_file"
                                    placeholder="" required="">
                            </div>

                        </div>


                        <div class="text-center">
                            <button type="submit" id="submit">Submit</button>
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


@endsection

