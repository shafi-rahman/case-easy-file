@extends('layouts.app')
@section('content')
<style>
#saveavatar{ display: none; }
</style>
{{-- from vue --}}
<div id="root-create-user-account">
    {{-- @{{message}} --}}
    <create-user-account></create-user-account>
</div> 

{{-- from vue --}}
<div id="root-add-quote">
    {{-- @{{message}} --}}
    <add-quote></add-quote>
</div> 

{{-- from vue --}}
<div id="root-update-payment">
    {{-- @{{message}} --}}
    <update-payment></update-payment>
</div> 

<div class="modal fade" id="updatepayment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Update Payment Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-4">
                <div class="row g-2">
                    <div class="col-12 mb-3">
                        <span class="text-danger">*This will be approved by only admin.</span>
                    </div>
                    <form method="post" id="paymentupdateform">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="bank_name">
                                <label>Bank Name</label>
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="ifsc">
                                <label>IFSC</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="location">
                                <label>Location</label>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="form-floating mb-1">
                                <input type="date" class="form-control" value="<?=date('Y-m-d')?>" id="payment_date">
                                <label>Payment Date</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control text-primary" id="amount">
                                <label>Amount ₹</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control text-primary" id="transaction_number">
                            <label>Transaction Number</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <textarea id="notes" class="form-control" placeholder="Add project details" style="height: 100px"></textarea>
                            <label>Message...</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label small">Attachment</label>
                        <input class="form-control" type="file" id="attachment">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end updatepaymentbtndiv">
                        <input type="hidden" id="iid" />
                        <input type="hidden" id="cid" />
                        <input type="hidden" id="created_by" />
                        <div class="btn m-1 btn-primary btn-animate-6 update_payment_details"><span class="btntext">Save</span><div class="btninfo bg-success">Click</div></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- from vue --}}
<div id="root-send-email-popup">
    {{-- @{{message}} --}}
    <send-email-popup></send-email-popup>
</div> 

{{-- from vue --}}
<div id="root-client-statusupdate">
    {{-- @{{message}} --}}
    <client-statusupdate></client-statusupdate>
</div> 

