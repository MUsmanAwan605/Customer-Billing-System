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

            <form method="POST" action="{{ route('admin.customer.update',$customer->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Edit Customer</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" value="{{ old('name',$customer->name) }}"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                id="name" placeholder="Enter Name">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" value="{{ old('email',$customer->email) }}"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" placeholder="Enter Email">
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" value="{{ old('phone',$customer->phone) }}"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                id="phone" placeholder="Enter Phone">
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" value="{{ old('address',$customer->address) }}"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                id="address" placeholder="Enter Address">
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save Customer</button>
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
