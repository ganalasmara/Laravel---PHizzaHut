@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col align-items-center">
                <p class="fresh">Our freshly made Pizza!</p>
                <p class="fresh"">Order it now!</p>
            </div>
        </div>
        @auth
        @if(Auth::user()->role==2)
        
        <a href="/pizza/add" class="btn btn-primary" >Add Pizza</a>
        
        @endif
        @endauth
        <div class="row">
           <!-- Search form -->
           <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
              aria-label="Search">
          </form>
        </div>
        <div class="row ">

            @foreach ($pizza as $p)
            <div class="col-md-4 d-flex justify-content-center">
            <div class="card mb-2 mt-2" style="width: 18rem;">
                <a href="/pizza/{{ $p->id }}"><img class="card-img-top" src="{{ asset($p->photo) }}" alt="Card image cap"></a>
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
                  <a href="/pizza/edit/{{ $p->id }}" class="btn btn-block btn-primary">Edit Pizza</a>
                  <a href="/pizza/delete/{{ $p->id }}" class="btn btn-block btn-danger">Delete Pizza</a>
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