<div class="modal fade" id="invoicestatement" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-body custom_scroll p-lg-5">
                <div class="row g-2">
                    <div class="col-12 mb-4">
                        <h4>Invoice Statement</h4>
                        <span class="text-grey">Create invoice schedule</span>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-floating">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control text-primary" placeholder="Amount">
                                    <label>Final Amount</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Message" style="height: 100px"></textarea>
                            <label>Message...</label>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <label class="form-label">Schedule reminder</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="date" class="form-control text-primary" placeholder="Date">
                            <label>Date</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control text-primary" placeholder="Amount">
                            <label>Amount</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control text-primary" placeholder="Next Days">
                            <label>Next Days</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="btn m-1 btn-primary btn-animate-6" data-bs-dismiss="modal"><span class="btntext">Close</span><div class="btninfo bg-success">Click</div></div>
                            <div class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Update</span><div class="btninfo bg-success">Click</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="generatepaymentlink" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-body custom_scroll p-lg-5">
                <div class="row g-2">
                    <div class="col-12 mb-4">
                        <h4>Generate Payment Link</h4>
                        <span class="text-grey">this will go to the client email, mobile message and account notification.</span>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-floating">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control text-primary" placeholder="Notes">
                                    <label>Notes...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Message" style="height: 100px"></textarea>
                            <label>Message...</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="btn m-1 btn-primary btn-animate-6" data-bs-dismiss="modal"><span class="btntext">Close</span><div class="btninfo bg-success">Click</div></div>
                        <div class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Send</span><div class="btninfo bg-success">Click</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="paymentschedule" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-body custom_scroll p-lg-5">
                <div class="row g-2">
                    <div class="col-12 mb-4">
                        <h4>Update Status</h4>
                        <span class="text-danger">*It has roots in a piece of classical Latin literature from 45 BC, making</span>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-floating">
                            <div class="col-12">
                                <label class="form-group float-label">
                                    <select class="form-control form-control-lg custom-select"
                                        style="height: 58px;"
                                        >
                                        <option value="1">Sell</option>
                                        <option value="2">Operation</option>
                                        <option value="3">Document</option>
                                    </select>
                                    <span>Choose Status <code class="text-danger">*</code></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control"
                                placeholder="Add project details"
                                style="height: 100px"></textarea>
                            <label>Message...</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label small">Schedule reminder</label>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Time</label>
                        <input class="form-control" type="time">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="btn m-1 btn-primary btn-animate-6" data-bs-dismiss="modal"><span class="btntext">Close</span><div class="btninfo bg-success">Click</div></div>
                            <div class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Update Status</span><div class="btninfo bg-success">Click</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('cases') }}">Cases</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $userDetails->first_name }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body border-bottom">
                
              <button class="btn ms-4 mb-1 btn-primary btn-animate-4 " id="saveavatar"><span>Save Image</span></button>

              <div class="d-flex align-items-md-start align-items-center flex-column flex-md-row">
                
                <img src="{{url($userDetails->avatar)}}" style="width: 150px" alt="" id="cavatar" class="rounded-4">
                <form id="avatar_form" method="post" enctype="multipart/form-data">
                    <div class="file-input bg-dark text-white ms-1 pt-1 pb-1 ps-2 pe-2 rounded-circle">
                        <input type="file" class="form-control" name="file " id="avatar" onchange="upload_avatar()" accept="image/png, image/gif, image/jpeg">
                        <label for="avatar" class="fa fa-pencil shadow"></label>
                    </div>
                    <input type="hidden" name="case_id" value="{{$userDetails->id}}" />
                </form>
                <div class="media-body ms-md-5 m-0 mt-4 mt-md-0 text-md-start text-center">
                  <h4 class="mb-1 fw-light">{{ $userDetails->first_name }} | <span class="text-success fs-6" style="font-size: 12px !important; font-weight: 100;"><i class="fa fa-tags"></i> {{ $userDetails->currentstatus }}</span></h4>
                  <div class="mb-2">
                    <div class="input-group">
                        <button class="btn btn-secondary" type="button" data-bs-toggle="modal"
                        data-bs-target="#sendmail" emailid="{{ $userDetails->email_id }}" title="Send email"><i
                                class="fa fa-envelope"></i> email</button>
                        <a href="callto:{{$userDetails->mobile_number}}" class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Make a call"><i
                                class="fa fa-phone"></i> call</a>
                    </div>
                  </div>
                  
                  <div
                    class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                    @if($userDetails->user_id==0)
                        <p class="mt-3">*This user is not registered till now in our system, if you need to manage his/her other details e.g. Educational Details, Professional Details & Document Details, you need to create account for him/her.</p>
                    @endif
                    @if($userDetails->status==5&&count($userPaymentDetails)==0)
                        <button class="btn mx-2 btn-primary btn-animate-1 mb-2" data-bs-toggle="modal" data-bs-target="#addquote">
                            <span>Add Quota</span><i class="fa fa-long-arrow-right"></i>
                        </button>
                    @endif
                    @if(count($userPaymentDetails)>0)

                    @foreach($userPaymentDetails as $i=>$paymentDetail)
                    <div data-bs-toggle="modal" data-bs-target="#updatepayment" class="{{($paymentDetail->i_status==1)?'btn-outline-success':(strtotime(date('Y-m-d'))>strtotime($paymentDetail->due_date)?'btn-outline-danger':'btn-outline-info')}} updatepaymentbtn card cust_pay py-2 px-3 me-2 mt-2 btn"
                        created_by="{{$userDetails->logedinuser}}" status="{{$paymentDetail->i_status}}" bank_name="{{$paymentDetail->bank_name}}"
                        ifsc="{{$paymentDetail->ifsc}}" location="{{$paymentDetail->location}}" transaction_number="{{$paymentDetail->transaction_number}}"
                        notes="{{$paymentDetail->notes}}" attachment="{{$paymentDetail->attachment}}" payment_date="{{$paymentDetail->payment_date}}" 
                        amount="{{$paymentDetail->i_amount}}" iid="{{$paymentDetail->iid}}" cid="{{$paymentDetail->case_id}}">
                      <small class="">{{ ($i+1) }} Installment </small>
                      <div class="fs-5">₹ {{ $paymentDetail->i_amount }}</div>
                      @if($paymentDetail->i_status==0)
                        <small>Unpaid @ {{ date("d M Y", strtotime($paymentDetail->due_date)) }}</small>
                      @else 
                        <small>Paid @ {{ date("d M Y", strtotime($paymentDetail->payment_date)) }}</small>
                      @endif
                    </div>
                    @endforeach
                    {{-- <div data-bs-toggle="modal" data-bs-target="#updatepayment" class="card cust_pay py-2 px-3 me-2 mt-2 bg-success">
                      <small class="text-white">2nd Installment</small>
                      <div class="fs-5 text-white">₹ 25,000</div>
                      <small class="text-white">Paid @ 12 Jan 23</small>
                    </div>
                    <div data-bs-toggle="modal" data-bs-target="#updatepayment" class="card cust_pay py-2 px-3 me-2 mt-2 bg-success">
                      <small class="text-white">3rd Installment</small>
                      <div class="fs-5 text-white">₹ 25,000</div>
                      <small class="text-white">Paid @ 12 Feb 23</small>
                    </div>
                    <div data-bs-toggle="modal" data-bs-target="#updatepayment" class="card cust_pay py-2 px-3 me-2 mt-2 bg-danger">
                      <small class="text-white">4rth Installment</small>
                      <div class="fs-5 text-white">₹ 25,000</div>
                      <small class="text-white">Unpaid @ 12 Mar 23</small>
                    </div> --}}
                    @endif
                  </div>
                </div>
                
              </div>
              
              <button style="position: absolute; right: 10px; top: 20px;" class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" data-bs-toggle="modal" data-bs-target="#RecentChat"><span>History</span></button>

                <div class="mt-3 d-grid gap-2 d-md-flex justify-content-md-end">                    
                    
                    {{-- <div class="btn m-1 btn-primary btn-animate-6" data-bs-toggle="modal"
                    data-bs-target="#generatepaymentlink" title="Generate Payment Link">
                    <span class="btntext">Instant Payment Link</span><div class="btninfo bg-success">Click</div></div> --}}
{{-- 
                    <div class="btn m-1 btn-primary btn-animate-6" data-bs-toggle="modal"
                    data-bs-target="#invoicestatement" title="Invoice Statement">
                    <span class="btntext">Invoice Statement</span><div class="btninfo bg-success">Click</div></div> --}}

                    <div class="btn m-1 btn-primary btn-animate-6" data-bs-toggle="modal"
                    data-bs-target="#updatestatus" title="Update status">
                    <span class="btntext">Update Status</span><div class="btninfo bg-success">Click</div></div>

                </div>
                
            </div>
            
            @if($userDetails->user_id!=0)
                {{-- from vue --}}
                <div id="root-profile-header">
                    {{-- @{{message}} --}}
                    <profile-header></profile-header>
                </div> 
            @else
            <ul class="nav nav-tabs tab-card border-bottom-0 p-0 fs-6 justify-content-center justify-content-md-start" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#personal_details" role="tab">
                        <i class="fa fa-address-card-o"></i>
                        <span class="d-none d-sm-inline-block ms-2">Personal Details</span>
                    </a>
                </li>
            </ul>
            @endif
          </div>
          <div class="tab-content mt-5">

            {{-- from vue --}}
            <div id="root-profile-content">
                {{-- @{{message}} --}}
                <profile-content></profile-content>
            </div> 
            <script>
                window.userDetails = "{{$userDetails->id?json_encode($userDetails):''}}";
            </script>
        </div>
      </div>
    </div>
  </div>
@endsection

