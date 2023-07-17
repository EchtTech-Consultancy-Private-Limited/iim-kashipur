@extends('admin.Layout.master')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
@section('title', $title)



@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <style>
               .yearpicker-container {
    position: absolute;
    color: var(--text-color);
    width: 280px;
    border: 1px solid var(--border-color);
    border-radius: 3px;
    font-size: 1rem;
    box-shadow: 1px 1px 8px 0px rgba(0, 0, 0, 0.2);
    background-color: var(--background-color);
    z-index: 10;
    margin-top: 0.2rem;
}

.yearpicker-header {
    display: flex;
    width: 100%;
    height: 2.5rem;
    border-bottom: 1px solid var(--border-color);
    align-items: center;
    justify-content: space-around;
}

.yearpicker-prev,
.yearpicker-next {
    cursor: pointer;
    font-size: 2rem;
}

.yearpicker-prev:hover,
.yearpicker-next:hover {
    color: var(--selected-text-color);
}

.yearpicker-year {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0.5rem;
}

.yearpicker-items {
    list-style: none;
    padding: 1rem 0.5rem;
    flex: 0 0 33.3%;
    width: 100%;
}

.yearpicker-items:hover {
    background-color: var(--hover-background-color);
    color: var(--selected-text-color);
    cursor: pointer;
}

.yearpicker-items.selected {
    color: var(--selected-text-color);
}

.hide {
    display: none;
}

.yearpicker-items.disabled {
    pointer-events: none;
    color: #bbb;
}
            </style>

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
                                <form class="forms-sample row col-md-12" method="POST"
                                    action="{{ url('Accounts/add-journey-edit-org/' . $id) }}"
                                    enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-journey-edit-org') }}" enctype="multipart/form-data">
                            @endif

                            @csrf



                            <div class="col-md-6">

                                <div class="form-group"> <label for="title">NAME *</label> <input id="title"
                                        type="text"
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('title') }}" @endif
                                        name="title" class="form-control" placeholder="Please enter name*">


                                    <label for="title" id="title-error" class="error">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group"> <label for="title_h">NAME[Hindi] *</label> <input id="title_h"
                                        @if ($id) value="{{ $data->title_h }}" @else value="{{ old('title_h') }}" @endif
                                        type="text" name="title_h" class="form-control"
                                        placeholder="Please enter name_h*">


                                    <label for="title_h" id="title_h-error" class="error">
                                        @error('title_h')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="heading">Heading*</label> <input id="heading"
                                        type="text"
                                        @if ($id) value="{{ $data->heading }}" @else value="{{ old('heading') }}" @endif
                                        name="heading" class="form-control" placeholder="Please enter heading*">


                                    <label for="heading" id="heading-error" class="error">
                                        @error('heading')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="name_h">Heading[Hindi] *</label> <input
                                        id="heading_h"
                                        @if ($id) value="{{ $data->heading_h }}" @else value="{{ old('heading_h') }}" @endif
                                        type="text" name="heading_h" class="form-control"
                                        placeholder="Please enter heading_h*">


                                    <label for="heading_h" id="heading_h-error" class="error">
                                        @error('heading_h')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"><label for="number">year *</label>
                                    <input id="number" type="number" placeholder="YYYY" min="2000"
                                        @if ($id) value="{{ $data->year }}" @else value="{{ old('number') }}" @endif
                                        name="number" class="form-control">



                                    <label for="number" id="number-error" class="error">
                                        @error('number')
                                            {{ $message }}
                                        @enderror
                                    </label>


                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="image">Image (45px * 45px)</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->file}}] @endif</span>

                                    <input
                                        id="image" type="file" name="file" accept=".jpeg,.png,.gif,.jpg"
                                        class="form-control">


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

                            <div class="clearfix"></div>

                            <div class="col-md-12">

                                <button type="submit" class="btn btn-primary mr-2">Submit</button>

                            </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- content-wrapper ends -->
        <script>
            $('.yearpicker').yearpicker()
        </script>
        {{-- <script>
            $("#datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        </script> --}}

    @endsection
