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



                                @if ($errors->any())



                                    <div class="alert alert-danger">



                                        <ul>



                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach



                                        </ul>



                                    </div>



                                @endif



                                @if (Session::has('error'))
                                    <div class="alert alert-danger col-md-12 text-center">



                                        <strong>Oops!</strong> {{ Session::get('error') }}



                                    </div>
                                @endif



                            </p>







                            <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                action="{{ url('/Accounts/add_link_action') }}">

                                @csrf

                                <div class="col-md-6">

                                    <div class="form-group"> <label for="title">Title*</label>

                                        <input  type="text" name="title" class="form-control"
                                            placeholder="Please enter title *" id="title" required value="{{ old('title') }}">

                                        <label for="title" id="title-error" class="error">
                                            @error('title')
                                                {{ $message }}
                                            @enderror

                                        </label>

                                    </div>

                                </div>



                                <div class="col-md-6">

                                    <div class="form-group"> <label for="Section_h">Title[Hindi]*</label>

                                        <input id="Section_h" type="text" name="Section_h" class="form-control"
                                            placeholder="Please enter title *" value="{{ old('Section_h') }}" required>


                                        <label for="Section_h" id="Section_h-error" class="error">
                                            @error('Section_h')
                                                {{ $message }}
                                            @enderror

                                        </label>

                                    </div>


                                </div>


                                <div class="col-md-6">

                                    <div class="form-group"> <label for="link" required>Placement*</label>

                                        <select name="link" id="link" class="form-control">

                                            <option value="">Please Select</option>

                                            <option value="section1">section(Academics)</option>

                                            <option value="section2">section(student)</option>

                                            <option value="section3">section(category)</option>

                                            <option value="section4">section(Center of Excellences )</option>

                                            <option value="section5">section(gallery)</option>

                                            <option value="section6">section(video)</option>

                                            <option value="section7">section(logo-photo)</option>

                                            <option value="section8">section(Footer)</option>

                                            <option value="section9">section(Footer)</option>

                                            <option value="section10">section(Footer3)</option>

                                            <option value="section11">section(Header Top)</option>

                                            <option value="section12">section(Client Logo Middle Section)</option>


                                        </select>


                                        <label for="link" id="link-error" class="error">
                                            @error('link')
                                                {{ $message }}
                                            @enderror

                                        </label>

                                    </div>

                                </div>




                                <div class="col-md-6">



                                    <div class="form-group"> <label for="form_name">Short Note*</label>

                                        <input id="form_name" type="text" name="short_note" class="form-control"
                                            placeholder="Please enter short note" value="{{ old('short_note') }}" required>
                                    </div>



                                </div>


                                <div class="col-md-6">



                                    <div class="form-group"> <label for="form_name">Short Note[Hindi]</label>



                                        <input id="form_name" type="text" name="short_note_h" class="form-control"
                                            placeholder="Please enter Short Note" value="{{ old('short_note_h') }}">
                                    </div>



                                </div>



                                <div class="col-md-6">



                                    <div class="form-group"> <label for="form_name"> Sort Order</label>



                                        <input id="form_name" type="number" name="sort_order" class="form-control"
                                            placeholder="Please enter  sort_order*" value="{{ old('sort_order') }}"
                                            required>
                                    </div>



                                </div>





                                {{-- <div class="col-md-6">


                                    <label for="status">Status*</label>

                                    <select id="status" class="form-control" aria-label="Default select example"
                                        name="status"><br>

                                        <option selected>Please select status</option>

                                        <option value="1">Active</option>

                                        <option value="0">Inactive</option>

                                    </select><br><br>



                                    <label for="status" id="status-error" class="error">
                                        @error('status')
                                            {{ $message }}
                                        @enderror

                                    </label>





                                </div> --}}

                                <input type="hidden" value="0" name="status">



                                <div class="clearfix"></div>



                                <div class="col-md-12">



                                    <button type="submit" class="btn btn-primary mr-2" onclick="load();">Submit</button>



                                </div>



                            </form>



                        </div>



                    </div>



                </div>



            </div>



        </div>



        <!-- content-wrapper ends -->







    @endsection
