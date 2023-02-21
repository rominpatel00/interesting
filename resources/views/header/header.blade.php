    
 @if(session()->get('role')==1):
            <header id="page-topbar">
                @else
                <header id="page-topbar" style="left: 0">
                @endif
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="/users" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/money.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/money.png" alt="" height="20">
                                </span>
                            </a>

                            <a href="/users" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/money.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/money.png" alt="" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="uil-search"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil-search"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                       
                    

                  

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-2.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">@php print_r(session()->get('username')); @endphp</span>
                                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                {{-- <a class="dropdown-item" href="#"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">View Profile</span></a>
                                <a class="dropdown-item" href="#"><i class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">My Wallet</span></a>
                                <a class="dropdown-item d-block" href="#"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Settings</span> <span class="badge bg-soft-success rounded-pill mt-1 ms-2">03</span></a>
                                <a class="dropdown-item" href="#"><i class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Lock screen</span></a> --}}
                                <a class="dropdown-item" href="/logout"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="uil-cog"></i>
                            </button>
                        </div>
            
                    </div>
                </div>
            </header>
            <!-- ========== Left Sidebar Start ========== -->
            @if(session()->get('role')==1):
            <div class="vertical-menu">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="/users" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/money.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/money.png" alt="" height="20">
                        </span>
                    </a>

                    <a href="/users" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/money.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/money.png" alt="" height="20">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div data-simplebar class="sidebar-menu-scroll">

                    
                  
                    
                        <!--- Sidemenu -->
                        <div id="sidebar-menu">
                            <!-- Left Menu Start -->
                            <ul class="metismenu list-unstyled" id="side-menu">
                                <li class="menu-title">Menu</li>

                                {{-- <li>
                                    <a href="/users">
                                        <i class><img src="assets/images/sidebar/users.png" height="20" width="20" alt=""></i><span class="badge rounded-pill bg-primary float-end">01</span>
                                        <span>Dashboard</span>
                                    </a>
                                </li> --}}
                                <li>
                                    <a href="/users" class=" waves-effect">
                                        <i class=""><img src="assets/images/sidebar/user.png" height="20" width="20" alt=""></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="/create-quiz" class=" waves-effect">
                                        <i class=""><img src="assets/images/sidebar/customer.png" height="20" width="20" alt=""></i>
                                        <span>Quiz</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/result" class=" waves-effect">
                                        <i class=""><img src="assets/images/sidebar/results.png" height="20" width="20" alt=""></i>
                                        <span>Result</span>
                                    </a>
                                </li> -->
                                <li>
                                    <a href="/userstype" class=" waves-effect">
                                        <i class=""><img src="assets/images/sidebar/user-type.png" height="20" width="20" alt=""></i>
                                        <span>User Type</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/transaction" class=" waves-effect">
                                        <i class=""><img src="assets/images/sidebar/transaction.png" height="20" width="20" alt=""></i>
                                        <span>Transaction</span>
                                    </a>
                                </li>
                               
                                <li>
                                    <a href="/income" class=" waves-effect">
                                        <i class=""><img src="assets/images/sidebar/income.png" height="20" width="20" alt=""></i>
                                        <span>Income</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/charts" class=" waves-effect">
                                        <i class=""><img src="assets/images/sidebar/chart.png" height="20" width="20" alt=""></i>
                                        <span>Charts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/income" class=" waves-effect">
                                        <i class=""><img src="assets/images/sidebar/report.png" height="20" width="20" alt=""></i>
                                        <span>Reports</span>
                                    </a>
                                </li>
                               
                            </ul>
                    </div>
                    <!-- Sidebar -->
          
                </div>
            </div>
            @endif
            <!-- Left Sidebar End -->

            