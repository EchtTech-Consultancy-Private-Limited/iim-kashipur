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
               <form class="forms-sample row col-md-12" method="POST" id="regForm" action="{{url('/Accounts/add-students-profile')}}"  enctype="multipart/form-data">
                  @csrf

                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">Student Type*</label>
                     <div class="col-sm-12">
                        <select class="form-control" name="batch" required>
                        	<option value=""> Select Student Type</option>
                        	<option value="1">PhD 2021-25 Batch Profile</option>
                        	<option value="2">PhD 2020-24 Batch Profile</option>
                        	<option value="3">PhD 2019-23 Batch Profile</option>
                        	<option value="4">FPM 2018-22 Batch Profile</option>
                        	<option value="5">FPM 2017-21 Batch Profile</option>
                        	<option value="6">FPM 2016-20 Batch Profile</option>
                        	<option value="7">FPM 2015-19 Batch Profile</option>
                            <option value="8">PhD 2022-26 Batch Profile</option>

                        </select>
                        @error('student_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">First Name*</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control special_no" name="name" placeholder="Name"   value="{{ old('name') }}" ><br>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">Last Name</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control special_no" name="last_name" placeholder="Last Name"   value="{{ old('last_name') }}" ><br>
                        @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">Area of Specialization </label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control"name="area_specialization" placeholder="Area of Specialization" value="{{ old('area_specialization') }}"><br>
                        @error('area_specialization')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-2 col-form-label">Email*</label>
                     <div class="col-sm-12">
                        <input type="email" class="form-control"name="email" placeholder="Email" value="{{ old('email') }}"><br>
                        <br>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>

                   <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">Sort</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control"name="sort" placeholder="Sort" value="{{ old('sort') }}"><br>
                        <br>
                        @error('sort')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">Contact No*</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control"name="contact" id="mobile"  maxlength="10" placeholder="Contact" value="{{ old('contact') }}"><br>
                        <br>
                        @error('contact')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">About Content*</label>
                     <div class="col-sm-12">
                        <textarea class="form-control" id="abouts" rows="4"  name="about" placeholder="About Content">{{ old('about') }}</textarea>
                        <br>
                        @error('abouts')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">Educational background</label>
                     <div class="col-sm-12">
                        {{-- <input type="text" class="form-control" name="educational_background" placeholder="Educational background" value="{{ old('educational_background') }}"><br>--}}
                        <textarea class="form-control" id="educational_background" name="educational_background" rows="4"  placeholder="Educational background">{{ old('educational_background') }}</textarea>
                        <div class="col-md-12">
                        </div>
                     </div>
                     <label for="inputText" class="col-sm-12 col-form-label">Work Experience</label>
                     <div class="col-sm-12">

                        <textarea class="form-control" id="work_experience" name="work_experience" rows="4"  placeholder="Work Experience">{{ old('work_experience') }}</textarea>
                     </div>
                   </div>
                  <div class="col-md-12">
                   <label for="inputText" class="col-sm-12 col-form-label">Papers and Publications</label>
                     <div class="col-sm-12">
                        <textarea class="form-control" id="papers_publications" name="papers_publications" rows="4"  placeholder="Papers and Publications">{{ old('papers_publications') }}</textarea>
                     </div>
                  </div>


                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">Research Interests</label>
                     <div class="col-sm-12">
                        <!-- <input type="text" class="form-control" id="research_interests" name="research_interests1" placeholder="Research Interests" value="{{ old('research_interests') }}"><br> -->

                        <textarea class="form-control" id="research_interests" name="research_interests" rows="4"  placeholder="Research Interests">{{ old('research_interests') }}</textarea>
                     </div>
                  </div>

                  <div class="col-md-12">
                     <label for="inputText" class="col-sm-12 col-form-label">Image</label>
                     <div class="col-sm-12">
                        <input type="file" class="form-control"  name="student_image" value="{{ old('student_image') }}"><br>
                     </div>
                  </div>


                  {{-- <input type="submit" onclick="load();" value="Add Student Profile"> --}}

                  <div class="col-md-12">



                    <button type="submit" class="btn btn-primary mr-2" onclick="load();">Submit</button>



                </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   CKEDITOR.replace('abouts');

   CKEDITOR.replace('papers_publications');
   CKEDITOR.replace('research_interests');
   CKEDITOR.replace('work_experience');
   CKEDITOR.replace('educational_background');

</script>
<!-- content-wrapper ends -->
@endsection
