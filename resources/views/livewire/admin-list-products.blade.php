<div>
    <div class="col-12 col-md-4 ms-auto">
        <div class="input-group mb-3 shadow-sm">
            <input type="text" class="form-control" aria-describedby="basic-addon2" wire:model="search"
                placeholder="Masukkan Nama Product">
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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($products->count())
                    @foreach ($products as $index => $product)
                        <tr>
                            <th scope="row">{{ $products->firstItem() + $index }}</th>
                            <td>{{ $product->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('adminDetailProducts', $product->id) }}"
                                        class="text-decoration-none">
                                        <span class="badge rounded-3 text-bg-info text-white">
                                            Detail
                                        </span>
                                    </a>
                                    <a href="{{ route('adminEditProducts', $product->id) }}"
                                        class="text-decoration-none">
                                        <span class="badge rounded-3 mx-2 text-bg-warning text-white">
                                            Edit
                                        </span>
                                    </a>
                                    <a href="{{ route('adminDeleteProducts', $product->id) }}"
                                        class="text-decoration-none">
                                        <span class="badge rounded-3 text-bg-danger text-white">
                                            Delete
                                        </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">Product Tidak Ada</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
