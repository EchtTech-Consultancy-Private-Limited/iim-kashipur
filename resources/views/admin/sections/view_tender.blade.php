@extends('admin.Layout.master')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body row">

                            <h4 class="card-title col-md-12">View Tender</h4>
                           

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Published Date</label>
                                <div class="">

                                    <label for="inputText" class="col-form-label">{{ $data->published_date }}</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Submission Date</label>
                                <div class="">
                                      <label for="inputText" class="col-form-label">{{ $data->submission_date }}</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Title</label>
                                <div class="">
                                    <input type="text" class="form-control" readonly name="title" value="{{ $data->title }}"   placeholder="Please enter" value=""><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="tender_document" class="col-form-label">Tender Documents <span style="color:green;font-size:12px;">  [{{$data->tender_document }}]</span></label>
                                <div class="">



                                    @if($data->tender_document != '')

                                    <iframe src="{{ asset('uploads/view/attach/'.$data->tender_document) }}" height="800px"
                                        width="100%" readonly></iframe>


                                    @endif


                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="corrigendum" class="col-form-label">Corrigendum</label>
                                <div class="">
                                    <input type="text" class="form-control" name="corrigendum"  value="{{ $data->corrigendum }}" readonly  placeholder="Please enter" value=""><br>
                                    <label for="corrigendum" id="corrigendum-error" class="error"></label>
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
