<div>
    <div class="col-12 col-md-4 ms-auto">
        <div class="input-group mb-3 shadow-sm">
            <input type="text" class="form-control" aria-describedby="basic-addon2" wire:model="search"
                placeholder="Masukkan Email User">
            <span class="input-group-text bg-success text-white " id="basic-addon2">
                <div>
                    <i class="bi bi-search"></i>
                </div>
            </span>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status Transaksi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->count())
                    @foreach ($users as $index => $user)
                        <tr>
                            <th scope="row">{{ $users->firstItem() + $index }}</th>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->transactions->count())
                                    Ada Transaksi
                                @else
                                    Belum Transaksi
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('adminDetailUser', $user->id) }}" class="text-decoration-none">
                                        <span class="badge rounded-3 text-bg-info text-white">
                                            Detail
                                        </span>
                                    </a>
                                </div>
                            </td>
                    @endforeach
                    </tr>
                @else
                    <tr>
                        <td colspan="4" class="text-center">User Tidak Ada</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
