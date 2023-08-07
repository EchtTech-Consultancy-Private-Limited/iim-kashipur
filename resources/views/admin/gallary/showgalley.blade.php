@extends('admin.Layout.master')



@section('title', 'Manage Image Section')



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



                                <p class="card-title">Manage Image Section</p>



                                <div>

                                    @if (@checkRoute('add_gallery'))
                                        <button type="button" class="btn btn-primary"><a
                                                href="{{ url('/Accounts/add_gallery') }}">Add New Entry</a></button>
                                    @endif

                                </div>



                            </div>



                            <div class="row">



                                <div class="col-12">



                                    <div class="table-responsive">



                                        <table id="example" class="display expandable-table" style="width:100%">



                                            <thead>



                                                <tr>



                                                    <th>S.No#</th>



                                                    <th>Title</th>



                                                    <th>शीर्षक</th>

                                                    <th data-field="user-status">Status</th>



                                                    <th>Action </th>



                                                </tr>



                                            </thead>



                                            <tbody>



                                                @foreach ($gallery as $value)
                                                    <tr>



                                                        <td>{{ $value->id }}</td>



                                                        <td>{{ $value->name }}</td>



                                                        <td>{{ $value->name_h }}</td>


                                                        {{--
                          <td><img src="{{ asset('gallery/image/'.$value->cover_image) }}" alt="" title=""  style="height: 100px;  width: 100px;" ></td>
 --}}



                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($value->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($value->id) . '/photo_galleries') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($value->id) . '/photo_galleries') }}"
                                                                        style="color:red;">Inactive</a>
                                                                @endif
                                                            @else
                                                                @if ($value->status == 1)
                                                                    <span" style="color:green;">Active</span>
                                                                    @else
                                                                        <span style="color:red;">Inactive</span>
                                                                @endif
                                                            @endif
                                                        </td>

                                                        <td>

                                                            <a href="{{ url('/Accounts/updategallery/' . dEncrypt($value->id)) }}"
                                                                onclick="return confirm('Are you sure to edit this record?')"><i
                                                                    class="ti-pencil btn-icon-append"
                                                                    style="color:black;"></i></a> &nbsp;

                                                            <a href="{{ url('/Accounts/view-gallery/' . dEncrypt($value->id)) }}"
                                                                onclick="return confirm('Are you sure to view this record?')"><i
                                                                    class="ti-eye btn-icon-append"
                                                                    style="color:black;"></i></a> &nbsp;


                                                            <a href="{{ url('/Accounts/delete_galleryimage/' . dEncrypt($value->id)) }}"
                                                                onclick="return confirm('Are you sure to delete this record?')"><i
                                                                    class="ti-trash btn-icon-append"
                                                                    style="color:black;"></i></a> &nbsp;


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









    @endsection
