@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($trans as $t)
            <a href="{{ route('trans.details', ['trans_id'=>$t->id]) }}"><p>Transaction at {{ $t->created_at }}</p></a>
        @endforeach
    </div>
@endsection
