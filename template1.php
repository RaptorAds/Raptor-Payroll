<?php

  ob_start();
  session_start();//ให้ใช้ session  ได้
  include("backoffice/lib/db_manager.php");//ให้เชื่อมต่อกับ mysql ได้
         if($_SESSION["ID"]=="")
         {
               header("Location:login.php");
               exit();
         }
$ID = $_REQUEST["ID"];  
  
?>

<!DOCTYPE html>
<html>
  
  <head>
    
    <meta charset="utf-8" /><!-- ให้ใช้ ภาษาไทยได้ -->
    
    <!-- ให้เปิดได้พอดีกับทุกอุปกรณ์ -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!--ชื่อหัว-->
    <title>Raptor Payroll </title>
    
    <!-- ให้ใช้ jquery ได้ -->
    <script src="js/jquery.js"></script>
	
	<!-- ให้ใช้ตัวเลือกปฎิทืนได้ -->
    <link rel="stylesheet" href="js/jquery-ui.css" />
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    
    <!-- ให้ใช้ Bootstrap ได้ -->
    <script src="js/bootstrap.min.js"></script><!--  ให้เป็น responsive web -->
    <link href="css/bootstrap.min.css" rel="stylesheet"><!--  ให้เรี่ยกใช้ design จาก bootstrap ผ่าน class ได้ -->
    
    

    
  </head>
  
  <body><!-- เนื้อหาเว็บ จะอยู่ใน tag body -->
    
    
     <script>
		
function number_only(e) {
   
    var ch = $(e).val();  //เก็บข้อความใน textbox ไว้ในตัวแปร ch
    var digit;  //ตัวแปรสำหรับเก็บตัวอักษรแต่ละอักขระในตัวแปร ch

    // วน loop หาแต่ละตัวอักขระใน text box
    for (var i = 0 ; i < ch.length ; i++) {
        digit = ch.charAt(i)

        if (digit >= "0" && digit <= "9") //แต่ละอักขระอยู่ในช่วง 0-9  และเป็นทศนิยม หรือไม่
        {

        } else
	  {
            $(e).val($(e).val().replace(digit, ""));//เอาค่าว่างไปแทนที่
            //ถ้าไม่ได้อยู่ในช่วง 0-9 และไม่ได้เป็นทศนิยมจะตัดตัวอักขระตัวนั้นออก
        }

    }
    
  

}

 function number_format(n) {
	 return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    
    function remove_comma(str)
    {
	  var re_str="";
	  var str_arr=str.split(",");
	  var i
	  for(i=0;i<str_arr.length;i++)
	  {
	     re_str+=str_arr[i];
	  }
	  
	  return re_str;
	  
    }

		
	  </script>
    
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- แสดงชื่อระบบ -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><!--Raptor Payroll-->
	   <img style='max-height: 80px;margin-top: -14px;' src="logo2.png" />
	</a>
    </div>

    <!-- แสดงเมนู -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
	<ul class="nav navbar-nav navbar-left">
	<li><a href="index.php">Raptor Payroll</a></li>
	</ul>
      
      <ul class="nav navbar-nav navbar-right">
	  
	    <li><a href="index.php?ID=<?php echo $ID; ?>">home</a></li>
	    <li><a href="company_list.php">company</a></li>
     	    <li><a href="branch_list.php">Branch</a></li>
	    <li><a href="employee_list.php">Employee</a></li>
	    <li><?php echo $_SESSION["Username"];?></li>
	    <li><a href="signout.php"><font size="2">| Logout</font></a></li>
      
      </ul>
	
	
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
    <div class="container" >
	<br />	
	<br /><br /><br />