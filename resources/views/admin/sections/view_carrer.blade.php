@extends('admin.Layout.master')

@section('title', 'View Carrer')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">View Carrer</h4>

                            <p class="card-description">




                            </p>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">NAME OF THE POST</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="name_of_the_post"placeholder="Please enter"
                                         value="{{ $data->name_of_the_post }}" readonly><br>
                                    <label for="name_of_the_post" id="name_of_the_post-error" class="error"></label>
                                </div>
                            </div>




                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">OPENING DATE</label>
                                <div class="">
                                      <label for="inputText" class="col-form-label">{{ $data->opening_date }}</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">CLOSING DATE</label>
                                <div class="">

                                    <label for="inputText" class="col-form-label">{{ $data->closing_date }}</label>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">ONLINE LINK</label>
                                <div class="">
                                    <input type="text" class="form-control" name="online_link"
                                  value="{{ $data->online_link }}"  readonly ><br>
                                    <label for="online_link" id="online_link-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="Commmittee_type" class="col-form-label">DETAIL ADVERTISEMENT<span style="color:green;font-size:12px;"> [{{$data->detail_advertisement }}] </span></label>
                                <div class="">

                                     @if($data->detail_advertisement != '')

                                     <iframe src="{{ asset('uploads/fo'.$data->detail_advertisement) }}" height="800px"
                                         width="100%" ></iframe>


                                     @endif

                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">NOTE</label>
                                <div class="">
                                    <input type="text" class="form-control" name="note"
                                       value="{{ $data->note }}"  readonly placeholder="Please enter"><br>
                                    <label for="note" id="note-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="activeites" class="col-form-label">CORRIGENDUM</label>
                                <div class="">
                                    <input type="text" class="form-control" name="corrigendum"
                                  value="{{ $data->corrigendum }}"  readonly placeholder="Please enter"><br>

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
