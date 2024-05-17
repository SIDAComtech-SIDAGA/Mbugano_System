<?php
session_start();

$time_duration = 3;

$response = ['status' => 'active'];

if (isset($_SESSION['last_activity'])) {
    // calculate the session lifetime 
    $elapsed_time = time() - $_SESSION['last_activity'];

    if ($elapsed_time > $time_duration) {
        session_unset();
        session_destroy();
        $response['status'] = 'destroyed';
    } else {
        $_SESSION['last_activity'] = time(); // Update last activity time
    }
} else {
    $response['status'] = 'no_session';
}

echo json_encode($response);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Management</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        setInterval(checkSession, 1000); // Check session every second

        function checkSession() {
            $.ajax({
                url: 'check_session.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'destroyed') {
                        alert('Session has been destroyed due to inactivity.');
                        window.location.href = '../login.php'; // Redirect to login page
                    }
                },
                error: function() {
                    console.log('Error checking session.');
                }
            });
        }
    });
    </script>
</head>
<body>
    <!-- Your content here -->
</body>
</html>
