<?php 


$con = mysqli_connect("localhost","root","","itworkshop_project");

if (!$con) {
    echo "Error while connecting to database";
}

// // echo $con;