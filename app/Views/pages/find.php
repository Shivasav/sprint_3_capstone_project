<?php $this->extend('layout/layout'); ?>

<?php $this->section('content'); ?>
<!-- =======================
Search START -->

<section class="bg-primary mb-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Booking from START -->
				<div class="form-control-bg-light bg-mode border p-4 rounded-3">
	
					<!-- Tab content START -->
					<div class="tab-content mt-0" id="pills-tabContent">
						<!-- One way tab START -->
						<div class="tab-pane fade show active" id="cab-one-way" role="tabpanel" aria-labelledby="cab-one-way-tab">
							<form class="row g-4 align-items-center">
								<div class="col-xl-10">
									<div class="row g-4">
										<!-- Pickup -->
										<div class="col-md-6 col-xl-4">
											<div class="form-size-lg">
												<label class="form-label">Pickup</label>
												<input id="pickup-input" class="form-control" type="text" placeholder="Enter pickup location">
											</div>
										</div>
			
										<!-- Drop -->
										<div class="col-md-6 col-xl-4">
											<div class="form-size-lg">
												<label class="form-label">Drop</label>
												<input  id="drop-input" class="form-control" type="text" placeholder="Enter drop off location">
											</div>
										</div>
			
										<!-- Date -->
										<div class="col-md-6 col-xl-2">
											<label class="form-label">Pickup Date</label>
											<input id="date-input" type="text" class="form-control flatpickr" placeholder="Select date">
										</div>
										
										<!-- Time -->
										<div class="col-md-6 col-xl-2">
											<label class="form-label">Pickup time</label>
											<input id="time-input" type="text" class="form-control flatpickr text-md-end" data-enableTime="true" data-noCalendar="true" placeholder="Select time">
										</div>
									</div>	
								</div>		
			
								<div class="col-xl-2 d-grid mt-xl-auto">
									<button id="search-btn" class="btn btn-lg btn-primary mb-0">update</button>
								</div>
							</form>
						</div>
						<!-- One way tab END -->

					</div>
					<!-- Tab content END -->
				</div>
				<!-- Booking from END -->
			</div>
		</div>
	</div>
</section>
<!-- =======================
Search START -->
	
<!-- =======================
Titles START -->
<section class="pt-2">
	<div class="container position-relative">

		<!-- Title and button START -->
		<div class="row">
			<div class="col-12">
				<div class="d-sm-flex justify-content-sm-between align-items-center">
					<!-- Title -->
					<div class="mb-2 mb-sm-0">
						<h1 class="fs-3 mb-2"><?= $pagination['totalRows'];?> Trips Available</h1>
						<!-- Divider -->
						<ul class="nav nav-divider h6 mb-0">
							<li class="nav-item">One-way trip</li>
						</ul>
					</div>

				</div>	
			</div>
		</div>
		<!-- Title and button END -->

	</div>
</section>
<!-- =======================
Titles END -->

