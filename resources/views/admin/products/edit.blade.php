@extends('admin.layouts.app')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-6 form-inline card-center">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title"><b>Edit Product</b></div>
                        </div>

                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="productName" value="{{ old('name', $product->name) }}" placeholder="Product Name">
                                </div>

                                <div class="mb-3">
                                    <label for="productAmount" class="form-label">Amount</label>
                                    <input type="number" step="0.01" name="amount" class="form-control" id="productAmount" value="{{ old('amount', $product->amount) }}" placeholder="Amount">
                                </div>

                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="productDescription" rows="3" placeholder="Description">{{ old('description', $product->description) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="productImage" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="productImage">
                                    
                                    @if($product->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="150">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
