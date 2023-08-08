@extends('admin.Layout.master')

@section('title', 'Manage Journal Publications Inerpage ')

@section('content')


    <style>
        .modal-dialog.modal-md {
            max-width: 900px;
            margin-top: 5%;
        }

        .modal .modal-dialog .modal-content .modal-body {
            padding: 20px 26px;
        }

        .modal {
            overflow: auto !important;
        }

        .form-group {
            margin-bottom: 0.5rem;
        }
    </style>


    <div class="main-panel">

        <div class="content-wrapper">

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

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <div class="top-menu-button">

                                <p class="card-title">Manage Journal Publications Inerpage </p>

                                <div>

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#add_pulication">Add New Journal Publications</button>


                                </div>

                            </div>


                            <div class="row">

                                <div class="col-12">

                                    <div class="table-responsive">

                                        <table id="example" class="display expandable-table" style="width:100%">

                                            <thead>

                                                <tr>

                                                    <th>S.No#</th>

                                                    <th>About</th>

                                                    <th>url</th>

                                                    <th>Status</th>

                                                    <th>Action</th>
                                                </tr>

                                            </thead>

                                            <tbody>

                                                @foreach ($data as $K => $D)
                                                    <tr>

                                                        <td>{{ $K + 1 }}</td>


                                                        <td>{!! $D->about_details !!}</td>

                                                        <td>{{ $D->url }}</td>


                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($D->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($D->id) . '/journal_publication_childs') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($D->id) . '/journal_publication_childs') }}"
                                                                        style="color:red;">Inactive</a>
                                                                @endif
                                                            @else
                                                                @if ($D->status == 1)
                                                                    <span" style="color:green;">Active</span>
                                                                    @else
                                                                        <span style="color:red;">Inactive</span>
                                                                @endif
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-primary" id="update"
                                                        data-id="{{ $D->id }}" data-toggle="modal"
                                                        data-target="#exampleModalupdate"
                                                        data-whatever="@getbootstrap"><i
                                                            class="ti-pencil btn-icon-append"
                                                            style="color:black;"></i></button> &nbsp;


                                                            <button type="button" class="btn btn-primary" id="view"
                                                            data-id="{{ $D->id }}" data-toggle="modal"
                                                            data-target="#exampleModalview"
                                                            data-whatever="@getbootstrap"><i
                                                                class="ti-eye btn-icon-append"
                                                                style="color:black;"></i></button> &nbsp;




                                                            <a class="btn btn-primary"
                                                            href="{{ url('Accounts/delete-journal-publications_page/' . dEncrypt($D->id)) }}"
                                                            onclick="return confirm('Are you sure to edit this record?')"><i
                                                                class="ti-trash btn-icon-append"
                                                                style="color:black;"></i></a>


                                                        </td>




                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>


                                    {{-- {{ $value->links('pagination::bootstrap-5') }} --}}


                                </div>

                            </div>



                        </div>

                    </div>


                </div>

            </div>

        </div>


        <!--modal-->

        <div class="modal fade" id="add_pulication" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel"></h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>



                    <div class="modal-body pb-0">


                        <form class="forms-sample row col-md-12" method="POST" id="regForm"
                            action="{{ url('Accounts/add-edit-journal-publications_page') }}" enctype="multipart/form-data">


                            @csrf

                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details"
                                        placeholder="Please enter About Details" required> {{ old('about_details') }} </textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>

                            <input type="hidden" name="parent_id" value="{{ $id }}">

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">url*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="url"placeholder="Please enter url"
                                        required value="{{ old('url') }}"><br>
                                    <label for="url" id="url-error" class="error"></label>
                                </div>
                            </div>



                            <div class="col-md-12">

                                <label for="event" class="col-form-label">Status</label>

                                <select class="form-control" aria-label="Default select example" name="status">

                                    <option selected>Please select status</option>

                                    <option value="1">Active</option>

                                    <option value="0">Inactive</option>

                                </select>

                            </div>

                            <div class="col-md-12 mt-4">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" class="form-control">Submit</button>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>

            </div>

        </div>


{{-- view --}}

<div class="modal fade" id="exampleModalview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">

<div class="modal-dialog modal-md" role="document">

    <div class="modal-content">

        <div class="modal-header">

            <h5 class="modal-title" id="exampleModalLabel">View
                image</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">×</span>

            </button>

        </div>

        <div class="modal-body">




        <div class="col-md-12">
            <label for="about_details" class="col-form-label">About Details</label>
            <div class="">
                <textarea class="form-control about_details"  readonly rows="4" name="about_details"
                    placeholder="Please enter About Details" ></textarea><br>

            </div>
        </div>


        <div class="col-md-12">
            <label for="inputText" class="col-form-label">url*</label>
            <div class="">
                <input type="text" readonly class="form-control url"
                    name="url"placeholder="Please enter url"
                      ><br>

            </div>
        </div>

    </div>

    </div>

</div>

</div>



        <!-- multiple image table code -->


        <div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Update
                            image</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body">



                <form class="forms-sample row col-md-12" method="POST" id="form"
                        action="" enctype="multipart/form-data">


                    @csrf

                    <div class="col-md-12">
                        <label for="about_details" class="col-form-label">About Details</label>
                        <div class="">
                            <textarea class="form-control about_details" id="about_details" rows="4" name="about_details"
                                placeholder="Please enter About Details" ></textarea><br>
                            <label for="about_details" id="about_details-error" class="error"></label>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label for="inputText" class="col-form-label">url*</label>
                        <div class="">
                            <input type="text" class="form-control"
                                name="url"placeholder="Please enter url"  id="url"
                                  ><br>
                            <label for="url" id="url-error" class="error"></label>
                        </div>
                    </div>

                    <input type="hidden" name="parent_id" value="{{ $id }}">


                    <div class="col-md-12">

                        <label for="event" class="col-form-label">Status</label>

                            <select class="form-control" aria-label="Default select example" id="imagestatus" name="status">

                                <option selected>Please select status</option>

                                <option value="1" >Active</option>

                                <option value="0">Inactive</option>

                            </select>

                    </div>
                    </div>


                    <div class="col-md-12">

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                       </div>


                </div>

            </div>

        </div>


        <script type="text/javascript">
            function abc(id) {

                a = '<?php echo asset('uploads'); ?>';

                src = a + "/" + id;

                $("#1").html('<img src="' + src + '" style="width:100%;height:100%;">');

            }
        </script>

        <script type="text/javascript">
            CKEDITOR.replace('about_details');
        </script>





<script>
    $(document).on("click", "#update", function() {
        var UserName = $(this).data('id');
       //alert(UserName);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: "{{ url('/Accounts/journal_id') }}",
            type: "get",
            data: {
                id: UserName
            },
            success: function(data) {

               // console.log(data.item.about_details);

                $('#form').attr('action', '{{ url('Accounts/add-edit-journal-publications_page') }}'+
                    '/'+data.item.id)

                $("#url").val(data.item.url);
                $("#imagestatus").val(data.item.status);
                $(".about_details").html(data.item.about_details)

            }

        });

    });
</script>



<script>
    $(document).on("click", "#view", function() {
        var UserName = $(this).data('id');
       //alert(UserName);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: "{{ url('/Accounts/journal_id') }}",
            type: "get",
            data: {
                id: UserName
            },
            success: function(data) {

                $(".url").val(data.item.url);
                $(".about_details").html(data.item.about_details)

            }

        });

    });
</script>





    @endsection
