@extends('admin.Layout.master')

@section('title', 'Guidelines Participants Listing')

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

                                <p class="card-title">Guidelines Participants Listing </p>

                            </div>


                            <div class="row">

                                <div class="col-12">

                                    <div class="table-responsive">

                                        <table id="example" class="display expandable-table" style="width:100%">

                                            <thead>

                                                <tr>

                                                    <th>Sr.No#</th>

                                                    <th>Full Name</th>

                                                    <th>Email</th>

                                                    <th>Mobile Number</th>

                                                    <th>Organization</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @foreach ($data as $K => $D)
                                                    <tr>

                                                        <td>{{ $K + 1 }}</td>


                                                        <td>{{ $D->name }}</td>


                                                        <td>{{ $D->email }}</td>

                                                        <td>{{ $D->mobile_no }}</td>

                                                        <td>{{ $D->organization }}</td>


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

                a = '<?php echo asset('uploads'); ?>';

                src = a + "/" + id;

                $("#1").html('<img src="' + src + '" style="width:100%;height:100%;">');

            }
        </script>

    @endsection
