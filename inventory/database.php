<?php
function getDB() {
    $host = 'sql1.njit.edu';
    $port = 3306;
    $dbname = 'lap5';              // your actual DB name
    $username = 'lap5';            // your actual DB username
    $password = 'Password123!';    // your actual DB password

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $db = new mysqli($host, $username, $password, $dbname, $port);
        error_log("You are connected to the $host database!");
        return $db;
    } catch (mysqli_sql_exception $e) {
        error_log($e->getMessage(), 0);
        return null; // better to return null instead of echoing
    }
}
?>
