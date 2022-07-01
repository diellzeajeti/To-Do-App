<?php
class DbConfig{
    protected function connect(){
        try{
            $dns = 'mysql:host=localhost;dbname=todo_db';
            $username = 'root';
            $password = '';
            $connection = new PDO($dns,$username,$password);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connection;
        }catch(PDOExeption $e){
            print "Erro: ".$e->getMessage()."<br>";
            die();
        }
    }
}