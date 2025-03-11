<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="mx-2 nav-item dropdown d-flex align-items-center">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="mail"></i>
                        <span class="indicator">4</span>
                    </div>
                </a>
                <div class="py-0 dropdown-menu dropdown-menu-lg dropdown-menu-end"
                    aria-labelledby="alertsDropdown">
                    <div class="dropdown-menu-header">
                        4 New Notifications
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-danger" data-feather="alert-circle"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Update completed</div>
                                    <div class="mt-1 text-muted small">Restart server 12 to complete the
                                        update.</div>
                                    <div class="mt-1 text-muted small">30m ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-warning" data-feather="bell"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Lorem ipsum</div>
                                    <div class="mt-1 text-muted small">Aliquam ex eros, imperdiet
                                        vulputate
                                        hendrerit et.</div>
                                    <div class="mt-1 text-muted small">2h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-primary" data-feather="home"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">Login from 192.186.1.8</div>
                                    <div class="mt-1 text-muted small">5h ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-success" data-feather="user-plus"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">New connection</div>
                                    <div class="mt-1 text-muted small">Christina accepted your request.
                                    </div>
                                    <div class="mt-1 text-muted small">14h ago</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="#" class="text-muted">Show all notifications</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                    data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>


                {{-- PROFILE --}}
                <a class="nav-link d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"
                    style="display: flex; align-items: center;">
                    <div class="d-flex align-items-center dropdown-toggle ">
                        <img src="{{ asset('img/avatars/avatar.jpg') }}" class="rounded avatar img-fluid me-2"
                            alt="Jane Doe" />
                        <div class="px-2 d-flex flex-column">


                            <span class="text-dark fw-bold">{{ Auth::check() }}</span>
                            <span class="fs-6">User</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                            data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="align-middle me-1"
                            data-feather="pie-chart"></i>
                        Analytics</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.html"><i class="align-middle me-1"
                            data-feather="settings"></i>
                        Settings & Privacy</a>
                    <a class="dropdown-item" href="#"><i class="align-middle me-1"
                            data-feather="help-circle"></i> Help
                        Center</a>
                    <div class="dropdown-divider"></div>

                    <form method="POST" class="dropdown-item" action="{{ route('logout') }}">
                        @csrf
                        <a class="block w-full p-0 leading-5 text-gray-700 transition duration-150 ease-in-out text-start hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dropdown-item"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </div>

                <br>

            </li>
        </ul>
    </div>
</nav>
