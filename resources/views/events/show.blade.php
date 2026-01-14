<x-layouts.app>
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-4">{{ $event->judul }}</h1>

        @foreach($event->tikets as $tiket)
        <form method="POST" action="{{ route('orders.store') }}"
              class="border p-4 mb-4 rounded">
            @csrf

            <input type="hidden" name="tiket_id" value="{{ $tiket->id }}">

            <p><b>{{ ucfirst($tiket->tipe) }}</b></p>
            <p>Harga: Rp {{ number_format($tiket->harga) }}</p>
            <p>Stok: {{ $tiket->stok }}</p>

            <button class="btn btn-success mt-2"
                {{ $tiket->stok <= 0 ? 'disabled' : '' }}>
                Beli Tiket
            </button>
        </form>
        @endforeach
    </div>
</x-layouts.app>
