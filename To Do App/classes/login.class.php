<?php
class Login extends DbConfig{
    protected function getUser($uid,$pwd){
        $stmt = $this->connect()->prepare("SELECT pwd FROM users WHERE uid = ? OR email = ?;");
        if(!$stmt->execute(array($uid, $pwd))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() === 0){
            $stmt = null;
            header("Location: ../index.php?error=usernotfound");
            exit();
        }

        $hashedPassword = $stmt->fetchAll();
        $checkPassword = password_verify($pwd, $hashedPassword[0]['pwd']);

        if($checkPassword === false){
            $stmt = null;
            header("Location: ../index.php?error=wrongpassword");
            exit();
        }elseif($checkPassword === true){
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE uid = ? OR email = ? AND pwd = ?;");
            if(!$stmt->execute(array($uid, $uid, $pwd))){
                $stmt = null;
                header("Location: ../index.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount() === 0){
                $stmt = null;
                header("Location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll();

            session_start();
            $_SESSION['userid'] = $user[0]['id'];
            $_SESSION['useruid'] = $user[0]['uid'];

            $stmt = null;

        }
            $stmt = null;
    }
}