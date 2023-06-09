<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="-">
    <meta name="keyword" content="-">
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <title>:: Case Easy ::</title>

    <link rel="stylesheet" href="{{ asset('assets/cssbundle/daterangepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/cssbundle/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/bootstrapdatepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/tuicalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/summernote.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/cssbundle/dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/cssbundle/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cssbundle/jquerysteps.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/prismjs/prism.css') }}">

    <style>
        .layout-1 .document.sidebar {
            width: 260px;
        }

        .layout-1 .document.sidebar .title-text {
            flex-direction: row;
        }

        .layout-1 .document.sidebar .menu-list {
            border: 0;
            padding: 0;
        }

        .layout-1 .document.sidebar .menu-list li {
            border: 0;
        }

        .layout-1 .document.sidebar .menu-list .m-link {
            padding: 4px 0;
        }

        .layout-1 .document.sidebar .menu-list .m-link>i {
            text-align: left;
            margin: 0;
            width: 20px;
        }
        .dt-buttons{
            float: right !important;
            margin-bottom: 10px;
            margin-right: 10px;
        }
        .dt-button{
            background-color: #0d6efd;
            color: #ffffff;
            border: 1px solid #1464d9;
            border-radius: 3px;
            padding: 5px 20px;
        }
        #loader{
            background-color: #0c1b24;
            opacity: 0.8;
            z-index: 9999999999999999999;
        }
        /* .hide{
            display: none;
        } */
        .show{
            display: block !important;
        }
        .act_date{
            text-align: right;
            left: -120px;
            font-size: 12px;
            min-width: 100px;
            position: absolute;
        }
        .done-actions{
            position: absolute;
            top: 40px;
            width: 75px;
            padding: 0px 0px 0px 8px;
        }
    </style>

    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="layout-1" data-luno="theme-orange">


<div class="modal fade" itabindex="-1" id="loader">
    <div class="modal-dialog">
        <div class="modal-content text-start" style="border: none;">
            <img src="{{ url('assets/img/loading-dark.gif') }}" style="width: 100%;" />
        </div>
    </div>
