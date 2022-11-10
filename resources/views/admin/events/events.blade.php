@extends('admin.layout')

@section('main')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>EVENTS </h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Home </a></li>
                                    <li class="breadcrumb-item active">Events</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    @include("admin.inc.errors")

                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>All Events </h4>
                                </div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#add-modal">
                                        Add New
                                    </button>
                                </div>

                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Small_body</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($events as $event)
                                                    <tr>
                                                        <td class="data-event-id">{{ $event->id }}</td>
                                                        <td class="data-event-title">{{ $event->title }}</td>
                                                        <td class="data-event-small_body">{!! $event->small_body !!}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info edit-btn"
                                                            data-event-id ="{{ $event->id }}"
                                                            data-event-title="{{ $event->title }}"
                                                            data-event-small_body="{{ $event->small_body }}"
                                                            data-event-body="{{ $event->body }}"
                                                            data-toggle="modal"
                                                            data-target="#edit-modal">
                                                                <i class="ti-pencil-alt"></i>
                                                            </button>
                                                            <a href="{{url("dashboard/events/delete/$event->id")}}" class="btn btn-sm btn-danger">
                                                                <i class="ti-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->


                </section>
            </div>
        </div>
    </div>



    <div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">



                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New</h3>
                        </div>


                        <form method="POST" action="{{route("admin.store-events")}}"  id="add-form" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>title</label>
                                    <input type="text" name="title" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>small_body</label>
                                    <textarea name="small_body" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>body</label>
                                    <textarea name="body" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <input type="file" name="image" id="" >
                                </div>
                        </form>
                    </div>



                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="add-form" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="edit-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">



                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit</h3>
                        </div>


                        <form method="POST" action="{{route("admin.update-events")}}"  id="edit-form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="edit-form-id">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="title" class="form-control"id="edit-form-title" >
                                </div>
                                <div class="form-group">
                                    <label>small_body</label>
                                    <textarea name="small_body" class="form-control" id="edit-form-small_body"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>body</label>
                                    <textarea name="body" class="form-control" id="edit-form-body"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <input type="file" name="image" id="" >
                                </div>
                        </form>
                    </div>



                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="edit-form" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')

<script>
    $('.edit-btn').click(function(){
        let id = $(this).attr('data-event-id')
        let title = $(this).attr('data-event-title')
        let small_body = $(this).attr('data-event-small_body')
        let body = $(this).attr('data-event-body')

        $('#edit-form-id').val(id)
        $('#edit-form-title').val(title)
        $('#edit-form-small_body').val(small_body)
        $('#edit-form-body').val(body)
    })
</script>
@endsection