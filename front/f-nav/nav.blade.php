<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt=""
                    height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt=""
                    height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt=""
                    height="17">
            </span>
        </a>
        <button type="button"
            class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards"
                        data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span
                            data-key="t-dashboards">Courses</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('StudentCourses') }}"
                                    class="nav-link" data-key="t-analytics">
                                    View all Courses </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Application Status </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Lectures Timetable </a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Live Lectures Links</a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Course Instructors</a>
                            </li>


                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards"
                        data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i
                            class=" bx bx-book-open
                        "></i>
                        <span data-key="t-dashboards">Course Materials</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Course Resources </a>
                            </li>





                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards"
                        data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i
                            class=" bx bx-caret-right-square
                        "></i>
                        <span data-key="t-dashboards">Attempt Tests</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Modular Tests </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Practical Tests </a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Post-Tests </a>
                            </li>




                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards"
                        data-bs-toggle="collapse" role="button"
                        aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class=" bx bx-certification "></i>
                        <span data-key="t-dashboards">Test Results</span>
                    </a>
                    <div class="collapse menu-dropdown"
                        id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Certifications </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Pre-Tests </a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Modular-Tests </a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Practical-Tests </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Post-Tests </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Scoreboard </a>
                            </li>




                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards"
                        data-bs-toggle="collapse" role="button"
                        aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i
                            class="  bx bx-user-pin
                        "></i>
                        <span data-key="t-dashboards">Student Console</span>
                    </a>
                    <div class="collapse menu-dropdown"
                        id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Progress Report </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Student Feedback</a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                    data-key="t-analytics">
                                    Student Account </a>
                            </li>





                        </ul>
                    </div>
                </li>
                <!-- end Dashboard Menu -->



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
