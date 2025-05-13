<?php
include("connect.php");
$job_id = isset($_GET["job_id"]) ? $_GET["job_id"] : null;
if ($job_id) {
    $deleteSql = "DELETE FROM job WHERE job_id = '" . $job_id . "' ";
    $excute = mysqli_query($conn, $deleteSql);
    if ($excute) {
        echo '<script>
        alert("Delete job success !!!!");
        window.location.href = "jobList.php?project_id= ' . $_GET['project_id'] . '";
        </script>';
    } else {
        echo '<script>
            alert("Delete job fail !!!!");
            window.history.back();
        </script>';
    }
} else {
    echo '<script>
        alert("NOT FOUND !!!!!");
        window.history.back();
    </script>';
}
?>