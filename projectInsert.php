<?php
session_start();
include("connect.php");
$personal_id = $_SESSION['login']['personal_id'];
$project_name = $_POST['project_name'];
$detail = $_POST['detail'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$status = $_POST['status'];

$insertSql = "INSERT INTO project (personal_id,project_name,detail,startDate,endDate,status) 
VALUES ('" . $personal_id . "','" . $project_name . "','" . $detail . "','" . $startDate . "','" . $endDate . "','" . $status . "')";
$excute = mysqli_query($conn, $insertSql);
if ($excute) {
    $last_id = $conn->insert_id;
    header("location:jobList.php?project_id=" . $last_id);
} else {
    echo '<script>
        alert("Insert Fail !!!!!");
        window.history.back();
    </script>';
}
mysqli_close($conn);
?>