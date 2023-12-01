<div class="row align-items-center justify-content-end g-3">
    <div class="col-1">
        <div class="fs-6 fw-bold">{{ auth()->user()->first_name }}</div>
    </div>
    <div class="col-1">
        <a href="{{ route('logout') }}" class="text-decoration-none fs-6">Logout</a>
    </div>
</div>
