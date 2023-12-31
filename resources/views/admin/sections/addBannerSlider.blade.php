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

                  <form class="forms-sample row col-md-12" method="POST" id="regForm" action="{{url('Accounts/add-edit-banner/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" id="regForm"    action="{{url('Accounts/add-edit-banner')}}" enctype="multipart/form-data">

                @endif

                    @csrf



                     {{-- <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> Type*</label>

                            <select name="type" class="form-control">

                                <option value="">Please Select</option>

                                @foreach(GetOptionsByName('Banner/Sliders') as $D)

                                    <option value="{{$D->option}}" id="type" @if($id) @if($D->option == $data->type) selected @endif @endif>{{$D->option}}</option>

                                @endforeach

                            </select>

                            <label for="type"  id="type-error" class="error">
                                @error('type')
                                    {{ $message }}
                                @enderror
                            </label>

                        </div>

                    </div> --}}

                    <input  type="hidden" name="type"  value="Banners" >

                      <div class="col-md-6">

                        <div class="form-group"> <label for="title">Title*</label> <input id="title" type="text" name="title" @if($id) value="{{$data->title}}" @else value="{{old('title')}}" @endif class="form-control" placeholder="Please enter title *" required="required" >


                            <label for="title"  id="title-error" class="error">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </label>



                        </div>

                    </div>




                    <div class="col-md-6">

                      <div class="form-group"> <label for="title_h">Title[Hindi]*</label> <input id="title_h" type="text" name="title_h" @if($id) value="{{$data->title_h}}" @else value="{{old('title_h')}}" @endif class="form-control" placeholder="Please enter title *" required="required" >



                        <label for="title_h"  id="title_h-error" class="error">
                            @error('title_h')
                                {{ $message }}
                            @enderror
                        </label>



                    </div>

                  </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="heading1">Heading</label> <input id="heading1" type="text" name="heading1" @if($id) value="{{$data->heading1}}" @else value="{{old('heading1')}}" @endif class="form-control" placeholder="Please enter name in hindi *"  >



                            <label for="heading1"  id="heading1-error" class="error">
                                @error('heading1')
                                    {{ $message }}
                                @enderror
                            </label>




                        </div>

                    </div>




                    <div class="col-md-6">

                      <div class="form-group"> <label for="heading1_h">Heading[Hindi]</label> <input id="heading1_h" type="text" name="heading1_h" @if($id) value="{{$data->heading1_h}}" @else value="{{old('heading1_h')}}" @endif class="form-control" placeholder="Please enter name in hindi *"  >

                        <label for="heading1_h"  id="heading1_h-error" class="error">
                            @error('heading1_h')
                                {{ $message }}
                            @enderror
                        </label>


                    </div>

                  </div>




                    <div class="col-md-6">

                    <div class="form-group"> <label for="sort_note"> Short Description</label> <input id="sort_note" type="text" name="sort_note" @if($id) value="{{$data->short}}" @else value="{{old('short')}}" @endif class="form-control" placeholder="Please enter short description in hindi "  >


                        <label for="sort_note"  id="sort_note-error" class="error">
                            @error('sort_note')
                                {{ $message }}
                            @enderror
                        </label>



                    </div>

                    </div>



                    <div class="col-md-6">

                      <div class="form-group"> <label for="short_h"> Short Description[hindi]</label> <input id="short_h" type="text" name="short_h" @if($id) value="{{$data->short_h}}" @else value="{{old('short_h')}}" @endif class="form-control" placeholder="Please enter short description in hindi "  >


                        <label for="short_h"  id="short_h-error" class="error">
                            @error('short_h')
                                {{ $message }}
                            @enderror
                        </label>




                    </div>

                      </div>




                      {{-- <div class="col-md-6">

                      <div class="form-group"> <label for="form_name"> Video URl </label> <input id="form_name" type="text" name="video_url" @if($id) value="{{$data->video_url}}" @else value="{{old('video_url')}}" @endif class="form-control" placeholder="Please enter short description in hindi "  > </div>

                      </div> --}}



                      {{-- <div class="col-md-6"  >

                        <div class="form-group"> <label for="form_name">Banner URL   <input type="checkbox" value="yes" name="external" @if($data->external=='yes') checked @endif style="margin-left:50px;" id="checkbox"> &nbsp;External URL Link ?</label>
                            <input  type="text" name="url1" @if($id) value="{{$data->url}}"  @else value="{{old('url1')}}" @endif class="form-control" id="url_ext" placeholder="Please enter full url; example https://www.example.com " @if($data->external=='yes') style="display:block;" @else style="display:none;" @endif>

                            <select name="url" id="url" class="form-control"  @if($data->external=='yes') style="display:none;" @else style="display:block;" @endif>
                                <option value="">Please Select</option>
                                <option value="{{ ('/') }}" @if($id) @if($data->url == url('/')) selected @endif @endif> No URL</option>
                                @foreach($data2 as $D)
                                <option value="{{$D->url}}" @if($id) @if($D->url == $data->url) selected @endif @endif>{{$D->url}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div> --}}


                   <div class="col-md-12"  >
                        <div class="form-group"> <label for="form_name">

                            <input type="radio" value="yes" name="external"  @if($id) {{ ($data->external=="yes")? "checked" : "" }}  @endif style="margin-left:50px;" id="checkbox"> &nbsp;External URL  </label>

                            <input type="radio" value="no" name="external"  @if($id) {{ ($data->external=="no")? "checked" : "" }} @endif  style="margin-left:50px;" id="checkboxs"> &nbsp;Internal URL </label>


                            <input  type="text" name="url1" @if($id) value="{{$data->url}}"  @else value="{{old('url1')}}" @endif class="form-control" id="url_ext" placeholder="Please enter full url; example https://www.example.com ">




                        </div>

                    </div>

                    {{-- <div class="col-md-6"   >

                        <div class="form-group"><label> Link Option  </label> &nbsp;

                          <select  class="form-control" name="link" id="countries"  >

                            <option   value="" >Please Select</option>

                          </select>

                        </div>

                         </div> --}}



                     <div class="col-md-6">

                            <div class="form-group"> <label for="form_name"> Image* [Width:1920px,Height:500px]</label>
                            <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span>
                            <input id="form_name" type="file" name="image" @if($id) value="{{$data->image}}" @endif class="form-control" > </div>

                    </div>



                       <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Banner Title</label> <input id="form_name" type="text" name="banner_title" @if($id) value="{{$data->banner_title}}" @else value="{{old('banner_title')}}" @endif class="form-control" placeholder="Please enter banner title "  > </div>

                        </div>



                           <div class="col-md-6">

                            <div class="form-group"> <label for="form_name">Banner Alt</label> <input id="form_name" type="text" name="banner_Alt" @if($id) value="{{$data->banner_Alt}}" @else value="{{old('banner_Alt')}}" @endif class="form-control" placeholder="Please enter banner Alt "  > </div>

                            </div>


                        <div class="col-md-6">

                            <div class="form-group"> <label for="form_name">Sort order</label> <input id="Short_order" type="number" name="Short_order" @if($id) value="{{$data->Short_order}}" @else value="{{old('Short_order')}}" @endif class="form-control" placeholder="Please enter Sort order"  required> </div>

                        </div>


                 <input type="hidden" @if($id) value="{{ $data->status }}" @else value="0" @endif  name="status" >



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




       <!-- content-wrapper ends -->

       <script type="text/javascript">

        $("#select_box").on('click',function(){
            $('#tpl_id').attr('required','True');
            $('#countries').attr('required','True');
            $('#url').attr('required','Ture');

        });

    </script>

    <script type="text/javascript">

        $("#checkbox").on('click',function(){

        $('#tpl_id').removeAttr('required');
        $('#countries').removeAttr('required');
        $('#url').removeAttr('required');


        $('#countries').empty();

        });

    </script>

    <script type="text/javascript">

        $("#checkboxs").on('click',function(){

            $('#tpl_id').removeAttr('required');
            $('#url').removeAttr('required');

            $('#countries').empty();
            $('#countries').removeAttr('required');

        });

    </script>



<s>








{{-- onload content page show --}}
<script>
$( document ).ready(function() {

          $.ajaxSetup({
         headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
         });
         var data1=$("#url").val();
         $('#countries').html("<option selected  value=''>Select option blank</option>");
        if(data1=='content-page')
      {
       $.ajax({
      url: "{{url('/Accounts/dropdown')}}",
      type: "get",
      success: function(data){

       var resdata= data.data;
       console.log(resdata);

       var formoption = "<option selected  value='0'>Please select</option>";
       for(i=0; i<resdata.length; i++)
       {
         if('{{$data->link_option}}'==resdata[i].id){
         formoption += "<option value='"+resdata[i].id+"' selected>"+resdata[i].name+"</option>";
        } else {
         formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
        }
       }
       $('#countries').html(formoption);

     }

});
}
});
</script>


{{-- image section lonload  --}}


<script >
$( document ).ready(function() {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
  });

  var data3=$("#url").val();



  if(data3=='photo-gallery')
  {

  $.ajax({
    url: "{{url('Accounts/photodata')}}",
    type: "get",
    success: function(data){

     console.log(data);
     var resdata = data.data;

     console.log(resdata);

   var formoption = "<option value='0'>Please select</option>";
   for(i=0; i<resdata.length; i++)
   {
//    formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";

        if('{{$data->link_option}}'==resdata[i].id){
         formoption += "<option value='"+resdata[i].id+"' selected>"+resdata[i].name+"</option>";
        } else {
         formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
        }


    }
    $('#countries').html(formoption);

    }
 });
}
});
</script>


