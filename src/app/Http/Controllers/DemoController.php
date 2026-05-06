<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DemoController extends Controller
{
    public function index()
    {
        return view('demo');
    }

    public function view(Request $request)
    {
        $url = 'https://sandbox.sslcommerz.com/gwprocess/v4/api.php';

        $data = $request->all();

        $response = Http::asForm()->withOptions(['verify' => false])->post($url, $data);

        $incoming = $response->json();

        if ($incoming['status'] == 'SUCCESS') {
            return redirect()->away($incoming['GatewayPageURL']);
        }

        return $incoming;
    }

    public function success(Request $request)
    {

        $storeId = 'test_sslbddevwork001';
        $storePwd = 'test_sslbddevwork001@ssl';
        $valId = $request['val_id'];

        $data = $request->all();

        // return $data;

        $validURL = "https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=$valId&store_id=$storeId&store_passwd=$storePwd&format=json";

        if ($data['status'] == 'VALID') {
            $response = Http::get($validURL);
            $returnData = $response->json();

            if ($returnData['status'] == 'VALID') {
                $trans_id = $request->tran_id;
                $order = Order::find($trans_id);

                $order->status = $request->status;
                $order->error = $request->error;
                $order->amount = $request->amount;
                $order->bank_tran_id = $request->bank_tran_id;
                $order->tran_date = $request->tran_date;
                $order->card_issuer = $request->card_issuer;
                $order->card_brand = $request->card_brand;
                $order->val_id = $request->val_id;
                $order->card_type = $request->card_type;

                $order->save();
            }
        } else {
            return 'You are a hacker!!';
        }

        return redirect()->route('orders');
    }

    public function fail(Request $request)
    {
        $trans_id = $request->tran_id;
        $order = Order::find($trans_id);

        $order->status = $request->status;
        $order->error = $request->error;
        $order->amount = $request->amount;
        $order->bank_tran_id = $request->bank_tran_id;
        $order->tran_date = $request->tran_date;
        $order->card_issuer = $request->card_issuer;
        $order->card_brand = $request->card_brand;

        $order->save();

        return redirect()->route('orders');
    }

    public function cancel(Request $request)
    {
        $trans_id = $request->tran_id;
        $order = Order::find($trans_id);

        $order->status = $request->status;
        $order->error = $request->error;
        $order->amount = $request->amount;

        $order->save();

        return redirect()->route('orders');
    }

    public function products()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->product_id;
        $product = Product::find($productId);

        // create order 
        $order = new Order();
        $order->product_id = $productId;
        $order->product_price = $product->p_price;
        $order->product_qty = 1;
        $order->status = 'waiting';
        $order->save();

        // SSLCommerz sandbox API endpoint (payment init request যাবে এখানে)
        $url = 'https://sandbox.sslcommerz.com/gwprocess/v4/api.php';

        // Store credentials (SSLCommerz merchant account info)
        $store_id = 'test_sslbddevwork001';
        $store_passwd = 'test_sslbddevwork001@ssl';

        // Payment configuration
        $currency = 'BDT';
        $total_amount = $product->p_price;
        $tran_id = $order->id;

        // Redirect URLs after payment
        $success_url = 'https://localhost/api/success';
        $fail_url = 'https://localhost/api/fail';
        $cancel_url = 'https://localhost/api/cancel';

        // Customer information
        $cus_name = 'Alin';
        $cus_email = 'rezwansaki@gmail.com';

        // Data payload sent to SSLCommerz API
        $data = [
            'store_id' => $store_id,
            'store_passwd' => $store_passwd,
            'currency' => $currency,
            'success_url' => $success_url,
            'fail_url' => $fail_url,
            'cancel_url' => $cancel_url,
            'total_amount' => $total_amount,
            'tran_id' => $tran_id,
            'cus_name' => $cus_name,
            'cus_email' => $cus_email,
        ];

        // Send POST request to SSLCommerz API (form-data format)
        $response = Http::asForm()->withOptions(['verify' => false])->post($url, $data);

        // Convert response to array
        $incoming = $response->json();

        // Check if payment session created successfully
        if ($incoming['status'] == 'SUCCESS') {
            // Redirect user to SSLCommerz payment gateway page
            return redirect()->away($incoming['GatewayPageURL']);
        } else {
            // If failed, return request data for debugging
            return $request->all();
        }
    }

    public function orders()
    {
        $orders = Order::orderby('id', 'desc')->get();
        return view('allorders', compact('orders'));
    }
}
