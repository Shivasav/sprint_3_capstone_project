<?php $this->extend('layout/layout'); ?>

<?php $this->section('content'); ?>
<!-- =======================
Main Content START -->

<?php if($details && $contact):?>
<section class="pt-2 pt-md-5 mb-4">
	<div class="container">
		<div class="row g-4">
			<div class="col-xl-9 mx-auto">
				<div class="vstack gap-4">

					<?php
						if($contact[0]['email_verify'] == 0):
					?>
					<div class="alert alert-danger d-flex align-items-center rounded-3 mb-0" role="alert">
						<h4 class="mb-0 alert-heading"><i class="bi bi-exclamation-octagon-fill me-2"></i> </h4>
						<div class="ms-3">
							<h6 class="mb-0 alert-heading">Error! Your Email Address is not verified</h6>
							<p class="mb-0">This Trip is not visiable to general public, verify your email Address first. Just submit a new trip on the same email to re-verify.</p>
						</div>
					</div>
					<?php endif;?>

					<!-- Booking summary START -->
					<div class="card shadow">
						<!-- Card header -->
						<div class="card-header border-bottom p-4">
							<h3 class="mb-0 fs-3">Trip Details: <?= ($details->type == 1) ? 'Driver' : 'Passenger'; ?></h3>
						</div>

						<!-- Card body START -->
						<div class="card-body p-4">
							<div class="row g-md-4">
								<!-- Card and address detail -->
								<div class="col-12">
									<!-- Title -->
									<h5 class="card-title mb-2"><?= $details->departure_city;?> to <?= $details->dropping_city;?></h5>
									
									<!-- Pick up and drop address -->
									<div class="row">
										<div class="col-md-6">
											<small>Departure address</small>
											<p class="h6 fw-light mb-md-0"><a class="text-secondary" href="https://www.google.com/maps/search/?q=<?= urlencode($details->departure);?>"><?= $details->departure;?></a></p>
										</div>

										<div class="col-md-6">
											<small>Drop address</small>
											<p class="h6 fw-light mb-0"><a class="text-secondary" href="https://www.google.com/maps/search/?q=<?= urlencode($details->drop_location);?>"><?= $details->drop_location;?></a></p>
										</div>

										<div class="d-grid gap-2 d-md-block mt-2">
										    <a class="btn btn-warning-soft" href="https://www.google.com/maps/dir/<?= urlencode($details->departure).'/'.urlencode($details->drop_location).'/'; ?>" target="_blank"><i class="bi bi-map"></i> View Route on GMaps</a>
											<a href="mailto:<?=$contact[0]['email'];?>" class="btn btn-primary-soft"><i class="bi bi-envelope-at-fill"></i> Email</a>
											<a href="https://api.whatsapp.com/send?phone=+1<?=$contact[0]['phone'];?>&text=Hi, I found you on pointrover.com are you available a trip?" class="btn btn-success-soft" ><i class="bi bi-whatsapp"></i> Whatsapp</a>
											<a href="tel:+1<?=$contact[0]['phone'];?>" class="btn btn-secondary-soft"><i class="bi bi-phone"></i> Call</a>
										</div>

									</div>
								</div>

								<div class="col-md-6 mt-2 mb-2">
									<ul class="list-group ">
									<?php
										// Convert date and time to DateTime objects
										$dateTime = new DateTime($details->date . ' ' . $details->time);
										
										// Format date and time
										$formattedDate = $dateTime->format('l, F j \a\t g:ia');
									?>

										<li class="list-group-item">Journey Date:<span class="h6 fw-normal mb-0 ms-1"><?= $formattedDate;?></span></li>
										<li class="list-group-item">Distance:<span class="h6 fw-normal mb-0 ms-1"><?= $details->distance;?> in ~<?= $details->estimate_time;?> </span></li>
									</ul>
								</div>

								<?php if($details->type == 1) :?>

									<div class="col-md-6 mt-2 mb-2">
										<ul class="list-group">
											<li class="list-group-item">Seats available:<span class="h6 fw-normal mb-0 ms-1"><?= $details->available_seats;?></span></li>
											<li class="list-group-item">Allow Gender:
												<span class="h6 fw-normal mb-0 ms-1">
												<?php if ($details->gender == 1): ?>
														Male Only
													<?php elseif ($details->gender == 2): ?>
														Female Only
													<?php else: ?>
														Any
													<?php endif; ?>
												</span>
										</li>
										</ul>
									</div>
									<?php endif; ?>
							</div>

							<!-- Title -->
							<h6 class="mb-0 mt-3"> <?= ($details->type == 1) ? 'Driver' : 'Passenger'; ?> Details</h6>

							<div class="row">
								<!-- List -->
								<div class="col-sm-8">
									<ul class="list-group mb-0">
										<li class="list-group-item">Name:<span class="h6 mb-0 fw-normal ms-1"><?= $contact[0]['name'];?></span></li>
										<li class="list-group-item">Note:	
											<p class="form-text">
												<?php if ($details->note == ""): ?>
													N/A
												<?php else: ?>
													<?= $details->note;?>
												<?php endif; ?>
											</p>
										</li>
									</ul>
								</div>

								<?php if($details->type == 1) :?>
									<!-- Price -->
									<div class="col-sm-4 text-sm-end mt-3 mt-sm-auto">
										<h6 class="mb-1 fw-normal">Per Seat</h6>
										<h2 class="mb-0 text-success">$<?= $details->fare;?></h2>
									</div>

								<?php elseif($details->type == 2) :?>
									<div class="col-sm-4 text-sm-end mt-3 mt-sm-auto">
										<h6 class="mb-1 fw-normal">Seats Required:</h6>
										<h2 class="mb-0 text-danger"><?= $details->available_seats;?></h2>
									</div>
								<?php endif; ?>
							</div>
							<!--<hr/>
							<div class="row g-md-4">
								<div class="col-md-2"><span class="text-success">Status: OPEN</span></div>
								<div class="col-md-4 "><span class="text-danger mt-1 mb-1">Expired on 20, Jan 2023 at 3:00pm</span></div>
								<div class="col-md-6">
									<div class="d-grid gap-2 d-md-block">
										<select class="form-select js-choice">
											<option value="">Select Status</option>
											<option value="1">OPEN</option>
											<option value="0">CLOSED</option>
										</select>
										<a href="#" class="btn btn-danger mt-2">Delete</a>
									</div>
								</div>-->
								
							</div>
						</div>	
						<!-- Card body END -->
					</div>
					<!-- Booking summary END -->

				
				</div>
			</div>
		</div>
	</div>
</section>
<?php else:?>
	<p class="text-center text-danger" >Error! Unable to load the details. Try again later.</p>
<?php endif;?>
<!-- =======================
Main Content END -->
<?php $this->endSection(); ?>