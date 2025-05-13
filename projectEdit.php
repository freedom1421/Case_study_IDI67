<?php session_start();
include("connect.php");
?>


    <?php 
    
    include("menu.php");
    
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>โครงการ</h2>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            เพิ่มข้อมูลโครงการ
                        </div>
                        <?php
                         include("connect.php");
                         $sqlQuery = "SELECT * FROM project WHERE project_id='".$_GET['project_id']."' ";
                         $query = mysqli_query($conn, $sqlQuery);
                         $row=mysqli_fetch_assoc($query);
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <form name="personalAdd" class="col-12" action="projectUpdate.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="project_id" value="<?php echo $row['project_id']?>">
                                    <?php
                                        $project_name=$row['project_name'];
                                        $detail=$row['detail'];
                                        $startDate=date("Y-m-d", strtotime($row['startDate']));
                                        $endDate=date("Y-m-d", strtotime($row['endDate']));
                                        $status=0;
                                    include_once("projectForm.php"); ?>
                                    <div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-10 text-center">
                                            <button type="submit" class="btn btn-warning"> แก้ไข</button>
                                            <a href="projectDelete.php?project_id=<?php echo $row['project_id'];?>" class="btn btn-danger" onclick="comfirmdelete();">ลบ</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>
    <?php
include("footer.php");
?>
</body>

</html>
