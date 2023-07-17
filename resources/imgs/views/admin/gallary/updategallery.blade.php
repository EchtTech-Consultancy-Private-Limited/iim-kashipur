@extends('admin.Layout.master')



@section('title', 'Update gallery page')



@section('content')



      <div class="main-panel">



        <div class="content-wrapper">









          <div class="row">



           <div class="col-md-12 grid-margin stretch-card">



              <div class="card">



                <div class="card-body">



                  <h4 class="card-title">{{'update gallery  Page'}}</h4>

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









                <form class="forms-sample row col-md-12" method="POST" action="{{url('/Accounts/addaction_gallerypost/'.dEncrypt($value->id))}}"  enctype="multipart/form-data">

                    @csrf



                    <div class="col-md-12">

                   <label for="inputText" class="col-sm-2 col-form-label">Page Title*</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="name"  placeholder="Please enter content page title"  value="{{$value->name}}">

                </div>

                </div>



                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">शीर्षक*</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control"name="name_h" placeholder="Please enter content page title in hindi" value="{{$value->name_h}}">

                </div>

                </div>





                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Page Content</label>

                <div class="col-sm-10">

                      <textarea class="form-control" id="content" rows="4" name="content" placeholder="Please enter content">{{$value->content}}</textarea>

                </div>

                </div>



                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">विवरण</label>

                <div class="col-sm-10">

                      <textarea class="form-control" id="content_h" rows="4"  name="content_h" placeholder="Please enter content in hindi">{{$value->content_h}}</textarea>

                </div>

                </div>



                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Meta Tittle</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="tittle" placeholder="Please enter meta tittle, use for seo" value="{{$value->meta_title}}">

                </div>

                </div>



                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Meta Keywords</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="keyword"  placeholder="Please enter meta keywords, use for seo" value="{{$value->meta_keywords}}">

                </div>

                </div>



                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Meta Description</label>

                  <div class="col-sm-10">

                  <textarea class="form-control" id="keyword" rows="4" name="description" placeholder="Please enter meta description, use for seo" >{{$value->meta_description}}</textarea><br>

                </div>

                </div>



                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">PDF File</label>

                  <div class="col-sm-10">

                  <input type="file" class="form-control" name="pdf" placeholder="Please browse PDF file" ><br>

                    <input type="hidden" class="form-control" name="pdfnameold" value="{{$value->file_download}}" ><br>



                    <a   href="{{url('gallery/pdf/'.$value->file_download)}}" download>

                    <img src="{{ asset('admin/images/viewpdf.jpg') }}"  width="170" height="70">

                    </a>

                  </div>

                </div>





                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Banner Photo</label>

                  <div class="col-sm-10">

                  <input type="file" class="form-control" name="bannerimage" placeholder="Please browse banner image" ><br>



                  @if(isset($value->banner_image))

                  <img src="{{ asset('gallery/banner/'.$value->banner_image)}}" width="150" height="100"/>

                   @else

                 <img src="public/banner.png" />

                  @endif

                  <input type="hidden" class="form-control" name="bannernameold" value="{{$value->banner_image}}" ><br>

                  </div>

                </div>





                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Photo title text</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control"name="banner_title" placeholder="Please enter text for title of banner photo, use for seo" value="{{$value->banner_title}}">

                </div>

                </div>

                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Photo alt text</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control"name="banner_alt" placeholder="Please enter text for alt of banner photo, use for seo" value="{{$value->banner_alt}}">

                </div>

                </div>



                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Content Photo</label>

                  <div class="col-sm-10">

                  <input type="file" class="form-control" name="imagename"  placeholder="Please browse content image"><br>

                  @if(isset($value->cover_image))

                  <img src="{{ asset('gallery/image/'.$value->cover_image)}}" width="150" height="100"/>

                   @else

                 <img src="photo-path/default.png" />

                  @endif

                  <input type="hidden" class="form-control" name="imagenameold" value="{{$value->cover_image}}" ><br>



                </div>

                </div>



                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Photo title text</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control"name="cover_title"  placeholder="Please enter text for title of content photo, use for seo" value="{{$value->cover_title}}">

                </div>

                </div>

                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Photo alt text</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control"name="cover_alt"  placeholder="Please enter text for title of content photo, use for seo"  value="{{$value->cover_alt}}">

                </div>

                </div>











                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Sort Order</label>

                  <div class="col-sm-10">

                  <input type="text" class="form-control" name="sort_order" placeholder="Please enter sorting position number" value="{{$value->sort_order}}">

                </div>

                </div>





                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label" >Status</label>

                  <div class="col-sm-10">

                  <select   class="form-control" aria-label="Default select example" name="status">

                  <option selected>Please select status</option>

                  <option value="1" {{$value->status==1?'selected':''}}>Active</option>

                  <option value="0" {{$value->status==0?'selected':''}}>Inactive</option>

                 </select>

                </div>

                </div>



                <div class="col-md-12">

               <!-- <label for="inputText" class="col-sm-2 col-form-label">Slug</label>-->

                  <div class="col-sm-10">

                  <input type="hidden" class="form-control" name="slug" placeholder="Please enter slug" value="{{ $value->slug}}"><br>



                </div>

                </div>







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





             </form><hr>









