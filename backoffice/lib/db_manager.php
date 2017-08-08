<?php
    date_default_timezone_set("Asia/Bangkok");
    error_reporting(E_ERROR|E_WARNING);//ไม่ต้องขึ้นข้อความเตือน
    
     function runSqlQuery($sql)//ส่งคำสั่งให้ mysql ทำงาน
    {
       
		//include คือ เอา code หน้าที่ include มาแปะ
        include("db_config.php");//เก็บ username password
		
		//ตรวจสอบ username password
        $link=mysqli_connect($dbHost,$dbUname,$dbPword,$dbName);
      
       
	   //ให้ใช้ ภาษาไทยได้
        mysqli_query($link,'SET CHARACTER SET utf8');
		mysqli_query($link,'SET collation_connection = "utf8_unicode_ci"');

       //ส่งให้ mysql ทำงาน
       $result=mysqli_query($link,$sql);
	   //ตัวแปร $result เก็บผลลัพธ์ของคำสั่ง sql
	   
	    //ปิดการเชื่อมต่อ mysql
	   mysqli_close($link);

       return $result;//ส่งผลลัพธ์กลับไปให้ตัวที่เรียก
    }
	
	//ใช้สำหรับ select มันจะ return array 2  มิติ ( row กับ column )
	function  get_row_sql($sql)//หาผลลัพธ์ของ คำสั่ง sql select โดดยผลลัพธ์คือ  ตาราข้อมูล ( array สองมิติ )
	{
		
		$result2=runSqlQuery($sql);//ส่งคำสั่งให้ mysql ทำงาน
		while ($property = mysqli_fetch_field($result2)) 
		{
			$field[count($field)]=$property->name;	
		}
		
		$count_row=0;
		
		$result=runSqlQuery($sql);//ส่งคำสั่งให้ mysql ทำงาน
		//$result คือ ผลลัพธ์ของคำสั่ง
		
		
		while($resultArray=mysqli_fetch_array($result,MYSQLI_BOTH))//ตัดแสดงทีละแถวจนกว่าจะถึงแถวสุดท้าย
		{
				
			//อ่านข้อมูลทีละ column
			for($i=0;$i<count($field);$i++)
			{
				$data[$count_row][$field[$i]]=$resultArray[$field[$i]];
			}
			
			$count_row++;

		}
		return $data;//ส่งข้อมูลกลับ
	}
	
	function fill_input($element,$value)//กรอกข้อมูลลงในฟอร์ม
	{
	   //$element คือ id ของ input
	   //$value คือค่าที่ต้องการ ใส่
	   
	   //เมื่อโหลดหน้าเว็บแล้วให้ ใส่ค่าลงใน input
	   echo "<script>";
	   echo "$(document).ready(function(){";
	   
	   echo "$('".$element."').val('".$value."');";
		
	   echo "});";
	   echo "</script>";
	}
	
	//หาว่า คำสั่ง sql 1 คำสั่ง จะได้ผลลัพธ์กี่แถว
	function row_count($sql)
	{
		$result=runSqlQuery($sql);//ส่งคำสั่งให้ mysql ทำงาน
		return mysql_numrows($result);//return จำนวนแถวของคำสั่ง sql
	}
	
	
	function post_form()//รับค่าต่างๆ จากฟอร์ม
	{
		//$key คือ name จาก form
		//$value คือ ค่าที่ส่งมา
		foreach ($_POST as $key => $value){ // หาวค่า $_POST[key] ทุกตัว 
		  $data[$key]=$value;//สร้าง array เพื่อ return กลับไป
		}
		
		return $data;
		
	}
	
	function  get_row_json($sql)//หาผลลัพธ์ของ คำสั่ง sql select โดดยผลลัพธ์คือ  ตาราข้อมูล ( array สองมิติ )
	{
		$result2=runSqlQuery($sql);//ส่งคำสั่งให้ mysql ทำงาน
		while ($property = mysqli_fetch_field($result2)) 
		{
			$field[count($field)]=$property->name;	
		}
		
		$count_row=0;
		
		$result=runSqlQuery($sql);//ส่งคำสั่งให้ mysql ทำงาน
		//$result คือ ผลลัพธ์ของคำสั่ง
		
		$json="[";
		
		while($resultArray=mysqli_fetch_array($result,MYSQLI_BOTH))//ตัดแสดงทีละแถวจนกว่าจะถึงแถวสุดท้าย
		{
			$json.="{";
			//อ่านข้อมูลทีละ column
			
			for($i=0;$i<count($field);$i++)
			{
				
				$json.="\"".$field[$i]."\":\"".str_replace("\"","",$resultArray[$field[$i]])."\",";
			}
			
			$json=substr($json,0,strlen($json)-1);
			$json.="},";
			

		}
		
		if($json!="[")
		{
			$json=substr($json,0,strlen($json)-1);
		}
		
		$json.="]";
		
		return str_replace("\r\n","<br />",$json);//ส่งข้อมูลกลับ
	}
	
	function date_format_mysql($date)// dd/mm/yyyy แปลงเป็น  yyyy-mm-ddd 
	{
		if($date=="")
		{
			return;
		}
		
		//substr คือ function  ตัดคำใน string 
		// substr( คำ,ตำแหน่งเริ่มต้น,จำนวนตัวอักษร);
		
		$day=substr($date,0,2);
		$month=substr($date,3,2);
		$year=substr($date,6,4);
		$time=substr($date,11);
		
		return $year."-".$month."-".$day." ".$time;
		
	}
	
	
	
	function date_thai($date)// yyyy-mm-ddd แปลงเป็น  dd/mm/yyyy
	{
		if($date=="")
		{
			return;
		}
		
		
		$year=substr($date,0,4);
		$month=substr($date,5,2);
		$day=substr($date,8,2);
		$time=substr($date,11);
		
		return $day."/".$month."/".$year." ".$time;
		
		
	}
	
	function show_product_type()//แสดงตัวเลือกประเภทสินค้า
	{
		
		$sql="SELECT * FROM product_type ORDER BY type_name";
		$data=get_row_sql($sql);
		
		for($i=0;$i<count($data);$i++)
		{
			?>
			<option value="<?php echo $data[$i]["type_id"]; ?>" ><?php echo $data[$i]["type_name"]; ?></option>
			<?php
		}
		
	}
	
	function get_product_type_name($type_id)//อ่านค่าสินค้าจาก รหัสประเภท
	{
		$sql="SELECT * FROM product_type WHERE (type_id=".$type_id.")";
		$product_type=get_row_sql($sql);
		return $product_type[0]["type_name"];
	}
	
	function get_sum_cost($buy_id)//หาจำนวนเงินที่ต้องจ่ายจากรหัสการสั่งซื้อ
	{
		$sql="SELECT SUM(qty*cost) AS total_cost FROM buy_detail WHERE (buy_id='".$buy_id."')";
		$data=get_row_sql($sql);
		return $data[0]["total_cost"];
		
	}
	
	function get_customer($cus_email)//หาชื่อ นามสกุล ลูกค้า จาก  รหัสลูกค้า
	{
		$sql="SELECT *  FROM customer WHERE (cus_email='".$cus_email."')";
		$data=get_row_sql($sql);
		return $data[0]["cus_name"]." ".$data[0]["cus_lastname"] ;
		
	}
	
	function get_customer_info($cus_id)//หาชื่อ นามสกุล ลูกค้า เบอร์โทรศัพท์ email จาก  รหัสลูกค้า
	{
		$sql="SELECT *  FROM customer WHERE (cus_id='".$cus_id."')";
		$data=get_row_sql($sql);
		return  "<h4> ข้อมูลลูกค้า  ".$data[0]["cus_name"]." ".$data[0]["cus_lastname"]."</h4><h4>เบอร์โทรศัพท์ ".$data[0]["cus_tel"]." Email ".$data[0]["cus_email"]."</h4>" ;
		
	}
	
	function get_product_name($product_id)//หาชื่อสินค้า จาก รหัสสินค้า
	{
		$sql="SELECT *  FROM product WHERE (product_id='".$product_id."')";
		$data=get_row_sql($sql);
		return $data[0]["product_name"];
		
	}
	
	
	function check_stock($product_id,$size,$buy_qty)//หาว่าสินค้าที่ส่งมีมากกว่าใน stock หรือไม่
	{
	  
		$sql="SELECT qty FROM product_stock WHERE (product_id='".$product_id."')AND(size='".$size."')";
		$stock=get_row_sql($sql);
		
		if($stock[0]["qty"]<$buy_qty)
		{
		    return $stock[0]["qty"];//ส่งจำนวนที่มีอยู่ในปัจจุบัน
		}
		else
		{
		    return "ok";//แสดงว่า มีสินค้าพอ
		}
	  
	}
	
	
	
?>
