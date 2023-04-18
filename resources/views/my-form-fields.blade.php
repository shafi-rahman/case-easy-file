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
                    <li class="breadcrumb-item active" aria-current="page">My Form Fields</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="body-area">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="row g-3">
                <div class="col-6">
                    <div class="card fieldset border border-primary">
                      <span class="fieldset-tile text-primary bg-body">Required details for the visa process:</span>
                    <div class="row g-2">
                      <div class="col-12">
                        @if(count($userFields)>0)
                          <form class="row g-2 pt-3" method="GET" action="">
                          @foreach($userFields as $i=>$field)
                            <div class="col-md-12 col-12">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="fields[{{ $field['field']->id }}]" value="{{ ($field['data']->field_id==$field['field']->id)?$field['data']->field_value:'' }}" placeholder="First Name" required>
                                <label>{{ucfirst(str_replace('_', ' ', $field['field']->field_name))}} <code class="text-danger">*</code></label>
                              </div>
                            </div>
                          @endforeach
                            <input type="hidden" name="case_id" value="{{ $field['case_id'] }}"/>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end personal_details_btn_main">
                              <button type="submit" value="submit" name="submitformfield" class="btn m-1 btn-lg btn-primary btn-animate-6">
                                <span class="btntext">Save</span>
                                <div class="btninfo bg-success">Click</div>
                              </button>
                            </div>
                          </form>
                        @endif
                      </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
