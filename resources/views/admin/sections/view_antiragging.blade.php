@extends('admin.Layout.master')

@section('title', 'view Anti Ragging')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">view Anti Ragging</h4>

                            <p class="card-description">




                            </p>


                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">PDF*</label>
                                <div class="">
                                    <input type="text" readonly placeholder="Please Enter your Pdf Name"  value="{{ $data->title }}"  class="form-control" name="title"><br>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">PDF*

                                <span style="color:green;font-size:12px;"> [{{$data->pdf }}]

                                    <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                        (
                                        <?php
                                            echo formatSizeUnits($data->pdfsize);
                                        ?>)
                                    </span>


                                </span>

                                </label>
                                <div class="">

                                    <iframe src="{{ asset('uploads/pdf/' . $data->pdf) }}" height="800px" readonly
                                        width="100%"></iframe>
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
