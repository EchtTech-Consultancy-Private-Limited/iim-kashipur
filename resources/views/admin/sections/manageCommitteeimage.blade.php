@extends('admin.Layout.master')

@section('title', 'Manage Club Images ')

@section('content')

<style>
    .modal-dialog.modal-md {
        max-width: 900px;
        margin-top: 5%;
    }

    .modal .modal-dialog .modal-content .modal-body {
        padding: 20px 26px;
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
                            <h4 class="card-title">Manage Committee Images</h4>

                            <div class="row">

                                <div class="col-md-12">

                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo">Multiple Image Upload
                                        Section</button>

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
                                                    <th>Images</th>
                                                    <th>Images Text</th>
                                                    <th>Status</th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td><img src="{{ asset('uploads/multiple/committee/'.$item->committee_image) }}"
                                                                alt="" title=""
                                                                style="height: 120px;  width: 120px;" loading="lazy"></td>
                                                        <td>{{ $item->committee_title }}</td>
                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($item->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($item->id) . '/committee_multiple_images') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($item->id) . '/committee_multiple_images') }}"
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
                                                                href="{{ url('Accounts/committee-images-delete/'.dEncrypt($item->id))}}"
                                                                onclick="return confirm('Are you sure to edit this record?')"><i
                                                                    class="ti-trash btn-icon-append"
                                                                    style="color:black;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach

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

                        <h5 class="modal-title" id="exampleModalLabel">Insert Multiple image</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body pb-0">

                        <form role="form" id="regForm" action="{{ url('Accounts/add-committee-image') }}"
                            method="post" class="registration-form row" enctype="multipart/form-data"
                            novalidate="novalidate">


                            @csrf

                            <div class="form-group col-md-6">

                                <label for="filename">Multiple Image</label>

                                <input type="file" name="filename" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name">

                                <label for="filename" id="filename-error" class="error">
                                </label>


                            </div>

                            <div class="form-group col-md-6">

                                <label for="image_text">Image Text</label>

                                <input type="text" name="committee_title" placeholder="Enter your Image Text"
                                    class="form-last-name form-control" id="form-last-name" autocomplete="off">


                                <label for="image_text" id="image_text-error" class="error">
                                </label>

                            </div>

                            <div class="form-group col-md-6">

                                <label for="image_alt">Image Alt</label>

                                <input type="text" name="committee_alt" placeholder="Enter your image Alt"
                                    class="form-email form-control" id="form-email" autocomplete="off">


                                <label for="image_alt" id="image_alt-error" class="error">
                                </label>

                            </div>

                            <div class="form-group col-md-6">

                                <label for="order">sort order</label>

                                <input type="number" id="order" name="order" placeholder="pls enter sort order"
                                    class="form-email form-control">


                                <label for="order" id="order-error" class="error">
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

                        <h5 class="modal-title" id="exampleModalLabel">Update Multiple
                            image</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <form action="" id="form" method="post" class="registration-form row"
                            enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="OPgrs1IhTwBqM9Swh6cYqEjsPsBQiiXxlxzsYv8k">

                            <div class="form-group col-md-6">

                                <label for="form-first-name">Multiple Image</label>

                                <input type="file" name="filename" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name">

                                <div id="image"></div>


                                <input type="hidden" class="form-control" name="multioldimage" id="imageoldid">

                            </div>


                            <div class="form-group col-md-6">

                                <label for="image_text">Image Text</label>

                                <input type="text" name="image_text" placeholder="Enter your Image Text"
                                    class="form-last-name form-control" id="imagetext" required=""
                                    autocomplete="off">

                                <label for="image_text" id="image_text-error" class="error">
                                </label>



                            </div>



                            <div class="form-group col-md-6">

                                <label for="image_alt">Image Alt</label>

                                <input type="text" name="image_alt" placeholder="Enter your image Alt"
                                    class="form-email form-control" id="imagealt" required="" autocomplete="off">



                                <label for="image_alt" id="image_alt-error" class="error">
                                </label>





                            </div>



                            <div class="form-group col-md-6">

                                <label for="form-email">sort order</label>

                                <input type="text" placeholder="pls enter sort order" name="order"
                                    class="form-email form-control" id="imagesort" required="" autocomplete="off">

                                <label for="order" id="order-error" class="error">
                                </label>



                            </div>



                            <div class="form-group col-md-6">

                                <label for="form-email">status</label>

                                <select class="form-control" aria-label="Default select example" name="status"
                                    id="imagestatus" required="">

                                    <option selected="">Please select status</option>

                                    <option value="1">Active</option>

                                    <option value="0">Inactive</option>

                                </select>

                            </div>

                        </form>
                    </div>


                    <input type="hidden" name="gallery_id" placeholder="Enter your Gallery Tabel ID"
                        class="form-first-name form-control" id="gallery_id" readonly="">

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary" id="savebtn">Save</button>


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
