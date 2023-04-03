@extends('layouts.app')
@section('content')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, Allie!</h1>
                    <small class="text-muted">You have 12 new messages and 7 new notifications.</small>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3 row-deck">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                    <div class="card text-center bg-primary-gradient">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <div>
                                <h4 class="mt-4">Welcome, Easy Case File</h4>
                                <p class="card-text fs-6 mb-5"><strong>Need help?</strong> Check out the documentation of
                                    Luno Admin. It includes tons of <strong>Widgets</strong>, <strong>Components</strong>,
                                    and Elements with <strong>easy-to-follow</strong> documentation.</p>
                                    <button class="btn mx-2 btn-primary btn-animate-1 mb-2">
                                        <span>Take a Tour</span>
                                        <i class="fa fa-long-arrow-right"></i>
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Quick Start Guide</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="d-flex py-2 mb-2">
                                    <div class="avatar rounded no-thumbnail"><i class="fa fa-file-zip-o fa-lg"></i></div>
                                    <div class="flex-fill ms-3">
                                        <span>LUNO_admin.zip</span>
                                        <div class="progress mt-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 44%;"
                                                aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex py-2 mb-2">
                                    <div class="avatar rounded no-thumbnail"><i class="fa fa-file-pdf-o fa-lg"></i></div>
                                    <div class="flex-fill ms-3">
                                        <span>reposrt_2020.pdf</span>
                                        <div class="progress mt-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex py-2 mb-2">
                                    <div class="avatar rounded no-thumbnail"><i class="fa fa-file-code-o fa-lg"></i></div>
                                    <div class="flex-fill ms-3">
                                        <span>package.json</span>
                                        <div class="progress mt-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 10%;"
                                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex py-2 mb-2">
                                    <div class="avatar rounded no-thumbnail"><i class="fa fa-file-code-o fa-lg"></i></div>
                                    <div class="flex-fill ms-3">
                                        <span>bootstrap.min.css</span>
                                        <div class="progress mt-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%;"
                                                aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <small class="text-muted">Showing 4 out of 24 downloads.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
