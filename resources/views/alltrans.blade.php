@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @foreach ($trans as $t)
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <p class="card-text">Transaction at: {{ $t->created_at }}</p>
              <p class="card-text">User ID: {{ $t->user_id }}</p>
              <p class="card-text">Username: {{ $t->user->name }}</p>
              <a href="{{ route('trans.details', ['trans_id'=>$t->id]) }}" class="card-link">View Details</a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection
