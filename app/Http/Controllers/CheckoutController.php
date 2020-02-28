<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use App\Mail\PurchaseSuccessful;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{
    public function index(){
       return view('checkout');
    }

    public function payment(){
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey('sk_test_YmmLa9At2dUotLESYmYsmhMs00XQSYHHs5');

        $token=request()->stripeToken;

        $charge=Charge::create([
        'amount' => Cart::total()*1000,
        'currency' => 'inr',
        'description'=>'laravel stripe payment',
        'source'=>$token,
        ]);

        Session::flash('success','Purchased successfully');


        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new PurchaseSuccessful);
        return redirect('/');
            }

}
