<?php

$username = $_GET['username'];
$password = $_GET['password'];

$ldapconn = ldap_connect("ldap.example.com");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

if ($ldapconn) {
    $ldapbind = ldap_bind($ldapconn, $username, $password);

    if ($ldapbind) {
        echo "Authentication successful";
    } else {
        echo "Authentication failed";
    }
}
?>