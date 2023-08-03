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
                                    action="{{ url('Accounts/add-edit-vendor/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-edit-vendor') }}" enctype="multipart/form-data">
                            @endif


                            @csrf

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Vendor Name</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="vendor_name"placeholder="Please enter Vendor Name"
                                        @if (isset($id)) value="{{ $vendorsdebarred->vendor_name }}" @else value="{{ old('vendor_name') }}" @endif><br>
                                    <label for="vendor_name" id="vendor_name-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Related Document</label>
                                <div class="">
                                    <input type="file" class="form-control" name="related_document"
                                        placeholder="Please enter Related Document"
                                        @if (isset($id)) value="{{ $vendorsdebarred->related_document }}" @else value="{{ old('related_document') }}" @endif>


                                        @if($id)
                                        <a href="{{ asset('uploads/vendorsdebarred/'.$vendorsdebarred->related_document) }}" download>

                                            <img src="{{ asset('admin/images/viewpdf.jpg') }}" width="170"
                                                height="70"></a>

                                        <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                            (
                                            <?php
                                                echo formatSizeUnits($vendorsdebarred->pdfsize);
                                            ?>)
                                        </span>


                                        @endif


                                    <label for="related_document" id="related_document-error" class="error"></label>
                                </div>
                            </div>

                           <div class="col-md-6 ">
                                <label for="event" class="col-form-label">Status</label>

                                    <select class="form-control" aria-label="Default select example" name="status">

                                        <option selected>Please select status</option>

                                        <option value="1"{{$vendorsdebarred->status==1?'selected':''}}>Active</option>

                                        <option value="0"{{$vendorsdebarred->status==0?'selected':''}}>Inactive</option>

                                    </select>
                               </div>


                            <div class="col-md-12 mt-4">

                                    <button type="submit" class="btn btn-primary"  onclick="load();" class="form-control">Submit</button>

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