<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Multi Image Upload</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">New message</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

      <form role="form" action="{{ url('/Accounts/multimagePost')}}" method="post" class="registration-form" enctype="multipart/form-data" >

                      @csrf

                      <div class="form-group">



	                        	<input type="hidden" name="gallery_id" placeholder="Enter your Gallery Tabel ID" class="form-first-name form-control" id="form-first-name" value="{{$value->id}}"  readonly>

	                        </div>



	                    	<div class="form-group">

	                    		<label  for="form-first-name">Multiple Image</label>

	                        	<input type="file" name="filename" placeholder="Enter your Image" class="form-first-name form-control" id="form-first-name">

	                        </div>





	                        <div class="form-group">

	                        	<label  for="form-last-name">Image Text</label>

	                        	<input type="text" name="image_text" placeholder="Enter your Image Text" class="form-last-name form-control" id="form-last-name">

	                        </div>

	                        <div class="form-group">

	                        	<label  for="form-email">Image Alt</label>

	                        	<input type="text" name="image_alt" placeholder="Enter your image Alt" class="form-email form-control" id="form-email">

	                        </div>

                          <div class="form-group">

	                        	<label  for="form-email">sort order</label>

	                        	<input type="text" name="order" placeholder="pls enter sort order" class="form-email form-control" id="form-email">

	                        </div>



                          <div class="form-group">

	                        	<label  for="form-email">status</label>

	                        	<select   class="form-control" aria-label="Default select example" name="status" ><br>

                            <option selected>Please select status</option>

                            <option value="1">Active</option>

                            <option value="0">Inactive</option>

                           </select>

	                        </div>



                          <button type="submit" class="btn btn-primary" id="savebtn"  class="form-control" >Save</button>

	                    </form>



      </div>



    </div>

  </div>

</div>















