<nav class="navbar navbar-expand navbar-light navbar-bg sticky-top">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

<div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="mx-2 nav-item dropdown d-flex align-items-center">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="mail"></i>
                        <span class="indicator">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span> <!-- Jumlah notifikasi -->
                    </div>
                </a>

                <div class="py-0 dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="alertsDropdown">
                    <div class="dropdown-menu-header">
                        {{ auth()->user()->unreadNotifications->count() }} Notifikasi Surat
                    </div>
                    <div class="list-group">
                        @foreach (auth()->user()->unreadNotifications as $notif)
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">

                                <!-- <div class="col-2">
                                    <i class="text-success" data-feather="check-circle"></i>
                                </div> -->
                                <div class="col-10">
                                    <div class="text-dark">{{ $notif->data['title'] }}</div>
                                    <div class="mt-1 text-muted small">
                                        {{ $notif->data['body'] }}
                                    </div>
                                    <div class="mt-1 text-muted small">

                                        {{ $notif->created_at->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <button class="btn-delete-notif" data-id="{{ $notif->id }}" title="Hapus Notifikasi" style="background: none; border: none; color: red;">🗑️</button>
                                </div>
                            </div>
                        </a>
                        @endforeach

                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="{{ route('notif-mhs') }}" class="text-muted">Lihat semua notifikasi</a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>


                {{-- PROFILE --}}
                <a class="nav-link d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"
                    style="display: flex; align-items: center;">
                    <div class="d-flex align-items-center dropdown-toggle">
                        {{-- <img src="{{ asset('img/avatars/avatar.jpg') }}" class="rounded avatar img-fluid me-2"
                            alt="Jane Doe" /> --}}
                        <div class="px-2 d-flex flex-column">


                            <span class="text-end text-dark fw-bold">{{ auth()->user()->name }}</span>
                            <span class="text-end fs-6">
                                {{ auth()->user()->getRole?->name_role ?? 'No Role' }}
                            </span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="align-middle me-1"
                            data-feather="user"></i> Profile</a>
                    <div class="dropdown-divider"></div>

                    {{-- <a class="dropdown-item" href="index.html"><i class="align-middle me-1"
                            data-feather="settings"></i>
                        Settings & Privacy</a>
                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help
                        Center</a>
                    <div class="dropdown-divider"></div> --}}

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
