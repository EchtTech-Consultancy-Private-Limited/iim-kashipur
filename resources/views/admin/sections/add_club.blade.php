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
                                <form class="forms-sample row col-md-12" method="POST"
                                    action="{{ url('Accounts/add-edit-club/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-club') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="club_name"placeholder="Please enter Club Name" required
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('club_name') }}" @endif  ><br>
                                    <label for="club_name" id="club_name-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Logo* <span style="color:green;font-size:12px;"> @if($id) [{{$data->logo}}] @endif</span></label>
                                <div class="">
                                    <input type="file" class="form-control" name="club_logo"
                                        placeholder="Please enter Club Logo"><br>
                                    <label for="club_logo" id="club_logo-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Logo Title*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="club_logo_title"
                                    @if ($id) value="{{ $data->title }}" @else value="{{ old('club_logo_title') }}" @endif  placeholder="Please enter club logotitle" ><br>
                                    <label for="club_logo_title" id="club_logo_title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Logo Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="club_logo_alt"
                                    @if ($id) value="{{ $data->logo_alt }}" @else value="{{ old('club_logo_alt') }}" @endif  placeholder="Please enter club logo Alt" ><br>
                                    <label for="club_logo_alt" id="club_logo_alt-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Cover Image* <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span></label>
                                <div class="">
                                    <input type="file" class="form-control" name="club_image"
                                        placeholder="Please enter content page title" value=""><br>
                                    <label for="club_image" id="club_image-error" class="error"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Cover Image Title*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="club_image_title"
                                    @if ($id) value="{{ $data->image_title }}" @else value="{{ old('club_image_title') }}" @endif  placeholder="Please enter club image title" ><br>
                                    <label for="club_image_title" id="club_image_title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Cover Image Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="club_image_alt"
                                    @if ($id) value="{{ $data->image_alt }}" @else value="{{ old('club_image_alt') }}" @endif  placeholder="Please enter club Image Alt" value=""><br>
                                    <label for="club_image_alt" id="club_image_alt-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Chairperson*</label>
                                <div class="">
                                    {{-- <input type="text" class="form-control" name="chairperson"
                                    @if ($id) value="{{ $data->chairperson }}" @else value="{{ old('chairperson') }}" @endif  placeholder="Please enter Chairperson" value=""><br>
                                    <label for="chairperson" id="chairperson-error" class="error"></label> --}}


                                    <select class="form-control" name="chairperson" required>
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->chairperson  ? 'selected' : ''}} >{{$profiles->title}}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cell_type" class="col-form-label">Club Type</label>
                                <div class="">
                                    <select class="form-control" name="club_type" required>
                                        <option value=""> Select Type </option>
                                        <option  value="0" {{ ($data->type==0) ? 'selected' : ''}}>Academic Club </option>
                                        <option  value="1" {{ ($data->type==1) ? 'selected' : ''}}>Non-Academic Club </option>
                                    </select>
                                    <label for="cell_type" id="cell_type-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details"
                                        placeholder="Please enter About Details" required>@if($id){{$data->about_details}} @else {{old('about_details')}} @endif </textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="activitie" class="col-form-label">Activities</label>
                                <div class="">
                                    <textarea class="form-control" id="activitie" rows="4" name="activitie" placeholder="Please enter activitie">@if($id){{$data->activitie}} @else {{old('activitie')}} @endif</textarea><br>
                                    <label for="activitie" id="activitie-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="event" class="col-form-label">Events</label>
                                <div class="">
                                    <textarea class="form-control" id="event" rows="4" name="event" placeholder="Please enter event">@if($id){{$data->event}} @else {{old('event')}} @endif</textarea><br>
                                    <label for="event" id="event-error" class="error"></label>
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

                            <div class="col-md-12">
                                <div class="col-sm-10">
                                    <button type="reset" class="btn btn-danger" class="form-control">Reset</button>
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
        CKEDITOR.replace('activitie');
        CKEDITOR.replace('event');
    </script>

@endsection
