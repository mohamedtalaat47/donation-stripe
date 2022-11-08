<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Exception\ApiErrorException;
use Stripe;

class StripeController extends Controller
{

    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount' => 20 * 100,
            'currency' => "egp",
            'source' => $request->stripeToken,
            'description' => 'test from mohamed'
        ]);
        Session::flash('success', 'Payment has been done successfully');
        return back();
    }
}
