@extends('layouts.app')
@section('content')


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
      <div class="row align-items-start">
        <div class="col">
            <div class="d-flex text-center">
                <div class="p-2 flex-fill">
                  <span class="text-muted">Design</span>
                  <h5>4.55K</h5>
                  <small class="text-success"><i class="fa fa-angle-up"></i> 1.03%</small>
                </div>
                <div class="p-2 flex-fill">
                  <span class="text-muted">Dev</span>
                  <h5>7.44K</h5>
                  <small class="text-danger"><i class="fa fa-angle-down"></i> 1.63%</small>
                </div>
                <div class="p-2 flex-fill">
                  <span class="text-muted">SEO</span>
                  <h5>2.33K</h5>
                  <small class="text-success"><i class="fa fa-angle-up"></i> 4.33%</small>
                </div>
              </div>
        </div>
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0">

          <div class="input-group">
            <input class="form-control" type="text" name="daterange">
            <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Send Report"><i
                class="fa fa-envelope"></i></button>
            <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Download Reports"><i
                class="fa fa-download"></i></button>
            <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Generate PDF"><i
                class="fa fa-file-pdf-o"></i></button>
            <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Share Dashboard"><i
                class="fa fa-share-alt"></i></button>
          </div>

          
            <script src="{{asset('assets/js/bundle/daterangepicker.bundle.js')}}"></script> 

          <script>
            // date range picker
            $(function () {
              $('input[name="daterange"]').daterangepicker({
                opens: 'left'
              }, function (start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
              });
            })
          </script>
        </div>
      </div>
    </div>
  </div>

  <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
      <div class="row g-3 row-deck">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card overflow-hidden">
            <div class="card-body">
              <i class="fa fa-user fa-lg position-absolute top-0 end-0 p-3"></i>
              <div class="mb-2 text-uppercase">NEW EMPLOYEE</div>
              <div><span class="h4">51</span> <span class="small text-muted"><i class="fa fa-level-up"></i> 13%</span>
              </div>
              <small class="text-muted">Analytics for last week</small>
            </div>
            <div class="progress" style="height: 2px;">
              <div class="progress-bar bg-secondary" role="progressbar" style="width: 85%" aria-valuenow="85"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card overflow-hidden">
            <div class="card-body">
              <i class="fa fa-group fa-lg position-absolute top-0 end-0 p-3"></i>
              <div class="mb-2 text-uppercase">TOTAL EMPLOYEE</div>
              <div><span class="h4">372</span> <span class="small text-muted"><i class="fa fa-level-up"></i> 8%</span>
              </div>
              <small class="text-muted">Analytics for last Year</small>
            </div>
            <div class="progress" style="height: 2px;">
              <div class="progress-bar bg-secondary" role="progressbar" style="width: 45%" aria-valuenow="45"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card overflow-hidden">
            <div class="card-body">
              <i class="fa fa-credit-card fa-lg position-absolute top-0 end-0 p-3"></i>
              <div class="mb-2 text-uppercase">TOTAL SALARY</div>
              <div><span class="h4">$25 k</span> <span class="small text-muted"><i class="fa fa-level-up"></i>
                  4.26%</span></div>
              <small class="text-muted">Analytics for last Month</small>
            </div>
            <div class="progress" style="height: 2px;">
              <div class="progress-bar bg-secondary" role="progressbar" style="width: 23%" aria-valuenow="23"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card overflow-hidden">
            <div class="card-body">
              <i class="fa fa-pie-chart fa-lg position-absolute top-0 end-0 p-3"></i>
              <div class="mb-2 text-uppercase">AVG. SALARY</div>
              <div><span class="h4">$1050</span> <span class="small text-muted"><i class="fa fa-level-up"></i>
                  11.2%</span></div>
              <small class="text-muted">Analytics for last Year</small>
            </div>
            <div class="progress" style="height: 2px;">
              <div class="progress-bar bg-secondary" role="progressbar" style="width: 17%" aria-valuenow="17"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        
        <div class="col-xxl-5 col-xl-7 col-lg-5 col-md-12">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title m-0">Reports overview</h6>
              <div class="dropdown morphing scale-left">
                <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                    class="icon-size-fullscreen"></i></a>
                <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-h"></i></a>
                <ul class="dropdown-menu shadow border-0 p-2">
                  <li><a class="dropdown-item" href="#">File Info</a></li>
                  <li><a class="dropdown-item" href="#">Copy to</a></li>
                  <li><a class="dropdown-item" href="#">Move to</a></li>
                  <li><a class="dropdown-item" href="#">Rename</a></li>
                  <li><a class="dropdown-item" href="#">Block</a></li>
                  <li><a class="dropdown-item" href="#">Delete</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <h3>$7,431.14 USD</h3>

              <div class="progress rounded-pill mb-2" style="height: 4px;">
                <div class="progress-bar chart-color1" role="progressbar" style="width: 15%" aria-valuenow="15"
                  aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar chart-color2" role="progressbar" style="width: 30%" aria-valuenow="30"
                  aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar chart-color3" role="progressbar" style="width: 20%" aria-valuenow="20"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex justify-content-between">
                <span>0%</span>
                <span>100%</span>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table card-table table-nowrap mb-0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Change</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><i class="fa fa-circle me-2 chart-text-color1"></i>Gross value</td>
                    <td>$3,500.71</td>
                    <td><span class="badge bg-light text-dark">+12.1%</span></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle me-2 chart-text-color2"></i>Net volume from sales</td>
                    <td>$2,980.45</td>
                    <td><span class="badge bg-light text-dark">+6.9%</span></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle me-2 chart-text-color3"></i>New volume from sales</td>
                    <td>$950.00</td>
                    <td><span class="badge bg-light text-dark">-1.5%</span></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle me-2 chart-text-color4"></i>Other</td>
                    <td>32</td>
                    <td><span class="badge bg-light text-dark">1.9%</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xxl-7 col-xl-12 col-lg-7 col-md-12">
          <div class="card">
            <div class="card-body">

              <ul class="nav nav-tabs tab-page-toolbar rounded-pill d-inline-flex">
                <li class="nav-item"><a class="nav-link rounded-pill border-0 active" data-bs-toggle="tab"
                    href="#EmployeePerformance">Employee Performance</a></li>
                <li class="nav-item"><a class="nav-link rounded-pill border-0" data-bs-toggle="tab"
                    href="#NewEmployee">New Employee</a></li>
              </ul>
            </div>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane in active" id="EmployeePerformance">
                <div class="table-responsive">
                  <table id="myDataTable" class="table card-table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Performance</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><img src="../assets/img/xs/avatar1.jpg" class="avatar sm rounded-circle" alt=""></td>
                        <td>Marshall Nichols</td>
                        <td><span>UI UX Designer</span></td>
                        <td><span class="badge bg-success">Good</span></td>
                      </tr>
                      <tr>
                        <td><img src="../assets/img/xs/avatar2.jpg" class="avatar sm rounded-circle" alt=""></td>
                        <td>Susie Willis</td>
                        <td><span>Designer</span></td>
                        <td><span class="badge bg-warning">Average</span></td>
                      </tr>
                      <tr>
                        <td><img src="../assets/img/xs/avatar3.jpg" class="avatar sm rounded-circle" alt=""></td>
                        <td>Francisco Vasquez</td>
                        <td><span>Team Leader</span></td>
                        <td><span class="badge bg-primary">Excellent</span></td>
                      </tr>
                      <tr>
                        <td><img src="../assets/img/xs/avatar4.jpg" class="avatar sm rounded-circle" alt=""></td>
                        <td>Erin Gonzales</td>
                        <td><span>Android Developer</span></td>
                        <td><span class="badge bg-danger">Weak</span></td>
                      </tr>
                      <tr>
                        <td><img src="../assets/img/xs/avatar5.jpg" class="avatar sm rounded-circle" alt=""></td>
                        <td>Ava Alexander</td>
                        <td><span>UI UX Designer</span></td>
                        <td><span class="badge bg-success">Good</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="NewEmployee">
                <div class="table-responsive">
                  <table class="table card-table table-striped table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Number</th>
                        <th>Department</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Dean Otto</td>
                        <td>22</td>
                        <td>+404-447-6013</td>
                        <td><span class="badge bg-primary">React</span></td>
                      </tr>
                      <tr>
                        <td>K. Thornton</td>
                        <td>23</td>
                        <td>+404-447-6013</td>
                        <td><span class="badge bg-info">Angular</span></td>
                      </tr>
                      <tr>
                        <td>Kane D.</td>
                        <td>22</td>
                        <td>+404-447-4582</td>
                        <td><span class="badge bg-warning">Laravel</span></td>
                      </tr>
                      <tr>
                        <td>Jack Bird</td>
                        <td>24</td>
                        <td>+404-447-3214</td>
                        <td><span class="badge bg-success">VueJs</span></td>
                      </tr>
                      <tr>
                        <td>Hughe L.</td>
                        <td>22</td>
                        <td>+404-447-2589</td>
                        <td><span class="badge bg-primary">React</span></td>
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

