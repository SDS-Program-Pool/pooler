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

                        <?php
                                dd($project_data);
                        ?>
                     
                        <tr>
                            <td>02/02/2002</td>
                            <td>9958</td>
                            <td>Unity Pugh</td>
                            <td>$12.00</td>
                            <td><span class="badge bg-primary">Processing</span></td>
                        </tr>
                        <tr>
                            <td>02/02/2002</td>
                            <td>8971</td>
                            <td>Theodore Duran</td>
                            <td>$25.00</td>
                            <td><span class="badge bg-primary">Processing</span></td>
                        </tr>
                        <tr>
                            <td>02/02/2002</td>
                            <td>3147</td>
                            <td>Kylie Bishop</td>
                            <td>$16.00</td>
                            <td><span class="badge bg-info">Pending Payment</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row gx-5">
            <div class="col-xl-6 mb-5">
                <div class="card card-raised h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <div class="me-4">
                                <h2 class="display-6 mb-0">Privacy Suggestions</h2>
                                <p class="card-text">Take our privacy checkup to choose which settings are right for you.</p>
                            </div>
                            <img src="assets/img/illustrations/security.svg" alt="..." style="height: 6rem" />
                        </div>
                    </div>
                    <div class="card-footer bg-transparent position-relative ripple-gray px-4"><a class="stretched-link text-decoration-none" href="#!">Review suggestions (4)</a></div>
                </div>
            </div>
            <div class="col-xl-6 mb-5">
                <div class="card card-raised h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <div class="me-4">
                                <h2 class="display-6 mb-0">Account Storage</h2>
                                <p class="card-text">Your account storage is shared across all devices.</p>
                                <div class="progress mb-2" style="height: 0.25rem"><div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="30"></div></div>
                                <div class="card-text">10 GB of 30 GB used</div>
                            </div>
                            <img src="assets/img/illustrations/cloud.svg" alt="..." style="height: 6rem" />
                        </div>
                    </div>
                    <div class="card-footer bg-transparent position-relative ripple-gray px-4"><a class="stretched-link text-decoration-none" href="#!">Manage storage</a></div>
                </div>
            </div>
        </div>
    </div>
</main>                       
@endsection