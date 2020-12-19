<body background="{{ url('assets/public/bg.svg')}}">

    @extends('layouts.head')
    @extends('layouts.header')
    @section('content')







    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('assets/weapon/vandal.webp') }}" class="d-block w-100 h-50" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ url('assets/weapon/vandal.webp') }}" class="d-block w-100 h-50" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ url('assets/weapon/vandal.webp') }}" class="d-block w-100 h-50" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




    <div class="col-sm-4">
                {{-- BOOTSTRAP --}}
                <div class="card mt-3">
                    <img src="{{ url('assets/weapon') }}/{{ $weapons->image }}" class="img-fluid mt-3 ml-3 mr-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $weapons->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($weapons->price) }}</p>
                        <form action="/item/{{  $weapons->price }}/{{ $weapons->id }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary float-right" name="btn_checkout">Add</button>
                        </form>
                    </div>
                </div>
            </div>






    <div class="container">
        <div class="row">
            {{-- BOOTSTRAP --}}
            <div class="col-sm-4">
                @foreach($weapons as $weapons)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ url('assets/weapon') }}/{{ $weapons->image }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $weapons->name }}</h5>
                                <p class="card-text">Rp. {{ number_format($weapons->price) }}</p>
                                <form action="/item/{{  $weapons->price }}/{{ $weapons->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary float-right"
                                        name="btn_checkout">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    @endsection
