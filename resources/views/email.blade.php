@extends('layouts.app')
@section('content')

<div class="modal fade" id="EmailTemplatePopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header"><h5 class="modal-title h4">Email Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-3">
                <div class="row g-2" id="email_field_div">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="content_handler">
                        <label>Handler <code class="text-danger">*</code></label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="content_subject">
                        <label>Subject <code class="text-danger">*</code></label>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Body</label>
                        <div class="summernote" id="content_body"></div>
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="status">
                            <label class="form-check-label" for="status">Status</label>
                        </div>
                        <span class="text-muted small">If you need to active/inactive this template.</span>
                    </div>
                    <div class="col-12 mt-3 text-canter">
                        <input type="hidden" id="eid" name="eid" value=""/>
                        <button class="btn btn-primary text-uppercase btnaction" type="button" onclick="save_email_template()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Email</li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <div class="">
                        <button data-bs-toggle="modal" data-bs-target="#EmailTemplatePopup"
                            class="btn btn-outline-primary"><i class="fa fa-file-text-o"></i> Create New Email Template</button>
                    </div>
                </div>
                <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                    <div class="p-2 me-md-3">
                        <div><span class="h6 mb-0">{{ count($emailTemplate) }}</span> <small class="text-secondary"><i
                                    class="fa fa-envelope-o"></i></small></div>
                        <small class="text-muted text-uppercase">Templates</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0">
        <div class="container-fluid">
            <div class="row g-3 row-deck">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table class="table card-table table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>handler</th>
                                                <th>subject</th>
                                                <th>status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($emailTemplate as $i=>$template)
                                                <tr>
                                                    <td>{{($i+1)}}</td>
                                                    <td>{{($template->content_handler)}}</td>
                                                    <td>{{($template->content_subject)}}</td>
                                                    <td>{{($template->status==1?'Active':'In-active')}}</td>
                                                    <td>{{($template->created_at)}}</td>
                                                    <td>
                                                        <button 
                                                            content_handler="{{($template->content_handler)}}"
                                                            content_subject="{{($template->content_subject)}}"
                                                            content_body="{{($template->content_body)}}"
                                                            status="{{($template->status)}}"
                                                            eid="{{($template->id)}}"
                                                            class="btn m-1 btn-primary btn-animate-6 emailTemplatepopup" data-bs-toggle="modal" data-bs-target="#EmailTemplatePopup">
                                                            <span class="btntext">View</span>
                                                            <div class="btninfo bg-success">Click</div>
                                                    </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
