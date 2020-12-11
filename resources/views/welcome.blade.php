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
        <div class="row ">

            @foreach ($pizza as $p)
            <div class="col-md-4 d-flex justify-content-center">
            <div class="card mb-2 mt-2" style="width: 18rem;">
                <a href="/pizza/{{ $p->id }}"><img class="card-img-top" src="{{ $p->photo }}" alt="Card image cap"></a>
                <div class="card-body">
                  <h5 class="card-title">{{ $p->name }}</h5>
                  <p class="card-text">Rp {{ $p->price }}</p>
                  @guest
                  <a href="/pizza/{{ $p->id }}" class="btn btn-block btn-primary">View Me!</a>
                  @endguest
                  @auth
                  @if (Auth::user()->role==1)
                  <a href="/pizza/{{ $p->id }}" class="btn btn-block btn-primary">View Me!</a>
                  @elseif(Auth::user()->role==2)
                  <a href="#" class="btn btn-block btn-primary">Update Pizza</a>
                  <a href="#" class="btn btn-block btn-danger">Delete Pizza</a>
                  @endif
                  @endauth
                  
                </div>
              </div>
            
            </div>
            @endforeach
            <div class="col-md-12 d-flex justify-content-center">
                {{$pizza->links()}}
                </div>

        </div>

    </div>
@endsection
