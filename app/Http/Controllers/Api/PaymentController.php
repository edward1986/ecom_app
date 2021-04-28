<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;


use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        try{
            $data = $request->input('cartItems');
            $cartItems = json_decode($data, true);
            $totalAmount = 0.0;
            foreach ($cartItems as $cartItem){
                $order = new Order();
                $order->order_date = Carbon::now()->toDateString();
                $order->product_id = $cartItem['productId'];
                $order->user_id = $request->input('userId');
                $order->quantity = $cartItem['productQuantity'];
                $order->amount = ($cartItem['productPrice'] - $cartItem['productDiscount']);
                $totalAmount+= $order->amount * $order->quantity;
                $order->save();
            }
            \Stripe\Stripe::setApiKey('sk_test_xqiuBaqJHd9Gl5dmHmYd00Yb00KwGm5pGt');

            $token = \Stripe\Token::create([
                'card' => [
                    'number' => $request->input('cardNumber'),
                'exp_month' => $request->input('expiryMonth'),
                'exp_year' => $request->input('expiryYear'),
                'cvc' => $request->input('cvcNumber')
                ]
                ]);

            $charge = \Stripe\Charge::create([
                'amount' => $totalAmount * 100,
                'currency' => 'usd',
                'source' => $token,
                'receipt_email' => $request->input('email'),
                ]);

            return response(['result' => true]);
        } catch (\Exception $exception){
            return response(['result' => $exception]);
        }
    }
}
