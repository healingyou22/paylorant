<body background="{{ url('assets/public/background.png')}}">

  @extends('layouts.head')
  @extends('layouts.header')
  @section('content')


  <!-- Card -->
  <div class="d-flex justify-content-center">
    <div class="card col-md-3 ">

      <div class="card-body">


        <h4 class="mt-2">Pesanan Kamu~</h4>
        <table class="table mt-4">
          @foreach($checkout_details as $checkout_details)
          <tbody>
            <tr>
              <td style=>
                <img src="{{ url('assets/weapon') }}/{{ $checkout_details->weapon -> image }}" class="img-fluid" style="height : 64px">
              </td>
              <td class="mr-2">
                <h4 for="WeaponID">{{ $checkout_details->weapon->name }}</h4>
                <h6 for="WeaponPrice">Rp. {{ $checkout_details->total_payment }}.00</h6>
              </td>
              <td>
                <form action="/delete/{{ $checkout_details->id }}/{{ $checkout_details->checkout_id }}" method="POST">
                  @csrf
                  <button type="" class="btn btn-primary float-right" name="btn_checkout">Remove</button>
                </form>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>

        <form action="/midtrans" method="POST">
          @csrf
          <div class="form-row">
            <div class="col">
              <h6>Riot ID</h6>
              <input required type="text" class="form-control" id="riot_id" name="riot_id">
            </div>
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <h6>Total Pembayaran Kamu</h6>
          <h4 for="totalPembayaran">Rp. {{ $checkouts->total_payment }}.00</h4>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mb-2">Pay now</button>
      <a href="/home" class="btn btn-outline-primary mb-2">Kembali</a>

      @endsection
      </form>
    </div>
  </div>
  </div>