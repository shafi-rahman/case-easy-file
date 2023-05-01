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
                                    <small class="text-muted">Total Charges</small>
                                    @if($paymentQuote!='')
                                    <h4>₹ {{ $paymentQuote->quote_amount }}</h4>
                                    <p class="m-0">{{ $paymentQuote->notes }}</p>
                                    @else
                                    <p>Amount quote not defile.</p>
                                    @endif
                                </div>
                            </div>
                            @if(count($paymentInstallment)>0)
                                @foreach($paymentInstallment as $installment)
                                    <div class="item card">
                                        <div class="card-body">
                                            <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">DO</div>
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
                                            <img src="assets/img/xs/avatar1.jpg" class="rounded-circle sm avatar" alt="">
                                            <div class="ms-2 mb-0">Andew Jon</div>
                                        </div>
                                    </td>
                                    <td class="fw-bold">USD 12,820</td>
                                    <td>Jan 16 2022</td>
                                    <td>Jan 20 2022</td>
                                    <td>
                                        <a href="client-billing-details.php" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="modal" data-bs-target="#invoice_send"><i class="fa fa-envelope"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="modal" data-bs-target="#invoice_detail"><i class="fa fa-download"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
                                            <img src="assets/img/xs/avatar9.jpg" class="rounded-circle sm avatar" alt="">
                                            <div class="ms-2 mb-0">Chris Fox</div>
                                        </div>
                                    </td>
                                    <td class="fw-bold">USD 2,000</td>
                                    <td>Jan 03 2022</td>
                                    <td>Jan 05 2022</td>
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="modal" data-bs-target="#invoice_send"><i class="fa fa-envelope"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="modal" data-bs-target="#invoice_detail"><i class="fa fa-download"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
                                            <img src="assets/img/xs/avatar10.jpg" class="rounded-circle sm avatar" alt="">
                                            <div class="ms-2 mb-0">Bucky Barnes</div>
                                        </div>
                                    </td>
                                    <td class="fw-bold">USD 1,100</td>
                                    <td>Feb 03 2022</td>
                                    <td>Feb 05 2022</td>
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="modal" data-bs-target="#invoice_send"><i class="fa fa-envelope"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="modal" data-bs-target="#invoice_detail"><i class="fa fa-download"></i></button>
                                        <button type="button" class="btn btn-link btn-sm color-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body custom_scroll">
                                    <table class="card p-2">
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center; width: 100%;">
                                                <table class="table table-borderless mb-0" width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="text-align: center;">
                                                            <h2 style="margin-bottom: 0;">$33.98 Paid</h2>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-bottom: 30px 0; padding-top: 10px; text-align: center;">
                                                            <h4 style="margin-bottom: 0;">Thanks for using TTM Inc.</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 20px 0;">
                                                            <table width="100%">
                                                                <tr>
                                                                    <td> Attn: <strong>Daniel Marek</strong> 43-190 Mikolow, Poland<br> Email: <a href="https://www.wrraptheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9af7fbe8fff1dafefbf4f3fff6b4f9f5f7">[email&#160;protected]</a><br> Phone: +48 123 456 789<br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table class="table table-borderless table-striped mb-0" cellpadding="0" cellspacing="0">
                                                                            <tr>
                                                                                <td style="text-align: left;">Extended License</td>
                                                                                <td style="text-align: right;">$19.99</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: left;">1 year subcription</td>
                                                                                <td style="text-align: right;">$9.99</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: left;">Instalation and Customization</td>
                                                                                <td style="text-align: right;">$4.00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: right;" width="80%"><strong>Total</strong></td>
                                                                                <td style="text-align: right;">$33.98</td>
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
                                                        <td style="padding: 0; text-align: center;"> TTM Inc. 70 Bowman St. South Windsor, CT 06074 </td>
                                                    </tr>
                                                </table>
                                                <table width="100%" style="text-align: center; margin-top: 40px;">
                                                    <tr>
                                                        <td class="aligncenter content-block">Questions? Email <a href="mailto:"><span class="__cf_email__" data-cfemail="81e8efe7eec1f5e9e4ece4ece0eaeae4f3afe2eeec">[email&#160;protected]</span></a></td>
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body custom_scroll">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td> Invoice <strong>01/Nov/2020</strong>
                                                    </th>
                                                <td class="text-end">
                                                    <span class="text-danger"> <strong>Status:</strong> Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>From:</div>
                                                    <div class="fs-6 fw-bold mb-1">Webz Poland</div>
                                                    <div>Madalinskiego 8</div>
                                                    <div>71-101 Szczecin, Poland</div>
                                                    <div>Email: <a href="https://www.wrraptheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="90f9fef6ffd0e7f5f2eabef3fffdbee0fc">[email&#160;protected]</a></div>
                                                    <div>Phone: +48 444 666 3333</div>
                                                </td>
                                                <td class="text-end">
                                                    <div>To:</div>
                                                    <div class="fs-6 fw-bold mb-1">Bob Mart</div>
                                                    <div>Attn: Daniel Marek</div>
                                                    <div>43-190 Mikolow, Poland</div>
                                                    <div>Email: <a href="https://www.wrraptheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d9b4b8abbcb299bdb8b7b0bcb5f7bab6b4">[email&#160;protected]</a></div>
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
                                                                <td>Instalation and Customization (cost per hour)</td>
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
                                                                    <p class="text-muted">You know, being a test pilot isn't always the healthiest business in the world. We predict too much for the next year and yet far too little for the next 10.</p>
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
                                                                                <td class="text-end"><strong>$7.477,36</strong></td>
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
                                    <button type="button" class="btn btn-primary"><i class="fa fa-print me-2"></i>Print</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
