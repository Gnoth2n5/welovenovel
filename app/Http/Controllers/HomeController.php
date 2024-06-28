<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductOrder;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function showMessage($message, $type)
    {
        toastr()
            ->timeOut(5000)
            ->newestOnTop(true)
            ->closeOnHover(true)
            ->closeDuration(2)
            ->closeButton(true)
            ->$type($message);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $product = Products::all();
        return view('home.index', compact('product'));
    }

    public function product_detail($id)
    {
        $product = Products::find($id);
        return view('home.product_detail', compact('product'));
    }

    public function view_cart()
    {
        $userId = $this->getUserId();
        $cart = Cart::where('user_id', $userId)->get();
        return view('home.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('id');
            $user_id = $this->getUserId();
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->product_id = $product_id;
            $cart->save();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function removeFromCart($id)
    {
        try {
            $cart = Cart::find($id);
            if ($cart) {
                $cart->delete();
                $this->showMessage('Remove Product Successfully', 'addSuccess');
                return redirect()->back();
            } else {
                $this->showMessage('Remove Product Failed', 'addError');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            $this->showMessage($e->getMessage(), 'addError');
            return redirect()->back();
        }
    }



    private function getUserId()
    {
        return Auth::user()->id;
    }

    public function view_order(Request $request)
    {
        $total = $request->input('total_price');

        return view('home.order', compact('total'));
    }

    public function createOrder(Request $request)
    {
        $user_id = $this->getUserId();

        $order = new Order;
        $order->UserId = $user_id;
        $order->OrderDate = date('Y-m-d H:i:s');
        $order->ShippingAddress = $request->shipAddress;
        $order->TotalAmount = $request->totalAmount;
        $order->PaymentMethod = $request->payment;
        $order->ShippingMethod = $request->shipType;
        $order->save();

        $cartItems = Cart::where('user_id', $user_id)->get();

        foreach ($cartItems as $item) {
            $productOrder = new ProductOrder;
            $productOrder->product_id = $item->product_id;
            $productOrder->order_id = $order->id;
            $productOrder->save();
        }

        $this->showMessage('Create Your Order Successfully', 'addSuccess');

        return redirect('view_cart');
    }
}