</div>

    <div class="sidebar @@cardClass">
        <div class="container-fluid p-0">

            <div class="p-3 py-md-3 title-text d-flex align-items-center mt-1">
                <h4 class="sidebar-title mb-0 flex-grow-1 text-xxl-center"><span><img src="{{ url('assets/img/ecf_flogo.png') }}" style="width: 230px" /></span></h4>
            </div>

            <div class="main-menu flex-grow-1">
                <ul class="menu-list">
                    {{-- <li class="divider py-2 lh-sm">
                        <span class="small">Main Operations</span><br>
                        <small class="text-muted">Unique Client dashboard</small>
                    </li> --}}
                    @if(Session::get('menus')!=NULL)
                        @foreach (Session::get('menus') as $menu)
                            <li>
                                <a class="m-link" href="{{ url($menu->menu_link) }}" >
                                    <span v-html="menu.menu_icon">{!! $menu->menu_icon !!}</span>
                                    <span class="ms-2"> {{ $menu->menu_label }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif 
                    @if(Auth::user()->role==2)
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#setting" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 3H16V4H0V3Z"></path>
                                <path d="M9 1H14V6H9V1Z"></path>
                                <path d="M0 13H16V14H0V13Z"></path>
                                <path d="M9 11H14V16H9V11Z"></path>
                                <path class="fill-secondary" d="M0 8H16V9H0V8Z"></path>
                                <path class="fill-secondary" d="M2 6H7V11H2V6Z"></path>
                            </svg>
                            <span class="ms-2">Settings</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <ul class="sub-menu collapse" id="setting">
                            <li><a class="ms-link" href="{{url('user-managment')}}">User Managment</a></li>
                            <li><a class="ms-link" href="{{url('subscriber-profile')}}">Subscriber Profile</a></li>
                        </ul>
                    </li>
                    
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_pages" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <path class="fill-secondary" fill-rule="evenodd" d="M8.646 5.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 8 8.646 6.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 8l1.647-1.646a.5.5 0 0 0 0-.708z" />
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                            </svg>
                            <span class="ms-2">Form Management</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <ul class="sub-menu collapse" id="menu_pages">
                            <li><a class="ms-link" href="{{url('form-type')}}">Form Type</a></li>
                            <li><a class="ms-link" href="{{url('form-detail')}}">From Detail</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>

            {{-- 
            <div class="main-menu flex-grow-1">
                <ul class="menu-list">
                    <li class="divider py-2 lh-sm">
                        <span class="small">Seller User</span><br>
                        <small class="text-muted">Seller dashboard</small>
                    </li>
                    <li>
                        <a class="m-link" href="{{ url('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path class="var(--secondary-color)" fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="ms-2">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="m-link" href="{{ url('lead') . '/' . Crypt::encryptString('my-leads') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            </svg>
                            <span class="ms-2">My Current Leads <span class="badge bg-primary ms-auto">0</span></span>
                        </a>
                    </li>
                </ul>
            </div> --}}


            <ul class="menu-list nav navbar-nav flex-row text-center menu-footer-link">
                <li class="nav-item flex-fill p-2">
                    <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal"
                        data-bs-target="#ScheduleModal" title="My Schedule">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path class="fill-primary"
                                d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                            <path class="fill-primary"
                                d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item flex-fill p-2">
                    <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal"
                        data-bs-target="#MynotesModal" title="My notes">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path class="fill-primary"
                                d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                            <path
                                d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item flex-fill p-2">
                    <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal"
                        data-bs-target="#RecentChat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                            <path class="fill-primary"
                                d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item flex-fill p-2">
                    {{-- <a class="d-inline-block w-100 color-400" href="auth-signin.html" title="sign-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z" />
                            <path class="fill-secondary"
                                d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                        </svg>
                    </a> --}}
                    <a class="d-inline-block w-100 color-400" href="auth-signin.html" title="sign-out" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z" />
                            <path class="fill-primary"
                                d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                        </svg> </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="wrapper">

        <header class="page-header sticky-top px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">
                <nav class="navbar">

                    <div class="d-flex">
                        <button type="button"
                            class="btn btn-link d-none d-xl-block sidebar-mini-btn p-0 text-primary">
                            <span class="hamburger-icon">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-link d-block d-xl-none menu-toggle p-0 text-primary">
                            <span class="hamburger-icon">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </span>
                        </button>
                        {{-- <a href="index.html" class="brand-icon d-flex align-items-center mx-2 mx-sm-3 text-primary">
                            <svg height="22" viewBox="0 0 67 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-muted"
                                    d="M0.863281 18.9997V1.14968H3.11328V16.9997H10.9133V18.9997H0.863281Z" />
                                <path class="fill-muted"
                                    d="M27.3045 12.6997C27.3045 13.933 27.0545 15.0497 26.5545 16.0497C26.0545 17.033 25.2878 17.8163 24.2545 18.3997C23.2378 18.9663 21.9378 19.2497 20.3545 19.2497C18.1378 19.2497 16.4462 18.6497 15.2795 17.4497C14.1295 16.233 13.5545 14.633 13.5545 12.6497V1.14968H15.8045V12.7247C15.8045 14.1747 16.1878 15.2997 16.9545 16.0997C17.7378 16.8997 18.9128 17.2997 20.4795 17.2997C21.5628 17.2997 22.4378 17.108 23.1045 16.7247C23.7878 16.3247 24.2878 15.783 24.6045 15.0997C24.9212 14.3997 25.0795 13.5997 25.0795 12.6997V1.14968H27.3045V12.6997Z" />
                                <path class="fill-secondary"
                                    d="M46.5286 0.765681C46.6246 0.82568 46.6726 0.92168 46.6726 1.05368L46.5466 18.6037C46.5466 18.8677 46.3906 18.9937 46.0786 18.9817H44.4586L33.1546 3.62768L33.1006 13.1677L37.5646 13.1857C37.6726 13.1857 37.7626 13.2217 37.8346 13.2937C37.9186 13.3657 37.9606 13.4617 37.9606 13.5817L37.9426 14.8957C37.9426 15.0157 37.9066 15.1237 37.8346 15.2197C37.7626 15.3037 37.6666 15.3457 37.5466 15.3457L31.3726 15.2917H31.3546C31.1026 15.2917 30.9706 15.1837 30.9586 14.9677L31.0666 0.98168C31.0666 0.849679 31.1026 0.74768 31.1746 0.675681C31.2586 0.59168 31.3666 0.555679 31.4986 0.56768H33.1726C33.3406 0.56768 33.4726 0.63368 33.5686 0.765681L44.4406 15.4177L44.5486 0.94568C44.5966 0.741679 44.7286 0.639679 44.9446 0.639679L46.2046 0.65768C46.3126 0.65768 46.4206 0.69368 46.5286 0.765681ZM39.7786 16.7857C39.8986 16.7977 39.9946 16.8397 40.0666 16.9117C40.1386 16.9717 40.1746 17.0677 40.1746 17.1997L40.1566 18.4957C40.1566 18.6157 40.1206 18.7237 40.0486 18.8197C39.9886 18.9037 39.8926 18.9457 39.7606 18.9457H31.3546C31.2346 18.9457 31.1386 18.9097 31.0666 18.8377C30.9946 18.7657 30.9586 18.6697 30.9586 18.5497V17.2357C30.9586 17.1157 30.9946 17.0137 31.0666 16.9297C31.1386 16.8337 31.2406 16.7857 31.3726 16.7857H35.5666C38.0266 16.7857 39.4306 16.7857 39.7786 16.7857Z" />
                                <path class="fill-muted"
                                    d="M66.0301 10.0497C66.0301 11.433 65.8551 12.6913 65.5051 13.8247C65.1551 14.9413 64.6301 15.908 63.9301 16.7247C63.2467 17.5413 62.3884 18.1663 61.3551 18.5997C60.3384 19.033 59.1551 19.2497 57.8051 19.2497C56.4051 19.2497 55.1884 19.033 54.1551 18.5997C53.1217 18.1497 52.2634 17.5247 51.5801 16.7247C50.8967 15.908 50.3884 14.933 50.0551 13.7997C49.7217 12.6663 49.5551 11.408 49.5551 10.0247C49.5551 8.19135 49.8551 6.59135 50.4551 5.22468C51.0551 3.85801 51.9634 2.79135 53.1801 2.02468C54.4134 1.25801 55.9634 0.87468 57.8301 0.87468C59.6134 0.87468 61.1134 1.25801 62.3301 2.02468C63.5467 2.77468 64.4634 3.84135 65.0801 5.22468C65.7134 6.59135 66.0301 8.19968 66.0301 10.0497ZM51.9301 10.0497C51.9301 11.5497 52.1384 12.8413 52.5551 13.9247C52.9717 15.008 53.6134 15.8413 54.4801 16.4247C55.3634 17.008 56.4717 17.2997 57.8051 17.2997C59.1551 17.2997 60.2551 17.008 61.1051 16.4247C61.9717 15.8413 62.6134 15.008 63.0301 13.9247C63.4467 12.8413 63.6551 11.5497 63.6551 10.0497C63.6551 7.79968 63.1884 6.04135 62.2551 4.77468C61.3217 3.49135 59.8467 2.84968 57.8301 2.84968C56.4801 2.84968 55.3634 3.14135 54.4801 3.72468C53.6134 4.29135 52.9717 5.11635 52.5551 6.19968C52.1384 7.26635 51.9301 8.54968 51.9301 10.0497Z" />
                            </svg>
                        </a> --}}
                        {{-- <img src="{{url('assets/img/ecf_logo-aw.png')}}" style="width: 42px; margin-left: 10px;"/> --}}
                    </div>

                    {{-- <div class="header-left flex-grow-1 d-none d-md-block">
                        <div class="main-search px-3 flex-fill">
                            <input class="form-control" type="text" placeholder="Enter your search key word">
                            <div class="card shadow rounded-4 search-result slidedown">
                                <div class="card-body">
                                    <small class="text-uppercase text-muted">Recent searches</small>
                                    <div class="d-flex flex-wrap align-items-start mt-2 mb-4">
                                        <a class="small rounded py-1 px-2 m-1 fw-normal bg-primary text-white"
                                            href="#">HRMS Admin</a>
                                        <a class="small rounded py-1 px-2 m-1 fw-normal bg-secondary text-white"
                                            href="#">Hospital Admin</a>
                                        <a class="small rounded py-1 px-2 m-1 fw-normal bg-info text-white"
                                            href="app-project.html">Project</a>
                                        <a class="small rounded py-1 px-2 m-1 fw-normal bg-dark text-white"
                                            href="app-social.html">Social App</a>
                                        <a class="small rounded py-1 px-2 m-1 fw-normal bg-danger text-white"
                                            href="#">University Admin</a>
                                    </div>
                                    <small class="text-uppercase text-muted">Suggestions</small>
                                    <div class="card list-group list-group-flush list-group-custom mt-2">
                                        <a class="list-group-item list-group-item-action text-truncate"
                                            href="https://www.wrraptheme.com/docs/doc-helperclass.html">
                                            <div class="fw-bold">Helper Class</div>
                                            <small class="text-muted">Lorem Ipsum is simply dummy text of the printing
                                                and typesetting industry.</small>
                                        </a>
                                        <a class="list-group-item list-group-item-action text-truncate"
                                            href="https://www.wrraptheme.com/docs/element-daterange.html">
                                            <div class="fw-bold">Date Range Picker</div>
                                            <small class="text-muted">There are many variations of passages of Lorem
                                                Ipsum available</small>
                                        </a>
                                        <a class="list-group-item list-group-item-action text-truncate"
                                            href="https://www.wrraptheme.com/docs/element-imageinput.html">
                                            <div class="fw-bold">Image Input</div>
                                            <small class="text-muted">It is a long established fact that a reader will
                                                be distracted</small>
                                        </a>
                                        <a class="list-group-item list-group-item-action text-truncate"
                                            href="https://www.wrraptheme.com/docs/plugin-table.html">
                                            <div class="fw-bold">DataTables for jQuery</div>
                                            <small class="text-muted">Lorem Ipsum is simply dummy text of the printing
                                                and typesetting industry.</small>
                                        </a>
                                        <a class="list-group-item list-group-item-action text-truncate"
                                            href="https://www.wrraptheme.com/docs/doc-setup.html">
                                            <div class="fw-bold">Development Setup</div>
                                            <small class="text-muted">Contrary to popular belief, Lorem Ipsum is not
                                                simply random text.</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <ul class="header-right justify-content-end d-flex align-items-center mb-0">

                        <li>
                            <div class="dropdown morphing scale-left notifications">
                                <a class="nav-link dropdown-toggle after-none" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    <span class="d-none d-xl-block me-2">Notification</span>
                                    <svg class="d-inline-block d-xl-none" viewBox="0 0 16 16" width="18px"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 1.91802L7.203 2.07902C6.29896 2.26322 5.48633 2.75412 4.90265 3.46864C4.31897 4.18316 4.0001 5.07741 4 6.00002C4 6.62802 3.866 8.19702 3.541 9.74202C3.381 10.509 3.165 11.308 2.878 12H13.122C12.835 11.308 12.62 10.51 12.459 9.74202C12.134 8.19702 12 6.62802 12 6.00002C11.9997 5.07758 11.6807 4.18357 11.097 3.46926C10.5134 2.75494 9.70087 2.26419 8.797 2.08002L8 1.91802ZM14.22 12C14.443 12.447 14.701 12.801 15 13H1C1.299 12.801 1.557 12.447 1.78 12C2.68 10.2 3 6.88002 3 6.00002C3 3.58002 4.72 1.56002 7.005 1.09902C6.99104 0.959974 7.00638 0.819547 7.05003 0.686794C7.09368 0.554041 7.16467 0.43191 7.25842 0.328279C7.35217 0.224647 7.4666 0.141815 7.59433 0.085125C7.72206 0.028435 7.86026 -0.000854492 8 -0.000854492C8.13974 -0.000854492 8.27794 0.028435 8.40567 0.085125C8.5334 0.141815 8.64783 0.224647 8.74158 0.328279C8.83533 0.43191 8.90632 0.554041 8.94997 0.686794C8.99362 0.819547 9.00896 0.959974 8.995 1.09902C10.1253 1.32892 11.1414 1.94238 11.8712 2.83552C12.6011 3.72866 12.9999 4.84659 13 6.00002C13 6.88002 13.32 10.2 14.22 12Z" />
                                        <path class="fill-secondary"
                                            d="M9.41421 15.4142C9.03914 15.7893 8.53043 16 8 16C7.46957 16 6.96086 15.7893 6.58579 15.4142C6.21071 15.0391 6 14.5304 6 14H10C10 14.5304 9.78929 15.0391 9.41421 15.4142Z"
                                            fill="black" />
                                    </svg>
                                </a>
                                <div id="NotificationsDiv" class="dropdown-menu shadow rounded-4 border-0 p-0 m-0">
                                    <div class="card w380">
                                        <div class="card-header p-3">
                                            <h6 class="card-title mb-0">Notifications Center</h6>
                                            <span class="badge bg-danger text-light">14</span>
                                        </div>
                                        <div class="tab-content card-body custom_scroll">
                                            <div class="tab-pane fade show active" id="Noti-tab-Message"
                                                role="tabpanel">
                                                <ul class="list-unstyled list mb-0">
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle"
                                                                src="{{ asset('assets/img/xs/avatar5.jpg') }}" alt="">
                                                            <div class="flex-fill ms-3">
                                                                <p class="d-flex justify-content-between mb-0">
                                                                    <span>Olive Tree</span> <small>13MIN</small>
                                                                </p>
                                                                <span>making it over 2000 years old</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle"
                                                                src="{{ asset('assets/img/xs/avatar6.jpg') }}" alt="">
                                                            <div class="flex-fill ms-3">
                                                                <p class="d-flex justify-content-between mb-0">
                                                                    <span>Del
                                                                        Phineum</span> <small>1HR</small>
                                                                </p>
                                                                <span>There are many variations of passages</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle"
                                                                src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="">
                                                            <div class="flex-fill ms-3">
                                                                <p class="d-flex justify-content-between mb-0">
                                                                    <span>Rose Bush</span> <small>2MIN</small>
                                                                </p>
                                                                <span>changed an issue from "In Progress" to <span
                                                                        class="badge bg-success">Review</span></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <div class="avatar rounded-circle no-thumbnail">PT</div>
                                                            <div class="flex-fill ms-3">
                                                                <p class="d-flex justify-content-between mb-0">
                                                                    <span>Pat
                                                                        Thettick</span> <small>13MIN</small>
                                                                </p>
                                                                <span>It is a long established fact that a reader will
                                                                    be distracted</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle"
                                                                src="{{ asset('assets/img/xs/avatar3.jpg') }}" alt="">
                                                            <div class="flex-fill ms-3">
                                                                <p class="d-flex justify-content-between mb-0">
                                                                    <span>Eileen Dover</span> <small>1HR</small>
                                                                </p>
                                                                <span>There are many variations of passages</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle"
                                                                src="{{ asset('assets/img/xs/avatar4.jpg') }}" alt="">
                                                            <div class="flex-fill ms-3">
                                                                <p class="d-flex justify-content-between mb-0">
                                                                    <span>Carmen Goh</span> <small>1DAY</small>
                                                                </p>
                                                                <span>Contrary to popular belief <span
                                                                        class="badge bg-danger">Code</span></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle"
                                                                src="{{ asset('assets/img/xs/avatar7.jpg') }}" alt="">
                                                            <div class="flex-fill ms-3">
                                                                <p class="d-flex justify-content-between mb-0">
                                                                    <span>Karen Onnabit</span> <small>1DAY</small>
                                                                </p>
                                                                <span>The generated Lorem Ipsum</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-primary text-light rounded-0">View all
                                            notifications</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="d-none d-xl-inline-block">
                            <a class="nav-link fullscreen" href="javascript:void(0);"
                                onclick="toggleFullScreen(documentElement)">
                                <svg viewBox="0 0 16 16" width="18px" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.8279 10.172C5.73414 10.0783 5.60698 10.0256 5.4744 10.0256C5.34182 10.0256 5.21467 10.0783 5.1209 10.172L1.0249 14.268V11.5C1.0249 11.3674 0.972224 11.2402 0.878456 11.1464C0.784688 11.0527 0.657511 11 0.524902 11C0.392294 11 0.265117 11.0527 0.171349 11.1464C0.0775808 11.2402 0.0249023 11.3674 0.0249023 11.5V15.475C0.0249023 15.6076 0.0775808 15.7348 0.171349 15.8285C0.265117 15.9223 0.392294 15.975 0.524902 15.975H4.4999C4.63251 15.975 4.75969 15.9223 4.85346 15.8285C4.94722 15.7348 4.9999 15.6076 4.9999 15.475C4.9999 15.3424 4.94722 15.2152 4.85346 15.1214C4.75969 15.0277 4.63251 14.975 4.4999 14.975H1.7319L5.8279 10.879C5.92164 10.7852 5.9743 10.6581 5.9743 10.5255C5.9743 10.3929 5.92164 10.2658 5.8279 10.172ZM10.1719 10.172C10.2657 10.0783 10.3928 10.0256 10.5254 10.0256C10.658 10.0256 10.7851 10.0783 10.8789 10.172L14.9749 14.268V11.5C14.9749 11.3674 15.0276 11.2402 15.1213 11.1464C15.2151 11.0527 15.3423 11 15.4749 11C15.6075 11 15.7347 11.0527 15.8285 11.1464C15.9222 11.2402 15.9749 11.3674 15.9749 11.5V15.475C15.9749 15.6076 15.9222 15.7348 15.8285 15.8285C15.7347 15.9223 15.6075 15.975 15.4749 15.975H11.4999C11.3673 15.975 11.2401 15.9223 11.1463 15.8285C11.0526 15.7348 10.9999 15.6076 10.9999 15.475C10.9999 15.3424 11.0526 15.2152 11.1463 15.1214C11.2401 15.0277 11.3673 14.975 11.4999 14.975H14.2679L10.1719 10.879C10.0782 10.7852 10.0255 10.6581 10.0255 10.5255C10.0255 10.3929 10.0782 10.2658 10.1719 10.172ZM5.8279 5.82799C5.73414 5.92173 5.60698 5.97439 5.4744 5.97439C5.34182 5.97439 5.21467 5.92173 5.1209 5.82799L1.0249 1.73199V4.49999C1.0249 4.6326 0.972224 4.75978 0.878456 4.85355C0.784688 4.94732 0.657511 4.99999 0.524902 4.99999C0.392294 4.99999 0.265117 4.94732 0.171349 4.85355C0.0775808 4.75978 0.0249023 4.6326 0.0249023 4.49999V0.524994C0.0249023 0.392386 0.0775808 0.265209 0.171349 0.17144C0.265117 0.0776723 0.392294 0.0249939 0.524902 0.0249939H4.4999C4.63251 0.0249939 4.75969 0.0776723 4.85346 0.17144C4.94722 0.265209 4.9999 0.392386 4.9999 0.524994C4.9999 0.657602 4.94722 0.784779 4.85346 0.878547C4.75969 0.972315 4.63251 1.02499 4.4999 1.02499H1.7319L5.8279 5.12099C5.92164 5.21476 5.9743 5.34191 5.9743 5.47449C5.9743 5.60708 5.92164 5.73423 5.8279 5.82799Z" />
                                    <path class="fill-secondary"
                                        d="M10.5253 5.97439C10.3927 5.97439 10.2655 5.92173 10.1718 5.82799C10.078 5.73423 10.0254 5.60708 10.0254 5.47449C10.0254 5.34191 10.078 5.21476 10.1718 5.12099L14.2678 1.02499H11.4998C11.3672 1.02499 11.24 0.972315 11.1462 0.878547C11.0525 0.784779 10.9998 0.657602 10.9998 0.524994C10.9998 0.392386 11.0525 0.265209 11.1462 0.17144C11.24 0.0776723 11.3672 0.0249939 11.4998 0.0249939H15.4748C15.6074 0.0249939 15.7346 0.0776723 15.8283 0.17144C15.9221 0.265209 15.9748 0.392386 15.9748 0.524994V4.49999C15.9748 4.6326 15.9221 4.75978 15.8283 4.85355C15.7346 4.94732 15.6074 4.99999 15.4748 4.99999C15.3422 4.99999 15.215 4.94732 15.1212 4.85355C15.0275 4.75978 14.9748 4.6326 14.9748 4.49999V1.73199L10.8788 5.82799C10.785 5.92173 10.6579 5.97439 10.5253 5.97439Z" />
                                </svg>
                            </a>
                        </li>

                        <li class="d-none d-xl-inline-block">
                            <div class="dropdown morphing scale-left Language mx-sm-2">
                                <a class="nav-link dropdown-toggle after-none" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    <svg viewBox="0 0 16 16" width="18px" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="fill-secondary"
                                            d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z" />
                                        <path
                                            d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z" />
                                    </svg>
                                </a>
                                <div class="dropdown-menu rounded-4 shadow border-0 p-0" data-bs-popper="none">
                                    <div class="card">
                                        <div class="list-group list-group-custom" style="width: 200px;">
                                            <a href="#" class="list-group-item"><span
                                                    class="flag-icon flag-icon-gb me-2"></span>UK English</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- <li class="d-none d-lg-inline-block">
                            <div class="dropdown morphing scale-left grid-menu mx-sm-2">
                                <a class="nav-link dropdown-toggle after-none" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    <svg viewBox="0 0 16 16" width="18px" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 10H5C5.26522 10 5.51957 10.1054 5.70711 10.2929C5.89464 10.4804 6 10.7348 6 11V14C6 14.2652 5.89464 14.5196 5.70711 14.7071C5.51957 14.8946 5.26522 15 5 15H2C1.73478 15 1.48043 14.8946 1.29289 14.7071C1.10536 14.5196 1 14.2652 1 14V11C1 10.7348 1.10536 10.4804 1.29289 10.2929C1.48043 10.1054 1.73478 10 2 10ZM11 1H14C14.2652 1 14.5196 1.10536 14.7071 1.29289C14.8946 1.48043 15 1.73478 15 2V5C15 5.26522 14.8946 5.51957 14.7071 5.70711C14.5196 5.89464 14.2652 6 14 6H11C10.7348 6 10.4804 5.89464 10.2929 5.70711C10.1054 5.51957 10 5.26522 10 5V2C10 1.73478 10.1054 1.48043 10.2929 1.29289C10.4804 1.10536 10.7348 1 11 1ZM11 10C10.7348 10 10.4804 10.1054 10.2929 10.2929C10.1054 10.4804 10 10.7348 10 11V14C10 14.2652 10.1054 14.5196 10.2929 14.7071C10.4804 14.8946 10.7348 15 11 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V11C15 10.7348 14.8946 10.4804 14.7071 10.2929C14.5196 10.1054 14.2652 10 14 10H11ZM11 0C10.4696 0 9.96086 0.210714 9.58579 0.585786C9.21071 0.960859 9 1.46957 9 2V5C9 5.53043 9.21071 6.03914 9.58579 6.41421C9.96086 6.78929 10.4696 7 11 7H14C14.5304 7 15.0391 6.78929 15.4142 6.41421C15.7893 6.03914 16 5.53043 16 5V2C16 1.46957 15.7893 0.960859 15.4142 0.585786C15.0391 0.210714 14.5304 0 14 0L11 0ZM2 9C1.46957 9 0.960859 9.21071 0.585786 9.58579C0.210714 9.96086 0 10.4696 0 11L0 14C0 14.5304 0.210714 15.0391 0.585786 15.4142C0.960859 15.7893 1.46957 16 2 16H5C5.53043 16 6.03914 15.7893 6.41421 15.4142C6.78929 15.0391 7 14.5304 7 14V11C7 10.4696 6.78929 9.96086 6.41421 9.58579C6.03914 9.21071 5.53043 9 5 9H2ZM9 11C9 10.4696 9.21071 9.96086 9.58579 9.58579C9.96086 9.21071 10.4696 9 11 9H14C14.5304 9 15.0391 9.21071 15.4142 9.58579C15.7893 9.96086 16 10.4696 16 11V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H11C10.4696 16 9.96086 15.7893 9.58579 15.4142C9.21071 15.0391 9 14.5304 9 14V11Z" />
                                        <path class="fill-secondary"
                                            d="M0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V5C0 5.53043 0.210714 6.03914 0.585786 6.41421C0.960859 6.78929 1.46957 7 2 7H5C5.53043 7 6.03914 6.78929 6.41421 6.41421C6.78929 6.03914 7 5.53043 7 5V2C7 1.46957 6.78929 0.960859 6.41421 0.585786C6.03914 0.210714 5.53043 0 5 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786Z" />
                                    </svg>
                                </a>
                                <div class="dropdown-menu rounded-4 shadow border-0 p-0" data-bs-popper="none">
                                    <div class="card">
                                        <div class="row g-1 text-center p-3" style="width: 302px;">
                                            <div class="col-6">
                                                <a class="card p-3 color-600 lift align-items-center"
                                                    href="{{ url('application-status') }}" title="">
                                                    <svg viewBox="0 0 16 16" width="30px" class="mb-3"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="fill-secondary"
                                                            d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                                        <path fill-rule="evenodd"
                                                            d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                                                    </svg>
                                                    <p class="mb-0 color-600">Application</p>
                                                    <small class="text-muted">Status</small>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a class="card p-3 color-600 lift align-items-center"
                                                    href="{{ url('calender') }}" title="">
                                                    <svg viewBox="0 0 16 16" width="30px" class="mb-3"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                                        <path class="fill-secondary"
                                                            d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                    </svg>
                                                    <p class="mb-0 color-600">Appointment</p>
                                                    <small class="text-muted">schedule</small>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a class="card p-3 color-600 lift align-items-center"
                                                    href="crafted-page.html" title="">
                                                    <svg viewBox="0 0 16 16" width="30px" class="mb-3"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14 4.5V9H13V4.5H11C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V9H2V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM13 12H14V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H4C3.46957 16 2.96086 15.7893 2.58579 15.4142C2.21071 15.0391 2 14.5304 2 14V12H3V14C3 14.2652 3.10536 14.5196 3.29289 14.7071C3.48043 14.8946 3.73478 15 4 15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V12Z" />
                                                        <path class="fill-secondary"
                                                            d="M0.146447 10.1464C0.240215 10.0527 0.367392 10 0.5 10H15.5C15.6326 10 15.7598 10.0527 15.8536 10.1464C15.9473 10.2402 16 10.3674 16 10.5C16 10.6326 15.9473 10.7598 15.8536 10.8536C15.7598 10.9473 15.6326 11 15.5 11H0.5C0.367392 11 0.240215 10.9473 0.146447 10.8536C0.0526784 10.7598 0 10.6326 0 10.5C0 10.3674 0.0526784 10.2402 0.146447 10.1464Z"
                                                            fill="black" />
                                                    </svg>
                                                    <p class="mb-0 color-600">Pages</p>
                                                    <small class="text-muted">Crafted Pages</small>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a class="card p-3 color-600 lift align-items-center"
                                                    href="layouts.html" title="">
                                                    <svg viewBox="0 0 16 16" width="30px" class="mb-3"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14 2a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h12zM2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
                                                        <path class="fill-secondary"
                                                            d="M3 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                                                    </svg>
                                                    <p class="mb-0 color-600">Layouts</p>
                                                    <small class="text-muted">Crafted Layout</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> --}}

                        <li class="d-none d-sm-inline-block d-xl-none">
                            <a class="nav-link" href="#" data-bs-toggle="modal"
                                data-bs-target="#MynotesModal">
                                <svg viewBox="0 0 16 16" width="18px" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-secondary"
                                        d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                    <path
                                        d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                                </svg>
                            </a>
                        </li>

                        <li class="d-none d-sm-inline-block d-xl-none">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#RecentChat">
                                <svg viewBox="0 0 16 16" width="18px" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path class="fill-secondary"
                                        d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link quick-light-dark" href="#">
                                <svg viewBox="0 0 16 16" width="18px" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                                    <path class="fill-secondary"
                                        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <div class="dropdown morphing scale-left user-profile mx-lg-3 mx-2">
                                <a class="nav-link dropdown-toggle rounded-circle after-none p-0" href="#" role="button" data-bs-toggle="dropdown">
                                    <span class="btn bg-primary text-white rounded-circle shadow">{{ ucwords(Auth::user()->name[0]) }}</span>
                                </a>
                                <div class="dropdown-menu border-0 rounded-4 shadow p-0">
                                    <div class="card border-0 w240">
                                        <div class="card-body border-bottom d-flex">
                                            {{-- <img class="avatar rounded-circle" src="{{ asset('assets/img/profile_av.png"
                                                alt=""> --}}
                                            <div class="flex-fill ms-3">
                                                <h6 class="card-title mb-0">{{ ucfirst(Auth::user()->name) }}</h6>
                                            </div>
                                        </div>
                                        <div class="list-group m-2 mb-3">
                                            <a class="list-group-item list-group-item-action border-0"
                                                href="client-profile.php"><i class="w30 fa fa-user"></i>My Profile</a>
                                            <a class="list-group-item list-group-item-action border-0"
                                                href="client-support-ticket.php"><i class="w30 fa fa-tag"></i>Support
                                                Ticket</a>
                                        </div>
                                        <a class="btn bg-danger text-light text-uppercase rounded-0" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }} </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a class="nav-link" href="#" data-bs-toggle="modal"
                                data-bs-target="#SettingsModal" title="Settings">
                                <svg viewBox="0 0 16 16" width="18px" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-secondary"
                                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z">
                                    </path>
                                    <path
                                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="toast fade" style="position: absolute; top: 50px; right: 25px; z-index: 99999;"></div>



        @yield('content')



        <footer class="page-footer px-xl-4 px-sm-2 px-0 py-3">
            <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center">
                <p class="col-md-4 mb-0 text-muted"><span id="Changelog"></span> © 2023, All Rights Reserved.</p>
                {{-- <a href="#"
                    class="col-md-4 d-flex align-items-center justify-content-center my-3 my-lg-0 me-lg-auto">
                    <svg height="18" viewBox="0 0 67 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-muted"
                            d="M0.863281 18.9997V1.14968H3.11328V16.9997H10.9133V18.9997H0.863281Z" />
                        <path class="fill-muted"
                            d="M27.3045 12.6997C27.3045 13.933 27.0545 15.0497 26.5545 16.0497C26.0545 17.033 25.2878 17.8163 24.2545 18.3997C23.2378 18.9663 21.9378 19.2497 20.3545 19.2497C18.1378 19.2497 16.4462 18.6497 15.2795 17.4497C14.1295 16.233 13.5545 14.633 13.5545 12.6497V1.14968H15.8045V12.7247C15.8045 14.1747 16.1878 15.2997 16.9545 16.0997C17.7378 16.8997 18.9128 17.2997 20.4795 17.2997C21.5628 17.2997 22.4378 17.108 23.1045 16.7247C23.7878 16.3247 24.2878 15.783 24.6045 15.0997C24.9212 14.3997 25.0795 13.5997 25.0795 12.6997V1.14968H27.3045V12.6997Z" />
                        <path class="fill-secondary"
                            d="M46.5286 0.765681C46.6246 0.82568 46.6726 0.92168 46.6726 1.05368L46.5466 18.6037C46.5466 18.8677 46.3906 18.9937 46.0786 18.9817H44.4586L33.1546 3.62768L33.1006 13.1677L37.5646 13.1857C37.6726 13.1857 37.7626 13.2217 37.8346 13.2937C37.9186 13.3657 37.9606 13.4617 37.9606 13.5817L37.9426 14.8957C37.9426 15.0157 37.9066 15.1237 37.8346 15.2197C37.7626 15.3037 37.6666 15.3457 37.5466 15.3457L31.3726 15.2917H31.3546C31.1026 15.2917 30.9706 15.1837 30.9586 14.9677L31.0666 0.98168C31.0666 0.849679 31.1026 0.74768 31.1746 0.675681C31.2586 0.59168 31.3666 0.555679 31.4986 0.56768H33.1726C33.3406 0.56768 33.4726 0.63368 33.5686 0.765681L44.4406 15.4177L44.5486 0.94568C44.5966 0.741679 44.7286 0.639679 44.9446 0.639679L46.2046 0.65768C46.3126 0.65768 46.4206 0.69368 46.5286 0.765681ZM39.7786 16.7857C39.8986 16.7977 39.9946 16.8397 40.0666 16.9117C40.1386 16.9717 40.1746 17.0677 40.1746 17.1997L40.1566 18.4957C40.1566 18.6157 40.1206 18.7237 40.0486 18.8197C39.9886 18.9037 39.8926 18.9457 39.7606 18.9457H31.3546C31.2346 18.9457 31.1386 18.9097 31.0666 18.8377C30.9946 18.7657 30.9586 18.6697 30.9586 18.5497V17.2357C30.9586 17.1157 30.9946 17.0137 31.0666 16.9297C31.1386 16.8337 31.2406 16.7857 31.3726 16.7857H35.5666C38.0266 16.7857 39.4306 16.7857 39.7786 16.7857Z" />
                        <path class="fill-muted"
                            d="M66.0301 10.0497C66.0301 11.433 65.8551 12.6913 65.5051 13.8247C65.1551 14.9413 64.6301 15.908 63.9301 16.7247C63.2467 17.5413 62.3884 18.1663 61.3551 18.5997C60.3384 19.033 59.1551 19.2497 57.8051 19.2497C56.4051 19.2497 55.1884 19.033 54.1551 18.5997C53.1217 18.1497 52.2634 17.5247 51.5801 16.7247C50.8967 15.908 50.3884 14.933 50.0551 13.7997C49.7217 12.6663 49.5551 11.408 49.5551 10.0247C49.5551 8.19135 49.8551 6.59135 50.4551 5.22468C51.0551 3.85801 51.9634 2.79135 53.1801 2.02468C54.4134 1.25801 55.9634 0.87468 57.8301 0.87468C59.6134 0.87468 61.1134 1.25801 62.3301 2.02468C63.5467 2.77468 64.4634 3.84135 65.0801 5.22468C65.7134 6.59135 66.0301 8.19968 66.0301 10.0497ZM51.9301 10.0497C51.9301 11.5497 52.1384 12.8413 52.5551 13.9247C52.9717 15.008 53.6134 15.8413 54.4801 16.4247C55.3634 17.008 56.4717 17.2997 57.8051 17.2997C59.1551 17.2997 60.2551 17.008 61.1051 16.4247C61.9717 15.8413 62.6134 15.008 63.0301 13.9247C63.4467 12.8413 63.6551 11.5497 63.6551 10.0497C63.6551 7.79968 63.1884 6.04135 62.2551 4.77468C61.3217 3.49135 59.8467 2.84968 57.8301 2.84968C56.4801 2.84968 55.3634 3.14135 54.4801 3.72468C53.6134 4.29135 52.9717 5.11635 52.5551 6.19968C52.1384 7.26635 51.9301 8.54968 51.9301 10.0497Z" />
                    </svg> 
                </a> --}}
                
                <ul class="nav col-md-4 justify-content-center justify-content-lg-end">
                    <li class="nav-item"><a href="javascript:void(0)" target="_blank" class="nav-link px-2 text-muted">Portfolio</a></li>
                    <li class="nav-item"><a href="javascript:void(0)" target="_blank" class="nav-link px-2 text-muted">licenses</a></li>
                    <li class="nav-item"><a href="javascript:void(0)" target="_blank" class="nav-link px-2 text-muted">Support</a></li>
                    <li class="nav-item"><a href="javascript:void(0)" target="_blank" class="nav-link px-2 text-muted">FAQs</a></li>
                </ul>
            </div>
        </footer>
    </div>

    <div class="modal fade" id="MynotesModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h5 class="modal-title">My Notes <span class="badge bg-danger ms-2">14</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="bg-light px-4 py-3">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#Notetab-all" role="tab"
                                aria-selected="true">All Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#Notetab-Business" role="tab"
                                aria-selected="false">Business</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#Notetab-Social"
                                role="tab">Social</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#Notetab-Create" role="tab"><i
                                    class="fa fa-plus me-2"></i>New</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-body px-4 custom_scroll">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade active show" id="Notetab-all" role="tabpanel">
                            <div class="card ribbon mb-2">
                                <div class="option-2 bg-primary position-absolute"></div>
                                <div class="card-body">
                                    <span class="text-muted">02 January 2021</span>
                                    <p class="lead">Give Review for design</p>
                                    <span>It has roots in a piece of classical Latin literature from 45 BC, making it
                                        over 2020 years old.</span>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-star favourite-note"></i></a>
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-trash favourite-note"></i></a>
                                </div>
                            </div>
                            <div class="card ribbon mb-2">
                                <div class="option-2 bg-success position-absolute"></div>
                                <div class="card-body">
                                    <span class="text-muted">17 January 2022</span>
                                    <p class="lead">Give salary to employee</p>
                                    <span>The generated Lorem Ipsum is therefore always free from repetition</span>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-star favourite-note"></i></a>
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-trash favourite-note"></i></a>
                                </div>
                            </div>
                            <div class="card ribbon mb-2">
                                <div class="option-2 bg-info position-absolute"></div>
                                <div class="card-body">
                                    <span class="text-muted">02 Fabruary 2020</span>
                                    <p class="lead">Launch new template</p>
                                    <span>Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</span>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-star favourite-note"></i></a>
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-trash favourite-note"></i></a>
                                </div>
                            </div>
                            <div class="card ribbon mb-2">
                                <div class="option-2 bg-dark position-absolute"></div>
                                <div class="card-body">
                                    <span class="text-muted">22 August 2021</span>
                                    <p class="lead">Nightout with friends</p>
                                    <span>Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</span>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-star favourite-note"></i></a>
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-trash favourite-note"></i></a>
                                </div>
                            </div>
                            <div class="card ribbon mb-2">
                                <div class="option-2 bg-danger position-absolute"></div>
                                <div class="card-body">
                                    <span class="text-muted">01 December 2021</span>
                                    <p class="lead">Change a Design</p>
                                    <span> It has survived not only five centuries, but also the leap into
                                        electronic</span>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-star favourite-note"></i></a>
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-trash favourite-note"></i></a>
                                </div>
                            </div>
                            <div class="card ribbon mb-2">
                                <div class="option-2 bg-warning position-absolute"></div>
                                <div class="card-body">
                                    <span class="text-muted">10 December 2021</span>
                                    <p class="lead">Meeting with Mr.Lee</p>
                                    <span>Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                        their default model</span>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-star favourite-note"></i></a>
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-trash favourite-note"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Notetab-Business" role="tabpanel">
                            <div class="card ribbon mb-2">
                                <div class="option-2 bg-warning position-absolute"></div>
                                <div class="card-body">
                                    <span class="text-muted">10 December 2021</span>
                                    <p class="lead">Meeting with Mr.Lee</p>
                                    <span>Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                        their default model</span>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-star favourite-note"></i></a>
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-trash favourite-note"></i></a>
                                </div>
                            </div>
                            <div class="card ribbon mb-2">
                                <div class="option-2 bg-danger position-absolute"></div>
                                <div class="card-body">
                                    <span class="text-muted">01 December 2021</span>
                                    <p class="lead">Change a Design</p>
                                    <span> It has survived not only five centuries, but also the leap into
                                        electronic</span>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-star favourite-note"></i></a>
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-trash favourite-note"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Notetab-Social" role="tabpanel">
                            <div class="card ribbon mb-2">
                                <div class="option-2 bg-dark position-absolute"></div>
                                <div class="card-body">
                                    <span class="text-muted">22 August 2021</span>
                                    <p class="lead">Nightout with friends</p>
                                    <span>Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</span>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-star favourite-note"></i></a>
                                    <a class="btn btn-sm btn-outline-secondary" href="#"><i
                                            class="fa fa-trash favourite-note"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Notetab-Create" role="tabpanel">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" placeholder="Note Title">
                                <label>Note Title</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control datepicker" placeholder="Select Date">
                                <label>Select Date</label>
                            </div>
                            <div class="form-floating mb-2">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Business</option>
                                    <option value="2">Social</option>
                                </select>
                                <label>Works with selects</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>
                                <label>Leave a comment here</label>
                            </div>
                            <button type="button" class="btn btn-primary lift">Save note</button>
                            <button type="button" class="btn btn-white border lift"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ScheduleModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-secondary rounded-0">
                    <h5 class="modal-title text-light">Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom_scroll">
                    <div class="ps-2">

                        <div class="timeline-item ti-primary p-3">
                            <div class="avatar sm rounded-circle no-thumbnail">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="timeline-content ms-3">
                                <div>Call Danny at Colbys</div>
                                <small class="text-muted">Today - 11:32am</small>
                            </div>
                        </div>

                        <div class="timeline-item ti-info p-3">
                            <div class="timeline-icon">
                                <img class="avatar sm rounded-circle" src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="">
                            </div>
                            <div class="timeline-content ms-3">
                                <div>Meeting with Alice</div>
                                <small class="text-muted">Today - 12:50pm</small>
                            </div>
                        </div>

                        <div class="timeline-item ti-danger p-3">
                            <div class="avatar sm rounded-circle no-thumbnail">
                                <i class="fa fa-comment"></i>
                            </div>
                            <div class="timeline-content ms-3">
                                <div>Answer Annie's message</div>
                                <small class="text-muted">Today - 01:35pm</small>
                            </div>
                        </div>

                        <div class="timeline-item ti-danger p-3">
                            <div class="avatar sm rounded-circle no-thumbnail">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="timeline-content ms-3">
                                <div>Send new campaign</div>
                                <small class="text-muted">Today - 02:40pm</small>
                            </div>
                        </div>

                        <div class="timeline-item ti-primary p-3">
                            <div class="avatar sm rounded-circle no-thumbnail">
                                <i class="fa fa-smile-o"></i>
                            </div>
                            <div class="timeline-content ms-3">
                                <div>Project review</div>
                                <small class="text-muted">Today - 03:15pm</small>
                            </div>
                        </div>

                        <div class="timeline-item ti-warning p-3">
                            <div class="avatar sm rounded-circle no-thumbnail">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="timeline-content ms-3">
                                <div>Call Trisha Jackson</div>
                                <small class="text-muted">Today - 05:40pm</small>
                            </div>
                        </div>

                        <div class="timeline-item ti-success p-3">
                            <div class="avatar sm rounded-circle no-thumbnail">
                                <i class="fa fa-leaf"></i>
                            </div>
                            <div class="timeline-content ms-3">
                                <div>Write proposal for Don</div>
                                <small class="text-muted">Today - 06:30pm</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="RecentChat" tabindex="-1">
        <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable">
            <div class="modal-content">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills p-3 h-100">
                        <a class="nav-link rounded-circle p-1 mb-2 active" href="javascript:void(0);"
                            data-bs-toggle="pill" data-bs-target="#c-user-1" title="">
                            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar1.jpg') }}"
                                alt="avatar">
                        </a>
                        <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
                            data-bs-target="#c-user-2" title="">
                            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar2.jpg') }}"
                                alt="avatar">
                        </a>
                    </div>
                    <div class="tab-content shadow-sm">
                        <div class="tab-pane fade show active" id="c-user-1" role="tabpanel">
                            <div class="card">
                                <div class="card-header border-bottom py-3">
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" title="">
                                            <img class="avatar rounded-circle" src="{{ asset('assets/img/xs/avatar1.jpg') }}"
                                                alt="avatar">
                                        </a>
                                        <div class="ms-3">
                                            <h6 class="mb-0">Orlando Lentz</h6>
                                            <small class="text-muted">Last seen: 2 hours ago</small>
                                        </div>
                                    </div>
                                    <div class="dropdown morphing scale-left">
                                        <a class="nav-link p-2 text-secondary d-none d-xl-inline-block"
                                            href="javascript:void(0);"><i class="fa fa-camera"></i></a>
                                        <a class="nav-link p-2 me-1 text-secondary d-none d-xl-inline-block"
                                            href="javascript:void(0);"><i class="fa fa-video-camera"></i></a>
                                        <a class="nav-link py-2 px-3 text-muted d-inline-block d-xl-none"
                                            data-bs-dismiss="modal" aria-label="Close" href="#"><i
                                                class="fa fa-close"></i></a>
                                        <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <ul class="dropdown-menu shadow border-0 p-2">
                                            <li><a class="dropdown-item" href="#">File Info</a></li>
                                            <li><a class="dropdown-item" href="#">Copy to</a></li>
                                            <li><a class="dropdown-item" href="#">Move to</a></li>
                                            <li><a class="dropdown-item" href="#">Rename</a></li>
                                            <li><a class="dropdown-item" href="#">Block</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body custom_scroll" style="height: calc(100vh - 141px);">
                                    <ul class="list-unstyled chat-history flex-grow-1">

                                        <li class="mb-3 d-flex flex-row align-items-end">
                                            <div class="max-width-70">
                                                <div class="user-info mb-1">
                                                    <img class="avatar xs rounded-circle me-1"
                                                        src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="avatar">
                                                    <span class="text-muted small">10:10 AM, Today</span>
                                                </div>
                                                <div class="card p-3">
                                                    <div class="message"> Hi Aiden, how are you?</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row-reverse align-items-end">
                                            <div class="max-width-70 text-end">
                                                <div class="user-info mb-1">
                                                    <span class="text-muted small">10:12 AM, Today</span>
                                                </div>
                                                <div class="card border-0 p-3 bg-primary text-light">
                                                    <div class="message">Are we meeting today?</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row align-items-end">
                                            <div class="max-width-70">
                                                <div class="user-info mb-1">
                                                    <img class="avatar xs rounded-circle me-1"
                                                        src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="avatar">
                                                    <span class="text-muted small">10:10 AM, Today</span>
                                                </div>
                                                <div class="card p-3">
                                                    <div class="message"> It is a long established fact that a reader
                                                        will be distracted by the readable content of a page when
                                                        looking at its layout.</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row align-items-end">
                                            <div class="max-width-70">
                                                <div class="user-info mb-1">
                                                    <img class="avatar xs rounded-circle me-1"
                                                        src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="avatar">
                                                    <span class="text-muted small">10:10 AM, Today</span>
                                                </div>
                                                <div class="card p-3">
                                                    <div class="message"> Contrary to popular belief, Lorem Ipsum is
                                                        not
                                                        simply random text.</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row-reverse align-items-end">
                                            <div class="max-width-70 text-end">
                                                <div class="user-info mb-1">
                                                    <span class="text-muted small">10:12 AM, Today</span>
                                                </div>
                                                <div class="card border-0 p-3 bg-primary text-light">
                                                    <div class="message">Yes, Orlando Allredy done <br> There are many
                                                        variations of passages of Lorem Ipsum available</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row align-items-end">
                                            <div class="max-width-70">
                                                <div class="user-info mb-1">
                                                    <img class="avatar xs rounded-circle me-1"
                                                        src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="avatar">
                                                    <span class="text-muted small">10:10 AM, Today</span>
                                                </div>
                                                <div class="card p-3">
                                                    <div class="message">
                                                        <p>Please find attached images</p>
                                                        <img class="w120 img-thumbnail" src="{{ asset('assets/img/gallery/3.jpg') }}"
                                                            alt="">
                                                        <img class="w120 img-thumbnail" src="{{ asset('assets/img/gallery/4.jpg') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row-reverse align-items-end">
                                            <div class="max-width-70 text-end">
                                                <div class="user-info mb-1">
                                                    <span class="text-muted small">10:12 AM, Today</span>
                                                </div>
                                                <div class="card border-0 p-3 bg-primary text-light">
                                                    <div class="message">Okay, will check and let you know.</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-footer border-top bg-transparent py-3 px-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter text here...">
                                        <button class="btn btn-primary" type="button">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="c-user-2" role="tabpanel">
                            <div class="card">

                                <div class="card-header border-bottom py-3">
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" title="">
                                            <img class="avatar rounded-circle" src="{{ asset('assets/img/xs/avatar2.jpg') }}"
                                                alt="avatar">
                                        </a>
                                        <div class="ms-3">
                                            <h6 class="mb-0">Orlando Lentz</h6>
                                            <small class="text-muted">Last seen: 2 hours ago</small>
                                        </div>
                                    </div>
                                    <div class="dropdown morphing scale-left">
                                        <a class="nav-link p-2 text-secondary d-none d-xl-inline-block"
                                            href="javascript:void(0);"><i class="fa fa-camera"></i></a>
                                        <a class="nav-link p-2 me-1 text-secondary d-none d-xl-inline-block"
                                            href="javascript:void(0);"><i class="fa fa-video-camera"></i></a>
                                        <a class="nav-link py-2 px-3 text-muted d-inline-block d-xl-none"
                                            data-bs-dismiss="modal" aria-label="Close" href="#"><i
                                                class="fa fa-close"></i></a>
                                        <a href="#" class="more-icon dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="fa fa-ellipsis-h"></i></a>
                                        <ul class="dropdown-menu shadow border-0 p-2">
                                            <li><a class="dropdown-item" href="#">File Info</a></li>
                                            <li><a class="dropdown-item" href="#">Copy to</a></li>
                                            <li><a class="dropdown-item" href="#">Move to</a></li>
                                            <li><a class="dropdown-item" href="#">Rename</a></li>
                                            <li><a class="dropdown-item" href="#">Block</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body custom_scroll" style="height: calc(100vh - 141px);">
                                    <ul class="list-unstyled chat-history flex-grow-1">

                                        <li class="mb-3 d-flex flex-row-reverse align-items-end">
                                            <div class="max-width-70 text-end">
                                                <div class="user-info mb-1">
                                                    <span class="text-muted small">10:12 AM, Today</span>
                                                </div>
                                                <div class="card border-0 p-3 bg-primary text-light">
                                                    <div class="message">Are we meeting today?</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row align-items-end">
                                            <div class="max-width-70">
                                                <div class="user-info mb-1">
                                                    <img class="avatar xs rounded-circle me-1"
                                                        src="{{ asset('assets/img/xs/avatar2.jpg') }}" alt="avatar">
                                                    <span class="text-muted small">10:10 AM, Today</span>
                                                </div>
                                                <div class="card p-3">
                                                    <div class="message"> Hi Aiden, how are you?</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row-reverse align-items-end">
                                            <div class="max-width-70 text-end">
                                                <div class="user-info mb-1">
                                                    <span class="text-muted small">10:12 AM, Today</span>
                                                </div>
                                                <div class="card border-0 p-3 bg-primary text-light">
                                                    <div class="message">Yes, Orlando Allredy done <br> There are many
                                                        variations of passages of Lorem Ipsum available</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row align-items-end">
                                            <div class="max-width-70">
                                                <div class="user-info mb-1">
                                                    <img class="avatar xs rounded-circle me-1"
                                                        src="{{ asset('assets/img/xs/avatar2.jpg') }}" alt="avatar">
                                                    <span class="text-muted small">10:10 AM, Today</span>
                                                </div>
                                                <div class="card p-3">
                                                    <div class="message">
                                                        <p>Please find attached images</p>
                                                        <img class="w120 img-thumbnail"
                                                            src="{{ asset('assets/img/gallery/1.jpg') }}" alt="">
                                                        <img class="w120 img-thumbnail"
                                                            src="{{ asset('assets/img/gallery/2.jpg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row-reverse align-items-end">
                                            <div class="max-width-70 text-end">
                                                <div class="user-info mb-1">
                                                    <span class="text-muted small">10:12 AM, Today</span>
                                                </div>
                                                <div class="card border-0 p-3 bg-primary text-light">
                                                    <div class="message">Okay, will check and let you know.</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row align-items-end">
                                            <div class="max-width-70">
                                                <div class="user-info mb-1">
                                                    <img class="avatar xs rounded-circle me-1"
                                                        src="{{ asset('assets/img/xs/avatar2.jpg') }}" alt="avatar">
                                                    <span class="text-muted small">10:10 AM, Today</span>
                                                </div>
                                                <div class="card p-3">
                                                    <div class="message"> It is a long established fact that a reader
                                                        will be distracted by the readable content of a page when
                                                        looking at its layout.</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="mb-3 d-flex flex-row align-items-end">
                                            <div class="max-width-70">
                                                <div class="user-info mb-1">
                                                    <img class="avatar xs rounded-circle me-1"
                                                        src="{{ asset('assets/img/xs/avatar2.jpg') }}" alt="avatar">
                                                    <span class="text-muted small">10:10 AM, Today</span>
                                                </div>
                                                <div class="card p-3">
                                                    <div class="message"> Contrary to popular belief, Lorem Ipsum is
                                                        not
                                                        simply random text.</div>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <a href="#" class="nav-link py-2 px-3 text-muted"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu rounded-4 border-0 shadow">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Share</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-footer border-top bg-transparent py-3 px-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            placeholder="Enter text here...">
                                        <button class="btn btn-primary" type="button">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="SettingsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-vertical right-side modal-dialog-scrollable">
            <div class="modal-content">
                <div class="px-xl-4 modal-header">
                    <h5 class="modal-title">Theme Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="px-xl-4 modal-body custom_scroll">

                    <div class="card fieldset border border-primary p-3 setting-theme mb-4">
                        <span class="fieldset-tile text-primary bg-card">Color Settings</span>
                        <ul class="list-unstyled d-flex choose-skin mb-0">
                            <li data-theme="black">
                                <div class="black"></div>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                            </li>
                            <li data-theme="red">
                                <div class="red"></div>
                            </li>
                            <li data-theme="dynamic">
                                <div class="dynamic"><i class="fa fa-paint-brush"></i></div>
                            </li>
                        </ul>

                        <div class="card fieldset border border-primary p-3 dt-setting mt-4">
                            <span class="fieldset-tile text-primary bg-card">Dynamic Color Settings</span>
                            <div class="row g-3">
                                <div class="col-7">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <button id="primaryColorPicker"
                                                class="btn bg-primary avatar xs me-2"></button>
                                            <label>Primary Color</label>
                                        </li>
                                        <li>
                                            <button id="secondaryColorPicker"
                                                class="btn bg-secondary avatar xs me-2"></button>
                                            <label>Secondary Color</label>
                                        </li>
                                        <li>
                                            <button id="BodyColorPicker"
                                                class="btn btn-outline-secondary bg-body avatar xs me-2"></button>
                                            <label>Site Background</label>
                                        </li>
                                        <li>
                                            <button id="CardColorPicker"
                                                class="btn btn-outline-secondary bg-card avatar xs me-2"></button>
                                            <label>Widget Background</label>
                                        </li>
                                        <li>
                                            <button id="BorderColorPicker"
                                                class="btn btn-outline-secondary bg-card avatar xs me-2"></button>
                                            <label>Border Color</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-5">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <button id="chartColorPicker1"
                                                class="btn chart-color1 avatar xs me-2"></button>
                                            <label>Chart Color 1</label>
                                        </li>
                                        <li>
                                            <button id="chartColorPicker2"
                                                class="btn chart-color2 avatar xs me-2"></button>
                                            <label>Chart Color 2</label>
                                        </li>
                                        <li>
                                            <button id="chartColorPicker3"
                                                class="btn chart-color3 avatar xs me-2"></button>
                                            <label>Chart Color 3</label>
                                        </li>
                                        <li>
                                            <button id="chartColorPicker4"
                                                class="btn chart-color4 avatar xs me-2"></button>
                                            <label>Chart Color 4</label>
                                        </li>
                                        <li>
                                            <button id="chartColorPicker5"
                                                class="btn chart-color5 avatar xs me-2"></button>
                                            <label>Chart Color 5</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card fieldset border setting-mode mb-4">
                        <span class="fieldset-tile bg-card">Light/Dark & Contrast Layout</span>
                        <div class="c_radio d-flex text-center">
                            <label class="m-1 theme-switch" for="theme-switch">
                                <input type="checkbox" id="theme-switch" />
                                <span class="card p-2">
                                    <img class="img-fluid" src="{{ asset('assets/img/dark-version.svg') }}" alt="Dark Mode" />
                                </span>
                            </label>
                            <label class="m-1 theme-dark" for="theme-dark">
                                <input type="checkbox" id="theme-dark" />
                                <span class="card p-2">
                                    <img class="img-fluid" src="{{ asset('assets/img/dark-theme.svg') }}"
                                        alt="Theme Dark Mode" />
                                </span>
                            </label>
                            <label class="m-1 theme-high-contrast" for="theme-high-contrast">
                                <input type="checkbox" id="theme-high-contrast" />
                                <span class="card p-2">
                                    <img class="img-fluid" src="{{ asset('assets/img/high-version.svg') }}"
                                        alt="High Contrast" />
                                </span>
                            </label>
                            <label class="m-1 theme-rtl" for="theme-rtl">
                                <input type="checkbox" id="theme-rtl" />
                                <span class="card p-2">
                                    <img class="img-fluid" src="{{ asset('assets/img/rtl-version.svg') }}" alt="RTL Mode!" />
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="card fieldset border setting-font">
                        <span class="fieldset-tile bg-card">Google Font Settings</span>
                        <div class="c_radio d-flex text-center font_setting">
                            <label class="m-1" for="font-opensans">
                                <input type="radio" name="font" id="font-opensans" value="font-opensans" />
                                <span class="card p-2">
                                    <img class="img-fluid" src="{{ asset('assets/img/font-opensans.svg') }}" alt="Dark Mode" />
                                </span>
                            </label>
                            <label class="m-1" for="font-quicksand">
                                <input type="radio" name="font" id="font-quicksand"
                                    value="font-quicksand" />
                                <span class="card p-2">
                                    <img class="img-fluid" src="{{ asset('assets/img/font-quicksand.svg') }}" alt="Dark Mode" />
                                </span>
                            </label>
                            <label class="m-1" for="font-nunito">
                                <input type="radio" name="font" id="font-nunito" value="font-nunito"
                                    checked="" />
                                <span class="card p-2">
                                    <img class="img-fluid" src="{{ asset('assets/img/font-nunito.svg') }}" alt="Dark Mode" />
                                </span>
                            </label>
                            <label class="m-1" for="font-raleway">
                                <input type="radio" name="font" id="font-raleway" value="font-raleway" />
                                <span class="card p-2">
                                    <img class="img-fluid" src="{{ asset('assets/img/font-raleway.svg') }}" alt="Dark Mode" />
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="m-1 p-3 bg-body rounded-4 mb-4">
                        <p>Dynamic Font Settings</p>
                        <div class="mb-2">
                            <label class="form-label small text-muted mb-0">Enter font URL</label>
                            <input id="font_url" type="text" class="form-control"
                                placeholder="http://fonts.cdnfonts.com/css/vonfont">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-muted mb-0">Enter font family name</label>
                            <input id="font_family" type="text" class="form-control" placeholder="vonfont">
                        </div>
                        <button id="font_apply" type="submit" class="btn btn-primary">Save Changes</button>
                        <button id="font_cancel" type="submit" class="btn btn-secondary">Clear Changes</button>
                    </div>

                    <div class="setting-more mb-4">
                        <h6 class="card-title">More Setting</h6>
                        <ul class="list-group list-group-flush list-group-custom fs-6">

                            <li class="list-group-item">
                                <div class="form-check form-switch h-menu-switch mb-1">
                                    <input class="form-check-input" type="checkbox" id="h_menu">
                                    <label class="form-check-label" for="h_menu">Horizontal Menu Version</label>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="form-check form-switch pageheader-switch mb-1">
                                    <input class="form-check-input" type="checkbox" id="PageHeader" checked>
                                    <label class="form-check-label" for="PageHeader">Page Header Fix</label>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="form-check form-switch pageheader-dark-switch mb-1">
                                    <input class="form-check-input" type="checkbox" id="PageHeader_dark">
                                    <label class="form-check-label" for="PageHeader_dark">Page Header Dark
                                        Mode</label>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="form-check form-switch radius-switch mb-1">
                                    <input class="form-check-input" type="checkbox" id="BorderRadius">
                                    <label class="form-check-label" for="BorderRadius">Border Radius none</label>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="form-check form-switch sidebar-v2 mb-1">
                                    <input class="form-check-input" type="checkbox" id="sidebar_v2">
                                    <label class="form-check-label" for="sidebar_v2">Sidebar Version 2</label>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="form-check form-switch sidebardark-switch mb-1">
                                    <input class="form-check-input" type="checkbox" id="SidebarDark">
                                    <label class="form-check-label" for="SidebarDark">Enable Dark! ( Sidebar
                                        )</label>
                                </div>
                            </li>

                            <li class="list-group-item setting-img">
                                <div class="form-check form-switch imagebg-switch mb-1">
                                    <input class="form-check-input" type="checkbox" id="CheckImage">
                                    <label class="form-check-label" for="CheckImage">Background Image
                                        (Sidebar)</label>
                                </div>
                                <div class="bg-images">
                                    <ul class="list-unstyled d-flex">
                                        <li class="sidebar-img-1 me-1 sidebar-img-active"><a
                                                class="rounded sidebar-img" id="img-1" href="#"><img
                                                    src="{{ asset('assets/img/sidebar-bg/sidebar-1.jpg') }}" alt="" /></a>
                                        </li>
                                        <li class="sidebar-img-2 me-1"><a class="rounded sidebar-img"
                                                id="img-2" href="#"><img
                                                    src="{{ asset('assets/img/sidebar-bg/sidebar-2.jpg') }}" alt="" /></a>
                                        </li>
                                        <li class="sidebar-img-3 me-1"><a class="rounded sidebar-img"
                                                id="img-3" href="#"><img
                                                    src="{{ asset('assets/img/sidebar-bg/sidebar-3.jpg') }}" alt="" /></a>
                                        </li>
                                        <li class="sidebar-img-4 me-1"><a class="rounded sidebar-img"
                                                id="img-4" href="#"><img
                                                    src="{{ asset('assets/img/sidebar-bg/sidebar-4.jpg') }}" alt="" /></a>
                                        </li>
                                        <li class="sidebar-img-5 me-1"><a class="rounded sidebar-img"
                                                id="img-5" href="#"><img
                                                    src="{{ asset('assets/img/sidebar-bg/sidebar-5.jpg') }}" alt="" /></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="form-check form-switch fluid-switch mb-1">
                                    <input class="form-check-input" type="checkbox" id="fluidLayout"
                                        checked="">
                                    <label class="form-check-label" for="fluidLayout">Container Fluid</label>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="form-check form-switch shadow-switch mb-1">
                                    <input class="form-check-input" type="checkbox" id="card_shadow">
                                    <label class="form-check-label" for="card_shadow">Card Box-Shadow</label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <a class="btn lift  btn-outline-secondary" href="marketing/index.html">Marketing page</a>
                        <a class="btn lift  btn-outline-secondary" href="onepgae-uikit/onepage.html">Landing
                            page</a>
                        <a class="btn lift  btn-outline-secondary" href="onepgae-uikit/index.html">One page Ui Kit
                            Elements</a>
                    </div>
                </div>
                <div class="px-xl-4 modal-footer d-flex justify-content-start text-center">
                    <button type="button" class="btn flex-fill btn-primary lift">Save Changes</button>
                    <button type="button" class="btn flex-fill btn-white border lift"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    {{-- <script data-cfasync="false" src="assets/js/email-decode.min.js"></script>  --}}
    <script src="{{ asset('assets/js/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/bundle/bootstrapdatepicker.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/bundle/dropify.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/bundle/owlcarousel.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script> --}}

    <script src="{{ asset('assets/js/bundle/dataTables.bundle.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    
    <script src="{{ asset('assets/vendor/prismjs/prism.js') }}"></script>
    {{-- <script src="{{asset('assets/js/bundle/select2.bundle.js')}}"></script> --}}
    <script src="{{ asset('assets/js/bundle/jquerysteps.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validate/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/parsleyjs/js/parsley.js') }}"></script>

    {{-- <script src="assets/js/bundle/summernote.bundle.js"></script> --}}
    <script src="{{ asset('assets/js/bundle/summernote.bundle.js') }}"></script>


    <script src="{{ asset('assets/js/bundle/apexcharts.bundle.js') }}"></script>
    <script>
    var pageurl = window.location.pathname;
    var pageName = pageurl.split("/")[4];
    if(pageName==''||pageName=='dashboard'){
        // LUNO Revenue
        var options = {
          series: [{
            name: 'Total Case',
            data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
          }, {
            name: 'Qualified Case',
            data: [123, 142, 135, 127, 143, 122, 117, 131, 122, 122, 112, 116]
          }, {
            name: 'Agreement Sign',
            data: [223, 242, 235, 227, 243, 222, 217, 231, 222, 222, 212, 216]
          }],
          chart: {
            type: 'bar',
            height: 260,
            stacked: true,
            stackType: '100%',
            toolbar: {
              show: false,
            },
          },
          colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)'],
          responsive: [{
            breakpoint: 480,
            options: {
              legend: {
                position: 'bottom',
                offsetX: -10,
                offsetY: 0
              }
            }
          }],
          xaxis: {
            categories: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
          },
          fill: {
            opacity: 1
          },
          dataLabels: {
            enabled: false,
          },
          legend: {
            position: 'bottom',
            horizontalAlign: 'center',
          },
        };
        var chart = new ApexCharts(document.querySelector("#apex-AudienceOverview"), options);
        chart.render();
        // Sales by Category
        var options = {
          chart: {
            height: 280,
            type: 'donut',
          },
          plotOptions: {
            pie: {
              donut: {
                labels: {
                  show: true,
                  total: {
                    showAlways: true,
                    show: true
                  }
                }
              }
            }
          },
          dataLabels: {
            enabled: false,
          },
          legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            show: true,
          },
          colors: ['var(--chart-color1)', 'var(--chart-color2)'],
          series: [2700, 4000],
          labels: ["Payment Received", "Expected Receiver"],
        }
        var chart = new ApexCharts(document.querySelector("#apex-SalesbyCategory"), options);
        chart.render();
    }
      </script>
    <script>
        // $('.inbox .inbox-list-toggle').on('click', function() {
        //   $('.inbox .order-1').toggleClass('open');
        // });
        $(document).ready(function() {
          $('.summernote').summernote({
            tabsize: 2,
            height: 200
          });
        //   $('.note-editor .note-btn').on('click', function() {
        //     $(this).next().toggleClass("show");
        //   });
        });
    </script>


    <script>
        //   $('.select2').select2();
        // Step Demo 1
        $('.h-wizard-demo1').steps({});
        // Select2
        //   $(".country, .language").select2({});
        // Form Validation
        // $('.validation, .validation1, .validation2').parsley();
    </script>


    {{-- <script src="{{asset('assets/js/bundle/dataTables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/bundle/apexcharts.bundle.js')}}"></script> --}}

    {{-- <script src="assets/js/bundle/tui-calendar.bundle.js"></script> --}}
    {{-- <script src="{{asset('assets/js/bundle/select2.bundle.js')}}"></script> --}}
    {{-- <script>
       $('.select2').select2();
    </script> --}}
    <script>
        // recent invoices Carousel
        $('#recent_invoices').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false
                },
                1400: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
    </script>
    {{-- <script src="{{ asset('assets/js/bundle/dataTables.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#invoice_list').addClass('nowrap').dataTable({
                responsive: true,
                searching: false,
                paging: false,
                ordering: true,
                info: false,
            });
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
            });
        }); --}}

        {{-- // $('.dropify').dropify();
        // date range picker
        // $('.datepicker').datepicker({}); --}}
        {{-- $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
        }).on('changeDate', function(e) {
            $(this).datepicker('hide');
        });
    </script> --}}

