<?php
include("connect.php");
$department_name = $_POST["department_name"];

$insertSql = "INSERT INTO department (department_name) VALUES ('" . $department_name . "')";
$excute = mysqli_query($conn, $insertSql);
if ($excute) {
    header("Location:departmentList.php");
} else {
    echo '<script>
    alert("Insert fail Plsese Rechick !!!")
    window.history.back();
    </script>';
}
?>