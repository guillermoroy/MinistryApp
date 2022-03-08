<?php
// establishing the MySQLi connection Object oriented style
$dbc = new mysqli("localhost", "rbgwebne_db", "P@ssw0rd12354","rbgwebne_jwdb");
$dbc->set_charset("utf8");
 if ($dbc->connect_errno) {
    printf("Connect failed: %s\n", $dbc->connect_error);
    exit();
}
?>