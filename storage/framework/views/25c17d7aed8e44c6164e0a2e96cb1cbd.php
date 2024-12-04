<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?php echo e(asset('backend/assets/images/logo-icon.png')); ?>" class="logo-icon" alt="logo icon">
        </div>
        <div class="pt-2">
            <h4 class="logo-text">HAQ YARN CONE DYING</h4>
        </div>
        <div class="toggle-icon ms-auto">
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            
        </li>
        
        
        <li>
            <a href="<?php echo e(route('admin.billing.index')); ?>" class="">
                <div class="parent-icon"><i class='bx bx-bar-chart-square'></i>
                </div>
                <div class="menu-title">Billing</div>
            </a>
            
                
                <li> <a href="<?php echo e(route('admin.customer.index')); ?>">
                    <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Customer</div>
                    </a>
                </li>

                

            

        </li>
        
    </ul>
    <!--end navigation-->
</div>
<?php /**PATH C:\xampp\htdocs\biling\resources\views/admin/body/sidebar.blade.php ENDPATH**/ ?>