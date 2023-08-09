@extends('admin.Layout.master')

@section('title','View Organisation Structure')

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">



          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">View Organisation Structure</h4>

                    <div class="col-md-12">

                        <div class="form-group">

                            <label for="type"> Type *</label>

                            <select name="type" class="form-control" disabled>

                                <option value="">Please Select</option>

                                @foreach(GetOptionsByName('Organisation Structure') as $X)

                                    <option value="{{$X->option}}" {{ ( $X->option == $data->type) ? 'selected' : '' }} >{{$X->option}}</option>

                                @endforeach

                            </select>



                        </div>

                    </div>




                      <div class="col-md-6">

                        <div class="form-group"> <label for="title"> Name *</label> <input id="title" type="text" name="title"  value="{{$data->title}}" readonly class="form-control" placeholder="Please enter name *" required="required" >

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="title_h"> नाम *</label> <input id="title_h" type="text" name="title_h"  value="{{$data->title_h}}" readonly class="form-control" placeholder="Please enter name in hindi *"  >






                        </div>

                    </div>





                    <div class="col-md-6">

                        <div class="form-group"> <label for="designation"> Designation *</label> <input id="designation" type="text" name="designation"  value="{{$data->designation}}" readonly  class="form-control" placeholder="Please enter designation *" required="required" >



                            <label for="designation"  id="designation-error" class="error">
                                @error('designation')
                                    {{ $message }}
                                @enderror
                            </label>

                        </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> पद </label> <input id="form_name" type="text" name="designation_h"value="{{$data->designation_h}}" readonly class="form-control" placeholder="Please enter designation in hindi *" > </div>

                    </div>




                    <div class="col-md-6">



                        <div class="form-group">

                            <label for="department"> Department *</label>

                            <select name="department" class="form-control" disabled>

                                    <option value="">Please Select</option>
                                    <option value="1" {{ ($data->department==1) ? 'selected' : '' }}  >Director</option>
                                    <option value="2" {{ ($data->department==2) ? 'selected' : '' }}  >Chairperson</option>
                                    <option value="3" {{ ($data->department==3) ? 'selected' : '' }}  >Members</option>
                                    <option value="4"  {{ ($data->department==4) ? 'selected' : '' }} >Secretary to the Board</option>
                                    <option value="6"  {{ ($data->department==6) ? 'selected' : '' }} >Faculty Directory</option>
                                    <option value="7"  {{ ($data->department==7) ? 'selected' : '' }} >Visiting Faculty</option>
                                    <option value="8"  {{ ($data->department==8) ? 'selected' : '' }} >International Relations Chairperson </option>
                                    <option value="9"  {{ ($data->department==9) ? 'selected' : '' }} >International Relations SENIOR MEMBERS </option>

                            </select>



                            <label for="department"  id="department-error" class="error">
                                @error('department')
                                    {{ $message }}
                                @enderror
                            </label>


                        </div>


                    </div>


                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> विभाग </label> <input id="form_name" type="text" name="department_h" value="{{$data->department_h}}" readonly class="form-control" placeholder="Please enter department *" > </div>

                    </div>




                     <div class="col-md-6">

                        <div class="form-group"> <label for="phone"> Contact No *</label> <input id="phone" type="text" name="phone"  value="{{$data->phone}}" readonly maxlength="50" class="form-control" placeholder="Please enter contact no *"  >


                        </div>


                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Extension </label> <input id="form_name" type="text" name="extension"  value="{{$data->extension}}" readonly class="form-control" placeholder="Please enter extension *"  > </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="email"> Email *</label> <input id="email" type="email" name="email"  value="{{$data->email}}" readonly class="form-control" placeholder="Please enter email *" required="required" >



                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="image"> Image *</label> <span style="color:green;font-size:12px;"> [{{$data->image}}] </span>








                        </div>

                    </div>






                    <div class="col-md-12">

                        <div class="form-group"> <label for="description"> Description </label> <textarea name="description" id="description" readonly>{{$data->description}} </textarea>







                        </div>

                    </div>





                    <div class="col-md-12">

                        <div class="form-group"> <label for="description_h"> विवरण </label> <textarea name="description_h" id="description_h" readonly>{{$data->description_h}}  </textarea>





                        </div>

                    </div>



{{-- google scholar --}}




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Instagram]</label> <input id="form_name" type="text" name="instagram" readonly value="{{$data->instagram}}" class="form-control" placeholder="Please enter instagram link ie. https://example.com "  > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[Instagram] *</label> <input id="form_name" type="text" name="Instagram_title" readonly value="{{$data->Instagram_title}}"  class="form-control" placeholder="Please enter Instagram title *" > </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Facebook]</label> <input id="form_name" type="text" name="Facebook" readonly value="{{$data->Facebook}}" class="form-control" placeholder="Please enter Facebook link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[Facebook] </label> <input id="form_name" type="text" name="Facebook_title" readonly value="{{$data->Facebook_title}}" class="form-control" placeholder="Please enter Facebook title *"  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Twitter]</label> <input id="form_name" type="text" name="twitter"  value="{{$data->twitter}}" readonly  class="form-control" placeholder="Please enter twitter link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[Twitter] </label> <input id="form_name" type="text" name="Twitter_title"  value="{{$data->Twitter_title}}" readonly class="form-control" placeholder="Please enter Twitter title *" > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link[LinkedIn]</label> <input id="form_name" type="text" name="linkedin"  value="{{$data->linkedin}}"  readonly class="form-control" placeholder="Please enter linkedin link ie. https://example.com "  > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[LinkedIn] </label> <input id="form_name" type="text" name="linkedIn_title"  readonly value="{{$data->Facebook_title}}"  class="form-control" placeholder="Please enter LinkedIn title *"  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [orcid]</label> <input id="form_name" type="text" name="orcid"  value="{{$data->orcid}}"  readonly class="form-control" placeholder="Please enter facebook link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[orcid] </label> <input id="form_name" type="text" name="orcid_title"  value="{{$data->orcid_title}}" readonly class="form-control" placeholder="Please enter orcid title"> </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [webofscience]</label> <input id="form_name" type="text" name="webofscience" value="{{$data->webofscience}}" readonly class="form-control" placeholder="Please enter facebook link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[webofscience] </label> <input id="form_name" type="text" name="webofscience_title"  value="{{$data->webofscience_title}}"  readonly class="form-control" placeholder="Please enter webofscience title" > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [scopus]</label> <input id="form_name" type="text" name="scopus"  readonly value="{{$data->scopus}}"  class="form-control" placeholder="Please enter facebook link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[scopus] </label> <input id="form_name" type="text" name="scopus_title" value="{{$data->scopus_title}}"  readonly class="form-control" placeholder="Please enter scopus title "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [scholar]</label> <input id="form_name" type="text" name="scholar"  value="{{$data->scholar}}" readonly class="form-control" placeholder="Please enter scholar link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[scholar] </label> <input id="form_name" type="text" name="scholar_title"  value="{{$data->scholar_title}}"  readonly class="form-control" placeholder="Please enter scholar title "  > </div>
                    </div>


                    <div class="clearfix"></div>


                </div>

              </div>

            </div>

            </div>

        </div>

        <!-- content-wrapper ends -->

        <script type="text/javascript">
            CKEDITOR.replace('about_details');
            CKEDITOR.replace('activitie');
            CKEDITOR.replace('event');
        </script>

       @endsection