<script>
$(".approvalPopupBtn").on('click', function(){
    $('#uploadDocument').append('<input type="hidden" name="case_id" value="'+$(this).attr('case_id')+'" />');
    $('#uploadDocument').append('<input type="hidden" name="status" value="'+$(this).attr('status')+'" />');
    $('#uploadDocument').append('<input type="hidden" name="did" value="'+$(this).attr('did')+'" />');
    $('#uploadDocument').append('<input type="hidden" name="created_by" value="'+$(this).attr('created_by')+'" />');
});

$("#docuploadBtn").on('click', function(e){
    e.preventDefault();
    var formData = new FormData($('#uploadDocument')[0]);
    formData.append('tax_file', $('input[type=file]')[0].files[0]);
    $.ajax({
        type: "POST",
        url: window.url + 'upload_form_document',
        data: formData,
        contentType: false,
        processData: false,
        success: function(res) {
            if(res.success){
                console.log(res.data);
                showToastMsg('success', 'Greate', 'Details updated', 'Your document uploaded successfully, waiting for review');
                $('#errorDiv').css('display', 'block');
                $('#errorDiv').html('Your document uploaded successfully, waiting for review');
                $("#docuploadBtn").css('display', 'none');
                $('#'+res.did+'_status').html('Waiting for approval&nbsp;<i class="fa fa-folder"></i>');
                $('#'+res.did+'_date').html(res.date);
                window.location.reload();
            }
        },
        error: function() {
            console.log('err');
        }
    });
});


