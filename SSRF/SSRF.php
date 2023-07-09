//Vulnerable Code
<?php
$url = $_GET['url'];
$response = file_get_contents($url);
echo $response;
?>

In the above code, the URL is directly taken from the user input ($_GET['url']) without any validation or sanitization. An attacker can exploit this vulnerability by providing a malicious URL that can lead to SSRF attacks. For example, an attacker can pass the following URL to access internal resources or sensitive information:

http://example.com/?url=http://chaitanyaeshwarprasad.com/file/something

//Secured Code
<?php
$url = $_GET['url']; // Retrieve the URL parameter from the user input
$allowed_hosts = ['example.com', 'api.example.com']; // List of allowed hosts

$host = parse_url($url, PHP_URL_HOST); // Extract the host from the URL

if (in_array($host, $allowed_hosts)) {
    // If the extracted host is present in the allowed hosts list, proceed
    $response = file_get_contents($url); // Fetch the contents of the URL
    echo $response; // Display the response
} else {
    // If the extracted host is not in the allowed hosts list, display an error message
    echo "Invalid URL";
}
?>



