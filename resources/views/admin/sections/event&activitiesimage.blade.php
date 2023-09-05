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

                                @if (Session::has('success'))
                                    <div class="alert alert-success col-md-12 text-center">

                                        <strong>Oops!</strong> {{ Session::get('success') }}

                                    </div>
                                @endif

                            </p>

                            @if ($id)
                                <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                    action="{{ url('Accounts/add-edit-EventsActivites-image/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-EventsActivites-image') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Multiple Image</label>
                                <div class="">
                                    <input type="file" class="form-control"
                                        name="image"placeholder="Please enter"
                                        value="{{ old('image') }}">@if ($id) <img src="{{ asset('uploads/multiple/event_image/'.$event->image) }}"
                                                                style="height: 120px;  width: 120px;" loading="lazy">@endif<br>
                                    <label for="image" id="image-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Image Text</label>
                                <div class="">
                                    <input type="text" class="form-control" name="image_title"
                                        placeholder="Please enter" @if ($id) value="{{ $event->image_title }}" @else value="{{ old('image_title') }}" @endif><br>
                                    <label for="image_title" id="image_title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Image Alt</label>
                                <div class="">
                                    <input type="text" class="form-control" name="image_alt"
                                        placeholder="Please enter" @if ($id) value="{{ $event->image_alt }}" @else value="{{ old('image_alt') }}" @endif><br>
                                    <label for="image_alt" id="image_alt	-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">sort order</label>
                                <div class="">
                                    <input type="number" class="form-control" name="order"
                                    @if ($id) value="{{ $event->order }}" @else value="{{ old('order') }}" @endif  placeholder="Please enter" value=""><br>
                                    <label for="order" id="order-error" class="error"></label>
                                </div>
                            </div>

                            @if ($id == '')
                            <div class="col-md-6">
                                <label for="Commmittee_type" class="col-form-label">Title</label>
                                <div class="">
                                    <select class="form-control" name="parent_id" required>
                                        <option value=""> Select Type </option>
                                        @foreach($data as $title)
                                        <option  value="{{ $title->id}}" >  {{ $title->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="Commmittee_type" id="Commmittee_type-error" class="error"></label>
                                </div>
                            </div>
                            @endif

                            {{-- <div class="col-md-12">

                                <label for="event" class="col-form-label">Status</label>

                                    <select class="form-control" aria-label="Default select example" name="status">

                                        <option selected>Please select status</option>

                                        <option value="1" {{ $event->status == 1 ? 'selected' : '' }}>Active</option>

                                        <option value="0" {{ $event->status == 0 ? 'selected' : '' }}>Inactive</option>

                                    </select>

                            </div> --}}

                            <input type="hidden" name="status"  @if ($id) value="{{ $event->status }}" @else value="0" @endif  >

                            <div class="col-md-12">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary"  onclick="load();" class="form-control">Submit</button>
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
