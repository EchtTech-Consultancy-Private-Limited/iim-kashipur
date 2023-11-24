@extends('admin.Layout.master')

@section('title', 'Manage TEDx Image')

@section('content')

    <style>
        .modal-dialog.modal-md {
            max-width: 900px;
            margin-top: 3%;
        }

        .modal .modal-dialog .modal-content .modal-body {
            padding: 20px 26px;
        }
        .modal{
        overflow: auto !important;
    }
        .form-group {
            margin-bottom: 0.5rem;
        }
    </style>

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="modal-body pb-0">

                @if ($errors->any())

                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            @if (Session::has('success'))
            <div class="alert alert-success col-md-12 text-center">

                <strong>Oops!</strong> {{ Session::get('success') }}

            </div>
            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">Manage TEDx Image</h4>

                            <div class="row">

                                <div class="col-md-12">

                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo">Multiple Image Upload </button>

                                </div>

                                <div class="col-12">
                                    <div class="table-responsive">
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <table id="example" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Image</th>
                                                    <th>Image Title</th>
                                                    <th>Status</th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data as $k => $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td><img src="{{ asset('uploads/multiple/tdex/'.$item->filename	) }}"
                                                                alt="" title="" 
                                                                style="height: 120px;  width: 120px;" loading="lazy"></td>
                                                        <td>{{ $item->image_title }}</td>
                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($item->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($item->id) . '/tdex_images') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($item->id) . '/tdex_images') }}"
                                                                        style="color:red;">Inactive</a>
                                                                @endif
                                                            @else
                                                                @if ($item->status == 1)
                                                                    <span" style="color:green;">Active</span>
                                                                    @else
                                                                        <span style="color:red;">Inactive</span>
                                                                @endif
                                                            @endif
                                                        </td>


                                                        <td>
                                                            <button type="button" class="btn btn-primary" id="update"
                                                                data-id="{{ $item->id }}" data-toggle="modal"
                                                                data-target="#exampleModalupdate"
                                                                data-whatever="@getbootstrap"><i
                                                                    class="ti-pencil btn-icon-append"
                                                                    style="color:black;"></i></button>


                                                                    <button type="button" class="btn btn-primary" id="view"
                                                                    data-id="{{ $item->id }}" data-toggle="modal"
                                                                    data-target="#exampleModalview"
                                                                    data-whatever="@getbootstrap"><i
                                                                        class="ti-eye btn-icon-append"
                                                                        style="color:black;"></i></button>



                                                            <a class="btn btn-primary"
                                                                href="{{ url('Accounts/tedx-image-delete/'.dEncrypt($item->id)) }}"
                                                                onclick="return confirm('Are you sure to edit this record?')"><i
                                                                    class="ti-trash btn-icon-append"
                                                                    style="color:black;"></i></a>

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


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">TEDx Images</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body pb-0">

                        @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul>

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    @endif

                    @if (Session::has('success'))
                    <div class="alert alert-success col-md-12 text-center">

                        <strong>Oops!</strong> {{ Session::get('success') }}

                    </div>
                    @endif


                        <form role="form" id="regForm" action="{{ url('Accounts/add-tedx-image') }}" method="post"
                            class="registration-form row" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf

                            <div class="form-group col-md-6">

                                <label for="filename">Image</label>

                                <input type="file" name="filename" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name">

                                <label for="filename" id="filename-error" class="error">
                                </label>


                            </div>

                            <input type="hidden" name="parent_id"  value="{{ $id }}">

                            <div class="form-group col-md-6">

                              
                                <label for="image_title">Image Title</label>

                                <input type="text" name="image_title" placeholder="Enter your Image Text" required 
                                value="{{ old('image_title') }}"
                                    class="form-last-name form-control" id="form-last-name" autocomplete="off"> 


                                    <label for="image_title" id="image_title-error" class="error">
                                    </label>

                            </div>

                            <div class="form-group col-md-6">

                                <label for="image_alt">Image Alt</label>

                                <input type="text" name="image_alt" placeholder="Enter your image Alt"
                                  value="{{ old('image_title') }}"
                                    class="form-email form-control" id="form-email" autocomplete="off">


                                <label for="image_alt" id="image_alt-error" class="error">
                                </label>

                            </div>

                            <div class="form-group col-md-6">

                                <label for="short_order">sort order</label>

                                <input type="number" id="short_order" name="short_order" placeholder="pls enter sort order" required
                                value="{{ old('short_order') }}"
                                    class="form-email form-control">


                                <label for="short_order	" id="short_order-error" class="error">
                                </label>

                            </div>

                            <input type="hidden" name="status" value="0">


                            <div class="col-md-12 modal-footer">
                                <button type="submit" class="btn btn-primary" id="savebtn">Save</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>


        {{-- view --}}


        <div class="modal fade" id="exampleModalview" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-md" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">TEDx Images</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span>

                    </button>

                </div>

                <div class="modal-body">



                        <div class="form-group col-md-6">

                            <label for="form-first-name">TEDx Images</label>


                            <div class="image"></div>



                        </div>



                        <div class="form-group col-md-6">

                            <label for="image_text">Image Text</label>

                            <input type="text" name="image_title" placeholder="Enter your Image Text"
                                class="form-last-name form-control imagetext" readonly required=""
                                autocomplete="off">

                            <label for="image_text" id="image_text-error" class="error">
                            </label>

                        </div>



                        <div class="form-group col-md-6">

                            <label for="image_alt">Image Alt</label>

                            <input type="text" name="image_alt" placeholder="Enter your image Alt"
                                class="form-email form-control imagealt" readonly required="" autocomplete="off">

                        </div>



                        <div class="form-group col-md-6">

                            <label for="form-email">sort order</label>

                            <input type="number" placeholder="pls enter sort order" name="order"
                                class="form-email form-control imagesort" readonly required="" autocomplete="off">

                            <label for="order" id="order-error" class="error">
                            </label>

                        </div>

                </div>


            </div>

        </div>

    </div>

        <!-- multiple image table code -->


        <div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-md" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Update
                            image</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body pb-0">

                        @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul>

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    @endif

                    @if (Session::has('success'))
                    <div class="alert alert-success col-md-12 text-center">

                        <strong>Oops!</strong> {{ Session::get('success') }}

                    </div>
                    @endif


                    <div class="modal-body">

                        <form action="" id="form" method="post" class="registration-form row"
                            enctype="multipart/form-data">

                         @csrf

                            <div class="form-group col-md-6">

                                <label for="form-first-name">Multiple Image</label>

                                <input type="file" name="filename" placeholder="Enter your Image"
                                    class="form-first-name form-control" id="form-first-name">

                                <div id="image"></div>


                                <input type="hidden" class="form-control" name="multioldimage" id="imageoldid">

                            </div>

                            <input type="hidden" name="parent_id"  value="{{ $id }}">

                            <div class="form-group col-md-6">

                                <label for="image_title">Image Text</label>

                                <input type="text" name="image_title" placeholder="Enter your Image Text"
                                    class="form-last-name form-control" id="imagetext" required=""
                                    autocomplete="off">

                                <label for="image_title" id="image_title-error" class="error">
                                </label>



                            </div>



                            <div class="form-group col-md-6">

                                <label for="image_alt">Image Alt</label>

                                <input type="text" name="image_alt" placeholder="Enter your image Alt"
                                    class="form-email form-control" id="imagealt" required="" autocomplete="off">



                                <label for="image_alt" id="image_alt-error" class="error">
                                </label>

                            </div>



                            <div class="form-group col-md-6">

                                <label for="short_order">sort order</label>

                                <input type="number" placeholder="pls enter sort order" name="short_order" required
                                    class="form-email form-control" id="imagesort" required="" autocomplete="off">

                                <label for="short_order" id="short_order-error" class="error">
                                </label>



                            </div>

                            <input type="hidden" name="status" id="imagestatus" >


                            <input type="hidden" name="gallery_id" placeholder="Enter your Gallery Tabel ID"
                            class="form-first-name form-control" id="gallery_id" readonly="">

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary" id="savebtn">Save</button>


                        </div>

                        </form>
                    </div>







                </div>

            </div>

        </div>

       

