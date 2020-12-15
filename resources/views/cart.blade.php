@extends('layouts.app')

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('successMsg'))
    <div class="alert alert-success text-center"> {{ Session::get('successMsg') }}</div>
    @endif

    <div class="container">
      @foreach ($cart->cartDetails as $c)       
        <div class="row">
            <div class="col-md-4">
                <img class="img-fluid" src="{{ asset($c->pizza->photo) }}" alt="">
            </div>
            <div class="col-md-8">
                <h1>{{ $c->pizza->name }}</h1>
                <h4>Rp {{ $c->pizza->price }}</h4>
                <p>Quantity: {{ $c->quantity }}</p>
                <form class="form-inline" action="{{ route('cart.update', ['cart_id'=>$c->cart_id, 'pizza_id'=>$c->pizza->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group mb-2">
                      <h5>Input</h5>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                      <label for="quantity" class="sr-only">Quantity</label>
                      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mr-1">Update Quantity</button>
                    
                </form>    
                <a href="{{ route('cart.delete', ['cart_id'=>$c->cart_id, 'pizza_id'=>$c->pizza->id]) }}"><button class="btn btn-danger mb-2">Delete from Cart</button></a>           
                
            </div>
        </div>
        @endforeach
    </div>
@endsection
