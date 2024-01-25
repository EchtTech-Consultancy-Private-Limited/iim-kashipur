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
                                    action="{{ url('Accounts/add-edit-placement/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-placement') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-6">

                                <div class="form-group"> <label for="name">Name *</label> <input id="name"
                                        type="text"
                                        @if ($id) value="{{ $data->name }}" @else value="{{ old('name') }}" @endif
                                        name="name" class="form-control" placeholder="Please enter name*" required>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="graduation_year">Graduation Year *</label> <input
                                        id="graduation_year" type="year"
                                        @if ($id) value="{{ $data->graduation_year }}"   @else value="{{ old('graduation_year') }}" @endif
                                        name="graduation_year" class="form-control" minlength="2" maxlength="4"
                                        placeholder="Please enter graduation year YYYY*" required>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="area">Area *</label> <input id="area"
                                        type="text"
                                        @if ($id) value="{{ $data->area }}" @else value="{{ old('area') }}" @endif
                                        name="area" class="form-control" placeholder="Please enter area*" required>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="designation">Designation*</label> <input
                                        id="designation" type="text"
                                        @if ($id) value="{{ $data->designation }}" @else value="{{ old('designation') }}" @endif
                                        name="designation" class="form-control" placeholder="Please enter designation*" required>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="institute_organization">Institute/Organization*</label>
                                    <input id="institute_organization" type="text"
                                        @if ($id) value="{{ $data->institute_organization }}" @else value="{{ old('institute_organization') }}" @endif
                                        name="institute_organization" class="form-control"
                                        placeholder="Please enter institute / organization*" required>
                                </div>

                            </div>



                            <input type="hidden" name="status"
                                @if ($id) value="{{ $data->status }}"  @else value="0" @endif>

                            <div class="clearfix"></div>

                            <div class="col-md-12">

                                <button type="submit" class="btn btn-primary mr-2" >Submit</button>

                            </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <script>
            // disable alphate
            $('#graduation_year').keypress(function(e) {
                var regex = new RegExp("^[0-9_]");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (regex.test(str)) {
                    return true;
                }
                e.preventDefault();
                return false;
            });


        </script>


    @endsection
