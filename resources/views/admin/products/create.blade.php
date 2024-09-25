
@extends('admin.layouts.app')


@section('content')

            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row g-4"> <!--begin::Col-->
                        <!-- <div class="col-12">
                            <div class="callout callout-info">
                                For detailed documentation of Form visit <a href="https://getbootstrap.com/docs/5.3/forms/overview/" target="_blank" rel="noopener noreferrer" class="callout-link">
                                    Bootstrap Form
                                </a> </div>
                        </div>  -->
                       
                        <div class="col-md-6 form-inline card-center" > <!--begin::Quick Example-->
                            <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title"><b>Add Product</b></div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"> 
                                @csrf    
                                <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Name</label> 
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name">
                                        </div>

                                        <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Amount</label> 
                                        <input type="number" step="0.01" name="amount"  class="form-control" id="exampleInputPassword1" placeholder="Amount"> </div>


                                        <div class="mb-3"> <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea> </div>

                                        <div class="mb-3">
                                        <label for="exampleFormControlImage" class="form-label">Image</label>
                                         <input type="file" name="image" class="form-control" id="inputGroupFile02">  </div>


                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div> <!--end::Quick Example--> <!--begin::Input Group-->
                            
                        </div> <!--end::Col--> <!--begin::Col-->
                       
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
 @endsection