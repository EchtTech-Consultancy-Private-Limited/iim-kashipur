@extends('admin.Layout.master')

@section('title', 'Manage Organisation Structure ')

@section('content')

<style>
    .submit-btn-apply {
    background: #eb6a2a !important;
    border: 0;
    color: #fff !important;
    padding: 8px 30px !important;
    margin: 0;
    font-size: 1rem;
    margin-left: 10px;
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

                                <p class="card-title">Manage Organisation Structure </p>

                                <div>


                                    {{--

                    <button type="button" class="btn btn-primary" ><a href="{{route('admin.people_department')}}">Add Department </a></button>
 --}}

                                    <button type="button" class="btn btn-primary"><a href="{{ route('admin.addpeople') }}">Add New Entry </a></button>

                                </div>



                            </div>

                            <div class="search-f row mt-3 mb-3">
                                <div class="col-md-5">

                                    <form role="form" method="POST" action="{{ url('Accounts/manage-people-section') }}"
                                        id="frmtypes">
                                        @csrf

                                        <select name="dp" class="form-control"
                                            onchange="javascript:$('#frmtypes').submit();">

                                            @foreach ($departments as $k => $v)
                                                <option value="{{ $k }}"
                                                    {{ $k == request()->dp ? 'SELECTED' : '' }}>{{ $v }}</option>
                                            @endforeach

                                        </select>

                                    </form>

                                </div>
<div class="col-md-1"></div>
                                <div class="col-md-6">
                                    <form action="{{ url('Accounts/manage-people-section') }}" method="get">
                                        {{-- <label> Search </label> --}}

                                        <div class="d-flex">
                                            <input type="text" class="form-control"
                                                @if (request('nd')) value="{{ request('nd') }}" @else placeholder="search here..." @endif
                                                name="nd">
                                            <button type="submit" class="btn-primary submit-btn-apply">Apply</button>
                                        </div>
                                    </form>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-12">

                                    <div class="table-responsive">

                                        <table id="example" class="display expandable-table" style="width:100%">

                                            <thead>

                                                <tr>

                                                    <th>S.No#</th>

                                                    <th>Type</th>

                                                    <th>Image</th>

                                                    <th>Name</th>
                                                    {{--
                              <th>Designation</th> --}}

                                                    <th>Status</th>

                                                    <th>Department</th>

                                                    <th>Profile Section Pages</th>

                                                    <th>Action</th>



                                                </tr>

                                            </thead>

                                            <tbody>

                                                @foreach ($data as $K => $D)
                                                    <tr>

                                                        <td>{{ $K + 1 }}</td>

                                                        <td>{{ $D->type }}</td>

                                                        <td>
                                                            @if ($D->image != null || $D->image != '')
                                                                <img class="thumb"
                                                                    src="{{ url('uploads/organisation/' . $D->image) }}"
                                                                    data-toggle="modal" data-target="#exampleModal"
                                                                    rel="{{ $D->image }}"
                                                                    onclick="abc('{{ $D->image }}')">
                                                            @endif
                                                        </td>

                                                        <td>{{ $D->title }}</td>

                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($D->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($D->id) . '/organisation_structures') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($D->id) . '/organisation_structures') }}"
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



                                                        <td>{{ $D->designation }}</td>

                                                        {{--
                              <td>{{($D->department>0?$departments[$D->department]:'')}}</td> --}}

                                                        <td>

                                                            <button type="submit" class="btn btn-primary btn-sm"><a
                                                                    href="{{ url('/Accounts/manage-people-profile' . '/' . dEncrypt($D->id)) }}">Add
                                                                    section</a></button>

                                                        </td>



                                                        <td>

                                                            <a
                                                                href="{{ url('Accounts/add-edit-people/' . dEncrypt($D->id)) }}"><i
                                                                    class="ti-pencil btn-icon-append"
                                                                    style="color:black;"></i></a> &nbsp;

                                                            <a
                                                                href="{{ url('Accounts/view-people-section/' . dEncrypt($D->id)) }}"><i
                                                                    class="ti-eye btn-icon-append"
                                                                    style="color:black;"></i></a> &nbsp;


                                                            <a href="{{ url('Accounts/delete-people/' . dEncrypt($D->id)) }}"
                                                                onclick="return confirm('Are You Sure?')"><i
                                                                    class="ti-archive btn-icon-append"
                                                                    style="color:black;"></i></a>



                                                        </td>



                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>
                                    {{ $data->links('pagination::bootstrap-5') }}
                                </div>

                            </div>

                        </div>

                    </div>





                </div>

            </div>

        </div>

        <!-- content-wrapper ends -->

        <!--modal-->

        <div class="modal fade "id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <!--   <span style="margin-left:500px;"><b>Press Esc to Exit</b></span>

           <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>-->

                    <div id="1"></div>

                </div>

            </div>

        </div>



        <script type="text/javascript">
            function abc(id) {

                a = '<?php echo asset('uploads/organisation'); ?>';

                src = a + "/" + id;

                $("#1").html('<img src="' + src + '" style="width:100%;height:100%;">');

            }
        </script>








    @endsection
