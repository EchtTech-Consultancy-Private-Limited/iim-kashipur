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
                                    action="{{ url('Accounts/add-edit-RTI/'.$id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-RTI') }}" enctype="multipart/form-data">
                            @endif

                            @csrf
							<div class="col-md-3">
                                <label for="inputText" class="col-form-label">Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title" placeholder="Please enter student title " required
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('title') }}" @endif><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">PDF* <span style="color:green;font-size:12px;"> @if($id) [{{$data->pdf }}] @endif</span></label>
                                <div class="">
                                    <input type="file" class="form-control" name="pdf"><br>
                                    <label for="pdf" id="pdf-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="CPIO" class="col-form-label">CPIO</label>
                                <div class="">
                                    <textarea class="form-control" id="CPIO" rows="4" name="CPIO" required
                                        placeholder="Please enter CPIO">@if($id){{$data->CPIO}} @else {{old('CPIO')}} @endif</textarea><br>
                                    <label for="CPIO" id="CPIO-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="Authority" class="col-form-label">First Appellate Authority</label>
                                <div class="">
                                    <textarea class="form-control" id="Authority" rows="4" name="Authority" required
                                        placeholder="Please enter First Appellate Authority">@if($id){{$data->Authority}} @else {{old('Authority')}} @endif</textarea><br>
                                    <label for="Authority" id="Authority-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Archive Date</label>
                                <div class="">
                                    <input type="date" class="form-control" name="archive_date"
                                    @if (isset($id)) value="{{ $data->archive_date }}" @else value="{{ old('archive_date') }}" @endif  placeholder="Please enter" value=""><br>
                                    <label for="archive_date" id="archive_date-error" class="error"></label>
                                </div>
                            </div>


                             <input type="hidden" name="status" @if($id) value="{{ $data->status }}" @else value="0" @endif >

                            <div class="col-md-12 mt-4">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" onclick="load();" class="form-control">Submit</button>
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

    <script type="text/javascript">
        CKEDITOR.replace('Authority');
        CKEDITOR.replace('CPIO');
    </script>

@endsection
