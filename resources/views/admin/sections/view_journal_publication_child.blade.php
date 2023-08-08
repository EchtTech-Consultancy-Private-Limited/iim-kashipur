@extends('admin.Layout.master')

@section('title','View journal publication')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">View journal publication</h4>





                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details"
                                        placeholder="Please enter About Details" readonly required>{{$data->about_details}}  </textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">url*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="url"placeholder="Please enter url" required
                                        value="{{ $data->url }}"  readonly ><br>
                                    <label for="url" id="url-error" class="error"></label>
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
