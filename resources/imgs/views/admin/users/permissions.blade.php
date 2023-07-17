@extends('admin.Layout.master')
@section('title', 'Assign Permissions')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Assign Permissions to Role:{{$roles->name}}</h4>
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
                  </p>
                  <div class="col-sm-3">
                            <div class="form-check">
                  <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="checkall" id="checkall" value="1"> Select All
                        </label>
                        </div></div>
                  @if($id)
                 
                  <form class="forms-sample row col-md-12" method="POST" action="{{url('/Accounts/permissions').'/'.$id}}" >
                  @endif
                    @csrf
                   
                  
                      <div class="col-md-12">
                        <div class="form-group row">
                        
                          @foreach($data as $key=>$d)
                         
                        <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="role[]" id="membershipRadios1" value="{{$d->id}}"             
                                              @foreach($perms as $P) @if($P->id == $d->id) checked @endif @endforeach >
                                {{$d->name}}
                              </label>
                            </div>
                          </div>
                         @endforeach
                      
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
        <script>
        $(document).ready(function(){
        
    $('#checkall').on('click',function(){
        if(this.checked){
            $('.form-check-input').each(function(){
                this.checked = true;
            });
        }else{
             $('.form-check-input').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.form-check-input').on('click',function(){
        if($('.form-check-input:checked').length == $('.form-check-input').length){
            $('#checkall').prop('checked',true);
        }else{
            $('#checkall').prop('checked',false);
        }
    });
});
       </script>
       @endsection

       