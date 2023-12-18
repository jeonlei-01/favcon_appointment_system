<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

    <!-- Custom CSS -->
    <link href="{{ asset('css/admin_css/home.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">
</head>

<body>

    <div class="grid-container">



        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">

            </div>


            <div class="header-right">
                <span class="material-icons-outlined" id="logoutBtn" onclick="toggleDropdown()"> <img
                        src="{{asset ('images/faviodp.jpg' ) }}" alt="Profile"></span>
                <p>{{ Auth::user()->name }}</p>
                <div class="dropdown-content" id="dropdownContent">
                    <!-- <div class="dropdown-item"><a href="">Go to site</a>
                    </div> -->

                    <div class="dropdown-item">
                        <a href="/change-password">Change Password</a>
                    </div>




                    <div class="dropdown-item" id="logoutButton">Logout</div>

                    <!-- ------- for the logoutmodal ---------- -->

                    <div class="overlay" id="overlay"></div>
                    <div class="modal" id="modal">
                        <p>Are you sure you want to logout?</p>
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                        <button id="CLogout">Cancel</button>
                    </div>
                </div>
            </div>



        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo">
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="admin-dashboard">
                        <span class="material-icons-outlined">fact_check</span> Dashboard
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="service-dashboard">
                        <span class="material-icons-outlined">work</span> Service
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="schedule-dashboard">
                        <span class="material-icons-outlined">task</span> Schedule
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="appointment-dashboard" class="active">
                        <span class="material-icons-outlined">poll</span> Appointment
                    </a>
                </li>

                <li class="sidebar-list-item" class="active">
                    <a href="timeslot-dashboard">
                        <span class="material-icons-outlined">list</span> Timeslots
                    </a>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->



        <!-- Main -->
        <div class="main-container">

            <div id="main">


                <br>
                <div class="col-div-1">

                    <div class="box-8">
                        <div class="content-box">
                            <p>Appointment Status</p>
                            <br />
                            <table>
                                <tr>
                                    <th style="color:#ffae3d; font-weight:300px;">Pending</th>
                                    <th style="color:#ff8c2e; font-weight:300px;">Confirmed</th>
                                    <th style="color:#f05d35; font-weight:300px;">Canceled</th>
                                </tr>
                                <tr>
                                    <td><strong>{{ $pendingCount }}</strong></td>
                                    <td><strong>{{ $approvedCount }}</strong></td>
                                    <td><strong>{{ $rejectedCount }}</strong></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>





                <div class="clearfix"></div>
                <br /><br />


                <div class="col-div-8">
                    <div style="border-radius: 10px;" class="box">
                        <span
                            style="color: #ff7c03; font-size: 17px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: 600;">
                            <br> &nbsp;&nbsp; &nbsp;   Upcoming Appointments
                       
                        <br><br>
                        <table>
                            <!-- <tr>
                                    <th style="color:#ffae3d; font-weight:300px;">Name</th>
                                    <th style="color:#ff8c2e; font-weight:300px;">Time</th>
                                    <th style="color:#f05d35; font-weight:300px;">Status</th>
                                </tr> -->

                            @foreach ($upcomingAppointments as $appointment)

                            <tr>
                                <td style="color:   #ff7c03;font-size:12px">{{ $appointment->name }}</td>
                                <td style="color:   #ff7c03;font-size:12px">{{ $appointment->timeslot->start_time }}
                                <td style="color:   #ff7c03;font-size:12px">{{ $appointment->status }}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="col-div-4">
                    <div class="box-   ">

                        <div class="wrapper">
                            <header>
                                <p class="current-date"></p>
                                <div class="icons">
                                    <span id="prev" class="material-symbols-rounded">chevron_left</span>
                                    <span id="next" class="material-symbols-rounded">chevron_right</span>
                                </div>
                            </header>
                            <div class="calendar">
                                <ul class="weeks">
                                    <li>Sun</li>
                                    <li>Mon</li>
                                    <li>Tue</li>
                                    <li>Wed</li>
                                    <li>Thu</li>
                                    <li>Fri</li>
                                    <li>Sat</li>
                                </ul>
                                <ul class="days"></ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div><br><br>
                </b>

                <br>
                <!-- <div class="col-div-3">
                    <div class="box">
                        <p>67<br /><span
                                style="color: green;font-size: 16px;font-family:Verdana, Geneva, Tahoma, sans-serif;font-weight: 600;">Done</span>
                        </p>
                        <i class="fa fa-check-circle box-icon"></i>
                    </div>
                </div>
                <div class="col-div-3">
                    <div class="box">
                        <p>88<br /><span
                                style="color: red;font-size: 16px;font-family:Verdana, Geneva, Tahoma, sans-serif;font-weight: 600;">Reject</span>
                        </p>
                        <i class="fa fa-ban box-icons"></i>
                    </div>
                </div> -->

                <div class="clearfix"></div>
            </div>

        </div>
        <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/admin_js/home.js') }}"></script>
</body>

</html>