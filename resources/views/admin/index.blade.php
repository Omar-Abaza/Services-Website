@extends('admin.layout')

@section('main')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><a href="{{route("admin.all-projects")}}">PROJECTS </a></h1>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Small_Desc</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $project)
                                                <tr>
                                                    <td class="data-project-id">{{ $project->id }}</td>
                                                    <td class="data-project-name">{{ $project->name }}</td>
                                                    <td class="data-project-small_desc">{!! $project->small_desc !!}</td>
                                                    <td></td>

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


<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><a href="{{route("admin.all-services")}}">SERVICES </a></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Small_Desc</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td class="data-service-id">{{ $service->id }}</td>
                                                    <td class="data-service-name">{{ $service->name }}</td>
                                                    <td class="data-service-small_desc">{!! $service->small_desc !!}</td>
                                                    <td>
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







<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1><a href="{{route("admin.all-events")}}">EVENTS </a></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">


                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Small_body</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($events as $event)
                                                <tr>
                                                    <td class="data-event-id">{{ $event->id }}</td>
                                                    <td class="data-event-title">{{ $event->title }}</td>
                                                    <td class="data-event-small_body">{!! $event->small_body !!}</td>
                                                    <td>
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


@endsection