<!-- =======================
Cab list START -->
<section class="pt-0">
	<div class="container" data-sticky-container>
		<div class="row">
			<!-- Main content START -->
			<div class="col-xl-8 col-xxl-9">
				<div class="vstack gap-4">
					
				<!-- grid START -->
				<div class="row g-4 mb-2">
					<?php foreach ($pagination['result'] as $tripData): ?>
						<?php
							// Convert date and time to DateTime objects
							$dateTime = new DateTime($tripData->date . ' ' . $tripData->time);
							
							// Format date and time
							$formattedDate = $dateTime->format('l, F j \a\t g:ia');
							?>

                      <?php if($tripData->type == 1) :?>
							<!-- item -->
							<div class="col-lg-6 ">
								<div class="card shadow p-3">
									<div class="row g-4">
										<!-- Card img -->
										<div class="col-3">
										<img src="<?= base_url('public/assets/images/element/steering-wheel.png');?>" class="rounded-2" alt="Card image">
										</div>

										<!-- Card body -->
										<div class="col-9">
											<a href="<?= base_url('/detail/'.$tripData->id); ?>" class="stretched-link">
											<div class="card-body position-relative d-flex flex-column p-0 h-100">
												<!-- Title -->
												<h5 class="card-title mb-0 me-5 h6"><a href="hotel-detail.html"><?= $tripData->departure_city; ?> To <?= $tripData->dropping_city; ?></a></h5>
												<small><i class="fas fa-clock"></i> <?= $formattedDate; ?></small>
												<small><i class="fas fa-map-marker-alt"></i> <?= $tripData->drop_location; ?> </small>
										
												<ul class="nav nav-divider mb-0">
													<li class="nav-item mb-0">
													  <i class="fas fa-male"></i>
														<?php if ($tripData->gender == 1): ?>
														 Male Only
														<?php elseif ($tripData->gender == 2): ?>
															Female Only
														<?php else: ?>
															All Genders
														<?php endif; ?>
													</li>
													<li class="nav-item mb-0"><i class="fas fa-chair"></i>
													 <?= $tripData->available_seats; ?> seats left
													</li>
												</ul>
												
												<div class="d-flex justify-content-between mt-1">
													<?php if ($tripData->email_verify == 1): ?>
														<div class="small text-success"><i class="bi bi-patch-check-fill me-2"></i> Email Verified</div>
													<?php endif; ?>
													<div class="mr-auto"><span class="h6 text-success">$<?= $tripData->fare ?></span> / Seat</div>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>

							<?php elseif($tripData->type == 2) :?>
							<!-- item -->
							<div class="col-lg-6">
								<div class="card shadow p-3">
									<div class="row g-4">
										<!-- Card img -->
										<div class="col-3">
											<img src="<?= base_url('public/assets/images/element/car-seat.png');?>" class="rounded-2" alt="Card image">
										</div>

										<!-- Card body -->
										<div class="col-9">
											<a href="<?= base_url('/detail/'.$tripData->id); ?>" class="stretched-link">
											<div class="card-body position-relative d-flex flex-column p-0 h-100">

												<!-- Title -->
												<h5 class="card-title mb-0 me-5 h6"><a href="hotel-detail.html"><?= $tripData->departure_city; ?> To <?= $tripData->dropping_city; ?></a></h5>
												<small><i class="fas fa-clock"></i> <?= $formattedDate; ?></small>
												<small><i class="fas fa-map-marker-alt"></i> <?= $tripData->drop_location; ?> </small>
												<?php if ($tripData->email_verify == 1): ?>
														<div class="small text-success mt-1"><i class="bi bi-patch-check-fill me-2"></i> Email Verified</div>
												<?php endif; ?>
												<!-- Price and Button -->
												<div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
													<!-- Price -->
													
													<div class="d-flex align-items-center">
														<span class="fw-bold mb-0 me-1 text-danger"><?= $tripData->available_seats; ?> Seats Required</span>
														
													</div>
												              
												</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>	
						<!-- Hotel grid END -->	
					<?php endforeach; ?>
					</div>

					<!-- Pagination -->
					<nav class="d-flex justify-content-center" aria-label="navigation">
						<ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
							<?php if ($pagination['totalPages'] > 1): ?>
								<!-- Previous page link -->
								<li class="page-item <?= $page === 1 ? 'disabled' : '' ?>">
									<a class="page-link" href="<?= $page > 1 ? buildPaginationLink($page - 1) : '#' ?>" tabindex="-1"><i class="fa-solid fa-angle-left"></i></a>
								</li>

								<!-- Generate pagination links -->
								<?php for ($i = 1; $i <= $pagination['totalPages']; $i++): ?>
									<li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="<?= buildPaginationLink($i) ?>"><?= $i ?></a></li>
								<?php endfor; ?>

								<!-- Next page link -->
								<li class="page-item <?= $page === $pagination['totalPages'] ? 'disabled' : '' ?>">
									<a class="page-link" href="<?= $page < $pagination['totalPages'] ? buildPaginationLink($page + 1) : '#' ?>"><i class="fa-solid fa-angle-right"></i></a>
								</li>
							<?php endif; ?>
						</ul>
					</nav>

				</div>
			</div>
			<!-- Main content END -->



				<!-- Left sidebar START -->
				<aside class="col-xl-4 col-xxl-3 mb-2">
				<div data-sticky data-margin-top="80" data-sticky-for="1199">
						<!-- Offcanvas body -->
						<a href="<?= base_url("/post-trip");?>">
							<div class="offcanvas-body flex-column p-3 p-xl-0 shadow  rounded-3">
									<!-- Passenger capacity START -->
									<div class="card card-body rounded-0 rounded-top p-4">
										<!-- Title -->
										<h6 class="mb-2">Are you driving?</h6>
										<span>Post a trip and cover your driving cost</span>
										<!-- Checkbox -->
									</div>
									<!-- Passenger capacity END -->
							</div>
						</a>
						<a href="<?= base_url("/request");?>">
							<div class="offcanvas-body flex-column p-3 p-xl-0 shadow rounded-3 mt-2">
									<!-- Passenger capacity START -->
									<div class="card card-body rounded-0 rounded-top p-4">
										<!-- Title -->
										<h6 class="mb-2">Need a ride?</h6>
										<span>Post a request to tell driver where you are going</span>
										<!-- Checkbox -->
									</div>
									<!-- Passenger capacity END -->
							</div>
						</a>
				</div> 	
			</aside>
			<!-- Left sidebar END -->


		</div> <!-- Row END -->

	</div>
</section>


<!-- =======================
Cab list END -->
<?php $this->endSection(); ?>