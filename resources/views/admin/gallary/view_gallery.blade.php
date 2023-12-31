@extends('admin.Layout.master')

@section('title', 'view gallery')

@section('content')

    <style>
        .modal .modal-dialog {
            margin-top: 3%;
        }

        .modal .modal-dialog .modal-content .modal-header {
            padding: 18px 26px;
        }

        form.registration-form .form-group {
            margin-bottom: 0.5rem;
        }

        .modal .modal-dialog .modal-content .modal-body {
            padding: 20px 26px;
        }

        .modal .modal-dialog .modal-content .modal-footer {
            padding: 10px 31px;
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
                            <h4 class="card-title">{{ 'View gallery' }}</h4>
                            <p class="card-description">




                            </p>

                                <div class="col-md-12">
                                    <label for="type" class="col-sm-12 col-form-label">Page Content Type* </label>
                                    <div class="col-sm-12">
                                        <select class="form-control"  aria-label="Default select example" name="type"
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

                                        <textarea class="form-control" id="content" rows="4" name="content" readonly placeholder="Please enter content">{{ $value->content }}</textarea>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">विवरण</label>

                                    <div class="col-sm-12">

                                        <textarea class="form-control" id="content_h" rows="4" readonly name="content_h"
                                            placeholder="Please enter content in hindi">{{ $value->content_h }}</textarea>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Tittle*</label>

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

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Description*</label>

                                    <div class="col-sm-12">

                                        <textarea class="form-control" id="keyword" rows="4" readonly name="description"
                                            placeholder="Please enter meta description, use for seo">{{ $value->meta_description }}</textarea><br>

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


                                            <a href="{{ url('gallery/pdf/' . $value->file_download) }}" download>

                                            <img src="{{ asset('admin/images/viewpdf.jpg') }}" width="170"
                                                height="70">

                                        </a>

                                    </div>

                                </div>





                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Banner Image</label>

                                    <div class="col-sm-12">




                                        @if (isset($value->banner_image))
                                            <img src="{{ asset('gallery/banner/' . $value->banner_image) }}"
                                                width="150" height="120" />
                                        @else
                                            <img src="public/banner.png" />
                                        @endif

                                        <input type="hidden" class="form-control" name="bannernameold"
                                            value="{{ $value->banner_image }}"><br>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Banner Title </label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="banner_title"
                                            placeholder="Please enter text for title of banner photo, use for seo"
                                            value="{{ $value->banner_title }}" readonly>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Banner Alt </label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="banner_alt"
                                            placeholder="Please enter text for alt of banner photo, use for seo"
                                            value="{{ $value->banner_alt }}" readonly>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Content Image</label>

                                    <div class="col-sm-12">


                                        @if (isset($value->cover_image))
                                            <img src="{{ asset('gallery/image/' . $value->cover_image) }}" width="150"
                                                height="120" />
                                        @else
                                            <img src="photo-path/default.png" />
                                        @endif

                                        <input type="hidden" class="form-control" name="imagenameold"
                                            value="{{ $value->cover_image }}"><br>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Content Title </label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="cover_title"
                                            placeholder="Please enter text for title of content photo, use for seo"
                                            value="{{ $value->cover_title }}" readonly>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Content Alt </label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="cover_alt"
                                            placeholder="Please enter text for title of content photo, use for seo"
                                            value="{{ $value->cover_alt }}" readonly>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Sort Order*</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control" name="sort_order"
                                            placeholder="Please enter sorting position number"
                                            value="{{ $value->sort_order }}" readonly>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <!-- <label for="inputText" class="col-sm-2 col-form-label">Slug</label>-->

                                    <div class="col-sm-12">

                                        <input type="hidden" class="form-control" name="slug"
                                            placeholder="Please enter slug" value="{{ $value->slug }}"><br>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <div class="col-sm-12">

                                        &nbsp;

                                    </div>

                                </div>










                            <!-- multiple image table code -->


                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="example" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S.No#</th>
                                                    <th>Images</th>
                                                    <th>Images Text</th>
                                                    <th>Status</th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $value)
                                                    <tr>
                                                        <td>{{ $value->id }}</td>
                                                        <td><img src="{{ asset('gallery/multipimage/' . $value->large_image) }}"
                                                                alt="" title=""
                                                                style="height: 120px;  width: 120px;"></td>
                                                        <td>{{ $value->image_title }}</td>
                                                        <td>
                                                            @if (@checkRoute('StatusChange'))
                                                                @if ($value->status == 1)
                                                                    <a href="{{ url('Accounts/status-change/0/' . dEncrypt($value->id) . '/photo_gallery_images') }}"
                                                                        style="color:green;">Active</a>
                                                                @else
                                                                    <a href="{{ url('Accounts/status-change/1/' . dEncrypt($value->id) . '/photo_gallery_images') }}"
                                                                        style="color:red;">Inactive</a>
                                                                @endif
                                                            @else
                                                                @if ($value->status == 1)
                                                                    <span" style="color:green;">Active</span>
                                                                    @else
                                                                        <span style="color:red;">Inactive</span>
                                                                @endif
                                                            @endif
                                                        </td>

                                                        <td>


                                                            <button type="button" class="btn btn-primary" id="update"
                                                                data-id='{{ $value->id }}' data-toggle="modal"
                                                                data-target="#exampleModalupdate"
                                                                data-whatever="@getbootstrap"><i
                                                                    class="ti-pencil btn-icon-append"
                                                                    style="color:black;"></i></button>

                                                            {{-- {{ $value->id }} --}}



                                                        </td> &nbsp;
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>



                                        {{-- update popup  form --}}

                                        <div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="exampleModalLabel">Update
                                                            Multiple  Image</h5>

                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">

                                                            <span aria-hidden="true">&times;</span>

                                                        </button>

                                                    </div>

                                                    <div class="modal-body">




                                                            <div class="form-group col-md-6">

                                                                <label for="form-first-name">Multiple Image</label>



                                                                <div id="image"></div>


                                                                <input type="hidden" class="form-control"
                                                                    name="multioldimage" id="imageoldid">

                                                            </div>


                                                            <div class="form-group col-md-6">

                                                                <label for="image_text">Image Text</label>

                                                                <input type="text" name="image_text"
                                                                    placeholder="Enter your Image Text"
                                                                    class="form-last-name form-control" id="imagetext"
                                                                     readonly>

                                                                <label for="image_text" id="image_text-error"
                                                                    class="error">
                                                                    @error('image_text')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </label>



                                                            </div>



                                                            <div class="form-group col-md-6">

                                                                <label for="image_alt">Image Alt</label>

                                                                <input type="text" name="image_alt"
                                                                    placeholder="Enter your image Alt"
                                                                    class="form-email form-control" id="imagealt"
                                                                     readonly>



                                                                <label for="image_alt" id="image_alt-error"
                                                                    class="error">
                                                                    @error('image_alt')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </label>





                                                            </div>



                                                            <div class="col-md-12"  >

                                                                <div class="form-group"> <label for="form_name">


                                                                  <input type="radio" value="no" name="external"  checked   style="margin-left:50px;" id="checkboxs"> &nbsp;Internal URL </label>

                                                                   <input type="radio" value="yes" name="external"   style="margin-left:50px;" id="checkbox"> &nbsp;External URL  </label>

                                                                    <input readonly  type="text" name="url1" id="url1" placeholder="please enter external url" class="form-control"  >

                                                                </div>

                                                            </div>


                                                            <div class="form-group col-md-12">

                                                                <label for="form-email">sort order</label>

                                                                <input type="text" placeholder="pls enter sort order"
                                                                    name="order" class="form-email form-control"
                                                                    id="imagesort"  readonly>

                                                                <label for="order" id="order-error" class="error">
                                                                    @error('order')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </label>



                                                            </div>





                                                    </div>


                                                    <input type="hidden" name="gallery_id"
                                                        placeholder="Enter your Gallery Tabel ID"
                                                        class="form-first-name form-control" id="gallery_id" readonly>




                                                </div>

                                            </div>

                                        </div>



                                    </div>

                                </div>

                            </div>

                        </div>

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



        {{-- Multiple image section  --}}

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
                    url: "{{ url('/Accounts/gallery_id') }}",
                    type: "get",
                    data: {
                        id: UserName
                    },
                    success: function(data) {

                        // console.log(data.item)
                        $('#form').attr('action', '{{ url('Accounts/multi_updte_gallery_data_submit') }}' +
                            '/' + data.item.id)
                        $("#imagetext").val(data.item.image_title);
                        $("#imagealt").val(data.item.image_alt);
                        $("#imagesort").val(data.item.sort_order);
                        $('#image').html('<img src="{{ asset('gallery/multipimage') }}/' + data.item
                            .large_image + '" width="100" height="100" />')
                        $("#imagestatus").val(data.item.status);
                        $("#gallery_id").val(data.item.gallery_id);
                        $("#imageoldid").val(data.item.large_image);
                        $("#url1").val(data.item.url);



                    }

                });

            });
        </script>
    @endsection
