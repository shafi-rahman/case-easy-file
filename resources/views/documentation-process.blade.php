@extends('layouts.app')
@section('content')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Documentation & Process</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="body-area">

        <div class="container-fluid ">
            <div class="card p-md-4 p-2">
                <div class="timeline-item ti-danger ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded-circle" src="assets/img/xs/avatar1.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1">Gerald Vaughn changed the status to QA on <strong>MA-86 - Retargeting
                                    Ads</strong></div>
                            <span class="d-flex text-muted mb-3 small">New Dashboard Design - 9:24PM by <a class="ms-2"
                                    href="#" title=""><strong>You</strong></a> </span>
                            <div class="card p-3"> I’ve prepared all sizes for you. Can you take a look tonight so we can
                                prepare my final invoice? </div>
                        </div>
                    </div>
                </div>
                <div class="timeline-item ti-info ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded-circle" src="assets/img/xs/avatar2.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1">Gerald Vaughn commented on <strong>DA-459 - Mediation: Demand Source Logo
                                    Size</strong></div>
                            <span class="d-flex text-muted mb-3 small">Portfolio Updates for Jason Carroll - 7:12PM by <a
                                    class="ms-2" href="#" title=""><strong>Orlando</strong></a> </span>
                        </div>
                    </div>
                </div>
                <div class="timeline-item ti-success ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded-circle" src="assets/img/xs/avatar1.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1">Gerald Vaughn changed the status to QA on <strong>MA-45 - Finish
                                    Prototype</strong></div>
                            <span class="d-flex text-muted mb-3 small">New Dashboard Design - 11:30AM by <a class="ms-2"
                                    href="#" title=""><strong>You</strong></a> </span>
                        </div>
                    </div>
                </div>
                <div class="timeline-item ti-primary ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded-circle" src="assets/img/xs/avatar1.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1">Create new development team for <strong>MA-86 - stocks for our Instagram
                                    channel</strong></div>
                            <span class="d-flex text-muted mb-3 small">Marketing Templates &amp; Strategy - 7:58AM by <a
                                    class="ms-2" href="#" title=""><strong>You</strong></a> </span>
                            <div class="card p-3"> What do you think about these? Should I continue in this style? </div>
                            <div class="project-members mt-3">
                                <label class="me-3">Team :</label>
                                <a href="#" title=""><img class="avatar xs rounded-circle"
                                        src="assets/img/xs/avatar3.jpg" alt="friend"> </a>
                                <a href="#" title=""><img class="avatar xs rounded-circle"
                                        src="assets/img/xs/avatar1.jpg" alt="friend"> </a>
                                <a href="#" title=""><img class="avatar xs rounded-circle"
                                        src="assets/img/xs/avatar7.jpg" alt="friend"> </a>
                                <a href="#" title=""><img class="avatar xs rounded-circle"
                                        src="assets/img/xs/avatar9.jpg" alt="friend"> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="timeline-item ti-warning ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded-circle" src="assets/img/xs/avatar4.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1">update new source code on GitHub <strong>MA-78 - Retargeting React
                                    Webapp</strong></div>
                            <span class="d-flex text-muted mb-3 small">New Dashboard Design - 9:24PM by <a class="ms-2"
                                    href="#" title=""><strong>Chris</strong></a> </span>
                            <div class="alert alert-success rounded"> I’ve prepared all sizes for you. Can you take a look
                                tonight so we can prepare my final invoice? </div>
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
