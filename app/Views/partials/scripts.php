<!-- Jquery JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="<?= base_url('public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>

<!-- Vendors -->
<script src="<?= base_url('public/assets/vendor/sticky-js/sticky.min.js');?>"></script>
<script src="<?= base_url('public/assets/vendor/flatpickr/js/flatpickr.min.js');?>"></script>
<script src="<?= base_url('public/assets/vendor/choices/js/choices.min.js');?>"></script>
<script src="<?= base_url('public/assets/vendor/nouislider/nouislider.min.js');?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<!-- ThemeFunctions -->
<script src="<?= base_url('public/assets/js/functions.js');?>"></script>
<script src="<?= base_url('public/assets/js/common.js');?>"></script>

<?php if ($title == "Home" || $title == "Find a ride") : ?>
    <!-- gmap lib -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2v53yalFYtB1R2QqZ4MNCWpHkv57MUXM&libraries=places&callback=initAutocomplete" async defer></script>
    <script src="<?= base_url('public/assets/js/gmap.js');?>"></script>
<?php endif; ?>

<?php if ($title == "Post a Trip" || $title == "Request") : ?>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2v53yalFYtB1R2QqZ4MNCWpHkv57MUXM&libraries=places&callback=initMap"></script>
   <script src="<?= base_url('public/assets/js/distance_matrix.js');?>"></script>
   <script src="<?= base_url('public/assets/js/postrip_validator.js');?>"></script>
<?php endif; ?>




