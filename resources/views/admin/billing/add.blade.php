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
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <form method="POST" action="{{ route('admin.billing.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-lg-flex align-items-center mb-4 gap-3">


                            <div class="ms-auto"><a href="{{ route('admin.billing.index') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">Back</a></div>
                        </div>
                        <div class="d-lg-flex align-items-center mb-4 gap-3">
                            {{-- <h5 class="card-title">Add Billing</h5> --}}
                             <p class="">Date</p>
                             <div class="col-md-2">
                                                <input type="date" value="{{ old('date') }}" class="form-control date-inline @error('date') is-invalid
                                                @enderror" name="date" id="date" placeholder="Enter Date" required>
                                                <span class="text-danger">{{ $errors->first('date') }}</span>

                                            </div>

                                            <p>Select Customer</p>
                                            <div class="col-md-3 ">
                                                <select id="customer" name="name" class="form-select" name="Customer_id" required>
                                                    <option value="">Select </option>
                                                    @foreach($Customers as $customer)
                                                        <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                             </div>
                            <div class="ms-auto">

                            </div>
                        </div>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row" id="product-container">
                                <div class="col-lg-12 product-item">
                                    <div class="">
                                        <div class="row">
                                            <!-- Date Field -->


                                            <!-- Customer Name Field -->


                                            <!-- Product Name Field -->
                                            <div class="col-md-3 mb-3">
                                                <label for="product" class="form-label">Product Name</label>
                                                <input class="form-control" name="product[]" id="product" required>
                                                </input>
                                                {{-- <span class="text-danger">{{ $errors->first('product') }}</span> --}}
                                            </div>

                                            <!-- Quantity Field -->
                                            <div class="col-md-2 mb-3">
                                                <label for="Quantity" class="form-label">Quantity</label>
                                                <input type="number" value="{{ old('Quantity') }}" class="form-control " name="Quantity[]" placeholder="Enter Quantity" required>
                                                {{-- <span class="text-danger">{{ $errors->first('Quantity') }}</span> --}}
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label for="Rate" class="form-label">Rate</label>
                                                <input type="number" value="{{ old('Rate') }}" class="form-control" name="Rate[]" placeholder="Enter Rate" required>
                                                {{-- <span class="text-danger">{{ $errors->first('Rate') }}</span> --}}
                                            </div>
                                            <div class="col-md-2 mt-4">
                                            <button type="button" id="add-more" class="btn btn-primary">
                                                <i class="bx bxs-plus-square"></i>Add Product
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">



                                <!-- Received Amount Field -->
                                <div class="col-md-3 mb-3">
                                    <label for="ReceivedAmount" class="form-label">Received Amount</label>
                                    <input type="number" value="{{ old('ReceivedAmount') }}" class="form-control" name="ReceivedAmount" id="ReceivedAmount" placeholder="Enter Received Amount" required>
                                    <span class="text-danger">{{ $errors->first('ReceivedAmount') }}</span>
                                </div>


                            </div>

                            <!-- Save Button -->
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Save Billing</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- JavaScript to handle Add More functionality -->
        <script>
            document.getElementById('add-more').addEventListener('click', function() {
                let productContainer = document.getElementById('product-container');
                let newProduct = document.createElement('div');
                newProduct.classList.add('col-lg-12', 'product-item');
                newProduct.innerHTML = `
                    <div class="">
                        <div class="row">
                            <!-- Product Name Field -->
                            <div class="col-md-3 mb-3">
                                <label for="product" class="form-label">Product Name</label>
                                 <input class="form-control" name="product[]" id="product" required>
                                                </input>
                            </div>

                            <!-- Quantity Field -->
                            <div class="col-md-2 mb-3">
                                <label for="Quantity" class="form-label">Quantity</label>
                                <input type="number" value="{{ old('Quantity') }}" class="form-control" name="Quantity[]" placeholder="Enter Quantity" required>
                            </div>

                            <!-- Rate Field -->
                            <div class="col-md-2 mb-3">
                                <label for="Rate" class="form-label">Rate</label>
                                <input type="number" value="{{ old('Rate') }}" class="form-control" name="Rate[]" placeholder="Enter Rate" required>
                            </div>

                            <!-- Remove Button -->
                            <div class="col-md-1 mb-3 d-flex align-items-end">
                                <button type="button" class="btn btn-danger remove-product">Remove</button>
                            </div>
                        </div>
                    </div>
                `;

                productContainer.appendChild(newProduct);
            });

            // Event delegation for remove buttons
            document.getElementById('product-container').addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-product')) {
                    event.target.closest('.product-item').remove();
                }
            });

            document.getElementById('customer').addEventListener('change', function() {
                var customerId = this.value;

                if (customerId) {
                    fetch('/get-previous-amount/' + customerId)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('PreviousAmount').value = data.total_amount !== null ? data.total_amount : 0;
                        })
                        .catch(error => console.error('Error fetching previous amount:', error));
                } else {
                    document.getElementById('PreviousAmount').value = 0; // Reset to 0 if no customer is selected
                }
            });
        </script>
@endsection
