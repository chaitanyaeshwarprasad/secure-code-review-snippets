<?php

// Disable error reporting (not recommended for production)
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL)
ini_set("error_reporting", E_ALL);

// Report all errors except notices
error_reporting(E_ALL & ~E_NOTICE);

?>