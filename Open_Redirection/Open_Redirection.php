//Vulnerable Code

<?php
// Redirect to a specific website
$redirectUrl = "https://acep.com";
header("Location: $redirectUrl");
exit();
?>


//Secured Code
<?php
// Sanitize and validate the redirect URL
$redirectUrl = filter_var("https://acep.com", FILTER_VALIDATE_URL);

if ($redirectUrl === false) {
    // Invalid URL, handle the error or redirect to a default page
    $redirectUrl = "https://default.com";
}

// Add additional security checks if necessary, such as checking the URL against a whitelist

// Set a Referrer-Policy header to control the information sent in the Referer header
header("Referrer-Policy: strict-origin-when-cross-origin");

// Redirect to the sanitized URL
header("Location: $redirectUrl");
exit();
?>

//we use the filter_var() function with the FILTER_VALIDATE_URL flag to validate and sanitize the redirect URL. If the URL is invalid, you can handle the error accordingly or redirect to a default page.




