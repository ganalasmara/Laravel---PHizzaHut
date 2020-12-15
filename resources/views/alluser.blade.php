@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @foreach ($user as $u)
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">User ID: {{ $u->id }}</h5>
              <p class="card-text">Username: {{ $u->name }}</p>
              <p class="card-text">Email: {{ $u->email }}</p>
              <p class="card-text">Address: {{ $u->address }}</p>
              <p class="card-text">Phone Number: {{ $u->phone }}</p>
              <p class="card-text">Gender: {{ $u->gender }}</p>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection
