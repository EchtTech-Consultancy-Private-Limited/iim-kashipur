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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/Add-Edit-site-setting/'.$id)}}" enctype="multipart/form-data">

              @else

                     <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/Add-Edit-site-setting/')}}" enctype="multipart/form-data">

              @endif

                    @csrf

                     



              

                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name">Page Type *</label> 

                                <select name="page_type" class="form-control" id="pt">

                                <option value="">Please Select</option>

                                    <option  @if($data->page_type=='Home') selected @endif> Home </option>

                                    <option  @if($data->page_type=='Others') selected @endif> Others </option>

                                </select>



                        </div>

                    </div>



                   

                    <div class="col-md-6 home" @if($data->page_type !='Home') style="display:none" @else style="display:block" @endif>

                        <div class="form-group"> <label for="form_name"> Header *</label> 

                            <select name="header" class="form-control">

                                <option value="">Please Select</option>                               

                                @foreach($header as $H)

                                    <option  value="{{$H->name}}" @if($data->header == $H->name) selected @endif>{{ $H->name}} </option>

                                @endforeach 

                                </select>

                         </div>

                    </div>



                    <div class="col-md-6 home" @if($data->page_type !='Home') style="display:none" @else style="display:block" @endif>

                        <div class="form-group"> <label for="form_name"> Footer *</label> 

                                                           

                                <select name="footer" class="form-control">

                                     <option value="">Please Select</option>

                                    @foreach($footer as $F)

                                    <option  value="{{$F->name}}" @if($data->footer== $F->name) selected @endif> {{$F->name}} </option>

                                   @endforeach

                                </select>

                         </div>

                    </div>



                     <div class="col-md-6 home" @if($data->page_type !='Home') style="display:none" @else style="display:block" @endif>

                        <div class="form-group"> <label for="form_name"> Section1 *</label> 

                             <select name="section1" class="form-control">

                                <option value="">Please Select</option> 

                                @foreach($slider as $S)

                                    <option  value="{{$S->name}}" @if($data->section1 == $S->name) selected @endif> {{$S->name}} </option>

                                @endforeach

                                </select>

                         </div>

                    </div>



                    <div class="col-md-6 home" @if($data->page_type !='Home') style="display:none" @else style="display:block" @endif>

                        <div class="form-group"> <label for="form_name"> Section2 *</label> 

                             <select name="section2" class="form-control">

                                <option value="">Please Select</option> 

                                @foreach($about as $S)

                                    <option  value="{{$S->name}}" @if($data->section2 == $S->name) selected @endif> {{$S->name}} </option>

                                @endforeach

                                </select>

                         </div>

                    </div>



                    <div class="col-md-6 home" @if($data->page_type !='Home') style="display:none" @else style="display:block" @endif>

                        <div class="form-group"> <label for="form_name"> Section3 *</label> 

                             <select name="section3" class="form-control">

                                <option value="">Please Select</option> 

                                @foreach($usp as $S)

                                    <option  value="{{$S->name}}" @if($data->section3 == $S->name) selected @endif> {{$S->name}} </option>

                                @endforeach

                                </select>

                         </div>

                    </div>



                     <div class="col-md-6 home" @if($data->page_type !='Home') style="display:none" @else style="display:block" @endif>

                        <div class="form-group"> <label for="form_name"> Section4 *</label> 

                             <select name="section4" class="form-control">

                                <option value="">Please Select</option> 

                                @foreach($upcom as $S)

                                    <option  value="{{$S->name}}" @if($data->section4 == $S->name) selected @endif> {{$S->name}} </option>

                                @endforeach

                                </select>

                         </div>

                    </div>





                    <div class="col-md-6 home" @if($data->page_type !='Home') style="display:none" @else style="display:block" @endif>

                        <div class="form-group"> <label for="form_name"> Section5 *</label> 

                             <select name="section5" class="form-control">

                                <option value="">Please Select</option> 

                                @foreach($gall as $S)

                                    <option  value="{{$S->name}}" @if($data->section5 == $S->name) selected @endif> {{$S->name}} </option>

                                @endforeach

                                </select>

                         </div>

                    </div>

                     



                   

                   <!--  <div class="col-md-6 home" @if($data->page_type !='Home') style="display:none" @else style="display:block" @endif>

                        <div class="form-group"> <label for="form_name"> Section6 *</label> 

                             <select name="section6" class="form-control">

                                <option value="">Please Select</option> 

                                @foreach($slider as $S)

                                    <option  value="{{$S->name}}" @if($data->section6 == $S->name) selected @endif> {{$S->name}} </option>

                                @endforeach

                                </select>

                         </div>

                    </div> -->

                     

              



                     

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

       $("#pt").on('change',function(){
        if($("#pt").val()=='Home'){
            $(".home").show();
        }
        else{
            $(".home").hide();
        }
       });

        </script>

       @endsection