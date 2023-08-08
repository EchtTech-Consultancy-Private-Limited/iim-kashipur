@extends('admin.Layout.master')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title"></h4>

                            <p class="card-description">





                            </p>





                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Vendor Name</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="vendor_name"placeholder="Please enter Vendor Name"
                                      value="{{ $data->vendor_name }}" readonly ><br>
                                    <label for="vendor_name" id="vendor_name-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Related Document</label>
                                <div class="">


                                        <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                            (
                                            <?php
                                                echo formatSizeUnits($data->pdfsize);
                                            ?>)
                                        </span>




                                         @if($data->related_document != '')

                                        <iframe src="{{ asset('uploads/vendorsdebarred/'.$data->related_document) }}" height="800px"
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