{{-- video section onload  --}}

<script >
$( document ).ready(function() {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
  });

  var data2=$("#url").val();



  if(data2=='video-gallery')
  {

  $.ajax({
    url: "{{url('Accounts/videodata')}}",
    type: "get",
    success: function(data){

     console.log(data);
     var resdata= data.data;

   var formoption = "<option value='0'>Please select</option>";
   for(i=0; i<resdata.length; i++)
   {
//    formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
    if('{{$data->link_option}}'==resdata[i].id){
     formoption += "<option value='"+resdata[i].id+"' selected>"+resdata[i].name+"</option>";
    } else {
     formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
    }
    }
    $('#countries').html(formoption);

    }
 });
}
});
</script>


<script type="text/javascript">

$("#select_box").on('change',function(){

    if($("#select_box").is(':checked')){

        $("#url").show();
        $("#url_ext").hide();
    }
    else{
        $("#url").hide();
        $("#url_ext").show();
    }
});

</script>

<script type="text/javascript">
$("#hide_url").on('change',function(){

var section_id= $('#hide_url option:selected').text()
// alert(section_id)
$('#section').val(section_id)
});
</script>


<script type="text/javascript">
$( document ).ready(function() {

    var section_id= $('#hide_url option:selected').text()
// alert(section_id)
    $('#section').val(section_id)
});
</script>


