<?php
	  include("template1.php");
         if($_SESSION["ID"]=="")
         {
               header("Location:login.php?");
               exit();
         }

?>
	
<?php if($_GET["welcome"]==1){ //แสดงว่าเพิ่งเข้ามาครั้งแรก ให้แสดง popup ยินตีต้อนรับ
     
?>	
<script>
	  $(document).ready(function(){$("#welcom_popup").modal("show")});//แสดง popup เมื่อเปิดหน้า
	</script>
	
<div id="welcom_popup" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ยินดีต้อนรับ</h4>
      </div>
      <div align="center"  class="modal-body">
		    
		    <!-- ข้อความใน popup -->
		   <br />
		   <h1>ยินดีต้อนรับ คุณ <?php echo $_SESSION["Username"];?></h1>
		   <br />
	 
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php } ?>
		<div class="row" >
				<div class="col-md-8">
				 <h1>Company </h1>
				</div>
				 <div class="col-md-4" align="right">
						<br />
						<a href="company_addedit.php?user_id=<?php echo $_SESSION["ID"];?>"  class="btn btn-success" > <span class="glyphicon glyphicon-plus" ></span> Company</a>
				 </div>
		 </div>
		 <hr />	
		<br /><br />
<?php
mysql_connect("localhost","zp10112_tutor","Nonnakorn12345");
mysql_select_db("zp10112_tutor");
?>	
<?
$id = $_REQUEST["ID"];
$sql_show = "select * from Company";
$sql_show.=" where user_id like '".$id."'";
$result_show = mysql_query($sql_show) or die(mysql_error());
if (mysql_num_rows($result_show) == 0) {
    echo "No company found, nothing to print so am exiting";
    exit;
}
?>

<table width="600" border="1" cellspacing="2" cellpadding="2" class="table table-bordered">
<tr>
<td><div align="center">Code</div></td>
<td><div align="center">Name</div></td>
<td><div align="center">Alternate Name</div></td>
<td><div align="center">Logo</div></td>
</tr>
<?

while($row_show = mysql_fetch_array($result_show)){?>
<tr>
<td><?=$row_show['Code']?></td>
<td><?=$row_show['Name']?></td>
<td><?=$row_show['AlternateName']?></td>
<td><?=$row_show['Logo']?></td>
</tr>
<?}?>
</table>
 
<?php include("template2.php") ?>