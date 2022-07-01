<?php
session_start();

if (isset($_POST['signup'])) {
    // Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    // Instantiating signup-controller class
    include '../classes/dbConfig.class.php';
    include '../classes/signup.class.php';
    include '../classes/signup-contr.class.php';
    $signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

    // Checking for errors first then submiting the data
    $signup->signupUser();
    // Changing location to index.php
    header("Location: ../index.php?signup=success");
} elseif (isset($_POST['login'])) {
    $uid = $_POST['uidL'];
    $pwd = $_POST['pwdL'];

    include '../classes/dbConfig.class.php';
    include '../classes/login.class.php';
    include '../classes/login-contr.class.php';

    $login = new LoginContr($uid, $pwd);

    $login->loginUser();

    // echo "Congratulations you logged in successfully";
    header("Location: ../todo.php?login-success");
} elseif (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
} elseif(isset($_GET['t-btn'])){
    $t_name = $_GET['t-name'];
    $t_desc = $_GET['t-desc'];
    $t_date = $_GET['t-date'];
    $user_id = $_SESSION['userid'];

    include '../classes/dbConfig.class.php';
    include '../classes/task.class.php';
    include '../classes/task-contr.class.php';

    $task = new TaskContr;
    $task->addTask($t_name, $t_desc, $t_date, $user_id);

    header("Location: ../todo.php");
}elseif(isset($_GET['done'])){
    $taskid = $_GET['done'];

    include '../classes/dbConfig.class.php';
    include '../classes/task.class.php';
    include '../classes/task-contr.class.php';

    $task = new TaskContr;
    $task->moveTaskToDone($taskid);

    header("Location: ../todo.php");
}elseif(isset($_GET['delete'])){
    $taskid = $_GET['delete'];

    include '../classes/dbConfig.class.php';
    include '../classes/task.class.php';
    include '../classes/task-contr.class.php';
    $task = new TaskContr;
    $task->removeTask($taskid);

    header("Location: ../todo.php");
}




