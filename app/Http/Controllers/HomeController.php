<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Weapon;
use App\Checkout;
use App\CheckoutDetail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // /
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // /
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function index()
    {
        $checkout_detail = CheckoutDetail::All();
        $check_weaponID = [];

        foreach ($checkout_detail as $checkout_details) {
            $check_weaponID[] = $checkout_details->weapon_id;
        }

        return view('Home.home', [
            'weapons' => Weapon::all(),
            'weapons_id' => $check_weaponID,
        ]);
    }

    public function addToCheckout(Request $request)
    {
        $price = $request->price;
        $weapon_id = $request->id;

        $checkout = Checkout::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (!Auth::user()) {
            return redirect()->route('login');
        }

        if (empty($checkout)) {
            Checkout::create([
                'user_id' => Auth::user()->id,
                'total_payment' => $price,
                'status' => 0,
                'invoice' => md5(uniqid(rand(), true))
            ]);

            $checkout = Checkout::where('user_id', Auth::user()->id)->where('status', 0)->first();
        } else {
            $checkout->total_payment += $price;
            $checkout->update();
        }

        CheckoutDetail::create([
            'total_payment' => $price,
            'weapon_id' => $weapon_id,
            'checkout_id' => $checkout->id,
        ]);

        return redirect()->back();
    }
}
