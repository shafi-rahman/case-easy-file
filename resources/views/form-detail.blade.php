@extends('layouts.app')
@section('content')
<style>
.sdiv{
    color: #737373;
    font-size: 12px;
}
.shortcodecopybtn{
    position: absolute;
    right: 25px;
    top: 0;
    color: #3c63b8;
    cursor: pointer;
}
</style>

<div class="modal fade" id="shortCodeList" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header"><h5 class="modal-title h5">User's available form short-code list</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-3">
                @foreach($shortCodes as $shortCode)
                    <div class="row g-2" id="field_div">
                        <div class="col-6">
                            <div class="form-check">
                                <label class="form-check-label">{{ucfirst(str_replace("_", " ", $shortCode->field_name))}}</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <label class="form-check-label">{{$shortCode->field_short_code}}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formFieldsPopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header"><h5 class="modal-title h5">Form extra data fields </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-3">
                <div class="row g-2" id="field_div">
                    <small class="mb-2"><code class="text-danger">*</code>Short-code field name, must be without space only underscore( _ ) allow to merge two name. e.g. name1_name2</small>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="field_name">
                            <label>Short-code field name <code class="text-danger">*</code></label>
                        </div>
                    </div>
                    <div class="col-6 ps-4">
                        <div class="form-floating">
                            <div class="sdiv">Short-code</div>
                            <label>${field_name}</label>
                            <div title="click to copy" class="shortcodecopybtn">copy</div>
                        </div>
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

<div class="modal fade" id="formDocumentsPopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header"><h5 class="modal-title h5">Form required document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-3">
                <p>Under process</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formUploadPopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header"><h5 class="modal-title h5">Upload final updated form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-3">
                <p>Under process</p>
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
                    <li class="breadcrumb-item">Form Management</li>
                    <li class="breadcrumb-item active" aria-current="page">Form Detail</li>
                </ol>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col">
                <div class="">
                    <button data-bs-toggle="modal" data-bs-target="#shortCodeList"
                        class="btn btn-outline-primary"><i class="fa fa-file-text-o"></i> Short-code List</button>
                </div>
            </div>
            <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                <div class="p-2 me-md-3">
                    <div><span class="h6 mb-0">{{ count($formList) }}</span> <small class="text-secondary">
                        <i class="fa fa-file-text"></i></small></div>
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
                                            <th>status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($formList as $i=>$form)
                                            <tr>
                                                <td>{{($i+1)}}</td>
                                                <td>{{($form->name)}}{!!($form->form=='')?'&nbsp;<small class="badge bg-warning">New Form</small>':''!!}</td>
                                                <td>{{($form->type==1?'Visa':'Agreement')}}</td>
                                                <td>{{($form->status==1?'Active':'In-active')}}</td>
                                                <td>{{date("d M Y", strtotime($form->created_at))}}</td>
                                                <td>
                                                    <button fid="{{($form->id)}}"
                                                        class="btn m-1 btn-primary btn-animate-6 formTypeBtn" 
                                                        data-bs-toggle="modal" data-bs-target="#formFieldsPopup">
                                                        <span class="btntext">Form Fields</span>
                                                        <div class="btninfo bg-success">Click</div>
                                                    </button>
                                                    <button fid="{{($form->id)}}"
                                                        class="btn m-1 btn-primary btn-animate-6 formTypeBtn" 
                                                        data-bs-toggle="modal" data-bs-target="#formDocumentsPopup">
                                                        <span class="btntext">Form Documents</span>
                                                        <div class="btninfo bg-success">Click</div>
                                                    </button>
                                                    <button fid="{{($form->id)}}"
                                                        class="btn m-1 btn-primary btn-animate-6 formTypeBtn" 
                                                        data-bs-toggle="modal" data-bs-target="#formUploadPopup">
                                                        <span class="btntext">Form Upload</span>
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
