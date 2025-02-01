<?php
if (!function_exists('isSecure')) {
    // Function to check if we're on HTTPS
    function isSecure() {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ||
               (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
    }
}
?>
