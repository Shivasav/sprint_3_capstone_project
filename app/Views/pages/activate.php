<?php $this->extend('layout/layout'); ?>

<?php $this->section('content'); ?>
<!-- =======================
Main Content START -->
	
<section class="vh-xxl-100">
	<div class="container h-100 d-flex px-0 px-sm-4">
		<div class="row justify-content-center align-items-center m-auto">
			<div class="col-12">
				<div class="shadow bg-mode rounded-3 overflow-hidden">
					<div class="row g-0 align-items-center">
						<!-- Vector Image -->
						<div class="col-lg-6 d-md-flex align-items-center order-2 order-lg-1">
							<div class="p-3 p-lg-5">
								<img src="<?= base_url('public/assets/images/element/forgot-pass.svg'); ?>" alt="">
							</div>
							<!-- Divider -->
							<div class="vr opacity-1 d-none d-lg-block"></div>
						</div>
		
						<!-- Information -->
						<div class="col-lg-6 order-1">
							<div class="p-4 p-sm-7">
								<!-- Logo -->
								<a href="index.html">
									<img class="mb-4 h-50px" src="<?= base_url('public/assets/images/logo-black.png'); ?>" alt="logo">
								</a>
								<!-- Title -->
								<h1 class="mb-2 h3">Activate your Trip</h1>
								<p class="mb-sm-0">We have to send a code to your Email Address.</p>
								
								<!-- Form START -->
								<form class="mt-sm-4" id="activation-form">
									<!-- Input box -->
									<p class="mb-1">Enter the code we have sent you to activate your trip:</p>
									<div class="autotab d-flex justify-content-between gap-1 gap-sm-3 mb-2">
										<input type="text" maxlength="10" id="active-code" class="form-control text-center p-3">	
									</div>
									
									<!-- Button link -->
									<div class="d-sm-flex justify-content-between small mb-4">
										<span>Don't get a code?</span>
										<a href="#" class="btn btn-sm btn-link p-0 text-decoration-underline mb-0">Click to resend</a>
									</div>

									<!-- Button -->
									<div><button type="submit" class="btn btn-primary w-100 mb-0">Verify and Process</button></div>
		
									<!-- Copyright
									<div class="text-primary-hover mt-3 text-center"> Contact us <a href="#">Webestica</a>. </div> -->
								</form>
								<!-- Form END -->
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Main Content END -->
<?php $this->endSection(); ?>