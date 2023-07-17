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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-announcements/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-announcements')}}" enctype="multipart/form-data">

                @endif

                    @csrf





                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> Type *</label>

                            <select name="type" class="form-control">

                                <option value="">Please Select</option>

                                @foreach(GetOptionsByName('Announcements') as $D)

                                    <option value="{{$D->option}}" @if($id) @if($D->option == $data->type) selected @endif @endif>{{$D->option}}</option>

                                @endforeach

                            </select>

                        </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Start Date </label>

                            <input type="date" name="start_date" @if($id) value="{{date('Y-m-d', strtotime($data->start_date))}}" @else value="{{old('start_date')}}" @endif  class="form-control">

                        </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> End Date </label>

                              <input type="date" name="end_date" @if($id) value="{{date('Y-m-d', strtotime($data->end_date))}}" @else value="{{old('end_date')}}" @endif class="form-control">

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Title * </label>

                              <input type="text" name="title" @if($id) value="{{$data->title}}" @else value="{{old('title')}}" @endif class="form-control" required>

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> शीर्षक  </label>

                              <input type="text" name="title_h" @if($id) value="{{$data->title_h}}" @else value="{{old('title_h')}}" @endif class="form-control">

                        </div>

                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Image  </label>
                            <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span>
                              <input type="file" name="image"  class="form-control">
                        </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_image_title"> Image Title </label>
                          <input type="text" name="image_title" @if($id) value="{{$data->image_title}}" @else value="{{old('image_title')}}" @endif class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_image_alt"> Image Alt Text </label>
                          <input type="text" name="image_alt" @if($id) value="{{$data->image_alt}}" @else value="{{old('image_alt')}}" @endif class="form-control">
                      </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_banner_image"> Banner  </label>
                            <span style="color:green;font-size:12px;"> @if($id) [{{$data->banner_image}}] @endif</span>
                              <input type="file" name="banner_image"  class="form-control">
                        </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_banner_title"> Banner Title </label>
                          <input type="text" name="banner_title" @if($id) value="{{$data->banner_title}}" @else value="{{old('banner_title')}}" @endif class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_banner_alt"> Banner Alt Text </label>
                          <input type="text" name="banner_alt" @if($id) value="{{$data->banner_alt}}" @else value="{{old('image_alt')}}" @endif class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_document"> Document  </label>
                            <span style="color:green;font-size:12px;"> @if($id) [{{$data->related_docs}}] @endif</span>
                              <input type="file" name="document"  class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_is_link_to_document"> Is link to document?
                          <input type="checkbox" name="is_link_to_document" value="1" @if($id && $data->is_link_to_document) Checked @endif class="form-control">
                          </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_external_link"> External Link (URL) </label>
                          <input type="text" name="external_link" @if($id) value="{{$data->external_link}}" @else value="{{old('external_link')}}" @endif class="form-control">
                      </div>
                    </div>
                     <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> Description * </label>

                              <textarea name="description" id="description">@if($id) {{$data->description}} @else {{old('description')}} @endif</textarea>

                        </div>

                    </div>



                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> विवरण  </label>

                              <textarea name="description_h" id="description_h" >@if($id) {{$data->description_h}} @else {{old('description_h')}} @endif</textarea>

                        </div>

                    </div>

                    <div class="col-md-12">

                      <div class="form-group"> <label for="form_meta_title"> Meta Title * </label>

                        <input type="text" name="meta_title" @if($id) value="{{$data->meta_title}}" @else value="{{old('meta_title')}}" @endif class="form-control" maxlength="50" required>

                      </div>

                    </div>

                    <div class="col-md-12">

                      <div class="form-group"> <label for="form_meta_keywordse"> Meta Keywords *  </label>

                         <input type="text" name="meta_keywords" @if($id) value="{{$data->meta_keywords}}" @else value="{{old('meta_keywords')}}" @endif class="form-control"  maxlength="100" required>

                      </div>
                    </div>

                    <div class="col-md-12">

                      <div class="form-group"> <label for="form_meta_description"> Meta Description *  </label>

                        <input type="text" name="meta_description" @if($id) value="{{$data->meta_description}}" @else value="{{old('meta_description')}}" @endif class="form-control" maxlength="150" required>

                      </div>

                    </div>

                    <div class="clearfix"></div>

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

