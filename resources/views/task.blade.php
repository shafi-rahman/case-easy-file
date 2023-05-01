@extends('layouts.app')
@section('content')

<div class="page-body body-layout-1 my-task">
    <div class="my-task d-flex flex-nowrap">
      <div class="order-1 custom_scroll">
        <button type="button" class="btn bg-secondary text-light mb-3 w-100" data-bs-toggle="modal"
          data-bs-target="#task_popup">New Task</button>
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
              <span class="badge bg-light text-dark ms-2 ms-auto">{{count($tasks)}}</span>
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
              <span class="badge bg-light text-dark ms-2 ms-auto" id="today_task">0</span>
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
              <span class="badge bg-primary ms-2 ms-auto" id="created_by_me">0</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="order-2 flex-grow-1 px-lg-3 px-0 custom_scroll">

        <div class="page-toolbar py-2">
          <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
              <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                  <li class="breadcrumb-item"><a class="text-secondary" href="{{url('home')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tasks</li>
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
                    @if(count($tasks)>0)
                      @foreach($tasks as $task)
                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                          @if($task->status==0)
                          <div class="hover-actions end-0 me-3 bg-light rounded">
                            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-link btn-sm taskPopupBtn" data-bs-toggle="modal" data-bs-target="#task_popup"
                            tid="{{$task->id}}" task_title="{{$task->task_title}}" task_detail="{{$task->task_detail}}" task_date="{{$task->task_date}}"
                            task_time="{{$task->task_time}}"><i class="fa fa-pencil"></i></button>
                          </div>
                          @else
                          <div class="done-actions end-0 me-3 bg-success text-white rounded">
                            <i class="fa fa-check"></i> Done
                          </div>
                          @endif
                          <div class="col col-md-10 col-xxl-11">
                            <div class="row">
                              <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                <span class="fs-6 me-2">{{$task->task_title}}</span>
                                <div>
                                  <span class="small text-muted text-uppercase me-2">Created By: {{$task->name}}</span>
                                  <span class="border px-1 rounded small">{{($task->roleid==2)?'Admin':$task->role}}</span>
                                </div>
                              </div>
                              <div class="col">
                                <p class="i-msg mb-0 text-muted">{{$task->task_detail}}</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-auto ms-auto d-flex flex-column justify-content-between small">{{date("d M Y", strtotime($task->task_date))}}</div>
                        </li>
                      @endforeach
                    @endif
                  </ul>
                </div>
                <div class="tab-pane fade" id="task_today" role="tabpanel">
                  <div class="d-flex justify-content-between mb-2">
                    <h4 class="mt-1 mb-0">Today's Task</h4>
                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle" type="button"><i
                        class="fa fa-bars"></i></button>
                  </div>
                  <ul class="list-group list-group-flush list-group-custom">
                    @if(count($tasks)>0)
                      @php $todaytaskcnt=0; @endphp
                      @foreach($tasks as $task)
                        @if(strtotime(date('d M Y'))== strtotime($task->task_date))  
                        @php $todaytaskcnt++; @endphp
                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                          @if($task->status==0)
                          <div class="hover-actions end-0 me-3 bg-light rounded">
                            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-link btn-sm taskPopupBtn" data-bs-toggle="modal" data-bs-target="#task_popup"
                            tid="{{$task->id}}" task_title="{{$task->task_title}}" task_detail="{{$task->task_detail}}" task_date="{{$task->task_date}}"
                            task_time="{{$task->task_time}}"><i class="fa fa-pencil"></i></button>
                          </div>
                          @else
                          <div class="done-actions end-0 me-3 bg-success text-white rounded">
                            <i class="fa fa-check"></i> Done
                          </div>
                          @endif
                          <div class="col col-md-10 col-xxl-11">
                            <div class="row">
                              <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                <span class="fs-6 me-2">{{$task->task_title}}</span>
                                <div>
                                  <span class="small text-muted text-uppercase me-2">Created By: {{$task->name}}</span>
                                  <span class="border px-1 rounded small">{{($task->roleid==2)?'Admin':$task->role}}</span>
                                </div>
                              </div>
                              <div class="col">
                                <p class="i-msg mb-0 text-muted">{{$task->task_detail}}</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-auto ms-auto d-flex flex-column justify-content-between small">{{date("d M Y", strtotime($task->task_date))}}</div>
                        </li>
                        @endif
                      @endforeach
                      <span id="todaytaskcnt" cnt="{{$todaytaskcnt}}"></span>
                    @endif
                    <script> document.getElementById('today_task').innerHTML=document.getElementById('todaytaskcnt').getAttribute("cnt")  </script>
                  </ul>
                </div>
                <div class="tab-pane fade" id="task_me" role="tabpanel">
                  <div class="d-flex justify-content-between mb-2">
                    <h4 class="mt-1 mb-0">Created by me Task</h4>
                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle" type="button"><i
                        class="fa fa-bars"></i></button>
                  </div>
                  <ul class="list-group list-group-flush list-group-custom">
                    @if(count($tasks)>0)
                      @php $createdbymecnt=0; @endphp
                      @foreach($tasks as $task)
                        @if($task->created_by==Auth::user()->id)  
                        @php $createdbymecnt++; @endphp
                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                          @if($task->status==0)
                          <div class="hover-actions end-0 me-3 bg-light rounded">
                            <button type="button" class="btn btn-link btn-sm" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-link btn-sm taskPopupBtn" data-bs-toggle="modal" data-bs-target="#task_popup"
                            tid="{{$task->id}}" task_title="{{$task->task_title}}" task_detail="{{$task->task_detail}}" task_date="{{$task->task_date}}"
                            task_time="{{$task->task_time}}"><i class="fa fa-pencil"></i></button>
                          </div>
                          @else
                          <div class="done-actions end-0 me-3 bg-success text-white rounded">
                            <i class="fa fa-check"></i> Done
                          </div>
                          @endif
                          <div class="col col-md-10 col-xxl-11">
                            <div class="row">
                              <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                <span class="fs-6 me-2">{{$task->task_title}}</span>
                                <div>
                                  <span class="small text-muted text-uppercase me-2">Created By: {{$task->name}}</span>
                                  <span class="border px-1 rounded small">{{($task->roleid==2)?'Admin':$task->role}}</span>
                                </div>
                              </div>
                              <div class="col">
                                <p class="i-msg mb-0 text-muted">{{$task->task_detail}}</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-auto ms-auto d-flex flex-column justify-content-between small">{{date("d M Y", strtotime($task->task_date))}}</div>
                        </li>
                        @endif
                      @endforeach
                      <span id="createdbymecnt" cnt="{{$createdbymecnt}}"></span>
                    @endif
                    <script> document.getElementById('created_by_me').innerHTML=document.getElementById('createdbymecnt').getAttribute("cnt")  </script>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="task_popup" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Task Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" >
              <div class="col-12">
                <label class="form-label">Task Title</label>
                <input class="form-control" type="text" id="task_title" required autocomplete="off">
              </div>
              <div class="col-12">
                <label class="form-label">Task Detail</label>
                <textarea class="form-control" type="text" id="task_detail" required autocomplete="off" rows="3"></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Select Date/Time</label>
                <div class="input-group">
                  <input type="date" class="form-control" id="task_date">
                  <input type="time" class="form-control" id="task_time">
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="taskdone">
                  <label class="form-check-label" for="taskdone">Check if task is done</label>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="tid" />
            <input type="hidden" id="created_by" value="{{$created_by}}"/>
            <button type="button" class="btn btn-primary" onclick="set_task()">Save</button>
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
