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
            <h4>จัดการข้อมูลบุคลากร</h4>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <form name="form1" action="personalList.php" method="get" class="form-inline">
                            <div class="input-group input-group-outline">
                                <div class="col-lg-2 col-xs-4">
                                    <label>ค้นหาข้อมูลบุคลากร</label>
                                </div>
                                <div class="col-lg-3 col-xs-4">
                                    <input type="text" class="form-control w-80" name="search_personal">
                                </div>
                                <div class="col-lg-1 col-xs-4">
                                    <input type="submit" class="btn btn-info" value="ค้นหา">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <a href="personalCreate.php" class="btn btn-success w-100"> <i
                                            class="material-icons text-xl me-2">add</i>เพิ่มข้อมูลบุคลากร</a>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <?php include("connect.php");
                            $where = "";
                            if (isset($_GET['search_personal'])) {
                                $txt = $_GET['search_personal'];
                                $where = " and (personal_id='$txt' or name like '%" . $txt . "%')";
                            }
                            $sqlSelect = "SELECT * FROM personal p,department d WHERE p.department_id=d.department_id" . $where;
                            $result = mysqli_query($conn, $sqlSelect);
                            $numrow = mysqli_num_rows($result);
                            echo
                                '<table class="table table-hover dashboard-task-infos" >
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสพนักงาน</th>
                                            <th>ชื่อแผนก</th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>ระดับสิทธิ์</th>
                                            <th>จัดการ</th>
                                        </tr>';
                            if ($numrow > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $i++ . "</td>";
                                    echo "<td>" . $row["personal_id"] . "</td>";
                                    echo "<td>" . $row["department_name"] . "</td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["lastname"] . "</td>";
                                    if ($row["userType"] == 1) {
                                        echo "<td>Admin(หัวหน้า)</td>";
                                    } else {
                                        echo "<td>User</td>";
                                    }
                                    echo "<td>" . '<a href=personalEdit.php?personal_id=' . $row["personal_id"] . ' class="btn btn-dark"><i class="material-icons text-xl me-2">edit</i> แก้ไข</a>';
                                    echo ' <a href=personalDelete.php?personal_id=' . $row["personal_id"] . '  class="btn btn-primary" onclick="comfirmdelete();"><i class="material-icons text-xl me-2">delete</i> ลบ</a>' . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' align='center'>ไม่พบข้อมูล</td></tr>";
                            }
                            echo "</table>";
                            ?>
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