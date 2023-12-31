@extends('admin.Layout.master')

@section('title', ' update Content Page')

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">

          

          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">{{'Update Content Page'}}</h4>

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

                

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('/Accounts/update_blogpost')}}/{{$data->id}}"  enctype="multipart/form-data">
                    @csrf
                   
                    <div class="col-md-12">
                   <label for="inputText" class="col-sm-2 col-form-label">Page Title*</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name"  placeholder="Please enter content page title"  value="{{$data->name}}">
                </div>
                </div>
                
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">शीर्षक*</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="name_h" placeholder="Please enter content page title in hindi" value="{{$data->name_h}}">
                </div>
                </div>
                
                 
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Page Content</label>
                <div class="col-sm-10">
                      <textarea class="form-control" id="content" rows="4" name="content" placeholder="Please enter content">{{$data->content}}</textarea>
                </div>
                </div>
            
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">विवरण</label>
                <div class="col-sm-10">
                      <textarea class="form-control" id="content_h" rows="4"  name="content_h" placeholder="Please enter content in hindi">{{$data->content_h}}</textarea>
                </div>
                </div>

                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Meta Tittle</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tittle" placeholder="Please enter meta tittle, use for seo" value="{{$data->meta_title}}">
                </div>
                </div>

                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Meta Keywords</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="keyword"  placeholder="Please enter meta keywords, use for seo" value="{{$data->meta_keywords}}">
                </div>
                </div>

                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Meta Description</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" id="keyword" rows="4" name="description" placeholder="Please enter meta description, use for seo" >{{$data->meta_description}}</textarea><br>
                 
                </div>
                </div>

                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">PDF File</label>
                  <div class="col-sm-10">
                  <input type="file" class="form-control" name="pdf" placeholder="Please browse PDF file" ><br>
                    <a href="{{ asset('pdf/'.$data->file_download) }}">PDF</a>
                    <input type="hidden" class="form-control" name="pdfnameold" value="{{$data->file_download}}" ><br>
                      
                    <a   href="{{url('page/pdf/'.$data->file_download)}}" download>
                    <img src="{{ asset('admin/images/viewpdf.jpg') }}"  width="170" height="70">
                    </a>
                  </div>
                </div>

                
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Banner Photo</label>
                  <div class="col-sm-10">
                  <input type="file" class="form-control" name="bannerimage" placeholder="Please browse banner image" ><br>
               
                  @if(isset($data->banner_image))
                  <img src="{{ asset('blog/banner/'.$data->banner_image)}}" width="150" height="100"/>
                   @else
                 <img src="public/banner.png" />
                  @endif
                  <input type="hidden" class="form-control" name="bannernameold" value="{{$data->banner_image}}" ><br>
                  </div>
                </div>
                

                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Photo title text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="banner_title" placeholder="Please enter text for title of banner photo, use for seo" value="{{$data->banner_title}}">
                </div>
                </div>
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Photo alt text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="banner_alt" placeholder="Please enter text for alt of banner photo, use for seo" value="{{$data->banner_alt}}">
                </div>
                </div>

                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Content Photo</label>
                  <div class="col-sm-10">
                  <input type="file" class="form-control" name="imagename"  placeholder="Please browse content image"><br>
                  @if(isset($data->cover_image))
                  <img src="{{ asset('blog/image/'.$data->cover_image)}}" width="150" height="100"/>
                   @else
                 <img src="photo-path/default.png" />
                  @endif
                  <input type="hidden" class="form-control" name="imagenameold" value="{{$data->cover_image}}" ><br>
                  
                </div>
                </div>
              
              
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Photo title text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="cover_title"  placeholder="Please enter text for title of content photo, use for seo" value="{{$data->cover_title}}">
                </div>
                </div>
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Photo alt text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"name="cover_alt"  placeholder="Please enter text for title of content photo, use for seo"  value="{{$data->cover_alt}}">
                </div>
                </div>
            
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label">Sort Order</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="sort_order" placeholder="Please enter sorting position number" value="{{$data->sort_order}}">
                </div>
                </div>

                
                <div class="col-md-12">
                <label for="inputText" class="col-sm-2 col-form-label" >Status</label>
                  <div class="col-sm-10">
                  <select   class="form-control" aria-label="Default select example" name="status">
                  <option selected>Please select status</option>
                  <option value="1" {{$data->status==1?'selected':''}}>Active</option>
                  <option value="0" {{$data->status==0?'selected':''}}>Inactive</option>
                  <option value="1" {{$data->status==1?'selected':''}}>Active</option>
                  <option value="0" {{$data->status==0?'selected':''}}>Inactive</option>
                 </select>
                </div>
                </div>

                <input type="hidden" class="form-control" name="id"  value="{{$data->id}}">
                

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