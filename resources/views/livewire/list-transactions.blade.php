<div>
    <div class="col-12 col-md-4 ms-auto">
        <div class="input-group mb-3 shadow-sm">
            <input type="date" class="form-control" aria-describedby="basic-addon2" wire:model="search">
            <span class="input-group-text bg-success text-white " id="basic-addon2">
                <div>
                    <i class="bi bi-search"></i>
                </div>
            </span>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="table-head">
                <tr>
                    <th scope="col">No Transaksi</th>
                    <th scope="col">Nama Lembaga Kursus</th>
                    <th scope="col">Nama Kursus</th>
                    <th scope="col">Langganan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-body">
                @if ($transactions->count())
                    @foreach ($transactions as $index => $transaction)
                        <tr>
                            <th scope="row">{{ $transaction->no_transactions }}</th>
                            <td>{{ $transaction->product->courses->name }}</td>
                            <td>{{ $transaction->product->name }}</td>
                            <td>{{ $transaction->subscribe->name }}</td>
                            <td>{{ $transaction->payment ? $transaction->payment->status : 'Belum Dibayar' }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('detailTransaction', $transaction->no_transactions) }}"
                                        class="text-decoration-none">
                                        <span class="badge rounded-3 text-bg-info text-white">
                                            Detail
                                        </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Transaksi Tidak Ada</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
</div>
