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
    
        $sqlQuery = "SELECT * FROM project WHERE project_id='".$_GET['project_id']."' ";
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
                            เพิ่มข้อมูลงาน
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <form name="jobAdd" class="col-12" action="jobInsert.php" method="POST" enctype="multipart/form-data">
                                    <?php
                                       $project_id = $project['project_id'];
                                       $jobName = null;
                                       $jobDetail = null;
                                       $moneyPlan = 0;
                                       $moneyUse = 0;
                                       $status = 0;
                                       $score = 0;
                                       $progress = 0;
                                       $eventDate = null;
                                       $personal_id = null;
                                    include_once("jobForm.php"); ?>
                                    <div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-10 text-center">
                                            <button type="submit" class="btn btn-success"> บันทึก</button>
                                            <button type="reset" class="btn btn-secondary"> ล้างข้อมูล</button>
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
