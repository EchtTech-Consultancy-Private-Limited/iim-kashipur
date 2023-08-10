@extends('admin.Layout.master')

@section('title', 'View Committee ')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body row">

                            <h4 class="card-title col-md-12">View Committee </h4>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">type*</label>
                                <div class="">

                                    <select class="form-control" name="type" disabled required>
                                        <option value=""> Select Type </option>
                                        <option  value="1" {{$data->type  == '1'  ? 'selected' : ''}}>committees</option>
                                        <option  value="2" {{$data->type == '2'  ? 'selected' : ''}}>placement committee</option>
                                    </select>
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Committee Name*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="title"placeholder="Please enter Club Name"
                                         value="{{ $data->title }}" readonly><br>
                                    <label for="title" id="title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Commmittee Logo* <span style="color:green;font-size:12px;">  [{{$data->logo}}]  </span></label>
                                <div class="">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Committee Logo Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Committee_logo_title"placeholder="Please enter Committee Logo Title"
                                         value="{{ $data->logo_title }}" readonly>
                                    <label for="Committee_logo_title" id="Committee_logo_title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Committee Logo Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Committee_logo_alt"placeholder="Please enter Club Name"
                                         value="{{ $data->logo_alt }}" readonly>
                                    <label for="Committee_logo_alt" id="Committee_logo_alt-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Commmittee Cover Image* <span style="color:green;font-size:12px;">   [{{$data->image}}] </span></label>
                                <div class="">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Committee image Title*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Committee_image_title	"placeholder="Please enter Committee Image Title"
                                            value="{{ $data->image_title }}" readonly >
                                    <label for="Committee_image_title	" id="Committee_image_title	-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Committee Image Alt*</label>
                                <div class="">
                                    <input type="text" class="form-control"
                                        name="Committee_image_alt"placeholder="Please enter Committee Alt"
                                        value="{{ $data->image_alt }}" readonly>
                                    <label for="Committee_image_alt" id="Committee_image_alt-error" class="error"></label>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Chairperson*</label>
                                <div class="">


                                    <select class="form-control" name="chairperson" disabled >
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->chairperson  ? 'selected' : ''}}>{{$profiles->title}}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Placement*</label>
                                <div class="">

                                    <select class="form-control" name="Placement" disabled >
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->placement  ? 'selected' : ''}}>{{$profiles->title}}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>





                            <div class="col-md-12">
                                <label for="about_details" class="col-form-label">About Details</label>
                                <div class="">
                                    <textarea class="form-control" id="about_details" rows="4" name="about_details" required
                                        placeholder="Please enter About Details" readonly >{{$data->about_details}} </textarea><br>
                                    <label for="about_details" id="about_details-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="activeites" class="col-form-label">Activities</label>
                                <div class="">
                                    <textarea class="form-control" id="activeites" rows="4" name="activeites" placeholder="Please enter Activite" readonly>{{$data->activites}} </textarea><br>
                                    <label for="activeites" id="activeites-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="event" class="col-form-label">Events</label>
                                <div class="">
                                    <textarea class="form-control" id="event" rows="4" name="event" placeholder="Please enter event" readonly>{{$data->event}} </textarea><br>
                                    <label for="event" id="event-error" class="error"></label>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="inputText" class="col-form-label">Banner Image</label>
                                <div class="">
                                    <input type="file" class="form-control" name="bannerimage"
                                        placeholder="Please browse banner image" accept=".jpeg,.jpg,.gif,.png"><br>

                             <img src="{{ asset('page/banner/' . $data->bannerimage) }}" style="width:100%" />

                                </div>

                               

                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Banner title </label>
                                <div class="">
                                    <input type="text" class="form-control" name="banner_title" {{$data->banner_title}} readonly
                                        placeholder="Please enter text for title of banner photo, use for seo">

                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Banner Alt </label>
                                <div class="6">
                                    <input type="text" class="form-control" name="banner_alt" {{$data->banner_alt}}  readonly
                                        placeholder="Please enter text for alt of banner photo, use for seo"
                                        >
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


        </div>

  
  
@endsection
