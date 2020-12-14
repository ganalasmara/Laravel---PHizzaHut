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
        <div class="row">
            <div class="col-md-4">
            <form action="{{ route('insert') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                  <label for="InputName">Pizza Name</label>
                  <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="InputPrice">Pizza Price</label>
                    <input type="number" class="form-control" id="price" name="price"  placeholder="Enter Price">
                </div>
                <div class="form-group">
                    <label for="InputDesc">Pizza Description</label>
                    <input type="text" class="form-control" id="description" name="description"  placeholder="Enter Description">
                </div>  
        
                <div class="form-group">
                      <label for="InputPhoto">Pizza Photo</label>
                      <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
@endsection
