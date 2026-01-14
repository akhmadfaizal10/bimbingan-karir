<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $tiket = Tiket::lockForUpdate()->findOrFail($request->tiket_id);

            if ($tiket->stok <= 0) {
                abort(400, 'Stok habis');
            }

          $order = Order::create([
    'user_id' => 1, 
    'nama_pembeli' => 'Regular User',
    'email_pembeli' => null,
    'event_id' => $tiket->event_id, 
    'order_date' => Carbon::now(),
    'total_harga' => $tiket->harga,
     
    'status' => 'paid',
]);

           $jumlah = 1;
$subtotal = $tiket->harga * $jumlah;

DetailOrder::create([
    'order_id' => $order->id,
    'tiket_id' => $tiket->id,
    'jumlah' => $jumlah,
    'subtotal_harga' => $subtotal, 
]);
            $tiket->decrement('stok');
        });

        return redirect()->route('home')
            ->with('success', 'Tiket berhasil dibeli');
    }
}

