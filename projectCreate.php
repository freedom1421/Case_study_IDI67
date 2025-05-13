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
                <h2>โครงการ</h2>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            เพิ่มข้อมูลโครงการ
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <form name="projectAdd" class="col-12" action="projectInsert.php" method="POST" enctype="multipart/form-data">
                                    <?php
                                        $project_name=null;
                                    	$personal_id=null;
                                        $detail=null;
                                        $startDate=null;
                                        $status=0;
                                    include_once("projectForm.php"); ?>
                                    <div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-10 text-center">
                                            <button type="submit" class="btn btn-success"> บันทึก</button>
                                            <button type="reset" class="btn btn-warning"> ล้างข้อมูล</button>
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
