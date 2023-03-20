<template>
    <div class="tab-content">
        <div class="toast fade" style="position: absolute; top: 50px; right: 25px; z-index: 99999;"></div>
        <div class="tab-pane fade show active" id="personal_details" role="tabpanel">
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
                            <div class="mb-2 text-uppercase">Personal Details</div>
                            <div><span class="h4">20</span> <span class="small text-muted"><i
                                        class="fa fa-level-up"></i>%</span></div>
                            <form class="row g-2 pt-3" name="personalDetailForm">
                                <div class="col-md-4 col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" v-model="personalDetails.first_name"
                                            placeholder="First Name" v-on:keyup="checkValidation()">
                                        <label>First Name <code class="text-danger">*</code></label>
                                    </div>
                                    <label class="text-danger" v-if="personalDetailsError.first_name">This field is
                                        required</label>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" v-model="personalDetails.middle_name"
                                            placeholder="Middle Name">
                                        <label>Middle Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" v-model="personalDetails.last_name"
                                            placeholder="Last Name">
                                        <label>Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 personal_detail_field">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" v-model="personalDetails.email_id"
                                            placeholder="Email ID" v-on:keyup="emailValidation()"
                                            v-on:blur="checkEmailAlreadyExists()">
                                        <label>Email ID <code class="text-danger">*</code></label>
                                    </div>
                                    <label class="text-danger email_validation" v-if="personalDetailsError.email_id">This
                                        field is required, enter a valid email</label>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-floating">
                                        <input type="text" maxlength="10" class="form-control"
                                            v-model="personalDetails.mobile_number" placeholder="Mobile Number"
                                            v-on:keyup="mobileNumberValidation()" v-on:blur="checkMobileAlreadyExists()">
                                        <label>Mobile Number(only 10 digit) <code class="text-danger">*</code></label>
                                    </div>
                                    <label class="text-danger mobile_validation"
                                        v-if="personalDetailsError.mobile_number">This field is required, enter a valid
                                        number</label>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control form-control-lg datepicker"
                                            v-model="personalDetails.date_of_birth" placeholder="Select date of birth"
                                            v-on:change="checkValidation()">
                                        <label>Select date of birth <code class="text-danger">*</code></label>
                                    </div>
                                    <label class="text-danger" v-if="personalDetailsError.date_of_birth">This field is
                                        required</label>
                                </div>
                                <div class="col-md-4 col-12 p-3">
                                    <div class="form-floating">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">Select Gender <code
                                                    class="text-danger">*</code></label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                v-model="personalDetails.gender" id="inlineMale" value="1"
                                                v-on:change="checkValidation()">
                                            <label class="form-check-label" for="inlineMale">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                v-model="personalDetails.gender" id="inlineFemale" value="2"
                                                v-on:change="checkValidation()">
                                            <label class="form-check-label" for="inlineFemale">Female</label>
                                        </div>
                                    </div>
                                    <label class="text-danger" v-if="personalDetailsError.gender">This field is
                                        required</label>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-floating">
                                        <div class="col-12">
                                            <label class="form-group float-label">
                                                <select class="form-control form-control-lg custom-select"
                                                    v-model="personalDetails.marital_status" style="height: 58px;"
                                                    v-on:change="checkValidation()">
                                                    <option value="">Select</option>
                                                    <option value="1">Single</option>
                                                    <option value="2">Married</option>
                                                    <option value="3">Married With Kids</option>
                                                    <option value="4">Seperated</option>
                                                </select>
                                                <span>Choose Martial Status <code class="text-danger">*</code></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label class="text-danger" v-if="personalDetailsError.marital_status">This field is
                                        required</label>
                                </div>
                                <hr>
                                <div class="col-md-4 col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" v-model="personalDetails.address"
                                            placeholder="Address" v-on:keyup="checkValidation()">
                                        <label>Address <code class="text-danger">*</code></label>
                                    </div>
                                    <label class="text-danger" v-if="personalDetailsError.address">This field is
                                        required</label>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-floating">
                                        <div class="col-12">
                                            <label class="form-group float-label">
                                                <select class="form-control show-tick ms" v-model="personalDetails.country"
                                                    style="height: 58px;" data-placeholder="Select"
                                                    v-on:change="getStateList(personalDetails.country)">
                                                    <option value="">Select Country</option>
                                                    <option v-if="countryList.length > 0" v-for="country in countryList"
                                                        v-text="country.name" :value="country.id"></option>
                                                </select>
                                                <span>Country <code class="text-danger">*</code></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label class="text-danger" v-if="personalDetailsError.country">This field is
                                        required</label>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-floating">
                                        <div class="col-12">
                                            <label class="form-group float-label">
                                                <select class="form-control show-tick ms" v-model="personalDetails.state"
                                                    style="height: 58px;" data-placeholder="Select"
                                                    v-on:change="getCityList(personalDetails.state)">
                                                    <option value="">Select</option>
                                                    <option v-if="stateList.length > 0" v-for="state in stateList"
                                                        v-text="state.name" :value="state.id"></option>
                                                </select>
                                                <span>State <code class="text-danger">*</code></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label class="text-danger" v-if="personalDetailsError.state">This field is
                                        required</label>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-floating">
                                        <div class="col-12">
                                            <label class="form-group float-label">
                                                <select class="form-control show-tick ms" v-model="personalDetails.city"
                                                    style="height: 58px;" data-placeholder="Select"
                                                    v-on:change="checkValidation()">
                                                    <option value="">Select</option>
                                                    <option v-if="cityList.length > 0" v-for="city in cityList"
                                                        :key="city.id" v-text="city.city" :value="city.id"></option>
                                                </select>
                                                <span>City <code class="text-danger">*</code></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label class="text-danger" v-if="personalDetailsError.city">This field is
                                        required</label>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" v-model="personalDetails.pin_code"
                                            placeholder="Pin Code" v-on:keyup="checkValidation()">
                                        <label>Pin Code <code class="text-danger">*</code></label>
                                    </div>
                                    <label class="text-danger" v-if="personalDetailsError.pin_code">This field is
                                        required</label>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end personal_details_btn_main">
                                    <div class="btn m-1 btn-lg btn-primary btn-animate-6"
                                        v-on:click="save_personal_details()">
                                        <span class="btntext">Save</span>
                                        <div class="btninfo bg-success">Click</div>
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
                                <div class="col-md-3 col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="educationalDetails.secondary" id="secondary">
                                        <label class="form-check-label col-12" for="secondary">
                                            <div class="avatar rounded no-thumbnail chart-text-color1 float-start me-3"><i class="fa fa-pencil"></i></div>
                                            <strong>Secondary</strong>
                                            <span class="text-muted d-flex small">10th schooling</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.secondary_country" class="form-control" placeholder="Country">
                                        <label>Country</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.secondary_board" class="form-control" placeholder="Board">
                                        <label>Board</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.secondary_year" class="form-control" placeholder="Passing Year">
                                        <label>Passing Year</label>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="educationalDetails.senior_secondary" id="senior-secondary">
                                        <label class="form-check-label col-12" for="senior-secondary">
                                            <div class="avatar rounded no-thumbnail chart-text-color1 float-start me-3"><i class="fa fa-pencil-square-o"></i></div>
                                            <strong>Senior secondary</strong>
                                            <span class="text-muted d-flex small">12th schooling</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.senior_secondary_country" class="form-control" placeholder="Country">
                                        <label>Country</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.senior_secondary_board" class="form-control" placeholder="Board">
                                        <label>Board</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.senior_secondary_year" class="form-control" placeholder="Passing Year">
                                        <label>Passing Year</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="educationalDetails.bachelor" id="bachelor">
                                        <label class="form-check-label col-12" for="bachelor">
                                            <div class="avatar rounded no-thumbnail chart-text-color1 float-start me-3"><i class="fa fa-bank"></i></div>
                                            <strong>Bachelor's</strong>
                                            <span class="text-muted d-flex small">Degree college</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.bachelor_country" class="form-control" placeholder="Country">
                                        <label>Country</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.bachelor_board" class="form-control" placeholder="Board">
                                        <label>Board</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.bachelor_year" class="form-control" placeholder="Passing Year">
                                        <label>Passing Year</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="educationalDetails.master" id="master">
                                        <label class="form-check-label col-12" for="master">
                                            <div class="avatar rounded no-thumbnail chart-text-color1 float-start me-3"><i class="fa fa-bank"></i></div>
                                            <strong>Master's</strong>
                                            <span class="text-muted d-flex small">Degree college</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.master_country" class="form-control" placeholder="Country">
                                        <label>Country</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.master_board" class="form-control" placeholder="Board">
                                        <label>Board</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.master_year" class="form-control" placeholder="Passing Year">
                                        <label>Passing Year</label>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <div class="btn m-1 btn-lg btn-primary btn-animate-6"
                                        v-on:click="save_educational_details()">
                                        <span class="btntext">Save</span>
                                        <div class="btninfo bg-success">Click</div>
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
                                <div class="col-md-12 col-12">
                                    <div class="form-floating">
                                        <div class="col-12">
                                            <label class="form-group float-label">
                                                <select class="form-control form-control-lg custom-select" v-model="professionalDetails.experience_year" style="height: 58px;">
                                                    <option value="">Select</option>
                                                    <option value="0">Fresher</option>
                                                    <option value="1">1 year</option>
                                                    <option value="2">2 year</option>
                                                    <option value="3">3 year</option>
                                                    <option value="4">4 year</option>
                                                    <option value="5">5 year</option>
                                                    <option value="6">6 year</option>
                                                    <option value="7">7 year</option>
                                                    <option value="8">8 year</option>
                                                    <option value="9">9 year</option>
                                                    <option value="10">10 year</option>
                                                </select>
                                                <span>Experience <code class="text-danger">*</code></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label class="text-danger" v-if="professionalDetailsError.experience_year">This field is required</label>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-floating">
                                        <textarea v-model="professionalDetails.description" style="height: 200px;" class="form-control" spellcheck="true"></textarea>
                                        <label>Description</label>
                                    </div>
                                </div>
                                
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <div class="btn m-1 btn-lg btn-primary btn-animate-6"
                                        v-on:click="save_professional_details()">
                                        <span class="btntext">Save</span>
                                        <div class="btninfo bg-success">Click</div>
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

                    <div class="card fieldset border border-muted">
                        <span class="fieldset-tile text-muted bg-body">Document List</span>
                        <table id="invoice_list" class="table card-table align-middle mb-0">
                            <thead>
                                <tr>
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
                                    <td> #RA0011 </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="assets/img/xs/avatar1.jpg" class="rounded-circle sm avatar" alt="">
                                            <div class="ms-2 mb-0">Andew Jon</div>
                                        </div>
                                    </td>
                                    <td class="fw-bold">USD 12,820</td>
                                    <td>Jan 16 2022</td>
                                    <td>Jan 20 2022</td>
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="modal"
                                            data-bs-target="#invoice_send"><i class="fa fa-envelope"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="modal"
                                            data-bs-target="#invoice_detail"><i class="fa fa-download"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
                                                                                <td style="text-align: right;" width="80%">
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
let user_id = 11;
export default {
    data() {
        return {
            // loaderIsActive: false,
            show_toast: false,
            results: [],
            countryList: [],
            stateList: [],
            cityList: [],
            personalDetailAction: 'insert',
            educationalDetailAction: 'insert',
            professionalDetailAction: 'insert',
            personalDetails: {
                id: '',
                user_id: user_id,
                first_name: '',
                middle_name: '',
                last_name: '',
                email_id: '',
                mobile_number: '',
                date_of_birth: '',
                gender: '',
                marital_status: '',
                address: '',
                country: '',
                state: '',
                city: '',
                pin_code: '',
            },
            personalDetailsError: {
                first_name: false,
                email_id: false,
                mobile_number: false,
                date_of_birth: false,
                gender: false,
                address: false,
                country: false,
                state: false,
                city: false,
                pin_code: false,
            },
            educationalDetails: {
                user_id: user_id,
                id: '',
                educationalDetailSubmit : '',
                secondary: '',
                secondary_country: '',
                secondary_board: '',
                secondary_year: '',
                senior_secondary: '',
                senior_secondary_country: '',
                senior_secondary_board: '',
                senior_secondary_year: '',
                bachelor: '',
                bachelor_country: '',
                bachelor_board: '',
                bachelor_year: '',
                master: '',
                master_country: '',
                master_board: '',
                master_year: '',
            },
            professionalDetails: {
                id: '',
                user_id: user_id,
                experience_year: '',
                description: ''
            },
            professionalDetailsError: {
                experience_year: false
            }

        }
    },
    watch: {
        educationalDetails: {
            handler(newValue, oldValue) {
                this.educationalDetails.secondary = (newValue.secondary_country !=''|| newValue.secondary_board !=''|| newValue.secondary_year != '' || this.educationalDetails.secondary) ? true : false;
                this.educationalDetails.senior_secondary = (newValue.senior_secondary_country !=''|| newValue.senior_secondary_board !=''|| newValue.senior_secondary_year != '' || this.educationalDetails.senior_secondary) ? true : false;
                this.educationalDetails.bachelor = (newValue.bachelor_country !=''|| newValue.bachelor_board !=''|| newValue.bachelor_year != '' || this.educationalDetails.bachelor) ? true : false;
                this.educationalDetails.master = (newValue.master_country !=''|| newValue.master_board !=''|| newValue.master_year != '' || this.educationalDetails.master) ? true : false;

                if(this.educationalDetails.secondary || this.educationalDetails.senior_secondary || this.educationalDetails.bachelor || this.educationalDetails.master){
                    this.educationalDetails.educationalDetailSubmit = true;
                    // console.log('submit');
                } else {
                    // console.log('not submit');
                    this.educationalDetails.educationalDetailSubmit = false;
                }
            },
            deep: true
        },
        personalDetails: {
            handler(newValue, oldValue) {
                // console.log(oldValue);
                // console.log(newValue);
            },
            deep: true
        }
    },
    methods: {
        getCountryList() {
            axios.get(window.url + 'get_country_list')
                .then(response => {
                    this.countryList = response.data;
                    // console.log(this.countryList);
                })
                .catch(error => { console.log(error) });
        },
        getStateList(cid) {
            if (cid != '') {
                this.cityList = [];
                this.personalDetails.country == '' ? this.personalDetailsError.country = true : this.personalDetailsError.country = false;
                axios.get(window.url + 'get_state_list', { params: { country_id: cid } })
                    .then(response => {
                        this.stateList = response.data;
                        // console.log(this.stateList);
                    })
                    .catch(error => { console.log(error) });
            }
        },
        getCityList(sid) {
            if (sid) {
                this.personalDetails.state == '' ? this.personalDetailsError.state = true : this.personalDetailsError.state = false;
                axios.get(window.url + 'get_city_list', { params: { state_id: sid } })
                    .then(response => {
                        this.cityList = response.data;
                        // console.log(this.stateList);
                    })
                    .catch(error => { console.log(error) });
            }
        },
        emailValidation() {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.personalDetails.email_id)) {
                this.personalDetailsError.email_id = false;
            } else {
                this.personalDetailsError.email_id = true;
            }
        },
        checkEmailAlreadyExists() {
            // console.log(this.personalDetails.email_id);
            let emailCheck = { user_id: this.user_id, email_id: this.personalDetails.email_id }
            axios.post(window.url + 'check_email_already_exist/', emailCheck)
                .then(response => {
                    if (response.data.length != 0) {
                        this.personalDetailsError.email_id = true;
                        $('.email_validation').text('Email already in used');
                    }
                })
                .catch(errors => { console.log(errors); });
        },

        checkMobileAlreadyExists() {
            // console.log(this.personalDetails.mobile_number);
            let mobileCheck = { user_id: this.user_id, mobile_number: this.personalDetails.mobile_number }
            axios.post(window.url + 'check_mobile_already_exist/', mobileCheck)
                .then(response => {
                    if (response.data.length != 0) {
                        this.personalDetailsError.mobile_number = true;
                        $('.mobile_validation').text('Mobile number already in used');
                    }
                })
                .catch(errors => { console.log(errors); });
        },
        mobileNumberValidation() {
            if (!isNaN(this.personalDetails.mobile_number)) {
                if (this.personalDetails.mobile_number.length > 8) {
                    this.personalDetailsError.mobile_number = false;
                } else {
                    this.personalDetailsError.mobile_number = true;
                }
            } else {
                this.personalDetailsError.mobile_number = true;
                // this.personalDetails.mobile_number = '';
            }

        },
        checkValidation() {
            this.personalDetails.first_name == '' ? this.personalDetailsError.first_name = true : this.personalDetailsError.first_name = false;
            this.personalDetails.mobile_number == '' ? this.personalDetailsError.mobile_number = true : this.personalDetailsError.mobile_number = false;
            this.personalDetails.date_of_birth == '' ? this.personalDetailsError.date_of_birth = true : this.personalDetailsError.date_of_birth = false;
            this.personalDetails.gender == '' ? this.personalDetailsError.gender = true : this.personalDetailsError.gender = false;
            this.personalDetails.address == '' ? this.personalDetailsError.address = true : this.personalDetailsError.address = false;
            this.personalDetails.marital_status == '' ? this.personalDetailsError.marital_status = true : this.personalDetailsError.marital_status = false;
            this.personalDetails.city == '' ? this.personalDetailsError.city = true : this.personalDetailsError.city = false;
            this.personalDetails.pin_code == '' ? this.personalDetailsError.pin_code = true : this.personalDetailsError.pin_code = false;
        },
        save_personal_details() {
            this.personalDetails.first_name == '' ? this.personalDetailsError.first_name = true : this.personalDetailsError.first_name = false;
            this.personalDetails.email_id == '' ? this.personalDetailsError.email_id = true : this.personalDetailsError.email_id = false;
            this.personalDetails.mobile_number == '' ? this.personalDetailsError.mobile_number = true : this.personalDetailsError.mobile_number = false;
            this.personalDetails.date_of_birth == '' ? this.personalDetailsError.date_of_birth = true : this.personalDetailsError.date_of_birth = false;
            this.personalDetails.gender == '' ? this.personalDetailsError.gender = true : this.personalDetailsError.gender = false;
            this.personalDetails.address == '' ? this.personalDetailsError.address = true : this.personalDetailsError.address = false;
            this.personalDetails.marital_status == '' ? this.personalDetailsError.marital_status = true : this.personalDetailsError.marital_status = false;
            this.personalDetails.country == '' ? this.personalDetailsError.country = true : this.personalDetailsError.country = false;
            this.personalDetails.state == '' ? this.personalDetailsError.state = true : this.personalDetailsError.state = false;
            this.personalDetails.city == '' ? this.personalDetailsError.city = true : this.personalDetailsError.city = false;
            this.personalDetails.pin_code == '' ? this.personalDetailsError.pin_code = true : this.personalDetailsError.pin_code = false;

            if (this.personalDetails.first_name && this.personalDetails.email_id && this.personalDetails.mobile_number &&
                this.personalDetails.date_of_birth && this.personalDetails.gender && this.personalDetails.address && this.personalDetails.marital_status &&
                this.personalDetails.country && this.personalDetails.state && this.personalDetails.city && this.personalDetails.pin_code) {

                axios.post(window.url + 'save_personal_details/' + this.personalDetailAction, this.personalDetails)
                    .then(response => {
                        // console.log(response);
                        
                        if (response.data.success) {
                            this.personalDetailAction = 'update';
                            this.personalDetails.id = response.data.insID;
                            showToastMsg('success', 'Greate', 'Details updated', 'Your profile information successfully updated');
                            
                        }
                    })
                    .catch(errors => {
                        $.each(errors.response.data.errors, function (key, value) {
                            showToastMsg('danger', 'Oops', 'Details not updated', 'Your profile information did not update');
                            console.log(key);
                            console.log(value);
                        });
                        // console.log(errorObj);
                    });

            }
        },
        getClientDetails(user_id) {
            // this.loaderIsActive = true;
            axios.get(window.url + 'get_client_details', { params: { user_id: user_id } })
                .then(response => {
                    this.results = response.data;

                    if (this.results['personal_details'].length > 0) {
                        this.personalDetails = this.results['personal_details'][0];
                        this.personalDetailAction = 'update';
                    }

                    // this.loaderIsActive = false;
                    // console.log(this.personalDetails);                    
                })
                .catch(error => { console.log(error) });
        },
        getClientDetails(user_id) {
            // this.loaderIsActive = true;
            axios.get(window.url + 'get_client_details', { params: { user_id: user_id } })
                .then(response => {
                    this.results = response.data;

                    console.log(this.results);

                    // set personal details
                    if (this.results['personal_details'].length > 0) {
                        this.personalDetails = this.results['personal_details'][0];
                        this.personalDetailAction = 'update';
                    }
                    // set personal details
                    if (this.results['educational_details'].length > 0) {
                        this.educationalDetails = this.results['educational_details'][0];
                        this.educationalDetailAction = 'update';
                    }
                    // set professional details
                    if (this.results['professional_details'].length > 0) {
                        this.professionalDetails = this.results['professional_details'][0];
                        this.professionalDetailAction = 'update';
                    }

                    // this.loaderIsActive = false;
                    // console.log(this.personalDetails);                    
                })
                .catch(error => { console.log(error) });
        },
        save_educational_details(){
            if(!this.educationalDetails.educationalDetailSubmit){
                showToastMsg('danger', 'Oops', 'Check the details', 'No data to update');
            } else {
                axios.post(window.url + 'save_educational_details/' + this.educationalDetailAction, this.educationalDetails)
                    .then(response => {
                        // console.log(response);
                        
                        if (response.data.success) {
                            this.educationalDetailAction = 'update';
                            this.educationalDetails.educationalId = response.data.insID;
                            showToastMsg('success', 'Greate', 'Details updated', 'Your educational information successfully updated');
                        }
                    })
                    .catch(errors => {
                        $.each(errors.response.data.errors, function (key, value) {
                            showToastMsg('danger', 'Oops', 'Details not updated', 'Your educational information did not update');
                            console.log(key);
                            console.log(value);
                        });
                        console.log(errorObj);
                    });
            }
        },
        save_professional_details(){
            this.professionalDetails.experience_year == '' ? this.professionalDetailsError.experience_year = true : this.professionalDetailsError.experience_year = false;
             if(this.professionalDetailsError.experience_year){
                showToastMsg('danger', 'Oops', 'Check the details', 'Experience can not be empty.');
            } else {
                axios.post(window.url + 'save_professional_details/' + this.professionalDetailAction, this.professionalDetails)
                    .then(response => {
                        // console.log(response);
                        
                        if (response.data.success) {
                            this.professionalDetailAction = 'update';
                            this.professionalDetails.professionalId = response.data.insID;
                            showToastMsg('success', 'Greate', 'Details updated', 'Your professional information successfully updated');
                        }
                    })
                    .catch(errors => {
                        $.each(errors.response.data.errors, function (key, value) {
                            showToastMsg('danger', 'Oops', 'Details not updated', 'Your professional information did not update');
                            console.log(key);
                            console.log(value);
                        });
                        console.log(errorObj);
                    });
            }
        }
    },
    beforeMount() {
        this.getCountryList();
        this.getClientDetails(this.personalDetails.user_id);

    }, updated() {
        // call after all dom loaded
        document.onreadystatechange = () => {
            if (document.readyState == "complete") {
                if (this.personalDetails.country != '') {
                    this.getStateList(this.personalDetails.country)
                }
                if (this.personalDetails.state != '') {
                    this.getCityList(this.personalDetails.state)
                }
            }
        }
    }
}
function showToastMsg(typ='secondary', expressionMsg='', subject='', message='' ){
    typ = typ=='success'?'success':'danger';

    let toastMsg = '<div class="toast-header bg-'+typ+' text-white"> <i class="fa fa-info-circle"></i>&nbsp;';
        toastMsg += '<strong class="me-auto"> '+expressionMsg+'</strong><small>'+subject+'</small></div>';
        toastMsg += '<div class="toast-body"> '+message+'! </div>';
    $('.toast').html(toastMsg);
    $('.toast').addClass('show').animate({"top":"25px"}, "slow");
    setTimeout(() => $('.toast').removeClass( "show") , 3000);
}
</script>