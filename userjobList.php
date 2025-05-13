<?php session_start(); ?>

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
    include("connect.php");

        $sqlQuery = "SELECT * FROM project";    // WHERE project_id='".$_GET['project_id']."'
        $query = mysqli_query($conn, $sqlQuery);
        $project=mysqli_fetch_assoc($query);
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h4>รายงานความก้าวหน้างานที่รับผิดชอบ <?php echo $project['project_name']; ?></h4>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                    <?php
                        $statusList = array("0"=>"รอดำเนินการ", "1"=> "อยู่ระหว่างดำเนินการ", "2"=>"แล้วเสร็จ");

                        $where ="";
                        if (isset($_GET['search_job'])){
                            $where = " AND (j.jobName LIKE '%".$_GET['search_job']."%' OR j.job_id='".$_GET['search_job']."')";
                        }

                        $sqlQuery = "SELECT * FROM job j, personal p, project pr WHERE j.personal_id=p.personal_id AND j.project_id=pr.project_id AND  p.personal_id='".$_SESSION['login']['personal_id']."'";
                        $query = mysqli_query($conn, $sqlQuery);
                    ?>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th>ชื่องาน</th>
                                        <th>โครงการ</th>
                                        <th>งบประมาณ<br>ที่วางแผน</th>
                                        <th>งบประมาณ<br>ที่ใช้จริง</th>
                                        <th>สถานะ</th>
                                        <th>คะแนนงาน <br>(เต็ม 5)</th>
                                        <th>ความคืบหน้า(%)</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;
                                    while($row=mysqli_fetch_assoc($query)){ ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo ($i++); ?>
                                            </td>
                                            <td><?php echo $row['jobName']; ?></td>
                                            <td><?php echo $row['project_name']; ?></td>
                                            <td><?php echo number_format($row['moneyPlan']); ?></td>
                                            <td><?php echo number_format($row['moneyUse']); ?></td>
                                            <td><?php echo $statusList[$row['status']]; ?></td>
                                            <td><?php echo $row['score']; ?></td>
                                            <td><?php echo $row['progress']; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo 'userjobEdit.php?job_id='.$row['job_id']; ?>" class="btn btn-warning">แก้ไข </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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