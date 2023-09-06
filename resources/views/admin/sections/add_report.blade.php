@extends('admin.Layout.master')

@section('title', $title)

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">{{ $title }}</h4>

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
                                    action="{{ url('Accounts/add-edit-report/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-report') }}" enctype="multipart/form-data">
                            @endif

                            @csrf



                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter  title" required
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('title') }}" @endif><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Mba Batch</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Batch"placeholder="Please enter Batch" required
                                        @if ($id) value="{{ $data->mba_batch }}" @else value="{{ old('mba_batch') }}" @endif><br>
                                    <label for="Batch" id="Batch-error" class="error"></label>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <label for="inputText" class="col-sm-12 col-form-label">PDF</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="file"
                                        placeholder="Please browse image" accept=".pdf"><br>

                                </div>
                                @if($id)
                                <a   href="{{url('uploads/report/'.$data->pdf)}}" download>

                                    <img src="{{ asset('admin/images/viewpdf.jpg') }}"  width="170" height="70">

                                    </a>

                                    <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                        (
                                        <?php
                                            echo formatSizeUnits($data->pdfsize);
                                        ?>)
                                    </span>
                                @endif

                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">placement reports type</label>
                                <div class="">
                                    <select  class="form-control" name="placement_reports_type" >
                                        <option value="">placement type</option>
                                        <option value="1" {{ $data->placement_reports_type == 1 ? 'selected' : '' }}>Final Placement Reports</option>
                                        <option value="2" {{ $data->placement_reports_type == 2 ? 'selected' : '' }}>Summer Placement Reports</option>
                                    </select>
                                </div>
                            </div>


                            <input type="hidden"  @if($id) value="{{ $data->status }}" @else value="0" @endif name="status">


                            <div class="col-md-12">
                                <div class="col-sm-10">
                                    {{-- <button type="reset" class="btn btn-danger" class="form-control">Reset</button> --}}
                                    <button type="submit" class="btn btn-primary" onclick="load();"  class="form-control">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

    </div>

@endsection
