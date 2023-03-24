@extends('layouts.app')
@section('content')

<div class="modal fade" id="paymentinfo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-body custom_scroll p-lg-5">
                <button type="button"
                    class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title">Payment Details</h5>
                <p class="text-muted small">*If you are going to use a passage of Lorem
                    Ipsum, you need</p>
                <ul class="list-unstyled custom_scroll mb-0">
                    <li class="card p-3 my-1 flex-row">
                        <h2 class="rounded-circle bg-primary ps-1 pe-3 text-white">1</h2>
                        <div class="flex-fill ms-3">
                            <div class="h6 mb-0">₹ 25000</div>
                            <span class="text-muted small"><i class="fa fa-clock-o"></i> 12 Dec 2022 </span>
                        </div>
                        <div class="d-flex align-items-center">
                            <button class="btn mx-1 btn-light-success"><i
                                    class="fa fa-check"></i><span
                                    class="d-none d-lg-inline-block ms-2">Received</span></button>
                        </div>
                    </li>
                    <li class="card p-3 my-1 flex-row">
                        <h2 class="rounded-circle bg-primary ps-1 pe-3 text-white">2</h2>
                        <div class="flex-fill ms-3">
                            <div class="h6 mb-0">₹ 25000</div>
                            <span class="text-muted small"><i class="fa fa-clock-o"></i> 12 Jan 2023</span>
                        </div>
                        <div class="d-flex align-items-center">
                        <button class="btn mx-1 btn-light-success"><i
                            class="fa fa-check"></i><span
                            class="d-none d-lg-inline-block ms-2">Received</span></button>
                        </div>
                    </li>
                    <li class="card p-3 my-1 flex-row">
                        <h2 class="rounded-circle bg-primary ps-1 pe-3 text-white">3</h2>
                        <div class="flex-fill ms-3">
                            <div class="h6 mb-0">₹ 16000</div>
                            <span class="text-muted small"><i class="fa fa-clock-o"></i> 12 Feb 2023</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <button class="btn mx-1 btn-light-success"><i
                                class="fa fa-check"></i><span
                                class="d-none d-lg-inline-block ms-2">Received</span></button>
                        </div>
                    </li>
                    <li class="card p-3 my-1 flex-row">
                        <h2 class="rounded-circle bg-primary ps-1 pe-3 text-white">4</h2>
                        <div class="flex-fill ms-3">
                            <div class="h6 mb-0">₹ 20000</div>
                            <span class="text-muted small"><i class="fa fa-clock-o"></i> 12 Mar 2022</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <a class="btn mx-1 btn-light-danger" href="{{ url('client-profile') }}"><i
                                class="fa fa-times"></i> Connect for payment</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Lead</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3 row-deck">
                
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title m-0">{{ ucwords(str_replace("-", " ", Crypt::decryptString($type))) }}</h6>
                            <div class="dropdown morphing scale-left">
                                <a href="#" class="btn btn-outline-success"><i class="fa fa fa-refresh"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive border-top">
                            <table class="table card-table table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client Name</th>
                                        <th>Due Date</th>
                                        <th>Installment</th>
                                        <th>Installment Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="{{ url('client-profile') }}"><i class="fa fa-circle me-2 chart-text-color1"></i>Nita kumari</a></td>
                                        <td>12 feb 2023</td>
                                        <td>3rd outof 5</td>
                                        <td>₹ 35000</td>
                                        <td>
                                            <button class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" data-bs-toggle="modal"
                                            data-bs-target="#paymentinfo" ><span>Payment Info</span></button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
