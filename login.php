<?php include("template3.php") ?>
	
	<h1>สมาชิก</h1>
	<hr />
	
      <div align="center">
		  <div class="panel panel-info" style="max-width: 500px" >
		    <div class="panel-heading">
			<h3 class="panel-title">เข้าสู่ระบบ</h3>
		    </div>
		    
		    
		    <div class="panel-body" align="left" >
			
			
			<form action="check_login.php?" method="post" >
			  
			  <label>Email</label>
			  <input class="form-control" id="email" name="email" />
			  <br />
			  
			  <label>รหัสผ่าน</label>
			  <input class="form-control" type="password" id="password" name="password" />
			  <br />
			  
              <div align="right">

			  
			  <button class="btn btn-danger" > <span class="glyphicon glyphicon-lock"></span> เข้าสู่ระบบ</button>
			  </div>
			  
			  
			</form>
			
			
			
			
			
		    </div>
		    
		    
		  </div>
	
	</div>
    </div>
    
<?php include("template2.php") ?>
