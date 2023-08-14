@extends('admin.Layout.master')

@section('title', 'Show Student Profiel')

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

                  <p class="card-title">Student Profile List</p>


                  <div>

                      <button type="button" class="btn btn-primary" ><a  href="{{ url('/Accounts/add-students-profile') }}" > Add Student Profile</a></button>


                    </div>

                  </div>



                  <div class="row">

                    <div class="col-12">

                      <div class="table-responsive">

                        <table id="example" class="display expandable-table" style="width:100%">

                          <thead>

                            <tr>

                              <th>S.No</th>

                              <th>Student Type</th>

                              <th>Name</th>

                              <th>Area Specialization</th>





                            <th>Email</th>
                            <th>Contact</th>



                            <th>About</th>
                            <th>Educational Background</th>
                            <th>Work Experience</th>
                            <th>Research Interests</th>
                            <th>Papers and Publications</th>

                            <th>Action </th>




                            </tr>

                          </thead>

                          <tbody>

                          @foreach($student as $key=>$students)

                           <tr>
                           	<td>{{ ++$key }}</td>

                          <td>{{$students->student_type}}</td>

                          <td>{{$students->name}} {{$students->last_name}}</td>

                          <td>{{$students->area_specialization}}</td>
                          <td>{{$students->email}}</td>
                          <td>{{$students->contact}}</td>
                          <td>{{$students->about}}</td>
                          <td>{{$students->educational_background}}</td>
                          <td>{{$students->work_experience}}</td>
                          <td>{{$students->research_interests}}</td>
                          <td>{{$students->papers_publications}}</td>

                          <td><img src="{{ asset('uploads/'.$students->student_image) }}" alt="" title="" style="height: 100px;  width: 100px;"></td>

                          <td>

                            <a href="{{url('/Accounts/update-student-profile/'.dEncrypt($students->id))}}"
                                onclick="return confirm('Are you sure to edit this record?')"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a> &nbsp;

                            @if (\Auth::guard('admin')->user()->id == 1  )
                            <a href="{{url('/Accounts/delete-student-profile/'.dEncrypt($students->id))}}"
                                onclick="return confirm('Are you sure to delete this record?')"><i class="ti-trash btn-icon-append" style="color:black;"></i></a> &nbsp;
                            @endif
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





       @endsection



