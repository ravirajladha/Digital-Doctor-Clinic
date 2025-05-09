
		</div>
		<!-- /Main Wrapper -->


		<script>
			function text(x) {
				if (x == 1) document.getElementById('custom_price_cont').style.display = "block";
				else document.getElementById('custom_price_cont').style.display = "none";
			}
		</script>


	
				
		<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML">
		</script>


		<!-- Bootstrap Core JS -->
		<script src="/assets/js/bootstrap.bundle.min.js"></script>

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

		<!-- SweetAlert JS -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
		@if (!empty(session()->get('failed')))
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

		@if (!empty(session()->get('success')))
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
