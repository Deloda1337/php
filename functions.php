<?php

include "db.php";

function getUsersId () {
    global $connection;
    $new_query = "SELECT * FROM users";
    $result = mysqli_query($connection, $new_query);
        while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['Id'];
        echo "<option value='$id'>$id</option>";

        }
};

function createUser () {
    global $connection;
    if (isset($_POST["create_new_user"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $new_query = "INSERT INTO users(Username, Password)";
        $new_query .= "VALUES ('$username','$password')";
        $result = mysqli_query($connection, $new_query);
    }
};

function updateUser () {
    if (isset($_POST['update_data'])) {
        global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        $query = "UPDATE users SET ";
        $query .= "Username = '$username', ";
        $query .= "Password = '$password' ";
        $query .= "WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die('die' . mysqli_error($connection));
        }
    }
}

function showUsers () {
    if (isset($_POST["show_data_db"])) {
        $new_query = "SELECT * FROM users";
        global $connection;
        $result = mysqli_query($connection, $new_query);
        while ($row = mysqli_fetch_assoc($result)) {
            print_r($row);
        }
    }


}

function deleteUser () {
    if (isset($_POST['delete_user'])) {
        global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        $query = "DELETE FROM users ";
        $query .= "WHERE Id = $id";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die('die' . mysqli_error($connection));
        }
    }
}