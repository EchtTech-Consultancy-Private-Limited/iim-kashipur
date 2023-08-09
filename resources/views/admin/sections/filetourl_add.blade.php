@extends('admin.Layout.master')

@section('title',$title)

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

                    <form class="forms-sample row col-md-12" method="POST" id="regForm" action="{{url('Accounts/add-edit-file2url/'.$id)}}" enctype="multipart/form-data">

                  @else


                  <form class="forms-sample row col-md-12" method="POST"  id="regForm"  action="{{url('Accounts/add-edit-file2url')}}" enctype="multipart/form-data">


                  @endif

                    @csrf



                    <div class="col-md-6">

                        <div class="form-group"> <label for="type">Type *</label>

                          <select name="type" class="form-control">

                              <option value="">Please Select</option>
                              <option value="Image" {{ ( 'Image' == $data->type) ? 'selected' : '' }}>Image File</option>

                          </select>

                          <label for="type"  id="type-error" class="error">
                            @error('type')
                             {{ $message }}
                            @enderror
                          </label>

                         </div>

                    </div>



                      <div class="col-md-6">

                        <div class="form-group"> <label for="title">Title *</label> <input id="title" type="text" name="title"   @if($id) value="{{$data->title}}" @else value="{{old('title')}}" @endif class="form-control" placeholder="Please enter title *" required="required" >




                    <label for="title"  id="title-error" class="error">
                        @error('title')
                         {{ $message }}
                        @enderror
                    </label>

                        </div>

                    </div>



                     <div class="col-md-6">

                            <div class="form-group">


                             <label for="file">File *</label> <input id="file" type="file" name="file" @if(!$id) required @endif class="form-control">

                             <span style="color:green;font-size:12px;"> @if($id) [{{$data->file}}] @endif</span>



                             <label for="file"  id="file-error" class="error">
                                @error('file')
                                 {{ $message }}
                                @enderror
                             </label>



                            </div>

                    </div>




                    <div class="col-md-6">

                      <div class="form-group"> <label for="url">External url *</label> <input id="url" type="url" name="url"  @if($id) value="{{$data->url}}" @else value="{{old('url')}}" @endif  value="{{old('url')}}" class="form-control" placeholder="Please enter url*" required="required" >



                        <label for="url"  id="url-error" class="error">
                            @error('url')
                             {{ $message }}
                            @enderror
                        </label>



                    </div>

                  </div>

                  <input type="hidden"  name="status"  @if($id)  value="{{ $data->status }}"   @else   value="0" @endif >


                    <div class="clearfix"></div>

                   <div class="col-md-12">

                    <button type="submit" class="btn btn-primary mr-2" onclick="load();">Submit</button>

                   </div>

                  </form>

                </div>

              </div>

            </div>

            </div>

        </div>



       @endsection
