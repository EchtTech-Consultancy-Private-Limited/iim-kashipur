@extends('admin.Layout.master')

@section('title', 'Manage Placement')

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

                    <strong></strong> {{ Session::get('error') }}

                </div>
            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <div class="top-menu-button">

                                <p class="card-title">Manage Placement </p>

                                <div>

                                    <button type="button" class="btn btn-primary"><a
                                            href="{{ url('/Accounts/add-edit-placement') }}">Add New Placement </a></button>


                                </div>

                            </div>


                            <div class="row">

                                <div class="col-12">

                                    <div class="table-responsive">

                                        <table id="example" class="display expandable-table" style="width:100%">

                                            <thead>

                                                <tr>

                                                    <th>Sr. No#</th>

                                                    <th>Name</th>

                                                    <th>Graduation (AY)</th>

                                                    <th>Area</th>

                                                    <th>Institute/ Organization</th>

                                                    <th>Designation </th>

                                                    <th>Status</th>

                                                    <th>Action</th>
                                                </tr>

                                            </thead>

                                            <tbody>

                                                @foreach ($data as $K => $D)
                                                    <tr>

                                                        <td>{{ $K+1 }}</td>

                                                        <td>{{ $D->name	 ??'' }}</td>

                                                        <td>{{ $D->graduation_year	??'' }}</td>

                                                        <td>{{ $D->area  ??""}}</td>

                                                        <td>{{ $D->institute_organization ??''}}</td>

                                                        <td>{{ $D->designation ??'' }}</td>

                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($D->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($D->id) . '/placements') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($D->id) . '/placements') }}"
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
                                                            <a
                                                                href="{{ url('Accounts/add-edit-placement/'.dEncrypt($D->id)) }}"><i
                                                                    class="ti-pencil btn-icon-append"
                                                                    style="color:black;"></i></a> &nbsp;

                                                            <a href="{{ url('Accounts/delete-placement/'.dEncrypt($D->id)) }}"
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




    @endsection
