<?php
/**
 * Created by PhpStorm.
 * User: Jake
 * Date: 2/11/2019
 * Time: 7:05 AM
 */

//connect to DB
require '/home2/jsuhover/config.php';
try{
    //instantiate a database object
    $dbh = new PDO ( DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo "Connected to database!";
}
catch(PDOException $e) {
    echo $e->getMessage();
}