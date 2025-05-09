        <!-- jQuery -->
        <script src="/assets_admin/js/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap Core JS -->
        <script src="/assets_admin/js/bootstrap.bundle.min.js"></script>

        <!-- Slimscroll JS -->
        <script src="/assets_admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="/assets_admin/plugins/raphael/raphael.min.js"></script>
        <script src="/assets_admin/plugins/morris/morris.min.js"></script>
        <script src="/assets_admin/js/chart.morris.js"></script>

        <!-- Custom JS -->
        <script src="/assets_admin/js/script.js"></script>

        <!-- Sweet Alerts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Warning Message --}}
        @if(session()->has('failed'))
            <script type="text/javascript">
                Swal.fire({
                    icon: 'warning',
                    title: '{{ session('failed') }}',
                    showConfirmButton: false,
                    timer: 2000,
                    customClass: {
                        popup: 'sweetalert-message' // Apply custom CSS class to the message
                    }
                });
            </script>
            @php
                session()->forget('failed');
            @endphp
        @endif

        {{-- Success Message --}}
        @if(session()->has('success'))
            <script type="text/javascript">
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000,
                    customClass: {
                        popup: 'sweetalert-message' // Apply custom CSS class to the message
                    }
                });
            </script>
            @php
                session()->forget('success');
            @endphp
        @endif

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            function numberOnly(id) {
                let input = document.getElementById(id);
                let value = input.value;
                if (value.length > input.maxLength) {
                    input.value = value.substring(0, input.maxLength);
                }
            }
        </script>


    </body>
</html>

	

