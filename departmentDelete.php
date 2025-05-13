<?php
include("connect.php");
$department_id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($department_id) {
    $deletesql = "DELETE FROM department WHERE department_id='" . $department_id . "'";
    $excute = mysqli_query($conn, $deletesql);
    header("Location:departmentList.php");
} else {
    echo '<script>
    alert("Not found pleses recheck!!!! ");
    window.location.href = "departmentList.php";
    </script>';
}
?>