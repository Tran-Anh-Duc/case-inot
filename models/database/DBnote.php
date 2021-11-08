<?php

class DBnote
{
    private string  $dsn;
    private  string $username;
    private  string $password;

    public function __construct()
    {
        $this->dsn ="mysql:host=localhost;dbname=inote;charset=utf8";
        $this->username = "root";
        $this->password = "password";
    }

    public function connect()
    {
        try {
            return new PDO($this->dsn,$this->username,$this->password);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
}