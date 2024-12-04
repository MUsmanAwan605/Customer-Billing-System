<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo e(asset('backend/assets/images/favicon-32x32.png')); ?>" type="image/png" />
	<!--plugins-->
	<link href="<?php echo e(asset('backend/assets/plugins/simplebar/css/simplebar.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')); ?>" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo e(asset('backend/assets/css/pace.min.css')); ?>" rel="stylesheet" />
	<script src="<?php echo e(asset('backend/assets/js/pace.min.js')); ?>"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo e(asset('backend/assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('backend/assets/css/bootstrap-extended.css')); ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?php echo e(asset('backend/assets/css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('backend/assets/css/icons.css')); ?>" rel="stylesheet">
	<title>Blling</title>
</head>


<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">

					<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
							<div class="card-body">
                                 <img src="<?php echo e(asset('backend/assets/images/login-images/login-cover.svg')); ?>" class="img-fluid auth-img-cover-login" width="650" alt=""/>
							</div>
						</div>

					</div>

					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
								<div class="">
									<div class="mb-3 text-center">
										<img src="<?php echo e(asset('backend/assets/images/logo-icon.png')); ?>" width="60" alt="">
									</div>
									<div class="text-center mb-4">
                                        <h5 class="fw-bold">HAQ YARN CONE DYING</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST" action="<?php echo e(route('login')); ?>">
                                            <?php echo csrf_field(); ?>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label" :value="__('Email')">Email</label>
												<input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputEmailAddress" name="email" :value="old('email')" placeholder="Email@example.com">
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger mt-2"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" :value="__('Password')">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
												</div>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger mt-2"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
											

											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Sign in</button>
												</div>
											</div>
											<div class="col-12">
												<div class="text-center ">
													<p class="mb-0">Don't have an account yet? <a href="<?php echo e(route('register')); ?>">Sign up here</a>
													</p>
												</div>
											</div>
										</form>
									</div>
									<div class="login-separater text-center mb-5"> <span>OR SIGN IN WITH</span>
										<hr>
									</div>
									<div class="list-inline contacts-social text-center">
										<a href="javascript:;" class="list-inline-item bg-facebook text-white border-0 rounded-3"><i class="bx bxl-facebook"></i></a>
										<a href="javascript:;" class="list-inline-item bg-twitter text-white border-0 rounded-3"><i class="bx bxl-twitter"></i></a>
										<a href="javascript:;" class="list-inline-item bg-google text-white border-0 rounded-3"><i class="bx bxl-google"></i></a>
										<a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0 rounded-3"><i class="bx bxl-linkedin"></i></a>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?php echo e(asset('backend/assets/js/bootstrap.bundle.min.js')); ?>"></script>
	<!--plugins-->
	<script src="<?php echo e(asset('backend/assets/js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/assets/plugins/simplebar/js/simplebar.min.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')); ?>"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="<?php echo e(asset('backend/assets/js/app.js')); ?>"></script>
</body>
</form>


</html>
<?php /**PATH C:\xampp\htdocs\biling\resources\views/auth/login.blade.php ENDPATH**/ ?>