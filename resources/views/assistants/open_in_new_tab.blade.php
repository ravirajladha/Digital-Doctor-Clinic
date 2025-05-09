<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
</head>
<body>
    <!-- Generate an anchor tag with the redirect URL and target="_blank" -->
    <a href="{{ $redirect_url }}" target="_blank" id="redirectLink"></a>

    <script type="text/javascript">
        // Automatically click the anchor tag to open the URL in a new tab
        window.onload = function() {
            document.getElementById("redirectLink").click();
            // Redirect back to the previous page if needed
            window.location.href = '{{ url('assistants/patient_no') }}'; // Replace 'your_current_page' with the URL of the current page
        };
    </script>
</body>
</html>
