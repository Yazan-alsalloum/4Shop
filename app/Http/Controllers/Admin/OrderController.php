<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_rule;
use DB;
use Mail;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders')
                ->with('orders', Order::all());
    }

    public function show(Order $order)
    {
        return view('admin.order')->with(compact('order'));
    }

    public function destroy(Order $order, Request $request)
    {
        $order->delete();
        $request->session()->flash('status', ['success', 'Bestelling verwijderd!']);
        return redirect()->route('admin.orders.index');
    }

    public function factory()
    {
        $rules = Order_rule::
            select(DB::raw('count(id) AS count, description, size'))
            ->whereRaw('order_id IN (SELECT id FROM orders WHERE payed = 1) AND description <> \'Keycord\' ')
            ->groupBy('description', 'size')->get();

        return view('admin.factory')
                ->with(compact('rules'));
    }

    public function mail()
    {
        return view('admin.mail')
                ->with('orders', Order::where('payed', true)->get());
    }

    public function mail_send(Request $request)
    {
        $orders = Order::where('payed', true)->get();
        $pickup = $request->pickup;

        foreach($orders as $order)
        {
            Mail::to($order->email)->send(new \App\Mail\OrderReady($order, $pickup));
        }
    }

    public function packing(Request $request)
    {
        $orders = Order::where('payed', true)->get();
        return view('admin.packing')
                ->with(compact('orders'));
    }
    public function toggle(Order $order)
    {
        // Keer de bezorgstatus om
        $order->update(['delivered' => !$order->delivered]);

        // Redirect terug naar de vorige pagina
        return redirect()->route('admin.orders.index');
    }

}