<script type="text/javascript">
    $("#checkbox").on('change',function(){
         if($("#checkbox").is(':checked')){
            $("#url").hide();
            $("#url_ext").show();
         }
         else{
            $("#url").show();
            $("#url_ext").hide();
         }
    });

</script>




<script type="text/javascript">

$("#checkboxs").on('change',function(){

   if($("#checkboxs").is(':checked')){
      $("#url").hide();
      $("#url_ext").show();
   }
   else{
      $("#url").show();
      $("#url_ext").hide();
   }
});

</script>






<!------------------------------- content page dropdown---------------------------------- -->


<script>

$("#url").on('change',function(){

      $.ajaxSetup({
     headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
     });
     var data1=$("#url").val();
     $('#countries').html("<option selected disabled value='0'>Please select</option>");
    if(data1=='content-page')
  {
   $.ajax({
  url: "{{url('/Accounts/dropdown')}}",
  type: "get",
  success: function(data){

   var resdata= data.data;

   var formoption = "<option selected  value='0'>Please select</option>";
   for(i=0; i<resdata.length; i++)
   {
     if('{{$data->link_option}}'==resdata[i].id){
     formoption += "<option value='"+resdata[i].id+"' selected>"+resdata[i].name+"</option>";
    } else {
     formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
    }
   }
   $('#countries').html(formoption);

 }

});
}
});

