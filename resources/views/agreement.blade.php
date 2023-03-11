@extends('layouts.app')
@section('content')


<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="../index.html">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Documentation</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
                </ol>
            </div>
            <div class="col text-md-end">
                <a class="btn btn-secondary" href="doc-setup.html">Development Setup<i class="fa fa-long-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</div>


<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container">
        <div class="row g-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fa fa-thumbs-up me-2"></i>Getting Started</h5>
                    </div>
                    <div class="card-body">
                        <p class="lead">This guide will help you get started with <strong class="text-danger">LUNO</strong>!</p>
                        <p class="lead">All the important stuff –&nbsp;compiling the source, file structure, build tools, file includes –&nbsp;is documented here, but should you have any questions, always feel free to reach out to <span class="text-primary fw-bold"><a href="https://www.wrraptheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0473766574706c616961446369656d682a676b69">[email&nbsp;protected]</a></span></p>
                        <p class="lead">If you really like our work, design, performance and support then <a href="https://themeforest.net/downloads"> please don't forgot to rate us</a> on Themeforest,<br> it really motivate us to provide something better. <span class="ms-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
