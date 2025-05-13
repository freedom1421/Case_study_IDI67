<?php
include("connect.php");
$personal_id = isset($_GET["personal_id"]) ? $_GET["personal_id"] : null;
if ($personal_id) {
    $deleteSql = "DELETE FROM personal WHERE personal_id = '" . $personal_id . "'";
    $excute = mysqli_query($conn, $deleteSql);
    header("Location:personalList.php");
}else{
    echo'<script>
        alert("NOT FOUND !!!!");
        window.location.href = "personalList.php"
    </script>';
}

?>