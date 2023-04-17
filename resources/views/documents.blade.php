@extends('layouts.app')
@section('content')
<style>
  #errorDiv{ display: none; }
</style>
<div class="modal fade" id="document_upload" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content text-start">
          <div class="modal-header">
              <h5 class="modal-title h4">Upload Document</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body custom_scroll p-lg-4">
              <div class="mb-4">
                  <p class="text-muted">Please make the document you are going to upload, must clear the information.</p>
              </div>
                <form id="uploadDocument" enctype="multipart/form-data">
                  <div class="mb-3">
                      <label for="formFile" class="form-label">Select a document file</label>
                      <input class="form-control" type="file" name="file">
                  </div>
                  <button class="btn btn-primary text-uppercase w-100 mt-3 btn-animate-6" id="docuploadBtn"><span class="btntext">Proceed to Upload</span>
                      <div class="btninfo bg-success">Click</div>
                  </button>
                  <div class="alert alert-warning text-center mt-3" id="errorDiv"></div>
                </form>
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
                    <li class="breadcrumb-item active" aria-current="page">Documents</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="body-area">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card fieldset border border-primary">
                      <span class="fieldset-tile text-primary bg-body">Required document list for the visa process:</span>
                    <div class="row g-2">
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
                            @if(count($userDocuments)>0)
                              @foreach($userDocuments as $i=>$doc)
                                <tr>
                                  <td>
                                    <span class="me-4 ms-2">{{ $doc['doc']->doc_name }}</span>
                                    <a class="badge bg-light text-dark" href="#">{{ $doc['doc']->demo_doc }}</a>
                                  </td>
                                  <td id="{{$doc['doc']->id.'_status'}}">{!! ($doc['data']=='')?'Not Uploaded':($doc['data']->status==0?'Waiting for approval&nbsp;<i class="fa fa-folder"></i>':($doc['data']->status==1?'<i class="text-success fa fa-check"></i>&nbsp;Approved':'<i class="text-danger fa fa-close"></i>&nbsp;Reject')); !!}</td>
                                  <td id="{{$doc['doc']->id.'_date'}}">{{ ($doc['data']=='')?'-':date('d M Y', strtotime($doc['data']->created_at)) }}</td>
                                  <td id="{{$doc['doc']->id.'_updated_by'}}">{{ ($doc['data']=='')?'-':$doc['data']->updated_by }}</td>
                                  <td>
                                    @if($doc['data']=='')
                                      <button type="button" class="btn btn-link btn-sm text-primary approvalPopupBtn" data-bs-toggle="modal" created_by="{{ $doc['created_by'] }}" case_id="{{ $doc['case_id'] }}" status="0" did="{{$doc['doc']->id}}" data-bs-target="#document_upload"><i class="fa fa-cloud-upload"></i></button>
                                    @else
                                      <button type="button" class="btn btn-link btn-sm text-primary approvalPopupBtn" created_by="{{ $doc['created_by'] }}" case_id="{{ $doc['case_id'] }}" status="{{$doc['data']->status}}" did="{{$doc['doc']->id}}" data-bs-toggle="modal" data-bs-target="#document_upload"><i class="fa fa-cloud-upload"></i></button>
                                    @endif  
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
    </div>
</div>

@endsection
