<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\PaymentGatwayController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\admin\AttributeTerm;
use App\Models\admin\Slider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use App\Mail\MyTestMail;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Services\UpdateQuantity;
use App\Services\OrderService;
use App\Services\PaymentGatway\PaypalService;
use App\Services\UpdateShipping;
use Illuminate\Http\RedirectResponse;

class FrontendController extends Controller
{

    public function index() // this function is not in use for index or homepage
    {
        $products = Product::all();
        $sliders = Slider::where('global_banner', '!=','1')->get();
        // dd($sliders);
        return view('pages.homepage', compact('products', 'sliders'));
    }


    public function cart()
    {
        return view('cart');
    }

    public function addToCart(Request $request)
    {
        $id = @$request->id;
        $qty = @$request->quantity;
        if (empty($qty))
            $qty = 1;

        $shipping_country = $request->shipping_country ?? country()->where('short_code','DE')->pluck('id')->first();


        $product = Product::Find($id);
        $shipping_class = $product->shipping_class;

        if (!empty($product)) {
            // for single product
            $cart = session()->get('cart', []);
            if ($product['type'] == 'single') {
                if (isset($cart[$id])) {
                    if (!empty($qty))
                        $cart[$id]['quantity'] = $qty;
                    else
                        $cart[$id]['quantity']++;

                    $message = "Product Updated to Cart";
                } else {
                    $cart[$id] = [
                        "quantity" => $qty,
                        'product_id' => $id,
                        "price" => $product['sale_price'],
                        "images" => $product['thumb_image'],
                        "name" => $product['product_name'],
                        "slug" => $product['slug'],
                        "type" => 'single',
                        "solar_product" => $product['solar_product'] ? 'yes' : 'no',
                        "shipping_country" => @$shipping_country,
                        "shipping_class" => @$shipping_class,
                        "bank_trnsfer" => "yes"

                    ];
                    $message = "Product Added to Cart";
                }
            } else {

                $product_details = @$request->product_details;
                $decoded_json = json_decode($product_details);
                $product_price = 0;
                if (!empty($id)) {
                    $cart = session()->get('cart', []);
                    if (isset($cart[$id])) {

                        if (!empty($qty))
                            $cart[$id]['quantity'] = $qty;
                        else
                            $cart[$id]['quantity']++;

                        $item_ids = explode(',', @$decoded_json->termIds);
                        $attributes_price = AttributeTerm::whereIn('id', $item_ids)->sum('price');
                        $details = AttributeTerm::whereIn('id', $item_ids)->pluck('attribute_term_name');
                        $cart[$id]['attribute_ids'] = $item_ids;
                        $cart[$id]['details'] = $details;
                        $cart[$id]['price'] = $product_price + $attributes_price;
                        $cart[$id]['shipping_country'] = $shipping_country;
                        $cart[$id]['product_id'] = $id;
                        $cart[$id]['solar_product'] = $product['solar_product'] ? 'yes' : 'no';
                        $cart[$id]['shipping_class'] = @$shipping_class;
                         $cart[$id]['bank_trnsfer'] = "yes";
                   
                        $message = "Product Updated to Cart";
                    } else {
                        $item_ids = explode(',', @$decoded_json->termIds);
                        $attributes_price = AttributeTerm::whereIn('id', $item_ids)->sum('price');
                        $details = AttributeTerm::whereIn('id', $item_ids)->pluck('attribute_term_name');
                    
                        $cart[$id] = [
                            "quantity" => $qty,
                            "price" => $product_price + $attributes_price,
                            "details" => $details,
                            "attribute_ids" => $item_ids,
                            "images" => $product['thumb_image'],
                            "name" => $product['product_name'],
                            "slug" => $product['slug'],
                            "type" => 'variable',
                            "shipping_country" => $shipping_country,
                            "product_id" => $id,
                            "shipping_class" => @$shipping_class,
                            "solar_product" => @$product['solar_product'] ? 'yes' :'no',
                            "bank_trnsfer" => "yes"
                        ];
                        $message = "Product Added to Cart";
                    }
                }

            }
            session()->put('cart', $cart);
            $data = count((array) session('cart'));

            if(auth()->user()){
                $carts = session()->get('cart');
                foreach($carts as $key => $cart){

                    Cart::updateOrCreate(
                        [
                            'cart_id' => $key,
                            'user_id' => auth()->user()->id,
                        ],[
                            'cart_id' => $key,
                            'user_id' => auth()->user()->id,
                            'cart_array' => $cart,
                        ]
                    );
                }
            }

            $arr = array('message' => $message, 'data' => $data, 'status' => true);
        } else {
            $arr = array('message' => "Product not found", 'data' => [], 'status' => false);
        }

        echo json_encode($arr);

    }

