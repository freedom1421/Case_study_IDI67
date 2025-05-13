<?php session_start(); ?>

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
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4>จัดการข้อมูลแผนก</h4>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-light">ข้อมูลแผนก</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php include("connect.php");
                            $sqlSelect1 = "SELECT * FROM department";
                            $result = mysqli_query($conn, $sqlSelect1);
                            echo
                                '<table class="table table-hover dashboard-task-infos" >
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสแผนก</th>
                                            <th>ชื่อแผนก</th>
                                            <th>จัดการ</th>
                                        </tr>';
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>" . $row["department_id"] . "</td>";
                                echo "<td>" . $row["department_name"] . "</td>";
                                echo "<td>" . '<a href=departmentList.php?id=' . $row["department_id"] . ' class="btn btn-dark"><i class="material-icons text-xl me-2">edit</i> แก้ไข</a>';
                                echo ' <a href=departmentDelete.php?id=' . $row["department_id"] . '  class="btn btn-primary" onclick="comfirmdelete();"><i class="material-icons text-xl me-2">delete</i> ลบ</a>' . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">

                    <?php if (isset($_GET['id'])) {
                        $sqlSelect2 = "select*from department where department_id=" . $_GET['id'];
                        $result2 = mysqli_query($conn, $sqlSelect2);
                        $row2 = mysqli_fetch_assoc($result2)
                            ?>
                        <div class="card-header">
                            <h5 class="text-light">แก้ไขข้อมูลแผนก</h5>
                        </div>
                        <div class="card-body">
                            <form name="form1" action="departmentUpdate.php" method="post" class="text-start">
                                <div class="input-group input-group-outline mb-3">
                                    <label>รหัสแผนก</label>
                                    <input type="text" class="form-control" name="department_id"
                                        value="<?php echo $row2['department_id'] ?>" readonly>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label>ชื่อแผนก</label>
                                    <input type="text" class="form-control" name="department_name"
                                        value="<?php echo $row2['department_name'] ?>">
                                </div>
                                <div class="text-center is-filled">
                                    <input type="submit" class="btn bg-gradient-success w-50 my-4 mb-2" value="บันทึก"
                                        onclick="comfirmedit();">
                                </div>

                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="card-header">
                            <h5 class="text-light">เพิ่มข้อมูลแผนก</h5>
                        </div>
                        <div class="card-body">
                            <form name="form2" action="departmentInsert.php" method="post" class="text-start">
                                <div class="input-group input-group-outline mb-3">
                                    <label>ชื่อแผนก</label>
                                    <input type="text" class="form-control" name="department_name">
                                </div>
                                <div class="text-center is-filled">
                                    <input type="submit" class="btn bg-gradient-primary w-50 my-4 mb-2" value="เพิ่มข้อมูล">
                                </div>

                            </form>
                        </div>



                    <?php } ?>
                </div>
            </div>
            <!-- #END# Browser Usage -->
        </div>
    </div>
</section>
<?php
include("footer.php");
?>
</body>

</html>