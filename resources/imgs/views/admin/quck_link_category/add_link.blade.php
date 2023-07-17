@extends('admin.Layout.master')



@section('title', 'Add Link Section')



@section('content')



      <div class="main-panel">



        <div class="content-wrapper">







          <div class="row">



           <div class="col-md-12 grid-margin stretch-card">



              <div class="card">



                <div class="card-body">



                  <h4 class="card-title">Add Link Section</h4>



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







                  <form class="forms-sample row col-md-12" method="POST" action="{{url('/Accounts/add_link_action')}}" >

                   @csrf





                   <div class="col-md-6">



                  <div class="form-group"> <label for="form_name">Title*</label>



                  <input id="form_name" type="text" name="title"  class="form-control" placeholder="Please enter title *" value="{{ old('title') }}"  required> </div>



                   </div>







                   <div class="col-md-6">



                    <div class="form-group"> <label for="form_name">Title[Hindi]*</label>



                    <input id="form_name" type="text" name="Section_h"  class="form-control" placeholder="Please enter title *"  value="{{ old('Section_h') }}"  required> </div>



                     </div>









                      <div class="col-md-6">



                        <div class="form-group"> <label for="form_name" required>Placement*</label>

                            <select name="link" class="form-control">

                            <option value="not_select">Please Select</option>

                                <option value="section1">section(Academics)</option>

                                <option value="section2">section(student)</option>

                                <option value="section3">section(category)</option>

                                <option value="section4">section(Center of Excellences )</option>

                                <option value="section5">section(gallery)</option>

                                <option value="section6">section(video)</option>

                                <option value="section7">section(logo-photo)</option>

                                <option value="section8">section(Footer)</option>

                                <option value="section9">section(Footer)</option>

                            </select>

                         </div>



                    </div>







                      <div class="col-md-6">



                       <div class="form-group"> <label for="form_name">Short Note</label>



                        <input id="form_name" type="text" name="short_note"  class="form-control" placeholder="Please enter short note"  value="{{ old('short_note') }}"> </div>



                        </div>









                        <div class="col-md-6">



                          <div class="form-group"> <label for="form_name">Short Note[Hindi]</label>



                           <input id="form_name" type="text" name="short_note_h"  class="form-control" placeholder="Please enter Short Note"  value="{{ old('short_note_h') }}"> </div>



                           </div>











                           <div class="col-md-6">



                            <div class="form-group"> <label for="form_name"> Sort Order*</label>



                             <input id="form_name" type="text" name="sort_order"  class="form-control" placeholder="Please enter  sort_order*"  value="{{ old('sort_order') }}" required> </div>



                             </div>













                      <div class="col-md-6">



                      <label for="form_name">Status*</label>



                      <select   class="form-control" aria-label="Default select example" name="status" required><br>

                      <option selected>Please select status</option>

                      <option value="1">Active</option>

                      <option value="0">Inactive</option>

                      </select><br><br>



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







       @endsection
