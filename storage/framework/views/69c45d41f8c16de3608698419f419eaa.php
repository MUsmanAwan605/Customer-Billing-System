<?php $__env->startSection('admin'); ?>
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
                    <form method="GET" action="<?php echo e(route('billing.search')); ?>">
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
                    <div class="ms-auto"><a href="<?php echo e(route('admin.billing.create')); ?>" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New</a></div>
                </div>
                <?php if($bills->count()>0): ?>

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
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td><?php echo e($bill->date); ?></td>
                                    <td><?php echo e($bill->c_id); ?></td>
                                    <td><?php echo e($bill->bil_amt); ?></td>
                                    <td><?php echo e($bill->p_amt); ?></td>
                                    <td><?php echo e($bill->tot_amt); ?></td>
                                    <td><?php echo e($bill->r_amt); ?></td>
                                    <td><?php echo e($bill->bal_amt); ?></td>
                                    <td><a href="<?php echo e(route('admin.billing.show', $bill->id)); ?>" class="btn btn-primary btn-sm radius-30 px-4">View Details</a></td>
                                    
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <?php echo $bills->withQueryString()->links('pagination::bootstrap-5'); ?>

                </div>
                <?php else: ?>
                <div class="alert alert-danger">No Record Found</div>
                <?php endif; ?>
            </div>

        </div>

    </div>
</div>
<!--end page wrapper -->

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\biling\resources\views/admin/billing/index.blade.php ENDPATH**/ ?>