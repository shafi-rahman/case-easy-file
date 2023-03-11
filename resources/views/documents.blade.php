@extends('layouts.app')
@section('content')

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Billing</li>
                </ol>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-auto">
                <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, Allie!</h1>
                <small class="text-muted">You have 12 new messages and 7 new notifications.</small>
            </div>
            <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                <div class="p-2 me-md-3">
                    <div><span class="h6 mb-0">8.18K</span> <small class="text-secondary"><i class="fa fa-angle-up"></i> 1.3%</small></div>
                    <small class="text-muted text-uppercase">Income</small>
                </div>
                <div class="p-2 me-md-3">
                    <div><span class="h6 mb-0">1.11K</span> <small class="text-secondary"><i class="fa fa-angle-up"></i> 4.1%</small></div>
                    <small class="text-muted text-uppercase">Expense</small>
                </div>
                <div class="p-2 pe-lg-0">
                    <div><span class="h6 mb-0">3.66K</span> <small class="text-danger"><i class="fa fa-angle-down"></i> 7.5%</small></div>
                    <small class="text-muted text-uppercase">Revenue</small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body-area">
<div class="modal fade" id="Upgradeplan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-4">
                    <div class="mb-4">
                        <h4>Upgrade your plan</h4>
                        <p class="text-muted">Please make the payment to start enjoying all the features of our premium plan as soon as possible</p>
                    </div>
                    <input type="file" class="dropify">

                    <button class="btn btn-lg btn-primary text-uppercase w-100">Proceed to payment<i class="fa fa-long-arrow-right ms-3"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4">
        <div class="tab-content">
            <div class="row g-3">

                <div class="col-12">

                    <div class="card fieldset border border-primary">
                    <div class="row g-2 mb-5">
                      <div class="col-12">
                        <div class="row-title">
                          <div>
                            <h6 class="fw-bold mb-0">Recent Activity</h6>
                            <span class="text-muted">Based your preferences</span>
                          </div>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary"><i class="fa fa-align-left"></i></button>
                            <button type="button" class="btn btn-outline-primary"><i class="fa fa-th"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <table style="width: 100%;"
                          class="table align-middle table-bordered mb-0 custom-table-2 myDataTable_no_filter">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Modified</th>
                              <th>Shared with</th>
                              <th>Size</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <i class="fa fa-folder"></i>
                                <span class="me-4 ms-2">Web Design</span>
                                <span class="badge bg-light text-dark">Design</span>
                                <span class="badge bg-light text-dark">Project</span>
                              </td>
                              <td>12 April 2021</td>
                              <td>
                                <div class="shared-with">
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar1.jpg" alt="friend"> </a>
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar2.jpg" alt="friend"> </a>
                                </div>
                              </td>
                              <td>40MB</td>
                              <td>
                              <button class="btn btn-primary px-4 text-uppercase" data-bs-toggle="modal" data-bs-target="#Upgradeplan" type="button"><i class="fa fa-upload"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-warning" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Favorite"><i class="fa fa-star-o"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Manage"><i class="fa fa-gear"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-danger" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="fa fa-folder"></i>
                                <span class="me-4 ms-2">React Project</span>
                                <span class="badge bg-light text-dark">React</span>
                                <span class="badge bg-light text-dark">Dev</span>
                                <span class="badge bg-light text-dark">Clients</span>
                              </td>
                              <td>16 April 2021</td>
                              <td>
                                <div class="shared-with">
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar3.jpg" alt="friend"> </a>
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar4.jpg" alt="friend"> </a>
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar5.jpg" alt="friend"> </a>
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar6.jpg" alt="friend"> </a>
                                </div>
                              </td>
                              <td>345MB</td>
                              <td>
                                <button type="button" class="btn btn-link btn-sm text-warning" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Favorite"><i class="fa fa-star-o"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Manage"><i class="fa fa-gear"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-danger" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="fa fa-folder"></i>
                                <span class="me-4 ms-2">Graphics Design</span>
                                <span class="badge bg-light text-dark">Figma</span>
                                <span class="badge bg-light text-dark">Photoshop</span>
                              </td>
                              <td>16 April 2021</td>
                              <td>
                                <div class="shared-with">
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar6.jpg" alt="friend"> </a>
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar7.jpg" alt="friend"> </a>
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar8.jpg" alt="friend"> </a>
                                </div>
                              </td>
                              <td>880MB</td>
                              <td>
                                <button type="button" class="btn btn-link btn-sm text-warning" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Favorite"><i class="fa fa-star-o"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Manage"><i class="fa fa-gear"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-danger" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="fa fa-folder"></i>
                                <span class="me-4 ms-2">Marketing Strategy</span>
                                <span class="badge bg-light text-dark">Agency</span>
                              </td>
                              <td>Today</td>
                              <td>
                                <div class="shared-with">
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar6.jpg" alt="friend"> </a>
                                </div>
                              </td>
                              <td>12MB</td>
                              <td>
                                <button type="button" class="btn btn-link btn-sm text-warning" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Favorite"><i class="fa fa-star-o"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Manage"><i class="fa fa-gear"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-danger" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="fa fa-image"></i>
                                <span class="me-4 ms-2">App_design-iOS.jpg</span>
                                <span class="badge bg-light text-dark">Design</span>
                              </td>
                              <td>Yesterday</td>
                              <td>
                                <div class="shared-with">
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar9.jpg" alt="friend"> </a>
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar2.jpg" alt="friend"> </a>
                                </div>
                              </td>
                              <td>5MB</td>
                              <td>
                                <button type="button" class="btn btn-link btn-sm text-warning" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Favorite"><i class="fa fa-star-o"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Manage"><i class="fa fa-gear"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-danger" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="fa fa-file-excel-o"></i>
                                <span class="me-4 ms-2">work sheet.xls</span>
                                <span class="badge bg-light text-dark">Design</span>
                              </td>
                              <td>Yesterday</td>
                              <td>
                                <div class="shared-with">
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar3.jpg" alt="friend"> </a>
                                  <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Avatar"><img
                                      class="avatar xs rounded" src="assets/img/xs/avatar4.jpg" alt="friend"> </a>
                                </div>
                              </td>
                              <td>1.4MB</td>
                              <td>
                                <button type="button" class="btn btn-link btn-sm text-warning" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Favorite"><i class="fa fa-star-o"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Manage"><i class="fa fa-gear"></i></button>
                                <button type="button" class="btn btn-link btn-sm text-danger" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
