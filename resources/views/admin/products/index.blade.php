@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-1">
        <div class="d-flex justify-content-end mb-2">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
            Add Product
          </button>
        </div>
          <div class="card">
             <div class="card-header">
               Products
             </div>
             <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->price }}</td>
                      <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                      <td>
                          <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                             <button class="btn btn-danger btn-sm">Delete</button>
                          </form>
                      </td>
                    </tr>
                    
                  @endforeach
                </tbody>
              </table>
             </div>
          </div>
      </div>
    </div>
  </div>
  



 
  
  <!-- Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
              <label for="name">Price</label>
              <input type="text" name="price" class="form-control">
          </div>
          <div class="form-group">
              <label for="name">Description</label>
              <textarea name="description" id="description" cols="10" rows="10" class="form-control"></textarea>
          </div>
          <div class="form-group">
              <label for="name">Image</label>
              <input type="file" name="image" class="form-control" value="">
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
        </div>

      </form>
    </div>
  </div>
@endsection

