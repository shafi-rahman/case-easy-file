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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ URL('home') }}">Home</a></li>
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
                        <div><span class="h6 mb-0">{{ count($all_case) }}</span> <small class="text-secondary"><i
                                    class="fa fa-briefcase"></i></small></div>
                        <small class="text-muted text-uppercase">All Cases</small>
                    </div>
                    <div class="p-2 me-md-3">
                        <div><span class="h6 mb-0">{{ count($connected) }}</span> <small class="text-secondary"><i class="fa fa-angle-up"></i>
                            {{ App\Http\Controllers\Controller::calcPrecentage((count($all_case)+count($connected)+count($in_active)), count($connected)).'%' }}</small></div>
                        <small class="text-muted text-uppercase">Connected</small>
                    </div>
                    <div class="p-2 pe-lg-0">
                        <div><span class="h6 mb-0">{{ count($in_active) }}</span> <small class="text-danger"><i class="fa fa-angle-down"></i>
                            {{ App\Http\Controllers\Controller::calcPrecentage((count($all_case)+count($connected)+count($in_active)), count($in_active)).'%' }}</small></div>
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
                                            <table class="table card-table table-nowrap mb-0 leadTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Date of Birth</th>
                                                        <th>highest qualification</th>
                                                        <th>work experience</th>
                                                        <th>visa type</th>
                                                        @if(Auth::user()->role==2)
                                                            <th>Assign</th>
                                                        @endif
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($all_case as $i=>$case)
                                                        <tr>
                                                            <td>{{ ($i+1) }}</td>
                                                            <td>
                                                                <label class="form-check mb-0">
                                                                    <input class="form-check-input" type="checkbox"> {{ $case->first_name }}
                                                                </label>
                                                            </td>
                                                            <td>{{ $case->date_of_birth }}</td>
                                                            <td>{{ $case->highest_qualification }}</td>
                                                            <td>{{ $case->work_experience }}</td>
                                                            <td>{{ $case->visa_type }}</td>
                                                            @if(Auth::user()->role==2)
                                                                <td>{{ $case->name }}</td>
                                                            @endif
                                                            <td>
                                                                <a href="{{ url('client-profile') . '/' . Crypt::encryptString( $case->id ) }}"
                                                                    class="btn m-1 btn-primary btn-animate-6"><span
                                                                        class="btntext">Pick Lead</span>
                                                                    <div class="btninfo bg-success">Click</div>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
                                                        <th>Date of Birth</th>
                                                        <th>highest qualification</th>
                                                        <th>work experience</th>
                                                        <th>visa type</th>
                                                        @if(Auth::user()->role==2)
                                                            <th>Assign</th>
                                                        @endif
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($connected as $i=>$case)
                                                    <tr>
                                                        <td>{{ ($i+1) }}</td>
                                                        <td>
                                                            <label class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"> {{ $case->first_name }}
                                                            </label>
                                                        </td>
                                                        <td>{{ $case->date_of_birth }}</td>
                                                        <td>{{ $case->highest_qualification }}</td>
                                                        <td>{{ $case->work_experience }}</td>
                                                        <td>{{ $case->visa_type }}</td>
                                                        @if(Auth::user()->role==2)
                                                            <td>{{ $case->name }}</td>
                                                        @endif
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
                                                    @endforeach
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.leadTable').addClass('nowrap').dataTable({
                responsive: true,
                searching: true,
                paging: true,
                ordering: true,
                info: false,
            });
            
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
            });
        });
    </script>