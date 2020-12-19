<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Checkout;
use App\CheckoutDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MidtransController extends Controller
{
    // public function index()
    // {
    //     return view('midtrans');
    // }


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pay(Request $request)
    {

        $checkout = Checkout::where('user_id', Auth::user()->id)->first();
        $checkout_detail = CheckoutDetail::where('checkout_id', $checkout->id)->with('Weapon')->get();
        $checkout_detail1 = CheckoutDetail::where('checkout_id', $checkout->id)->with('Weapon')->first();

        $checkout->riot_id = $request->riot_id;
        $checkout->update();

        $response = Http::withHeaders([
            "Authorization" => "Basic " . base64_encode("SB-Mid-server-9K6MuVcG0uN3HugncUBa9nLL"),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', [
            "transaction_details" => [
                "order_id" => "LARAMID-" . $checkout->invoice,
                "gross_amount" => $checkout->total_payment,
            ],
            "credit_card" => [
                "secure" => true
            ],
            "customer_details" => [
                "name" => Auth::user()->name,
                "email" => Auth::user()->email,
                "phone" => "08111222333"
            ],
        ]);
        $token = json_decode($response->getBody(true)->getContents());
        return redirect($token->redirect_url);

        //ambil data wapon
        foreach ($checkout_detail as $checkout_details) {
            $check_weaponID[] = $checkout_details->weapon_id;
            for ($i = 0; $i < count($check_weaponID); $i++) {
                $cetakweapon_id = $check_weaponID[$i] . ', ';
            }
        }
        rtrim($cetakweapon_id, ',');

        //pindah data ke history
        DB::table('history')->insert([
            'user_id' => $checkout->user_id,
            'checkout_id' => $checkout_detail1->id,
            'total_payment' => $checkout->total_payment,
            'invoice' => $checkout->invoice,
            'riot_id' => $request->riot_id,
            'weapon_id' => $cetakweapon_id
        ]);

        //sql bikin table history
        //CREATE TABLE history (id INT NOT NULL PRIMARY KEY AUTO INCREMENT, user_id INT, checkout_id INT, total_payment DOUBLE, invoice VARCHAR, riot_id VARCHAR, weapon_id VARCHAR);

        //hapus data
        $delcheckout_detail = DB::table('checkout_details')->where('checkout_id', $checkout->id)->delete();
        $delcheckout = DB::table('checkouts')->where('user_id', Auth::user()->id)->delete();
    }
}
