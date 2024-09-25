
@extends('admin.layouts.app')


@section('content')

            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">View</h3>
                        </div>
                       
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                <div class="row g-4 mb-4">
                        <div class="col-md-6">
                        <div class="card">
  <div class="card-header">
    <h3 class="card-title">Product Details</h3>
    <div class="card-tools">
      
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  
  <h3>Product Name :- {{ $product->name }}</h3>
  @if($product->image)
    <strong>Product Image :- </strong><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100px">
@endif
  <p><b>Amount  :- ${{ $product->amount }}</b></p>
  
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
   <p><label>Description :- </label> {{ $product->description}}</p>
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->
                        </div> <!-- /.col -->
                        
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
 @endsection