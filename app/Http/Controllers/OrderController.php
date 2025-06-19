<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Catalog;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('catalog')->get();
        return view('orders.index', compact('orders'));
    }

    // Update status pesanan
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Status pesanan diperbarui.');
    }

      // Hapus pesanan
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }

   public function store(Request $request)
    {
        $request->validate([
            'katalog_id' => 'required|exists:catalogs,id',
            'email_pemesan' => 'required|email',
        ]);

        \App\Models\Order::create([
            'katalog_id' => $request->katalog_id,
            'email_pemesan' => $request->email_pemesan,
            'tanggal_pesan' => now(),
            'status' => 'Menunggu',
        ]);

        return redirect('/')->with('success', 'Pesanan berhasil dikirim.');
    }

    public function checkStatus()
    {
        return view('orders.check');
    }

    public function showStatus(Request $request)
    {
        $request->validate([
            'email_pemesan' => 'required|email',
        ]);

        $orders = \App\Models\Order::where('email_pemesan', $request->email_pemesan)->with('catalog')->get();

        return view('orders.check', compact('orders'))->with('email', $request->email_pemesan);
    }
}