<!-- multiple image table code -->







      <div class="row">



        <div class="col-12">



          <div class="table-responsive">



            <table id="example" class="display expandable-table" style="width:100%">



              <thead>



                <tr>



                  <th>S.No#</th>

                  <th>Gallery Id</th>

                  <th>Images</th>

                  <th>Image Text</th>

                  <th>Image Alt</th>

                  <th></th>

                  <th>Sort Order</th>

                  <th>Status</th>



                <th>Action </th>



                </tr>



              </thead>

              @foreach($data as $value)





              <tr>



              <td>{{$value->id}}</td>

              <td>{{$value->gallery_id}}</td>

              <td><img src="{{ asset('gallery/multipimage/'.$value->	large_image) }}" alt="" title="" style="height: 100px;  width: 100px;"></td>

              <td>{{$value->image_alt}}</td>

              <td>{{$value->image_title}}</td>

              <td></td>

              <td>{{$value->sort_order}}</td>

              <td><span class="badge bg-success text-light">{{$value->status}}</span></td></td>

              <td>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalupdate" data-whatever="@getbootstrap" id="{{$value->id}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></button>

               <a  class="btn btn-primary" href="{{url('/Accounts/multdelete_image/'.$value->id)}}" onclick="return confirm('Are you sure to edit this record?')"><i class="ti-trash btn-icon-append" style="color:black;"></i></a>







              </td> &nbsp;







             </tr>



            @endforeach



              <tbody>



              </tbody>



          </table>









<div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Updae Multiple image</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form  action="mmm"  method= "post">

          @csrf



          <div class="form-group">

        	<input type="hidden" name="gallery_id" placeholder="Enter your Gallery Tabel ID" class="form-first-name form-control" id="galleryid1" readonly>

          </div>



          <div class="form-group">

          <label  for="form-first-name">Multiple Image</label>

	        <input type="file" name="filename" placeholder="Enter your Image" class="form-first-name form-control" id="form-first-name">

          <img src="" alt="" title="" style="height: 100px;  width: 100px;" id="imageid">



          <input type="hidden" class="form-control" name="multioldimage" id="imageoldid"  ><br>



        </div>



          <div class="form-group">

          <label  for="form-last-name">Image Text</label>

	        <input type="text" name="image_text" placeholder="Enter your Image Text" class="form-last-name form-control" id="imagetext" >

         </div>



         <div class="form-group">

          <label  for="form-email">Image Alt</label>

	        <input type="text" name="image_alt" placeholder="Enter your image Alt" class="form-email form-control" id="imagealt" >

        </div>



         <div class="form-group">

          <label  for="form-email">sort order</label>

	        <input type="text" placeholder="pls enter sort order" name="order" class="form-email form-control" id="imagesort" >

        </div>



          <div class="form-group">

          <label  for="form-email">status</label>

	        <select   class="form-control" aria-label="Default select example" name="status"  id="imagestatus" ><br>

          <option selected>Please select status</option>

          <option value="1"  >Active</option>

          <option value="0">Inactive</option>

          </select>

        </div>



      </div>

      <div class="modal-footer">

      <button type="submit" class="btn btn-primary"  class="form-control"  id="savebtn">Save</button>

      </div>

      </form>

    </div>

  </div>

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

  function modal(e){

   var data= e.target.id;

   var action=document.getElementById(data);



     var galleryid=action.parentElement.parentElement.childNodes[3].innerHTML;



     var imageid=action.parentElement.parentElement.childNodes[1].innerHTML;



     var imagePhoto11= action.parentElement.parentElement.childNodes[5].childNodes[0].src;



     var imagetext11=action.parentElement.parentElement.childNodes[7].innerHTML;



     var imagealt11= action.parentElement.parentElement.childNodes[9].innerHTML;



     var imagesort11= action.parentElement.parentElement.childNodes[13].innerHTML;



     var imagestatus11=action.parentElement.parentElement.childNodes[15].childNodes[0].innerHTML;



     document.getElementById('imageid').src=imagePhoto11;



     document.getElementById('imageoldid').value=(imagePhoto11.slice(42,58));











   document.getElementById('imagetext').value=imagetext11;

   document.getElementById('imagealt').value=imagealt11;

   document.getElementById('imagesort').value=imagesort11;

   document.getElementById('imagestatus').value=imagestatus11;

   document.getElementById('galleryid1').value=galleryid



   var mmm=document.getElementById('imagetext').parentElement.parentElement.action="{{url('/Accounts/multiupdtePagepost/')}}"+imageid;







  }



  var buttons=document.getElementsByTagName('button');

  for(button of buttons){

    button.addEventListener("click",modal);

  }



CKEDITOR.replace('content');



CKEDITOR.replace('content_h');



</script>



<script>

   function loadPreview(input){

       var data = $(input)[0].files; //this file data

       $.each(data, function(index, file){

           if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){

               var fRead = new FileReader();

               fRead.onload = (function(file){

                   return function(e) {

                       var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image thumb element

                       $('#thumb-output').append(img);

                   };

               })(file);

               fRead.readAsDataURL(file);

           }

       });

   }

</script><br>

        <!-- content-wrapper ends -->



   @endsection













