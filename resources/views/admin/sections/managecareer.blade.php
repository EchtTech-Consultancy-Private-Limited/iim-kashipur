@extends('admin.Layout.master')

@section('title', 'Manage Committee ')

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

                                <p class="card-title">Manage Career </p>

                                <div>

                                    <button type="button" class="btn btn-primary"><a
                                            href="{{ url('/Accounts/add-edit-career') }}">Add New Career </a></button>


                                </div>

                            </div>


                            <div class="row">

                                <div class="col-12">

                                    <div class="table-responsive">

                                        <table id="example" class="display expandable-table" style="width:100%">

                                            <thead>

                                            <tr>
                                                <th></th>
                                                <th>Sr.No</th>

                                                <th>Name Of The Post</th>

                                                <th>Opening Date</th>

                                                <th>Closeing Date</th>

                                                <th>Online Link</th>

                                                <th>Status</th>

                                                <th>Action</th>
                                            </tr>

                                            </thead>

                                            <tbody id="sortable">

                                            @foreach ($career as $K => $D)
                                                <tr data-id="{{ $D->id }}">

                                                    <td style="cursor: pointer">

                                                            <? xml version = "1.0" encoding = "utf-8" ?>
                                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                        <svg fill="#000000" version="1.1" id="icon"
                                                             xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             width="30" height="40" viewBox="0 0 32 32"
                                                             xml:space="preserve">
<style type="text/css">
    .st0 {
        fill: none;
    }
</style>
                                                            <title>draggable</title>
                                                            <rect x="10" y="6" width="4" height="4"/>
                                                            <rect x="18" y="6" width="4" height="4"/>
                                                            <rect x="10" y="14" width="4" height="4"/>
                                                            <rect x="18" y="14" width="4" height="4"/>
                                                            <rect x="10" y="22" width="4" height="4"/>
                                                            <rect x="18" y="22" width="4" height="4"/>
                                                            <rect id="_Transparent_Rectangle_" class="st0" width="32"
                                                                  height="32"/>
</svg>
                                                    </td>
                                                    <td>{{ $K + 1 }}</td>

                                                    <td>{{ $D->name_of_the_post }}</td>

                                                    <td>{{ $D->opening_date }}</td>

                                                    <td>{{ $D->closing_date }}</td>

                                                    <td>
                                                        {{ $D->note }} </td>

                                                    <td>
                                                        @if (@checkRoute('StatusChange'))
                                                            @if ($D->status == 1)
                                                                <a href="{{ url('Accounts/status-change/0/' . dEncrypt($D->id) . '/career') }}"
                                                                   style="color:green;">Active</a>
                                                            @else
                                                                <a href="{{ url('Accounts/status-change/1/' . dEncrypt($D->id) . '/career') }}"
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
                                                            href="{{ url('Accounts/add-edit-career/' . dEncrypt($D->id)) }}"><i
                                                                class="ti-pencil btn-icon-append"
                                                                style="color:black;"></i></a> &nbsp;

                                                        <a
                                                            href="{{ url('Accounts/show-Career/' . dEncrypt($D->id)) }}"><i
                                                                class="ti-eye btn-icon-append"
                                                                style="color:black;"></i></a> &nbsp;

                                                        <a href="{{ url('Accounts/delete-career/' . dEncrypt($D->id)) }}"
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


        <!--modal-->

        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                a = '<?php echo asset('uploads'); ?>';

                src = a + "/" + id;

                $("#1").html('<img src="' + src + '" style="width:100%;height:100%;">');

            }
        </script>

@endsection
