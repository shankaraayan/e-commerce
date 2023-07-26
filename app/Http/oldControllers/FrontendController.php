<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class FrontendController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('pages.homepage', compact('products'));
    }


    public function cart()
    {
        return view('cart');
    }

   public function addToCart(Request $request)
    {
        $id = @$request->id;
        if (!empty($id)) {
            $product = Product::Find($id);
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
                $message = "Product Updated to Cart";
            } else {
                $cart[$id] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->thumb_image
                ];
                $message = "Product Added to Cart";
            }
            session()->put('cart', $cart);
            $data = count((array) session('cart'));
            $arr = array('message' => $message, 'data' => $data, 'status' => true);
        } else {
            $arr = array('message' => "Product not found", 'data' => [], 'status' => false);
        }

        echo json_encode($arr);
    }

    public function add_to_wishlist(Request $request)
    {
        $id = @$request->id;
        $product = Product::Find($id);

        $cart = session()->get('wishlist', []);

        if (isset($wishlist[$id])) {
            $wishlist[$id]['quantity']++;
            $message = "Product Updated to wishlist";
        } else {
            $wishlist[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->thumb_image
            ];
            $message = "Product Added to wishlist";
        }

        session()->put('wishlist', $cart);
        $data = count((array) session('wishlist'));
        $arr = array('message' => $message, 'data' => $data, 'status' => true);
        echo json_encode($arr);
    }

    public function update_cart_value(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
        return view('elements.cart_data');
    }

    public function remove_to_cart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
        return view('elements.cart_data');
    }




    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return view('pages.cart_model');
        }
    }

    public function get_all_cart_value()
    {
        return view('pages.cart_model');
    }

    public function checkout(Request $request)
    {

        if ($request->isMethod('post')) {
            // $request->validate([
            //     'name' => 'required',
            //     'email' => 'required|email',
            //     'address' => 'required',
            //     'city' => 'required',
            //     'state' => 'required',
            //     'zip' => 'required|numeric',
            // ]);
            $data = [];
            $order  = new Order;

            $order->billing_details = json_encode($request->all());
            $order->product_details = json_encode(session('cart'));
            $order->order_id = rand(10, 100000);
            $order->transaction_id = rand(1000, 999999);

            $order->save();
            session()->flush();
            return redirect(url('order_confirmation/'.$order['id']))->with('success', 'Thanks for the Order');
        }
        return view('pages.checkout');
    }

    public function reduse_product_qty()
    {
        if (session('cart')) {
            foreach (session('cart') as $id => $details) {
                $find_id =  Product::find($id);
                if ($find_id) {
                    $find_id->qty =  $find_id['qty'] - $details->qty;
                    $find_id->save();
                    return $find_id;
                }
            }
        }
    }


    public function order_confirmation($id)
    {
        $order = Order::find($id);
        if ($id) {
            return view('pages.order_confirmation',compact('order'));
        } else {
            session()->flush();
            return redirect(url('cart'))->with('success', 'Thanks for the Order');
        }
    }
}
