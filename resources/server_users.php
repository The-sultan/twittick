<?php

//init();

session_start();

header('Content-Type: application/json');

$username = false;
if (isset($_GET['user'])) {
    $username = $_GET['user'];
    $_SESSION['username'] = $username;
} else if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

if ($username) {
    $users = getUsers();
    echo json_encode($users[$username]);
}

/*
 *  FUNCTIONS
 */

function getUsers() {
    return unserialize(file_get_contents(getFilename()));
}

function getFilename() {
    return 'users.json';
}

function init() {
    $users = array(
        'r' =>
        array('id' => '1', 'username' => 'david', 'name' => 'David Roland', 'role' => 'requestor', 'actions' => array('new', 'edit', 'cancel')),
        'a' =>
        array('id' => '2', 'username' => 'farid', 'name' => 'Farid Elias', 'role' => 'approver', 'actions' => array('reject', 'edit', 'cancel')),
        'e' =>
        array('id' => '3', 'username' => 'maru', 'name' => 'Maru Rivero', 'role' => 'executor', 'actions' => array('done')),
    );
    file_put_contents(getFilename(), serialize($users));
    die;
}