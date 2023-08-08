@extends('admin.Layout.master')

@section('title', 'View Industry')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">View Industry</h4>

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



                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Date</label>
                                <div class="">

                                       <label for="inputText" class="col-form-label"><b>{{ $data->date ??'' }}</b></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Title</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter"
                                        value="{{ $data->title }}" readonly ><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Attachment File

                                </label>
                                <div class="">

                                        @if($data->attachement_file != '')

                                        <iframe src="{{ asset('uploads/view/attach/'.$data->attachement_file) }}" height="800px"
                                            width="100%" ></iframe>


                                        @endif

                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

    </div>

@endsection
