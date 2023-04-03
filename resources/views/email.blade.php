@extends('layouts.app')
@section('content')

    <div class="modal fade" id="CreateEmailTemplate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <h4 class="modal-title">Create Email Template</h4>
                    <div class="row g-2 mt-3">
                        <div class="col-12">
                            <label class="form-label">Handler</label>
                            <input type="text" class="form-control" placeholder="Handler">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Body</label>
                            <textarea class="form-control" rows="5" spellcheck="false"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                            </div>
                            <span class="text-muted small">If you need to active/inactive this template.</span>
                        </div>

                        <div class="col-12 mt-3">
                            <button class="btn btn-secondary text-uppercase" type="button"
                                data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary text-uppercase" type="button">Submit</button>
                        </div>
                    </div>
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
                        <li class="breadcrumb-item active" aria-current="page">Email</li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <div class="">
                        <button data-bs-toggle="modal" data-bs-target="#CreateEmailTemplate"
                            class="btn btn-outline-primary"><i class="fa fa-file-text-o"></i> Create Email Template</button>
                    </div>
                </div>
                <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                    <div class="p-2 me-md-3">
                        <div><span class="h6 mb-0">20</span> <small class="text-secondary"><i
                                    class="fa fa-envelope-o"></i></small></div>
                        <small class="text-muted text-uppercase">Templates</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3 row-deck">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table class="table card-table table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>handler</th>
                                                <th>subject</th>
                                                <th>status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>INR Receipt Attachment</td>
                                                <td>INR Receipt</td>
                                                <td>Active</td>
                                                <td>12 feb 2023</td>
                                                <td>
                                                    <a href="{{ url('client-profile') . '/' . Crypt::encryptString('11') }}"
                                                        class="btn m-1 btn-primary btn-animate-6"><span
                                                            class="btntext">Update</span>
                                                        <div class="btninfo bg-success">Click</div>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Invoice Mail Body</td>
                                                <td>Payment Receipt</td>
                                                <td>Active</td>
                                                <td>12 feb 2023</td>
                                                <td>
                                                    <a href="{{ url('client-profile') . '/' . Crypt::encryptString('11') }}"
                                                        class="btn m-1 btn-primary btn-animate-6"><span
                                                            class="btntext">Update</span>
                                                        <div class="btninfo bg-success">Click</div>
                                                    </a>
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
        </div>
    </div>
@endsection
