<?php
		include("template1.php");
		
		$ID=$_GET["ID"]+0;//+0 คือ การตัด 0 จาก zero fill ให้เหลือเพียงตัวเลข
		$user_id=$_GET["user_id"]+0;//+0 คือ การตัด 0 จาก zero fill ให้เหลือเพียงตัวเลข
		$data=post_form();
		
		if($ID=="")
		{
				$sql="INSERT INTO Company(ID,Code,Name,AlternateName,user_id)VALUES(
						'".$data["company_id"]."',
						'".$data["company_code"]."',
						'".$data["company_name"]."',
						'".$data["company_altername"]."',
						'".$user_id."'
				)";
		}
		else{
				$sql=" UPDATE Company SET 
						Name='".$data["company_name"]."',
						AlternateName='".$data["company_altername"]."',
				WHERE (ID='".$ID."')";
		}
		
		
		$result=runSqlQuery($sql);
		
				if(!$result)
			{
				?>
				<div class="alert alert-danger" >=ชื่อบริษัท <?php echo $data["company_name"]; ?> มีอยู่แล้ว <button type="button" onclick="history.back()" class="btn btn-primary" > < กลับ</button></div>
				<?php
				include("template2.php");
				exit();
			}
		
		if($ID=="")//เปลี่ยนชื่อรูปและอัพไปไว้ในโฟลเดอร์product_image
		{
				$sql="SELECT MAX(ID) AS ID FROM Company";
				$product=get_row_sql($sql);
				$ID=$product[0]["ID"];
		}
		
		$product_picture1=$_FILES["product_picture1"];
		$product_picture2=$_FILES["product_picture2"];
		$product_picture3=$_FILES["product_picture3"];
		$product_picture4=$_FILES["product_picture4"];
				
		if($product_picture1["size"]!=0)
		{
				move_uploaded_file($product_picture1["tmp_name"],"product_image/".$ID."_1.jpg");
		}
		
		if($product_picture2["size"]!=0)
		{
				move_uploaded_file($product_picture2["tmp_name"],"product_image/".$ID."_2.jpg");
		}
		
		if($product_picture3["size"]!=0)
		{
				move_uploaded_file($product_picture3["tmp_name"],"product_image/".$ID."_3.jpg");
		}
		
		if($product_picture4["size"]!=0)
		{
				move_uploaded_file($product_picture4["tmp_name"],"product_image/".$ID."_4.jpg");
		}
		header("Location: index.php?ID=$user_id");
		
		
?>	