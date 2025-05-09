
		<!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="/assets/js/jquery-3.6.0.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="/assets/js/bootstrap.bundle.min.js"></script>

		<!-- Custom JS -->
		<script src="/assets/js/script.js"></script>
		<!-- Datetimepicker JS -->
		<script src="/assets/js/moment.min.js"></script>
		<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Full Calendar JS -->
        <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="/assets/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="/assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>

	</body>
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

</html>
