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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-child-menu/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-child-menu')}}" enctype="multipart/form-data">

                @endif

                    @csrf



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Main Menu *</label>

                          <select name="menu_id" id="menu_id" class="form-control">

                              <option value="">Please Select</option>

                              @foreach($data1 as $X)

                              <option value="{{$X->id}}" @if($id) @if($X->id == $data->menu_id) selected @endif @endif>{{$X->name}}</option>

                              @endforeach

                          </select>



                         </div>

                    </div>


                    <div class="col-md-6"   >

                     <div class="form-group"><label> Sub Menu  </label> &nbsp;
                       <select  class="form-control" name="sub_id" id="countries"  >
                        <option value="" >Please Select</option>
                        </select>
                       </div>
                      </div>




                      <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Name *</label> <input id="form_name" type="text" name="name" @if($id) value="{{$data->name}}" @else value="{{old('name')}}" @endif class="form-control" placeholder="Please enter name *" required="required" > </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Name[Hindi] *</label> <input id="form_name" type="text" name="name_h" @if($id) value="{{$data->name_h}}" @else value="{{old('name_h')}}" @endif class="form-control" placeholder="Please enter name *"  > </div>

                    </div>








                  <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> URL   <input type="checkbox" value="yes" name="external" @if($data->external=='yes') checked @endif style="margin-left:50px;" id="checkbox"> &nbsp;External URL Link ?</label> <input  type="text" name="url" @if($id) value="{{$data->url}}"  @else value="{{old('url')}}" @endif class="form-control" id="url" placeholder="Please enter full url; example https://www.example.com " readonly> </div>

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


            $("#checkbox").on('change',function(){
                 if($("#checkbox").is(':checked')){
                    $("#url").prop('readonly', false);
                 }
                 else{
                    $("#url").prop('readonly', true);
                 }
            });

        </script>


 <script>

     $( document ).ready(function() {
        $("#menu_id").on('change',function(){
            var parentvalue=($("#menu_id").val());
                $.ajaxSetup({
                    headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                      });

               $.ajax({
               url: "{{url('/Accounts/submenushow')}}",
               type: "get",
               data: {id:parentvalue},
               success: function(data){

               var resdata= data.data;
                   console.log(resdata);
               var formoption = "<option value='0'>Please select</option>";
                for(i=0; i<resdata.length; i++)
                {
                formoption += "<option value='"+resdata[i].id+"'>"+resdata[i].name+"</option>";
                }
                $('#countries').html(formoption);
               }
           });
        });
     });


   </script>

@endsection
