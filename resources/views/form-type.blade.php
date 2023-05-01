@extends('layouts.app')
@section('content')

<div class="modal fade" id="formTypePopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header"><h5 class="modal-title h4">Form Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-3">
                <div class="row g-2" id="field_div">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name">
                        <label>Form Name <code class="text-danger">*</code></label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="description" style="height: 80px"></textarea>
                        <label class="form-label">Description</label>
                    </div>
                    <div class="form-floating">
                      {{-- <input type="text" class="form-control" id="type"> --}}
                      <select class="form-control show-tick ms" id="type" style="height: 58px;">
                        <option value="">Select Type</option>
                        <option value="1">Visa</option>
                        <option value="2">Agreement</option>
                      </select>
                      <label>Form Type <code class="text-danger">*</code></label>
                    </div>

                    

                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="status">
                            <label class="form-check-label" for="status">Status</label>
                        </div>
                        <span class="text-muted small">If you need to active/inactive this form type.</span>
                    </div>
                    <div class="col-12 mt-3 text-canter">
                        <input type="hidden" id="fid" name="fid" value=""/>
                        <button class="btn btn-primary text-uppercase btnaction" type="button" onclick="save_form_type()">Save</button>
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
                        <li class="breadcrumb-item">Form Managment</li>
                        <li class="breadcrumb-item active" aria-current="page">Form Type</li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <div class="">
                        <button data-bs-toggle="modal" data-bs-target="#formTypePopup"
                            class="btn btn-outline-primary"><i class="fa fa-file-text-o"></i> Create New Form Type</button>
                    </div>
                </div>
                <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                    <div class="p-2 me-md-3">
                        <div><span class="h6 mb-0">{{ count($formList) }}</span> <small class="text-secondary"><i
                                    class="fa fa-file-text"></i></small></div>
                        <small class="text-muted text-uppercase">Form Type</small>
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
                                                <th>name</th>
                                                <th>type</th>
                                                <th>description</th>
                                                <th>status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($formList as $i=>$form)
                                                <tr>
                                                    <td>{{($i+1)}}</td>
                                                    <td>{{($form->name)}}</td>
                                                    <td>{{($form->type==1?'Visa':'Agreement')}}</td>
                                                    <td>{{($form->description)}}</td>
                                                    <td>{{($form->status==1?'Active':'In-active')}}</td>
                                                    <td>{{($form->created_at)}}</td>
                                                    <td>
                                                        <button 
                                                            name="{{($form->name)}}" type="{{($form->type)}}"
                                                            description="{{($form->description)}}" status="{{($form->status)}}"
                                                            fid="{{($form->id)}}"
                                                            class="btn m-1 btn-primary btn-animate-6 formTypeBtn" data-bs-toggle="modal" data-bs-target="#formTypePopup">
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
