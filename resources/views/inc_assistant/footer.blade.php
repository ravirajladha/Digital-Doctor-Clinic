
		<script>
			function text(x) {
				if (x == 1) document.getElementById('custom_price_cont').style.display = "block";
				else document.getElementById('custom_price_cont').style.display = "none";
			}
		</script>

		<!-- jquery -->
		<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

		<!-- Bootstrap Core JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

		<!-- Custom JS -->
		<script src="/assets/js/script.js"></script>
		<!-- Circle Progress JS -->
		<script src="/assets/js/circle-progress.min.js"></script>


		<!-- Datetimepicker JS -->
		<script src="/assets/js/moment.min.js"></script>
		<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Full Calendar JS -->
		<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="/assets/plugins/fullcalendar/fullcalendar.min.js"></script>
		<script src="/assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>

		<!-- Sticky Sidebar JS -->
		<script src="/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
		<script src="/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

		<!-- Circle Progress JS -->
		<!-- <script src="/assets/js/circle-progress.min.js"></script> -->

		<!-- Custom JS -->
		<script src="/assets/js/script.js"></script>

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
		
	</body>
</html>