</script>

{{-- video section onload --}}

<script >
$("#url").change(function(e){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
  });

  var data2=$("#url").val();



  if(data2=='video-gallery')
  {

  $.ajax({
    url: "{{url('Accounts/videodata')}}",
    type: "get",
    success: function(data){

     console.log(data);
     var resdata= data.data;

   var formoption = "<option value='0'>Please select</option>";
   for(i=0; i<resdata.length; i++)
   {
   formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
    }
    $('#countries').html(formoption);

    }
 });
}
});
</script>

{{--  --}}


<!--------------------------------------- blog section -------------------------------------->
             <script >
                       $("#url").change(function(e){
                    $.ajaxSetup({
                     headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                         });

                         var data1=$("#url").val();



                         if(data1=='blog')
                         {

                         $.ajax({
                           url: "{{url('Accounts/blogdata')}}",
                           type: "get",
                           success: function(data){

                            console.log(data);
                            var resdata= data.data;

                          var formoption = "<option value='0'>Please select</option>";
                          for(i=0; i<resdata.length; i++)
                          {
                          formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
                           }
                           $('#countries').html(formoption);

                           }
                        });
                      }
                });
        </script>

<!--------------------------------------- video section -------------------------------------->

             <script >
                       $("#url").change(function(e){
                    $.ajaxSetup({
                     headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                         });

                         var data2=$("#url").val();



                         if(data2=='video-gallery')
                         {

                         $.ajax({
                           url: "{{url('Accounts/videodata')}}",
                           type: "get",
                           success: function(data){

                            console.log(data);
                            var resdata= data.data;

                          var formoption = "<option value='0'>Please select</option>";
                          for(i=0; i<resdata.length; i++)
                          {
                          formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
                           }
                           $('#countries').html(formoption);

                           }
                        });
                      }
                });
          </script>

<!--------------------------------------- photo section -------------------------------------->

               <script >
                       $("#url").change(function(e){
                    $.ajaxSetup({
                     headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                         });

                         var data3=$("#url").val();



                         if(data3=='photo-gallery')
                         {

                         $.ajax({
                           url: "{{url('Accounts/photodata')}}",
                           type: "get",
                           success: function(data){

                            console.log(data);
                            var resdata = data.data;

                            console.log(resdata);

                          var formoption = "<option value='0'>Please select</option>";
                          for(i=0; i<resdata.length; i++)
                          {
                          formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
                           }
                           $('#countries').html(formoption);

                           }
                        });
                      }
                });
        </script>


<script >
    $( document ).ready(function() {


         $.ajaxSetup({
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
         });

         var department=$("#url").val();

           if(department=='who-is-who')

          {

             $.ajax({
                  url: "{{url('/Accounts/Department_info')}}",
                  type: "get",
                 success: function(data){
                  var resdata= data.data;

                       var formoption = "<option value=''>Please select</option>";
                       for(i=0; i<resdata.length; i++)
                       {
                    //    formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].title+"</option>";

                    if('{{$data->link_option}}'==resdata[i].id){
                       formoption += "<option value='"+resdata[i].id+"' selected>"+resdata[i].title+"</option>";
                    } else {
                       formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].title+"</option>";
                    }

                        }
                        $('#countries').html(formoption);

                     }
                 });
               }
            });
        </script>

<script >
    $("#url").change(function(e){

         $.ajaxSetup({
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
         });

         var department=$("#url").val();

           if(department=='who-is-who')

          {

             $.ajax({
                  url: "{{url('/Accounts/Department_info')}}",
                  type: "get",
                 success: function(data){



                  var resdata= data.data;

                       var formoption = "<option value=''>Please select</option>";
                       for(i=0; i<resdata.length; i++)
                       {
                       formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].title+"</option>";
                        }
                        $('#countries').html(formoption);

                     }
                 });
               }
            });
        </script>


       @endsection
