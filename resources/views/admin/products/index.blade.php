@extends('admin.layouts.app')


@section('content')
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <!-- <div class="col-sm-6">
                          
                        </div> -->
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-end">
                                <li ><a  href="{{ route('admin.products.create') }}"
                               
                                class="btn btn-primary">Add Product</a></li>
                               
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Products Table</b></h3>
                                </div> <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px">#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="align-middle">
                                            @if (!empty($products) && $products->count() > 0)
                                                @foreach($products as $product)
                                                <td>{{ ++$i }}</td>
                                                <td><img src="{{ asset('storage/' . $product->image) }}" width="100px">
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->amount }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>
                                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-outline-primary">
                                                <i class="fa fa-edit"></i> Show
                                                </a>
                                                
                                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-outline-primary">
                                                <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-outline-danger" href="{{ route('admin.products.destroy', $product->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">
                                                Delete
                                            </a>
                                     
  
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                            @else 
            <tr>
                <td colspan="6">No products found.</td>
            </tr>
        @endif
                                            
                                           
                                        </tbody>
                                    </table>
                                </div> <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-end">
                                    {{ $products->links() }}
                                    </ul>
                                </div>
                            </div> <!-- /.card -->
                            
                        </div> <!-- /.col -->
                       
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
                <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
 @endsection
       