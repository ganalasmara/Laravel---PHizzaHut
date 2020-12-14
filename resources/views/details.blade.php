@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <img class="img-fluid" src="{{ asset($pizza->photo) }}" alt="">
            </div>
            <div class="col-md-5">
                <h1>{{ $pizza->name }}</h1>
                <p>{{ $pizza->description }}</p>
                <h4>Rp {{ $pizza->price }}</h4>
                @auth
                @if(Auth::user()->role==1)
                <form class="form-inline" action="{{ route('pizza.add') }}" method="POST">
                    <div class="form-group mb-2">
                      <h5>Input</h5>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                      <label for="quantity" class="sr-only">Quantity</label>
                      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Add to Cart</button>
                  </form>
                @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
