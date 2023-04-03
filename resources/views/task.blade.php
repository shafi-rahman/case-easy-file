@extends('layouts.app')
@section('content')

<div class="page-body body-layout-1 my-task">
    <div class="my-task d-flex flex-nowrap">
      <div class="order-1 custom_scroll">
        <button type="button" class="btn bg-secondary text-light mb-3 w-100" data-bs-toggle="modal"
          data-bs-target="#new_task">New Task</button>
        <ul class="nav nav-tabs menu-list list-unstyled mb-0 border-0" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="#" data-bs-toggle="tab" data-bs-target="#task_all" role="tab">
              <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path class="fill-secondary"
                  d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v2A1.5 1.5 0 0 1 14.5 5h-13A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-13z" />
                <path
                  d="M2 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm10.823.323-.396-.396A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
              </svg>
              <span>All Task</span>
              <span class="badge bg-light text-dark ms-2 ms-auto">28</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_priority" role="tab">
              <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                <path class="fill-secondary"
                  d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
              </svg>
              <span>Priority Task</span>
              <span class="badge bg-danger ms-2 ms-auto">2</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_today" role="tab">
              <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path class="fill-secondary"
                  d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                <path
                  d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
              </svg>
              <span>Today's Tasks</span>
              <span class="badge bg-light text-dark ms-2 ms-auto">7</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_week" role="tab">
              <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path class="fill-secondary"
                  d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                <path
                  d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
              </svg>
              <span>This week tasks</span>
              <span class="badge bg-light text-dark ms-2 ms-auto">19</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_me" role="tab">
              <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path class="fill-secondary"
                  d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z" />
                <path
                  d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z" />
              </svg>
              <span>Created by me</span>
              <span class="badge bg-primary ms-2 ms-auto">4</span>
            </a>
          </li>
          <li class="divider mt-4 py-2 border-top text-uppercase text-muted"><small>Tags</small></li>
          <li><a class="m-link" href="#"><i class="fa fa-tags"></i><span>Design</span></a></li>
          <li><a class="m-link" href="#"><i class="fa fa-tags"></i><span>BugFix</span></a></li>
          <li><a class="m-link" href="#"><i class="fa fa-tags"></i><span>Help</span></a></li>
          <li><a class="m-link" href="#"><i class="fa fa-tags"></i><span>R&D</span></a></li>
        </ul>
      </div>
      <div class="order-2 flex-grow-1 px-lg-3 px-0 custom_scroll">

        <div class="page-toolbar py-2">
          <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
              <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                  <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a class="text-secondary" href="app.html">App</a></li>
                  <li class="breadcrumb-item active" aria-current="page">My Tasks</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row g-3">
            <div class="col-12">
              <div class="tab-content">
                <div class="tab-pane fade show active" id="task_all" role="tabpanel">
                  <div class="d-flex justify-content-between mb-2">
                    <h4 class="mt-1 mb-0">All Task</h4>
                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle" type="button"><i
                        class="fa fa-bars"></i></button>
                  </div>
                  <ul class="list-group list-group-flush list-group-custom">
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create new onepage Figma</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Many desktop publishing packages and web page editors now
                              use Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 11</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">LUNO admin Responsive design issue in mobile</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border border-danger text-danger px-1 rounded small">BugFix</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin professor at Hampden-Sydney
                              College in Virginia, looked</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 11</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Start working on new Admin dashboard</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Robert</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">It was popularised in the 1960s with the release of
                              Letraset sheets containing Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 12</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create Logo for LUNO admin app</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Contrary to popular belief, Lorem Ipsum is not simply
                              random text.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 12</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Start Figma to HTML onepage with bootstrap</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Alexander</span>
                              <span class="border border-info text-info px-1 rounded small">HTML</span>
                              <span class="bg-danger text-light px-1 rounded small">Priority</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">All the Lorem Ipsum generators on the Internet tend to
                              repeat predefined</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 15</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create new onepage Figma</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                              <span class="bg-danger text-light px-1 rounded small">Priority</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Many desktop publishing packages and web page editors now
                              use Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 15</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">LUNO admin Responsive design issue in mobile</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border border-danger text-danger px-1 rounded small">BugFix</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin professor at Hampden-Sydney
                              College in Virginia, looked</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 22</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Start working on new Admin dashboard</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Robert</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">It was popularised in the 1960s with the release of
                              Letraset sheets containing Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">March 2</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create Logo for LUNO admin app</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Contrary to popular belief, Lorem Ipsum is not simply
                              random text.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">March 9</div>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="task_priority" role="tabpanel">
                  <div class="d-flex justify-content-between mb-2">
                    <h4 class="mt-1 mb-0">Priority Task</h4>
                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle" type="button"><i
                        class="fa fa-bars"></i></button>
                  </div>
                  <ul class="list-group list-group-flush list-group-custom">
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Start Figma to HTML onepage with bootstrap</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Alexander</span>
                              <span class="border border-info text-info px-1 rounded small">HTML</span>
                              <span class="bg-danger text-light px-1 rounded small">Priority</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">All the Lorem Ipsum generators on the Internet tend to
                              repeat predefined</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 15</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create new onepage Figma</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                              <span class="bg-danger text-light px-1 rounded small">Priority</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Many desktop publishing packages and web page editors now
                              use Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 15</div>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="task_today" role="tabpanel">
                  <div class="d-flex justify-content-between mb-2">
                    <h4 class="mt-1 mb-0">Today's Task</h4>
                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle" type="button"><i
                        class="fa fa-bars"></i></button>
                  </div>
                  <ul class="list-group list-group-flush list-group-custom">
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">LUNO admin Responsive design issue in mobile</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border border-danger text-danger px-1 rounded small">BugFix</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin professor at Hampden-Sydney
                              College in Virginia, looked</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 11</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Start working on new Admin dashboard</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Robert</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">It was popularised in the 1960s with the release of
                              Letraset sheets containing Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 12</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Start Figma to HTML onepage with bootstrap</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Alexander</span>
                              <span class="border border-info text-info px-1 rounded small">HTML</span>
                              <span class="bg-danger text-light px-1 rounded small">Priority</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">All the Lorem Ipsum generators on the Internet tend to
                              repeat predefined</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 15</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create new onepage Figma</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                              <span class="bg-danger text-light px-1 rounded small">Priority</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Many desktop publishing packages and web page editors now
                              use Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 15</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">LUNO admin Responsive design issue in mobile</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border border-danger text-danger px-1 rounded small">BugFix</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin professor at Hampden-Sydney
                              College in Virginia, looked</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 22</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create Logo for LUNO admin app</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Contrary to popular belief, Lorem Ipsum is not simply
                              random text.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">March 9</div>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="task_week" role="tabpanel">
                  <div class="d-flex justify-content-between mb-2">
                    <h4 class="mt-1 mb-0">This week Task</h4>
                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle" type="button"><i
                        class="fa fa-bars"></i></button>
                  </div>
                  <ul class="list-group list-group-flush list-group-custom">
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create new onepage Figma</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Many desktop publishing packages and web page editors now
                              use Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 11</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">LUNO admin Responsive design issue in mobile</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border border-danger text-danger px-1 rounded small">BugFix</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin professor at Hampden-Sydney
                              College in Virginia, looked</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 11</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Start working on new Admin dashboard</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Robert</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">It was popularised in the 1960s with the release of
                              Letraset sheets containing Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 12</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create Logo for LUNO admin app</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Contrary to popular belief, Lorem Ipsum is not simply
                              random text.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 12</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Start Figma to HTML onepage with bootstrap</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Alexander</span>
                              <span class="border border-info text-info px-1 rounded small">HTML</span>
                              <span class="bg-danger text-light px-1 rounded small">Priority</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">All the Lorem Ipsum generators on the Internet tend to
                              repeat predefined</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 15</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Create new onepage Figma</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border px-1 rounded small">Design</span>
                              <span class="bg-danger text-light px-1 rounded small">Priority</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Many desktop publishing packages and web page editors now
                              use Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 15</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">LUNO admin Responsive design issue in mobile</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Chris Fox</span>
                              <span class="border border-danger text-danger px-1 rounded small">BugFix</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">Richard McClintock, a Latin professor at Hampden-Sydney
                              College in Virginia, looked</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">Feb 22</div>
                    </li>
                    <li class="row g-0 list-group-item d-flex align-items-start py-3">
                      <div class="hover-actions end-0 me-3 bg-light rounded">
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Archive"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                          data-bs-placement="top" title="Snooze"><i class="fa fa-clock-o"></i></button>
                      </div>
                      <div class="col col-md-10 col-xxl-11">
                        <div class="row">
                          <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                            <span class="fs-6 me-2">Start working on new Admin dashboard</span>
                            <div>
                              <span class="small text-muted text-uppercase me-2">Assigned By: Robert</span>
                              <span class="border px-1 rounded small">Design</span>
                            </div>
                          </div>
                          <div class="col">
                            <p class="i-msg mb-0 text-muted">It was popularised in the 1960s with the release of
                              Letraset sheets containing Lorem Ipsum</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto ms-auto d-flex flex-column justify-content-between small">March 2</div>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="task_me" role="tabpanel">
                  <div class="d-flex justify-content-between mb-2">
                    <h4 class="mt-1 mb-0">Created by me Task</h4>
                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle" type="button"><i
                        class="fa fa-bars"></i></button>
                  </div>

                  <div class="card">
                    <div class="card-body text-center p-5">
                      <img src="assets/img/no-data.svg" class="w120" alt="No Data">
                      <div class="mt-4 mb-3">
                        <span class="text-muted">No data to show</span>
                      </div>
                      <button type="button" class="btn btn-white border lift">Get Started</button>
                      <button type="button" class="btn btn-primary border lift">Back to Home</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer class="page-footer px-xl-4 px-sm-2 px-0 py-3">
          <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center">
            <p class="col-md-4 mb-0 text-muted">© 2022 <a href="https://www.thememakker.com/" target="_blank"
                title="ThemeMakker Infotech LLP">ThemeMakker</a>, All Rights Reserved.</p>
            <a href="#" class="col-md-4 d-flex align-items-center justify-content-center my-3 my-lg-0 me-lg-auto">
              <svg height="18" viewBox="0 0 67 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" d="M0.863281 18.9997V1.14968H3.11328V16.9997H10.9133V18.9997H0.863281Z" />
                <path class="fill-muted"
                  d="M27.3045 12.6997C27.3045 13.933 27.0545 15.0497 26.5545 16.0497C26.0545 17.033 25.2878 17.8163 24.2545 18.3997C23.2378 18.9663 21.9378 19.2497 20.3545 19.2497C18.1378 19.2497 16.4462 18.6497 15.2795 17.4497C14.1295 16.233 13.5545 14.633 13.5545 12.6497V1.14968H15.8045V12.7247C15.8045 14.1747 16.1878 15.2997 16.9545 16.0997C17.7378 16.8997 18.9128 17.2997 20.4795 17.2997C21.5628 17.2997 22.4378 17.108 23.1045 16.7247C23.7878 16.3247 24.2878 15.783 24.6045 15.0997C24.9212 14.3997 25.0795 13.5997 25.0795 12.6997V1.14968H27.3045V12.6997Z" />
                <path class="fill-secondary"
                  d="M46.5286 0.765681C46.6246 0.82568 46.6726 0.92168 46.6726 1.05368L46.5466 18.6037C46.5466 18.8677 46.3906 18.9937 46.0786 18.9817H44.4586L33.1546 3.62768L33.1006 13.1677L37.5646 13.1857C37.6726 13.1857 37.7626 13.2217 37.8346 13.2937C37.9186 13.3657 37.9606 13.4617 37.9606 13.5817L37.9426 14.8957C37.9426 15.0157 37.9066 15.1237 37.8346 15.2197C37.7626 15.3037 37.6666 15.3457 37.5466 15.3457L31.3726 15.2917H31.3546C31.1026 15.2917 30.9706 15.1837 30.9586 14.9677L31.0666 0.98168C31.0666 0.849679 31.1026 0.74768 31.1746 0.675681C31.2586 0.59168 31.3666 0.555679 31.4986 0.56768H33.1726C33.3406 0.56768 33.4726 0.63368 33.5686 0.765681L44.4406 15.4177L44.5486 0.94568C44.5966 0.741679 44.7286 0.639679 44.9446 0.639679L46.2046 0.65768C46.3126 0.65768 46.4206 0.69368 46.5286 0.765681ZM39.7786 16.7857C39.8986 16.7977 39.9946 16.8397 40.0666 16.9117C40.1386 16.9717 40.1746 17.0677 40.1746 17.1997L40.1566 18.4957C40.1566 18.6157 40.1206 18.7237 40.0486 18.8197C39.9886 18.9037 39.8926 18.9457 39.7606 18.9457H31.3546C31.2346 18.9457 31.1386 18.9097 31.0666 18.8377C30.9946 18.7657 30.9586 18.6697 30.9586 18.5497V17.2357C30.9586 17.1157 30.9946 17.0137 31.0666 16.9297C31.1386 16.8337 31.2406 16.7857 31.3726 16.7857H35.5666C38.0266 16.7857 39.4306 16.7857 39.7786 16.7857Z" />
                <path class="fill-muted"
                  d="M66.0301 10.0497C66.0301 11.433 65.8551 12.6913 65.5051 13.8247C65.1551 14.9413 64.6301 15.908 63.9301 16.7247C63.2467 17.5413 62.3884 18.1663 61.3551 18.5997C60.3384 19.033 59.1551 19.2497 57.8051 19.2497C56.4051 19.2497 55.1884 19.033 54.1551 18.5997C53.1217 18.1497 52.2634 17.5247 51.5801 16.7247C50.8967 15.908 50.3884 14.933 50.0551 13.7997C49.7217 12.6663 49.5551 11.408 49.5551 10.0247C49.5551 8.19135 49.8551 6.59135 50.4551 5.22468C51.0551 3.85801 51.9634 2.79135 53.1801 2.02468C54.4134 1.25801 55.9634 0.87468 57.8301 0.87468C59.6134 0.87468 61.1134 1.25801 62.3301 2.02468C63.5467 2.77468 64.4634 3.84135 65.0801 5.22468C65.7134 6.59135 66.0301 8.19968 66.0301 10.0497ZM51.9301 10.0497C51.9301 11.5497 52.1384 12.8413 52.5551 13.9247C52.9717 15.008 53.6134 15.8413 54.4801 16.4247C55.3634 17.008 56.4717 17.2997 57.8051 17.2997C59.1551 17.2997 60.2551 17.008 61.1051 16.4247C61.9717 15.8413 62.6134 15.008 63.0301 13.9247C63.4467 12.8413 63.6551 11.5497 63.6551 10.0497C63.6551 7.79968 63.1884 6.04135 62.2551 4.77468C61.3217 3.49135 59.8467 2.84968 57.8301 2.84968C56.4801 2.84968 55.3634 3.14135 54.4801 3.72468C53.6134 4.29135 52.9717 5.11635 52.5551 6.19968C52.1384 7.26635 51.9301 8.54968 51.9301 10.0497Z" />
              </svg>
            </a>
            <ul class="nav col-md-4 justify-content-center justify-content-lg-end">
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
          </div>
        </footer>
      </div>
    </div>


    <div class="modal fade" id="new_task" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3">
              <div class="col-12">
                <label class="form-label">Task Title</label>
                <input class="form-control" type="text" required="" autocomplete="off">
              </div>
              <div class="col-12">
                <label class="form-label">Task Detail</label>
                <textarea class="form-control" type="text" required="" autocomplete="off" rows="3"></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Select Date/Time</label>
                <div class="input-group">
                  <input type="date" class="form-control">
                  <input type="time" class="form-control">
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="Remindon">
                  <label class="form-check-label" for="Remindon">Remind on</label>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Task tag</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">Design</option>
                  <option value="2">BugFix</option>
                  <option value="3">Help</option>
                  <option value="3">R&D</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      $('.my-task .task-list-toggle').on('click', function () {
        $('.my-task .order-1').toggleClass('open');
      });
    </script>
  </div>


@endsection
