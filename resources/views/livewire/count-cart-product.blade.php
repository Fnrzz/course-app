<div>
    <div class="card rounded-4">
        <div class="card-body">
            <h6 class="mt-2">Langganan :</h6>
            <div class="row g-2">
                @foreach ($products->subscribes as $subscribe)
                    <div class="col-6">
                        <button wire:click="countSubscribe({{ $subscribe->price }},{{ $subscribe->id }})"
                            class="btn shadow-sm {{ $this->subscribe_id == $subscribe->id ? 'btn-brown' : '' }} btn-brown-active w-100">
                            {{ $subscribe->name }}
                        </button>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h5>Harga : Rp.{{ number_format($price, 0, ',', '.') }}</h5>
                </div>
            </div>
            <div class="row mt-3">
                @if (auth()->check())
                    <button class="btn btn-brown rounded-4" wire:click="checkout()">Beli Paket</button>
                @else
                    <a href="{{ route('login') }}" class="btn btn-brown rounded-4">Beli Paket</a>
                @endif
            </div>
        </div>
    </div>
</div>
