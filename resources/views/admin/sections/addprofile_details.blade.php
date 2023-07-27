@extends('admin.Layout.master')

@section('title', $title)

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">



          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">{{$title}}</h4>

                  <p class="card-description">

                        @if($errors->any())

                        <div class="alert alert-danger">

                            <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                            </ul>

                        </div>

                        @endif

                        @if(Session::has('error'))

                     <div class="alert alert-danger col-md-12 text-center">

                  <strong>Oops!</strong> {{ Session::get('error') }}

                </div>

                 @endif

                  </p>

                @if($id)

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-profile/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-profile')}}?pid={{basename(url()->previous())}}" enctype="multipart/form-data">

                @endif

                    @csrf



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Title *</label> <input id="form_name" type="text" name="Title" @if($id) value="{{$data->Title}}" @else value="{{old('Title')}}" @endif class="form-control" placeholder="Please enter Title *" required="required" > </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Title[Hindi] *</label> <input id="form_name" type="text" name="title_h" @if($id) value="{{$data->title_h}}" @else value="{{old('title_h')}}" @endif class="form-control" placeholder="Please enter Title in hindi *"  > </div>

                    </div>




                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Photo *</label> <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span>

                         <input id="form_name" type="file" name="image" @if($id) value="{{$data->image}}" @endif class="form-control" > </div>

                    </div>


                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Image_Title *</label> <input id="form_name" type="text" name="Image_Title" @if($id) value="{{$data->Image_Title}}" @else value="{{old('Image_Title')}}" @endif class="form-control" placeholder="Please enter Image_Title *"  > </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Heading *</label> <input id="form_name" type="text" name="heading" @if($id) value="{{$data->heading}}" @else value="{{old('heading')}}" @endif class="form-control" placeholder="Please enter heading*" > </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Heading[hindi] *</label> <input id="form_name" type="text" name="heading_h" @if($id) value="{{$data->heading_h}}" @else value="{{old('heading_h')}}" @endif class="form-control" placeholder="Please enter heading hindi *" > </div>

                    </div>




                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> Description </label> <textarea name="description" id="description">@if($id){{$data->description}} @else {{old('description')}} @endif</textarea> </div>

                    </div>



                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> विवरण </label> <textarea name="description_h" id="description_h">@if($id) {{$data->description_h}} @else {{old('description_h')}} @endif</textarea> </div>

                    </div>



                    <div class="col-md-12">

                        <label for="inputText" class="col-sm-2 col-form-label" >Status</label>

                          <div class="col-sm-10">

                          <select   class="form-control" aria-label="Default select example" name="status">

                          <option selected>Please select status</option>

                          <option value="1" {{$data->status==1?'selected':''}}>Active</option>

                          <option value="0" {{$data->status==0?'selected':''}}>Inactive</option>


                         </select>

                        </div>

                        </div>

                    <input id="form_name" type="hidden" name="parent_id"  value="{{basename(url()->previous())}}"  class="form-control"   >



                    <div class="clearfix"></div>&nbsp; &nbsp;
                   <div class="col-md-12">

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>

                   </div>

                  </form>

                </div>

              </div>

            </div>

            </div>

        </div>

        <!-- content-wrapper ends -->

        <script type="text/javascript">

            CKEDITOR.replace('description');

            CKEDITOR.replace('description_h');

        </script>

       @endsection
