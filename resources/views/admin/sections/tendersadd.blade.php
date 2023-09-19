@extends('admin.Layout.master')

@section('title', 'Manage Club ')

@section('content')

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

                                <p class="card-title">Manage Tender </p>

                                <div>

                                    <button type="button" class="btn btn-primary"><a
                                            href="{{ url('/Accounts/add-edit-tender') }}">Add New Tender </a></button>


                                </div>

                            </div>


                            <div class="row">

                                <div class="col-12">

                                    <div class="table-responsive">

                                        <table id="example" class="display expandable-table" style="width:100%">

                                            <thead>

                                                <tr>

                                                    <th>Sr.No#</th>

                                                    <th>Published Date</th>

                                                    <th>Submission Date</th>

                                                    <th>Title</th>

                                                    <th>Tender Documents</th>

                                                    <th>Status</th>

                                                    <th>Action</th>
                                                </tr>

                                            </thead>

                                            <tbody>

                                                @foreach ($tender as $K => $D)
                                                    <tr>

                                                        <td>{{ $K + 1 }}</td>
                                                        <td>{{ $D->published_date }}</td>

                                                        <td>{{ $D->submission_date }}</td>

                                                        <td>{{ $D->title }}</td>

                                                        <td>

                                                            <a href="{{ url('uploads/pdf' . $D->tender_document) }}" download>

                                                                <img src="{{ asset('admin/images/viewpdf.jpg') }}"
                                                                    width="170" height="70">

                                                            </a>

                                                            <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                                                (
                                                                <?php
                                                                echo formatSizeUnits($D->pdfsize);
                                                                ?>)
                                                            </span>

                                                        </td>




                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($D->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($D->id) . '/tenders') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($D->id) . '/tenders') }}"
                                                                        style="color:red;">Inactive</a>
                                                                @endif
                                                            @else
                                                                @if ($D->status == 1)
                                                                    <span style="color:green;">Active</span>
                                                                @else
                                                                    <span style="color:red;">Inactive</span>
                                                                @endif
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <a
                                                                href="{{ url('Accounts/add-edit-tender/' . dEncrypt($D->id)) }}"><i
                                                                    class="ti-pencil btn-icon-append"
                                                                    style="color:black;"></i></a> &nbsp;



                                                            <a
                                                                href="{{ url('Accounts/show-tender/' . dEncrypt($D->id)) }}"><i
                                                                    class="ti-eye btn-icon-append"
                                                                    style="color:black;"></i></a> &nbsp;


                                                            <a href="{{ url('Accounts/delete-tender/' . dEncrypt($D->id)) }}"
                                                                onclick="return confirm('Are You Sure?')"><i
                                                                    class="ti-archive btn-icon-append"
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



        <script type="text/javascript">
            function abc(id) {

                a = '<?php echo asset('uploads'); ?>';

                src = a + "/" + id;

                $("#1").html('<img src="' + src + '" style="width:100%;height:100%;">');

            }
        </script>

    @endsection
