<?php include("template1.php");

$user_id = $_REQUEST["user_id"];
$ID=$_GET["ID"];
		
	if($ID!="")
	{
		//ถ้าเป็นการแก้ไข ให้ดึงข้อมูล ปัจจุบันมาแสดง
		
		$sql="SELECT * FROM Company WHERE (ID='".$ID."')";
		$data=get_row_sql($sql);
		
		fill_input("#company_id",$data[0]["ID"]);
		fill_input("#company_code",$data[0]["Code"]);
		fill_input("#company_name",$data[0]["Name"]);
		fill_input("#company_altername",$data[0]["AlternateName"]);

		
		$ID=$ID+0;//เปลี่ยน string เป็น เลขโดยค่ายังคงเดิม
	}

?>
	
	<h1>รายละเอียด</h1>
	<hr />
	<br />
	
	<script>
        
            function check_input()
            {
                //$("#username").val() ดูว่าใน tag ที่มี id  เป็น username มีค่าเป็นอะไร
                
                $("#err_div").html("");//clear ข้อความเตือน
                  
				if($("#company_id").val()=="")
				{
					 $("#err_div").html("<div class='alert alert-danger'>กรุณากรอก IDบริษัท</div>");
					 return false;
				}
				
				if($("#company_code").val()=="")
				{
					 $("#err_div").html("<div class='alert alert-danger'>กรุณากรอก รหัสบริษัท</div>");
					  return false;
				}
				
				if($("#company_name").val()=="")
				{
					 $("#err_div").html("<div class='alert alert-danger'>กรุณากรอก ชื่อบริษัท(ไทย)</div>");
					  return false;
				}
				
				if ($("#company_altername").val()=="")
				{
						$("#err_div").html("<div class='alert alert-danger'>กรุณากรอก ชื่อบริษัท(ภาษาอังกฤษ)</div>");
						return false;
                        	}

				
				// ตรวจสอบ ประเภทไฟลืที่ upload ว่าต้องเป็นไฟล์ .jpg เท่านั้น
				var file_name;
				
				file_name=$("#product_picture1").val();//อ่านชื่อไฟล์ที่ upload มาไว้ที่ตัวแปร file_name
				file_name=file_name.toLowerCase();//แปลงชื่อไฟล์ที่ Upload เป็นตัวพิมพ์เล็ก
				if (file_name!="") {
					if(file_name.indexOf(".jpg")==-1)//ตรวจสอบว่าไฟล์ที่ว่าต้องเป็น .jpg
					{
					  $("#err_div").html("<div class='alert alert-danger'>กรุณาเลือกไฟล์รูปเฉพาะ  .jpg </div>");
					  return false; // ถ้า return false  จะไม่มีการ submit ไปที่ไฟล์  uplaod_jpg.php
					}
				}
				
			/*	file_name=$("#product_picture2").val();//อ่านชื่อไฟล์ที่ upload มาไว้ที่ตัวแปร file_name
				file_name=file_name.toLowerCase();//แปลงชื่อไฟล์ที่ Upload เป็นตัวพิมพ์เล็ก
				if (file_name!="") {
					if(file_name.indexOf(".jpg")==-1)//ตรวจสอบว่าไฟล์ที่ว่าต้องเป็น .jpg
					{
					  $("#err_div").html("<div class='alert alert-danger'>กรุณาเลือกไฟล์รูปเฉพาะ  .jpg </div>");
					  return false; // ถ้า return false  จะไม่มีการ submit ไปที่ไฟล์  uplaod_jpg.php
					}
				}
				
				file_name=$("#product_picture3").val();//อ่านชื่อไฟล์ที่ upload มาไว้ที่ตัวแปร file_name
				file_name=file_name.toLowerCase();//แปลงชื่อไฟล์ที่ Upload เป็นตัวพิมพ์เล็ก
				if (file_name!="") {
					if(file_name.indexOf(".jpg")==-1)//ตรวจสอบว่าไฟล์ที่ว่าต้องเป็น .jpg
					{
					  $("#err_div").html("<div class='alert alert-danger'>กรุณาเลือกไฟล์รูปเฉพาะ  .jpg </div>");
					  return false; // ถ้า return false  จะไม่มีการ submit ไปที่ไฟล์  uplaod_jpg.php
					}
				}
				
				file_name=$("#product_picture4").val();//อ่านชื่อไฟล์ที่ upload มาไว้ที่ตัวแปร file_name
				file_name=file_name.toLowerCase();//แปลงชื่อไฟล์ที่ Upload เป็นตัวพิมพ์เล็ก
				if (file_name!="") {
					if(file_name.indexOf(".jpg")==-1)//ตรวจสอบว่าไฟล์ที่ว่าต้องเป็น .jpg
					{
					  $("#err_div").html("<div class='alert alert-danger'>กรุณาเลือกไฟล์รูปเฉพาะ  .jpg </div>");
					  return false; // ถ้า return false  จะไม่มีการ submit ไปที่ไฟล์  uplaod_jpg.php
					}
				}
				
				*/
			
                
            	
                
            }
        
      </script>
	
	<form action="company_manage.php?ID=<?php  echo $ID; ?>&user_id=<?php  echo $user_id; ?>" method="post" enctype="multipart/form-data"  onsubmit="return check_input()" >
		
		<label>ID บริษัท <span style="color:red" >*</span></label>
		<input class="form-control" id="company_id" name="company_id" />
		<br />
		
		<label>รหัสบริษัท<span style="color:red" >*</span></label>
		<input class="form-control" id="company_code" name="company_code" />
		<br />
		
		<label>ชื่อบริษัท(ภาษาไทย)<span style="color:red" >*</span></label>
		<input class="form-control" id="company_name" name="company_name" />
		<br />

		<label>ชื่อบริษัท(ภาษาอังกฤษ)<span style="color:red" >*</span></label>
		<input class="form-control" id="company_altername" name="company_altername" />
		<br />

		<label>logo 1 </label>
		<?php
			if($ID!="")//แสดงรูปภาพปัจจุบันที่ใช้อยู่
			{
				if(file_exists("product_image/".($ID+0)."_1.jpg"))
				{
					echo "<br /><div ><img style='max-width:100px' src='product_image/".($ID+0)."_1.jpg?".date("YmdHis")."'  /></div><br />";
				}
				else
				{
					echo "<br /><div><img style='max-width:150px' src='no_image.jpg'  /></div><br />";
			
				}
			}
			?>
		<input  class="form-control" type="file" id="product_picture1" name="product_picture1" />
		<br />
		
		<!--<label>logo 2 </label>
		<?php
			if($ID!="")
			{
				if(file_exists("product_image/".($ID+0)."_2.jpg"))
				{
					echo "<br /><div ><img style='max-width:100px' src='product_image/".($ID+0)."_2.jpg?".date("YmdHis")."'  /></div><br />";
				}
				else
				{
					echo "<br /><div><img style='max-width:150px' src='no_image.jpg'  /></div><br />";
			
				}
			}
			?>
		<input  class="form-control" type="file" id="product_picture2" name="product_picture2" />
		<br />
		
		<label>logo3 </label>
		<?php
			if($ID!="")
			{
				if(file_exists("product_image/".($ID+0)."_3.jpg"))
				{
					echo "<br /><div ><img style='max-width:100px' src='product_image/".($ID+0)."_3.jpg?".date("YmdHis")."'  /></div><br />";
				}
				else
				{
					echo "<br /><div><img style='max-width:150px' src='no_image.jpg'  /></div><br />";
			
				}
			}
			?>
		<input  class="form-control" type="file" id="product_picture3" name="product_picture3" />
		<br />
		
		<label>logo4 </label>
		<?php
			if($ID!="")
			{
				if(file_exists("product_image/".($ID+0)."_4.jpg"))
				{
					echo "<br /><div ><img style='max-width:100px' src='product_image/".($ID+0)."_4.jpg?".date("YmdHis")."'  /></div><br />";
				}
				else
				{
					echo "<br /><div><img style='max-width:150px' src='no_image.jpg'  /></div><br />";
			
				}
			}
			?>
		<input  class="form-control" type="file" id="product_picture4" name="product_picture4" />
		<br /> -->
		
		
		
		
		<div id="err_div"></div>
		<br />
		
		<button class="btn btn-primary"><span class="glyphicon glyphicon-ok"> บันทึก</button>
		<a href="product.php" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"> กลับ</a>
		
	</form> 
	
<?php include("template2.php") ?>	
