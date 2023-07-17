@extends('admin.Layout.master')

@section('title', 'dynamic form')

@section('content')

      <div class="main-panel">

        <div class="content-wrapper">

          

          <div class="row">

           <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">{{'dynamic form'}}</h4>

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

                

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/dynamic-form')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12" style="padding:0">
                            <div class="form-group">
                                    <select name="db" id="xyz" class="form-control">
                                            <option value="">please select</option>
                                            @foreach($data as $D)
                                            <option value="{{$D->table_name}}">{{$D->main}}</option>
                                            @endforeach
                                    </select>
                            </div>
                    </div>

                    <div class="row" id="abc">
                        
                     
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
    $('#xyz').on('change',function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
        });
    $.ajax({
    url: "{{url('Accounts/form-creation')}}",
    data:{data:$('#xyz').val()},
    type:'post',
    dataType:"html",
    success: function(result){
    $('#abc').html(result);
    }
    });
    });


</script>
      

       @endsection