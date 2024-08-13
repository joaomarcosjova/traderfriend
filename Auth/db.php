<?php
require_once 'config.php';

function getDb() {
    $dbConnection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if ($dbConnection->connect_error) {
        die("Connection failed: " . $dbConnection->connect_error);
    }
    return $dbConnection;
}
