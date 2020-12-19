<body background="{{ url('assets/public/background.png')}}">
  @extends('layouts.head')
  @extends('layouts.header')
  @section('content')


  <!-- Card -->
  <div class="d-flex justify-content-center">
    <div class="card col-md-3 ">
      <div class="card-body">


        <h4 class="mt-2">Project ini dibuat oleh~</h4>
        <table class="table mt-4">
          <tbody>
            <tr>
              <td style=>
                <img src="{{ url('assets/weapon') }}/{{ $checkout_details->weapon -> image }}" class="img-fluid" style="height : 64px">
              </td>
              <td class="mr-2">
                <h4 for="WeaponID">{{ $checkout_details->weapon->name }}</h4>
                <h6 for="WeaponPrice">Rp. {{ $checkout_details->total_payment }}.00</h6>
              </td>
            </tr>
          </tbody>
        </table>

        <a href="/home" class="btn btn-outline-primary mb-2">Kembali</a>

        @endsection
      </div>
    </div>
  </div>