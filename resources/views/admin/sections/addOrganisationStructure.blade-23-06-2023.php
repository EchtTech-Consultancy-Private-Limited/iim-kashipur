@extends('admin.Layout.master')

@section('title', $title)

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">



          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">{{$title}}</h4>

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

                @if($id)

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-people/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST"  id="regForm"  action="{{url('Accounts/add-edit-people')}}" enctype="multipart/form-data">

                @endif

                    @csrf

                    <div class="col-md-12">

                        <div class="form-group">

                            <label for="type"> Type *</label>

                            <select name="type" class="form-control">

                                <option value="">Please Select</option>

                                @foreach(GetOptionsByName('Organisation Structure') as $X)

                                    <option value="{{$X->option}}" {{ ( $X->option == $data->type) ? 'selected' : '' }} >{{$X->option}}</option>

                                @endforeach

                            </select>

                            <label for="type"  id="type-error" class="error">
                                @error('type')
                                    {{ $message }}
                                @enderror
                            </label>

                        </div>

                    </div>




                      <div class="col-md-6">

                        <div class="form-group"> <label for="title"> Name *</label> <input id="title" type="text" name="title" @if($id) value="{{$data->title}}" @else value="{{old('title')}}" @endif class="form-control" placeholder="Please enter name *" required="required" >


                            <label for="title"  id="title-error" class="error">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </label>




                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="title_h"> नाम *</label> <input id="title_h" type="text" name="title_h" @if($id) value="{{$data->title_h}}" @else value="{{old('title_h')}}" @endif class="form-control" placeholder="Please enter name in hindi *"  >



                            <label for="title_h"  id="title_h-error" class="error">
                                @error('title_h')
                                    {{ $message }}
                                @enderror
                            </label>


                        </div>

                    </div>





                    <div class="col-md-6">

                        <div class="form-group"> <label for="designation"> Designation *</label> <input id="designation" type="text" name="designation" @if($id) value="{{$data->designation}}" @else value="{{old('designation')}}" @endif class="form-control" placeholder="Please enter designation *" required="required" >



                            <label for="designation"  id="designation-error" class="error">
                                @error('designation')
                                    {{ $message }}
                                @enderror
                            </label>

                        </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> पद </label> <input id="form_name" type="text" name="designation_h" @if($id) value="{{$data->designation_h}}" @else value="{{old('designation_h')}}" @endif class="form-control" placeholder="Please enter designation in hindi *" > </div>

                    </div>

{{--
                    <div class="col-md-6">



                        <div class="form-group">

                            <label for="form_name"> Designation *</label>

                            <select name="designation" class="form-control">

                                <option value="">Please Select</option>

                                @foreach($type as $key => $value)

                                <option value="{{ $value->title }}" {{ ( $value->title == $data->designation) ? 'selected' : '' }} >{{ $value->title }}</option>

                                @endforeach



                            </select>

                        </div>


                    </div> --}}


                    {{-- <div class="col-md-6">



                        <div class="form-group">

                            <label for="form_name"> पद  *</label>

                            <select name="designation_h" class="form-control">

                                <option value="">Please Select</option>

                                @foreach($type as $key => $value)

                                <option value="{{ $value->title_h }}" {{ ( $value->title_h == $data->designation_h) ? 'selected' : '' }} >{{ $value->title_h }}</option>

                                @endforeach



                            </select>

                        </div>


                    </div> --}}



                    <div class="col-md-6">



                        <div class="form-group">

                            <label for="department"> Department *</label>

                            <select name="department" class="form-control">

                                    <option value="">Please Select</option>
                                    <option value="1" {{ ($data->department==1) ? 'selected' : '' }}  >Director</option>
                                    <option value="2" {{ ($data->department==2) ? 'selected' : '' }}  >Chairperson</option>
                                    <option value="3" {{ ($data->department==3) ? 'selected' : '' }}  >Members</option>
                                    <option value="4"  {{ ($data->department==4) ? 'selected' : '' }} >Secretary to the Board</option>
                                    <option value="6"  {{ ($data->department==6) ? 'selected' : '' }} >Faculty Directory</option>
                                    <option value="7"  {{ ($data->department==7) ? 'selected' : '' }} >Visiting Faculty</option>
                                    <option value="8"  {{ ($data->department==8) ? 'selected' : '' }} >International Relations Chairperson </option>
                                    <option value="9"  {{ ($data->department==9) ? 'selected' : '' }} >International Relations SENIOR MEMBERS </option>
                                    <option value="10"  {{ ($data->department==10) ? 'selected' : '' }} >TESTIMONIALS </option>

                            </select>



                            <label for="department"  id="department-error" class="error">
                                @error('department')
                                    {{ $message }}
                                @enderror
                            </label>


                        </div>


                    </div>

