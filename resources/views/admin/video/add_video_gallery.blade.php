@extends('admin.Layout.master')

@section('title', 'Add Video Category')

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">



            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">{{ 'Add Video Category' }}</h4>
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





                            <form class="forms-sample row col-md-12" id="regForm" method="POST"
                                action="{{ url('/Accounts/add_videopost') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="col-md-12">
                                    <label for="type" class="col-sm-12 col-form-label">Page Content Type</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" aria-label="Default select example" name="type"
                                        value="{{ old('type') }}"><br>
                                        <option selected>Please select status</option>
                                        <option value="1">Inner page section</option>
                                        <option value="0">Home Section</option>
                                    </select><br>

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="name" class="col-sm-12 col-form-label">Page Title*</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Please enter content page title" value="{{ old('name') }}"><br>



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
                                        <input type="text" class="form-control"name="name_h"
                                            placeholder="Please enter content page title in hindi"
                                            value="{{ old('name_h') }}"><br>

                                            <label for="name_h" id="name_h-error" class="error">
                                                @error('name_h')
                                                    {{ $message }}
                                                @enderror
                                            </label>
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <label for="content" class="col-sm-12 col-form-label">Page Content</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" id="content" rows="4" name="content" placeholder="Please enter content">{{ old('content') }}</textarea><br>


                                        <label for="content" id="content-error" class="error">
                                            @error('content')
                                                {{ $message }}
                                            @enderror
                                        </label>


                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="content_h" class="col-sm-12 col-form-label">विवरण</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" id="content_h" rows="4" name="content_h"
                                            placeholder="Please enter content in hindi">{{ old('content_h') }}</textarea><br>

                                            <label for="content_h" id="content_h-error" class="error">
                                                @error('content_h')
                                                    {{ $message }}
                                                @enderror
                                            </label>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Title*</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tittle"
                                            placeholder="Please enter meta tittle, use for seo"
                                            value="{{ old('tittle') }}"><br>


                                            <label for="tittle" id="tittle-error" class="error">
                                                @error('tittle')
                                                    {{ $message }}
                                                @enderror
                                            </label>

                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">Meta Keywords*</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" id="keyword" rows="4" name="keyword"
                                            placeholder="Please enter meta keywords, use for seo">{{ old('keyword') }}</textarea><br>

                                            <label for="keyword" id="keyword-error" class="error">
                                                @error('keyword')
                                                    {{ $message }}
                                                @enderror
                                            </label>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="col-sm-12 col-form-label">Meta Description*</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control"  rows="4" id="description" name="description"
                                            placeholder="Please enter meta description, use for seo">{{ old('description') }}</textarea><br>


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
                                        <input type="file" class="form-control" name="bannerimage"
                                            placeholder="Please browse banner image" accept=".jpeg,.jpg,.gif,.png"><br>

                                            <label for="bannerimage" id="bannerimage-error" class="error">
                                                @error('bannerimage')
                                                    {{ $message }}
                                                @enderror
                                            </label>


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">Banner Title </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="banner_title"
                                            placeholder="Please enter text for title of banner photo, use for seo"
                                            value="{{ old('banner_title') }}"><br>

                                            <label for="banner_title" id="banner_title-error" class="error">
                                                @error('banner_title')
                                                    {{ $message }}
                                                @enderror
                                            </label>

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">Banner Alt </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="banner_alt"
                                            placeholder="Please enter text for alt of banner photo, use for seo"
                                            value="{{ old('banner_alt') }}"><br>

                                            <label for="banner_alt" id="banner_alt-error" class="error">
                                                @error('banner_alt')
                                                    {{ $message }}
                                                @enderror
                                            </label>

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">Content Image</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="imagename"
                                            accept=".jpeg,.png,.gif,.jpg" placeholder="Please browse content image"
                                            ><br>

                                            <label for="imagename" id="imagename-error" class="error">
                                                @error('imagename')
                                                    {{ $message }}
                                                @enderror
                                            </label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">Content Image text </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"name="cover_title"
                                            placeholder="Please enter text for title of content photo, use for seo"
                                            value="{{ old('cover_title') }}"><br>

                                            <label for="cover_title" id="cover_title-error" class="error">
                                                @error('cover_title')
                                                    {{ $message }}
                                                @enderror
                                            </label>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">Content Image Alt </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"name="cover_alt"
                                            placeholder="Please enter text for title of content photo, use for seo"
                                            value="{{ old('cover_alt') }}"><br>

                                            <label for="cover_alt" id="cover_alt-error" class="error">
                                                @error('cover_alt')
                                                    {{ $message }}
                                                @enderror
                                            </label>

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">PDF File</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="pdf"
                                            placeholder="Please browse PDF file" accept="application/pdf,application/vnd.ms-excel"><br>

                                            <label for="pdf" id="pdf-error" class="error">
                                                @error('pdf')
                                                    {{ $message }}
                                                @enderror
                                            </label>


                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">Sort Order</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="sort_order"
                                            placeholder="Please enter sorting position number"
                                            value="{{ old('sort_order') }}"><br>

                                            <label for="sort_order" id="sort_order-error" class="error">
                                                @error('sort_order')
                                                    {{ $message }}
                                                @enderror
                                            </label>

                                    </div>
                                </div>

                                <input type="hidden" class="form-control" name="url" value="video-section"><br>




                                {{-- <div class="col-md-12">
                                    <label for="inputText" class="col-sm-12 col-form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" aria-label="Default select example" name="status"
                                            value="{{ old('status') }}"><br>
                                            <option selected>Please select status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select><br><br>

                                        <label for="status" id="status-error" class="error">
                                            @error('status')
                                                {{ $message }}
                                            @enderror
                                        </label>

                                    </div>
                                </div> --}}


                                  <input  type="hidden" name="status" value="0">




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
