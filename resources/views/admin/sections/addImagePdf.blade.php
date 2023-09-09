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
                                    action="{{ url('Accounts/add-edit-pdf-image/'.$id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-pdf-image') }}" enctype="multipart/form-data">
                            @endif

                            @csrf



                            <div class="col-md-6">

                                <div class="form-group"> <label for="type">Type *</label>

                                    <select name="type" class="form-control">

                                        <option value="">Please Select</option>
                                        <option value="1" {{ ( '1' == $data->type) ? 'selected' : '' }}>PDF</option>
                                        <option value="2" {{ ( '2' == $data->type) ? 'selected' : '' }}>Image</option>

                                    </select>
                                </div>
                            </div>


                                <div class="col-md-6">

                                    <div class="form-group"> <label for="title">Name*</label> <input id="title"
                                            type="text" name="title"
                                            @if ($id) value="{{ $data->title }}" @else value="{{ old('title') }}" @endif
                                            class="form-control" placeholder="Please enter title *" required="required">


                                        <label for="title" id="title-error" class="error">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </label>

                                    </div>

                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">


                                        <label for="file">File/Image*</label> <input id="file" type="file"
                                            name="file" @if (!$id) required @endif
                                            class="form-control">

                                       @if('1' == $data->type)
                                        <span style="color:green;font-size:12px;">
                                            @if ($id)
                                                [{{ $data->file }}]
                                            @endif
                                        </span>
                                       @else
                                       <br>
                                       <img src="{{ asset('admin/images/' . $data->file) }}"
                                       alt="" title=""
                                       style="height: 120px;  width: 120px;" loading="lazy">

                                       @endif


                                        <label for="file" id="file-error" class="error">
                                            @error('file')
                                                {{ $message }}
                                            @enderror
                                        </label>



                                    </div>

                                </div>


                                <input type="hidden" name="status"
                                    @if ($id) value="{{ $data->status }}"   @else   value="0" @endif>


                                <div class="clearfix"></div>

                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-primary mr-2" onclick="load();">Submit</button>

                                </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



        @endsection
