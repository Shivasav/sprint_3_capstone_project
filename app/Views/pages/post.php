<?php $this->extend('layout/layout'); ?>

<?php $this->section('content'); ?>
<!-- =======================
Main Content START -->
<section class="pt-0 mb-4">
	<div class="container" data-sticky-container>
		<div class="row g-4">

			<!-- Main content START -->
			<div class="col-xl-8">
				<div class="vstack gap-2">

					<div class="alert bg-info bg-opacity-10 text-info " role="alert">
						<h4 class="alert-heading">Important Notice</h4>
						<p>Our website is a public directory connecting users with drivers. Your email and phone number will only be used for direct customer communication,
							 ensuring a seamless experience. Your data's privacy and security are our top priorities.</p>
					</div>

					<!-- Trip Details START -->
					<div class="card border">
						<!-- Card header -->
						<div class="card-header border-bottom bg-transparent">
							<h4 class="mb-0">Trip Details</h4>
						</div>

						<!-- Card body START -->
						<div class="card-body">
							<!-- Form START -->
							<form class="row g-4" id="post-trip">
								<input type="hidden" value="1" id="type">
								<!-- Input -->
								<div class="col-md-6">
									<div class="form-control-bg-light">
										<label class="form-label">Departure from</label>
										<input type="text" id="departure-input" class="form-control form-control-lg" placeholder="Enter departure address" >
										<input type="hidden" id="departure-city-input">
										<input type="hidden" id="departure-postal-input">
										<input type="hidden" id="departure-province-input">
										<div class="form-text">This will help customer, where you departure</div>
									</div>
								</div>

								<!-- Input -->
								<div class="col-md-6">
									<div class="form-control-bg-light">
										<label class="form-label">Drop Address</label>
										<input type="text" id="drop-input" class="form-control form-control-lg" placeholder="Enter drop address">
										<input type="hidden" id="drop-city-input" >
										<input type="hidden" id="drop-postal-input" >
										<input type="hidden" id="drop-province-input">
										<div class="form-text">This will help customer to find where you going!</div>
									</div>
								</div>


								<!-- Date -->
								<div class="col-md-6">
									<div class="form-control-bg-light">
										<label class="form-label small">Departure Date</label>
										<input id="date-input" type="text" class="form-control flatpickr"  data-date-format="Y-m-d" placeholder="Select date">
									</div>
								</div>

								<!-- Time -->
								<div class="col-md-6 text-md-end">
									<div class="form-control-bg-light">
										<label class="form-label small ms-3 ms-md-0 me-md-3">Departure time</label>
										<input id="time-input" type="text" class="form-control flatpickr text-md-end" data-enableTime="true" data-noCalendar="true" placeholder="Select time">
									</div>
								</div>

								<h5 class="mb-0 mt-4">Preference & Personal Information</h5>

								<!-- Radio button -->
								<div class="col-md-4">
									<label class="form-label">Allow Gender</label>
						
									<div>
										<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
											<input type="radio" class="btn-check" name="btnradio" id="btnradio1"  value="1">
											<label class="btn btn-sm btn-light btn-dark-bg-check mb-0" for="btnradio1">Male</label>
										
											<input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="2">
											<label class="btn btn-sm btn-light btn-dark-bg-check mb-0" for="btnradio2" >Female</label>

											<input type="radio" class="btn-check" name="btnradio" id="btnradio3" checked value="3">
											<label class="btn btn-sm  btn-light btn-dark-bg-check mb-0" for="btnradio3"  >All</label>
										</div>
									</div>	
								</div>

								<!-- Input -->
								<div class="col-md-4">
									<div class="form-control-bg-light">
										<label class="form-label">Available seats</label>
										<input id="available-seats-input" type="number" min="1" max="10" class="form-control form-control-lg" placeholder="Enter your available seats">
									</div>
								</div>

								<!-- Input -->
								<div class="col-md-4">
									<div class="form-control-bg-light">
										<label class="form-label">Fare Per seat</label>
										<input id="fare-input" type="number" class="form-control form-control-lg" placeholder="Enter your fair $" step="any">
										<small id="recomend-fare" class="form-text text-success"></small>
									</div>
								</div>


								<!-- Input -->
								<div class="col-md-4">
									<div class="form-control-bg-light">
										<label class="form-label">Name</label>
										<input id="name-input" type="text" class="form-control form-control-lg" placeholder="Enter your name">
									</div>
								</div>




								<!-- Input -->
								<div class="col-md-4">
									<div class="form-control-bg-light">
										<label class="form-label">Email id</label>
										<input id="email-input" type="email" class="form-control form-control-lg" placeholder="Enter your email">
									</div>
								</div>

								<!-- Input -->
								<div class="col-md-4">
									<div class="form-control-bg-light">
										<label class="form-label">Whatsapp or Mobile number</label>
										<input id="mobile-input" type="text" class="form-control form-control-lg" placeholder="Enter your mobile number" maxlength="10">
									</div>
								</div>

								<!-- Input -->
								<div class="col-md-12">
									<div class="form-control-bg-light">
										<label class="form-label">Trip description (Optional)</label>
										<textarea id="description-input" class="form-control form-control-lg" placeholder="Add any details relevant to your trip for passengers before they come with you?"></textarea>
									</div>
								</div>

							<!-- Button -->
							<div class="d-grid">
								<button id="post-trip-button" class="btn btn-success mb-0">Lets find some riders!</button>
							</div>

							</form>
							<!-- Form END -->
						</div>
						<!-- Card body END -->
					</div>
					<!-- Trip Details END -->

					
				</div>
			</div>
			<!-- Main content END -->

			<!-- Sidebar START -->
			<aside class="col-xl-4">
				<div class="text-center" data-sticky data-margin-top="80" data-sticky-for="1199">
					<div class="card card-body bg-light ">
					    <div class="w-100" id="map" class="col-md-12" style="height: 400px;"></div>
					</div>
					<a href="#" id="distance-badge-id" class="badge text-bg-success mt-1"><i class="fas fa-circle me-2 small fw-bold"></i>
						Distance <span id="distance-span">-</span>
					</a>
					<a href="#" id="duration-badge-id" class="badge text-bg-info mt-1"><i class="fas fa-circle me-2 small fw-bold"></i>
						Duration <span id="duration-span">-</span>
					</a>
				</div> 
			</aside>
			<!-- Sidebar END -->
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="knowMoreModal" tabindex="-1" aria-labelledby="knowMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="knowMoreModalLabel">Recommended Fare</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive mb-1">
				<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Distance</th>
                                <th scope="col">Recommended Fare</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Less than or equal to 15 km</td>
                                <td>Fixed $8</td>
                            </tr>
                            <tr>
                                <td>More than 15 km</td>
                                <td>25 cents per kilometer</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p >Publishing your trip within these fare recommendations enhances your likelihood of receiving booking requests. Requesting a higher fare might lead passengers to explore alternatives, such as booking with different drivers or considering alternative transportation like buses, if your rate becomes excessive.</p>
                <p>Our recommendations for reasonable pricing are determined by:</p>
                <ul>
                    <li>Current pricing patterns for this route.</li>
                    <li>The competitive landscape involving buses and other travel choices for the same route which is usually $3.00</li>
                    <li>The distance covered and the overall fuel expenses involved in completing this journey.</li>
                </ul>
                <p>Keep in mind that we cap the maximum price at 25 cents per kilometer to support covering your gas and insurance costs while carpooling.</p>
            </div>
        </div>
    </div>
</div>
<!-- =======================
Main Content END -->
<?php $this->endSection(); ?>