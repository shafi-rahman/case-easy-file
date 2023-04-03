@extends('layouts.app')
@section('content')


<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row g-3 row-deck">
            <div class="col-12">
                <div class="card tui-calendar">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-center" id="menu-navi">
                            <div class="d-flex align-items-center my-1">
                                <button class="btn bg-secondary text-light me-2 lnb-new-schedule-btn"
                                    id="btn-new-schedule" type="button" data-bs-toggle="modal">New
                                    schedule</button>
                                <button class="btn btn-primary move-today" type="button"
                                    data-action="move-today">Today</button>
                            </div>
                            <div class="fs-5 fw-bold my-1" id="renderRange"></div>
                            <div class="d-flex align-items-center my-1">
                                <div class="dropdown morphing scale-left">
                                    <button class="btn btn-primary dropdown-toggle"
                                        id="dropdownMenu-calendarType" type="button"
                                        data-bs-toggle="dropdown"><i id="calendarTypeIcon"></i><span
                                            class="ms-1" id="calendarTypeName">Dropdown</span></button>
                                    <ul class="dropdown-menu border-0 shadow" role="menu">
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title"
                                                role="menuitem" data-action="toggle-daily"><i
                                                    class="fa fa-bars me-2"></i>Daily</a></li>
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title"
                                                role="menuitem" data-action="toggle-weekly"><i
                                                    class="fa fa-th-large me-2"></i>Weekly</a></li>
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title"
                                                role="menuitem" data-action="toggle-monthly"><i
                                                    class="fa fa-th me-2"></i>Month</a></li>
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title"
                                                role="menuitem" data-action="toggle-weeks2"><i
                                                    class="fa fa-th-large me-2"></i>2 weeks</a></li>
                                        <li role="presentation"><a class="dropdown-item dropdown-menu-title"
                                                role="menuitem" data-action="toggle-weeks3"><i
                                                    class="fa fa-th-large me-2"></i>3 weeks</a></li>
                                        <li class="dropdown-divider" role="presentation"></li>
                                        <li role="presentation"><a class="dropdown-item" role="menuitem"
                                                data-action="toggle-workweek"> <input
                                                    class="tui-full-calendar-checkbox-square" type="checkbox"
                                                    value="toggle-workweek" checked=""><span
                                                    class="checkbox-title"></span>Show weekends</a></li>
                                        <li role="presentation"><a class="dropdown-item" role="menuitem"
                                                data-action="toggle-start-day-1"> <input
                                                    class="tui-full-calendar-checkbox-square" type="checkbox"
                                                    value="toggle-start-day-1"><span
                                                    class="checkbox-title"></span>Start Week on Monday</a></li>
                                        <li role="presentation"><a class="dropdown-item" role="menuitem"
                                                data-action="toggle-narrow-weekend"> <input
                                                    class="tui-full-calendar-checkbox-square" type="checkbox"
                                                    value="toggle-narrow-weekend"><span
                                                    class="checkbox-title"></span>Narrower than weekdays</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ms-2">
                                    <button class="btn btn-outline-secondary move-day" type="button"
                                        data-action="move-prev"><i class="fa fa-angle-left"
                                            data-action="move-prev"></i></button>
                                    <button class="btn btn-outline-secondary move-day" type="button"
                                        data-action="move-next"><i class="fa fa-angle-right"
                                            data-action="move-next"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light px-4 py-2" id="lnb">
                        <div class="d-flex flex-wrap justify-content-between align-items-center"
                            id="lnb-calendars">
                            <div class="d-flex flex-wrap" id="calendarList"></div>
                            <div class="lnb-calendars-item">
                                <label>
                                    <input class="tui-full-calendar-checkbox-square" type="checkbox" value="all"
                                        checked=""><span></span><strong>View all</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="border" id="calendar"></div>
                    </div>
                </div>

                <script src="{{asset('assets/js/bundle/tui-calendar.bundle.js')}}"></script>

                <script>
                </script>
            </div>
        </div>
    </div>
</div>


@endsection
