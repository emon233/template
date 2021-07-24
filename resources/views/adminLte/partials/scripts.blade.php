<!-- jQuery -->
<script src="{{ asset('assets/adminLte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('assets/adminLte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('assets/adminLte/dist/js/adminlte.min.js') }}"></script>
<!-- Custom Scripts -->
<script src="{{ asset('assets/adminLte/custom/scripts.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#btn-signout').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Signout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-signout').submit();
                } else {
                    cancelOperation("error", "Operation Canceled");
                }
            })
        })
    })

    function cancelOperation(op = null, msg = null) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: op ? op : "success",
            title: msg
        })
    }

</script>
