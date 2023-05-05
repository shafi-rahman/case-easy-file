@extends('layouts.app')
@section('content')

<div class="modal fade" id="approval_popup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLiveLabel">Retainer Agreement Approval</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-5">
                <div class="row g-2">
                    <div class="col-12">
                        <p>To the agreement approval, we will send an OTP to the registered email, click to proceed.</p>
                    </div>
                    <div id="approval_popup_content">
                        <div class="text-center">
                            <div class="btn m-1 btn-primary btn-animate-6" id="send_otp"><span class="btntext">Send OTP</span><div class="btninfo bg-success">Click</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agreement</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0">
    <div class="container">
        <div class="row g-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fa fa-thumbs-up me-2"></i>Getting Started</h5>
                    </div>
                    <div class="card-body">
                        <p class="">A general retainer agreement is a contract between a client and a service provider, typically a lawyer, consultant, or other professional, that establishes an ongoing relationship for the provision of services. The agreement typically outlines the scope of services to be provided, the fees and billing arrangements, and the duration of the relationship. In exchange for a regular fee or retainer, the service provider agrees to make themselves available to the client for a specified number of hours or services each month or year. This type of agreement is often used in situations where the client requires ongoing support or advice from the service provider, rather than a one-time project or transaction. It can provide both parties with the security of a long-term relationship and ensure that the client receives consistent and reliable service.</p>
                        <p class="">
                            <span class="ms-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                            </span>
                        </p> 
                        @if($agreementDetails->agreement!=NULL)
                            <p class="">Your <a class="luno-link text_bg" href="{{url($agreementDetails->agreement)}}">Retainer agreement </a> is here, please check and <button class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" data-bs-toggle="modal" data-bs-target="#approval_popup"><span>click to approve</span></button> it</p>
                            <p class="">If you have any query, talk to your case Officer <a href="#" data-bs-toggle="modal" data-bs-target="#RecentChat"> Rishab Panth</a>
                        @else 
                            <p>Not generated till.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
