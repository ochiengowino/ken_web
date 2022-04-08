<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ken_web";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connected successfully";
}


// Attempt create table query execution
// Contact Form Table
// $sql = "CREATE TABLE contact_form(
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     name VARCHAR(30) NOT NULL,
//     email VARCHAR(70) NOT NULL,
//     message VARCHAR(65000)  ,
//     phone_number VARCHAR(20)
// )";
// if(mysqli_query($conn, $sql)){
//     echo "Table created successfully.";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
// }

// Demo Request Form
// $sql = "CREATE TABLE demo_form(
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     uniqueID INT NOT NULL,
//     name VARCHAR(30) NOT NULL,
//     email VARCHAR(70) NOT NULL,
//     phone_number VARCHAR(20),
//     date DATE NOT NULL,
//     message VARCHAR(65000) ,
//     sent_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   
// )";
// if(mysqli_query($conn, $sql)){
//     echo "Table created successfully.";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
// }
?>