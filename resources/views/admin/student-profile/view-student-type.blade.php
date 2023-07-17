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

                      <button type="button" class="btn btn-primary" ><a target="_blank" href="{{ url('/Accounts/add-students-type') }}" > Add Student Profile Type</a></button>
                     

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
                              <th>Action</th>

                              




                            </tr>

                          </thead>

                          <tbody>

                          @foreach($student as $key=>$students)

                           <tr>
                           	<td>{{ ++$key }}</td>

                          <td>{{$students->student_type}}</td>

 

                          
                         
                          <td>
                          
                            <a href="/Accounts/update-student-profile-type/{{$students->id}}" onclick="return confirm('Are you sure to edit this record?')"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a> &nbsp;
                            <a href="/Accounts/delete-student-profile-type/{{$students->id}}" onclick="return confirm('Are you sure to delete this record?')"><i class="ti-trash btn-icon-append" style="color:black;"></i></a> &nbsp;

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



