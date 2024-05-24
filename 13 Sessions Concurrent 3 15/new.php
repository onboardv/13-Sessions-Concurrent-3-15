<?php
session_start();

// Check if the session limit has been reached
if(isset($_SESSION['active_sessions']) && $_SESSION['active_sessions'] >= 3) {
    echo "Maximum number of concurrent sessions reached. Please try again later.";
    exit;
}

// Increment the active sessions count
if(isset($_SESSION['active_sessions'])) {
    $_SESSION['active_sessions']++;
} else {
    $_SESSION['active_sessions'] = 1;
}

// Your code here

// Decrement the active sessions count when the session ends
function decrementSessionCount() {
    if(isset($_SESSION['active_sessions'])) {
        $_SESSION['active_sessions']--;
    }
}
register_shutdown_function('decrementSessionCount');
?>