{{--
                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Department *</label> <input id="form_name" type="text" name="department" @if($id) value="{{$data->department}}" @else value="{{old('department')}}" @endif class="form-control" placeholder="Please enter department *" required="required" > </div>

                    </div> --}}



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> विभाग </label> <input id="form_name" type="text" name="department_h" @if($id) value="{{$data->department_h}}" @else value="{{old('department_h')}}" @endif class="form-control" placeholder="Please enter department *" > </div>

                    </div>




                     <div class="col-md-6">

                        <div class="form-group"> <label for="phone"> Contact No *</label> <input id="phone" type="text" name="phone" @if($id) value="{{$data->phone}}" @else value="{{old('phone')}}" @endif maxlength="50" class="form-control" placeholder="Please enter contact no *"  >

                            <label for="phone"  id="phone-error" class="error">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </label>




                        </div>


                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Extension </label> <input id="form_name" type="text" name="extension" @if($id) value="{{$data->extension}}" @else value="{{old('extension')}}" @endif class="form-control" placeholder="Please enter extension *"  > </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="email"> Email *</label> <input id="email" type="email" name="email" @if($id) value="{{$data->email}}" @else value="{{old('email')}}" @endif class="form-control" placeholder="Please enter email *" required="required" >




                            <label for="email"  id="email-error" class="error">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </label>




                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="image"> Image *</label> <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span>

                         <input id="image" type="file" name="image" @if($id) value="{{$data->image}}" @endif class="form-control" >


                         <label for="image"  id="image-error" class="error">
                            @error('image')
                                {{ $message }}
                            @enderror
                         </label>




                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                        <label for="form_name"> Status *</label>

                    <select   class="form-control" aria-label="Default select example" name="status" value="{{ old('status') }}">

                        <option selected>Please select status</option>

                        <option value="1">Active</option>

                        <option value="0">Inactive</option>

                    </select>

                        </div>

                    </div>









                    <div class="col-md-12">

                        <div class="form-group"> <label for="description"> Description </label> <textarea name="description" id="description">@if($id){{$data->description}} @else {{old('description')}} @endif</textarea>



                            <label for="description"  id="description-error" class="error">
                                @error('description')
                                    {{ $message }}
                                @enderror
                             </label>




                        </div>

                    </div>





                    <div class="col-md-12">

                        <div class="form-group"> <label for="description_h"> विवरण </label> <textarea name="description_h" id="description_h">@if($id) {{$data->description_h}} @else {{old('description_h')}} @endif</textarea>



                            <label for="description_h"  id="imadescription_hge-error" class="error">
                                @error('description_h')
                                    {{ $message }}
                                @enderror
                             </label>


                        </div>

                    </div>



{{-- google scholar --}}




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Instagram]</label> <input id="form_name" type="text" name="instagram" @if($id) value="{{$data->instagram}}" @else value="{{old('instagram')}}" @endif class="form-control" placeholder="Please enter instagram link ie. https://example.com "  > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[Instagram] *</label> <input id="form_name" type="text" name="Instagram_title" @if($id) value="{{$data->Instagram_title}}" @else value="{{old('Instagram_title')}}"  @endif class="form-control" placeholder="Please enter Instagram title *" > </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Facebook]</label> <input id="form_name" type="text" name="Facebook" @if($id) value="{{$data->Facebook}}" @else value="{{old('Facebook')}}" @endif class="form-control" placeholder="Please enter Facebook link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[Facebook] </label> <input id="form_name" type="text" name="Facebook_title" @if($id) value="{{$data->Facebook_title}}" @else value="{{old('Facebook_title')}}"  @endif class="form-control" placeholder="Please enter Facebook title *"  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Twitter]</label> <input id="form_name" type="text" name="twitter" @if($id) value="{{$data->twitter}}" @else value="{{old('twitter')}}" @endif class="form-control" placeholder="Please enter twitter link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[Twitter] </label> <input id="form_name" type="text" name="Twitter_title" @if($id) value="{{$data->Twitter_title}}" @else value="{{old('Twitter_title')}}"  @endif class="form-control" placeholder="Please enter Twitter title *" > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link[LinkedIn]</label> <input id="form_name" type="text" name="linkedin" @if($id) value="{{$data->linkedin}}" @else value="{{old('linkedin')}}" @endif class="form-control" placeholder="Please enter linkedin link ie. https://example.com "  > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[LinkedIn] </label> <input id="form_name" type="text" name="linkedIn_title" @if($id) value="{{$data->Facebook_title}}" @else value="{{old('LinkedIn_title')}}"  @endif class="form-control" placeholder="Please enter LinkedIn title *"  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [orcid]</label> <input id="form_name" type="text" name="orcid" @if($id) value="{{$data->orcid}}" @else value="{{old('orcid')}}" @endif class="form-control" placeholder="Please enter facebook link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[orcid] </label> <input id="form_name" type="text" name="orcid_title" @if($id) value="{{$data->orcid_title}}" @else value="{{old('orcid_title')}}"  @endif class="form-control" placeholder="Please enter orcid title"> </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [webofscience]</label> <input id="form_name" type="text" name="webofscience" @if($id) value="{{$data->webofscience}}" @else value="{{old('webofscience')}}" @endif class="form-control" placeholder="Please enter facebook link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[webofscience] </label> <input id="form_name" type="text" name="webofscience_title" @if($id) value="{{$data->webofscience_title}}" @else value="{{old('webofscience_title')}}"  @endif class="form-control" placeholder="Please enter webofscience title" > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [scopus]</label> <input id="form_name" type="text" name="scopus" @if($id) value="{{$data->scopus}}" @else value="{{old('scopus')}}" @endif class="form-control" placeholder="Please enter facebook link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[scopus] </label> <input id="form_name" type="text" name="scopus_title" @if($id) value="{{$data->scopus_title}}" @else value="{{old('scopus_title')}}"  @endif class="form-control" placeholder="Please enter scopus title "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [scholar]</label> <input id="form_name" type="text" name="scholar" @if($id) value="{{$data->scholar}}" @else value="{{old('scholar')}}" @endif class="form-control" placeholder="Please enter scholar link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[scholar] </label> <input id="form_name" type="text" name="scholar_title" @if($id) value="{{$data->scholar_title}}" @else value="{{old('scholar_title')}}"  @endif class="form-control" placeholder="Please enter scholar title "  > </div>
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

        <script type="text/javascript">

            CKEDITOR.replace('description');

            CKEDITOR.replace('description_h');

        </script>

       @endsection
