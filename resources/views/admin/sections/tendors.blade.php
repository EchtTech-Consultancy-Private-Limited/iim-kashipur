@extends('admin.Layout.master')



@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title"></h4>

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

                            @if(isset($id))
                                <form class="forms-sample row col-md-12" method="POST"
                                    action="{{ url('Accounts/add-edit-tender/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-tender') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Published Date</label>
                                <div class="">
                                    <input type="date" class="form-control"
                                        name="published_date"placeholder="Please enter"
                                        @if (isset($id)) value="{{ $tender->published_date }}" @else value="{{ old('published_date') }}" @endif><br>
                                    <label for="published_date" id="Commmittee_name-error" class="error"></label>
                                    <label for="published_date" id="published_date-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Submission Date</label>
                                <div class="">
                                    <input type="date" class="form-control" name="submission_date"
                                    @if (isset($id)) value="{{ $tender->submission_date }}" @else value="{{ old('submission_date') }}" @endif  placeholder="Please enter" value=""><br>
                                    <label for="submission_date" id="submission_date-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Title</label>
                                <div class="">
                                    <input type="text" class="form-control" name="title"@if (isset($id)) value="{{ $tender->title }}" @else value="{{ old('title') }}" @endif  placeholder="Please enter" value=""><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="tender_document" class="col-form-label">Tender Documents</label>
                                <div class="">
                                    <input type="file" class="form-control" name="tender_document"@if (isset($id)) value="{{ $tender->tender_document }}" @else value="{{ old('tender_document') }}" @endif  placeholder="Please enter" value=""><br>
                                    <label for="tender_document" id="tender_document-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="corrigendum" class="col-form-label">Corrigendum</label>
                                <div class="">
                                    <input type="text" class="form-control" name="corrigendum"@if (isset($id)) value="{{ $tender->corrigendum }}" @else value="{{ old('corrigendum') }}" @endif  placeholder="Please enter" value=""><br>
                                    <label for="corrigendum" id="corrigendum-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <label for="event" class="col-form-label">Status</label>

                                    <select class="form-control" aria-label="Default select example" name="status">

                                        <option selected>Please select status</option>

                                        <option value="1" {{ $tender->status == 1 ? 'selected' : '' }}>Active</option>

                                        <option value="0" {{ $tender->status == 0 ? 'selected' : '' }}>Inactive</option>

                                    </select>

                            </div>

                            <div class="col-md-12">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" class="form-control">Submit</button>
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
        CKEDITOR.replace('activeites');
        CKEDITOR.replace('event');
    </script>

@endsection