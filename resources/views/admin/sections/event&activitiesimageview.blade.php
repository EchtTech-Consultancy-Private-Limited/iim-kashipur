@extends('admin.Layout.master')

@section('title', 'Manage Event Images ')

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
                            <h4 class="card-title">Manage Event Images</h4>

                            <div class="row">

                                <div class="col-md-12">

                                    <button type="button" class="btn btn-primary float-right" ><a href="{{url('Accounts/add-edit-EventsActivites-image')}}">Multiple Image Upload
                                        Section</a></button>

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
                                                        <td><img src="{{ asset('uploads/multiple/event_image/'.$item->image) }}"
                                                                alt="" title=""
                                                                style="height: 120px;  width: 120px;" loading="lazy"></td>
                                                        <td>{{ $item->image_title }}</td>
                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($item->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($item->id) . '/events&activities_image') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($item->id) . '/events&activities_image') }}"
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
                                                            <a class="btn btn-primary" href="{{url('Accounts/add-edit-EventsActivites-image/'.dEncrypt($item->id))}}"><i
                                                                    class="ti-pencil btn-icon-append"
                                                                    style="color:black;"></i></a>

                                                                        <a class="btn btn-primary" href="{{url('Accounts/event-activities-show/'.dEncrypt($item->id))}}"><i
                                                                    class="ti-eye btn-icon-append"
                                                                    style="color:black;"></i></a>


                                                            <a class="btn btn-primary"
                                                                href="{{ url('Accounts/delete-Event-image/'.dEncrypt($item->id))}}"
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


        <script type="text/javascript">
            function abc(id) {

                a = '<?php echo asset('uploads'); ?>';

                src = a + "/" + id;

                $("#1").html('<img src="' + src + '" style="width:100%;height:100%;">');

            }
        </script>

    @endsection
