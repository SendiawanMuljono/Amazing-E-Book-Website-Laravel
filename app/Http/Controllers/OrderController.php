<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function rentToCart($ebookId){
        $order = new Order();
        $order->account_id = Auth::guard('account')->user()->account_id;
        $order->ebook_id = $ebookId;
        $order->order_date = Carbon::now();
        $order->save();

        return redirect()->back()->with('message', 'E-Book Added to Cart');
    }

    public function viewCart(){
        $account_id = Auth::guard('account')->user()->account_id;
        $orders = Order::where('account_id', $account_id)->get();
        return view('cart', [
            'title' => 'Cart',
            'orders' => $orders
        ]);
    }

    public function deleteFromCart($orderId){
        $order = Order::where('order_id', $orderId)->first();

        $order->delete();
        return redirect()->back()->with('message', 'Successfully deleted from cart');
    }

    public function checkout(){
        $account_id = Auth::guard('account')->user()->account_id;
        $orders = Order::where('account_id', $account_id)->get();
        foreach($orders as $order){
            $order->delete();
        }
        return redirect('/cart/checkout/success');
    }

    public function viewCheckoutSuccess(){
        return view('checkoutsuccess', [
            'title' => 'Success',
        ]);
    }
}
