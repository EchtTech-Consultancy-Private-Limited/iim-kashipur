@extends('admin.Layout.master')

@section('title', 'View Tdex')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">View Tdex</h4>

                        
                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details"
                                        placeholder="Please enter About Details" disabled>{{$data->about_details}} </textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>

                          

                            <div class="col-md-12">
                                <label for="event" class="col-form-label">Events</label>
                                <div class="">
                                    <textarea class="form-control" id="event" rows="4" name="event" disabled placeholder="Please enter event">{{$data->event}} </textarea><br>
                                    <label for="event" id="event-error" class="error"></label>
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Chairperson*</label>
                                <div class="">
                                   
                                    <select class="form-control" name="chairperson" disabled >
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->chairperson  ? 'selected' : ''}} >{{$profiles->title}}</option>
                                        @endforeach

                                    </select>
                                    
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner Image</label>
                                <div class="col-sm-12">
                                   
                                </div>
                               
                                  <img src="{{ asset('page/banner/' . $data->bannerimage) }}" width="150"
                                    height="100" />
                                

                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner title </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="banner_title" disabled value="{{$data->banner_title}}" 
                                        placeholder="Please enter text for title of banner photo, use for seo"
                                      ><br>

                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner Alt </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="banner_alt" disabled  value="{{$data->banner_alt}}" 
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

    <script type="text/javascript">
        CKEDITOR.replace('about_details');
        CKEDITOR.replace('event');
    </script>

@endsection
