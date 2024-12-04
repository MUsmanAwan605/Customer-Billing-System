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

             <!--Message  Start-->
        @if (session('success'))
        <div class="alert alert-danger" style="font: 500" id="alertMessage">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alertMessage').style.display = 'none';
            }, 3000);
        </script>
    @endif
<!--Message  End-->

            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <!-- Seach method start -->
                    <form method="GET" action="{{ route('admin.customer.search') }}">
                        <div class="d-lg-flex">
                            <div class="col-8">
                                <input type="search" name="search" class="form-control" placeholder="Search By Phone And Name">
                            </div>
                            <div class="ms-2">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                            <div class="ms-2">
                                <a href="/admin/customer">
                                    <button type="button" class="btn btn-danger">Reset</button>
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- Seach method Close -->
                        <div class="ms-auto"><a href="{{ route('admin.customer.create') }}"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New customer</a></div>
                    </div>
                    @if ($customers->count()>0)

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>

                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>

                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{ route('admin.customer.edit', $customer->id) }}"
                                                    class=""><i class='bx bxs-edit'></i></a>
                                                <form method="POST"
                                                    action="{{ route('admin.customer.destroy', ['id' => $customer->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete?')"
                                                        style="outline:none;border:none;background:transparent">
                                                        <a href="{{ route('admin.customer.destroy', ['id' => $customer->id]) }}"
                                                            class="ms-3"><i class='bx bxs-trash'></i></a>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        {!! $customers->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                    @else
                    <div class="alert alert-danger">No Record Found</div>
                    @endif
                </div>
            </div>


        </div>
    </div>
    {{-- <-- Ajax Code Status Active and Deactive Code Start--> --}}
    {{-- <script>
        function toggleStatus(customerId, action) {
            let url = '';
            if (action === 'activate') {
                url = '{{ route('user.activate', ":id") }}'.replace(':id', customerId);
            } else {
                url = '{{ route('user.deactivate', ":id") }}'.replace(':id', customerId);
            }

            // Send AJAX request


            $.ajax({
                url: url,
                type: 'GET', // or 'POST' depending on your routes
                success: function(response) {
                    // Update the status text and link dynamically
                    let statusElement = $('#status-' + customerId);
                    if (action === 'activate') {
                        statusElement.html('<a href="javascript:void(0);" onclick="toggleStatus(' + customerId + ', \'deactivate\')">Active!</a>');
                    } else {
                        statusElement.html('<a href="javascript:void(0);" onclick="toggleStatus(' + customerId + ', \'activate\')">Deactive!</a>');
                    }

                    // Show a success message as an alert
                    alert(response.message);
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Handle any errors here
                }
            });
        }

        </script> --}}

  {{-- <-- Ajax Code Status Active and Deactive Code End--> --}}
@endsection
