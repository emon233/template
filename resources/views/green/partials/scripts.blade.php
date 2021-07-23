<!-- jQuery -->
<script src="{{ asset('assets/adminLte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Vendor JS Files -->
<script src="{{ asset('assets/green/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/green/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/green/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/green/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/green/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/green/js/main.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#btn-signout').on('click', function(e) {
            e.preventDefault();

            if(confirm('Are You Sure?')) {
                $('#form-signout').submit();
            }
        })
    })

</script>
