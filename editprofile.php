<?php session_start();
include("connect.php");
?>
    <?php 
    
    include("menu.php");
    

        $sqlQuery = "SELECT * FROM personal WHERE personal_id='".$_GET['personal_id']."'";
        $query = mysqli_query($conn, $sqlQuery);
		$row=mysqli_fetch_assoc($query);

        $personal_id=$row['personal_id'];
		$department_id=$row['department_id'];
        $username=$row['username'];
        $password=$row['password'];
        $name=$row['name'];
        $lastname=$row['lastname'];
        $gender=$row['gender'];
        $email=$row['email'];
        $phone=$row['phone'];
        $tel=$row['tel'];
        $userType=$row['userType'];
	?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h4>บุคลากร</h4>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            แก้ไขข้อมูลบุคลากร
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <form name="personalUpdate" class="col-12"  method="POST" enctype="multipart/form-data" action="personalUpdate.php?personal_id=<?php echo $personal_id; ?>">
                                <?php include_once("personalForm.php"); ?>
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
