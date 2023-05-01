@extends('layouts.app')
@section('content')

    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ URL('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Client & Prospects</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body px-xl-4 px-sm-2 px-0 mt-0">
      <div class="card">
        <div class="card-body">
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
                                        <th>highest qualification</th>
                                        {{-- <th>work experience</th> --}}
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
                                                    <span class="badge bg-info"> {{$case->gender==''?'':($case->gender=='1'?'M ':'F ')}} {{ App\Http\Controllers\Controller::ageFromDOB($case->date_of_birth) }}</span>
                                                </label>
                                            </td>
                                            <td>{{ $case->highest_qualification }} @if($case->work_experience>0) <span class="badge bg-success">{{ $case->work_experience }} Y Exp</span> @endif </td>
                                            {{-- <td>{{ $case->work_experience }}</td> --}}
                                            <td>{{ $case->visa_name }}</td>
                                            @if(Auth::user()->role==2)
                                                <td>{{ $case->name }}</td>
                                            @endif
                                            <td>
                                                <a href="{{ url('client-profile') . '/' . Crypt::encryptString( $case->id ) }}"
                                                    class="btn m-1 btn-primary btn-animate-6"><span
                                                        class="btntext">View</span>
                                                    <div class="btninfo bg-success">Client</div>
                                                </a>
                                                <a href="{{ url('client-prospect-details') . '/' . Crypt::encryptString( $case->id ) }}"
                                                  class="btn m-1 btn-primary btn-animate-6"><span
                                                      class="btntext">Prospect</span>
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
@endsection
    