$('#sendmail').on('click', function () {
    if($(this).attr('data-attachment')!=''){
        $('#attachmentDiv').html('<input type="hidden" id="emailid" name="emailid" value="'+$(this).attr('data-emailid')+'" /><br/><a id="attachment" href="'+$(this).attr('data-attachment')+'"><i class="fa fa-paperclip"></i> &nbsp;<lebel>'+$(this).attr('data-attachmentMSG')+'</lebel></a>');
    }
});
$('.approvalPopupBtn').on('click', function(){
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
    if ($(this).attr('doc').match(/\.(jpg|jpeg|png|gif)$/i)){
        $('#docApproval').html('<img src="'+$(this).attr('doc')+'" style="width: 100%;"/>');
    } else {
        $('#docApproval').html('<div class="mb-4"><a target="_blank" class="luno-link text_bg" href="'+$(this).attr('doc')+'">Click to check the file</a></div>');
    }
    $('.modal-body').find('button').attr('did', $(this).attr('id'));
});
$('.docStatusUpdate').on('click', function(){
    if(confirm('Are you sure to take this action?')){
        var did = $(this).attr('did');
        var cStatus = $(this).attr('status');
        
        $.post(window.url + 'update_document_approval_status', {id:did, status:cStatus, updated_by:$(this).attr('updated_by')}, function(response){ 
            if(response.success){
                showToastMsg('success', 'Greate', 'Details updated', 'Your action is updated successfully!');
                $('#'+did+'_status').html(cStatus==2?'<i class="fa fa-close text-danger"></i>&nbsp;Rejecetd':'<i class="fa fa-check text-success"></i>&nbsp;Approved');
                $('#'+did+'_updated_by').html(response.updated_by);
            }
         });
    }
});


