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
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h4>จัดการข้อมูลโครงการ</h4>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <form name="form1" action="projectList.php" method="get" class="form-inline">
                                <div class="input-group input-group-outline">
                                    <div class="col-lg-2 col-xs-4">
                                        <label>ค้นหาข้อมูลโครงการ</label>
                                    </div>
                                    <div class="col-lg-3 col-xs-4">   
                                        <input type="text" class="form-control w-80" name="search_project">
                                    </div>
                                    <div class="col-lg-1 col-xs-4">    
                                        <input type="submit" class="btn btn-info" value="ค้นหา">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <a href="projectCreate.php" class="btn btn-success w-100" ><i class="material-icons text-xl me-2">add</i>เพิ่มข้อมูลโครงการ</a>
                                    </div>
                                </div>
                                
                            </form>  
                           
                        </div>
                        
                        <div class="card-body">
                            <?php include("connect.php");
                            $where=" AND p.personal_id='".$_SESSION['login']['personal_id']."'";
                                if(isset($_GET['search_project'])){
                                    $where.=" and (project_id='".$_GET['search_project']."' or project_name like '%".$_GET['search_project']."%')";
                                }
                               $sqlSelect="SELECT * FROM project pr,personal p WHERE pr.personal_id=p.personal_id".$where;
                                $result= mysqli_query($conn,$sqlSelect);
                                $numrow=mysqli_num_rows($result);
                            ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-vertical-middle nomargin">
                                    <thead>
                                        <tr style="width:5%;">
                                            <th class="text-center">ลำดับ</th>
                                            <th>รหัสโครงการ</th>
                                            <th>เจ้าของโครงการ</th>
                                            <th>ชื่อโครงการ</th>
                                            <th>เริ่มต้นโครงการ</th>
                                            <th>สิ้นสุดโครงการ</th>
                                            <th>สถานะ</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $statuslist= array('-1' =>"ยกเลิกโครงการ" ,'0' =>"ยังไม่ดำเนินโครงการ" ,'1' =>"อยู่ระหว่างดำเนินการ" ,'2' =>"อยู่ระหว่างดำเนินการ");
                                        if($numrow>0){
                                            $i=1;
                                            while($row=mysqli_fetch_assoc($result)){ ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php echo ($i++); ?>
                                                    </td>
                                                    <td><?php echo $row['project_id']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['project_name']; ?></td>
                                                    <td><?php echo $row['startDate']; ?></td>
                                                    <td><?php echo $row['endDate']; ?></td>
                                                    <td><?php echo $statuslist[$row['status']]; ?></td><td class="text-center">
                                                        <a href="<?php echo 'projectEdit.php?project_id='.$row['project_id']; ?>" class="btn btn-dark"><i class="material-icons text-xl me-2">edit</i> แก้ไข </a>
                                                        <a href="<?php echo 'jobList.php?project_id='.$row['project_id']; ?>" class="btn btn-info"><i class="material-icons text-xl me-2">work</i> ดูงาน </a>
                                                    </td>
                                                </tr>
                                        <?php } 
                                        }else { ?>
                                           <tr><td colspan='7' align='center'>ไม่พบข้อมูล</td></tr>
                                           
                                 <?php }?>
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
