@extends('layouts.app')

@section('content')

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('client-prospects') }}">Client & Prospects</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Prospects</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
  <div class="container">
    <div class="row g-3 clearfix">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-0">
            <div class="step-app h-wizard-demo1">
              <ul class="step-steps">
                <li data-step-target="step1"><span>Assessment</span></li>
                <li data-step-target="step2"><span>Retainer Agreement</span></li>
                <li data-step-target="step3"><span>Request Documents</span></li>
                <li data-step-target="step4"><span>Review Documents</span></li>
                <li data-step-target="step5"><span>Complete Immigration Forms</span></li>
                <li data-step-target="step6"><span>Submit Files to IRCC</span></li>
                <li data-step-target="step7"><span>IRCC Response</span></li>
              </ul>
              <div class="step-content">
                <div class="step-tab-panel" data-step="step1">
                  <div class="row p-3">
                    <div class="card-body">
                      <div class="d-flex align-items-md-start align-items-center flex-column flex-md-row">
                        <div class="image-input avatar xxl rounded-4" style="background-image: url(assets/img/avatar.png)">
                          <div class="avatar-wrapper rounded-4" style="background-image: url({{ url('uploads/users').'/'.$userDetails->avatar}})"></div>
                        </div>
                        <div class="media-body ms-md-5 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                          <div class="row">
                            <div class="col-lg-3 col-md-12">
                              <h5 class="mb-0 fw-light">{{ ($userDetails->first_name??'').(' '.$userDetails->middle_name??'').(' '.$userDetails->last_name??'') }}</h5>
                              <small>{{ ((date('Y') - date('Y',strtotime($userDetails->date_of_birth)).' year(s)')).(' , '.($userDetails->gender==1?'Male':'Female')).(', '.$userDetails->user_marital_status) }}</small>
                              <p class="mt-1">
                                {{'Email:  '.$userDetails->email_id }}<br>
                                {{'Mobile:  '.$userDetails->mobile_number }}<br>
                                {{'Visa apply for:  '.$userDetails->visa_type }}
                              </p>
                            </div>
                            <div class="col-lg-3 col-md-12">
                              <h5 class="mb-0 fw-light">Service Quote</h5>
                              <p class="mt-1">
                                {{'Total Amount: ₹'.$paymentQuote->quote_amount }}<br>
                                {{'Diacount: ₹'.$paymentQuote->discount }}<br>
                                {{'Notes: '.$paymentQuote->notes }}
                              </p>
                            </div>
                            <div class="col-lg-6 col-md-12">
                              <h5 class="mb-0 fw-light">Payment break-up</h5>
                              <div class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                                @if(count($user_payment_installment)>0)
                                  @foreach($user_payment_installment as $i=>$payment)
                                  <div class="card py-1 px-3 me-2 mt-2">
                                    <small class="text-muted">{{ ($i+1).' Installment' }}</small>
                                    <div class="fs-6">₹{{ $payment->amount }}</div>
                                    <small class="text-black">Due @ {{ $payment->due_date }}</small>
                                  </div>
                                  @endforeach
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
              <div class="step-footer d-flex justify-content-end p-3">
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

