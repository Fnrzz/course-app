<nav class="navbar navbar-expand-lg bg-white sticky-top shadow">
    <div class="container">
        <div class="d-flex align-items-center">
            <img src="{{ asset('/image/logo.png') }}" alt="logo.png" style="width: 50px">
            <a class="navbar-brand fw-bold ms-3 fs-6" href="#">Go-Course</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('courses') ? 'active' : '' }}"
                        href="{{ route('courses') }}">Kursus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('aboutWe') ? 'active' : '' }}" href="{{ route('aboutWe') }}">Tentang
                        Kami</a>
                </li>
                @if (auth()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle "></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="{{ route('transactions') }}">Transaksi</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ auth()->user()->role == 1 ? route('adminDashboard') : route('profile') }}">{{ auth()->user()->first_name }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-sm btn-success rounded-5 fw-bold px-3 mt-1" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
