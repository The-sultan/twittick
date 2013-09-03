<?php

//init();

session_start();

if (isset($_GET['is_list_view'])) {
    $users = getUsers();

    foreach ($users as $key => $user) {
        if ($_SESSION['user']['id'] == $user['id']) {
            $users[$key]['is_list_view'] = $_GET['is_list_view'];
            $_SESSION['user']['is_list_view'] = $_GET['is_list_view'];
            file_put_contents(getFilename(), serialize($users));
            break;
        }
    }
    
    echo 'true';
}

function getUsers() {
    return unserialize(file_get_contents(getFilename()));
}

function getFilename() {
    return 'data/users.json';
}

function init() {
    $users = array(
        'req' =>
        array('id' => '1', 'username' => 'david', 'password' => '1234', 'name' => 'David Roland', 'role' => 'requestor', 'is_list_view' => 1),
        'app' =>
        array('id' => '2', 'username' => 'farid', 'password' => '1234', 'name' => 'Farid Elias', 'role' => 'approver', 'is_list_view' => 1),
        'exe' =>
        array('id' => '3', 'username' => 'maru', 'password' => '1234', 'name' => 'Maru Rivero', 'role' => 'executor', 'is_list_view' => 1),
    );
    file_put_contents(getFilename(), serialize($users));
    die;
}