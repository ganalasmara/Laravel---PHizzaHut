@extends('layouts.app')

@section('content')
    

    <div class="container">
        @foreach ($trans as $t)
            
        
        <div class="row">
            <div class="col-md-7">
                <img class="img-fluid" src="{{ asset($t->pizza->photo) }}" alt="">
            </div>
            <div class="col-md-5">
                <h1>{{ $t->pizza->name }}</h1>
                <h4>Rp {{ $t->pizza->price }}</h4>
                <h4>Quantity: {{ $t->quantity }}</h4>
                <h4>Total Price: {{ $total }}</h4>
                
            </div>
        </div>
        @endforeach
        
    </div>
@endsection