function generate_form(ths){
    var form_id = $(ths).attr('form_id');
    var case_id = $(ths).attr('case_id');
    var generate_by = $(ths).attr('generate_by');
    if(confirm('Are you sure to genetare form now?')){        
        $.post(window.url+'generate_form', {form_id:form_id, case_id:case_id, generate_by:generate_by}, function(response){ 
            console.log(response);
            if(response.success){
                $(ths).css('display', 'none');
                showToastMsg('success', 'Greate', 'Details updated', 'Successfully genetared the form!');
                $('#form_link').html('<i class="fa fa-download"></i>&nbsp;<a class="luno-link text_bg" href="'+response.href+'">Immigration Form</a>&nbsp;generated, this is auto generated form, kindly review the form before submit to the IRCC.');
                window.location.reload();
            }
         });
    }
}

$('body').on('click', '#send_otp', function(){
    $('#approval_popup_content').empty();
    var upd = `<p>An OTP has been sent to your current mobile number.</p>
            <div class="row">
                <div class="col-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter OTP" >
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">Approve OTP</button>
                </div>
            </div>
            <div class="text-center mt-3" id="counterDiv"> Resend OTP in <span id="counter"></span></div>`;
    $('#approval_popup_content').append(upd);
    otp_countdown(30);
});

