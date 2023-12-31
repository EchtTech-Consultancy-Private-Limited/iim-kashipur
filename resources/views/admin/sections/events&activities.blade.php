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
                                    action="{{ url('Accounts/add-edit-EventsActivites/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-EventsActivites') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Title</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter"
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('title') }}" @endif><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>

                            {{-- <div class="col-md-12">

                                <label for="event" class="col-form-label">Status</label>

                                    <select class="form-control" aria-label="Default select example" name="status">

                                        <option selected>Please select status</option>

                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>

                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>

                                    </select>

                            </div> --}}

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">short Order</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="short_order"placeholder="Please enter"
                                        @if ($id) value="{{ $data->short_order }}" @else value="{{ old('short_order') }}" @endif><br>
                                    <label for="short_order" id="short_order-error" class="error"></label>
                                </div>
                            </div>

                            <input type="hidden" name="status" @if($id) value="{{ $data->status  }}" @else value="0" @endif>

                            <div class="col-md-12">
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
        CKEDITOR.replace('activitie');
        CKEDITOR.replace('event');
    </script>

@endsection
