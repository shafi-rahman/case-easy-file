@extends('layouts.app')
@section('content')

    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ URL('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reporting</li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="fs-5 color-900 mt-1 mb-0">List of all {{ Crypt::decryptString(request()->segment(2)) }}</h1>
                    <small class="text-muted">You can filter by month.</small>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0 ">
                    <div class="input-group float-end" style="width: auto;">
                        <a class="btn btn-outline-primary {{Crypt::decryptString(request()->segment(2))=='payment'?'active text-white':''}}" href="{{ URL('reporting').'/'.Crypt::encryptString('payment') }}" data-bs-toggle="tooltip" title="See Payment Reports"><i
                                class="fa fa-database"></i> Payment Reporting</a>
                        <a class="btn btn-outline-primary {{Crypt::decryptString(request()->segment(2))=='case'?'active text-white':''}}" href="{{ URL('reporting').'/'.Crypt::encryptString('case') }}" data-bs-toggle="tooltip"
                            title="See Case Reports"><i class="fa fa-cubes"></i> Case Reporting</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body px-xl-4 px-sm-2 px-0 py-1 mt-0">
        @if(Crypt::decryptString(request()->segment(2))=='payment')
        <div class="container-fluid mb-3">
            <div class="row g-3 row-deck">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card overflow-hidden">
                        <a href="{{ url('reporting') . '/' . Crypt::encryptString('payment') }}">
                            <div class="card-body">
                                <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                                    width="26" fill="currentColor" viewBox="0 0 16 16">
                                    <path class="fill-primary" fill-rule="evenodd"
                                        d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                    <path class="fill-primary"
                                        d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                    <path class="fill-muted"
                                        d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                    <path class="fill-muted"
                                        d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                </svg>
                                <div class="mb-2 text-uppercase">Payment received</div>
                                <div><span class="h4">12,980</span> <span class="small text-muted"><i
                                            class="fa fa-dollar"></i></span></div>
                                <small class="text-muted">Payment received from client.</small>
                            </div>
                        </a>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="85"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card overflow-hidden">
                        <a href="{{ url('reporting') . '/' . Crypt::encryptString('payment') }}">
                            <div class="card-body">
                                <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                                    width="26" fill="currentColor" viewBox="0 0 16 16">
                                    <path class="fill-muted"
                                        d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                                    <path class="fill-primary"
                                        d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                                <div class="mb-2 text-uppercase">Payment Pending</div>
                                <div><span class="h4">39,000</span> <span class="small text-muted"><i
                                            class="fa fa-dollar"></i></span></div>
                                <small class="text-muted">Payment expected to receive</small>
                            </div>
                        </a>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                                aria-valuenow="13" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container-fluid mb-3">
            <div class="row g-3 row-deck">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card overflow-hidden">
                        <a href="{{ url('reporting') . '/' . Crypt::encryptString('case') }}">
                            <div class="card-body">
                                <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                                    width="26" fill="currentColor" viewBox="0 0 16 16">
                                    <path class="fill-muted"
                                        d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z" />
                                    <path class="fill-primary"
                                        d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
                                </svg>
                                <div class="mb-2 text-uppercase">Case status</div>
                                <div><span class="h4">13/37</span> <span class="small text-muted"><i class="fa fa-level-up"></i></span></div>
                                <small class="text-muted">Case qualified / total </small>
                            </div>
                        </a>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card overflow-hidden">
                        <a href="{{ url('reporting') . '/' . Crypt::encryptString('case') }}">
                            <div class="card-body">
                                <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                                width="26" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M5.33801 1.59C4.38559 1.85248 3.43965 2.1379 2.50101 2.446C2.41529 2.47376 2.3391 2.52504 2.28111 2.59399C2.22312 2.66295 2.18567 2.7468 2.17301 2.836C1.61901 6.993 2.89901 10.026 4.42601 12.024C5.07252 12.8784 5.84341 13.6311 6.71301 14.257C7.05901 14.501 7.36501 14.677 7.60601 14.79C7.72601 14.847 7.82401 14.885 7.89901 14.908C7.93181 14.9195 7.96562 14.9279 8.00001 14.933C8.03398 14.9275 8.06743 14.9191 8.10001 14.908C8.17601 14.885 8.27401 14.847 8.39401 14.79C8.63401 14.677 8.94101 14.5 9.28701 14.257C10.1566 13.6311 10.9275 12.8784 11.574 12.024C13.101 10.027 14.381 6.993 13.827 2.836C13.8145 2.74676 13.777 2.66285 13.719 2.59388C13.661 2.52491 13.5848 2.47366 13.499 2.446C12.848 2.233 11.749 1.886 10.662 1.591C9.55201 1.29 8.53101 1.067 8.00001 1.067C7.47001 1.067 6.44801 1.289 5.33801 1.59ZM5.07201 0.56C6.15701 0.265 7.31001 0 8.00001 0C8.69001 0 9.84301 0.265 10.928 0.56C12.038 0.86 13.157 1.215 13.815 1.43C14.0901 1.52085 14.334 1.68747 14.5187 1.9107C14.7034 2.13394 14.8213 2.40474 14.859 2.692C15.455 7.169 14.072 10.487 12.394 12.682C11.6824 13.621 10.834 14.4479 9.87701 15.135C9.5461 15.3728 9.19549 15.5819 8.82901 15.76C8.54901 15.892 8.24801 16 8.00001 16C7.75201 16 7.45201 15.892 7.17101 15.76C6.80452 15.5819 6.45391 15.3728 6.12301 15.135C5.16603 14.4478 4.31759 13.621 3.60601 12.682C1.92801 10.487 0.545005 7.169 1.14101 2.692C1.17869 2.40474 1.29665 2.13394 1.48132 1.9107C1.666 1.68747 1.9099 1.52085 2.18501 1.43C3.1402 1.11681 4.10281 0.826725 5.07201 0.56Z"></path>
                                    <path class="fill-secondary" d="M8 5.38462C8.21217 5.38462 8.41566 5.46566 8.56569 5.60992C8.71571 5.75418 8.8 5.94983 8.8 6.15385V6.53846H7.2V6.15385C7.2 5.94983 7.28429 5.75418 7.43431 5.60992C7.58434 5.46566 7.78783 5.38462 8 5.38462ZM9.2 6.53846V6.15385C9.2 5.84783 9.07357 5.55434 8.84853 5.33795C8.62348 5.12157 8.31826 5 8 5C7.68174 5 7.37652 5.12157 7.15147 5.33795C6.92643 5.55434 6.8 5.84783 6.8 6.15385V6.53846C6.58783 6.53846 6.38434 6.61951 6.23431 6.76376C6.08429 6.90802 6 7.10368 6 7.30769V9.23077C6 9.43478 6.08429 9.63044 6.23431 9.7747C6.38434 9.91896 6.58783 10 6.8 10H9.2C9.41217 10 9.61566 9.91896 9.76569 9.7747C9.91571 9.63044 10 9.43478 10 9.23077V7.30769C10 7.10368 9.91571 6.90802 9.76569 6.76376C9.61566 6.61951 9.41217 6.53846 9.2 6.53846Z"></path>
                                </svg>

                                <div class="mb-2 text-uppercase">agreement sign</div>
                                <div><span class="h4">17</span> <span class="small text-muted"><i
                                            class="fa fa-level-up"></i></span></div>
                                <small class="text-muted">Client closed & paid </small>
                            </div>
                        </a>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif


    
      <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="activeLead" role="tabpanel">
                    <div class="card">
                        <div class="card-header p-2" style="float: left; margin-bottom: -45px;">
                            <div class="col-4">
                                <div class="input-group">
                                    <select class="form-control">
                                        <option value="">Select Month</option>
                                        <option value="0">Jan 2023</option>
                                        <option value="1">Feb 2023</option>
                                        <option value="2">March 2023</option>
                                    </select>
                                    <button class="btn btn-outline-primary" type="button"
                                        id="button-addon2">Filter</button>
                                </div>
                            </div>
                        </div>
                        @if(Crypt::decryptString(request()->segment(2))=='payment')
                        <div class="table-responsive">
                            <table class="table card-table table-nowrap mb-0 leadTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>visa type</th>
                                        <th>Case Date</th>
                                        <th>Total Amount</th>
                                        <th>Total Payment</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($connected as $i=>$case)
                                        <tr>
                                            <td>{{ ($i+1) }}</td>
                                            <td>
                                                <label class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox"> {{ $case->first_name }}
                                                </label>
                                            </td>
                                            <td>{{ $case->date_of_birth }}</td>
                                            <td>{{ $case->highest_qualification }} @if($case->work_experience>0) <span class="badge bg-success">{{ $case->work_experience }} Work Exp</span> @endif </td>
                                            <td>{{ $case->work_experience }}</td>
                                            <td>{{ $case->visa_name }}</td>
                                            <td>{{ $case->name }}</td>
                                            <td>
                                                
                                                <a href="{{ url('client-prospect-details') . '/' . Crypt::encryptString( $case->id ) }}"
                                                  class="btn m-1 btn-primary btn-animate-6"><span
                                                      class="btntext">Prospect</span>
                                                  <div class="btninfo bg-success">view</div>
                                              </a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        @else 
                        <div class="table-responsive">
                            <table class="table card-table table-nowrap mb-0 leadTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>visa type</th>
                                        <th>visa Status</th>
                                        <th>Handled By</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($connected as $i=>$case)
                                        <tr>
                                            <td>{{ ($i+1) }}</td>
                                            <td>
                                                <label class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox"> {{ $case->first_name }}
                                                </label>
                                            </td>
                                            <td>{{ $case->date_of_birth }}</td>
                                            <td>{{ $case->highest_qualification }} @if($case->work_experience>0) <span class="badge bg-success">{{ $case->work_experience }} Work Exp</span> @endif </td>
                                            <td>{{ $case->work_experience }}</td>
                                            <td>{{ $case->visa_name }}</td>
                                            <td>{{ $case->name }}</td>
                                            <td>
                                                
                                                <a href="{{ url('client-prospect-details') . '/' . Crypt::encryptString( $case->id ) }}"
                                                  class="btn m-1 btn-primary btn-animate-6"><span
                                                      class="btntext">Prospect</span>
                                                  <div class="btninfo bg-success">view</div>
                                              </a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        @endif
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
                searching: false,
                paging: true,
                ordering: true,
                info: false,
                dom: 'Bfrtip',
                buttons: [
                  'csv', 'excel', 'pdf', 'print'
                ]
            });
            
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
            });
        });
    </script>
@endsection
    