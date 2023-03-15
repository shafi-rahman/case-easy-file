<template>
<div class="tab-content">

    <div class="tab-pane fade show active" id="personal_details" role="tabpanel">
        <div class="row g-3 row-deck">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                            width="26" fill="currentColor" viewBox="0 0 16 16">
                            <path class="fill-muted" d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                            <path class="fill-primary" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>
                        <div class="mb-2 text-uppercase">Personal Details</div>
                        <div><span class="h4">20</span> <span class="small text-muted"><i class="fa fa-level-up"></i>%</span></div>
                        <form class="row g-2 pt-3">
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" v-model="personalDetails.first_name" placeholder="First Name">
                                    <label>First Name</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" v-model="personalDetails.middle_name" placeholder="Middle Name">
                                    <label>First Name</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" v-model="personalDetails.last_name" placeholder="Last Name">
                                    <label>Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" v-model="personalDetails.email_id" placeholder="Email ID">
                                    <label>Email ID</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" v-model="personalDetails.mobile_number" placeholder="Mobile Number">
                                    <label>Mobile Number</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="date" class="form-control form-control-lg datepicker" v-model="personalDetails.date_of_birth" placeholder="Select date of birth">
                                    <label>Select date of birth</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 p-3">
                                <div class="form-floating">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">Select Gender <code></code></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineMale" value="option1">
                                        <label class="form-check-label" for="inlineMale">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineFemale" value="option2">
                                        <label class="form-check-label" for="inlineFemale">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <div class="col-12">
                                        <label class="form-group float-label">
                                            <select class="form-control form-control-lg custom-select" style="height: 58px;">
                                                <option value="1">Single</option>
                                                <option value="2">Married</option>
                                                <option value="3">Married With Kids</option>
                                                <option value="4">Seperated</option>
                                            </select>
                                            <span>Choose Martial Status</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" v-model="personalDetails.address" placeholder="First Name">
                                    <label>Address</label>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-floating">
                                    <div class="col-12">
                                        <label class="form-group float-label">
                                            <select class="form-control show-tick ms select2" style="height: 58px;" data-placeholder="Select">
                                                <option value="1">India</option>
                                                <option value="2">123123</option>
                                                <option value="3">sdawda</option>
                                                <option value="4">zxczxc</option>
                                            </select>
                                            <span>Country</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-floating">
                                    <div class="col-12">
                                        <label class="form-group float-label">
                                            <select class="form-control show-tick ms select2" style="height: 58px;" data-placeholder="Select">
                                                <option value="38">Canada</option>
                                            </select>
                                            <span>State</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-floating">
                                    <div class="col-12">
                                        <label class="form-group float-label">
                                            <select class="form-control show-tick ms select2" style="height: 58px;" data-placeholder="Select">
                                                <option>India</option>
                                            </select>
                                            <span>City</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" v-model="personalDetails.pin_code" placeholder="First Name">
                                    <label>Pin Code</label>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2 btn-lg" type="button">Save & Next</button>
                            </div>
                        </form>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="tab-pane fade" id="educational_details" role="tabpanel">
        <div class="row g-3 row-deck">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                            width="26" fill="currentColor" viewBox="0 0 16 16">
                            <path class="fill-muted"
                                d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                            <path class="fill-primary"
                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>
                        <div class="mb-2 text-uppercase">Educational Details</div>
                        <div><span class="h4">20</span> <span class="small text-muted"><i
                                    class="fa fa-level-up"></i>%</span></div>
                        <form class="row g-2 pt-3">
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="First Name">
                                    <label>First Name</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                    <label>Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="User ID">
                                    <label>User ID</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="professional_details" role="tabpanel">
        <div class="row g-3 row-deck">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg"
                            width="26" fill="currentColor" viewBox="0 0 16 16">
                            <path class="fill-muted"
                                d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                            <path class="fill-primary"
                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>
                        <div class="mb-2 text-uppercase">Professional Details</div>
                        <div><span class="h4">20</span> <span class="small text-muted"><i
                                    class="fa fa-level-up"></i>%</span></div>
                        <form class="row g-2 pt-3">
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="First Name">
                                    <label>First Name</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                    <label>Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="User ID">
                                    <label>User ID</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="document_details" role="tabpanel">
        <div class="row g-3">

            <div class="col-12">

                <div class="card fieldset border border-primary">
                    <span class="fieldset-tile text-primary bg-body">Recent Invoices:</span>
                    <div class="owl-carousel owl-theme" id="recent_invoices">
                        <div class="item card ribbon">
                            <div class="option-9 position-absolute text-light"><i class="fa fa-star"></i>
                            </div>
                            <div class="card-body">
                                <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">BB</div>
                                <small class="text-muted">Total</small>
                                <h4>USD 2,500</h4>
                                <ul class="lh-lg mb-0 text-muted">
                                    <li>Bucky Barnes</li>
                                    <li>#RA0015</li>
                                    <li>Jan 01 2022</li>
                                </ul>
                            </div>
                        </div>
                        <div class="item card">
                            <div class="card-body">
                                <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">DO</div>
                                <small class="text-muted">Total</small>
                                <h4>USD 5,520</h4>
                                <ul class="lh-lg mb-0 text-muted">
                                    <li>Dean Otto</li>
                                    <li>#RA0016</li>
                                    <li>Jan 03 2022</li>
                                </ul>
                            </div>
                        </div>
                        <div class="item card">
                            <div class="card-body">
                                <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">OL</div>
                                <small class="text-muted">Total</small>
                                <h4>USD 8,000</h4>
                                <ul class="lh-lg mb-0 text-muted">
                                    <li>Orlando Lentz</li>
                                    <li>#RA0017</li>
                                    <li>Jan 03 2022</li>
                                </ul>
                            </div>
                        </div>
                        <div class="item card">
                            <div class="card-body">
                                <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">AJ</div>
                                <small class="text-muted">Total</small>
                                <h4>USD 12,500</h4>
                                <ul class="lh-lg mb-0 text-muted">
                                    <li>Andew Jon</li>
                                    <li>#RA0018</li>
                                    <li>Jan 05 2022</li>
                                </ul>
                            </div>
                        </div>
                        <div class="item card">
                            <div class="card-body">
                                <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">AJ</div>
                                <small class="text-muted">Total</small>
                                <h4>USD 7,100</h4>
                                <ul class="lh-lg mb-0 text-muted">
                                    <li>Andew Jon</li>
                                    <li>#RA0018</li>
                                    <li>Jan 05 2022</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12">

                <div class="card fieldset border border-muted">
                    <span class="fieldset-tile text-muted bg-body">All Invoices:</span>
                    <table id="invoice_list" class="table card-table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check" style="font-size: 16px;">
                                        <input class="form-check-input select-all" type="checkbox" value="">
                                    </div>
                                </th>
                                <th>Invoice</th>
                                <th>Name</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0011 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar1.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Andew Jon</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 12,820</td>
                                <td>Jan 16 2022</td>
                                <td>Jan 20 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0012 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar2.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Orlando Lentz</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 2,000</td>
                                <td>Jan 15 2022</td>
                                <td>Jan 15 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0025 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar3.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Marshall Nichols</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 8,000</td>
                                <td>Jan 10 2022</td>
                                <td>Jan 12 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0023 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar4.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Nellie Maxwell</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 3,500</td>
                                <td>Jan 07 2022</td>
                                <td>Jan 08 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0026 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar5.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Marshall Nichols</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 250</td>
                                <td>Jan 06 2022</td>
                                <td>Jan 06 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0065 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar6.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Issa Bell</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 9,150</td>
                                <td>Jan 03 2022</td>
                                <td>Jan 05 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0015 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar7.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Dean Otto</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 5,000</td>
                                <td>Jan 03 2022</td>
                                <td>Jan 05 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0029 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar8.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Comeren Diaz</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 2,050</td>
                                <td>Jan 03 2022</td>
                                <td>Jan 05 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0028 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar9.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Chris Fox</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 2,000</td>
                                <td>Jan 03 2022</td>
                                <td>Jan 05 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr class="row-selectable">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td> #RA0035 </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/xs/avatar10.jpg" class="rounded-circle sm avatar"
                                            alt="">
                                        <div class="ms-2 mb-0">Bucky Barnes</div>
                                    </div>
                                </td>
                                <td class="fw-bold">USD 1,100</td>
                                <td>Feb 03 2022</td>
                                <td>Feb 05 2022</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                            class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                            class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-link btn-sm color-400"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>




                <div class="modal fade" id="invoice_send" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Invoice #RA0011</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body custom_scroll">
                                <table class="card p-2">
                                    <tr>
                                        <td></td>
                                        <td style="text-align: center; width: 100%;">
                                            <table class="table table-borderless mb-0" width="100%" cellpadding="0"
                                                cellspacing="0">
                                                <tr>
                                                    <td style="text-align: center;">
                                                        <h2 style="margin-bottom: 0;">$33.98 Paid</h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding-bottom: 30px 0; padding-top: 10px; text-align: center;">
                                                        <h4 style="margin-bottom: 0;">Thanks for using TTM Inc.
                                                        </h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 20px 0;">
                                                        <table width="100%">
                                                            <tr>
                                                                <td> Attn: <strong>Daniel Marek</strong> 43-190
                                                                    Mikolow, Poland<br> Email: <a
                                                                        href="https://www.wrraptheme.com/cdn-cgi/l/email-protection"
                                                                        class="__cf_email__"
                                                                        data-cfemail="9af7fbe8fff1dafefbf4f3fff6b4f9f5f7">[email&#160;protected]</a><br>
                                                                    Phone: +48 123 456 789<br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table
                                                                        class="table table-borderless table-striped mb-0"
                                                                        cellpadding="0" cellspacing="0">
                                                                        <tr>
                                                                            <td style="text-align: left;">
                                                                                Extended License</td>
                                                                            <td style="text-align: right;">
                                                                                $19.99</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="text-align: left;">1
                                                                                year subcription</td>
                                                                            <td style="text-align: right;">
                                                                                $9.99</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="text-align: left;">
                                                                                Instalation and Customization
                                                                            </td>
                                                                            <td style="text-align: right;">
                                                                                $4.00</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="text-align: right;"
                                                                                width="80%">
                                                                                <strong>Total</strong>
                                                                            </td>
                                                                            <td style="text-align: right;">
                                                                                $33.98</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 10px 0; text-align: center;">
                                                        <a href="#">View in browser</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0; text-align: center;"> TTM Inc. 70
                                                        Bowman St. South Windsor, CT 06074 </td>
                                                </tr>
                                            </table>
                                            <table width="100%" style="text-align: center; margin-top: 40px;">
                                                <tr>
                                                    <td class="aligncenter content-block">Questions? Email <a
                                                            href="mailto:"><span class="__cf_email__"
                                                                data-cfemail="81e8efe7eec1f5e9e4ece4ece0eaeae4f3afe2eeec">[email&#160;protected]</span></a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Send Email</button>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="invoice_detail" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Invoice #RA0011</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body custom_scroll">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td> Invoice <strong>01/Nov/2020</strong>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-danger"> <strong>Status:</strong>
                                                    Pending</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>From:</div>
                                                <div class="fs-6 fw-bold mb-1">Webz Poland</div>
                                                <div>Madalinskiego 8</div>
                                                <div>71-101 Szczecin, Poland</div>
                                                <div>Email: <a
                                                        href="https://www.wrraptheme.com/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="90f9fef6ffd0e7f5f2eabef3fffdbee0fc">[email&#160;protected]</a>
                                                </div>
                                                <div>Phone: +48 444 666 3333</div>
                                            </td>
                                            <td class="text-end">
                                                <div>To:</div>
                                                <div class="fs-6 fw-bold mb-1">Bob Mart</div>
                                                <div>Attn: Daniel Marek</div>
                                                <div>43-190 Mikolow, Poland</div>
                                                <div>Email: <a
                                                        href="https://www.wrraptheme.com/cdn-cgi/l/email-protection"
                                                        class="__cf_email__"
                                                        data-cfemail="d9b4b8abbcb299bdb8b7b0bcb5f7bab6b4">[email&#160;protected]</a>
                                                </div>
                                                <div>Phone: +48 123 456 789</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <table class="table table-borderless table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Item</th>
                                                            <th>Description</th>
                                                            <th class="text-end">Unit Cost</th>
                                                            <th class="text-center">Qty</th>
                                                            <th class="text-end">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td>Origin License</td>
                                                            <td>Extended License</td>
                                                            <td class="text-end">$999,00</td>
                                                            <td class="text-center">1</td>
                                                            <td class="text-end">$999,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td>Custom Services</td>
                                                            <td>Instalation and Customization (cost per hour)
                                                            </td>
                                                            <td class="text-end">$150,00</td>
                                                            <td class="text-center">20</td>
                                                            <td class="text-end">$3.000,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td>Hosting</td>
                                                            <td>1 year subcription</td>
                                                            <td class="text-end">$499,00</td>
                                                            <td class="text-center">1</td>
                                                            <td class="text-end">$499,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">4</td>
                                                            <td>Platinum Support</td>
                                                            <td>1 year subcription 24/7</td>
                                                            <td class="text-end">$3.999,00</td>
                                                            <td class="text-center">1</td>
                                                            <td class="text-end">$3.999,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <h6>Terms &amp; Condition</h6>
                                                                <p class="text-muted">You know, being a test
                                                                    pilot isn't always the healthiest business
                                                                    in the world. We predict too much for the
                                                                    next year and yet far too little for the
                                                                    next 10.</p>
                                                            </td>
                                                            <td colspan="3">
                                                                <table class="table table-borderless mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong>Subtotal</strong></td>
                                                                            <td class="text-end">$8.497,00</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>VAT (10%)</strong></td>
                                                                            <td class="text-end">$679,76</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Total</strong></td>
                                                                            <td class="text-end">
                                                                                <strong>$7.477,36</strong>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"><i
                                        class="fa fa-print me-2"></i>Print</button>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

</div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            results: [],
            personalDetails: {
                id: '', 
                user_id: '',
                first_name: '',
                middle_name: '',
                last_name: '',
                email_id: '',
                mobile_number: '',
                date_of_birth: '',
                gender: '',
                marital_status: '',
                dependents: '',
                address: '',
                countries: '',
                states: '',
                cities: '',
                pin_code: '',
            },
            personalDetailsError: {
                first_name: false,
                email_id: false,
                mobile_number: false,
            }
        }
    },
    methods: {
        getClientDetails(user_id=11){
            // this.loaderIsActive = true;
            console.log(window.url);
            axios.get(window.url+'get_client_details', { params: { user_id: user_id } } )
                .then(response => { 
                    this.results = response.data;
                    this.personalDetails = this.results['personal_details'][0];
                    // this.loaderIsActive = false;
                    console.log(this.personalDetails);                    
                } )
                .catch(error => { console.log(error) });
        }
    },
    beforeMount() {
        this.getClientDetails()
    }
}
</script>