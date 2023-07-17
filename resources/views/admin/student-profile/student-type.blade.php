@extends('admin.Layout.master')
@section('title', 'Add Student Profile')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">{{'Add Student Profile'}}</h4>
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
               @if(Session::has('success'))
                <div class="alert alert-success" style="padding: 15px;" role="alert">
                    {{session::get('success')}}
                </div>
                @elseif(Session::has('fail'))
                <div class="alert alert-danger" role="alert">
                    {{session::get('fail')}}
                </div>
                @endif
               </p>
               <form class="forms-sample row col-md-12" method="POST" action="{{url('/Accounts/add-students-type')}}"  enctype="multipart/form-data">
                  @csrf

             <!--      <div class="col-md-12">
                     <label for="inputText" class="col-sm-2 col-form-label">Select Type*</label>
                     <div class="col-sm-10">
                        <select class="form-control" name="batch" required>
                        	<option value="">Please Select Student Type</option>
                        	<option value="1">PhD 2021-25 Batch Profile</option>
                        	<option value="2">PhD 2020-24 Batch Profile</option>
                        	<option value="3">PhD 2019-23 Batch Profile</option>
                        	<option value="4">FPM 2018-22 Batch Profile</option>
                        	<option value="5">FPM 2017-21 Batch Profile</option>
                        	<option value="6">FPM 2016-20 Batch Profile</option>
                        	<option value="7">FPM 2015-19 Batch Profile</option>

                        </select>
                        @error('student_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div> -->

                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-3 col-form-label">Student Type *</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="student_type" placeholder="Student Profile Type" ><br>
                        @error('student_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>

              <input type="submit" value="Add Student Profile Type">
                 
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