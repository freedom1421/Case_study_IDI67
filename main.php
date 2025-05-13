<?php session_start();
include("connect.php");
?>


<?php

include("menu.php");

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4>โครงการทั้งหมด</h4><br>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php
                $sqlSelect = "SELECT * FROM project pr,personal p WHERE pr.personal_id=p.personal_id AND p.personal_id='" . $_SESSION['login']['personal_id'] . "'";
                $result = mysqli_query($conn, $sqlSelect);
                $numrow = mysqli_num_rows($result);
                ?>
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">จำนวนโครงการ</p>
                            <h4 class="mb-0 text-light"><?php echo $numrow; ?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday
                        </p>
                    </div>
                </div>


            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php
                $sqlSelect = "SELECT * FROM personal";
                $result = mysqli_query($conn, $sqlSelect);
                $numrow = mysqli_num_rows($result);
                // $sqlSelect = "SELECT COUNT(j.personal_id) AS num FROM job j, project pr WHERE j.project_id=pr.project_id AND pr.personal_id='" . $_SESSION['login']['personal_id'] . "' GROUP BY j.personal_id";
                // $result = mysqli_query($conn, $sqlSelect);
                // $numrow = mysqli_num_rows($result);
                ?>
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">จำนวนพนักงาน</p>
                            <h4 class="mb-0 text-light"><?php echo $numrow; ?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday
                        </p>
                    </div>
                </div>

                <br>
            </div>
        </div>
        <!-- #END# Widgets -->

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">สรุปความก้าวหน้าโครงการ</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php include("connect.php");
                        $sqlSelect = "SELECT pr.*, SUM(j.moneyPlan) AS mPlan, SUM(j.moneyUse) AS mUse, COUNT(j.job_id) AS numJob, SUM(progress)/100 AS sumPro FROM project pr LEFT JOIN job j ON pr.project_id=j.project_id WHERE pr.personal_id='" . $_SESSION['login']['personal_id'] . "' GROUP BY pr.project_id";
                        $result = mysqli_query($conn, $sqlSelect);
                        $numrow = mysqli_num_rows($result);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-vertical-middle nomargin">
                                <thead>
                                    <tr style="width:5%;">
                                        <th class="text-center">ลำดับ</th>
                                        <th>ชื่อโครงการ</th>
                                        <th>สิ้นสุดโครงการ</th>
                                        <th>ใช้จริง/วางแผน</th>
                                        <th>สถานะ</th>
                                        <th style="width: 8%;">ความคืบหน้า (%)</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $statuslist = array('-1' => "ยกเลิกโครงการ", '0' => "ยังไม่ดำเนินโครงการ", '1' => "อยู่ระหว่างดำเนินการ", '2' => "อยู่ระหว่างดำเนินการ");
                                    if ($numrow > 0) {
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo ($i++); ?>
                                                </td>
                                                <td><?php echo $row['project_name']; ?></td>
                                                <td><?php echo $row['endDate']; ?></td>
                                                <td><?php echo number_format($row['mUse']) . "/" . number_format($row['mPlan']); ?>
                                                    บาท</td>
                                                <td><?php echo $statuslist[$row['status']]; ?></td>
                                                <td>

                                                    <div class="progress" style="height:20px;width: 130px">
                                                        <?php $per = $row['sumPro'] / $row['numJob'] * 100; ?>
                                                        <div class="progress-bar bg-green" role="progressbar"
                                                            aria-valuenow="<?php echo $per; ?>" aria-valuemin="0"
                                                            aria-valuemax="100" style="height:20px;width: <?php echo $per; ?>%">
                                                            <?php echo number_format($per); ?>%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo 'jobList.php?project_id=' . $row['project_id']; ?>"
                                                        class="btn btn-primary btn-sm mb-0 me-3"> งาน </a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan='7' align='center'>ไม่พบข้อมูล</td>
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