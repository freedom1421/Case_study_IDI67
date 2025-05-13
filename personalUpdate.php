<?php
session_start();
include("connect.php");
$department_id = $_POST['department_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$tel = $_POST['tel'];
$userType = $_POST['userType'];

$personal_id = isset($_GET['personal_id']) ? $_GET['personal_id'] : null;
if ($personal_id) {
    $updateSql = "UPDATE personal SET 
    department_id = '" . $department_id . "',username = '" . $username . "',password = '" . $password . "',
    name = '" . $name . "', lastname = '" . $lastname . "',gender = '" . $gender . "',email = '" . $email . "',phone = '" . $phone . "',
    tel = '" . $tel . "',userType = '" . $userType . "'
    WHERE personal_id = '" . $personal_id . "'";
    $execute = mysqli_query($conn, $updateSql);

    if ($execute) {
        echo '<script>
            alert("update employee Success !!!");
            window.location.href = "';

        if ($_SESSION['userType'] == 1) {
            echo "personalList.php";
        } else {
            echo "userjobList.php";
        }
        echo '";</script>';

    } else {
        echo '<script>
            alert("update employee Success !!!");
            window.history.back(); 
            </script>';
    }
} else {
    echo '<script>
    alert("NOT FOUND DATA EMPLOYEE !!!!");
    window.history.back();
    </script>';
}

?>