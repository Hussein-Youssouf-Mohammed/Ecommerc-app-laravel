@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-1">
             <div class="card">
                <div class="card-header">Edit Product: {{ $product->name }}</div>
                <div class="card-body">
                     <form action="{{ route('products.update', $product->id) }}" method="POST">
                       @csrf
                       @method('PUT')
                       <div class="form-group">
                           <label for="name">Name</label>
                           <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                       </div>
                       <div class="form-group">
                           <label for="name">Price</label>
                           <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                       </div>
                       <div class="form-group">
                           <label for="name">Description</label>
                           <textarea name="description" id="description" cols="10" rows="10" class="form-control">{{ $product->description }}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="name">Image</label>
                           <input type="file" name="image" class="form-control" value="">
                       </div>
                            <div class="text-center">
                               <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                     </form>
                </div>
             </div>
        </div>
      </div>
    </div>

@endsection