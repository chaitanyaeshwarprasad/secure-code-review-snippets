<?php

$username = $_GET['username'];
$password = $_GET['password'];

$ldapconn = ldap_connect("ldap.example.com");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

/*
ldap_escape function is used to sanitize the username and password inputs before using them in the ldap_bind function. The ldap_escape function helps prevent LDAP injection by properly escaping special characters that can affect the LDAP query by using ldap_escape with the LDAP_ESCAPE_FILTER option, the code ensures that any special characters within the username and password inputs are properly escaped, thus mitigating the LDAP injection vulnerability.
*/

if ($ldapconn) {
    $sanitizedUsername = ldap_escape($username, null, LDAP_ESCAPE_FILTER);
    $sanitizedPassword = ldap_escape($password, null, LDAP_ESCAPE_FILTER);

    $ldapbind = ldap_bind($ldapconn, $sanitizedUsername, $sanitizedPassword);

    if ($ldapbind) {
        echo "Authentication successful";
    } else {
        echo "Authentication failed";
    }
}

?>