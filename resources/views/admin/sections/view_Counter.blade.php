@extends('admin.Layout.master')

@section('title', 'View Counter Detail')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">



            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">{{ 'View Counter Detail' }}</h4>

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


<div class="row">

  <div class="col-md-6">

    <div class="form-group"> <label for="name">NAME *</label> <input id="name"
            type="text" value="{{ $data->name }}" name="name" class="form-control"
            placeholder="Please enter name*" readonly>


    </div>

</div>



<div class="col-md-6">

    <div class="form-group"> <label for="name_h">NAME[Hindi] *</label> <input id="name_h"
            value="{{ $data->name_h }}" type="text" name="name_h" class="form-control"
            placeholder="Please enter name_h*" readonly>




    </div>

</div>




<div class="col-md-6">

    <div class="form-group"><label for="number">Number *</label> <input id="number"
            type="text" value="{{ $data->number }}" name="number" class="form-control"
            placeholder="Please enter number *" readonly>




    </div>

</div>

  
</div>


                                                       {{--

                 <div class="col-md-6">

                 <div class="form-group"> <label for="image">Image (45px * 45px)</label> <input id="image" type="file" name="image" accept=".jpeg,.png,.gif,.jpg" class="form-control" >


                </div>

                  </div> --}}

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
