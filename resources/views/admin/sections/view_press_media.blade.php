@extends('admin.Layout.master')

@section('title', 'View Press Media')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">View Press Media</h4>

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



                            </p>





                            <div class="col-md-6">

                                <div class="form-group"> <label for="heading">Heading *</label> <input id="heading"
                                        type="text"
                                         value="{{ $data->heading }}"    readonly
                                        name="heading" class="form-control" placeholder="Please enter heading*">




                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="heading_h">Heading[hindi] *</label> <input id="heading_h"
                                        type="text"
                                        value="{{ $data->heading_h }}" readonly
                                        name="heading_h" class="form-control" placeholder="Please enter heading Hindi*">




                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="form-group"> <label for="kdf">Pdf*</label><span
                                        style="color:green;font-size:12px;">

                                            [{{ $data->pdf }}]

                                    </span>
                                    @if($data->pdf!= '')

                                    <iframe src="{{ asset('uploads/prss_medias'.$data->pdf) }}" height="800px"
                                        width="100%" readonly></iframe>


                                    @endif

                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="media_publication">Media/publication*</label> <input id="media_publication"
                                        value="{{ $data->media_publication }}" readonly
                                        type="text" name="media_publication" class="form-control"
                                        placeholder="Please enter file title*">


                                </div>

                            </div>


                            <div class="col-md-6">
                                <label for="inputText" >Chairperson*</label>
                                <div class="">
                                    <select class="form-control" name="chairperson"  disabled>
                                        <option value=""> Select Type </option>
                                        <option value="">{{  $profile[0]->title }}</option>
                                    </select>

                                    <label for="chairperson" id="chairperson-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group"> <label for="publishing_link">Publishing link*</label>

                                   {{-- <input type="radio" value="0" name="external"  @if($id) {{ ($data->external=='0')? "checked" : "" }} @endif style="margin-left:30px;" id="select_box" >  <label> &nbsp;Internal URL </label>

                                    <input type="radio" value="1" name="external"  @if($id) {{ ($data->external=="1")? "checked" : "" }}  @endif style="margin-left:30px;" id="checkbox">  <label> &nbsp;External URL  </label> --}}


                                    <input id="publishing_link"
                                          value="{{ $data->publishing_link }}"  readonly
                                        type="text" name="publishing_link" class="form-control"
                                        placeholder="Please enter file Alt*">



                                </div>

                            </div>



                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endsection
