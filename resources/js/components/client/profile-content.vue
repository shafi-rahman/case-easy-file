<template>
<div class="tab-content">
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
                        <div class="mb-2 text-uppercase">Personal Details </div>
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
                            <!-- <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" v-model="personalDetails.middle_name"
                                        placeholder="Middle Name">
                                    <label>Middle Name</label>
                                </div>
                            </div> -->
                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" v-model="personalDetails.last_name"
                                        placeholder="Last Name">
                                    <label>Last Name</label>
                                </div>
                            </div><div class="col-md-4 col-12 p-3">
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

                            <div class="col-md-4 col-12">
                                <div class="form-floating">
                                    <div class="col-12">
                                        <label class="form-group float-label">
                                            <select class="form-control form-control-lg custom-select"
                                                v-model="personalDetails.visa_type" style="height: 58px;"
                                                v-on:change="checkValidation()">
                                                <option value="">Select</option>
                                                <option value="1">Business Investor Visa</option>
                                                <option value="2">Tourist Visa</option>
                                                <option value="3">Canada PR</option>
                                                <option value="4">Study Visa</option>
                                                <option value="5">Australia PR</option>
                                                <option value="6">Investor Visa</option>
                                            </select>
                                            <span>Choose Visa Type <code class="text-danger">*</code></span>
                                        </label>
                                    </div>
                                </div>
                                <label class="text-danger" v-if="personalDetailsError.visa_type">This field is
                                    required</label>
                            </div>
                            <div class="col-md-4 col-12 p-3">
                                <div class="form-floating">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">IELTS Status <code
                                                class="text-danger">*</code></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ielts"
                                            v-model="personalDetails.ielts" id="inlineIELTS" value="1"
                                            v-on:change="checkValidation()">
                                        <label class="form-check-label" for="inlineIELTS">IELTS</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ielts"
                                            v-model="personalDetails.ielts" id="inlineNoIELTS" value="2"
                                            v-on:change="checkValidation()">
                                        <label class="form-check-label" for="inlineNoIELTS">Not Now</label>
                                    </div>
                                </div>
                                <label class="text-danger" v-if="personalDetailsError.gender">This field is
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
                                <p class="mt-2" v-if="this.personal_detail_button!='Save'">*Password will send to the
                                    registered email id.</p>
                                <div class="btn m-1 btn-lg btn-primary btn-animate-6"
                                    v-on:click="save_personal_details()">
                                    <span class="btntext" v-text="personal_detail_button"></span>
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
                                    <input class="form-check-input" type="checkbox"
                                        v-model="educationalDetails.secondary" id="secondary">
                                    <label class="form-check-label col-12" for="secondary">
                                        <div class="avatar rounded no-thumbnail chart-text-color1 float-start me-3"><i
                                                class="fa fa-pencil"></i></div>
                                        <strong>Secondary</strong>
                                        <span class="text-muted d-flex small">10th schooling</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.secondary_country"
                                        class="form-control" placeholder="Country">
                                    <label>Enter Country</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.secondary_board" class="form-control"
                                        placeholder="Board">
                                    <label>Enter Board</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.secondary_year" class="form-control"
                                        placeholder="Passing Year">
                                    <label>Enter Passing Year</label>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        v-model="educationalDetails.senior_secondary" id="senior-secondary">
                                    <label class="form-check-label col-12" for="senior-secondary">
                                        <div class="avatar rounded no-thumbnail chart-text-color1 float-start me-3"><i
                                                class="fa fa-pencil-square-o"></i></div>
                                        <strong>Senior secondary</strong>
                                        <span class="text-muted d-flex small">12th schooling</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.senior_secondary_country"
                                        class="form-control" placeholder="Country">
                                    <label>Enter Country</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.senior_secondary_board"
                                        class="form-control" placeholder="Board">
                                    <label>Enter Board</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.senior_secondary_year"
                                        class="form-control" placeholder="Passing Year">
                                    <label>Enter Passing Year</label>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        v-model="educationalDetails.bachelor" id="bachelor">
                                    <label class="form-check-label col-12" for="bachelor">
                                        <div class="avatar rounded no-thumbnail chart-text-color1 float-start me-3"><i
                                                class="fa fa-bank"></i></div>
                                        <strong>Bachelor's</strong>
                                        <span class="text-muted d-flex small">Degree university</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.bachelor_country"
                                        class="form-control" placeholder="Country">
                                    <label>Enter Country</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.bachelor_board" class="form-control"
                                        placeholder="Board">
                                    <label>Enter Board</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.bachelor_year" class="form-control"
                                        placeholder="Passing Year">
                                    <label>Enter Passing Year</label>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" v-model="educationalDetails.master"
                                        id="master">
                                    <label class="form-check-label col-12" for="master">
                                        <div class="avatar rounded no-thumbnail chart-text-color1 float-start me-3"><i
                                                class="fa fa-bank"></i></div>
                                        <strong>Master's</strong>
                                        <span class="text-muted d-flex small">Degree university</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.master_country" class="form-control"
                                        placeholder="Country">
                                    <label>Enter Country</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.master_board" class="form-control"
                                        placeholder="Board">
                                    <label>Enter Board</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.master_year" class="form-control"
                                        placeholder="Passing Year">
                                    <label>Enter Passing Year</label>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" v-model="educationalDetails.phd"
                                        id="phd">
                                    <label class="form-check-label col-12" for="phd">
                                        <div class="avatar rounded no-thumbnail chart-text-color1 float-start me-3"><i
                                                class="fa fa-bank"></i></div>
                                        <strong>PHD</strong>
                                        <span class="text-muted d-flex small">PHD university</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.phd_country" class="form-control"
                                        placeholder="Country">
                                    <label>Enter Country</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.phd_board" class="form-control"
                                        placeholder="Board">
                                    <label>Enter Board</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating">
                                    <input type="text" v-model="educationalDetails.phd_year" class="form-control"
                                        placeholder="Passing Year">
                                    <label>Enter Passing Year</label>
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
                                            <select class="form-control form-control-lg custom-select"
                                                v-model="professionalDetails.experience_year" style="height: 58px;">
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
                                <label class="text-danger" v-if="professionalDetailsError.experience_year">This field is
                                    required</label>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-floating">
                                    <textarea v-model="professionalDetails.description" style="height: 200px;"
                                        class="form-control" spellcheck="true"></textarea>
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

    <div class="tab-pane fade" id="ielts_details" role="tabpanel">
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
                        <div class="mb-2 text-uppercase">IELTS Details</div>
                        <div><span class="h4">20</span> <span class="small text-muted"><i class="fa fa-level-up"></i>%</span></div>
                            <form class="row g-2 pt-3">
                                <div class="row">
                                  <div class="col-md-6 col-12"> 
                                    <div class="col-md-12 col-12">
                                        <div class="form-floating">
                                            <input type="text" v-model="ieltsDetails.reading_score" class="form-control">
                                            <label>Enter reading score</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12 mt-2">
                                        <div class="form-floating">
                                            <input type="text" v-model="ieltsDetails.writing_score" class="form-control">
                                            <label>Enter writung score</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12 mt-2">
                                        <div class="form-floating">
                                            <input type="text" v-model="ieltsDetails.spelling_score" class="form-control">
                                            <label>Enter spelling score</label>
                                        </div>
                                  </div>
                                  <div class="col-md-12 col-12 mt-2">
                                        <div class="form-floating">
                                            <input type="text" v-model="ieltsDetails.listening_score" class="form-control">
                                            <label>Enter listening score</label>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="col-md-12 col-12">
                                        <div class="form-floating">
                                            <input type="date" v-model="ieltsDetails.certificate_date" class="form-control">
                                            <label>Certificate Date</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-12 mt-2">
                                        <label for="formFile" class="form-label">Certificate PDF file</label>
                                        <input class="form-control mb-2" type="file" name="file" id="formFile" v-on:change="uploadFile($event)">
                                        <a v-if="this.ieltsDetails.certificate" :href="ieltsDetails.certificate">Uploaded Certificate</a>
                                    </div>
                                </div>
                              </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <div class="btn m-1 btn-lg btn-primary btn-animate-6"
                                        v-on:click="save_ielts_details()">
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

    <!-- <div class="tab-pane fade" id="document_details" role="tabpanel">
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
                        <div class="mb-2 text-uppercase">Document Details</div>
                        <div><span class="h4">40</span> <span class="small text-muted"><i
                                    class="fa fa-level-up"></i>%</span></div>
                        <form class="row g-2 pt-3">
                            <div class=" row document_row">
                                <div class="col-md-4 col-12">
                                    <div class="form-floating">
                                        <input type="text" v-model="educationalDetails.secondary_board"
                                            class="form-control" placeholder="Board">
                                        <label>Document Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="">
                                        <input class="form-control custon_file_input" type="file" id="formFile">
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <button type="button" class="btn btn-outline-danger"><i
                                            class="fa fa-trash"></i></button>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4 d-md-flex justify-content-md-center">
                                <div class="btn m-1 btn-lg btn-primary btn-animate-6"
                                    v-on:click="save_educational_details()">
                                    <span class="btntext">Add More Document</span>
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
    </div> -->

