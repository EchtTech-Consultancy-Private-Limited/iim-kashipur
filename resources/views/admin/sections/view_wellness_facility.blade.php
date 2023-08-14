@extends('admin.Layout.master')

@section('title', 'View Wellness Facilities')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body row">

                            <h4 class="card-title col-md-12" >Manage RTI</h4>

                                {{-- <p class="card-title">Manage RTI</p> --}}


                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter  Name" required
                                           value="{{ $data->title }}"  readonly><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details" required
                                        placeholder="Please enter About Details" readonly> {{$data->about_details}} </textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>




                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Banner Image</label>
                                <div class="">
                                    <img src="{{ asset('page/banner/' . $data->bannerimage) }}" width="150"
                                    height="100" />
                                </div>                              

                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Banner title </label>
                                <div class="">
                                    <input type="text" class="form-control" name="banner_title" {{$data->banner_title}}  readonly
                                        placeholder="Please enter text for title of banner photo, use for seo"
                                      ><br>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Banner Alt </label>
                                <div>
                                    <input type="text" class="form-control" name="banner_alt" {{$data->banner_alt}} readonly
                                        placeholder="Please enter text for alt of banner photo, use for seo">
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
        CKEDITOR.replace('activites');
        CKEDITOR.replace('event');
    </script>

@endsection
