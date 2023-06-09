@extends('layouts.app')
@section('content')

{{-- from vue --}}
<div id="root-upload-corrected-form">
  <upload-corrected-form></upload-corrected-form>
</div> 

{{-- from vue --}}
<div id="root-send-email-popup">
  {{-- @{{message}} --}}
  <send-email-popup></send-email-popup>
</div>  

<div class="modal fade" id="approval_popup" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content text-start">
        <div class="modal-header">
          <h5 class="modal-title">Update Document status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body custom_scroll p-lg-4 text-center">
          <div id="docApproval"></div>
          <button class="btn m-1 btn-success btn-animate-6 docStatusUpdate" status="1" updated_by="{{Auth::user()->id}}"><span class="btntext"><i class="fa fa-thumbs-o-up"></i> Approved</span>
            <div class="btninfo bg-primary">Click</div>
          </button>
          <button class="btn m-1 btn-danger btn-animate-6 r docStatusUpdate" status="2" updated_by="{{Auth::user()->id}}"><span class="btntext"><i class="fa fa-thumbs-o-down"></i> Reject</span>
            <div class="btninfo bg-primary">Click</div>
          </button>
        </div>
      </div>
  </div>
</div>
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
                {{-- @if(isset($userPaymentInstallment)&&count($userPaymentInstallment)>0) --}}
                  <li {{($userRetainerAgreement!='')?'data-step-target="step2"':''}}><span>Retainer Agreement</span></li>
                  <li {{($userRetainerAgreement!='')?'data-step-target="step3"':''}}><span>Request & Review Documents</span></li>
                  <li {{($userRetainerAgreement!='')?'data-step-target="step4"':''}}><span>Complete Immigration Forms</span></li>
                  <li {{($userRetainerAgreement!='')?'data-step-target="step5"':''}}><span>IRCC Process</span></li>
                {{-- @endif --}}
              </ul>
              <div class="step-content">
                <div class="step-tab-panel" data-step="step1">
                  <div class="row p-3">
                    <div class="card-body">
                      <div class="d-flex align-items-md-start align-items-center flex-column flex-md-row">
                        <div class="image-input avatar xxl rounded-4" style="background-image: url({{ url($userDetails->avatar)}})">
                          <div class="avatar-wrapper rounded-4" style="background-image: url({{ url($userDetails->avatar)}})"></div>
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
                                {{'Total Amount: ₹'.($paymentQuote->quote_amount??'') }}<br>
                                {{'Diacount: ₹'.($paymentQuote->discount??'') }}<br>
                                {{'Notes: '.($paymentQuote->notes??'') }}
                              </p>
                            </div>
                            <div class="col-lg-6 col-md-12">
                              <h5 class="mb-0 fw-light">Payment break-up</h5>
                              <div class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                                @if(isset($userPaymentInstallment)&&count($userPaymentInstallment)>0)
                                  @foreach($userPaymentInstallment as $i=>$payment)
                                  <div class="card py-1 px-3 me-2 mt-2">
                                    <small class="text-muted">{{ ($i+1).' Installment' }}</small>
                                    <div class="fs-6">₹{{ $payment->amount }}</div>
                                    <small class="text-black">Due @ {{ $payment->due_date }}</small>
                                  </div>
                                  @endforeach
                                @else
                                  <p class="text-danger">Payment details not define, please set befor go next.</p>
                                  <a href="{{ url('client-profile') . '/' . Crypt::encryptString( $userDetails->id ) }}"
                                    class="btn m-1 btn-primary btn-animate-6"><span
                                        class="btntext">Set Payment Details</span>
                                    <div class="btninfo bg-success">Go</div>
                                  </a>
                                @endif
                              </div>
                            </div>

                            

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="step-tab-panel p-3" data-step="step2">
                  <h6 class="card-title">Auto Generated <span class="small text-muted">Retainer Agreement</span></h6>
                  @if($userRetainerAgreement!='')
                  @if($userRetainerAgreement->status==0)
                    <div class="row g-3 mb-4">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-body">
                            <p>This is auto generated retainer agreement for this client/user, <a class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" href="{{url($userRetainerAgreement->agreement)}}"><span><i class="fa fa-download"></i> click to review</span> </a> before send to client.</p>
                            <p>*ONLY ADMIN CAN CHANGE THE CONTENT</p>
                            <button class="btn mx-2 btn-primary btn-animate-1 mb-2" data-bs-toggle="modal" id="sendmail" data-bs-target="#sendmail" data-emailid="{{ $userDetails->email_id }}" data-attachmentMSG="Retainer agreement attached" data-attachment="{{$userRetainerAgreement->agreement}}">
                              <span>Click to send</span>
                              <i class="fa fa-long-arrow-right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  @elseif($userRetainerAgreement->status==1)
                  <div class="row g-3 mb-4">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <p class="lead"><a class="luno-link text_bg" href="{{url($userRetainerAgreement->agreement)}}">Retainer agreement </a> send to client, waiting for the approval.</p>
                        </div>
                      </div>
                    </div>
                  </div>   
                  @else
                  <div class="row g-3 mb-4">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <p class="lead"><a class="luno-link text_bg" href="{{url($userRetainerAgreement->agreement)}}">Retainer agreement </a> approved by client, now you can go next step.</p>
                        </div>
                      </div>
                    </div>
                  </div>        
                  @endif
                  @endif
                </div>
                <div class="step-tab-panel p-3" data-step="step3">
                  <h6 class="card-title">Documents list <span class="small text-muted">which are required to process.</span></h6>
                  
                  <div class="col-12">
                    <table style="width: 100%;" class="table align-middle table-bordered mb-0 custom-table-2 myDataTable_no_filter">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Uploaded</th>
                          <th>Modified By</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(isset($userFormDocuments)&&count($userFormDocuments)>0)
                          @foreach($userFormDocuments as $i=>$doc)
                            <tr>
                              <td>
                                <span class="me-4 ms-2">{{ $doc['doc']->doc_name }}</span>
                                <a class="badge bg-light text-dark" href="#">{{ $doc['doc']->demo_doc }}</a>
                              </td>
                              <td id="{{$doc['data']!=''?$doc['data']->id.'_status':''}}">{!! ($doc['data']=='')?'Not Uploaded':($doc['data']->status==0?'Waiting for approval&nbsp;<i class="fa fa-folder"></i>':($doc['data']->status==1?'<i class="text-success fa fa-check"></i>&nbsp;Approved':'<i class="text-danger fa fa-close"></i>&nbsp;Reject')); !!}</td>
                              <td>{{ ($doc['data']=='')?'-':date('d M Y', strtotime($doc['data']->created_at)) }}</td>
                              <td id="{{$doc['data']!=''?$doc['data']->id.'_updated_by':''}}">{{ ($doc['data']=='')?'-':$doc['data']->updated_by }}</td>
                              <td>
                                @if($doc['data']=='')
                                  <button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="tooltip" data-placement="top" title="Document not uploaded"><i class="fa fa-gear"></i></button>
                                @else
                                  <button type="button" class="btn btn-link btn-sm text-primary approvalPopupBtn" doc="{{url($doc['data']->document)}}" status="{{$doc['data']->status}}" id="{{$doc['data']->id}}" data-bs-toggle="modal" data-bs-target="#approval_popup"><i class="fa fa-gear"></i></button>
                                @endif  
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <div class="step-tab-panel p-3" data-step="step4">
                  {{-- @if(count($userFormDocuments)>0)
                    @foreach($userFormDocuments as $i=>$doc)
                          @if($doc['data']=='')
                              
                          @else
                            <button type="button" class="btn btn-link btn-sm text-primary approvalPopupBtn" doc="{{url($doc['data']->document)}}" status="{{$doc['data']->status}}" id="{{$doc['data']->id}}" data-bs-toggle="modal" data-bs-target="#approval_popup"><i class="fa fa-gear"></i></button>
                          @endif 
                    @endforeach
                  @endif --}}

                  <div class="row g-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fa fa-thumbs-up me-2"></i>Getting worked</h5>
                            </div>
                            <div class="card-body">
                                <p class="">
                                  Congratulations! I am thrilled to hear that you have achieved a significant milestone!
                                  <br/>
                                  Make sure the client full fill the required information to generate the final immigration forms. 
                                </p>
                                <p class="">
                                    <span class="ms-2">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </span>
                                </p> 
                                @if($userGenerateForm=='')
                                  <button class="btn mx-2 btn-primary btn-animate-1 mb-2" form_id="{{$userDetails->visa_id}}" case_id="{{$userDetails->id}}" generate_by="{{$userDetails->managed_by}}" onclick="generate_form(this)">
                                    <span>Generate Immigration Form </span>
                                    <i class="fa fa-long-arrow-right"></i>
                                  </button>
                                  <span id="form_link"></span>
                                @else
                                  @if($userGenerateForm->uploaded_generated_form=='')
                                    <span id="form_link"><a class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" href="{{url($userGenerateForm->generated_form)}}"><span><i class="fa fa-download"></i> Immigration Form</span></a>&nbsp;generated, this is auto generated form, kindly click to review the form, check properly and do the needfull currection and <a class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" data-bs-toggle="modal" data-bs-target="#uploadCorrectedForm"><span><i class="fa fa-upload"></i> clicl here</span></a> to submit the currected form to generate bar code before submit to the IRCC.</span>
                                  @else
                                  <span id="form_link">Auto generate <a class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" href="{{url($userGenerateForm->generated_form)}}"><span><i class="fa fa-download"></i> Immigration Form<span></a> and <a class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" href="{{url($userGenerateForm->uploaded_generated_form)}}"><span><i class="fa fa-download"></i> clicl here</span></a> to download your bar coded form for IRCC.</span>
                                  @endif
                                @endif
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="step-tab-panel p-3" data-step="step5">
                  <div class="row">
                    @if($userGenerateForm!=''&&$userGenerateForm->uploaded_generated_form!='')
                      {{-- from vue --}}
                      <div id="root-ircc-process">
                        <ircc-process></ircc-process>
                      </div>
                    @else
                      <p>kindly complete the "Complete Immigration Process"</p>
                    @endif
                  </div>
                </div>
              </div>
              @if($userRetainerAgreement!=''&&$userRetainerAgreement->status==2)
              <div class="step-footer d-flex justify-content-end p-3">
                <button class="btn btn-primary step-btn ms-1" data-step-action="prev">Prev</button>
                <button class="btn btn-primary step-btn ms-1" data-step-action="next">Next</button>
                <button class="btn btn-primary step-btn ms-1" data-step-action="finish">Finish</button>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      window.userDetails = "{{ $userDetails->id?json_encode($userDetails):'' }}";
    </script>
  </div>
</div>
@endsection

