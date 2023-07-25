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
                                    action="{{ url('Accounts/add-edit-career/'.$id) }}" enctype="multipart/form-data">
                                @else

                                    <form class="forms-sample row" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-career') }}" enctype="multipart/form-data">

                            @endif

                            @csrf

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">NAME OF THE POST</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="name_of_the_post"placeholder="Please enter"
                                        @if ($id) value="{{ $career->name_of_the_post }}" @else value="{{ old('name_of_the_post') }}" @endif><br>
                                    <label for="name_of_the_post" id="name_of_the_post-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">OPENING DATE</label>
                                <div class="">
                                    <input type="date" class="form-control" name="opening_date"
                                        placeholder="Please enter" @if ($id) value="{{ $career->opening_date }}" @else value="{{ old('opening_date') }}" @endif><br>
                                    <label for="opening_date" id="opening_date-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">CLOSING DATE</label>
                                <div class="">
                                    <input type="date" class="form-control" name="closing_date"
                                        placeholder="Please enter"  @if ($id) value="{{ $career->closing_date }}" @else value="{{ old('closing_date') }}" @endif><br>
                                    <label for="closing_date" id="closing_date-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">ONLINE LINK</label>
                                <div class="">
                                    <input type="text" class="form-control" name="online_link"
                                    @if ($id) value="{{ $career->online_link }}" @else value="{{ old('online_link') }}" @endif  placeholder="Please enter" value=""><br>
                                    <label for="online_link" id="online_link-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="Commmittee_type" class="col-form-label">DETAIL ADVERTISEMENT<span style="color:green;font-size:12px;"> @if($id) [{{$career->detail_advertisement }}] @endif</span></label>
                                <div class="">
                                    <input type="file" class="form-control" name="detail_advertisement"
                                    @if ($id) value="{{ $career->detail_advertisement }}" @else value="{{ old('detail_advertisement') }}" @endif  placeholder="Please enter"><br>
                                    <label for="detail_advertisement" id="detail_advertisement-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">NOTE</label>
                                <div class="">
                                    <input type="text" class="form-control" name="note"
                                    @if ($id) value="{{ $career->note }}" @else value="{{ old('note') }}" @endif  placeholder="Please enter"><br>
                                    <label for="note" id="note-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="activeites" class="col-form-label">CORRIGENDUM</label>
                                <div class="">
                                    <input type="text" class="form-control" name="corrigendum"
                                    @if ($id) value="{{ $career->corrigendum }}" @else value="{{ old('corrigendum') }}" @endif  placeholder="Please enter"><br>
                                    <label for="corrigendum" id="corrigendum-error" class="error"></label>
                                </div>
                            </div>

                          <div class="col-md-12">
                                    <label for="event" class="col-form-label">Status</label>

                                    <select class="form-control" aria-label="Default select example" name="status">

                                        <option selected>Please select status</option>

                                        <option value="1" {{ $career->status == 1 ? 'selected' : '' }}>Active</option>

                                        <option value="0" {{ $career->status == 0 ? 'selected' : '' }}>Inactive</option>

                                    </select>
                            </div>

                            <div class="col-md-12 mt-4">
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
