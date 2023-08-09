@extends('admin.Layout.master')

@section('title', 'View News Event')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">  View News Event </h4>

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

                                <div class="form-group">

                                    <label for="event" class="col-form-label">Type*</label>

                                    <select class="form-control" disabled aria-label="Default select example" name="type">

                                        <option selected>Please select Type</option>

                                        <option value="1" {{ $data->type == 1 ? 'selected' : '' }}>News</option>

                                        <option value="0" {{ $data->Type == 0 ? 'selected' : '' }}>Event</option>

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="title">Title *</label> <input id="title"
                                        type="text"   value="{{ $data->title }}"   readonly
                                        name="title" class="form-control" placeholder="Please enter name*">

{{--
                                    <label for="title" id="title-error" class="error">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </label> --}}

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="title_h">Title[Hindi] *</label> <input id="title_h"
                                         value="{{ $data->title_h }}" readonly
                                        type="text" name="title_h" class="form-control"
                                        placeholder="Please enter name_h*">

                                    {{-- <label for="title_h" id="title_h-error" class="error">
                                        @error('title_h')
                                            {{ $message }}
                                        @enderror
                                    </label> --}}

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="image">Image (45px * 45px)</label><span
                                        style="color:green;font-size:12px;">

                                            [{{ $data->image }}]

                                    </span>




                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group"> <label for="file_title">File Text*</label> <input id="file_title"
                                      value="{{ $data->file_title }}" readonly
                                        type="text" name="file_title" class="form-control"
                                        placeholder="Please enter file title*">

                                    <label for="file_title" id="file_title-error" class="error">
                                        @error('file_title')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group"> <label for="file_alt">File Alt *</label> <input id="file_alt"
                                         ($id) value="{{ $data->file_alt }}" readonly
                                        type="text" name="file_alt" class="form-control"
                                        placeholder="Please enter file Alt*">

                                    <label for="file_alt" id="file_alt-error" class="error">
                                        @error('file_alt')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="url">Url link*</label>
{{--
                                   <input type="radio" value="0" name="external"  @if($id) {{ ($data->external=='0')? "checked" : "" }} @endif style="margin-left:30px;" id="select_box" >  <label> &nbsp;Internal URL </label>

                                    <input type="radio" value="1" name="external"  @if($id) {{ ($data->external=="1")? "checked" : "" }}  @endif style="margin-left:30px;" id="checkbox">  <label> &nbsp;External URL  </label> --}}


                                    <input id="url"
                                        value="{{ $data->url }}"
                                        type="text" name="url" class="form-control"
                                        placeholder="Please enter file Alt*">



                                </div>

                            </div>

                            {{-- <div class="col-md-6">

                                <label for="event">Status</label>

                                <select class="form-control" aria-label="Default select example" name="status">

                                    <option selected>Please select status</option>

                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>

                                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>

                                </select>

                            </div> --}}



                            <div class="clearfix"></div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endsection
