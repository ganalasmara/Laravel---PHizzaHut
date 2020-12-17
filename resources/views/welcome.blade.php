@extends('layouts.app')
{{-- //I MADE GANAL ASMARA JAYA - 2201799386 --}}
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
        <div class="d-flex justify-content-center mb-2">
        <a href="/pizza/add" class="btn btn-primary" >Add Pizza</a>
        </div>
        @endif
        @endauth
        <div class="row">
           <!-- Search form -->
           <div class="col-md-12 d-flex justify-content-center">
           <form method="POST" action="{{ route('search') }}">
            @csrf
              
                  <input type="text" class="form-control mb-1" name="search" id="search"
                      placeholder="Search Pizza">
              
             
                <button type="submit" class="btn btn-primary btn-block">Search</button>
             
            </form>
          </div>
            
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
