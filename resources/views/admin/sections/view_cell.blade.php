@extends('admin.Layout.master')

@section('title', 'View Club')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body row">

                            <h4 class="card-title col-md-12">View Club</h4>



                            <div class="col-md-6">
                                <label for="title" class="col-form-label">Cells Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter Club Name"
                                           readonly  value="{{ $data->title }}" ><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Cells Logo* <span style="color:green;font-size:12px;"> [{{$data->logo}}] </span></label>
                                <div class="">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Cells Logo Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="cell_logo_title"placeholder="Please enter Club Logo Title"
                                       value="{{ $data->title }}" readonly><br>
                                    <label for="cell_logo_title" id="cell_logo_title-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Cells Logo Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="cell_logo_alt"placeholder="Please enter Club logo Atl"
                                        readonly value="{{ $data->logo_alt }}" ><br>
                                    <label for="cell_logo_alt" id="cell_logo_alt-error" class="error"></label>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">cells Cover Image* <span style="color:green;font-size:12px;">  [{{$data->image}}] </span></label>
                                <div class="">

                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Cells Cover Image Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="cell_image_title"placeholder="Please enter Club Image Title"
                                        value="{{ $data->image_title }}" readonly><br>
                                    <label for="cell_image_title" id="cell_image_title-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Cells Cover Image Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="cell_image_alt"placeholder="Please enter Club Logo Title"
                                          value="{{ $data->image_alt }}"  readonly><br>
                                    <label for="cell_image_alt" id="cell_image_alt-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Chairperson*</label>
                                <div class="">
                                    {{-- <input type="text" class="form-control" name="chairperson"
                                    @if ($id) value="{{ $data->chairperson }}" @else value="{{ old('chairperson') }}" @endif  placeholder="Please enter Chairperson" value=""><br>
                                    <label for="chairperson" id="chairperson-error" class="error"></label> --}}

                                    <select class="form-control" name="chairperson" disabled  id="chairperson">
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->chairperson  ? 'selected' : ''}}>{{$profiles->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <label for="chairperson" id="chairperson-error" class="error"></label> --}}
                            </div>


                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details" required
                                        placeholder="Please enter About Details" readonly>{{$data->about_details}}</textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="activites" class="col-form-label">Activities</label>
                                <div class="">
                                    <textarea class="form-control" id="activites" rows="4" name="activites" placeholder="Please enter Activite" readonly>{{$data->activites}}</textarea><br>
                                    <label for="activites" id="activites-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="event" class="col-form-label">Events</label>
                                <div class="">
                                    <textarea class="form-control" id="event" rows="4" name="event" placeholder="Please enter event" readonly>{{$data->event}}</textarea><br>
                                    <label for="event" id="event-error" class="error"></label>
                                </div>
                            </div>




                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Banner Image</label>
                                <div class="">


                                    <img src="{{ asset('page/banner/' . $data->bannerimage) }}" style="width: 100%" />

                                </div>



                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Banner title </label>
                                <div class="">
                                    <input type="text" class="form-control" name="banner_title"  {{$data->banner_title}} readonly
                                        placeholder="Please enter text for title of banner photo, use for seo"
                                      ><br>


                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Banner Alt </label>
                                <div class="">
                                    <input type="text" class="form-control" name="banner_alt"   {{$data->banner_alt}}   readonly
                                        placeholder="Please enter text for alt of banner photo, use for seo"
                                        ><br>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>


        </div>

   
@endsection
