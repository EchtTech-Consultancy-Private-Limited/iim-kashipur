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
                                    action="{{ url('Accounts/add-edit-ANTI-RAGGING/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-ANTI-RAGGING') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">PDF*</label>
                                <div class="">
                                    <input type="text" placeholder="Please Enter your Pdf Name" @if ($id) value="{{ $data->title }}" @else value="{{ old('title') }}" @endif class="form-control" name="title"><br>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">PDF*

                                <span style="color:green;font-size:12px;"> @if($id) [{{$data->pdf }}]

                                    <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                        (
                                        <?php
                                            echo formatSizeUnits($data->pdfsize);
                                        ?>)
                                    </span>

                                    @endif
                                </span>

                                </label>
                                <div class="">
                                    <input type="file" class="form-control" name="pdf"
                                        ><br>


                                    <label for="pdf" id="pdf-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-12">

                                <label for="event" class="col-form-label">Status</label>

                                    <select class="form-control" aria-label="Default select example" name="status">

                                        <option selected>Please select status</option>

                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>

                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>

                                    </select>

                            </div>

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
        CKEDITOR.replace('about_details');
        CKEDITOR.replace('activites');
        CKEDITOR.replace('event');
    </script>

@endsection
