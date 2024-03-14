@extends('admin.Layout.master')
@section('title', 'Manage Position of director')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">


            @if (Session::has('success'))
                <div class="alert alert-success col-md-12 text-center">


                    <strong>Success!</strong> {{ Session::get('success') }}


                </div>
            @endif



            @if (Session::has('error'))
                <div class="alert alert-danger col-md-12 text-center">


                    <strong>Oops!</strong> {{ Session::get('error') }}


                </div>
            @endif


            <div class="row">


                <div class="col-md-12 grid-margin stretch-card">


                    <div class="card">


                        <div class="card-body">


                            <div class="top-menu-button">


                                <p class="card-title">Manage Individual Content Page</p>

                                <div>


                                    <button type="button" class="btn btn-primary"><a
                                            href="{{ route('admin.create.individual-pages') }}">Add
                                            New Page</a></button>


                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="example" class="display expandable-table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Title</th>
                                                <th>शीर्षक</th>
                                                <th data-field="user-status">Status</th>

                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @foreach($pages as $page)
                                                <tr>
                                                    <td>
                                                        {{$loop->iteration}}
                                                    </td>
                                                    <td>{{$page->name}}</td>
                                                    <td>{{$page->name_h}}</td>
                                                    <td>
{{--                                                        {{$page->status}}--}}
                                                        @if($page->status == 0)
                                                            <form action="{{ route('admin.individual-page.status',dEncrypt($page->id)) }}" method="post">
                                                                @csrf
                                                                <input type="hidden" value="1" name="status">
                                                                <input type="hidden" value="{{$page->status}}">
                                                                <button style="cursor: pointer; border: none; background: transparent;" type="submit">
                                                                    <span class="badge badge-danger">Inactive</span>
                                                                </button>
                                                            </form>
                                                        @endif
                                                            @if($page->status == 1)
                                                            <form action="{{ route('admin.individual-page.status',dEncrypt($page->id)) }}" method="post">
                                                                @csrf
                                                                <input type="hidden" value="0" name="status">
                                                                <input type="hidden" value="{{$page->status}}">
                                                                <button style="cursor: pointer;  border: none; background: transparent;" href="{{ route('admin.individual-page.status',dEncrypt($page->id)) }}">

                                                                    <span class="badge badge-success">Active</span>
                                                                </button>
                                                            </form>

                                                        @endif

                                                    </td>

                                                    <td>

                                                        <a href="{{ route('admin.edit.individual-pages',dEncrypt($page->id)) }}"
                                                           onclick="return confirm('Are you sure to edit this record?')"><i
                                                                class="ti-pencil btn-icon-append"
                                                                style="color:black;"></i> </a> &nbsp;


                                                        <a href="{{ route('admin.individual-page.delete',dEncrypt($page->id)) }}"
                                                           onclick="return confirm('Are you sure to delete this record?')"><i
                                                                class="ti-trash btn-icon-append"
                                                                style="color:black;"></i></a> &nbsp;
                                                        <button class="copyLinkButton btn btn-success btn-sm" title="{{$page->page_link}}">Copy Link</button>

                                                    </td>

                                                </tr>
                                            @endforeach

                                            </tbody>

                                            {{-- {{$data->links('pagination::bootstrap-5')}} --}}

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- content-wrapper ends -->



        <script>
            document.querySelectorAll(".copyLinkButton").forEach(function(button) {
                button.addEventListener("click", function() {
                    var link = this.getAttribute("title");
                    var tempInput = document.createElement("input");
                    tempInput.value = link;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    tempInput.setSelectionRange(0, 99999);
                    document.execCommand("copy");
                    document.body.removeChild(tempInput);
                    alert("Link copied to clipboard: " + link);
                });
            });
        </script>

        <!-- content-wrapper ends -->
@endsection
