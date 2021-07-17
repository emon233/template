<!-- jQuery -->
<script src="{{ asset('assets/adminLte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/adminLte/dist/js/adminlte.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#btn-signout').on('click', function(e) {
            e.preventDefault();
            if (confirm('Are You Sure?')) {
                $('#form-signout').submit();
            } else {
                alert("Operation Canceled");
            }
        })
    })
</script>
