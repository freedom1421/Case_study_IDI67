<?php   
include("connect.php");
$project_id = isset($_GET["project_id"]) ? $_GET["project_id"] :null; 
if($project_id){
    $deleteSql = "DELETE FROM project WHERE project_id = '".$project_id."'";
    $excute = mysqli_query($conn, $deleteSql);
    if($excute){
        echo '<script>
            alert("Delete success!!!");
            window.location.href = "projectList.php";
        </script>';
    }else{
        echo '<script>
            alert("Delete Fail !!!");
            window.history.back();
        </script>';
    }
}else{
    echo '<script>
        alert("Not found !!!");
        window.history.back();
    </script>';
}

?>