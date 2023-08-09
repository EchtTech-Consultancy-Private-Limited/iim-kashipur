@extends('admin.Layout.master')

@section('title','View Journal Publication Inner page')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">View Journal Publication Inner page</h4>


                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter title Name" required
                                          readonly value="{{ $data->title }}"  ><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>



                            <div class="form-group col-md-6">

                                <label for="image_text">year*</label><br>

                                    <label for="image_text">{{ $data->year}}</label>
                                </label>

                            </div>




                        <div class="col-md-12"  >

                        <div class="form-group"> <label for="form_name">  Url  </label>

                                <input  type="text" name="url1" value="{{$data->url}}" readonly   placeholder="please enter external                        url" class="form-control"  >

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
