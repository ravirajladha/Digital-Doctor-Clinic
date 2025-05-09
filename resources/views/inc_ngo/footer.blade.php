		<!-- jQuery -->
		<script src="/assets/js/jquery-3.6.0.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

		<!-- Full Calendar JS -->
		<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="/assets/plugins/fullcalendar/fullcalendar.min.js"></script>
		<script src="/assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>

		<!-- Sticky Sidebar JS -->
		<script src="/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
		<script src="/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

		<!-- Datetimepicker JS -->
		<script src="/assets/js/moment.min.js"></script>
		<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- SweetAlert JS -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

		<!-- Custom JS -->
		<script src="/assets/js/script.js"></script>
		<script src="/assets/js/circle-progress.min.js"></script>

		<script>
			function text(x) {
				var customPriceCont = document.getElementById('custom_price_cont');
				customPriceCont.style.display = x == 1 ? "block" : "none";
			}
		</script>

		<!-- Sweet Alerts -->
		@if (session()->has('failed'))
			<script type="text/javascript">
				Swal.fire({
					icon: 'warning',
					title: '{{ session('failed') }}',
					showConfirmButton: false,
					timer: 2000,
					customClass: {
						popup: 'sweetalert-message'
					}
				});
			</script>
			@php session()->forget('failed'); @endphp
		@endif

		@if (session()->has('success'))
			<script type="text/javascript">
				Swal.fire({
					icon: 'success',
					title: '{{ session('success') }}',
					showConfirmButton: false,
					timer: 2000,
					customClass: {
						popup: 'sweetalert-message'
					}
				});
			</script>
			@php session()->forget('success'); @endphp
		@endif
	</body>
</html>
