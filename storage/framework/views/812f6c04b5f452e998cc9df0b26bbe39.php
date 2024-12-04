<?php $__env->startSection('admin'); ?>
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
        <?php if(session('success')): ?>
        <div class="alert alert-danger" style="font: 500" id="alertMessage">
            <?php echo e(session('success')); ?>

        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alertMessage').style.display = 'none';
            }, 3000);
        </script>
    <?php endif; ?>
<!--Message  End-->

            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <!-- Seach method start -->
                    <form method="GET" action="<?php echo e(route('admin.customer.search')); ?>">
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
                        <div class="ms-auto"><a href="<?php echo e(route('admin.customer.create')); ?>"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New customer</a></div>
                    </div>
                    <?php if($customers->count()>0): ?>

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
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td><?php echo e($customer->name); ?></td>
                                        <td><?php echo e($customer->email); ?></td>
                                        <td><?php echo e($customer->phone); ?></td>
                                        <td><?php echo e($customer->address); ?></td>

                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="<?php echo e(route('admin.customer.edit', $customer->id)); ?>"
                                                    class=""><i class='bx bxs-edit'></i></a>
                                                <form method="POST"
                                                    action="<?php echo e(route('admin.customer.destroy', ['id' => $customer->id])); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete?')"
                                                        style="outline:none;border:none;background:transparent">
                                                        <a href="<?php echo e(route('admin.customer.destroy', ['id' => $customer->id])); ?>"
                                                            class="ms-3"><i class='bx bxs-trash'></i></a>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        <?php echo $customers->withQueryString()->links('pagination::bootstrap-5'); ?>

                    </div>
                    <?php else: ?>
                    <div class="alert alert-danger">No Record Found</div>
                    <?php endif; ?>
                </div>
            </div>


        </div>
    </div>
    
    

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\biling\resources\views/admin/customer/index.blade.php ENDPATH**/ ?>