@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col align-items-center">
                <p class="fresh">Our freshly made Pizza!</p>
                <p class="fresh"">Order it now!</p>
            </div>
        </div>
        <div class="row">
           <!-- Search form -->
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </div>
        <div class="row">

            @foreach ($pizza as $p)
            <div class="col-md-4">
            <div class="card mb-2 mt-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ $p->photo }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $p->name }}</h5>
                  <p class="card-text">Rp {{ $p->price }}</p>
                  <a href="#" class="btn btn-primary">Order Me!</a>
                </div>
              </div>
            
            </div>
            @endforeach

        </div>

    </div>
@endsection
