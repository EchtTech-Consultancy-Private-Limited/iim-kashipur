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
                                    action="{{ url('Accounts/add-edit-cells/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-cells') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Cells Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Cell_name"placeholder="Please enter Club Name" required
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('Cell_name') }}" @endif><br>
                                    <label for="Cell_name" id="Cell_name-error" class="error"></label>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Cells Logo* <span style="color:green;font-size:12px;"> @if($id) [{{$data->logo}}] @endif</span></label>
                                <div class="">
                                    <input type="file" class="form-control" name="Cell_logo"
                                        placeholder="Please enter Club Logo" value=""><br>
                                    <label for="Cell_logo" id="Cell_logo-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Cells Logo Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="cell_logo_title"placeholder="Please enter Club Logo Title"
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('cell_logo_title') }}" @endif><br>
                                    <label for="cell_logo_title" id="cell_logo_title-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Cells Logo Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="cell_logo_alt"placeholder="Please enter Club logo Atl"
                                        @if ($id) value="{{ $data->logo_alt }}" @else value="{{ old('cell_logo_alt') }}" @endif><br>
                                    <label for="cell_logo_alt" id="cell_logo_alt-error" class="error"></label>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">cells Cover Image* <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span></label>
                                <div class="">
                                    <input type="file" class="form-control" name="Cell_image"
                                        placeholder="Please enter content page title" value=""><br>
                                    <label for="Cell_image" id="Cell_image-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Cells Cover Image Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="cell_image_title"placeholder="Please enter Club Image Title"
                                        @if ($id) value="{{ $data->image_title }}" @else value="{{ old('cell_image_title') }}" @endif><br>
                                    <label for="cell_image_title" id="cell_image_title-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Cells Cover Image Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="cell_image_alt"placeholder="Please enter Club Logo Title"
                                        @if ($id) value="{{ $data->image_alt }}" @else value="{{ old('cellcell_image_alt_logo_title') }}" @endif><br>
                                    <label for="cell_image_alt" id="cell_image_alt-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Chairperson*</label>
                                <div class="">
                                    {{-- <input type="text" class="form-control" name="chairperson"
                                    @if ($id) value="{{ $data->chairperson }}" @else value="{{ old('chairperson') }}" @endif  placeholder="Please enter Chairperson" value=""><br>
                                    <label for="chairperson" id="chairperson-error" class="error"></label> --}}

                                    <select class="form-control" name="chairperson"  id="chairperson">
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->chairperson  ? 'selected' : ''}}>{{$profiles->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <label for="chairperson" id="chairperson-error" class="error"></label> --}}
                            </div>


                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details" required
                                        placeholder="Please enter About Details">@if($id){{$data->about_details}} @else {{old('about_details')}} @endif</textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="activites" class="col-form-label">Activities</label>
                                <div class="">
                                    <textarea class="form-control" id="activites" rows="4" name="activites" placeholder="Please enter Activite">@if($id){{$data->activites}} @else {{old('activites')}} @endif</textarea><br>
                                    <label for="activites" id="activites-error" class="error"></label>
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
                                <label for="inputText" class="col-sm-12 col-form-label">Banner Image</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="bannerimage"
                                        placeholder="Please browse banner image" accept=".jpeg,.jpg,.gif,.png"><br>


                                        {{-- <label for="name" id="name-error" class="error">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </label> --}}


                                </div>

                                <img src="{{ asset('page/banner/' . $data->bannerimage) }}" width="150"
                                    height="100" />


                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner title </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="banner_title" @if($id){{$data->banner_title}} @else {{old('banner_title')}} @endif
                                        placeholder="Please enter text for title of banner photo, use for seo"
                                      ><br>


                                        {{-- <label for="name" id="name-error" class="error">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </label> --}}


                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner Alt </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="banner_alt" @if($id){{$data->banner_alt}} @else {{old('banner_alt')}} @endif
                                        placeholder="Please enter text for alt of banner photo, use for seo"
                                        ><br>

                                        {{-- <label for="name" id="name-error" class="error">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </label> --}}

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
                                    {{-- <button type="reset" class="btn btn-danger" class="form-control">Reset</button> --}}
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
