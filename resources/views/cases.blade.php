@extends('layouts.app')
@section('content')
    
    {{-- from vue --}}
    <div id="root-upload-case-by-excel">
        {{-- @{{message}} --}} 
        <upload-case-by-excel></upload-case-by-excel>
    </div> 

    {{-- from vue --}}
    <div id="root-create-case-by-form">
        {{-- @{{message}} --}} 
        <create-case-by-form></create-case-by-form>
    </div> 


    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{url()}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cases</li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <div class="">
                        <button data-bs-toggle="modal" data-bs-target="#UploadCasesByExcel"
                            class="btn btn-outline-primary"><i class="fa fa-file-excel-o"></i> Upload Cases By
                            Excel</button>
                        <button data-bs-toggle="modal" data-bs-target="#CreateCaseByForm"
                            class="btn btn-outline-primary"><i class="fa fa-file-text-o"></i> Create Case By Form</button>
                    </div>
                </div>
                <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                    <div class="p-2 me-md-3">
                        <div><span class="h6 mb-0">540</span> <small class="text-secondary"><i
                                    class="fa fa-briefcase"></i></small></div>
                        <small class="text-muted text-uppercase">All Cases</small>
                    </div>
                    <div class="p-2 me-md-3">
                        <div><span class="h6 mb-0">120</span> <small class="text-secondary"><i
                                    class="fa fa-angle-up"></i>
                                42.2%</small></div>
                        <small class="text-muted text-uppercase">Connected</small>
                    </div>
                    <div class="p-2 pe-lg-0">
                        <div><span class="h6 mb-0">320</span> <small class="text-danger"><i class="fa fa-angle-down"></i>
                                57.8%</small></div>
                        <small class="text-muted text-uppercase">In-active</small>
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
                        <ul class="nav nav-tabs tab-card pt-3 " role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#activeLead" id="active_lead"
                                    role="tab">
                                    <span class="d-none d-sm-inline">Active</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#connectedLead" id="connected_lead"
                                    role="tab">
                                    <span class="d-none d-sm-inline">Connected</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#inActiveLead" id="in_active_lead"
                                    role="tab">
                                    <span class="d-none d-sm-inline">In-active</span>
                                </a>
                            </li>
                        </ul>
                        <div class="card-body">
                            <div class="tab-content mt-2">
                                <div class="tab-pane fade show active" id="activeLead" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <h6 class="card-title m-0">List of all new cases</h6>
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <select class="form-control">
                                                        <option value="">Select user to assing</option>
                                                        <option value="0">Nisha</option>
                                                        <option value="1">Ashish</option>
                                                        <option value="2">Nitin</option>
                                                    </select>
                                                    <button class="btn btn-outline-primary" type="button"
                                                        id="button-addon2">Assing</button>
                                                </div>
                                            </div>
                                            <div class="scale-left">
                                                <a href="#" class="btn btn-outline-success"><i
                                                        class="fa fa fa-refresh"></i> Refrish </a>
                                            </div>

                                        </div>
                                        <div class="table-responsive border-top">
                                            <table class="table card-table table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Location</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <label class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"> Nita
                                                                kumari
                                                            </label>
                                                        </td>
                                                        <td>Delhi</td>
                                                        <td>12 feb 2023</td>
                                                        <td>
                                                            <a href="{{ url('client-profile') . '/' . Crypt::encryptString('11') }}"
                                                                class="btn m-1 btn-primary btn-animate-6"><span
                                                                    class="btntext">Pick Lead</span>
                                                                <div class="btninfo bg-success">Click</div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <label class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox">Varun
                                                                Sharma
                                                            </label>
                                                        </td>
                                                        <td>Noida</td>
                                                        <td>17 feb 2023</td>
                                                        <td>
                                                            <a href="{{ url('client-profile') . '/' . Crypt::encryptString('11') }}"
                                                                class="btn m-1 btn-primary btn-animate-6"><span
                                                                    class="btntext">Pick Lead</span>
                                                                <div class="btninfo bg-success">Click</div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>
                                                            <label class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox">Reena
                                                            </label>
                                                        </td>
                                                        <td>Merath</td>
                                                        <td>12 mar 2023</td>
                                                        <td>
                                                            <a href="{{ url('client-profile') . '/' . Crypt::encryptString('11') }}"
                                                                class="btn m-1 btn-primary btn-animate-6"><span
                                                                    class="btntext">Pick Lead</span>
                                                                <div class="btninfo bg-success">Click</div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="connectedLead" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <h6 class="card-title m-0">List of all connected cases</h6>
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <select class="form-control">
                                                        <option value="">Select user to assing</option>
                                                        <option value="0">Nisha</option>
                                                        <option value="1">Ashish</option>
                                                        <option value="2">Nitin</option>
                                                    </select>
                                                    <button class="btn btn-outline-primary" type="button"
                                                        id="button-addon2">Assing</button>
                                                </div>
                                            </div>
                                            <div class="scale-left">
                                                <a href="#" class="btn btn-outline-success"><i
                                                        class="fa fa fa-refresh"></i> Refrish </a>
                                            </div>

                                        </div>
                                        <div class="table-responsive border-top">
                                            <table class="table card-table table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Location</th>
                                                        <th>Connected By</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <label class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"> Nita
                                                                kumari
                                                            </label>
                                                        </td>
                                                        <td>Delhi</td>
                                                        <td>Yusuf</td>
                                                        <td>15 feb 2023</td>
                                                        <td>In process</td>
                                                        <td>
                                                            <a href="{{ url('client-profile') . '/' . Crypt::encryptString('11') }}"
                                                                class="btn m-1 btn-primary btn-animate-6"><span
                                                                    class="btntext">View Details</span>
                                                                <div class="btninfo bg-success">Click</div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <label class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox">Varun
                                                                Sharma
                                                            </label>
                                                        </td>
                                                        <td>Noida</td>
                                                        <td>Yusuf</td>
                                                        <td>15 feb 2023</td>
                                                        <td>In process</td>
                                                        <td>
                                                            <a href="{{ url('client-profile') . '/' . Crypt::encryptString('11') }}"
                                                                class="btn m-1 btn-primary btn-animate-6"><span
                                                                    class="btntext">View Details</span>
                                                                <div class="btninfo bg-success">Click</div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>
                                                            <label class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox">Reena
                                                            </label>
                                                        </td>
                                                        <td>Merath</td>
                                                        <td>Yusuf</td>
                                                        <td>15 feb 2023</td>
                                                        <td>In process</td>
                                                        <td>
                                                            <a href="{{ url('client-profile') . '/' . Crypt::encryptString('11') }}"
                                                                class="btn m-1 btn-primary btn-animate-6"><span
                                                                    class="btntext">View Details</span>
                                                                <div class="btninfo bg-success">Click</div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="inActiveLead" role="tabpanel">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table card-table table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Location</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><i class="fa fa-circle me-2 chart-text-color1"></i>Nita kumari
                                                        </td>
                                                        <td>Delhi</td>
                                                        <td>12 feb 2023</td>
                                                        <td>Lead Closed - No Contact</td>
                                                        <td>call many times, did not get response.</td>
                                                        <td>
                                                            <div class="todo-action">
                                                                <span class="btn text-success done p-1"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="Re-store to active"><i
                                                                        class="fa fa-history"></i></span>
                                                                <span class="btn text-danger p-1" data-bs-toggle="tooltip"
                                                                    data-placement="top" title="Delete permanently"><i
                                                                        class="fa fa-trash-o"></i></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td><i class="fa fa-circle me-2 chart-text-color2"></i>Varun Sharma
                                                        </td>
                                                        <td>Noida</td>
                                                        <td>17 feb 2023</td>
                                                        <td>Lead Closed - No Contact</td>
                                                        <td>number not rechable</td>
                                                        <td>
                                                            <div class="todo-action">
                                                                <span class="btn text-success done p-1"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="Re-store to active"><i
                                                                        class="fa fa-history"></i></span>
                                                                <span class="btn text-danger p-1" data-bs-toggle="tooltip"
                                                                    data-placement="top" title="Delete permanently"><i
                                                                        class="fa fa-trash-o"></i></span>
                                                            </div>
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
        </div>
    </div>
@endsection
