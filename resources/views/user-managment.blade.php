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
                      <span class="fieldset-tile text-primary bg-body">User Details:</span>
                    <div class="row g-2">
                      <div class="col-12">
                        <form class="row g-1 pt-3" method="POST" id="setUserForm">
                          <div class="col-md-12 col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="name" value="{{$user_details->name??''}}" required>
                              <label>User Name <code class="text-danger">*</code></label>
                            </div>
                          </div>
                          <div class="col-md-12 col-12">
                            <div class="form-floating">
                              <input type="email" class="form-control" name="email" value="{{$user_details->email??''}}" required>
                              <label>User Email <code class="text-danger">*</code></label>
                            </div>
                          </div>
                          <div class="col-md-12 col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="mobile" value="{{$user_details->mobile??''}}" required>
                              <label>User Mobile <code class="text-danger">*</code></label>
                            </div>
                          </div>
                          <div class="col-md-12 col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="password" value="" {{isset($user_details->password)&&$user_details->password!=''?'':'required'}}>
                              <label>{!!isset($user_details->password)&&$user_details->password!=''?'Update user password':'User password <code class="text-danger">*</code>'!!}</label>
                            </div>
                          </div>
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end personal_details_btn_main">
                            <input type="hidden" name="aid" value="{{$aid}}">
                            <input type="hidden" name="id" value="{{isset($user_details->id)&&$user_details->id??''}}">
                            <button type="submit" value="add" name="submit" class="btn m-2 btn-primary btn-animate-6 setUserBtn">
                              <span class="btntext">Save</span>
                              <div class="btninfo bg-success">Click</div>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="col-6">
                  <div class="card">
                    <div class="card-body">
                      @if(isset($user_details->id)&&$user_details->id!='')
                      <a href="{{url('user-managment')}}" class="btn m-2 btn-primary btn-animate-6">
                        <span class="btntext">Create New User</span>
                        <div class="btninfo bg-success">Click</div>
                      </a>
                      @endif

                        <div class="tab-content">
                            <div class="table-responsive">
                                <table class="table card-table table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if(count($user_list)>0)
                                        @foreach($user_list as $i=>$user)
                                            <tr>
                                                <td>{{($i+1)}}</td>
                                                <td><a href="{{url('user-managment').'/'.Crypt::encryptString($user->id)}}">{{$user->name}}</a></td>
                                                <td>{{$user->email}}<br><small>{{$user->mobile}}</small></td>
                                                <td>{{date('d M Y', strtotime($user->created_at))}}</td>
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
</div>

@endsection
