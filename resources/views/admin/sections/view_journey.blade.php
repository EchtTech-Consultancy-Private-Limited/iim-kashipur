@extends('admin.Layout.master')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
@section('title','View Journey')



@section('content')

    <div class="main-panel">

        <div class="content-wrapper">

            <style>
               .yearpicker-container {
    position: absolute;
    color: var(--text-color);
    width: 280px;
    border: 1px solid var(--border-color);
    border-radius: 3px;
    font-size: 1rem;
    box-shadow: 1px 1px 8px 0px rgba(0, 0, 0, 0.2);
    background-color: var(--background-color);
    z-index: 10;
    margin-top: 0.2rem;
}

.yearpicker-header {
    display: flex;
    width: 100%;
    height: 2.5rem;
    border-bottom: 1px solid var(--border-color);
    align-items: center;
    justify-content: space-around;
}

.yearpicker-prev,
.yearpicker-next {
    cursor: pointer;
    font-size: 2rem;
}

.yearpicker-prev:hover,
.yearpicker-next:hover {
    color: var(--selected-text-color);
}

.yearpicker-year {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0.5rem;
}

.yearpicker-items {
    list-style: none;
    padding: 1rem 0.5rem;
    flex: 0 0 33.3%;
    width: 100%;
}

.yearpicker-items:hover {
    background-color: var(--hover-background-color);
    color: var(--selected-text-color);
    cursor: pointer;
}

.yearpicker-items.selected {
    color: var(--selected-text-color);
}

.hide {
    display: none;
}

.yearpicker-items.disabled {
    pointer-events: none;
    color: #bbb;
}
            </style>

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body row">

                            <h4 class="card-title col-md-12">View Journey</h4>

                            <p class="card-description">



                            </p>



                            <div class="col-md-6">

                                <div class="form-group"> <label for="title">NAME *</label> <input id="title"
                                        type="text"
                                          value="{{ $data->title }}" readonly
                                        name="title" class="form-control" placeholder="Please enter name*">




                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group"> <label for="title_h">NAME[Hindi] *</label> <input id="title_h"
                                       value="{{ $data->title_h }}" readonly
                                        type="text" name="title_h" class="form-control"
                                        placeholder="Please enter name_h*">




                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group"> <label for="heading">Heading*</label> <input id="heading"
                                        type="text"
                                       value="{{ $data->heading }}" readonly
                                        name="heading" class="form-control" placeholder="Please enter heading*">



                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group"> <label for="name_h">Heading[Hindi] *</label> <input
                                        id="heading_h"
                                        value="{{ $data->heading_h }}" readonly
                                        type="text" name="heading_h" class="form-control"
                                        placeholder="Please enter heading_h*">



                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"><label for="number">year *</label>
                                    <input id="number" type="number" placeholder="YYYY" min="2000"
                                      value="{{ $data->year }}" readonly
                                        name="number" class="form-control">





                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group"> <label for="image">Image (45px * 45px)</label><span style="color:green;font-size:12px;">[{{$data->file}}] </span>

                                    <img src="{{ asset('uploads/JourneyOrg/'.$data->file) ??''}}" width="500"  height="180" />



                                </div>

                            </div>




                        </div>

                    </div>

                </div>

            </div>

        </div>



    @endsection
