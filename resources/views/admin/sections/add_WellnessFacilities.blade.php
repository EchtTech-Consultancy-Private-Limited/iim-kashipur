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
                                    action="{{ url('Accounts/add-edit-Wellness-Facilities/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-Wellness-Facilities') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter  Name" required
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('title') }}" @endif><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details" required
                                        placeholder="Please enter About Details">@if($id){{$data->about_details}} @else {{old('about_details')}} @endif</textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <label for="activites" class="col-form-label">DESCRIPTION</label>
                                <div class="">
                                    <textarea class="form-control" id="activites" rows="4" name="activites" placeholder="Please enter Activite">@if($id){{$data->description}} @else {{old('activites')}} @endif</textarea><br>
                                    <label for="activites" id="activites-error" class="error"></label>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <label for="event" class="col-form-label">Events</label>
                                <div class="">
                                    <textarea class="form-control" id="event" rows="4" name="event" placeholder="Please enter event">@if($id){{$data->EVENTS}} @else {{old('event')}} @endif</textarea><br>
                                    <label for="event" id="event-error" class="error"></label>
                                </div>
                            </div> --}}


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
                                    <input type="text" class="form-control" name="banner_title" @if($id) value="{{$data->banner_title}}" @else {{old('banner_title')}} @endif
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
                                    <input type="text" class="form-control" name="banner_alt" @if($id) value="{{$data->banner_alt}}"  @else {{old('banner_alt')}} @endif
                                        placeholder="Please enter text for alt of banner photo, use for seo"
                                        ><br>

                                        {{-- <label for="name" id="name-error" class="error">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </label> --}}

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

                            <input type="hidden" name="status" @if($id) value="{{ $data->status }}"  @else value="0" @endif>

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
