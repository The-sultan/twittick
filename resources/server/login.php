<?php 

session_start();

// logout
if (isset($_GET['logout']) AND $_GET['logout'] == '1') {
    unset($_SESSION['user']);
}
// login
else if (isset($_POST['user']) AND isset($_POST['pass'])) {

	$users = getUsers();

    // login successful
    if (isset($users[$_POST['user']]) AND $users[$_POST['user']]['password'] === $_POST['pass']) {
		
        $_SESSION['user'] = $users[$_POST['user']];
		if(!array_key_exists('is_list_view', $_SESSION['user']))
			$_SESSION['user']['is_list_view'] = true;
        $hash = '#/dash' . (($_SESSION['user']['is_list_view']) ? 'list' : 'box');
        header('Location: ' . '../index.php' . $hash);
    }
    // login error
    else {
        unset($_SESSION['user']);
        header('Location: ' . '../login.php?error=1');
    }
}
// already logged in
else if (isset($_SESSION['user']) AND $_SESSION['user'] AND $_SERVER['SCRIPT_NAME'] != '/twittick/resources/index.php') {
    $hash = '#/dash' . (($_SESSION['user']['is_list_view']) ? 'list' : 'box');
    header('Location: ' . 'index.php' . $hash);
}
// not logged in, redirect to login page
else if (!isset($_SESSION['user']) AND $_SERVER['SCRIPT_NAME'] != '/twittick/resources/login.php') {
	header('Location: ' . '../login.php');
}

function getUsers() {
    return unserialize(file_get_contents(getFilename()));
}

function getFilename() {
    return 'data/users.json';
}

//function init()
//{
//    $users = array(
//        'req' =>
//        array('id' => '1', 'username' => 'david', 'password' => '1234', 'name' => 'David Roland', 'role' => 'requestor', 'actions' => array('new', 'edit', 'cancel')),
//        'app' =>
//        array('id' => '2', 'username' => 'farid', 'password' => '1234', 'name' => 'Farid Elias', 'role' => 'approver', 'actions' => array('reject', 'edit', 'cancel')),
//        'exe' =>
//        array('id' => '3', 'username' => 'maru', 'password' => '1234', 'name' => 'Maru Rivero', 'role' => 'executor', 'actions' => array('done')),
//    );
//    file_put_contents(getFilename(), serialize($users));
//    die;
//}