function showToastMsg(typ='secondary', expressionMsg='', subject='', message='' ){
    typ = typ=='success'?'success':'danger';

    let toastMsg = '<div class="toast-header bg-'+typ+' text-white"> <i class="fa fa-info-circle"></i>&nbsp;';
        toastMsg += '<strong class="me-auto"> '+expressionMsg+'</strong><small>'+subject+'</small></div>';
        toastMsg += '<div class="toast-body"> '+message+'! </div>';
    $('.toast').html(toastMsg);
    $('.toast').addClass('show').animate({"top":"25px"}, "slow");
    setTimeout(() => $('.toast').removeClass( "show") , 3000);
}

function otp_countdown(seconds){
    function tick() {
        var counter = document.getElementById("counter");
        seconds--;
        counter.innerHTML =
        "0:" + (seconds < 10 ? "0" : "") + String(seconds);
        if (seconds > 0) {
            setTimeout(tick, 1000);
        } else {
            document.getElementById("counterDiv").innerHTML = `<div class="btn m-1 btn-primary btn-animate-6" id="send_otp"><span class="btntext">Re-Send OTP</span><div class="btninfo bg-success">Click</div></div>`;
        }
    }
    tick();
}

$('body').on('click', '.taskPopupBtn', function(){ 
    $('#tid').val($(this).attr('tid'));
    $('#task_date').val($(this).attr('task_date'));
    $('#task_time').val($(this).attr('task_time'));
    $('#task_detail').val($(this).attr('task_detail'));
    $('#task_title').val($(this).attr('task_title'));
});
function set_task(){ 
    var tid = $('#tid').val()??'';
    var task_date = $('#task_date').val()??'';
    var task_time = $('#task_time').val()??'';
    var task_detail = $('#task_detail').val()??'';
    var task_title = $('#task_title').val()??'';
    var created_by = $('#created_by').val()??'';
    var taskdone = $('#taskdone').is(":checked")?1:0;

    if(task_title!=''&&task_detail!=''&&task_time!=''&&task_date!=''){
        $.post(window.url+'set_task', {tid:tid, task_title:task_title, task_detail:task_detail, task_date:task_date, task_time:task_time, created_by:created_by, taskdone:taskdone}, function(response){ 
            console.log(response);
            if(response.success){
                showToastMsg('success', 'Greate', 'Details updated', response.msg);
                window.location.reload();
            }
         });
    } else {
        $('#email_field_div').append('<div class="alert alert-warning text-center mt-3">All fields are required.</div>');
    }
}
$('body').on('click', '.emailTemplatepopup', function(){ 
    $('#eid').val($(this).attr('eid'));
    $('#content_handler').val($(this).attr('content_handler'));
    $('#content_subject').val($(this).attr('content_subject'));
    $('.summernote').summernote('reset');
    $('.summernote').summernote('editor.pasteHTML', $(this).attr('content_body'));
    if($(this).attr('status')==1){
        $('#status').attr('checked', true);
    } else {
        $('#status').attr('checked', false);
    }
});
function save_email_template(){ 
    var eid = $('#eid').val()??'';
    var content_handler = $('#content_handler').val()??'';
    var content_subject = $('#content_subject').val()??'';
    var content_body = $('.summernote').summernote('code');
    var status = $('#status').prop("checked")==true?1:0;

    if(content_handler!=''&&content_subject!=''&&content_body!=''){
        $.post(window.url+'save_email_template', {eid:eid, content_handler:content_handler, content_subject:content_subject, content_body:content_body, status:status}, function(response){ 
            console.log(response);
            if(response.success){
                
                // $('#eid').val('');
                // $('#content_handler').val('');
                // $('#content_subject').val('');
                // $('.summernote').summernote('reset');
                // $('#status').attr('checked', false);

                showToastMsg('success', 'Greate', 'Details updated', response.msg);
                window.location.reload();
            }
         });
    } else {
        $('#email_field_div').append('<div class="alert alert-warning text-center mt-3">All fields are required.</div>');
    }
}
//update payment
$('body').on('click', '.updatepaymentbtn', function(){  
    $('#cid').val($(this).attr('cid'));
    $('#iid').val($(this).attr('iid'));
    $('#created_by').val($(this).attr('created_by'));
    $('#bank_name').val($(this).attr('bank_name'));
    $('#ifsc').val($(this).attr('ifsc'));
    $('#location').val($(this).attr('location'));
    $('#payment_date').val($(this).attr('payment_date'));
    $('#amount').val($(this).attr('amount'));
    $('#transaction_number').val($(this).attr('transaction_number'));
    $('#notes').val($(this).attr('notes'));
    if($(this).attr('status')==1){
        $('.update_payment_details').css('display', 'none');
    } else {
        $('.update_payment_details').css('display', 'block');
    }
});
$('body').on('click', '.update_payment_details', function(){ 
    var formData = new FormData($('#paymentupdateform')[0]);
    
    formData.append('file', $('#attachment')[0].files[0]); 
    formData.append('case_id', $('#cid').val()); 
    formData.append('installment_id', $('#iid').val()); 
    formData.append('created_by', $('#created_by').val()); 
    formData.append('bank_name', $('#bank_name').val()); 
    formData.append('ifsc', $('#ifsc').val()); 
    formData.append('location', $('#location').val()); 
    formData.append('payment_date', $('#payment_date').val()); 
    formData.append('amount', $('#amount').val()); 
    formData.append('transaction_number', $('#transaction_number').val()); 
    formData.append('notes', $('#notes').val());
   
    $.ajax({
        type:'POST',
        url: window.url+'update_payment_details',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend : function(){
            showLoader();
        },
        success:function(data){
            showToastMsg('success', 'Greate', 'Details Update', 'Your payment information updated.');
            window.location.reload();
        },
        error: function(data){
            console.log("error");
            hideLoader();
        }
    });
   
});
// form type
$('body').on('click', '.formTypeBtn', function(){ 
    $('#fid').val($(this).attr('fid'));
    $('#name').val($(this).attr('name'));
    $('#description').val($(this).attr('description'));
    $('#type option[value="'+$(this).attr('type')+'"]').prop("selected", "selected");
    if($(this).attr('status')==1){
        $('#status').attr('checked', true);
    } else {
        $('#status').attr('checked', false);
    }
});
function save_form_type(){ 
    var fid = $('#fid').val()??'';
    var name = $('#name').val()??'';
    var description = $('#description').val()??'';
    var type = $('#type').find(":selected").val();
    var status = $('#status').prop("checked")==true?1:0;

    if(name!=''&&type){
        $.post(window.url+'save_form_type', {fid:fid, name:name, description:description, type:type, status:status}, function(response){ 
            console.log(response);
            if(response.success){
                showToastMsg('success', 'Greate', 'Details updated', response.msg);
                window.location.reload();
            }
         });
    } else {
        $('#field_div').append('<div class="alert alert-warning text-center mt-3">All fields are required.</div>');
    }
}

