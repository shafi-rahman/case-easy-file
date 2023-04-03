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
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container">
    <div class="row g-3 clearfix">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title mb-0">Form Wizard Validate</h6>
          </div>
          <div class="card-body">
            <div class="step-app h-wizard-demo1">
              <ul class="step-steps">
                <li data-step-target="step1"><span>1</span> Account Information</li>
                <li data-step-target="step2"><span>2</span> User Information</li>
                <li data-step-target="step3"><span>3</span> Social ID</li>
              </ul>
              <div class="step-content">
                <div class="step-tab-panel" data-step="step1">
                  <form class="row g-3 validation" method="post" novalidate>
                    <div class="col-md-4 col-12">
                      <label class="form-label">First Name <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" placeholder="Nellie" required>
                    </div>
                    <div class="col-md-4 col-12">
                      <label class="form-label">Last Name <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" placeholder="Maxwell" required>
                    </div>
                    <div class="col-md-4 col-12">
                      <label class="form-label">User ID <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" placeholder="Nellie_Maxwell" required>
                    </div>
                    <div class="col-md-6 col-12">
                      <label class="form-label">Password <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col-md-6 col-12">
                      <label class="form-label">Confirm Password <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" placeholder="Confirm Password" required>
                    </div>
                  </form>
                </div>
                <div class="step-tab-panel" data-step="step2">
                  <form class="row g-3 validation1" method="post" novalidate>
                    <div class="col-md-6 col-12">
                      <label class="form-label">First Name <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" placeholder="Nellie">
                    </div>
                    <div class="col-md-6 col-12">
                      <label class="form-label">Last Name <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" placeholder="Maxwell">
                    </div>
                    <div class="col-md-6 col-12">
                      <label class="form-label">Country <sup class="text-danger">*</sup></label>
                      <input type="hidden" class="form-control">
                      <fieldset>
                        <select class="country form-control form-select" aria-label="example">
                          <option selected>Select Country</option>
                          <option value="Argentina">Argentina</option>
                          <option value="Australia">Australia</option>
                          <option value="Belgium">Belgium</option>
                          <option value="Brazil">Brazil</option>
                          <option value="Canada">Canada</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Egypt">Egypt</option>
                          <option value="France">France</option>
                          <option value="Germany">Germany</option>
                          <option value="India">India</option>
                          <option value="Japan">Japan</option>
                        </select>
                      </fieldset>
                    </div>
                    <div class="col-md-6 col-12">
                      <label class="form-label">Language <sup class="text-danger">*</sup></label>
                      <input type="hidden" class="form-control">
                      <fieldset>
                        <select class="language form-control form-select" aria-label="example">
                          <option selected>Select Language</option>
                          <option>English</option>
                          <option>Mandari</option>
                          <option>Spanish</option>
                          <option>German</option>
                          <option>Portuguese</option>
                          <option>Arabic</option>
                          <option>French</option>
                          <option>Japanese</option>
                          <option>Russian</option>
                          <option>Hindi</option>
                        </select>
                      </fieldset>
                    </div>
                  </form>
                </div>
                <div class="step-tab-panel" data-step="step1">
                  <form class="row g-3 validation2" method="post" novalidate>
                    <div class="col-md-6 col-12">
                      <label class="form-label">Facebook</label>
                      <input type="text" class="form-control" placeholder="Facebook Profile Link">
                    </div>
                    <div class="col-md-6 col-12">
                      <label class="form-label">Instagram</label>
                      <input type="text" class="form-control" placeholder="Instagram Profile Link">
                    </div>
                    <div class="col-md-6 col-12">
                      <label class="form-label">Google+</label>
                      <input type="text" class="form-control" placeholder="Google+ Profile Link">
                    </div>
                    <div class="col-md-6 col-12">
                      <label class="form-label">Twitter</label>
                      <input type="text" class="form-control" placeholder="Twitter Profile Link">
                    </div>
                  </form>
                </div>
              </div>
              <div class="step-footer d-flex justify-content-end">
                <button class="btn btn-primary step-btn ms-1" data-step-action="prev">Prev</button>
                <button class="btn btn-primary step-btn ms-1" data-step-action="next">Next</button>
                <button class="btn btn-primary step-btn ms-1" data-step-action="finish">Finish</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
  </div>
</div>
@endsection

