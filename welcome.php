<?php include("template1.php");

   

    
?>
	
	<!--<h1>ยินดีต้อนรับ คุณ <?php echo $cus[0]["cus_name"]." ".$cus[0]["cus_lastname"]; ?></h1>-->
	
	
	<script>
	  $(document).ready(function(){$("#welcom_popup").modal("show")});
	</script>
	
<div id="welcom_popup" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ยินดีต้อนรับ</h4>
      </div>
      <div align="center"  class="modal-body">
	  <br />
       <h1>ยินดีต้อนรับ คุณ <?php echo $cus[0]["cus_name"]." ".$cus[0]["cus_lastname"]; ?></h1>
	 <br />
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	
<?php include("template2.php") ?>