<x-layouts.admin title="History Pembelian">
    <div class="container mx-auto p-10">
        <div class="flex">
            <h1 class="text-3xl font-semibold mb-4">History Pembelian</h1>
        </div>
        <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Event</th>
                        <th>Tanggal Pembelian</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
@forelse ($orders as $index => $order)
    <tr>
        <th>{{ $index + 1 }}</th>
        <td>{{ $order->user->name }}</td>

        <td>
            @foreach($order->detailOrders as $detail)
                <div>
                    {{ $detail->tiket->event->judul }}
                    ({{ ucfirst($detail->tiket->tipe) }})
                </div>
            @endforeach
        </td>

        <td>{{ $order->created_at->format('d M Y') }}</td>

        <td>
            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
        </td>

        <td>
            <a href="{{ route('admin.histories.show', $order->id) }}"
               class="btn btn-sm btn-info text-white">
                Detail
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">
            Tidak ada history pembelian tersedia.
        </td>
    </tr>
@endforelse
</tbody>

            </table>
        </div>
    </div>
</x-layouts.admin>
