<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\CheckoutDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $checkout = Checkout::where('user_id', Auth::user()->id)->first();
        $checkout_detail = CheckoutDetail::where('checkout_id', $checkout->id)->with('Weapon')->get();

        return view('Checkout.checkout', [
            'checkouts' => $checkout,
            'checkout_details' => $checkout_detail,
        ]);
    }

    public function coba(Request $request)
    {
        $checkoutdetails_id = $request->id;
        $checkout_id = $request->checkout_id;
        //     $total_payment = DB::table('checkout_details')
        //     ->select('total_payment')
        //    ->first();vv
        //     $total = $total_payment->total_payment - 5000.0; 
        $checkout = Checkout::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $checkout->total_payment -= 5000;
        $checkout->update();
        DB::table('checkout_details')->where('id', $checkoutdetails_id)->delete();
        return redirect()->back();
    }
}
