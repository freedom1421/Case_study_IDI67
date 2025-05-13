<?php session_start();
include("connect.php");
?>

    <script>
        function comfirmedit(){
            var x=confirm("ยืนยันแก้ไขข้อมูล");
        }
        function comfirmdelete(){
            var x=confirm("ต้องการลบข้อมูลนี้ใช่หรือไม่");
        }
    </script>

    <?php 
    include("menu.php");


        $sqlQuery = "SELECT * FROM job WHERE job_id='".$_GET['job_id']."' ";
        $query = mysqli_query($conn, $sqlQuery);
        $row=mysqli_fetch_assoc($query);

        $sqlQuery = "SELECT * FROM project WHERE project_id='".$row['project_id']."' ";
        $query = mysqli_query($conn, $sqlQuery);
        $project=mysqli_fetch_assoc($query);
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h4>โครงการ <?php echo $project['project_name']; ?></h4>
            </div>
            <div class="row clearfix">
                <!-- Task Info --> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            แก้ไขข้อมูลงาน
                        </div>

                        <div class="card-body"> 
                            <div class="row">
                                <form name="jobAdd" class="col-12" action="<?php echo 'jobUpdate.php?job_id='.$row['job_id'];?>" method="POST" enctype="multipart/form-data">
                                    <?php 
                                       $project_id = $project['project_id'];
                                       $jobName = $row['jobName'];
                                       $jobDetail = $row['jobDetail'];
                                       $moneyPlan = $row['moneyPlan'];
                                       $moneyUse = $row['moneyUse'];
                                       $status = $row['status'];
                                       $score = $row['score'];
                                       $progress = $row['progress'];
                                       $eventDate = $row['eventDate'];
                                       $personal_id = $row['personal_id'];
                                    include_once("jobForm.php"); ?>
                                    <div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-10 text-center">
                                            <button type="submit" class="btn btn-warning"> แก้ไข</button>
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