    public function add_to_wishlist($id)
    {
        $product = Product::Find($id);
        $wishlist = session()->get('wishlist', []);
        if (isset($wishlist[$id])) {
            $wishlist[$id]['quantity']++;
            $message = "Product Updated to wishlist";
        } else {
            $wishlist[$id] = [
                "product_id" => $id,
                "product_name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->thumb_image
            ];
            $message = "Product Added to wishlist";
        }
       if(auth()->user()){
            Wishlist::updateOrCreate([
                "user_id" => auth()->user()->id,
            ],[
                "product_id" => $wishlist,
                "user_id" => auth()->user()->id,
            ]);
        }

        session()->put('wishlist', $wishlist);
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
                Cart::where('cart_id',$request->id)->delete();
            }
        }
        // return view('elements.cart_data');

        $cartData = view('elements.cart_data')->render();
    
        return response()->json(['cart_data' => $cartData,'cart_count'=>count((array) session('cart'))]);
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);

                Cart::where('cart_id',$request->id)->delete();
            }
            return view('pages.cart_model');
        }
    }

    public function get_all_cart_value()
    {
        return view('pages.cart_model');
    }

    public function get_checkout(Request $request)
    {

        return view('pages.checkout');
    }

    
    public function checkout(Request $request)
    {
  
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required',
            'billing_address1' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
            'country'=>'required',
            'postal_code' => 'required',
            'payment_method'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(!auth()->user()){

            if(User::where('email',$request->email)->exists()) return redirect()->back()->with('error',"Please Login Your Account");
            $user = new User;
            $user->email = $request->email;
            $user->phone = $request->phone_number;
            $user->name = $request->fullname;
            $user->password = null;
            $user->verification_token = Str::random(40);
            $user->save();
            $verificationLink = route('verify',['token' => $user->verification_token]);
                $details = [];
                $details['template'] = 'verification';
                $details['subject'] = 'Verify Your Email Address';
                $details['email'] = $user->email;
                $details['data'] = $verificationLink;
                Mail::to($details['email'])->send(new MyTestMail($details));
        }

        $data = [];
        $order_data=[];
        $order  = new Order;
        $billing_details['fullname'] = @$request->fullname;
        $billing_details['email'] = @$request->email;
        $billing_details['company_name'] = @$request->company_name;
        $billing_details['billing_address1'] = @$request->billing_address1;
        $billing_details['billing_address2'] = @$request->billing_address2;
        $billing_details['city'] = @$request->city;
        $billing_details['phone_number'] = @$request->phone_number;
        $billing_details['country'] = @$request->district;
        $billing_details['postal_code'] = @$request->postal_code;

        $shipping_details['shipping_fullname'] = @$request->shipping_fullname;
        $shipping_details['shipping_email'] = @$request->shipping_email;
        $shipping_details['shipping_company_name'] = @$request->shipping_company_name;
        $shipping_details['shipping_billing_address1'] = @$request->shipping_billing_address1;
        $shipping_details['shipping_billing_address2'] = @$request->shipping_billing_address2;
        $shipping_details['shipping_city'] = @$request->shipping_city;
        $shipping_details['shipping_phone_number'] = @$request->shipping_phone_number;
        $shipping_details['shipping_country'] = @$request->shipping_country;
        $shipping_details['shipping_postal_code'] = @$request->shipping_postal_code;
        // $order_id = md5(rand(10, 100000));
        $transaction_id = mt_rand(1000000000, 9999999999);
        $order_id = mt_rand(10000000, 99999999);

        $order->status = 'In-Progress';
        $order->billing_details = json_encode($billing_details);
        $order->shipping_address = json_encode($shipping_details);
        $order->product_details = $this->find_product_details();
        $order->payment_method = @$request->payment_method;
        
        $order->order_id = $order_id ;
        $order->transaction_id = $transaction_id ;

        $orderArray = (json_decode($order->product_details,true));

        $shipping_data = (end($orderArray));

        if (@auth()->user()->id) {
            $order->user_id = @auth()->user()->id;
            $order->user_type = 'auth';
        } else {
            $order->user_id = @$user->id;
            $order->user_type = 'guest';
        }
        $order_data['name'] = $request->fullname;
        $order_data['status'] =  'In-Progress';
        $order_data['shipping_address'] = json_encode($shipping_details);
        $order_data['billing_details'] = json_encode($billing_details);
        $order_data['payment_method'] =  @$request->payment_method;
        $order_data['final_payment'] =  @$request->token_price;
        $order_data['product_details'] = $this->find_product_details();
        $order_data['order_id'] = $order_id;
        $order_data['transaction_id'] = $transaction_id;
        $order_data['shipping_price'] = $shipping_data['shipping_price'];
        $order->save();
        
        $details = [];
        $details['template'] = 'campergold_order_confirm';
        $details['subject'] = 'Order Confirmation';
        $details['email'] = $request->email;
        $details['data'] = $order_data;
        $data = $order_data;
        
        if ($request->payment_method === "paypal") {
            return (new PaypalService)->payment($order,$order_data,$details);
        }
        $this->OrderProccess($order,$order_data,$details);
        $orderUrl = route('order_confirmation', ['id' => $order['order_id'] ]);
        return redirect($orderUrl)->with('success', 'Thanks for the Order');
    }

    public function OrderProccess($order,$order_data,$mailDetails){
        
        $result = Mail::to($mailDetails['email'])->send(new MyTestMail($mailDetails));
        $url = 'https://stegback.com/';
        (new OrderService)->sendOrderStegback($order['order_id'], $order_data, $url);

        Cart::where('user_id',auth()->user()->id ?? @$order->user_id)->delete();
        session()->forget('cart');
        return true;
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
        $order = Order::where('order_id',$id)->first();

        if ($id) {
            return view('pages.order_confirmation', compact('order'));
        } else {
            session()->flush();
            return redirect(url('cart'))->with('success', 'Thanks for the Order');
        }
    }

    public function searchData(Request $request)
    {
        $keyword = $request->input('keyword');

        // Perform the search query based on the provided keyword
        $results = Product::where('product_name', 'like', "%$keyword%")->get();

        return response()->json($results);
    }


    // order save json product_details with component
    public function find_product_details()
    {
    
        if (session('cart')) {

            $all_product_details = [];
            foreach (session('cart') as $id => $details) {

                $attribute_price = 0;
                $product = Product::Find($id);
                if (!empty($product)) {
                    if ($product['type'] == 'variable') {
                        $attributes_price = AttributeTerm::whereIn('id', @$details['attribute_ids'])->sum('price');
                        $attributes_terms = AttributeTerm::whereIn('id', @$details['attribute_ids'])->get();

                        if (!empty($attributes_terms)) {
                            $attributes_all = [];
                            foreach ($attributes_terms as $key => $value) {
                                $attributes['attribute_id'] = $value['id'];
                                $attributes['attribute_term_name'] = $value['attribute_term_name'];
                                $attributes['price'] = $value['price'];
                                $attributes['attribute_term_description'] = $value['attribute_term_description'];
                                $attributes['attribute_type'] = $value['attribute_type'];
                                $attributes['attribute_image'] = $value['image'];
                                $attributes['attribute_wh_range'] = $value['wh_range'];
                                $attributes_all[] = $attributes;

                                ((new UpdateQuantity)->reduceQuantity($value->sku, 1));
                            }
                            $product_details['attribute_terms'] = $attributes_all;
                        }
                    }
                    if(isset($details['discount'])){
                        $product_details['discount'] = $details['discount'];
                    }
                    $tax = getTaxCountry((int)$details['shipping_country']);
                    $product_details['vat_tax'] = $tax['vat_tax'];
                    $product_details['tax_price'] = @$details['price'] * $tax['vat_tax'] /100 ;

                    $product_details['product_id'] = $product['id'];
                    $product_details['product_name'] = $product['product_name'];
                    $product_details['quantity'] = $details['quantity'];
                    $product_details['price'] = $details['price'];
                    $product_details['thumb_image'] = $product['thumb_image'];
                    $product_details['slug'] = $product['slug'];
                    $product_details['type'] = $product['type'];
                    $product_details['sku'] = $product['sku'];
                    $product_details['solar_product'] = $product['solar_product'] ? 'yes' : 'no';
                    $product_details['total_price'] = ($attribute_price + $details['price']) * $details['quantity'];
                    $product_details['shipping_country'] = $details['shipping_country'];
                    $product_details['shipping_price'] = shippingCountry()->where('country',$details['shipping_country'])->pluck('price')->first();
                    
                    $product_details['price_with_tax'] = $details['price_with_tax'] ?? ($product_details['price'] + $product_details['tax_price']);
                    // dd($product_details['quantity']);
                    ((new UpdateQuantity)->reduceQuantity($product->sku, $product_details['quantity']));

                    $all_product_details[] = $product_details;
                }
            }
            // dd($all_product_details);
            return json_encode($all_product_details);
        }
        return false;
    }

    // find similar products
    public function getRandomProductFromSameCategory($productId)
    {
        $product = Product::findOrFail($productId);
    
        // Get the category of the current product
        $category = $product->categories;
    
        // Get a random product from the same category
        $randomProduct = Product::where('categories',  $category)
            ->where('id', '!=', $productId)
            ->inRandomOrder()
            ->where('status', 1)
            ->limit(3)
            ->get();
    
        return response()->json($randomProduct);
    }


    public function threePercentDiscount(Request $request) {
        
    if ($request->checked === "bank") {
        $shipping = new UpdateShipping;
        $response = $shipping->update($request);
        $total = $response['total_unformate'];

        $bank_dis = $total * 3 / 100; // Calculate the discount
        $response['bank_dis'] = formatPrice($bank_dis);
        $response['total_after_dis'] = formatPrice($total - $bank_dis);
        
        // update session bank discount
         if(session('cart')){
            $cart = session('cart');
          
            foreach($cart as $item){
                
                 $cart[$item["product_id"]]["bank_trnsfer"] = "yes";
            }
            session()->put("cart", $cart);
         }
         $payment  = "bank";
        $response['payment_method'] = $payment;
        return response()->json($response);
    }
    else
    {
         if(session('cart')){
            $cart = session('cart');
          
            foreach($cart as $item){
                
                 $cart[$item["product_id"]]["bank_trnsfer"] = "no";
            }
            session()->put("cart", $cart);
         }
         
          $shipping = new UpdateShipping;
          $response = $shipping->update($request);
          $payment  = "other";
          $response['payment_method'] = $payment;
          return response()->json($response);
    }
}

    
}
