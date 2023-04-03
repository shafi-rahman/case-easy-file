@extends('layouts.app')
@section('content')

<div class="modal fade" id="ConnectionRequest" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content text-start">
          <div class="modal-body custom_scroll p-lg-5">
              <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              <h5 class="modal-title">Connection Request <code>at 15 feb 2023</code></h5>
              <p class="text-muted small">If you are going to use pick up this lead, you need to update the connecting
                  status.</p>
              <div class="card-body border-bottom">
                  <div class="d-flex align-items-md-start align-items-center flex-column flex-md-row pb-3">
                      <img src="assets/img/profile_av.png" alt="" class="rounded-4">
                      <div class="media-body ms-md-5 m-0 mt-4 mt-md-0 text-md-start text-center">
                          <h4 class="mb-2 fw-light">Dom Sing <span class="fs-6">25, Male, Single</span></h4>
                          <p>Mobile: 7878564534</p>
                          <p>Email: dom-sing@gmail.com</p>
                          <div
                              class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                              <div class="card py-2 px-3 me-2 mt-2">
                                  <small class="text-muted">From: </small>
                                  <div class="fs-6">India, UP, Noida.</div>
                              </div>
                              <div class="card py-2 px-3 me-2 mt-2">
                                  <small class="text-muted">Experience</small>
                                  <div class="fs-6">8+</div>
                              </div>
                          </div>
                      </div>

                  </div>

                  <a class="btn btn-primary mb-3 pull-right mt-2" href="{{ url('client-profile') }}"><i
                          class="fa fa-external-link me-2"></i>Preview</a>


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
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, Allie!</h1>
                    <small class="text-muted">You have 12 new messages and 7 new notifications.</small>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0">
                    <div class="input-group">
                        <input class="form-control" type="text" name="daterange">
                        <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Send Report"><i
                                class="fa fa-envelope"></i></button>
                        <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip"
                            title="Download Reports"><i class="fa fa-download"></i></button>
                        <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Generate PDF"><i
                                class="fa fa-file-pdf-o"></i></button>
                        <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Share Dashboard"><i
                                class="fa fa-share-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3 row-deck">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card overflow-hidden">
                        <a href="{{ url('lead') . '/' . Crypt::encryptString('payment-reminder') }}">
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
                                <div class="mb-2 text-uppercase">Today's Payment Reminder</div>
                                <div><span class="h4">7</span> <span class="small text-muted"><i
                                            class="fa fa-history"></i></span></div>
                                <small class="text-muted">Today's payment reminder.</small>
                            </div>
                        </a>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="85"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card overflow-hidden">
                        <a href="{{ url('lead') . '/' . Crypt::encryptString('today-recall') }}">
                            <div class="card-body">
                                <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                                    width="26" fill="currentColor" viewBox="0 0 16 16">
                                    <path class="fill-muted"
                                        d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                                    <path class="fill-primary"
                                        d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                                <div class="mb-2 text-uppercase">Today's Follow Ups</div>
                                <div><span class="h4">21</span> <span class="small text-muted"><i
                                            class="fa fa-lightbulb-o"></i></span></div>
                                <small class="text-muted">Schedule calls for today</small>
                            </div>
                        </a>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                                aria-valuenow="13" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card overflow-hidden">
                        <a href="{{ url('lead') . '/' . Crypt::encryptString('my-leads') }}">
                            <div class="card-body">
                                <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                                    width="26" fill="currentColor" viewBox="0 0 16 16">
                                    <path class="fill-muted"
                                        d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z" />
                                    <path class="fill-primary"
                                        d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
                                </svg>
                                <div class="mb-2 text-uppercase">My Closed LEADS</div>
                                <div><span class="h4">17</span> <span class="small text-muted"><i
                                            class="fa fa-level-up"></i></span></div>
                                <small class="text-muted">Client connected </small>
                            </div>
                        </a>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                  <div class="card">
                    <ul class="nav nav-tabs tab-card pt-3 " role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#activeLead" id="active_lead" role="tab">
                          <span class="d-none d-sm-inline">Active Lead</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#inActiveLead" id="in_active_lead" role="tab">
                          <span class="d-none d-sm-inline">In-active Lead</span>
                        </a>
                      </li>
                    </ul>
                    <div class="card-body">
                      <div class="tab-content mt-2">
                        <div class="tab-pane fade show active" id="activeLead" role="tabpanel">
                          <div class="card">
                            <div class="card-header p-2">
                              <h6 class="card-title m-0">List of all new lead</h6>
                              <div class="dropdown morphing scale-left">
                                <a href="#" class="btn btn-outline-success"><i class="fa fa fa-refresh"></i> Create Lead </a>
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
                                            <td><i class="fa fa-circle me-2 chart-text-color1"></i>Nita kumari</td>
                                            <td>Delhi</td>
                                            <td>12 feb 2023</td>
                                            <td>
                                              <a href="{{ url('client-profile') }}" class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Pick Lead</span><div class="btninfo bg-success">Click</div></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><i class="fa fa-circle me-2 chart-text-color2"></i>Varun Sharma</td>
                                            <td>Noida</td>
                                            <td>17 feb 2023</td>
                                            <td>
                                              <a href="{{ url('client-profile') }}" class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Pick Lead</span><div class="btninfo bg-success">Click</div></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><i class="fa fa-circle me-2 chart-text-color3"></i>Reena</td>
                                            <td>Merath</td>
                                            <td>12 mar 2023</td>
                                            <td>
                                              <a href="{{ url('client-profile') }}" class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Pick Lead</span><div class="btninfo bg-success">Click</div></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><i class="fa fa-circle me-2"></i>Other</td>
                                            <td>Haryana</td>
                                            <td>16 mar 2023</td>
                                            <td>
                                              <a href="{{ url('client-profile') }}" class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Pick Lead</span><div class="btninfo bg-success">Click</div></a>
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
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><i class="fa fa-circle me-2 chart-text-color1"></i>Nita kumari</td>
                                            <td>Delhi</td>
                                            <td>12 feb 2023</td>
                                            <td>Lead Closed - No Contact</td>
                                            <td>call many times, did not get response.</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><i class="fa fa-circle me-2 chart-text-color2"></i>Varun Sharma</td>
                                            <td>Noida</td>
                                            <td>17 feb 2023</td>
                                            <td>Lead Closed - No Contact</td>
                                            <td>number not rechable</td>
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
