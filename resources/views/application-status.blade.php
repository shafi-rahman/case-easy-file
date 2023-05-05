@extends('layouts.app')
@section('content')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Application Status</li>
                    </ol>
                </div>
            </div>
            
        </div>
    </div>

    <div class="body-area">

        <div class="container-fluid">
            <div class="tab-content">
                <div class="row g-3">
                    <div class="col-8">
                        <div class="card fieldset border border-primary">
                            <div class="row g-2 mb-5">
                                <div class="col-12">
                                    <div class="custom_scroll">
                                        <h4 class="modal-title">Process of your Application</h4>
                                        <p class="text-muted">Application submitted to IRCC &nbsp;<i class="fa fa-clock-o"></i> {{$irccStatus[0]->submit_date_to_ircc}}</p>
                                            @if(count($irccStatus)>0)
                                            <div class="card bg-body p-md-4 p-2 mb-2">
                                                <p class="mb-1">Application number: <span class="fw-bold">{{$irccStatus[0]->application_no}}</span></p>
                                                <p class="mb-0">UCI number: <span class="fw-bold">{{$irccStatus[0]->uci_no}}</span></p>
                                                <p class="mb-0">Application type: <span class="fw-bold">{{$irccStatus[0]->application_type}}</span></p>
                                            </div>
                                            <ul class="timeline-activity list-unstyled mb-0">
                                            
                                                @foreach($irccStatus as $ircc)
                                                    <li class="activity px-3 py-2 mb-1">
                                                        <span class="act_date">{{date("d M Y", strtotime($ircc->created_at))}}</span>
                                                        <div class="fw-bold small d-flex justify-content-between align-items-center">
                                                            {{$ircc->ircc_file_status}}
                                                            @if($ircc->application_outcome==1) 
                                                                <span class="badge bg-success">Visa Granted</span>
                                                            @endif
                                                            @if($ircc->application_outcome==2) 
                                                                <span class="badge bg-danger">Visa Refused</span>
                                                            @endif
                                                        </div>
                                                        <span class="d-flex text-muted mb-3 small">{{$ircc->ircc_status_notes}}</span>
                                                    </li>
                                                @endforeach
                                            @endif

                                            {{-- <li class="activity px-3 py-2 mb-1" data-date="12:30 - Sun">
                                                <div
                                                    class="fw-bold small d-flex justify-content-between align-items-center">
                                                    Account Created<span class="badge bg-warning">ID: 215</span></div>
                                            </li>
                                            <li class="activity px-3 py-2 mb-1" data-date="12:31 - Sun">
                                                <div class="fw-bold small">Persnal Details Updated</div>
                                                <div>
                                                </div>
                                            </li>
                                            <li class="activity px-3 py-2 mb-1" data-date="12:32 - Sun">
                                                <div
                                                    class="fw-bold small d-flex justify-content-between align-items-center">
                                                    Selected Visa Type<span class="badge bg-success">Done</span></div>
                                                <div>
                                                    <h5 class="mb-0 text-success">Canada PR</h5>
                                                    <small class="text-muted">Now we are starting for this documentation</small>
                                                </div>
                                            </li> --}}
                                            
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="OrderTracking" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <h4 class="modal-title">Order Tracking</h4>
                    <p class="text-muted">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks
                        as necessary</p>
                    <div class="card bg-body p-md-4 p-2 mb-2">
                        <p class="mb-1">Expected Arrival <span>01/06/2022</span></p>
                        <p class="mb-0">ThemeMakker <span class="fw-bold"><a href="#">V504KO</a></span></p>
                    </div>
                    <ul class="timeline-activity list-unstyled mb-0">
                        <li class="activity px-3 py-2 mb-1" data-date="12:30 - Sun">
                            <div class="fw-bold small d-flex justify-content-between align-items-center">New Order <span
                                    class="badge bg-warning">ID: 215</span></div>
                            <div>
                                <small class="text-muted">1 Burger, 1 Corn Rice curd</small>
                            </div>
                        </li>
                        <li class="activity px-3 py-2 mb-1" data-date="12:31 - Sun">
                            <div class="fw-bold small">Order Received</div>
                            <div>
                            </div>
                        </li>
                        <li class="activity px-3 py-2 mb-1" data-date="12:32 - Sun">
                            <div class="fw-bold small">Payment Verify</div>
                            <div>
                                <h5 class="mb-0 text-success">$80.5 - Done</h5>
                                <small class="text-muted">NetBanking</small>
                            </div>
                        </li>
                        <li class="activity px-3 py-2 mb-1" data-date="12:35 - Sun">
                            <div class="fw-bold small">Order inprogress</div>
                            <div>
                                <label class="me-2">Team:</label>
                                <a href="#" title="avatar"><img class="avatar xs rounded"
                                        src="assets/img/xs/avatar3.jpg" alt="friend"> </a>
                                <a href="#" title="avatar"><img class="avatar xs rounded"
                                        src="assets/img/xs/avatar1.jpg" alt="friend"> </a>
                                <a href="#" title="avatar"><img class="avatar xs rounded"
                                        src="assets/img/xs/avatar7.jpg" alt="friend"> </a>
                            </div>
                        </li>
                        <li class="activity px-3 py-2 mb-1" data-date="12:55 - Sun">
                            <div class="fw-bold small">Delivery on the way</div>
                            <div>
                                <p class="mb-1 small text-muted"><i class="fa fa-map-marker ps-1"></i> 123 6th St.
                                    Melbourne, FL 32904</p>
                                <a href="#" title="avatar"><img class="avatar xs rounded"
                                        src="assets/img/xs/avatar5.jpg" alt="friend"> </a>
                                <label class="ms-1">Robert Hammer</label>
                            </div>
                        </li>
                        <li class="activity px-3 py-2 mb-1" data-date="01:10 - Sun">
                            <div class="fw-bold small d-flex justify-content-between align-items-center">Delivery<span
                                    class="badge bg-success">Done</span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
