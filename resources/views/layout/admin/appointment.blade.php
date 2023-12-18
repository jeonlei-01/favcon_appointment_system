<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Appointments Dashboard</title>
    <!-- Montserrat Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/admin_css/appointment.css') }}" rel="stylesheet">
    <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    
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
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">Appointment Table</p>
            </div>
            <div class="charts">
                <div class="charts-card">

                    <form action="{{ route('request.form', ['id'=>1]) }}" method="POST" id="appointment">
                        @csrf
                        <input type="hidden" value="" id="input" name="status">

                    </form>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Service</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Notes</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>


                        @foreach ($appointments as $appointment)
                        <tr id="{{$appointment->id}}">
                            <td>{{$appointment->schedule->date}}</td>
                            <td>{{$appointment->timeslot->start_time}}</td>
                            <td>{{$appointment->timeslot->end_time}}</td>
                            <td>{{$appointment->service->type}}</td>
                            <td>{{$appointment->name}}</td>
                            <td>{{$appointment->email}}</td>
                            <td>{{$appointment->address}}</td>
                            <td>{{$appointment->phone_no}}</td>
                            <td>{{$appointment->notes}}</td>
                            <td>{{$appointment->status}}</td>
                            <td>
                                @if ($appointment->status === 'Pending')
                                <button class="approved" onClick="approved(this)">Approve</button>
                                <button class="reject" onClick="reject(this)">Reject</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>

            </div>
        </main>
        <!-- End Main -->

        <!--for the Confirmation Modal-->
        <div class="overlay" id="confirmationOverlay"></div>
        <div class="modal" id="confirmationModal">
            <p>Are you sure you want to decline this appointment?</p>
            <button id="confirmReject">Yes</button>
            <button id="cancelReject">No</button>
        </div>
        <!-- end for the Confirmation Modal-->

        <!--for the loader-->
        <div id="loader" class="loader">
            <div class="loader-spinner"></div>
            <div class="loader-text">Please wait for a moment</div>
        </div>


        <!---------------->

        <script>
            function toggleButtons(appointmentId, status) {
                let approveButton = document.querySelector(`#${appointmentId} .approved`);
                let rejectButton = document.querySelector(`#${appointmentId} .reject`);

                if (status === 'Pending') {
                    approveButton.style.display = 'inline-block';
                    rejectButton.style.display = 'inline-block';
                } else {
                    approveButton.style.display = 'none';
                    rejectButton.style.display = 'none';
                }
            }

            function approved(e) {
                console.log("Approved is clicked.");
                let num = e.parentNode.parentNode.id
                let form = document.getElementById("appointment");
                // let action = form.getAttribute("action");
                let id = window.origin + '/update/' + num;
                let set = form.setAttribute("action", id);
                let status = document.getElementById('input').value = 'Approved'

                // Show the loader while waiting for the form submission to complete
                let loader = document.getElementById('loader');
                loader.style.display = 'block';

                form.submit();
            }
            function showConfirmationModal(appointmentId) {
                const overlay = document.getElementById('confirmationOverlay');
                const modal = document.getElementById('confirmationModal');

                overlay.style.display = 'block';
                modal.style.display = 'block';

                const confirmRejectButton = document.getElementById('confirmReject');
                const cancelRejectButton = document.getElementById('cancelReject');

                confirmRejectButton.addEventListener('click', function () {
                    // Show the loader while waiting for the status update
                    let loader = document.getElementById('loader');
                    loader.style.display = 'block';

                    // Update the appointment status and submit the form
                    let form = document.getElementById("appointment");
                    let statusInput = document.getElementById('input');
                    statusInput.value = 'Rejected'; // Set the new status

                    // Update the form action to the appropriate URL
                    let action = window.origin + '/update/' + appointmentId;
                    form.setAttribute("action", action);

                    // Submit the form
                    form.submit();

                    // After handling the rejection, close the modal
                    overlay.style.display = 'none';
                    modal.style.display = 'none';
                });

                cancelRejectButton.addEventListener('click', function () {
                    overlay.style.display = 'none';
                    modal.style.display = 'none';
                });
            }
            function reject(e) {
                console.log("Reject is clicked.");
                let num = e.parentNode.parentNode.id;
                showConfirmationModal(num);
            }
            document.addEventListener('DOMContentLoaded', function () {
                @foreach($appointments as $appointment)
                toggleButtons('{{$appointment->id}}', '{{$appointment->status}}');
                @endforeach
            });
//----------------------------------------------------------------------


        </script>

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/admin_js/appointment.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- <script src="{{ asset('js/admin_js/logout.js') }}"></script> -->

</body>

</html>