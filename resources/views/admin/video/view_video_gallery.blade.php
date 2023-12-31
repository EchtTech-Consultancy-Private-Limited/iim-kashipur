@extends('admin.Layout.master')

@section('title', 'View Video Category')

@section('content')

    <style>
        .modal .modal-dialog {
            margin-top: 3%;
        }

        .modal .modal-dialog .modal-content .modal-body {
            padding: 20px 26px;
        }

        .modal .modal-dialog .modal-content .modal-header {
            padding: 20px 26px;
        }

        .registration-form .form-group {
            margin-bottom: 1rem;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 670px;
            }
        }
    </style>


    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">{{ 'View Video Category' }}</h4>

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



                                <div class="col-md-12">
                                    <label for="type" class="col-sm-12 col-form-label">Page Content Type* </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" aria-label="Default select example" name="type"
                                        value="{{ old('type') }}" disabled><br>
                                        <option selected>Please select status</option>
                                        <option value="1" {{ $value->type == 1 ? 'selected' : '' }}>Inner page section</option>
                                        <option value="0" {{ $value->type == 0 ? 'selected' : '' }}>Home Section</option>
                                    </select><br>




                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Page Title*</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control" name="name"
                                            placeholder="Please enter content page title" value="{{ $value->name }}" readonly>


                                            <label for="name" id="name-error" class="error">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </label>
                                    </div>

                                </div>




                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">शीर्षक*</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="name_h"
                                            placeholder="Please enter content page title in hindi"
                                            value="{{ $value->name_h }}" readonly>


                                            <label for="name_h" id="name_h-error" class="error">
                                                @error('name_h')
                                                    {{ $message }}
                                                @enderror
                                            </label>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Page Content</label>

                                    <div class="col-sm-12">

                                        <textarea class="form-control"  id="content" rows="4" name="content" placeholder="Please enter content" readonly>{{ $value->content }} </textarea>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">विवरण</label>

                                    <div class="col-sm-12">

                                        <textarea class="form-control" id="content_h" rows="4" name="content_h"
                                            placeholder="Please enter content in hindi">{{ $value->content_h }}</textarea>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Title *</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control" name="tittle"
                                            placeholder="Please enter meta tittle, use for seo"
                                            value="{{ $value->meta_title }}" readonly>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Keywords*</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control" name="keyword"
                                            placeholder="Please enter meta keywords, use for seo"
                                            value="{{ $value->meta_keywords }}" readonly>



                                            <label for="keyword" id="keyword-error" class="error">
                                                @error('keyword')
                                                    {{ $message }}
                                                @enderror
                                            </label>
                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Description*</label>

                                    <div class="col-sm-12">

                                        <textarea class="form-control" id="keyword" rows="4" name="description"
                                            placeholder="Please enter meta description, use for seo" readonly>{{ $value->meta_description }}</textarea><br>


                                            <label for="description" id="description-error" class="error">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </label>
                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Banner Image</label>

                                    <div class="col-sm-12">


                                        @if (isset($value->banner_image))
                                            <img src="{{ asset('video/banner/' . $value->banner_image) }}" width="150"
                                                height="100" />
                                        @else
                                            <img src="public/banner.png" />
                                        @endif



                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Banner Image Text</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="banner_title"
                                            placeholder="Please enter text for title of banner photo, use for seo"
                                            value="{{ $value->banner_title }}" readonly>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Banner Image Alt </label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="banner_alt"
                                            placeholder="Please enter text for alt of banner photo, use for seo"
                                            value="{{ $value->banner_alt }}" readonly>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Content Image</label>

                                    <div class="col-sm-12">



                                        @if (isset($value->cover_image))
                                            <img src="{{ asset('video/image/' . $value->cover_image) }}" width="150"
                                                height="100" />
                                        @else
                                            <img src="photo-path/default.png" />
                                        @endif


                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Content Image Text</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="cover_title"
                                            placeholder="Please enter text for title of content photo, use for seo"
                                            value="{{ $value->cover_title }}" readonly>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Content Image Alt</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="cover_alt"
                                            placeholder="Please enter text for title of content photo, use for seo"
                                            value="{{ $value->cover_alt }}" readonly>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">PDF File


                                        <span style="color:green;font-size:12px;"> [{{$value->file_download }}]
                                        </span>
                                        <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                            (
                                            <?php
                                                echo formatSizeUnits($value->pdfsize);
                                            ?>)
                                        </span>

                                    </label>

                                    <div class="col-sm-12">


                                        <a href="{{ url('video/pdf/' . $value->file_download) }}" download>

                                            <img src="{{ asset('video/pdf/viewpdf.jpg') }}" width="170"
                                                height="70">

                                        </a>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Sort Order*</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control" name="sort_order"
                                            placeholder="Please enter sorting position number"
                                            value="{{ $value->sort_order }}" readonly>

                                            <label for="sort_order" id="sort_order-error" class="error">
                                                @error('sort_order')
                                                    {{ $message }}
                                                @enderror
                                            </label>
                                    </div>

                                </div>


                                {{-- <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Status</label>

                                    <div class="col-sm-12">

                                        <select class="form-control" aria-label="Default select example" name="status" readonly>

                                            <option selected>Please select status</option>

                                            <option value="1" {{ $value->status == 1 ? 'selected' : '' }}>Active
                                            </option>

                                            <option value="0" {{ $value->status == 0 ? 'selected' : '' }}>Inactive
                                            </option>

                                        </select>

                                    </div>

                                </div> --}}

                                <input  type="hidden" name="status" value="{{ $value->status }}">






                                <div class="col-md-12">

                                    <div class="col-sm-12">

                                        &nbsp;

                                    </div>

                                </div>




                            {{-- instert pop form --}}




                            <!-- multiple image table code -->

                            <div class="row">

                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="top-menu-button">
                                                <p class="card-title">Gallery Photos List</p>
                                                <div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table id="example" class="display expandable-table"
                                                            style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No#</th>
                                                                    <th>Parent Gallery Id</th>
                                                                    <th>Video url</th>

                                                                    <th>Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($data as $value)
                                                                    <tr>

                                                                        <td>{{ $value->id }}</td>
                                                                        <td>{{ $value->gallery_id }}</td>

                                                                        <td>{{ $value->video_url }}</td>

                                                                        <td>
                                                                            {{--
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" id="{{$value->id}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></button> --}}

                                                                            <button type="button" id="update"
                                                                                class="btn btn-primary"
                                                                                data-id='{{ $value->id }}'
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalupdate"
                                                                                data-whatever="@getbootstrap"><i
                                                                                    class="ti-eye btn-icon-append"
                                                                                    style="color:black;"></i></button>


                                                                            {{-- {{ $value->id }} --}}




                                                                        </td> &nbsp;

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



                        {{-- update video section  --}}


                        <div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog" role="document">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalLabel">Update Multiple Video</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                            <span aria-hidden="true">&times;</span>

                                        </button>

                                    </div>

                                    <div class="modal-body">



                                           <div class="form-group col-md-12">

                                                <label for="form-first-name">video photo</label>

                                                <input type="hidden" class="form-control" name="video_image">
                                                <div id="image" width="70" height="50"></div>

                                            </div>

                                            <input type="hidden" class="form-control" name="multioldimage"
                                                id="imageoldid">

                                            <div class="form-group col-md-12">

                                                <label for="form-first-name">Video Url</label>

                                                <input type="text" name="url" placeholder="Enter your Image"
                                                    class="form-first-name form-control" id="videourl1" readonly>


                                                <label for="url" id="url-error" class="error">
                                                    @error('url')
                                                        {{ $message }}
                                                    @enderror
                                                </label>


                                            </div>



                                            <div class="form-group col-md-12">

                                                <label for="form-last-name">video Text</label>

                                                <input type="text" name="video_text"
                                                    placeholder="Enter your Image Text"
                                                    class="form-last-name form-control" id="videotext1" readonly>

                                                <label for="video_text" id="video_text-error" class="error">
                                                    @error('Video_Text')
                                                        {{ $message }}
                                                    @enderror
                                                </label>


                                            </div>



                                            <div class="form-group col-md-12">

                                                <label for="form-email">sort order</label>

                                                <input type="text" placeholder="pls enter sort order" name="order"
                                                    class="form-email form-control" id="videoorder1" readonly>


                                                <label for="order" id="order-error" class="error">
                                                    @error('order')
                                                        {{ $message }}
                                                    @enderror
                                                </label>


                                            </div>

                                            <input type="hidden" name="gallery_id"
                                                placeholder="Enter your Gallery Tabel ID"
                                                class="form-first-name form-control" id="gallery_id" readonly>


                                            <input  type="hidden" name="status" id="videostatus1">

                                    </div>



                                </div>

                            </div>

                        </div>





                        <script type="text/javascript">
                            CKEDITOR.replace('content');
                            CKEDITOR.replace('content_h');
                        </script>



                        <script>
                            function loadPreview(input) {

                                var data = $(input)[0].files; //this file data

                                $.each(data, function(index, file) {

                                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {

                                        var fRead = new FileReader();

                                        fRead.onload = (function(file) {

                                            return function(e) {

                                                var img = $('<img/>').addClass('thumb').attr('src', e.target
                                                    .result); //create image thumb element

                                                $('#thumb-output').append(img);

                                            };

                                        })(file);

                                        fRead.readAsDataURL(file);

                                    }

                                });

                            }
                        </script><br>

                        <!-- content-wrapper ends -->



                        {{-- multiple video section shwo --}}
                        <script>
                            $(document).on("click", "#update", function() {
                                var UserName = $(this).data('id');
                                // console.log(UserName);


                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });


                                $.ajax({
                                    url: "{{ url('/Accounts/multi_id') }}",
                                    type: "get",
                                    data: {
                                        id: UserName
                                    },
                                    success: function(data) {

                                        //console.log(data.item)
                                        $('#form_update').attr('action', '{{ url('Accounts/updatemultivideopost') }}' +
                                            '/' + data.item.id)
                                        $("#videourl1").val(data.item.video_url);
                                        $("#videotext1").val(data.item.video_title);
                                        $("#videoorder1").val(data.item.sort_order);
                                        $('#image').html('<img src="{{ url('/') }}/' + data.item.url +
                                            '" width="100" height="100" />')
                                        $("#videostatus1").val(data.item.status);
                                        $("#gallery_id").val(data.item.gallery_id);
                                        $("#imageoldid").val(data.item.video_image);


                                    }

                                });

                            });
                        </script>
                    @endsection
