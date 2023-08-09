@extends('admin.Layout.master')

@section('title', 'Add Club')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Add Club</h4>



                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter Club Name"
                                          value="{{ $data->title }}" readonly ><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Logo* <span style="color:green;font-size:12px;">  [{{$data->logo}}] </span></label>
                                <div class="">

                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Logo Title*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="club_logo_title"
                                     value="{{ $data->title }}" readonly  placeholder="Please enter club logotitle" ><br>
                                    <label for="club_logo_title" id="club_logo_title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Logo Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="club_logo_alt"
                                     value="{{ $data->logo_alt }}" readonly placeholder="Please enter club logo Alt" ><br>
                                    <label for="club_logo_alt" id="club_logo_alt-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Cover Image* <span style="color:green;font-size:12px;">  [{{$data->image}}] </span></label>
                                <div class="">


                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Cover Image Title*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="club_image_title"
                                     value="{{ $data->image_title }}" readonly placeholder="Please enter club image title" ><br>
                                    <label for="club_image_title" id="club_image_title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Club Cover Image Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control" name="club_image_alt"
                                    value="{{ $data->image_alt }}" readonly placeholder="Please enter club Image Alt" value=""><br>
                                    <label for="club_image_alt" id="club_image_alt-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="inputText" class="col-form-label">Chairperson*</label>
                                <div class="">
                                    {{-- <input type="text" class="form-control" name="chairperson"
                                    @if ($id) value="{{ $data->chairperson }}" @else value="{{ old('chairperson') }}" @endif  placeholder="Please enter Chairperson" value=""><br>
                                    <label for="chairperson" id="chairperson-error" class="error"></label> --}}


                                    <select class="form-control" name="chairperson" disabled >
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->chairperson  ? 'selected' : ''}} >{{$profiles->title}}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cell_type" class="col-form-label">Club Type</label>
                                <div class="">
                                    <select class="form-control" name="club_type" required disabled>
                                        <option value=""> Select Type </option>
                                        <option  value="0" {{ ($data->type==0) ? 'selected' : ''}}>Academic Club </option>
                                        <option  value="1" {{ ($data->type==1) ? 'selected' : ''}}>Non-Academic Club </option>
                                    </select>
                                    <label for="cell_type" id="cell_type-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details"
                                        placeholder="Please enter About Details" required readonly>{{$data->about_details}}  </textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="activitie" class="col-form-label">Activities</label>
                                <div class="">
                                    <textarea class="form-control" id="activitie" rows="4" name="activitie" placeholder="Please enter activitie" readonly>{{$data->activitie}} </textarea><br>
                                    <label for="activitie" id="activitie-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="event" class="col-form-label">Events</label>
                                <div class="">
                                    <textarea class="form-control" id="event" rows="4" name="event" placeholder="Please enter event" readonly> {{$data->event}}</textarea><br>
                                    <label for="event" id="event-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner Image</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="bannerimage"
                                        placeholder="Please browse banner image" accept=".jpeg,.jpg,.gif,.png"><br>



                                </div>

                                <img src="{{ asset('page/banner/' . $data->bannerimage) }}" width="150"
                                    height="100" />


                            </div>

                            <div class="col-md-12">
                                <label for="inputText" class="col-sm-12 col-form-label">Banner title </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="banner_title"  {{$data->banner_title}} readonly
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
