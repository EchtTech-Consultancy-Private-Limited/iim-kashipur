@extends('admin.Layout.master')

@section('title', 'Add Database')

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">{{'Add Database'}}</h4>

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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/create-database')}}" enctype="multipart/form-data">


                    @csrf


                    <div class="col-md-12">

                        <div class="form-group">

                            <label for="form_name"> Name Of DB *</label>

                            <input type="text" class="form-control" name="db">

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> Fields * (Fields Except ID field) </label> 

            <div class="after-add-more field_wrapper">
                    <div class="row">
                         <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Column Name</label>
                                <input type="text"  class="form-control" placeholder="Column Name" name="col_name[0]" />
                            </div>
                        </div>

                        <div class="col-md-3">                               
                            <div class="form-group">
                                <label class="control-label">Type</label>
                                <select class="form-control " id="type"  name="type[0]">
                                    <option value="">Select Option</option>
                                     <option>Integer</option>
                                     <option>Text</option>
                                     <option>Varchar</option>
                                </select>
                                <span id="dropdownS" style="display:none;"><input type="checkbox" name="dropdown0" id="dropdown" value="dropdown">Whether it is DropDown? </span>
                                <span id="fileS" style="display:none;"><input type="checkbox" name="file0" id="file" value="file">Whether it is a file? </span>
                            </div>
                        </div>
                        <div class="col-md-3 " id="dropdownSS"  style="display:none;">
                            <div class="form-group">
                                <label class="control-label">Options Value</label>
                                    <select class="form-control" name="dbn[0]">
                                        <option value="">Please select</option>
                                        @foreach(FindUniqueDb() as $D)
                                            <option value="{{$D->id}}">{{$D->main}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                       
 
                        <div class="col-md-3">
                            <div class="form-group change">
                                <label for="">&nbsp;</label><br/>
                                <a class="btn btn-success add-more" style="height:50px;">+ Add More</a>
                            </div>
                        </div>
                    </div>
                </div>  
                                
                    </div>

                    </div>

 
                    <div class="clearfix"></div>

                   <div class="col-md-12">

                    <button type="submit" class="btn btn-primary mr-2" onclick="return confirm('Are you Sure? this action is not editable/delete-able.')">Submit</button>

                   </div>

                  </form>

                </div>

              </div>

            </div>

            </div>

        </div>

        <!-- content-wrapper ends -->
<script type="text/javascript">
           
   $(document).ready(function () {
   var a=1;
   var x = 1; //Initial field counter is 1   
   var maxField = 10; //Input fields increment limitation
   var addButton = $('.add-more'); //Add button selector
   var wrapper = $('.field_wrapper'); //Input field wrapper
  
  function myFunction(){
   a = a+1;
  }

  function myFunction1(){
   a = a-1;
  }


   $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
      myFunction1()
  });

    $(addButton).click(function(){
        if(x < maxField){
            x++;
            $(wrapper).append('<div id="'+a+'"><div class="after-add-more field_wrapper"> <div class="row"> <div class="col-md-3"> <div class="form-group"> <label class="control-label">Column Name</label> <input type="text" class="form-control" placeholder="Column Name" name="col_name['+a+']" id="cn'+a+'"/> </div></div> <div class="col-md-3"> <div class="form-group"> <label class="control-label">Type</label> <select class="form-control" name="type['+a+']" id="type'+a+'" onchange="nh('+a+')"> <option value="">Select Option</option> <option>Integer</option> <option >Text</option> <option >Varchar</option> </select> <span id="dropdownS'+a+'" style="display:none;"><input type="checkbox" name="dropdown'+a+'" value="dropdown" id="dropdown'+a+'" onchange="nx('+a+')">Whether it is DropDown? </span><span id="fileS'+a+'" style="display:none;"><input type="checkbox" name="file'+a+'" value="file" id="file'+a+'" >Whether it is a file? </span></div></div><div class="col-md-3" id="dropdownSS'+a+'"  style="display:none;"><div class="form-group"><label class="control-label">Options Value</label><select class="form-control" name="dbn['+a+']"><option value="">Please select</option>@foreach(FindUniqueDb() as $D)<option value="{{$D->id}}">{{$D->main}}</option>@endforeach</select></div></div><a class="btn btn-danger remove_button" style="height:50px;margin-top:26px;margin-left:18px;">- Remove</a></div></div></div>'); //Add field html  
            myFunction();   
        }
    });
    });
</script>

<script type="text/javascript">
    $("#type").on('change',function(){
    if($("#type").val()=='Integer'){
        $('#dropdownS').show();
        $('#fileS').hide();
        $('#file').prop('checked', false);
    }
    else if($("#type").val()=='Varchar') {
         $('#dropdownS').hide();
         $('#fileS').show();
          $('#dropdownSS').hide();
          $('#dropdown').prop('checked', false);
    }
    else{
         $('#dropdownS').hide();
          $('#fileS').hide();
          $('#dropdownSS').hide();
          $('#file').prop('checked', false);
          $('#dropdown').prop('checked', false);
    }
});
    $('#dropdown').on('click',function(){
    if($('#dropdown').is(':checked')) {
        $('#dropdownSS').show();
    }
    else{
         $('#dropdownSS').hide();
    }   
});

    function nh(val){
        if($("#type"+val).val()=='Integer'){
        $('#dropdownS'+val).show();
        $('#fileS'+val).hide();
            $('#file'+val).prop('checked', false);
    }
    else if($("#type"+val).val()=='Varchar') {
         $('#dropdownS'+val).hide();
         $('#fileS'+val).show();
          $('#dropdownSS'+val).hide();
          $('#dropdown'+val).prop('checked', false);
    }
    else{
         $('#dropdownS'+val).hide();
          $('#fileS'+val).hide();
          $('#dropdownSS'+val).hide();
          $('#file'+val).prop('checked', false);
          $('#dropdown'+val).prop('checked', false);
    }
    }

    function nx(val){
    if($('#dropdown'+val).is(':checked')) {
        $('#dropdownSS'+val).show();
    }
    else{
         $('#dropdownSS'+val).hide();
    }
    }
</script>

@endsection