@extends('admin.Layout.master')

@section('title', $title)

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">{{ $title }}</h4>

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

                            @if ($id)
                                <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                    action="{{ url('Accounts/add-press-media-edit-org/' . $id) }}" enctype="multipart/form-data">
                                @else
                                    <form class="forms-sample row col-md-12" method="POST" id="regForm"
                                        action="{{ url('Accounts/add-press-media-edit-org') }}" enctype="multipart/form-data">
                            @endif

                            @csrf




                            <div class="col-md-6">

                                <div class="form-group"> <label for="heading">Heading *</label> <input id="heading"
                                        type="text"
                                        @if ($id) value="{{ $data->heading }}" @else value="{{ old('heading') }}" @endif
                                        name="heading" class="form-control" placeholder="Please enter heading*">


                                    <label for="heading" id="heading-error" class="error">
                                        @error('heading')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="heading_h">Heading[hindi] *</label> <input id="heading_h"
                                        type="text"
                                        @if ($id) value="{{ $data->heading_h }}" @else value="{{ old('heading') }}" @endif
                                        name="heading_h" class="form-control" placeholder="Please enter heading Hindi*">


                                    <label for="heading_h" id="heading_h-error" class="error">
                                        @error('heading_h')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="form-group"> <label for="kdf">Pdf*</label><span
                                        style="color:green;font-size:12px;">
                                        @if ($id)
                                            [{{ $data->pdf }}]
                                        @endif
                                    </span>
                                    <input  type="file" name="file" accept=".pdf"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="media_publication">Media/publication*</label> <input id="media_publication"
                                        @if ($id) value="{{ $data->media_publication }}" @else value="{{ old('media_publication') }}" @endif
                                        type="text" name="media_publication" class="form-control"
                                        placeholder="Please enter file title*">

                                    <label for="media_publication" id="media_publication-error" class="error">
                                        @error('media_publication')
                                            {{ $message }}
                                        @enderror
                                    </label>

                                </div>

                            </div>


                            <div class="col-md-6">
                                <label for="inputText" >Chairperson*</label>
                                <div class="">
                                    <select class="form-control" name="chairperson" >
                                        <option value=""> Select Type </option>
                                        @foreach ($profile as $profiles )
                                        <option  value="{{$profiles->id }}" {{$profiles->id == $data->chairperson  ? 'selected' : ''}}>{{$profiles->title}}</option>
                                        @endforeach

                                    </select>

                                    <label for="chairperson" id="chairperson-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="publishing_link">Publishing link*</label>

                                   <input type="radio" value="0" name="external"  @if($id) {{ ($data->external=='0')? "checked" : "" }} @endif style="margin-left:30px;" id="select_box" >  <label> &nbsp;Internal URL </label>

                                    <input type="radio" value="1" name="external"  @if($id) {{ ($data->external=="1")? "checked" : "" }}  @endif style="margin-left:30px;" id="checkbox">  <label> &nbsp;External URL  </label>


                                    <input id="publishing_link"
                                        @if ($id) value="{{ $data->publishing_link }}" @else value="{{ old('publishing_link') }}" @endif
                                        type="text" name="publishing_link" class="form-control"
                                        placeholder="Please enter file Alt*">

                                    <label for="publishing_link" id="publishing_link-error" class="error">
                                        @error('publishing_link')
                                            {{ $message }}
                                        @enderror
                                    </label>

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

                            <input type="hidden" name="status" @if($id) value="{{ $data->status }}"  @else value="0" @endif>

                            <div class="clearfix"></div>

                            <div class="col-md-12">

                                <button type="submit" class="btn btn-primary mr-2"  onclick="load();">Submit</button>

                            </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endsection
