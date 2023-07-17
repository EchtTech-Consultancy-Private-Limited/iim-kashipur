@extends('admin.Layout.master')



@section('title', 'Update video gallery page')



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







                <form class="forms-sample row col-md-12" method="POST" action="{{url('/Accounts/update_videopost/'.dEncrypt($value->id))}}"  enctype="multipart/form-data">

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

                <label for="inputText" class="col-sm-2 col-form-label">Banner Photo</label>

                  <div class="col-sm-10">

                  <input type="file" class="form-control" name="bannerimage" placeholder="Please browse banner image" ><br>



                  @if(isset($value->banner_image))

                  <img src="{{ asset('video/banner/'.$value->banner_image)}}" width="150" height="100"/>

                   @else

                 <img src="public/banner.png" />

                  @endif

                  <input type="hidden" class="form-control" name="bannernameold" value="{{$value->banner_image}}" ><br>

                  </div>

                </div>





                <div class="col-md-12">

                <label for="inputText" class="col-sm-2 col-form-label">Photo title text</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control"name="banner_title" placeholder="Please enter text for title of banner photo, use for seo" value="{{$value->	banner_title}}">

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

                  <img src="{{ asset('video/image/'.$value->cover_image)}}" width="150" height="100"/>

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

                <label for="inputText" class="col-sm-2 col-form-label">PDF File</label>

                  <div class="col-sm-10">

                  <input type="file" class="form-control" name="pdf" placeholder="Please browse PDF file" ><br>

                    <input type="hidden" class="form-control" name="pdfnameold" value="{{$value->file_download}}" ><br>



                    <a   href="{{url('video/pdf/'.$value->file_download)}}" download>

                    <img src="{{ asset('video/pdf/viewpdf.jpg') }}"  width="170" height="70">

                    </a>



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



                <input type="hidden" class="form-control" name="url"  value="video-section"><br>







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





<!-- multiple image table code -->



        <div class="row">



<div class="col-md-12 grid-margin stretch-card">



  <div class="card">



    <div class="card-body">



      <div class="top-menu-button">



      <p class="card-title">Gallery Photos List</p>



      <div>

</div>





<!-- insert data on  MODAL   -->



<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Multipel video upload</button>





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel"> Video upload</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

              <form role="form" action="{{ ('/Accounts/multivideopost')}}" method="post" class="registration-form" enctype="multipart/form-data">

                      @csrf

                          <div class="form-group">

	                        	<input type="hidden" name="gallery_id" placeholder="Enter your Gallery Tabel ID" class="form-first-name form-control" id="form-first-name" value="{{$value->id}}"  readonly>

	                        </div>



                          <div class="form-group">

                          <label  for="form-first-name">video photo</label>

                          <input type="file" class="form-control" name="video_image"  >

                          </div>





	                    	<div class="form-group">

	                    		<label  for="form-first-name">Video Url</label>

	                        	<input type="text" name="url" placeholder="Enter your Image" class="form-first-name form-control" id="form-first-name">

	                        </div>

	                        <div class="form-group">

	                        	<label  for="form-last-name">Video Title Text</label>

	                        	<input type="text" name="video_text" placeholder="Enter your Image Text" class="form-last-name form-control" id="form-last-name">

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



                          <button type="submit" class="btn btn-primary"  class="form-control" >Save</button>

	                    </form>

      </div>

    </div>

  </div>

</div>







      </div>







      <div class="row">



        <div class="col-12">



          <div class="table-responsive">



            <table id="example" class="display expandable-table" style="width:100%">



              <thead>



                <tr>



                  <th>S.No#</th>

                  <th>vidoe_gallery_id</th>

                  <th>Video url</th>

                  <th>Video Text</th>

                  <th>sort_order</th>

                  <th>status</th>

                 <th>Action </th>



                </tr>



              </thead>

              @foreach($data as $value)



              <tr>



              <td>{{$value->id}}</td>

              <td>{{$value->gallery_id}}</td>

             <td>{{$value->video_url}}</td>

               <td>{{$value->video_title}}</td>

              <td>{{$value->sort_order}}</td>

              <td><span class="badge bg-success text-light">{{$value->status}}</span></td></td>

              <td>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" id="{{$value->id}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></button>

            <!--    <a href="/Accounts/multiupdtePage/{{$value->id}}" onclick="return confirm('Are you sure to edit this record?')"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a> -->

                <a href="{{ url('/Accounts/delete_vidoemultiplegallery/'.$value->id)}}"  class="btn btn-primary" onclick="return confirm('Are you sure to edit this record?')"><i class="ti-trash btn-icon-append" style="color:black;"></i></a>

               </td> &nbsp;







             </tr>



            @endforeach



              <tbody>



              </tbody>



          </table>













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

        <form  action="mmm"  method= "post" enctype="multipart/form-data">

          @csrf



          <div class="form-group">

        	<input type="text" name="gallery_id" placeholder="Enter your Gallery Tabel ID" class="form-first-name form-control" id="galleryid1" readonly>

          </div>



          <div class="form-group">

          <label  for="form-first-name">Video Url</label>

	        <input type="text" name="url" placeholder="Enter your Image" class="form-first-name form-control" id="videourl1">



        </div>



          <div class="form-group">

          <label  for="form-last-name">video Text</label>

	        <input type="text" name="video_text" placeholder="Enter your Image Text" class="form-last-name form-control" id="videotext1" >

         </div>



         <div class="form-group">

          <label  for="form-email">sort order</label>

	        <input type="text" placeholder="pls enter sort order" name="order" class="form-email form-control" id="videoorder1" >

        </div>



          <div class="form-group">

          <label  for="form-email">status</label>

	        <select   class="form-control" aria-label="Default select example" name="status"  id="videostatus1" ><br>

          <option selected>Please select status</option>

          <option value="1"  >Active</option>

          <option value="0">Inactive</option>

          </select>

        </div>

        <button type="submit" class="btn btn-primary"  class="form-control" >Save</button>

      </div>

      <div class="modal-footer">



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



   console.log(action.parentElement.parentElement.childNodes);



     var imageid1=action.parentElement.parentElement.childNodes[1].innerHTML;





     var galleryid=action.parentElement.parentElement.childNodes[3].innerHTML;



     var imagePhoto112= action.parentElement.parentElement.childNodes[5].innerHTML;



     var imagePhoto113= action.parentElement.parentElement.childNodes[7].innerHTML;



     var imagePhoto114= action.parentElement.parentElement.childNodes[9].innerHTML;



     var imagePhoto115= action.parentElement.parentElement.childNodes[11].childNodes[0].innerHTML;







   document.getElementById('galleryid1').value=galleryid;

   document.getElementById('videourl1').value=imagePhoto112;

   document.getElementById('videotext1').value=imagePhoto113;

   document.getElementById('videoorder1').value=imagePhoto114;

   document.getElementById('videostatus1').value=imagePhoto115;



   var mmm=document.getElementById('videotext1').parentElement.parentElement.action="{{ url('/Accounts/updatemultivideopost/') }}"+imageid1;



   console.log(mmm);



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





