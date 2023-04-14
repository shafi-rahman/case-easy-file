@extends('layouts.app')
@section('content')
<div class="modal fade" id="document_upload" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content text-start">
          <div class="modal-body custom_scroll p-lg-4">
              <div class="mb-4">
                  <h4>Upgrade your plan</h4>
                  <p class="text-muted">Please make the payment to start enjoying all the features of our premium plan as soon as possible</p>
              </div>
              <input type="file" class="dropify">

              <button class="btn btn-lg btn-primary text-uppercase w-100">Proceed to payment<i class="fa fa-long-arrow-right ms-3"></i></button>
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
    <div class="container-fluid pt-4">
        <div class="tab-content">
            <div class="row g-3">

                <div class="col-12">

                    <div class="card fieldset border border-primary">
                    <div class="row g-2 mb-5">
                      <div class="col-12">
                        <div class="row-title">
                          <div>
                            <h6 class="fw-bold mb-0">Recent Activity</h6>
                            <span class="text-muted">Based your preferences</span>
                          </div>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary"><i class="fa fa-align-left"></i></button>
                            <button type="button" class="btn btn-outline-primary"><i class="fa fa-th"></i></button>
                          </div>
                        </div>
                      </div>
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
                                  <td id="{{$doc['data']!=''?$doc['data']->id.'_status':''}}">{!! ($doc['data']=='')?'Not Uploaded':($doc['data']->status==0?'Waiting for approval&nbsp;<i class="fa fa-folder"></i>':($doc['data']->status==1?'<i class="text-success fa fa-check"></i>&nbsp;Approved':'<i class="text-danger fa fa-close"></i>&nbsp;Reject')); !!}</td>
                                  <td>{{ ($doc['data']=='')?'-':date('d M Y', strtotime($doc['data']->created_at)) }}</td>
                                  <td id="{{$doc['data']!=''?$doc['data']->id.'_updated_by':''}}">{{ ($doc['data']=='')?'-':$doc['data']->updated_by }}</td>
                                  <td>
                                    @if($doc['data']=='')
                                      <button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#document_upload"><i class="fa fa-cloud-upload"></i></button>
                                    @else
                                      <button type="button" class="btn btn-link btn-sm text-primary approvalPopupBtn" doc="{{url($doc['data']->document)}}" status="{{$doc['data']->status}}" id="{{$doc['data']->id}}" data-bs-toggle="modal" data-bs-target="#document_upload"><i class="fa fa-cloud-upload"></i></button>
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
