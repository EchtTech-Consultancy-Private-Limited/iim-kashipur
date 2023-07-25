@extends('admin.Layout.master')

@section('title', 'Manage Quarter RIT')

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
                            <h4 class="card-title">Manage Quarter RIT</h4>




                            <div class="row">

                                <div class="col-md-12">

                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo">Add New Quarter RIT</button>

                                </div>

                                <div class="col-12">
                                    <div class="table-responsive">
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <table id="example" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S.No#</th>
                                                    <th>pdf</th>
                                                    <th>Status</th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>

                                                        <td>
                                                            <a href="{{ url('uploads/rti' . $item->pdf) }}" download>

                                                                <img src="{{ asset('admin/images/viewpdf.jpg') }}"
                                                                    width="170" height="70">

                                                            </a>
                                                        </td>


                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($item->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($item->id) . '/rit_report_sections') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($item->id) . '/rit_report_sections') }}"
                                                                        style="color:red;">Inactive</a>
                                                                @endif
                                                            @else
                                                                @if ($item->status == 1)
                                                                    <span" style="color:green;">Active</span>
                                                                    @else
                                                                        <span style="color:red;">Inactive</span>
                                                                @endif
                                                            @endif
                                                        </td>


                                                        <td>
                                                            <button type="button" class="btn btn-primary" id="update"
                                                                data-id="{{ $item->id }}" data-toggle="modal"
                                                                data-target="#exampleModalupdate"
                                                                data-whatever="@getbootstrap"><i
                                                                    class="ti-pencil btn-icon-append"
                                                                    style="color:black;"></i></button>


                                                            <a class="btn btn-primary"
                                                                href="{{ url('Accounts/delete-rit-pdf/' . dEncrypt($item->id)) }}"
                                                                onclick="return confirm('Are you sure to edit this record?')"><i
                                                                    class="ti-trash btn-icon-append"
                                                                    style="color:black;"></i></a>
                                                        </td>

                                                    </tr>
                                                @endforeach


                                                </tr>
                                            </tbody>
                                        </table>







                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Upload New Pdf</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>



                    <div class="modal-body pb-0">

                        <form role="form" id="regForm" action="{{ url('Accounts/add_rit') }}" method="post"
                            class="registration-form row" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf

                            <div class="form-group col-md-6">

                                <label for="filename">QUARTER-1 PDF*</label>

                                <input type="file" name="QUARTER_pdf1" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name">

                                <label for="filename" id="filename-error" class="error">
                                </label>


                            </div>


                            <div class="form-group col-md-6">

                                <label for="filename">QUARTER-2 PDF*</label>

                                <input type="file" name="QUARTER_pdf2" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name">

                                <label for="filename" id="filename-error" class="error">
                                </label>


                            </div>
                            <div class="form-group col-md-6">

                                <label for="filename">QUARTER-3 PDF*</label>

                                <input type="file" name="QUARTER_pdf3" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name">

                                <label for="filename" id="filename-error" class="error">
                                </label>


                            </div>


                            <div class="form-group col-md-6">

                                <label for="filename">QUARTER-4 PDF*</label>

                                <input type="file" name="QUARTER_pdf4" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name">

                                <label for="filename" id="filename-error" class="error">
                                </label>


                            </div>



                            <div class="form-group col-md-6">

                                <label for="image_text">year*</label>

                                <input type="date" name="year" placeholder="Enter your Image Text"
                                    class="form-last-name form-control" id="form-last-name" autocomplete="off">


                                <label for="image_text" id="image_text-error" class="error">
                                </label>

                            </div>



                            <div class="form-group col-md-6">

                                <label for="status">status</label>

                                <select class="form-control" aria-label="Default select example" name="status">

                                    <option selected="">Please select status</option>

                                    <option value="1">Active</option>

                                    <option value="0">Inactive</option>

                                </select>


                                <label for="status" id="status-error" class="error">
                                </label>
                            </div>


                            <div class="col-md-12 modal-footer">
                                <button type="submit" class="btn btn-primary" id="savebtn">Save</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>


        <!-- multiple image table code -->


        <div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Update
                            PDF</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <form action="" id="form" method="post" class="registration-form row"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="form-group col-md-6">

                                <label for="filename">QUARTER-1 PDF*</label>

                                <input type="file" name="QUARTER_pdf1" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name" id="QUARTER_pdf1">

                                <label for="filename" id="filename-error" class="error">
                                </label>

                                 <a href=""  download id='QUARTER_pdf1' class="pdf_class">

									 <img src="{{ asset('admin/images/viewpdf.jpg') }}"  width="170" height="70">

								</a>


                            </div>


                            <div class="form-group col-md-6">

                                <label for="filename">QUARTER-2 PDF*</label>

                                <input type="file" name="QUARTER_pdf2" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name" id="QUARTER_pdf2">

                                <label for="filename" id="filename-error" class="error">
                                </label>

                                 <a href=""  download id='QUARTER_pdf2' class="pdf_class">

									 <img src="{{ asset('admin/images/viewpdf.jpg') }}"  width="170" height="70">

								  </a>



                            </div>
                            <div class="form-group col-md-6">

                                <label for="filename">QUARTER-3 PDF*</label>

                                <input type="file" name="QUARTER_pdf3" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name" id="QUARTER_pdf3">

                                <label for="filename" id="filename-error" class="error">
                                </label>

                                 <a href=""  download id='QUARTER_pdf3' class="pdf_class">

     <img src="{{ asset('admin/images/viewpdf.jpg') }}"  width="170" height="70">

  </a>


                            </div>


                            <div class="form-group col-md-6">

                                <label for="filename">QUARTER-4 PDF*</label>

                                <input type="file" name="QUARTER_pdf4" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name" id="QUARTER_pdf4">

                                <label for="filename" id="filename-error" class="error">
                                </label>

                                <a href=""  download id='QUARTER_pdf4' class="pdf_class">

     <img src="{{ asset('admin/images/viewpdf.jpg') }}"  width="170" height="70">

  </a>



                            </div>



                            <div class="form-group col-md-6">

                                <label for="image_text">year*</label>

                                <input type="date" name="year" placeholder="Enter your Image Text" id="year"
                                    class="form-last-name form-control" autocomplete="off">


                                <label for="image_text" id="image_text-error" class="error">
                                </label>

                            </div>



                            <div class="form-group col-md-6">

                                <label for="status">status</label>

                                <select class="form-control" aria-label="Default select example" name="status" id="imagestatus">

                                    <option selected="">Please select status</option>

                                    <option value="1">Active</option>

                                    <option value="0">Inactive</option>

                                </select>


                                <label for="status" id="status-error" class="error">
                                </label>
                            </div>


                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary" id="savebtn">Save</button>


                            </div>

                        </form>
                    </div>

                </div>

            </div>

        </div>







        <script>
            $(document).ready(function() {

                $('#QUARTER_div').hide();

            });
        </script>


        <script>
            $('#Quarterly_section').on('change', function() {

                $data = $('#Quarterly_section').val();

                if ($data == '3') {
                    $('#QUARTER_div').show();
                } else {
                    $('#QUARTER_div').hide();
                }

            });
        </script>







        <script type="text/javascript">
            function abc(id) {

                a = '<?php echo asset('uploads'); ?>';

                src = a + "/" + id;

                $("#1").html('<img src="' + src + '" style="width:100%;height:100%;">');

            }
        </script>


        <script>
            $(document).on("click", "#update", function() {
                var UserName = $(this).data('id');
                //  alert(UserName);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/Accounts/rti-QUARTER-data') }}",
                    type: "get",
                    data: {
                        id: UserName
                    },
                    success: function(data) {

                        console.log(data.item);

                        $('#form').attr('action', '{{ url('Accounts/edit_rit') }}' +
                            '/' + data.item.id)


                        $('#QUARTER_pdf1').attr('href', '{{ url('uploads/rti/') }}' +
                            '/' + data.item.pdf_first)
                            $('#QUARTER_pdf2').attr('href', '{{ url('uploads/rti/') }}' +
                            '/' + data.item.pdf_second)

                            $('#QUARTER_pdf3').attr('href', '{{ url('uploads/rti/') }}' +
                            '/' + data.item.pdf_third)

                            $('#QUARTER_pdf4').attr('href', '{{ url('uploads/rti/') }}' +
                            '/' + data.item.pdf_fourth)


                        $("#year").val(data.item.year);
                        $("#imagestatus").val(data.item.status);
                    }

                });

            });
        </script>
    @endsection
