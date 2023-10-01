<?php

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacy";

    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
                        CREATE TABLE IF NOT EXISTS pharmacy(
                            product_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            product_number INT,
                            product_name VARCHAR (25) NOT NULL,
                            product_quantity INT,
                            product_price FLOAT,
                            product_publisher VARCHAR (20),
                            product_manufacture DATE,
                            product_expire DATE,
                            product_total INT
                        
                        );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}
