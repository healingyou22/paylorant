<body background="{{ url('assets/public/background.png')}}">

    @extends('layouts.head')
    @extends('layouts.header')
    @section('content')

    <link rel="stylesheet" href="/css/small-card.css">

    <div class="col-md-8" style="margin: auto;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style=>
                <div class="carousel-item active">
                    <img src="{{ url('assets/weapon/vandal.webp') }}" class="d-block" style="width : 1110px ; height: 555px; margin :auto;">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('assets/weapon/vandal.webp') }}" class="d-block" style="width : 1110px ; height: 555px; margin :auto;">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('assets/weapon/vandal.webp') }}" class="d-block" style="width : 1110px ; height: 555px; margin :auto;">
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

    </div>




    <div class="container">
        <div class="row">
            @foreach($weapons as $weapon)
            <div class="col-md-4">
                {{-- BOOTSTRAP --}}
                <div class="card card-custom bg-white border-white mt-3">
                    <div class="card-custom-img" style="background-image: url('assets/weapon/{{ $weapon->image }}');">
                    </div>
                    <div class="card-custom-avatar">
                        <img class="img-fluid" src="{{ url('assets/public/valo.png')}}" alt="Avatar" />
                    </div>
                    <div class="card-body" style="overflow-y: auto">
                        <h4 class="card-title">{{ $weapon->name }}</h4>
                        <p class="card-text">Rp. {{ number_format($weapon->price) }}
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        @if(in_array($weapon->id, $weapons_id) == true)
                        <form action="/item/{{  $weapon->price }}/{{ $weapon->id }}" method="POST" id="checkItem">
                            @csrf
                            <button type="submit" class="btn btn-primary float-right" disabled>Added</button>
                        </form>
                        @else
                        <form action="/item/{{  $weapon->price }}/{{ $weapon->id }}" method="POST" id="checkItem">
                            @csrf
                            <button type="submit" class="btn btn-primary float-right">Add</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    @endsection
</body>