function upload_avatar(){
    const [file] = avatar.files
    if (file) {
        cavatar.src = URL.createObjectURL(file)
    }
    $('#saveavatar').css('display', 'block');
}
$('body').on('click', '#saveavatar', function(){ 
    var formData = new FormData($('#avatar_form')[0]);

    // console.log($('#avatar')[0].files[0]);
    formData.append('file', $('#avatar')[0].files[0]); 
    $.ajax({
        type:'POST',
        url: window.url+'upload_avtar',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend : function(){
            showLoader();
        },
        success:function(data){
            $('#saveavatar').css('display', 'none');
            hideLoader();
            showToastMsg('success', 'Greate', 'Image updated', data.msg);
        },
        error: function(data){
            console.log("error");
            hideLoader();
        }
    });
});


function showLoader(){
    $('#loader').addClass('show')
}
function hideLoader(){
    $('#loader').removeClass('show')
}

$('body').on('click', '.invoiceDetailBtn', function(){ 
    let desc = $(this).attr('bank_name')+' : '+$(this).attr('ifsc')+'<br/>';
    desc += $(this).attr('location')+'<br/>';
    desc += $(this).attr('transaction_number')+'<br/>';
    desc += $(this).attr('payment_date')+'<br/>';
    desc += $(this).attr('notes')+'<br/>';
    $('#description').html(desc);
    $('#amount').html("$"+$(this).attr('amount'));

    if($(this).attr('invoice_type')==1){
        let tax_amount = (13 / 100) * $(this).attr('amount');
        $('#tax').html("$"+tax_amount);
        $('#subtotal').html("$"+$(this).attr('amount'));
        $('#total').html("$"+(parseInt($(this).attr('amount'))+parseInt(tax_amount)));
    } else {
        $('#subtotal').html("$"+$(this).attr('amount'));
        $('#total').html("$"+$(this).attr('amount'));
    }

});

$('body').on('click', '.shortcodecopybtn', function(){ 
    document.execCommand("copy");
    $(this).text('copied');
});

$('body').on('click', '.setUserBtn', function(e){
    e.preventDefault();
    var formData = new FormData($('#setUserForm')[0]);

    $.ajax({
        type:'POST',
        url: window.url+'save_subscriber_user_account',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend : function(){
            showLoader();
        },
        success:function(data){ console.log(data);
            if(data.success){
                hideLoader();
                showToastMsg('success', 'Greate', 'Successfully save details', data.msg);
                window.location.reload();
            }
        },
        error: function(data){
            showToastMsg('danger', 'Oops', 'Somthing went wrong', data.msg);
            hideLoader();
        }
    });

});


$.fn.extend({
	print: function() {
        $('#printBtn').css('display', 'none');
		var frameName = 'printIframe';
		var doc = window.frames[frameName];
		if (!doc) {
			$('<iframe>').hide().attr('name', frameName).appendTo(document.body);
			doc = window.frames[frameName];
		}
		doc.document.body.innerHTML = this.html();
		doc.window.print();
		return this;
	}
});
</script>

</body>

</html>





