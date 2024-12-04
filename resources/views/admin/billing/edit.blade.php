@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Billing</div>
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

            <form method="POST" action="{{ route('admin.billing.update',$billing->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Edit Billing</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="text" value="{{ old('date',$billing->date) }}"
                                                class="form-control @error('date') is-invalid @enderror" name="date"
                                                id="date" placeholder="Enter Date">
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" value="{{ old('name',$billing->name) }}"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                id="name" placeholder="Enter Name">
                                            <span class="text-danger">{{ $errors->first('name') }}</span  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="prod" class="form-label">Product</label>
                                            <input type="text" value="{{ old('Product',$billing->prod) }}"
                                                class="form-control @error('Product') is-invalid @enderror" name="Product"
                                                id="Product" placeholder="Enter Product">
                                            <span class="text-danger">{{ $errors->first('Product') }}</span  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="qty" class="form-label">Quantity</label>
                                            <input type="text" value="{{ old('Quantity',$billing->qty) }}"
                                                class="form-control @error('Quantity') is-invalid @enderror" name="Quantity"
                                                id="Quantity" placeholder="Enter Quantity">
                                            <span class="text-danger">{{ $errors->first('Quantity') }}</span  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="rate" class="form-label">Rate</label>
                                            <input type="number" value="{{ old('Rate',$billing->rate) }}"
                                                class="form-control @error('Rate') is-invalid @enderror" name="Rate"
                                                id="Rate" placeholder="Enter Rate">
                                            <span class="text-danger">{{ $errors->first('Rate') }}</span  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="bil_amt" class="form-label">Bill Amount</label>
                                            <input type="number" value="{{ old('BillAmount',$billing->bil_amt) }}"
                                                class="form-control @error('BillAmount') is-invalid @enderror" name="BillAmount"
                                                id="BillAmount" placeholder="Enter Bill Amount">
                                            <span class="text-danger">{{ $errors->first('BillAmount') }}</span  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="p_amt" class="form-label">Previous Amount</label>
                                            <input type="number" value="{{ old('PreviousAmount',$billing->p_amt) }}"
                                                class="form-control @error('PreviousAmount') is-invalid @enderror" name="PreviousAmount"
                                                id="PreviousAmount" placeholder="Enter previous Amount">
                                            <span class="text-danger">{{ $errors->first('PreviousAmount') }}</span  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="t_amt" class="form-label">Total Amount</label>
                                            <input type="number" value="{{ old('TotalAmount',$billing->t_amt) }}"
                                                class="form-control @error('TotalAmount') is-invalid @enderror" name="TotalAmount"
                                                id="TotalAmount" placeholder="Enter Total Amount">
                                            <span class="text-danger">{{ $errors->first('TotalAmount') }}</span  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="r_amt" class="form-label">Recived Amount</label>
                                            <input type="number" value="{{ old('ReceivedAmount',$billing->r_amt) }}"
                                                class="form-control @error('ReceivedAmount') is-invalid @enderror" name="ReceivedAmount"
                                                id="ReceivedAmount" placeholder="Enter Recived Amount">
                                            <span class="text-danger">{{ $errors->first('ReceivedAmount') }}</span  >
                                        </div>
                                        <div class="mb-3">
                                            <label for="bal_amt" class="form-label">Balance Amount</label>
                                            <input type="number" value="{{ old('BalanceAmount',$billing->bal_amt) }}"
                                                class="form-control @error('BalanceAmount') is-invalid @enderror" name="BalanceAmount"
                                                id="BalanceAmount" placeholder="Enter Balance Amount">
                                            <span class="text-danger">{{ $errors->first('BalanceAmount') }}</span  >
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save billing</button>
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
