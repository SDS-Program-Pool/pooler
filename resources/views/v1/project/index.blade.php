@extends('v1.layouts.app')

@section('content')
<main>
    <!-- Page header-->
    <header class="bg-primary">
        <div class="container-xl p-5">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-md mb-4 mb-md-0">
                    <h1 class="mb-1 display-4 fw-500 text-white">My Projects</h1>
                    <p class="lead mb-0 text-white">Your dashboard is ready to go!</p>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl p-5">
        <div class="card card-raised mb-5">
            <div class="card-header bg-transparent px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-4">
                        <h2 class="display-6 mb-0">Orders</h2>
                        <div class="card-text">Details and history</div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{route('projects.create')}}">upload</a>
                        <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">upload</i></button>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <!-- Simple DataTables example-->
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th data-type="date" data-format="DD/MM/YYYY">Start Date</th>
                            <th>Order No.</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($project_data as $project)

                        <tr>
                            <td>02/02/2002</td>
                            <td>{{$project->id}}</td>
                            <td>Test</td>
                            <td>Value</td>
                            <td><span class="badge bg-primary">Processing</span></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>                       
@endsection