@extends('admin.Layout.master')

@section('title', 'Event & Activity Image')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Event & Activity Image</h4>

                            <p class="card-description">

                            </p>



                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Multiple Image</label>
                                <div class="">

                                        <img src="{{ asset('uploads/multiple/event_image/'.$event->image) }}"
                                            style="height: 120px;  width: 120px;" loading="lazy">

                                    <br>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Image Text</label>
                                <div class="">
                                    <input type="text" class="form-control" name="image_title" placeholder="Please enter"
                                        readonly value="{{ $event->image_title }}"><br>
                                    <label for="image_title" id="image_title-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">Image Alt</label>
                                <div class="">
                                    <input type="text" class="form-control" name="image_alt" placeholder="Please enter"
                                        readonly value="{{ $event->image_alt }}"><br>
                                    <label for="image_alt" id="image_alt	-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputText" class="col-form-label">sort order</label>
                                <div class="">
                                    <input type="number" class="form-control" name="order" value="{{ $event->order }}"
                                        readonly placeholder="Please enter" value=""><br>
                                    <label for="order" id="order-error" class="error"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="Commmittee_type" class="col-form-label">Title</label>
                                <div class="">
                                    <select class="form-control" name="parent_id">
                                        <option value="" disabled> Select Type </option>
                                        @foreach ($event as $title)
                                            <option value="{{ $event->id }}"> {{ $event->title }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

    </div>



@endsection
