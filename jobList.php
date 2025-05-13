<?php session_start();
include("connect.php");
?>

<script>
    function comfirmedit() {
        var x = confirm("ยืนยันแก้ไขข้อมูล");
    }
    function comfirmdelete() {
        var x = confirm("ต้องการลบข้อมูลนี้ใช่หรือไม่");
    }
</script>

<?php
include("menu.php");

$sqlQuery = "SELECT * FROM project WHERE project_id='" . $_GET['project_id'] . "' ";
$query = mysqli_query($conn, $sqlQuery);
$project = mysqli_fetch_assoc($query);
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4>จัดการข้อมูลงาน <?php echo $project['project_name']; ?></h4>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <form name="form1" action="jobList.php" method="get" class="form-inline">
                            <div class="input-group input-group-outline">
                                <input type="hidden" name="project_id" value="<?php echo $project['project_id']; ?>">
                                <div class="col-lg-2 col-xs-4">
                                    <label>ค้นหาข้อมูลงาน</label>
                                </div>
                                <div class="col-lg-3 col-xs-4">
                                    <input type="text" class="form-control w-80" name="search_job">
                                </div>
                                <div class="col-lg-1 col-xs-4">
                                    <input type="submit" class="btn btn-info" value="ค้นหา">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="jobCreate.php?project_id=<?php echo $project['project_id']; ?>"
                                        class="btn btn-success w-100">เพิ่มข้อมูลงาน</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    $statusList = array("0" => "รอดำเนินการ", "1" => "อยู่ระหว่างดำเนินการ", "2" => "แล้วเสร็จ");

                    $where = "";
                    if (isset($_GET['search_job'])) {
                        $where = " AND (j.jobName LIKE '%" . $_GET['search_job'] . "%' OR j.job_id='" . $_GET['search_job'] . "')";
                    }

                    $sqlQuery = "SELECT * FROM job j, personal p WHERE j.personal_id=p.personal_id AND j.project_id=" . $_GET['project_id'] . $where;
                    $query = mysqli_query($conn, $sqlQuery);
                    ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th>ชื่องาน</th>
                                        <th>งบประมาณที่วางแผน</th>
                                        <th>งบประมาณที่ใช้จริง</th>
                                        <th>สถานะ</th>
                                        <th>คะแนนงาน(เต็ม 5)</th>
                                        <th>ความคืบหน้า(%)</th>
                                        <th>ผู้รับผิดชอบ</th>
                                        <th class="text-center">จัดการ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo ($i++); ?>
                                            </td>
                                            <td><?php echo $row['jobName']; ?></td>
                                            <td class="text-center"><?php echo number_format($row['moneyPlan']); ?></td>
                                            <td class="text-center"><?php echo number_format($row['moneyUse']); ?></td>
                                            <td class="text-center"><?php echo $statusList[$row['status']]; ?></td>
                                            <td class="text-center"><?php echo $row['score']; ?></td>
                                            <td class="text-center"><?php echo $row['progress']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo 'jobEdit.php?job_id=' . $row['job_id']; ?>"
                                                    class="btn btn-dark"><i class="material-icons text-xl me-2">edit</i>
                                                    แก้ไข</a>

                                                <a href="<?php echo 'jobDelete.php?job_id=' . $row['job_id'] . '&project_id=' . $row['project_id']; ?>"
                                                    class="btn btn-primary" onclick="comfirmdelete();"><i
                                                        class="material-icons text-xl me-2">delete</i> ลบ</a>
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
</main>


</body>

</html>