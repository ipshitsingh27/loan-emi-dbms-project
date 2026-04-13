<?php

$conn = mysqli_connect("localhost", "ips", "1234", "loan_emi_db");

if (!$conn) {
    die("Connection failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    echo "Login Successful<br><br>";

    $q = "SELECT * FROM emi";
    $res = mysqli_query($conn, $q);

    while($row = mysqli_fetch_assoc($res)){
        echo "EMI: " . $row['emi_amount'] . " | Status: " . $row['status'] . "<br>";
    }

} else {
    echo "Invalid Login";
}

?>
