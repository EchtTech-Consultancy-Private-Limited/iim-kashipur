@extends('admin.Layout.master')



@section('title', 'Update Link Section')



@section('content')



      <div class="main-panel">



        <div class="content-wrapper">







          <div class="row">



           <div class="col-md-12 grid-margin stretch-card">



              <div class="card">



                <div class="card-body">



                  <h4 class="card-title"> Update Link Section</h4>



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







                  <form class="forms-sample row col-md-12" method="POST" action="{{ url('/Accounts/update_linkpost/'.dEncrypt($data->id))}}" >

                   @csrf

                      <div class="col-md-6">



                        <div class="form-group"> <label for="form_name">Placement</label>

                         <select name="link" class="form-control">

                        <option value="section1" {{$data->placement=='section1'?'selected':''}}>section(Academics)</option>

                        <option value="section2" {{$data->placement=='section2'?'selected':''}}>section(Academics)</option>

                        <option value="section3"{{$data->placement=='section3'?'selected':''}}>section(category)</option>

                        <option value="section4" {{$data->placement=='section4'?'selected':''}}>section(Center of Excellences )</option>

                        <option value="section5" {{$data->placement=='section5'?'selected':''}}>section(gallery)</option>

                        <option value="section6" {{$data->placement=='section6'?'selected':''}}>section(video)</option>

                        <option value="section7"{{$data->placement=='section7'?'selected':''}}>section(logo-photo)</option>

                        <option value="section8"{{$data->placement=='section8'?'selected':''}}>section(Footer)</option>

                        <option value="section9"{{$data->placement=='section9'?'selected':''}}>section(Footer)</option>

                            </select>

                         </div>



                    </div>





                    <div class="col-md-6">



                        <div class="form-group"> <label for="form_name">Title*</label>

                        <input id="form_name" type="text" name="title"  class="form-control" placeholder="Please enter title *" value={{$data->Section}}  > </div>



                    </div>



                    <div class="col-md-6">



                      <div class="form-group"> <label for="form_name">Title_h*</label>



                      <input id="form_name" type="text" name="Section_h"  class="form-control" placeholder="Please enter title *"  value={{$data->Section_h}} > </div>



                       </div>









                  <div class="col-md-6">



                      <div class="form-group"> <label for="form_name">Short Note</label>



                      <input id="form_name" type="text" name="short_note"  class="form-control" placeholder="Please enter short_note*" value="{{$data->short_note}}"> </div>



                  </div>







                  <div class="col-md-6">



                    <div class="form-group"> <label for="form_name">short_note_h</label>



                     <input id="form_name" type="text" name="short_note_h"  class="form-control" placeholder="Please enter short_note*" value={{$data->short_note_h}}> </div>



                     </div>









                     <div class="col-md-6">



                      <div class="form-group"> <label for="form_name"> sort_order*</label>



                       <input id="form_name" type="text" name="sort_order"  class="form-control" placeholder="Please enter  sort_order*"> </div>



                       </div>





                     <div class="col-md-6">



                      <label for="form_name">Status*</label>



                      <select   class="form-control" aria-label="Default select example" name="status"><br>

                      <option selected>Please select status</option>

                      <option value="1"{{$data->status==1?'selected':''}}>Active</option>

                      <option value="0"{{$data->status==0?'selected':''}}>Inactive</option>

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
