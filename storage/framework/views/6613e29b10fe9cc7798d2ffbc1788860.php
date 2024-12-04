<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            

              


              <div class="top-menu ms-auto">
                
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">


                    <div class="perent-icon">
                        <i class="bx bx-user fs-5"></i>
                    </div>

                    <div class="user-info">
                        <p class="user-name mb-0 text-uppercase"><?php echo e(Auth::user()->name); ?> </p>
                        <p class="designattion mb-0"></p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.profile')); ?>"><i
                                class="bx bx-user fs-5"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center"
                            href="<?php echo e(route('admin.change.password')); ?>"><i class="bx bx-cog fs-5"></i><span>Change
                                Password</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                    </li>

                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.logout')); ?>"><i
                                class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\biling\resources\views/admin/body/header.blade.php ENDPATH**/ ?>