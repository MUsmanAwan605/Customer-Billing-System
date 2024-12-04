@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-color pe-3">Product</div>
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

            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                           <!-- Seach method start -->
                    <form method="GET" action="{{ route('admin.product.search') }}">
                        <div class="d-lg-flex">
                            <div class="col-8">
                                <input type="search" name="search" class="form-control" placeholder="Search By Phone">
                            </div>
                            <div class="ms-2">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                            <div class="ms-2">
                                <a href="/admin/product">
                                    <button type="button" class="btn btn-danger">Reset</button>
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- Seach method Close -->
                        <div class="ms-auto"><a href="{{ route('admin.product.create') }}"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New product</a></div>
                    </div>
                    @if ($records->count()>0)


                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>

                                    <th>Products Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                    <tr>

                                        <td>{{ $record->prod }}</td>


                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{ route('admin.product.edit', $record->id) }}"
                                                    class=""><i class='bx bxs-edit'></i></a>
                                                <form method="POST"
                                                    action="{{ route('admin.product.destroy', ['id' => $record->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete?')"
                                                        style="outline:none;border:none;background:transparent">
                                                        <a href="{{ route('admin.product.destroy', ['id' => $record->id]) }}"
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
                        {!! $records->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                    @else
                    <div class="alert alert-danger">No Record Found</div>
                    @endif
                </div>
            </div>


        </div>
    </div>
@endsection
