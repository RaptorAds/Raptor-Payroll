<meta charset="utf-8" />
<?php
  session_start();//ให้ใช้ session  ได้
  mysql_connect("localhost","zp10112_tutor","Nonnakorn12345");
  mysql_select_db("zp10112_tutor");
  $strSQL = "SELECT * FROM User WHERE Email = '".mysql_real_escape_string($_POST['email'])."' 
	and Password = '".mysql_real_escape_string($_POST['password'])."'";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);
  if(!$objResult)
  {
	?>
	<script>
	  alert('email หรือ  password ไม่ถูกต้อง');
	 history.back();
	</script>
	<?php
  }
  else
  {
	  		$_SESSION["Email"]=$objResult[0]["Email"];
	 		$_SESSION["Username"] = $objResult["Username"];
	 		$_SESSION["ID"] = $objResult["ID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:index.php?welcome=1&ID=" .$objResult["ID"]);
			}
			else
			{
				header("location:index2.php?welcome=1&ID=" .$objResult["ID"]);
			}
	}
	mysql_close();
?>
  
  
  
  



?>