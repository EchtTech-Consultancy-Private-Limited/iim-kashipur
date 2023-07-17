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
                                    action="{{ url('Accounts/add-edit-committee/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-committee') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Committee Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                     required   name="Commmittee_name"placeholder="Please enter Club Name"
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('Commmittee_name') }}" @endif><br>
                                    <label for="Commmittee_name" id="Commmittee_name-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Commmittee Logo* <span style="color:green;font-size:12px;"> @if($id) [{{$data->logo}}] @endif</span></label>
                                <div class="">
                                    <input type="file" class="form-control" name="Commmittee_logo"
                                        placeholder="Please enter Commmittee Logo" value=""><br>
                                    <label for="Commmittee_logo" id="Commmittee_logo-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Committee Logo Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Committee_logo_title"placeholder="Please enter Committee Logo Title"
                                        @if ($id) value="{{ $data->logo_title }}" @else value="{{ old('Committee_logo_title') }}" @endif><br>
                                    <label for="Committee_logo_title" id="Committee_logo_title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Committee Logo Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Committee_logo_alt"placeholder="Please enter Club Name"
                                        @if ($id) value="{{ $data->logo_alt }}" @else value="{{ old('Committee_logo_alt') }}" @endif><br>
                                    <label for="Committee_logo_alt" id="Committee_logo_alt-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Commmittee Cover Image* <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span></label>
                                <div class="">
                                    <input type="file" class="form-control" name="Commmittee_image"
                                        placeholder="Please enter Commmittee image" value=""><br>
                                    <label for="Commmittee_image	" id="Commmittee_image	-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Committee image Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Committee_image_title	"placeholder="Please enter Committee Image Title"
                                        @if ($id) value="{{ $data->image_title }}" @else value="{{ old('Committee_image_title') }}" @endif><br>
                                    <label for="Committee_image_title	" id="Committee_image_title	-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Committee Image Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Committee_image_alt"placeholder="Please enter Committee Alt"
                                        @if ($id) value="{{ $data->image_alt }}" @else value="{{ old('Committee_image_alt') }}" @endif><br>
                                    <label for="Committee_image_alt" id="Committee_image_alt-error" class="error"></label>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Chairperson*</label>
                                <div class="">
                                    {{-- <input type="text" class="form-control" name="chairperson"
                                    @if ($id) value="{{ $data->chairperson }}" @else value="{{ old('chairperson') }}" @endif  placeholder="Please enter Chairperson" value=""><br> --}}


                                    <select class="form-control" name="chairperson" required>
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->chairperson  ? 'selected' : ''}}>{{$profiles->title}}</option>
                                        @endforeach

                                    </select>

                                    <label for="chairperson" id="chairperson-error" class="error"></label>
                                </div>
                            </div>

                            {{-- <div class="col-md-3">
                                <label for="Commmittee_type" class="col-form-label">Commmittee Type</label>
                                <div class="">
                                    <select class="form-control" name="Commmittee_type">
                                        <option value=""> Select Type </option>
                                        <option  value="0" {{ ($data->Commmittee_type==0) ? 'selected' : '' }} > Academic Club </option>
                                        <option  value="1" {{ ($data->Commmittee_type==1) ? 'selected' : '' }} > Non-Academic Club </option>
                                    </select>
                                    <label for="Commmittee_type" id="Commmittee_type-error" class="error"></label>
                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details" required
                                        placeholder="Please enter About Details">@if($id){{$data->about_details}} @else {{old('about_details')}} @endif</textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="activeites" class="col-form-label">Activities</label>
                                <div class="">
                                    <textarea class="form-control" id="activeites" rows="4" name="activeites" placeholder="Please enter Activite">@if($id){{$data->activites}} @else {{old('activeites')}} @endif</textarea><br>
                                    <label for="activeites" id="activeites-error" class="error"></label>
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
        CKEDITOR.replace('activeites');
        CKEDITOR.replace('event');
    </script>

@endsection
