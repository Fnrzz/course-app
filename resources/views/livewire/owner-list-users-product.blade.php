<div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->count())
                    @foreach ($data as $dt)
                        @if ($dt->payment && $dt->payment->status == 'Terverifikasi')
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $dt->user->first_name }}</td>
                                <td>{{ $dt->user->email }}</td>
                                <td>
                                    <a href="{{ route('ownerDetailTransactionUser', $dt->no_transactions) }}"
                                        class="btn btn-info btn-sm rounded-4">Detail</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">User Tidak Ada</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
