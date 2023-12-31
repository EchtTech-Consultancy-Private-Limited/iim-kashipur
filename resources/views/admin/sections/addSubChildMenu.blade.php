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
                                    action="{{ url('Accounts/add-edit-sub-child-menu/' . $id) }}"
                                    enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-sub-child-menu') }}"
                                        enctype="multipart/form-data">

                            @endif

                            @csrf



                            <div class="col-md-6">

                                <div class="form-group"> <label for="menu_id">Main Menu *</label>

                                    <select name="menu_id" id="menu_id" class="form-control" required>

                                        <option value="">Please Select</option>

                                        @foreach ($data1 as $X)
                                            <option value="{{ $X->id }}"
                                                @if ($id) @if ($X->id == $data->menu_id) selected @endif
                                                @endif>{{ $X->name }}</option>
                                        @endforeach

                                    </select>


                                    <label for="menu_id" id="menu_id-error" class="error">
                                        @error('menu_id')
                                            {{ $message }}
                                        @enderror
                                    </label>


                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"><label> Sub Menu * </label> &nbsp;
                                    <select class="form-control" name="sub_id" id="submenues" required>
                                        <option selected disabled value="">Please Select</option>
                                    </select>


                                    <label for="submenues" id="submenues-error" class="error">
                                        @error('submenues')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group"><label> Child Menu * </label> &nbsp;
                                    <select class="form-control" name="child_id" id="Childsubmenues" required>
                                        <option selected disabled value="">Please Select</option>
                                    </select>


                                    <label for="Childsubmenues" id="Childsubmenues-error" class="error">
                                        @error('Childsubmenues')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>
                            </div>



                            <div class="col-md-6">

                                <div class="form-group"> <label for="name">Name *</label> <input id="name"
                                        type="text" name="name"
                                        @if ($id) value="{{ $data->name }}" @else value="{{ old('name') }}" @endif
                                        class="form-control" placeholder="Please enter name *" required="required">

                                    <label for="name" id="name-error" class="error">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </label>


                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group"> <label for="name_h">Name[Hindi] *</label> <input id="name_h"
                                        type="text" name="name_h"
                                        @if ($id) value="{{ $data->name_h }}" @else value="{{ old('name_h') }}" @endif
                                        class="form-control" placeholder="Please enter name *" required="required">


                                    <label for="name_h" id="name_h-error" class="error">
                                        @error('name_h')
                                            {{ $message }}
                                        @enderror
                                    </label>


                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="form-group"> <label for="sort_order ">Sort order</label>
                                    <input type="text" name="sort_order" class="form-control"
                                        placeholder="Please enter name *" required="required"
                                        value="{{ $data->sort_order }}" required="required">



                                    <label for="sort_order" id="sort_order-error" class="error">
                                        @error('sort_order')
                                            {{ $message }}
                                        @enderror
                                    </label>





                                </div>
                            </div>




                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="tpl_id">Template *</label>

                                    <select name="tpl_id" id="tpl_id" class="form-control" required="required">

                                        <option value="">Please Select Template</option>
                                        @foreach (GetTemplatesList() as $tplkey => $tplval)
                                            <option value="{{ $tplkey }}"
                                                @if ($id) @if ($tplkey == $data->tpl_id) Selected @endif
                                                @endif>{{ $tplval }}</option>
                                        @endforeach
                                    </select>



                                    <label for="tpl_id" id="tpl_id-error" class="error">
                                        @error('tpl_id')
                                            {{ $message }}
                                        @enderror
                                    </label>




                                </div>
                            </div>

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
                                        @if ($data->external == 'yes') style="display:none;" @else style="display:block;" @endif
                                        required="required">
                                        <option selected disabled value="">Please Select</option>
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
                                    <select class="form-control" name="link_option" id="countries" required="required">
                                        <option selected disabled value="">Please Select</option>
                                    </select>





                                </div>
                            </div>



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


            });
        </script>

        <script type="text/javascript">
            $("#checkboxs").on('click', function() {

                $('#tpl_id').removeAttr('required');
                $('#countries').removeAttr('required');
                $('#url').removeAttr('required');
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



            $(document).ready(function() {

                var parentvalue = ($("#menu_id").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/Accounts/submenushow') }}",
                    type: "get",
                    data: {
                        id: parentvalue
                    },
                    success: function(data) {

                        var resdata = data.data;
                        // console.log(resdata);
                        var formoption = "<option value=''>Please select</option>";
                        for (i = 0; i < resdata.length; i++) {
                            if ('{{ $data->sub_id }}' == resdata[i].id) {
                                formoption += "<option value='" + resdata[i].id + "' selected>" + resdata[i]
                                    .name + "</option>";
                            } else {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name +
                                    "</option>";
                            }

                        }
                        $('#submenues').html(formoption);
                    }
                });

            });



            $("#submenues").on('change', function() {
                var parentvalue = ($("#submenues").val());

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/Accounts/childmenushow') }}",
                    type: "get",
                    data: {
                        id: parentvalue
                    },
                    success: function(data) {

                        var resdata = data.data;
                        console.log(resdata);
                        var formoption = "<option value=''>Please select</option>";
                        for (i = 0; i < resdata.length; i++) {
                            if ('{{ $data->link_option }}' == resdata[i].id) {
                                formoption += "<option value='" + resdata[i].id + "' selected>" + resdata[i]
                                    .name + "</option>";
                            } else {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name +
                                    "</option>";
                            }

                        }
                        $('#Childsubmenues').html(formoption);
                    }
                });

            });


              $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/Accounts/childmenushowid') }}",
                    type: "get",
                    data: {
                        id: parentvalue
                    },
                    success: function(data) {

                        var resdata = data.data;
                        console.log(resdata);
                        var formoption = "<option value=''>Please select</option>";
                        for (i = 0; i < resdata.length; i++) {
                            if ('{{ $data->link_option }}' == resdata[i].id) {
                                formoption += "<option value='" + resdata[i].id + "' selected>" + resdata[i]
                                    .name + "</option>";
                            } else {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name +
                                    "</option>";
                            }

                        }
                        $('#Childsubmenues').html(formoption);
                    }
                });

            });
        </script>

        <script>
            $(document).ready(function() {

                var parentvalue = ($("#menu_id").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/Accounts/submenushow') }}",
                    type: "get",
                    data: {
                        id: parentvalue
                    },
                    success: function(data) {

                        var resdata = data.data;
                        // console.log(resdata);
                        var formoption = "<option value=''>Please select</option>";
                        for (i = 0; i < resdata.length; i++) {
                            if ('{{ $data->sub_id }}' == resdata[i].id) {
                                formoption += "<option value='" + resdata[i].id + "' selected>" + resdata[i]
                                    .name + "</option>";
                            } else {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name +
                                    "</option>";
                            }

                        }
                        $('#submenues').html(formoption);
                    }
                });

            });


            $("#menu_id").on('change', function() {
                var parentvalue = ($("#menu_id").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/Accounts/submenushow') }}",
                    type: "get",
                    data: {
                        id: parentvalue
                    },
                    success: function(data) {

                        var resdata = data.data;
                        //  console.log(resdata);
                        var formoption = "<option value=''>Please select</option>";
                        for (i = 0; i < resdata.length; i++) {
                            if ('{{ $data->link_option }}' == resdata[i].id) {
                                formoption += "<option value='" + resdata[i].id + "' selected>" + resdata[i]
                                    .name + "</option>";
                            } else {
                                formoption += "<option value='" + resdata[i].id + "'>" + resdata[i].name +
                                    "</option>";
                            }

                        }
                        $('#submenues').html(formoption);
                    }
                });

            });
        </script>



        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var data1 = $("#url").val();

                if (data1 == 'content-page') {

                    $.ajax({
                        url: "{{ url('/Accounts/dropdown') }}",
                        type: "get",
                        success: function(data) {

                            var resdata = data.data;

                            var formoption = "<option selected disabled value=''>Please select</option>";
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

                            var formoption = "<option selected disabled value=''>Please select</option>";
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



        <script>
            $("#url").change(function(e) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var department = $("#url").val();
                if (department == 'who-is-who') {
                    $.ajax({
                        url: "{{ url('/Accounts/Department_info') }}",
                        type: "get",
                        success: function(data) {

                            // console.log(data);

                            var resdata = data.data;

                            var formoption = "<option value=''>Please select</option>";
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






        {{-- onload content page show --}}
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var data1 = $("#url").val();
                $('#countries').html("<option selected disabled value=''>Please select</option>");
                if (data1 == 'content-page') {
                    $.ajax({
                        url: "{{ url('/Accounts/dropdown') }}",
                        type: "get",
                        success: function(data) {

                            var resdata = data.data;
                            console.log(resdata);

                            var formoption = "<option selected disabled value='0'>Please select</option>";
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

        {{-- onload section  --}}


        {{-- who is who link page section  --}}

        <script>
            $(document).ready(function() {


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var department = $("#url").val();

                if (department == 'who-is-who')

                {

                    $.ajax({
                        url: "{{ url('/Accounts/Department_info') }}",
                        type: "get",
                        success: function(data) {
                            var resdata = data.data;

                            var formoption = "<option value=''>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                //    formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].title+"</option>";

                                if ('{{ $data->link_option }}' == resdata[i].id) {
                                    formoption += "<option value='" + resdata[i].id + "' selected>" +
                                        resdata[i].title + "</option>";
                                } else {
                                    formoption += "<option value='" + resdata[i].id + "'>" + resdata[i]
                                        .title + "</option>";
                                }

                            }
                            $('#countries').html(formoption);

                        }
                    });
                }
            });
        </script>


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


                            var resdata = data.data;

                            var formoption = "<option value=''>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                //    formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].title+"</option>";

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


        <script>
            $("#url").change(function(e) {
              //  alert('hii');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data2 = $("#url").val();

                // alert(data2)

                if (data2 == 'video-gallery') {

                    $.ajax({
                        url: "{{ url('Accounts/videodata') }}",
                        type: "get",
                        success: function(data) {


                            var resdata = data.data;

                            var formoption = "<option value=''>Please select</option>";
                            for (i = 0; i < resdata.length; i++) {
                                //    formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].title+"</option>";

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

<!--------------------------------------- Event & Activity -------------------------------------->

<script >
    $("#url").change(function(e){

 $.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
      });

      var data3=$("#url").val();

      if(data3=='Events-Activites')
      {

      $.ajax({
        url: "{{url('Accounts/event-activity')}}",
        type: "get",
        success: function(data){

         console.log(data);
         var resdata = data.data;

         console.log(resdata);

       var formoption = "<option value='0'>Please select</option>";
       for(i=0; i<resdata.length; i++)
       {
       formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].title+"</option>";
        }
        $('#countries').html(formoption);

        }
     });
   }
});
</script>


{{-- -------------------------------------------- dissertation ----------------------------------------------------------- --}}
<script>
    $("#url").change(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data3 = $("#url").val();

        if (data3 == 'dissertation') {

            $.ajax({
                url: "{{ url('Accounts/dissertation-api') }}",
                type: "get",
                success: function(data) {

                 //   console.log(data)

                    var resdata = data.data;

                    //alert(resdata);

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

    @endsection
