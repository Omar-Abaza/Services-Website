@extends('admin.layout')

@section('main')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>PROJECTS </h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Home </a></li>
                                    <li class="breadcrumb-item active">Projects</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->'
                    @include("admin.inc.errors")

                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>All Projects </h4>
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
                                                    <th>Name</th>
                                                    <th>Small_Desc</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projects as $project)
                                                    <tr>
                                                        <td class="data-project-id">{{ $project->id }}</td>
                                                        <td class="data-project-name">{{ $project->name }}</td>
                                                        <td class="data-project-small_desc">{!! $project->small_desc !!}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info edit-btn"
                                                            data-project-id ="{{ $project->id }}"
                                                            data-project-name="{{ $project->name }}"
                                                            data-project-small_desc="{{ $project->small_desc }}"
                                                            data-project-description="{{ $project->description }}"
                                                            data-toggle="modal"
                                                            data-target="#edit-modal">
                                                                <i class="ti-pencil-alt"></i>
                                                            </button>
                                                            <a href="{{url("dashboard/projects/delete/$project->id")}}" class="btn btn-sm btn-danger">
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

                        <form method="POST" action="{{route("admin.store-projects")}}"  id="add-form" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>small_desc</label>
                                    <textarea name="small_desc" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>description</label>
                                    <textarea name="description" class="form-control"></textarea>
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


                        <form method="POST" action="{{route("admin.update-projects")}}"  id="edit-form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="edit-form-id">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"id="edit-form-name" >
                                </div>
                                <div class="form-group">
                                    <label>small_desc</label>
                                    <textarea name="small_desc" class="form-control" id="edit-form-small_desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>description</label>
                                    <textarea name="description" class="form-control" id="edit-form-description"></textarea>
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
        let id = $(this).attr('data-project-id')
        let name = $(this).attr('data-project-name')
        let small_desc = $(this).attr('data-project-small_desc')
        let description = $(this).attr('data-project-description')

        $('#edit-form-id').val(id)
        $('#edit-form-name').val(name)
        $('#edit-form-small_desc').val(small_desc)
        $('#edit-form-description').val(description)
    })
</script>
@endsection