</div></template>

<script>
import axios from 'axios';
// let user_id = 11;
if (window.userDetails != undefined) {
    var userDetails = JSON.parse(window.userDetails.replace(/&quot;/g, '"'));
    var case_id = userDetails.id;
    var logedinuser = userDetails.logedinuser;
}
// console.log(userDetails);
export default {
    data() {
        return {
            loaderIsActive: false,
            personal_detail_button: 'Save',
            show_toast: false,
            results: [],
            countryList: [],
            stateList: [],
            cityList: [],
            personalDetailAction: 'insert',
            educationalDetailAction: 'insert',
            professionalDetailAction: 'insert',
            personalDetails: {
                id: case_id,
                logedinuser: logedinuser,
                user_id: '',
                first_name: '',
                middle_name: '',
                last_name: '',
                email_id: '',
                mobile_number: '',
                date_of_birth: '',
                gender: '',
                marital_status: '',
                visa_type: '',
                ielts: '',
                address: '',
                country: '',
                state: '',
                status: '',
                city: '',
                pin_code: '',
            },
            personalDetailsError: {
                user_id: case_id,
                first_name: false,
                email_id: false,
                mobile_number: false,
                date_of_birth: false,
                gender: false,
                ielts: false,
                address: false,
                country: false,
                visa_type: false,
                state: false,
                city: false,
                pin_code: false,
            },
            educationalDetails: {
                user_id: case_id,
                id: '',
                educationalDetailSubmit: '',
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
                phd: '',
                phd_country: '',
                phd_board: '',
                phd_year: '',
            },
            professionalDetails: {
                id: '',
                user_id: case_id,
                experience_year: '',
                description: ''
            },
            professionalDetailsError: {
                experience_year: false
            },
            ieltsDetailsAction:'insert',
            uploadexcel: '',
            ieltsDetails: {
                id: '',
                user_id: case_id,
                reading_score: '',
                writing_score: '',
                spelling_score: '',
                listening_score: '',
                certificate: '',
                certificate_date: ''
            },
            ieltsDetailErrors: {
                reading_score: false,
                writing_score: false,
                spelling_score: false,
                listening_score: false,
                certificate: false,
                certificate_date: false
            }

        }
    },
    watch: {
        educationalDetails: {
            handler(newValue, oldValue) {
                this.educationalDetails.secondary = (newValue.secondary_country != '' || newValue.secondary_board != '' || newValue.secondary_year != '' || this.educationalDetails.secondary) ? true : false;
                this.educationalDetails.senior_secondary = (newValue.senior_secondary_country != '' || newValue.senior_secondary_board != '' || newValue.senior_secondary_year != '' || this.educationalDetails.senior_secondary) ? true : false;
                this.educationalDetails.bachelor = (newValue.bachelor_country != '' || newValue.bachelor_board != '' || newValue.bachelor_year != '' || this.educationalDetails.bachelor) ? true : false;
                this.educationalDetails.master = (newValue.master_country != '' || newValue.master_board != '' || newValue.master_year != '' || this.educationalDetails.master) ? true : false;

                if (this.educationalDetails.secondary || this.educationalDetails.senior_secondary || this.educationalDetails.bachelor || this.educationalDetails.master) {
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
            let emailCheck = { case_id: this.personalDetails.id, email_id: this.personalDetails.email_id }
            axios.post(window.url + 'check_email_already_exist', emailCheck)
                .then(response => {
                    if (response.data.length != 0) {
                        this.personalDetailsError.email_id = true;
                        $('.email_validation').text('Email already in used');
                    }
                })
                .catch(errors => { console.log(errors); });
        },

        checkMobileAlreadyExists() {
            
            let mobileCheck = { case_id: this.personalDetails.id, mobile_number: this.personalDetails.mobile_number }
            console.log(mobileCheck);
            axios.post(window.url + 'check_mobile_already_exist', mobileCheck)
                .then(response => {
                    console.log(response.data);
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
            this.personalDetails.ielts == '' ? this.personalDetailsError.ielts = true : this.personalDetailsError.ielts = false;
            this.personalDetails.address == '' ? this.personalDetailsError.address = true : this.personalDetailsError.address = false;
            this.personalDetails.marital_status == '' ? this.personalDetailsError.marital_status = true : this.personalDetailsError.marital_status = false;
            this.personalDetails.city == '' ? this.personalDetailsError.city = true : this.personalDetailsError.city = false;
            this.personalDetails.pin_code == '' ? this.personalDetailsError.pin_code = true : this.personalDetailsError.pin_code = false;
            this.personalDetails.visa_type == '' ? this.personalDetailsError.visa_type = true : this.personalDetailsError.visa_type = false;


        },
        save_personal_details() {
            this.personalDetails.first_name == null ? this.personalDetailsError.first_name = true : this.personalDetailsError.first_name = false;
            this.personalDetails.email_id == null ? this.personalDetailsError.email_id = true : this.personalDetailsError.email_id = false;
            this.personalDetails.mobile_number == null ? this.personalDetailsError.mobile_number = true : this.personalDetailsError.mobile_number = false;
            this.personalDetails.date_of_birth == null ? this.personalDetailsError.date_of_birth = true : this.personalDetailsError.date_of_birth = false;
            this.personalDetails.gender == null ? this.personalDetailsError.gender = true : this.personalDetailsError.gender = false;
            this.personalDetails.ielts == null ? this.personalDetailsError.ielts = true : this.personalDetailsError.ielts = false;
            this.personalDetails.address == null ? this.personalDetailsError.address = true : this.personalDetailsError.address = false;
            this.personalDetails.marital_status == null ? this.personalDetailsError.marital_status = true : this.personalDetailsError.marital_status = false;
            this.personalDetails.country == null ? this.personalDetailsError.country = true : this.personalDetailsError.country = false;
            this.personalDetails.state == null ? this.personalDetailsError.state = true : this.personalDetailsError.state = false;
            this.personalDetails.city == null ? this.personalDetailsError.city = true : this.personalDetailsError.city = false;
            this.personalDetails.pin_code == null ? this.personalDetailsError.pin_code = true : this.personalDetailsError.pin_code = false;
            this.personalDetails.visa_type == '' ? this.personalDetailsError.visa_type = true : this.personalDetailsError.visa_type = false;


            if (this.personalDetails.first_name && this.personalDetails.email_id && this.personalDetails.mobile_number &&
                this.personalDetails.date_of_birth && this.personalDetails.gender && this.personalDetails.ielts && this.personalDetails.address && this.personalDetails.marital_status &&
                this.personalDetails.country && this.personalDetails.state && this.personalDetails.city && this.personalDetails.pin_code &&
                this.personalDetails.visa_type) {
                showLoader();
                axios.post(window.url + 'save_personal_details/' + this.personalDetailAction, this.personalDetails)
                    .then(response => {
                        console.log(response);
                        hideLoader();
                        if (response.data.success) {
                            this.personalDetails.id = response.data.insID;
                            showToastMsg('success', 'Greate', 'Details updated', 'Your profile information successfully updated');
                            // if (this.personalDetailAction == 'createaccount') {
                                window.location.reload();
                            // }
                            this.personalDetailAction = 'update';
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

            } else {
                console.log("in else");
            }
        },
        getClientDetails(case_id) {
            this.loaderIsActive = true;
            axios.get(window.url + 'get_client_details', { params: { case_id: case_id } })
                .then(response => {
                    this.results = response.data;

                    // console.log(this.results);

                    // set personal details
                    if (this.results['personal_details'].length>0) {
                        this.personalDetails = this.results['personal_details'][0];
                        this.personalDetailAction = 'update';

                        if (this.personalDetails.user_id == 0) {
                            this.personal_detail_button = "Create Account";
                            this.personalDetailAction = 'createaccount';
                        } else {
                            this.getStateList(this.personalDetails.country);
                            this.getCityList(this.personalDetails.state);
                        }
                    }
                    

                    // set personal details
                    if (this.results['educational_details'].length>0) {
                        this.educationalDetails = this.results['educational_details'][0];
                        this.educationalDetailAction = 'update';
                    }
                    
                    // set professional details
                    if (this.results['professional_details'].length > 0) {
                        this.professionalDetails = this.results['professional_details'][0];
                        this.professionalDetailAction = 'update';
                    }
                    // set ielts details
                    
                    if (this.results['ielts_details'].length > 0) {
                        this.ieltsDetails = this.results['ielts_details'][0];
                        this.ieltsDetailsAction = 'update';
                        // console.log(this.ieltsDetails);
                    }

                    this.loaderIsActive = false;
                    // console.log(this.personalDetails);                    
                })
                .catch(error => { console.log(error) });

              

        },
        save_educational_details() {
            if (!this.educationalDetails.educationalDetailSubmit) {
                showToastMsg('danger', 'Oops', 'Check the details', 'No data to update');
            } else {
                console.log(this.educationalDetailAction);
                console.log(this.educationalDetails);
                axios.post(window.url + 'save_educational_details/' + this.educationalDetailAction, this.educationalDetails)
                    .then(response => {
                        console.log(response);

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
        save_professional_details() {
            this.professionalDetails.experience_year == '' ? this.professionalDetailsError.experience_year = true : this.professionalDetailsError.experience_year = false;
            if (this.professionalDetailsError.experience_year) {
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
        },
        uploadFile(e) {
            this.uploadexcel = e.target.files[0];
            console.log(this.uploadexcel);
        },
        save_ielts_details(){
            this.ieltsDetailErrors.reading_score = this.ieltsDetails.reading_score==''?true:false;
            this.ieltsDetailErrors.writing_score = this.ieltsDetails.writing_score==''?true:false;
            this.ieltsDetailErrors.spelling_score = this.ieltsDetails.spelling_score==''?true:false;
            this.ieltsDetailErrors.listening_score = this.ieltsDetails.listening_score==''?true:false;
            this.ieltsDetailErrors.certificate_date = this.ieltsDetails.certificate_date==''?true:false;
            
            // console.log(this.ieltsDetails);

            if (this.ieltsDetails.reading_score&&this.ieltsDetails.writing_score&&this.ieltsDetails.spelling_score&&
            this.ieltsDetails.listening_score&&this.ieltsDetails.certificate_date) {
                console.log(this.uploadexcel);
                const formData = new FormData();
                formData.append('file', this.uploadexcel);
                formData.append('action', this.ieltsDetailsAction);
                formData.append('id', this.ieltsDetails.id);
                formData.append('user_id', this.ieltsDetails.user_id);
                formData.append('reading_score', this.ieltsDetails.reading_score);
                formData.append('writing_score', this.ieltsDetails.writing_score);
                formData.append('spelling_score', this.ieltsDetails.spelling_score);
                formData.append('listening_score', this.ieltsDetails.listening_score);
                formData.append('certificate_date', this.ieltsDetails.certificate_date);
                const headers = { 'Content-Type': 'multipart/form-data' };
                
                console.log(this.ieltsDetails);

                axios.post(window.url + 'save_ielts_details', formData, { headers }).then((response) => {
                        console.log(response);

                        if (response.data.success) {
                            this.ieltsDetailsAction = 'update';
                            this.ieltsDetails.id = response.data.insID;
                            showToastMsg('success', 'Greate', 'Details updated', 'Your IELTS information successfully updated');
                            // window.location.reload();
                        }
                    })
                    .catch(errors => {
                        $.each(errors.response.data.errors, function (key, value) {
                            showToastMsg('danger', 'Oops', 'Details not updated', 'Your IELTS information did not update');
                            console.log(key);
                            console.log(value);
                        });
                        console.log(errorObj);
                    });
            } else {
                showToastMsg('danger', 'Oops', 'Check the details', 'All fields are required.');
            }
        }
    },
    beforeMount() {

        this.getCountryList();
        this.getClientDetails(this.personalDetails.id);

    }, updated() {
        // call after all dom loaded
        document.onreadystatechange = () => {
            // console.log("call after all dom loadedasadsada: " + document.readyState);
            
            // if (document.readyState == "complete") {
                
            //     console.log(this.personalDetails.first_name);

            //     if (this.personalDetails.country != null) {
            //         console.log("country: " + this.personalDetails.country);
            //         this.getStateList(this.personalDetails.country)
            //     }
            //     if (this.personalDetails.state != null) {
            //         console.log("state: " + this.personalDetails.state);
            //         this.getCityList(this.personalDetails.state)


            //     }
            // }
        }
    }
}


</script>