@extends('admin.Layout.master')

@section('title', 'View Event And Activety')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">View Event And Activety</h4>

                            <p class="card-description">


                            </p>


                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Title</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter"
                                       value="{{ $data->title }}"  readonly  >
                                    <label for="title" id="title-error" class="error"></label>
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
