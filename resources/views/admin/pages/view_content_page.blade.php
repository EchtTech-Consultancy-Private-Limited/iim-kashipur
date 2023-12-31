@extends('admin.Layout.master')



@section('title', ' View Content Page')



@section('content')



    <div class="main-panel">



        <div class="content-wrapper">







            <div class="row">



                <div class="col-md-12 grid-margin stretch-card">



                    <div class="card">



                        <div class="card-body row">



                            <h4 class="card-title col-md-12">{{ 'View Content Page' }}</h4>



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


                            <div class="col-md-6">

                                <label for="inputText" class="col-form-label">Page Title*</label>

                                <div class="">

                                    <input type="text" class="form-control" name="name"
                                        placeholder="Please enter content page title" value="{{ $data->name }}" readonly>



                                    <label for="name" id="name-error" class="error">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </label>


                                </div>
                            </div>



                            <div class="col-md-6">

                                <label for="name_h" class="col-form-label">शीर्षक*</label>

                                <div class="">

                                    <input type="text" class="form-control"name="name_h" id="name_h"
                                        placeholder="Please enter content page title in hindi" value="{{ $data->name_h }}"
                                        readonly>

                                    <label for="name_h" id="name_h-error" class="error">
                                        @error('name_h')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>
                            </div>





                            <div class="col-md-12">

                                <label for="inputText" class="col-form-label">Page Content</label>

                                <div class="">

                                    <textarea class="form-control" id="content" rows="4" readonly name="content" placeholder="Please enter content">{{ $data->content }}</textarea>

                                </div>

                            </div>



                            <div class="col-md-12">

                                <label for="inputText" class="col-form-label">विवरण</label>

                                <div class="">

                                    <textarea class="form-control" id="content_h" readonly rows="4" name="content_h"
                                        placeholder="Please enter content in hindi">{{ $data->content_h }}</textarea>

                                </div>

                            </div>



                            <div class="col-md-12">

                                <label for="inputText" class="col-form-label">Meta Tittle</label>

                                <div class="">

                                    <input type="text" class="form-control" readonly name="tittle"
                                        placeholder="Please enter meta tittle, use for seo" value="{{ $data->meta_title }}">

                                </div>

                            </div>



                            <div class="col-md-12">

                                <label for="inputText" class="col-form-label">Meta Keywords</label>

                                <div class="">

                                    <input type="text" class="form-control" readonly name="keyword"
                                        placeholder="Please enter meta keywords, use for seo"
                                        value="{{ $data->meta_keywords }}">

                                </div>

                            </div>



                            <div class="col-md-12">

                                <label for="inputText" class="col-form-label">Meta Description</label>

                                <div class="">

                                    <textarea class="form-control" id="keyword" rows="4" readonly name="description"
                                        placeholder="Please enter meta description, use for seo">{{ $data->meta_description }}</textarea><br>



                                </div>

                            </div>



                            <div class="col-md-12">

                                <label for="inputText" class="col-form-label">PDF File


                                    <span style="color:green;font-size:12px;"> [{{ $data->file_download }}]
                                    </span>
                                    <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                        (
                                        <?php
                                        echo formatSizeUnits($data->pdfsize);
                                        ?>)
                                    </span>


                                </label>

                                <div class="">

                                    <a href="{{ url('page/pdf/' . $data->file_download) }}" download>

                                        <img src="{{ asset('admin/images/viewpdf.jpg') }}" width="140">

                                    </a>

                                </div>

                            </div>





                            <div class="col-md-12">

                                <label for="inputText" class="col-form-label">Banner image</label>

                                <div class="">


                                    @if (isset($data->banner_image))
                                        <img src="{{ asset('page/banner/' . $data->banner_image) }}" style="width: 100%" />
                                    @else
                                        <img src="public/banner.png" />
                                    @endif

                                    <input type="hidden" class="form-control" name="bannernameold"
                                        value="{{ $data->banner_image }}"><br>

                                </div>

                            </div>





                            <div class="col-md-12">

                                <label for="inputText" class="col-form-label">Banner image text</label>

                                <div class="">

                                    <input type="text" class="form-control"name="banner_title"
                                        placeholder="Please enter text for title of banner photo, use for seo"
                                        value="{{ $data->banner_title }}" readonly>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <label for="inputText" class="col-form-label">Banner image alt </label>

                                <div class="">

                                    <input type="text" class="form-control"name="banner_alt"
                                        placeholder="Please enter text for alt of banner photo, use for seo"
                                        value="{{ $data->banner_alt }}" readonly>

                                </div>

                            </div>



                            <div class="col-md-12">

                                <label for="inputText" class="col-form-label">Content Photo</label>

                                <div class="">

                                    @if (isset($data->cover_image))
                                        <img src="{{ asset('page/image/' . $data->cover_image) }}" style="width: 100%" />
                                    @else
                                        <img src="photo-path/default.png" />
                                    @endif

                                    <input type="hidden" class="form-control" name="imagenameold"
                                        value="{{ $data->cover_image }}"><br>



                                </div>

                            </div>





                            <div class="col-md-6">

                                <label for="inputText" class="col-form-label">Content image text</label>

                                <div class="">

                                    <input type="text" class="form-control"name="cover_title"
                                        placeholder="Please enter text for title of content photo, use for seo"
                                        value="{{ $data->cover_title }}" readonly>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <label for="inputText" class="col-form-label">Content image alt</label>

                                <div class="">

                                    <input type="text" class="form-control"name="cover_alt"
                                        placeholder="Please enter text for title of content photo, use for seo"
                                        value="{{ $data->cover_alt }}" readonly>

                                </div>

                            </div>



                            <div class="col-md-6">

                                <label for="inputText" class="col-form-label">Sort Order</label>

                                <div class="">

                                    <input type="text" class="form-control" name="sort_order"
                                        placeholder="Please enter sorting position number"
                                        value="{{ $data->sort_order }}" readonly>

                                </div>

                            </div>






                            {{--
                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Archive_range</label>

                                    <div class="col-sm-10">

                                        <input type="date" class="form-control" name="delete_range"
                                            value="{{ $data->delete_range }}"><br>



                                        @error('delete_range')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>



                                </div> --}}



                            {{-- <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Status</label>

                                    <div class="col-sm-12">

                                        <select class="form-control" aria-label="Default select example" name="status">

                                            <option selected>Please select status</option>

                                            <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>

                                            <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>


                                        </select>

                                    </div>

                                </div> --}}





                            <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">





                            <div class="col-md-12">

                                <div class="col-sm-12">

                                    &nbsp;

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



        <!-- content-wrapper ends -->



    @endsection
