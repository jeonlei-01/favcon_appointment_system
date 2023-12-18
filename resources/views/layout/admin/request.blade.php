<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Requests Dashboard</title>

    <!-- Montserrat Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/admin_css/request.css') }}" rel="stylesheet">
</head>

<body>
    <div class="grid-container">

        <!-- The modal -->
        <!-- <div id="logoutModal" class="modal">
            <div class="modal-content">
                <h2>Logout</h2>
                <p>Are you sure you want to logout?</p>
                <button id="confirmLogout">Logout</button>
                <button id="cancelLogout">Cancel</button>
            </div>
        </div> -->

        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">

            </div>
            <div class="header-right">
                <span class="material-icons-outlined" id="logoutBtn" onclick="toggleDropdown()"> <img
                        src="{{ asset('images/favio.png') }}" alt="Profile"></span>
                <div class="dropdown-content" id="dropdownContent">
                    <div class="dropdown-item"><a href="">Go to site</a>
                    </div>

                    <div class="dropdown-item"><a href="#">Change Pass</a>
                    </div>

                    <div class="dropdown-item"><a href="logoutTest.html">Logout</a>
                    </div>

                </div>
            </div>
        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="material-icons-outlined">inventory</span> Favio's Inventory
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
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
                    <a href="request-dashboard" class="active">
                        <span class="material-icons-outlined">fact_check</span> Request
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="appointment-dashboard">
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
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">Request Table </p>
            </div>
            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">
                    <div class="row">
                        <div class="column">
                            <h2>date</h2>
                            <p>Some text..</p>
                        </div>
                        <div class="column">
                            <h2>start_time</h2>
                            <p>Some text..</p>
                        </div>
                        <div class="column">
                            <h2>end_time</h2>
                            <p>Some text..</p>
                        </div>
                        <div class="column" id="action">
                            <h2>action</h2>

                            <div class="action-container">
                                <button class="action-button" id="accept-btn">
                                    <i class="fa fa-check"></i> Accept
                                </button>
                                <button class="action-button" id="decline-btn">
                                    <i class="fa fa-times"></i> Decline
                                </button>
                                <button class="open-modal-btn-request" id="setting-btn">
                                    <i class="fa fa-gear"></i>
                                </button>

                                <!-- ---- for the modal on request----- -->
                                <div class="modalRequest">
                                    <div class="modal-request">
                                        <span class="close-modal-btn">&times;</span>
                                        <div class="table">
                                            <h2> Request Form</h2>
                                            <form action="">
                                                <div class="tableRequest">
                                                    <div class="Rdate">
                                                        <p>date</p>
                                                        <div class="review">
                                                            2023 - 06 -01
                                                        </div>
                                                    </div>

                                                    <div class="startTime">
                                                        <p>start_time</p>
                                                        <div class="review">
                                                            08 : 00 : 00
                                                        </div>

                                                    </div>

                                                    <div class="endTime">
                                                        <p>end_time</p>
                                                        <div class="review">
                                                            12 : 00 : 00
                                                        </div>
                                                    </div>

                                                    <div class="available">
                                                        <p>available</p>
                                                        <div class="review">
                                                            2023 - 05 -25 / 09:00:00
                                                        </div>
                                                    </div>

                                                    <div class="buttonsRccs" id="buttonsRccs">
                                                        <!-- <button class="close-modal-btn">
                                                            Close
                                                        </button> -->
                                                        <button>
                                                            Compose
                                                        </button>
                                                        <button>
                                                            Send
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="action-container">
                                <button class="action-button" id="accept-btn">
                                    <i class="fa fa-check"></i> Accept
                                </button>
                                <button class="action-button" id="decline-btn">
                                    <i class="fa fa-times"></i> Decline
                                </button>
                                <button class="open-modal-btn-request1" id="setting-btn">
                                    <i class="fa fa-gear"></i>
                                </button>

                                <!-- ---- for the modal on request----- -->
                                <div class="modalRequest1">
                                    <div class="modal-request">
                                        <span class="close-modal-btn">&times;</span>
                                        <div class="table">
                                            <h2> Request Form</h2>
                                            <form action="">
                                                <div class="tableRequest">
                                                    <div class="Rdate">
                                                        <p>date</p>
                                                        <div class="review">
                                                            2023 - 06 -01
                                                        </div>
                                                    </div>

                                                    <div class="startTime">
                                                        <p>start_time</p>
                                                        <div class="review">
                                                            08 : 00 : 00
                                                        </div>

                                                    </div>

                                                    <div class="endTime">
                                                        <p>end_time</p>
                                                        <div class="review">
                                                            12 : 00 : 00
                                                        </div>
                                                    </div>

                                                    <div class="available">
                                                        <p>available</p>
                                                        <div class="review">
                                                            2023 - 05 -25 / 09:00:00
                                                        </div>
                                                    </div>

                                                    <div class="buttonsRccs" id="buttonsRccs">
                                                        <!-- <button class="close-modal-btn">
                                                            Close
                                                        </button> -->
                                                        <button>
                                                            Compose
                                                        </button>
                                                        <button>
                                                            Send
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="action-container">
                                <button class="action-button" id="accept-btn">
                                    <i class="fa fa-check"></i> Accept
                                </button>
                                <button class="action-button" id="decline-btn">
                                    <i class="fa fa-times"></i> Decline
                                </button>
                                <button class="open-modal-btn-request2" id="setting-btn">
                                    <i class="fa fa-gear"></i>
                                </button>

                                <!-- ---- for the modal on request----- -->
                                <div class="modalRequest">
                                    <div class="modal-request">
                                        <span class="close-modal-btn">&times;</span>
                                        <div class="table">
                                            <h2> Request Form</h2>
                                            <form action="">
                                                <div class="tableRequest">
                                                    <div class="Rdate">
                                                        <p>date</p>
                                                        <div class="review">
                                                            2023 - 06 -01
                                                        </div>
                                                    </div>

                                                    <div class="startTime">
                                                        <p>start_time</p>
                                                        <div class="review">
                                                            08 : 00 : 00
                                                        </div>

                                                    </div>

                                                    <div class="endTime">
                                                        <p>end_time</p>
                                                        <div class="review">
                                                            12 : 00 : 00
                                                        </div>
                                                    </div>

                                                    <div class="available">
                                                        <p>available</p>
                                                        <div class="review">
                                                            2023 - 05 -25 / 09:00:00
                                                        </div>
                                                    </div>

                                                    <div class="buttonsRccs" id="buttonsRccs">
                                                        <!-- <button class="close-modal-btn">
                                                            Close
                                                        </button> -->
                                                        <button>
                                                            Compose
                                                        </button>
                                                        <button>
                                                            Send
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="action-container">
                                <button class="action-button" id="accept-btn">
                                    <i class="fa fa-check"></i> Accept
                                </button>
                                <button class="action-button" id="decline-btn">
                                    <i class="fa fa-times"></i> Decline
                                </button>
                                <button class="open-modal-btn-request3" id="setting-btn">
                                    <i class="fa fa-gear"></i>
                                </button>

                                <!-- ---- for the modal on request----- -->
                                <div class="modalRequest">
                                    <div class="modal-request">
                                        <span class="close-modal-btn">&times;</span>
                                        <div class="table">
                                            <h2> Request Form</h2>
                                            <form action="">
                                                <div class="tableRequest">
                                                    <div class="Rdate">
                                                        <p>date</p>
                                                        <div class="review">
                                                            2023 - 06 -01
                                                        </div>
                                                    </div>

                                                    <div class="startTime">
                                                        <p>start_time</p>
                                                        <div class="review">
                                                            08 : 00 : 00
                                                        </div>

                                                    </div>

                                                    <div class="endTime">
                                                        <p>end_time</p>
                                                        <div class="review">
                                                            12 : 00 : 00
                                                        </div>
                                                    </div>

                                                    <div class="available">
                                                        <p>available</p>
                                                        <div class="review">
                                                            2023 - 05 -25 / 09:00:00
                                                        </div>
                                                    </div>

                                                    <div class="buttonsRccs" id="buttonsRccs">
                                                        <!-- <button class="close-modal-btn">
                                                            Close
                                                        </button> -->
                                                        <button>
                                                            Compose
                                                        </button>
                                                        <button>
                                                            Send
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>



                        </div>

                    </div>
                </div>
            </div>


        </main>
        <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/admin_js/request.js') }}"></script>
</body>

</html>