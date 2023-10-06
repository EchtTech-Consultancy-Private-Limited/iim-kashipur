@extends('admin.Layout.master')

@section('title', $title)

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">



            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">{{ $title }}</h4>

                            <p class="card-description">

                                @if ($errors->any())

                                    <div class="alert alert-danger">

                                        <ul>

                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>

                                    </div>

                                @endif

                                @if (Session::has('error'))

                                    <div class="alert alert-danger col-md-12 text-center">

                                        <strong>Oops!</strong> {{ Session::get('error') }}

                                    </div>

                                @endif

                            </p>

                            @if ($id)

                                <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                    action="{{ url('Accounts/add-edit-quicklink/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-quicklink') }}" enctype="multipart/form-data">

                            @endif

                            @csrf
                            <div class="col-md-12">
                                <div class="form-group"> <label for="urlcategory">Quick Link Section [Select from
                                        Dropdown]*</label>
                                    <select name="urlcategory" class="form-control hide_url news_board_main" id="hide_url">
                                        <option value="">Please Select*</option>
                                        @foreach ($value as $DD)
                                            <option value="{{ $DD->id }}"
                                                @if ($id) @if ($data->link_category == $DD->id) selected @endif
                                                @endif > {{ $DD->Section }} </option>
                                        @endforeach
                                    </select>


                                    <label for="urlcategory" id="urlcategory-error" class="error">
                                        @error('urlcategory')
                                            {{ $message }}
                                        @enderror
                                    </label>



                                </div>
                            </div>
                            <div class="col-md-12"
                                id="@if (isset($data->news_type)) @if (!empty($data->news_type)) @else news_board @endif @endif">
                                <div class="form-group"> <label for="urlcategory">Select News Type</label>
                                    <select name="news_type" class="form-control Notice" class="hide_url ">
                                        <option value="">Please Select</option>
                                        <option value="1"
                                            @if (isset($id)) {{ $data->news_type == '1' ? 'selected' : '' }} @endif>
                                            News & Events</option>
                                        <option value="2"
                                            @if (isset($id)) {{ $data->news_type == '2' ? 'selected' : '' }} @endif>
                                            Industry Connect</option>
                                        <option value="3"
                                            @if (isset($id)) {{ $data->news_type == '3' ? 'selected' : '' }} @endif>
                                            Notice Board</option>

                                    </select>
                                </div>
                            </div>

                            <input type="hidden" class="archive_show" @if (isset($id)) value="{{$data->news_type}}"  @endif>


                            <input type="hidden" name="section" id="section" value="">

                            <div class="col-md-12">
                                <div class="form-group"> <label for="form_name">

                                        <input type="radio" value="" name="external"
                                            @if ($id) {{ $data->external == null ? 'checked' : '' }} @endif
                                            style="margin-left:50px;" id="select_box"> &nbsp;System URL </label>

                                    <input type="radio" value="yes" name="external"
                                        @if ($id) {{ $data->external == 'yes' ? 'checked' : '' }} @endif
                                        style="margin-left:50px;" id="checkbox"> &nbsp;External URL </label>

                                    <input type="radio" value="no" name="external"
                                        @if ($id) {{ $data->external == 'no' ? 'checked' : '' }} @endif
                                        style="margin-left:50px;" id="checkboxs"> &nbsp;Internal URL </label>


                                    <input type="text" name="url1"
                                        @if ($id) value="{{ $data->url }}"  @else value="{{ old('url1') }}" @endif
                                        class="form-control" id="url_ext"
                                        placeholder="Please enter full url; example https://www.example.com "
                                        @if ($data->external == 'yes') style="display:block;" @else style="display:none;" @endif>



                                    <select name="url" id="url" class="form-control"
                                        @if ($data->external == 'yes') style="display:none;" @else style="display:block;" @endif>
                                        <option value="">Please Select*</option>
                                        <option value="{{ '/' }}"
                                            @if ($id) @if ($data->url == url('/')) selected @endif
                                            @endif> No URL</option>
                                        @foreach ($data2 as $D)
                                            <option value="{{ $D->url }}"
                                                @if ($id) @if ('/' . $D->url == $data->url) selected @endif
                                                @endif>{{ $D->url }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group"><label> Link Option </label> &nbsp;

                                    <select class="form-control" name="link" id="countries">

                                        <option value="">Please Select</option>

                                    </select>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="title">Name[English] *</label> <input id="title"
                                        type="text" name="title"
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('title') }}" @endif
                                        class="form-control" placeholder="Please enter title *">

                                    <label for="title" id="title-error" class="error">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </label>


                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="title_h">Name[Hindi] </label> <input id="title_h"
                                        type="text" name="title_h"
                                        @if ($id) value="{{ $data->title_h }}" @else value="{{ old('title_h') }}" @endif
                                        class="form-control" placeholder="Please enter title hindi*">



                                    <label for="title_h" id="title_h-error" class="error">
                                        @error('title_h')
                                            {{ $message }}
                                        @enderror
                                    </label>



                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="form_name">Short Note[English]</label> <input
                                        id="form_name2" type="text" name="short"
                                        @if ($id) value="{{ $data->short }}" @else value="{{ old('short') }}" @endif
                                        class="form-control" placeholder="Please enter short note"> </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="form_name">Short Note[Hindi]</label> <input
                                        id="form_name3" type="text" name="short_h"
                                        @if ($id) value="{{ $data->short_h }}" @else value="{{ old('short_h') }}" @endif
                                        class="form-control" placeholder="Please enter short note hindi"> </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="sort_order">Sort Order</label> <input
                                        id="sort_order" type="text" name="sort_order"
                                        @if ($id) value="{{ $data->sort_order }}" @else value="{{ old('sort_order') }}" @endif
                                        class="form-control" placeholder="Please enter sort order">


                                    <label for="sort_order" id="sort_order-error" class="error">
                                        @error('sort_order')
                                            {{ $message }}
                                        @enderror
                                    </label>


                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="image">Image*</label> <input id="image"
                                        type="file" name="image" accept=".jpeg,.png,.gif,.jpg"
                                        class="form-control">


                                    <label for="image" id="image-error" class="error">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="Image_Title">Image Title*</label> <input
                                        id="Image_Title" type="text" name="Image_Title"
                                        @if ($id) value="{{ $data->Image_Title }}" @else value="{{ old('Image_Title') }}" @endif
                                        class="form-control" placeholder="Please enter Image Title">




                                    <label for="Image_Title" id="Image_Title-error" class="error">
                                        @error('Image_Title')
                                            {{ $message }}
                                        @enderror
                                    </label>




                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="Image_Alt">Image Alt* </label><input id="Image_Alt"
                                        type="text" name="Image_Alt"
                                        @if ($id) value="{{ $data->Image_Alt }}" @else value="{{ old('Image_Alt') }}" @endif
                                        class="form-control" placeholder="Please enter Image Alt">


                                    <label for="Image_Alts" id="Image_Alts-error" class="error">
                                        @error('Image_Alts')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>


                            <div class="col-md-6 archive">
                                <label for="inputText" class="col-form-label">Archive Date</label>
                                <div class="">
                                    <input type="date" class="form-control" name="archive_date"
                                        @if (isset($id)) value="{{ $data->archive_date }}" @else value="{{ old('archive_date') }}" @endif
                                        placeholder="Please enter"><br>
                                    <label for="archive_date" id="archive_date-error" class="error"></label>
                                </div>
                            </div>






                            <input type="hidden" name="slug"
                                @if ($id) value="{{ $data->slug }}" @else value="{{ old('slug') }}" @endif
                                class="form-control">
                            <input type="hidden" name="Notice_Board" value="Academics" class="form-control">
                            <input type="hidden" name="Industry_Connect" value="Footer_info" class="form-control">
                            <input type="hidden" name="Category" value="Category" class="form-control">
                            <input type="hidden" name="Academics" value="Academics" class="form-control">
                            <input type="hidden" name="Footer_info" value="Footer_info" class="form-control">
                            <input type="hidden" name="Footer_info2" value="Footer_info2" class="form-control">
                            <input type="hidden" name="urls" value="urls" class="form-control">
                            <input type="hidden" name="photo_url" value="photo-section" class="form-control">
                            <input type="hidden" name="video_url" value="video-section" class="form-control">
                            <input type="hidden" name="Student_url" value="Student-Corner" class="form-control">

                            <div class="clearfix"></div>

                            <div class="col-md-12">

                                <button type="submit" class="btn btn-primary mr-2" onclick="load();">Submit</button>

                            </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- content-wrapper ends -->

        <script type="text/javascript">
            $("#select_box").on('click', function() {
                $('#tpl_id').attr('required', 'True');
                $('#countries').attr('required', 'True');
                $('#url').attr('required', 'Ture');

            });
        </script>

        <script type="text/javascript">
            $("#checkbox").on('click', function() {

                $('#tpl_id').removeAttr('required');
                $('#countries').removeAttr('required');
                $('#url').removeAttr('required');


                $('#countries').empty();

            });
        </script>

        <script type="text/javascript">
            $("#checkboxs").on('click', function() {

                $('#tpl_id').removeAttr('required');
                $('#url').removeAttr('required');

                $('#countries').empty();
                $('#countries').removeAttr('required');

            });
        </script>



        {{-- onload content page show --}}
        <script>
            $(document).ready(function() {


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var data1 = $("#url").val();
                $('#countries').html("<option selected  value=''>Select option blank</option>");
                if (data1 == 'content-page') {
                    $.ajax({
                        url: "{{ url('/Accounts/dropdown') }}",
                        type: "get",
                        success: function(data) {

                            var resdata = data.data;
                            console.log(resdata);

                            var formoption = "<option selected  value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                if ('{{ $data->link_option }}' == resdata[i].id) {
                                    formoption += "<option value='" + resdata[i].id + "' selected>" +
                                        resdata[i].name + "</option>";
                                } else {
                                    formoption += "<option value='" + resdata[i].id + "'>" + resdata[i]
                                        .name + "</option>";
                                }
                            }
                            $('#countries').html(formoption);

                        }

                    });
                }
            });
        </script>


        {{-- image section lonload  --}}


        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data3 = $("#url").val();



                if (data3 == 'photo-gallery') {

                    $.ajax({
                        url: "{{ url('Accounts/photodata') }}",
                        type: "get",
                        success: function(data) {

                            console.log(data);
                            var resdata = data.data;

                            console.log(resdata);

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                //    formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";

                                if ('{{ $data->link_option }}' == resdata[i].id) {
                                    formoption += "<option value='" + resdata[i].id + "' selected>" +
                                        resdata[i].name + "</option>";
                                } else {
                                    formoption += "<option value='" + resdata[i].id + "'>" + resdata[i]
                                        .name + "</option>";
                                }


                            }
                            $('#countries').html(formoption);

                        }
                    });
                }
            });
        </script>


        {{-- video section onload  --}}

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data2 = $("#url").val();



                if (data2 == 'video-gallery') {

                    $.ajax({
                        url: "{{ url('Accounts/videodata') }}",
                        type: "get",
                        success: function(data) {

                            console.log(data);
                            var resdata = data.data;

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                //    formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
                                if ('{{ $data->link_option }}' == resdata[i].id) {
                                    formoption += "<option value='" + resdata[i].id + "' selected>" +
                                        resdata[i].name + "</option>";
                                } else {
                                    formoption += "<option value='" + resdata[i].id + "'>" + resdata[i]
                                        .name + "</option>";
                                }
                            }
                            $('#countries').html(formoption);

                        }
                    });
                }
            });
        </script>


        <script type="text/javascript">
            $("#select_box").on('change', function() {

                if ($("#select_box").is(':checked')) {

                    $("#url").show();
                    $("#url_ext").hide();
                } else {
                    $("#url").hide();
                    $("#url_ext").show();
                }
            });
        </script>

        <script type="text/javascript">
            $("#hide_url").on('change', function() {

                var section_id = $('#hide_url option:selected').text()
                // alert(section_id)
                $('#section').val(section_id)
            });
        </script>


        <script type="text/javascript">
            $(document).ready(function() {

               // alert($(this).val())
                 $('.archive_show').val()

                if($('.archive_show').val() == 3){
                    $(".archive").show();
                }else{
                    $(".archive").hide();
                }
            });
        </script>

        <script type="text/javascript">
            $(".Notice").on('change', function() {

               // alert($(this).val());
                if ($(this).val() == 3) {
                    $(".archive").show();
                } else {
                    $(".archive").hide();
                }

                // alert(section_id)

            });
        </script>


        <script type="text/javascript">
            $(document).ready(function() {

                var section_id = $('#hide_url option:selected').text()
                // alert(section_id)
                $('#section').val(section_id)
            });
        </script>


        <script type="text/javascript">
            $("#checkbox").on('change', function() {
                if ($("#checkbox").is(':checked')) {
                    $("#url").hide();
                    $("#url_ext").show();
                } else {
                    $("#url").show();
                    $("#url_ext").hide();
                }
            });
        </script>




        <script type="text/javascript">
            $("#checkboxs").on('change', function() {

                if ($("#checkboxs").is(':checked')) {
                    $("#url").hide();
                    $("#url_ext").show();
                } else {
                    $("#url").show();
                    $("#url_ext").hide();
                }
            });
        </script>






        <!------------------------------- content page dropdown---------------------------------- -->


        <script>
            $("#url").on('change', function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var data1 = $("#url").val();
                $('#countries').html("<option selected disabled value='0'>Please select</option>");
                if (data1 == 'content-page') {
                    $.ajax({
                        url: "{{ url('/Accounts/dropdown') }}",
                        type: "get",
                        success: function(data) {

                            var resdata = data.data;

                            var formoption = "<option selected  value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                if ('{{ $data->link_option }}' == resdata[i].id) {
                                    formoption += "<option value='" + resdata[i].id + "' selected>" +
                                        resdata[i].name + "</option>";
                                } else {
                                    formoption += "<option value='" + resdata[i].id + "'>" + resdata[i]
                                        .name + "</option>";
                                }
                            }
                            $('#countries').html(formoption);

                        }

                    });
                }
            });
        </script>

        {{-- video section onload --}}

        <script>
            $("#url").change(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data2 = $("#url").val();



                if (data2 == 'video-gallery') {

                    $.ajax({
                        url: "{{ url('Accounts/videodata') }}",
                        type: "get",
                        success: function(data) {

                            console.log(data);
                            var resdata = data.data;

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name +
                                    "</option>";
                            }
                            $('#countries').html(formoption);

                        }
                    });
                }
            });
        </script>

        {{--  --}}


        <!--------------------------------------- blog section -------------------------------------->
        <script>
            $("#url").change(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data1 = $("#url").val();



                if (data1 == 'blog') {

                    $.ajax({
                        url: "{{ url('Accounts/blogdata') }}",
                        type: "get",
                        success: function(data) {

                            console.log(data);
                            var resdata = data.data;

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name +
                                    "</option>";
                            }
                            $('#countries').html(formoption);

                        }
                    });
                }
            });
        </script>

        <!--------------------------------------- video section -------------------------------------->

        <script>
            $("#url").change(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data2 = $("#url").val();



                if (data2 == 'video-gallery') {

                    $.ajax({
                        url: "{{ url('Accounts/videodata') }}",
                        type: "get",
                        success: function(data) {

                            console.log(data);
                            var resdata = data.data;

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name +
                                    "</option>";
                            }
                            $('#countries').html(formoption);

                        }
                    });
                }
            });
        </script>

        <!--------------------------------------- photo section -------------------------------------->

        <script>
            $("#url").change(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data3 = $("#url").val();



                if (data3 == 'photo-gallery') {

                    $.ajax({
                        url: "{{ url('Accounts/photodata') }}",
                        type: "get",
                        success: function(data) {

                            console.log(data);
                            var resdata = data.data;

                            console.log(resdata);

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name +
                                    "</option>";
                            }
                            $('#countries').html(formoption);

                        }
                    });
                }
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#news_board').hide();

            });

            $(".news_board_main").on("change", function() {
                // alert("test");
                var listvalue = $(this).val();
                //alert(listvalue);
                if (listvalue == 25) {
                    $('#news_board').show();
                } else {
                    $('#news_board').hide();

                }



            });
        </script>
        {{-- -------------------------------------- Cube Cell committee---------------------------------------------------- --}}

        <script>
            $("#url").change(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data3 = $("#url").val();
                //alert(data3)

                if (data3 == 'Club-Cells-Committee') {

                    $.ajax({
                        url: "{{ url('Accounts/cells') }}",
                        type: "get",
                        success: function(data) {

                            console.log(data)

                            var resdata = data;

                            // alert(resdata);

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].title +
                                    "</option>";
                            }
                            $('#countries').html(formoption);

                        }
                    });
                }
            });
        </script>

        {{-- -------------------------------------------- Our journey    ----------------------------------------------------------- --}}
        <script>
            $("#url").change(function(e) {

                // alert('hii');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data3 = $("#url").val();
                //alert(data3)

                if (data3 == 'Organisation-Journey') {

                    $.ajax({
                        url: "{{ url('Accounts/journey-value') }}",
                        type: "get",
                        success: function(data) {
                            console.log(data)
                            var resdata = data;

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].title +
                                    "</option>";
                            }
                            $('#countries').html(formoption);
                        }
                    });
                }
            });
        </script>

        {{-- --------------------------------------------Student council  ----------------------------------------------------------- --}}
        <script>
            $("#url").change(function(e) {
                // alert('hii');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data3 = $("#url").val();
                //alert(data3)

                if (data3 == 'student-council') {

                    $.ajax({
                        url: "{{ url('Accounts/student-list') }}",
                        type: "get",
                        success: function(data) {
                            console.log(data)
                            var resdata = data;

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i]
                                    .student_council +
                                    "</option>";
                            }
                            $('#countries').html(formoption);
                        }
                    });
                }
            });
        </script>



        {{-- -------------------------------------------- journal-publications ----------------------------------------------------------- --}}
        <script>
            $("#url").change(function(e) {
                //  alert('hii');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data3 = $("#url").val();
                // alert(data3)

                if (data3 == 'journal-publications') {

                    $.ajax({
                        url: "{{ url('Accounts/journal-publications-list') }}",
                        type: "get",
                        success: function(data) {
                            console.log(data.item)
                            var resdata = data.item;

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].title +
                                    "</option>";
                            }
                            $('#countries').html(formoption);
                        }
                    });
                }
            });
        </script>


        {{-- -------------------------------------------- Wellness-Facilities ----------------------------------------------------------- --}}
        <script>
            $("#url").change(function(e) {
                // alert('hii');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data3 = $("#url").val();
                //alert(data3)

                if (data3 == 'Wellness-Facilities') {

                    $.ajax({
                        url: "{{ url('Accounts/Wellness-Facilities-id') }}",
                        type: "get",
                        success: function(data) {
                            console.log(data.item)
                            var resdata = data.item;

                            var formoption = "<option value='0'>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].title +
                                    "</option>";
                            }
                            $('#countries').html(formoption);
                        }
                    });
                }
            });
        </script>

    @endsection