<script>
    $(document).on("click", "#update", function() {

        var UserName = $(this).data('id');

           // alert(UserName);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: "{{ url('/Accounts/tedx_id_image') }}",
            type: "get",
            data: {
                userid: UserName
            },
            success: function(data) {
                //console.log(data.item.short_order);

                $('#form').attr('action', '{{ url('Accounts/edit-tedx-image') }}' +
                    '/' + data.item.id)
                $("#imagetext").val(data.item.image_title);
                $("#imagealt").val(data.item.image_alt);
                $("#imagesort").val(data.item.short_order);
                $("#imageoldid").val(data.item.cell_imges);
                $("#event").val(data.item.event);
                $('#image').html('<img src="{{ asset('uploads/multiple/tdex') }}/' + data.item
                    .filename + '" width="100" height="100" />')
                $("#imagestatus").val(data.item.status);
            }

        });

    });
</script>

<script>
    $(document).on("click", "#view", function() {
        var UserName = $(this).data('id');
          // alert(UserName);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ url('/Accounts/tedx_id_image') }}",
            type: "get",
            data: {
                userid: UserName
            },
            success: function(data) {
                 //console.log(data);

                $(".imagetext").val(data.item.image_title);
                $(".imagealt").val(data.item.image_alt);
                $(".imagesort").val(data.item.short_order);
                $(".imageoldid").val(data.item.cell_imges);
                $(".event").val(data.item.event);
                $('.image').html('<img src="{{ asset('uploads/multiple/tdex') }}/' + data.item
                    .filename + '" width="100" height="100" />')

            }

        });

    });
</script>


@endsection
