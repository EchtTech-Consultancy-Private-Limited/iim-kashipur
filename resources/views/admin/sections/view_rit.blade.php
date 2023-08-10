@extends('admin.Layout.master')

@section('title', $title)

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body row">

                            <h4 class="card-title col-md-12">{{ $title }}</h4>

                            <p class="card-description">

                                @if ($errors->any())

                                    <div class="alert alert-danger">

                                        <ul>

                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>

                                    </div>

                                @endif

                                @if (Session::has('error'))
                                    <div class="alert alert-danger col-md-12 text-center">

                                        <strong>Oops!</strong> {{ Session::get('error') }}

                                    </div>
                                @endif

                            </p>

                            @if ($id)
                                <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                    action="{{ url('Accounts/add-edit-RTI/'.$id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-RTI') }}" enctype="multipart/form-data">
                            @endif

                            @csrf
							<div class="col-md-12">
                                <label for="inputText" class="col-form-label">Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title" placeholder="Please enter student title " required
                                        readonly  value="{{ $data->title }}" ><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">PDF* <span style="color:green;font-size:12px;">  [{{$data->pdf }}] </span></label>
                                <div class="">

                                    <iframe src="{{ asset('uploads/pdf/' . $data->pdf) }}" height="800px"
                                        width="100%"></iframe>

                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="CPIO" class="col-form-label">CPIO</label>
                                <div class="">
                                    <textarea class="form-control" id="CPIO" rows="4" name="CPIO" required
                                        placeholder="Please enter CPIO" readonly>{{$data->CPIO}} /textarea><br>
                                    <label for="CPIO" id="CPIO-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="Authority" class="col-form-label">First Appellate Authority</label>
                                <div class="">
                                    <textarea class="form-control" id="Authority" rows="4" name="Authority" required
                                        placeholder="Please enter First Appellate Authority" readonly> {{$data->Authority}} </textarea><br>
                                    <label for="Authority" id="Authority-error" class="error"></label>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

    </div>



@endsection
