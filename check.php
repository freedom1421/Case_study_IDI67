<?php
session_start();

include("connect.php");
$sql = "SELECT * FROM personal WHERE username ='" . $_POST['username'] . "'AND password ='" . $_POST["password"] . "'";

$result = mysqli_query($conn, $sql);
$numrow = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if ($numrow == 0) {
    echo "login fail";
    header("location:index.php?check=false");
} else {
    if ($row["userType"] == 1) {
        header("location:main.php");
    } else {
        header("location:userjobList.php");
    }
}

$_SESSION['login'] = $row;
$_SESSION['name'] = $row['name'];
$_SESSION['userType'] = $row['userType'];

?>