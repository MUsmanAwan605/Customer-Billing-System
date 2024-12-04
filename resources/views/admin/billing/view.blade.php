@extends('admin.admin_dashboard')
@section('admin')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

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
    <!--Message  End-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <!-- Seach method start -->
                    <form method="GET" action="{{ route('billing.search') }}">
                        <div class="d-lg-flex">
                            <div class="col-8">
                                <input type="search" name="search" class="form-control" placeholder="Search By Phone And Name">
                            </div>
                            <div class="ms-2">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                            <div class="ms-2">
                                <a href="/admin/billing">
                                    <button type="button" class="btn btn-danger">Reset</button>
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- Seach method Close -->
                    <div class="ms-auto"><a href="{{ route('admin.billing.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New</a></div>
                </div>
                @if ($records->count()>0)

                                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>

                                <th>Date</th>
                                <th>Company Name</th>
                                <th>Bill AMount</th>
                                <th>Previous Amount</th>
                                <th>Total Amount</th>
                                <th>Received Amount</th>
                                <th>Remaining Balance</th>
                                <th>View Details</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>

                                    <td>{{ $record->date }}</td>
                                    <td>{{ $record->c_id }}</td>
                                    <td>{{ $record->bil_amt }}</td>
                                    <td>{{ $record->p_amt }}</td>
                                    <td>{{ $record->tot_amt }}</td>
                                    <td>{{ $record->r_amt }}</td>
                                    <td>{{ $record->bal_amt }}</td>
                                    <td><a href="{{ route('admin.billing.show', $record->id) }}" class="btn btn-primary btn-sm radius-30 px-4">View Details</a></td>
                                    {{-- <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('admin.billing.edit', $bill->id) }}" class=""><i class='bx bxs-edit'></i></a>
                                            <a href="javascript:;" class="ms-3" onclick="confirmDelete({{ $bill->id }})"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {!! $records->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
                @else
                <div class="alert alert-danger">No Record Found</div>
                @endif
            </div>

        </div>

    </div>
</div>
<!--end page wrapper -->
