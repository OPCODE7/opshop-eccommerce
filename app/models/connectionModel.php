<?php

class Connect
{
    public static function ConnectMySql()
    {
        $server = "localhost";
        $database = "eccommerce";
        $user = "root";
        $password = "";
        $charset = "utf8";

        $connectionstring = "mysql:host=" . $server . ";dbname=" . $database . ";charset=" . $charset;

        try {
            $ConMySql = new PDO($connectionstring, $user, $password);
            $ConMySql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo $error->getmessage();
            $ConMySql = null;
        }

        return $ConMySql;
    }
}