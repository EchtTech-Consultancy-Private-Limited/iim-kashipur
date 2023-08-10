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
                                    action="{{ url('Accounts/add-edit-journal-publications/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-journal-publications') }}" enctype="multipart/form-data">
                            @endif

                            @csrf

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter title Name" required
                                        @if ($id) value="{{ $data->title }}" @else value="{{ old('title') }}" @endif  ><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>



                            <div class="form-group col-md-6">

                                <label for="image_text">year*</label>

                                <input type="date" name="year" placeholder="Enter your Image Text"
                                    class="form-last-name form-control" id="form-last-name" autocomplete="off">


                                <label for="image_text" id="image_text-error" class="error">
                                </label>

                            </div>




                        <div class="col-md-12"  >

                        <div class="form-group"> <label for="form_name">


                        <input type="radio" value="no" name="external"  checked @if($id) {{ ($data->external=="no")? "checked" : "" }} @endif  style="margin-                      left:50px;" id="checkboxs"> &nbsp;Internal URL </label>

                        <input type="radio" value="yes" name="external"  @if($id) {{ ($data->external=="yes")? "checked" : "" }}  @endif style="margin-left:50px;"                        id="checkbox"> &nbsp;External URL  </label>

                        <input  type="text" name="url1" @if($id) value="{{$data->url}}"  @else value="{{old('url1')}}" @endif  placeholder="please enter external                        url" class="form-control"  >

                        </div>

                        </div>


                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Archive Date</label>
                            <div class="">
                                <input type="date" class="form-control" name="archive_date"
                                @if (isset($id)) value="{{ $data->archive_date }}" @else value="{{ old('archive_date') }}" @endif  placeholder="Please enter" value=""><br>
                                <label for="archive_date" id="archive_date-error" class="error"></label>
                            </div>
                        </div>


                         <input type="hidden" name="status" @if($id) value="{{ $data->status }}" @else value="0" @endif >

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
        CKEDITOR.replace('activitie');
        CKEDITOR.replace('event');
    </script>

@endsection
