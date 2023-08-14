@extends('admin.Layout.master')

@section('title', 'view Student Council')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body row">

                            <h4 class="card-title col-md-12">view Student Council</h4>

                            <p class="card-description">



                            </p>



                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Student Council*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="student_council"placeholder="Please enter student council Name" required
                                          readonly  value="{{ $data->student_council }}" ><br>
                                    <label for="student_council" id="student_council-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Chairperson*</label>
                                <div class="">
                                        <select class="form-control" name="chairperson" disabled required>
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->chairperson  ? 'selected' : ''}} >{{$profiles->title}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details"
                                        placeholder="Please enter About Details" readonly required>{{$data->about_details}}  </textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner Image</label>


                                <img src="{{ asset('page/banner/'.$data->bannerimage) }}" width="250"
                                    height="150" />


                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner title </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="banner_title"  readonly   {{$data->banner_title}}
                                        placeholder="Please enter text for title of banner photo, use for seo"
                                      ><br>



                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner Alt </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="banner_alt" readonly {{$data->banner_alt}}
                                        placeholder="Please enter text for alt of banner photo, use for seo"
                                        ><br>



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
