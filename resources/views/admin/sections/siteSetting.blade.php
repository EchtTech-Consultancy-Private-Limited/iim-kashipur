@extends('admin.Layout.master')
@section('title', 'Manage Site Settings ')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
                @if(Session::has('success'))
              <div class="alert alert-success col-md-12 text-center">
                  <strong>Success!</strong> {{ Session::get('success') }}
                </div>
                 @endif
                @if(Session::has('error'))
              <div class="alert alert-danger col-md-12 text-center">
                  <strong>Oops!</strong> {{ Session::get('error') }}
                </div>
                 @endif   
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="top-menu-button">
                  <p class="card-title">Manage Site Layouts </p>
                  <div>
                     <button type="button" class="btn btn-primary" ><a href="{{url('Accounts/Add-Edit-site-setting')}}">Add New Entry </a></button>
                     
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>S.No#</th>
                           
                              <th>Page Name</th>
                            
                              <th>Header</th>
                              <th>Section1</th>
                              <th>Section2</th>
                              <th>Section3</th>
                              <th>Section4</th>
                              <th>Section5</th>
                              <th>Section6</th>
                              <th>Footer</th>
                              <th>Action</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $K=>$D)
                            <tr>
                              <td>{{$K+1}}</td>
                          
                           
                             
                              <td>{{$D->page_type}}</td>
                           
                              <td>{{$D->header}}</td>
                              <td>{{$D->section1}}</td>
                              <td>{{$D->section2}}</td>
                              <td>{{$D->section3}}</td>
                              <td>{{$D->section4}}</td>
                              <td>{{$D->section5}}</td>
                              <td>{{$D->section6}}</td>
                              <td>{{$D->footer}}</td>
                             <td>
                              <a href="{{url('Accounts/Add-Edit-site-setting/'.dEncrypt($D->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a> &nbsp;
                              
                             </td>
                              
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
       <!--modal-->
<div class="modal fade "id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
   <!--   <span style="margin-left:500px;"><b>Press Esc to Exit</b></span>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
        <div id="1"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
function abc(id){
  a='<?php echo asset('uploads');?>'; 
  src = a+"/"+id;
  $("#1").html('<img src="'+src+'" style="width:100%;height:100%;">');
}
</script>

       @endsection

