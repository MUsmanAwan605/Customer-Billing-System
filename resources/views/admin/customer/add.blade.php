@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Customer</div>
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

            <form method="POST" action="{{ route('admin.customer.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-lg-flex align-items-center mb-4 gap-3">


                            <div class="ms-auto"><a href="{{ route('admin.customer.index') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">Back</a></div>
                        </div>
                        <h5 class="card-title">Add Customer</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" value="{{ old('name') }}"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                id="name" placeholder="Enter Name">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" placeholder="Enter Email">
                                            <span class="text-danger">{{ $errors->first('email') }}</span  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" value="{{ old('phone') }}"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                id="phone" placeholder="Enter phone">
                                            <span class="text-danger">{{ $errors->first('phone') }}</span  >
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address(Optional)</label>
                                            <input type="text" value="{{ old('address') }}"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                id="address" placeholder="Enter Address">
                                            <span class="text-danger">{{ $errors->first('address') }}</span  >
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save customer</button>
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
