<?php
class Signup extends DbConfig{
    protected function setUser($uid, $pwd, $email){
        $stmt = $this->connect()->prepare('INSERT INTO users(uid, pwd, email) VALUES (?, ?, ?);');
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        if(!$stmt->execute(array($uid, $hashedPwd, $email))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
    }

    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT uid FROM users WHERE uid=? OR email=? ');
        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        $resultCheck = null;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }
}