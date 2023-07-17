@extends('admin.Layout.master')

@section('title', 'Add Blog Page')

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">

          

          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">{{'Add Blog Page'}}</h4>
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

                  
                

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('/Accounts/add_blog')}}"  enctype="multipart/form-data">
                    @csrf
                   
                    <div class="col-md-12">
                   <label for="inputText" class="col-sm-2 col-form-label">Page Title*</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Please enter content page title" value="{{ old('name') }}" ><br>
                
                                      @error('name')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                  </div>
                </div>
                                   
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">शीर्षक*</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="name_h" placeholder="Please enter content page title in hindi" value="{{ old('name_h') }}"><br>
                 
                                     @error('name_h')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                  </div>
                </div>
                              
                 
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Page Content</label>
                <div class="col-sm-10">
                      <textarea class="form-control" id="content" rows="4" name="content" placeholder="Please enter content" >{{ old('content') }}</textarea><br>
                                      @error('content')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                    </div>
                </div>
                                   
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">विवरण</label>
                <div class="col-sm-10">
                      <textarea class="form-control" id="content_h" rows="4"  name="content_h" placeholder="Please enter content in hindi">{{ old('content_h') }}</textarea><br>
               
                                      @error('content_h')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
               
                    </div>
                </div>
                                    
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Meta Tittle</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tittle" placeholder="Please enter meta tittle, use for seo" value="{{ old('tittle') }}"><br>
               
               
                <div class="col-md-12">
                  </div>
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">Meta Keywords</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="keyword" rows="4" name="keyword" placeholder="Please enter meta keywords, use for seo" >{{ old('keyword')}}</textarea><br>
                
                
                
                  </div>
                </div>
                                    
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Meta Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="keyword" rows="4" name="description" placeholder="Please enter meta description, use for seo" >{{ old('description')}}</textarea><br>
              
                                    
                  </div>
                </div>


                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Content Photo</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="imagename"  placeholder="Please browse content image"><br>
               
                                     @error('imagename')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                  </div>
                </div>
                                 
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Photo title text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="cover_title"  placeholder="Please enter text for title of content photo, use for seo" value="{{ old('cover_title') }}"><br>

                                      @error('cover_title')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                
                  </div>
                </div>

                                 
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Photo alt text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="cover_alt"  placeholder="Please enter text for title of content photo, use for seo" value="{{ old('cover_alt') }}"><br>

                                     @error('cover_alt')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
              
                  </div>
                </div>



                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Banner Photo</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="bannerimage" placeholder="Please browse banner image" accept=".jpeg,.jpg,.gif,.png"><br>

               
                                     @error('bannerimage')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
               
               
                  </div>
                </div>   
                 
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Photo title text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="banner_title"  placeholder="Please enter text for title of banner photo, use for seo" value="{{ old('banner_title') }}"><br>
               
                                     @error('banner_title')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
               
                  </div>
                </div>

                                   
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Photo alt text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="banner_alt"  placeholder="Please enter text for alt of banner photo, use for seo" value="{{ old('banner_alt') }}"><br>

                                      @error('banner_alt')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
               
                  </div>
                </div>

              





                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">PDF File</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="pdf" placeholder="Please browse PDF file"  accept=".jpeg,.jpg,.gif,.png"><br>

                                      @error('pdf')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                
                
                  </div>
                </div>
                                    

                                  
              
                                  
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Sort Order*[numaric number only]</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="sort_order" placeholder="Please enter sorting position number" value="{{ old('sort_order') }}"><br>
              
                                       @error('sort_order')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                </div>
                </div>
                                    
                
                <div class="col-md-12">
                  <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                  <select   class="form-control" aria-label="Default select example" name="status" value="{{ old('status') }}"><br>
                  <option selected>Please select status</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                 </select>

                                 
                </div>
                </div>
                                    
                    <input type="hidden" class="form-control" name="parent_id" value="{{isset(request()->pid)?request()->pid:0}}">
              
               
                <div class="col-md-12">
                  <div class="col-sm-10">
                    &nbsp;
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary"  class="form-control" >Save</button>
                  </div>
                </div>
               

             </form>

                </div>

              </div>

            </div>

            </div>

        </div>
        <script type="text/javascript">

CKEDITOR.replace('content');

CKEDITOR.replace('content_h');

</script>
        <!-- content-wrapper ends -->

       @endsection
     