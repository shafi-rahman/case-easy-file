@extends('layouts.app')
@section('content')
<style>

</style>
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{ URL('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Follow ups</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 ">
    <div class="container-fluid">
        <div class="row g-3 row-deck">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs tab-card pt-3 " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#activeLead" id="active_lead"
                                role="tab">
                                <span class="d-none d-sm-inline">Today's</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#inActiveLead" id="in_active_lead"
                                role="tab">
                                <span class="d-none d-sm-inline">Future's</span>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body p-0">
                        <div class="tab-content">
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
                                        {{-- <div class="scale-left">
                                            <a href="#" class="btn btn-outline-success"><i
                                                    class="fa fa fa-refresh"></i> Refrish </a>
                                        </div> --}}

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table card-table table-nowrap mb-0 leadTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>qualification</th>
                                                    <th>visa type</th>
                                                    <th>Status</th>
                                                    <th>followup </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($todayFollowups as $i=>$case)
                                                    @php $rbg=''; $rtxt=''; if(strtotime($case->followupDate)<strtotime(date('Y-m-d'))){ $rbg = 'bg-danger'; $rtxt='text-white'; } @endphp
                                                    <tr class="{{$rbg}}">
                                                        <td class="{{$rtxt}}">{{ ($i+1) }}</td>
                                                        <td>
                                                            <label class="form-check mb-0 {{$rtxt}}">
                                                                <input class="form-check-input" type="checkbox"> {{ $case->first_name }}
                                                                <span class="badge bg-info"> {{$case->gender==''?'':($case->gender=='1'?'M ':'F ')}} {{ App\Http\Controllers\Controller::ageFromDOB($case->date_of_birth) }}</span>
                                                            </label>
                                                        </td>
                                                        <td class="{{$rtxt}}">{{ $case->highest_qualification }} @if($case->work_experience>0) <span class="badge bg-success">{{ $case->work_experience }} Y Exp</span> @endif </td>
                                                        <td class="{{$rtxt}}">{{ $case->visa_name }}</td>
                                                        <td class="{{$rtxt}}">{{ $case->current_status }}</td>
                                                        <td class="{{$rtxt}}">{{ date('d M y H:i', strtotime($case->followupDate)) }}</td>
                                                        <td class="{{$rtxt}}">
                                                            <a href="{{ url('client-profile') . '/' . Crypt::encryptString( $case->id ) }}"
                                                                class="btn m-1 btn-primary btn-animate-6"><span
                                                                    class="btntext">Details</span>
                                                                <div class="btninfo bg-success">view</div>
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
                                        {{-- <div class="scale-left">
                                            <a href="#" class="btn btn-outline-success"><i
                                                    class="fa fa fa-refresh"></i> Refrish </a>
                                        </div> --}}

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table card-table table-nowrap mb-0 leadTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>highest qualification</th>
                                                    <th>work experience</th>
                                                    <th>visa type</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($futureFollowups as $i=>$case)
                                                    <tr>
                                                        <td>{{ ($i+1) }}</td>
                                                        <td>
                                                            <label class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox"> {{ $case->first_name }}
                                                                <span class="badge bg-info"> {{$case->gender==''?'':($case->gender=='1'?'M ':'F ')}} {{ App\Http\Controllers\Controller::ageFromDOB($case->date_of_birth) }}</span>
                                                            </label>
                                                        </td>
                                                        <td>{{ $case->highest_qualification }}</td>
                                                        <td>{{ $case->highest_qualification }} @if($case->work_experience>0) <span class="badge bg-success">{{ $case->work_experience }} Y Exp</span> @endif </td>
                                                        <td>{{ $case->visa_name }}</td>
                                                        <td>{{ $case->current_status }}</td>
                                                        <td>
                                                            <a href="{{ url('client-profile') . '/' . Crypt::encryptString( $case->id ) }}"
                                                                class="btn m-1 btn-primary btn-animate-6"><span
                                                                    class="btntext">Details</span>
                                                                <div class="btninfo bg-success">view</div>
                                                            </a>
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
</div>
@endsection
