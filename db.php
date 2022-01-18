<?php
$connection = mysqli_connect("localhost", "root", "", "loginapp");

if (!$connection) {
    die("Connection to the database is lost");
}