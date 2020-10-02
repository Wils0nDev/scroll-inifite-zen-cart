<?php

class DataBase{
    public static function connect(){
        $db = new mysqli('localhost','root','','mobelh_a',3306);
        $db->query("SET NAMES utf8");
        return $db;
    }
}