@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Product</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Add Product</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Products Name</label>
                                            <input type="text" value="{{ old('Name') }}"
                                                class="form-control @error('Name') is-invalid @enderror" name="Name"
                                                id="Name" placeholder="Enter Product Name">
                                            <span class="text-danger">{{ $errors->first('Name') }}</span  >
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="code" class="form-label">Code</label>
                                            <input type="text" value="{{ old('code') }}"
                                                class="form-control @error('code') is-invalid @enderror" name="code"
                                                id="code" placeholder="Enter Code">
                                            <span class="text-danger">{{ $errors->first('code') }}</span>
                                        </div> --}}
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save Product</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

            </form>
        </div>
    </div>
@endsection
