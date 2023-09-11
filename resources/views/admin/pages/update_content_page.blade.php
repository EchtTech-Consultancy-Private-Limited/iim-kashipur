@extends('admin.Layout.master')

@section('title', ' Update Content Page')

@section('content')


    <div class="main-panel">



        <div class="content-wrapper">

            <div class="row">



                <div class="col-md-12 grid-margin stretch-card">



                    <div class="card">



                        <div class="card-body">



                            <h4 class="card-title">{{ 'Update Content Page' }}</h4>



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
                                action="{{ url('/Accounts/update_page_act' . '/' . dEncrypt($data->id)) }}"
                                enctype="multipart/form-data">

                                @csrf



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Page Title*</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control" name="name"
                                            placeholder="Please enter content page title" value="{{ $data->name }}" >



                                            <label for="name" id="name-error" class="error">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </label>


                                    </div>
                                </div>



                                <div class="col-md-12">

                                    <label for="name_h" class="col-sm-12 col-form-label">शीर्षक*</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="name_h" id="name_h"
                                            placeholder="Please enter content page title in hindi"
                                            value="{{ $data->name_h }}" required>

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

                                        <textarea class="form-control" id="content" rows="4" name="content" placeholder="Please enter content">{{ $data->content }}</textarea>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">विवरण</label>

                                    <div class="col-sm-12">

                                        <textarea class="form-control" id="content_h" rows="4" name="content_h"
                                            placeholder="Please enter content in hindi">{{ $data->content_h }}</textarea>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Tittle</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control" name="tittle"
                                            placeholder="Please enter meta tittle, use for seo"
                                            value="{{ $data->meta_title }}">

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Keywords</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control" name="keyword"
                                            placeholder="Please enter meta keywords, use for seo"
                                            value="{{ $data->meta_keywords }}">

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Description</label>

                                    <div class="col-sm-12">

                                        <textarea class="form-control" id="keyword" rows="4" name="description"
                                            placeholder="Please enter meta description, use for seo">{{ $data->meta_description }}</textarea><br>



                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-12 col-form-label">PDF File


                                        <span style="color:green;font-size:12px;"> [{{$data->file_download }}]
                                        </span>
                                        <span style="font-size: 12px;margin-left: 5px;color: #ed2044;">
                                            (
                                            <?php
                                                echo formatSizeUnits($data->pdfsize);
                                            ?>)
                                        </span>


                                    </label>

                                    <div class="col-sm-12">

                                        <input type="file" class="form-control" name="pdf"
                                            placeholder="Please browse PDF file"><br>

                                        <a href="{{ asset('pdf/' . $data->file_download) }}">PDF</a>

                                        <input type="hidden" class="form-control" name="pdfnameold"
                                            value="{{ $data->file_download }}"><br>



                                        <a href="{{ url('page/pdf/' . $data->file_download) }}" download>

                                            <img src="{{ asset('admin/images/viewpdf.jpg') }}" width="170"
                                                height="70">

                                        </a>

                                    </div>

                                </div>





                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Banner image</label>

                                    <div class="col-sm-12">

                                        <input type="file" class="form-control" name="bannerimage"
                                            placeholder="Please browse banner image"><br>



                                        @if (isset($data->banner_image))
                                            <img src="{{ asset('page/banner/' . $data->banner_image) }}" width="150"
                                                height="100" />
                                        @else
                                            <img src="public/banner.png" />
                                        @endif

                                        <input type="hidden" class="form-control" name="bannernameold"
                                            value="{{ $data->banner_image }}"><br>

                                    </div>

                                </div>





                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Banner image text</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="banner_title"
                                            placeholder="Please enter text for title of banner photo, use for seo"
                                            value="{{ $data->banner_title }}">

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Banner image alt </label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="banner_alt"
                                            placeholder="Please enter text for alt of banner photo, use for seo"
                                            value="{{ $data->banner_alt }}">

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Content Photo</label>

                                    <div class="col-sm-12">

                                        <input type="file" class="form-control" name="imagename"
                                            placeholder="Please browse content image"><br>

                                        @if (isset($data->cover_image))
                                            <img src="{{ asset('page/image/' . $data->cover_image) }}" width="150"
                                                height="100" />
                                        @else
                                            <img src="photo-path/default.png" />
                                        @endif

                                        <input type="hidden" class="form-control" name="imagenameold"
                                            value="{{ $data->cover_image }}"><br>



                                    </div>

                                </div>





                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Content image text</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="cover_title"
                                            placeholder="Please enter text for title of content photo, use for seo"
                                            value="{{ $data->cover_title }}">

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Content image alt</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control"name="cover_alt"
                                            placeholder="Please enter text for title of content photo, use for seo"
                                            value="{{ $data->cover_alt }}">

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <label for="inputText" class="col-sm-2 col-form-label">Sort Order</label>

                                    <div class="col-sm-12">

                                        <input type="text" class="form-control" name="sort_order"  id="mobile"
                                            placeholder="Please enter sorting position number"
                                            value="{{ $data->sort_order }}">

                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-2 col-form-label">Video url
                                        </label>
                                    <div class="col-sm-12">
                                        <input type="url" class="form-control" name="video_url"
                                            placeholder="Please enter video url!!"
                                            value="{{ $data->video_url }}"  id="video_url"><br>

                                            <label for="video_url" id="video_url-error" class="error">
                                                @error('video_url')
                                                    {{ $message }}
                                                @enderror
                                            </label>


                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-2 col-form-label">Video Title
                                        </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="video_title"
                                            placeholder="Please enter video title"
                                            value="{{ $data->video_title }}"  id="video_title"><br>

                                            <label for="video_title" id="video_title-error" class="error">
                                                @error('video_title')
                                                    {{ $message }}
                                                @enderror
                                            </label>


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

                                <input type="hidden" name="status" value="{{ $data->status }}">


                                @if($data->parent_id != '' || $data->parent_id != Null || $data->parent_id != '0')

                                 <input type="text" class="form-control" name="parent_id" value="{{$data->parent_id }}">

                                @else

                                <input type="text" class="form-control" name="id" value="{{ $data->id }}">

                                @endif


                                <div class="col-md-12">

                                    <div class="col-sm-12">

                                        &nbsp;

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <div class="col-sm-12">

                                        <button type="submit" class="btn btn-primary" onclick="load();" class="form-control">Save</button>

                                    </div>

                                </div>





                            </form>



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
