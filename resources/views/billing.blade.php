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
    </div>
</div>


<div class="modal fade" id="invoice_detail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll">
                <table class="table table-borderless mb-0">
                    <tbody>
                        <tr>
                            <td> Invoice <strong>{{date('d M Y')}}</strong>
                                </th>
                            <td class="text-end" style="text-align: right !important;">
                                <span class="text-danger"> <strong>Status:</strong> Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>From:</div>
                                <div class="fs-6 fw-bold mb-1">{{$subscriberDetail->company_name}}</div>
                                <small class="fw-bold mb-1">{{$subscriberDetail->auth_number}}</small>
                                <div>{{$subscriberDetail->company_address}}<br/>{{$subscriberDetail->city_name}}<br/>{{$subscriberDetail->state_name}},&nbsp;{{$subscriberDetail->country_name}}</div>
                                
                            </td>
                            <td class="text-end" style="float: right; text-align: right !important;">
                                <div>To:</div>
                                <div class="fs-6 fw-bold mb-1">{!!$paymentQuote->first_name.'&nbsp;'.$paymentQuote->middle_name.'&nbsp;'.$paymentQuote->last_name!!}</div>
                                <div>{{$paymentQuote->address}}<br/>{{$paymentQuote->city_name}}<br/>{{$paymentQuote->state_name}},&nbsp;{{$paymentQuote->country_name}}</div>
                                <div>Email: {{$paymentQuote->email_id}}</div>
                                <div>Phone: {{$paymentQuote->mobile_number}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table class="table table-borderless table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70%;">Description</th>
                                            <th style="width: 30%;" class="text-end" style="text-align: right !important;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="description"></td>
                                            <td class="text-end" style="text-align: right !important;" id="amount">$999,00</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 50px;">
                                                <h6>Terms &amp; Condition</h6>
                                                <p class="text-muted">These may include restrictions on use, ownership of intellectual property, and liability limitations. It is important to review and agree to these terms before downloading any invoices from the website.</p>
                                            </td>
                                            <td style="padding-top: 50px; width: 30%;">
                                                <table class="table table-borderless mb-0 " style="width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:50%"><strong>Subtotal</strong></td>
                                                            <td class="text-end" style="width:50%; text-align: right !important;" id="subtotal">$8.497,00</td>
                                                        </tr>
                                                        @if($paymentQuote->invoice_type==1)
                                                        <tr>
                                                            <td style="width:50%"><strong>TAX (13%)</strong></td>
                                                            <td class="text-end" style="width:50%; text-align: right !important;" id="tax">$679,76</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td style="width:50%"><strong>Total</strong></td>
                                                            <td class="text-end" style="width:50%; text-align: right !important;"><strong id="total">$7.477,36</strong></td>
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
            <div class="modal-footer" id="printBtn">
                <button type="button" onclick="$('#invoice_detail').print();" class="btn btn-primary"><i class="fa fa-print me-2"></i>Print</button>
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
                    <div class="card bg-body flex-row p-3 justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <img src="assets/img/paper-plane.png" class="rounded" width="40">
                            <div class="d-flex flex-column ms-3">
                                <span class="fw-bold fs-6">Small Business</span>
                                <span>CHANGE PLAN</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center fs-5">
                            <sup class="fw-bold">$</sup>
                            <span class="mx-1">8,350</span>
                            <span class="fw-bold">/ year</span>
                        </div>
                    </div>
                    <div class="card my-4">
                        <div class="card-body">
                            <h6 class="card-title">Payment details</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <img src="assets/img/visa-card.png" alt="" class="rounded" width="60">
                                    <div class="d-flex flex-column ms-3">
                                        <span class="fw-bold">Credit Card</span>
                                        <span class="small">1234 XXXX XXXX 2570</span>
                                    </div>
                                </div>
                                <div><input type="text" class="form-control w60" placeholder="CVC"> </div>
                            </div>
                            <div class="mt-2 d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <img src="assets/img/card.png" alt="" class="rounded" width="60">
                                    <div class="d-flex flex-column ms-3">
                                        <span class="fw-bold">Credit Card</span>
                                        <span class="small">2344 XXXX XXXX 8880</span>
                                    </div>
                                </div>
                                <div><input type="text" class="form-control w60" placeholder="CVC"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-primary">ADD PAYMENT METHOD</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Email Address">
                    </div>
                    <button class="btn btn-lg btn-primary text-uppercase w-100">Proceed to payment<i class="fa fa-long-arrow-right ms-3"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="tab-content">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card fieldset border border-primary">
                        <span class="fieldset-tile text-primary bg-body">Services Charges & Upcomming Invoices:</span>
                        <div class="owl-carousel owl-theme" id="recent_invoices">
                            <div class="item card ribbon">
                                <div class="option-9 position-absolute text-light"><i class="fa fa-star"></i></div>
                                <div class="card-body">
                                    <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">TQ</div>
                                    <p class="m-0">Total Charges</P>
                                    
                                    @if($paymentQuote!='')
                                        <h4>₹ {{ $paymentQuote->quote_amount }}</h4>
                                        <p class="m-0">{{ $paymentQuote->notes }}</p>
                                    @else
                                        <p>Amount quote not defile.</p>
                                    @endif
                                    
                                    @if($paymentQuote->invoice_type==1)
                                        <small class="text-muted">Invoice will come with tax</small>
                                    @else
                                        <small class="text-muted">Invoice will come with out tax</small>
                                    @endif

                                </div>
                            </div>
                            @if(count($paymentInstallment)>0)
                                @foreach($paymentInstallment as $i=>$installment)
                                    <div class="item card">
                                        <div class="card-body">
                                            <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">{{($i+1)}}</div>
                                            <small class="text-muted">Total</small>
                                            <h4>₹ {{ $installment->amount }}</h4>
                                            <p class="text-grey">Due Date: {{ date("d M Y", strtotime($installment->due_date)) }}</p>
                                            @if($installment->status==0)
                                                <button class="btn btn-primary px-4 text-uppercase" data-bs-toggle="modal" data-bs-target="#Upgradeplan" type="button">Payment</button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    
                </div>
                <div class="col-12">

                    <div class="card fieldset border border-muted">
                        <span class="fieldset-tile text-muted bg-body">All Invoices:</span>
                        <table id="invoice_list" class="table card-table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Bank Info</th>
                                    <th>Transaction</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($paymentInvoice)>0)
                                    @foreach($paymentInvoice as $invoice)
                                        <tr class="row-selectable">
                                            <td>#ECF00{{$invoice->id}}</td>
                                            <td>{{$invoice->bank_name}}</td>
                                            <td>{{$invoice->transaction_number}}</td>
                                            <td>{{$invoice->amount}}</td>
                                            <td>{{date('d M Y', strtotime($invoice->payment_date))}}</td>
                                            <td>
                                                <button invoice_type="{{$paymentQuote->invoice_type}}" notes="{{$invoice->notes}}" amount="{{$invoice->amount}}" transaction_number="{{$invoice->transaction_number}}" 
                                                    location="{{$invoice->location}}" ifsc="{{$invoice->ifsc}}" bank_name="{{$invoice->bank_name}}" payment_date="{{$invoice->payment_date}}"
                                                type="button" class="btn btn-link btn-sm color-400 invoiceDetailBtn" data-bs-toggle="modal" data-bs-target="#invoice_detail"><i class="fa fa-eye"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function print_preview(){
    var prtContent = document.getElementById("invoice_detail");
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    // WinPrint.close();
}

</script>


@endsection
