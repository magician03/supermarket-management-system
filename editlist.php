<?php 
	require_once("include/header.php");
?>
<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
    
      <?php
	  if(isset($_GET['success'])){
	  		if(!strcmp(strtolower($_GET['name']),"product")){
				$result=mysql_query("update product set product_name='{$_POST['product_name']}',cost_price={$_POST['cprice']},supplier_id={$_POST['supplier']},quantity={$_POST['quantity']},product_type='{$_POST['product_type']}',market_price={$_POST['mprice']} where product_id='{$_POST['product_id']}'");
				if(!$result)echo "Addition not successful ".mysql_error();
	   			else echo"<h1><span>Editting of product data successful</span></h1>";
			}
		}
		else{
		   if(isset($_GET['name'])&isset($_GET['id'])){
			//product
			if(!strcmp(strtolower($_GET['name']),"product")){
				echo"<h1><span>Edit ".ucfirst($_GET['name'])."</span></h1>";
				echo"<div id='data'>";
				
				
					$plist=mysql_query("select * from product where product_id='{$_GET['id']}'");
					$plist=mysql_fetch_array($plist);
				echo "<form method='post' action='editlist.php?name=product&success=1'>
						  <table>
						    <tr><td style='padding:5px'>Product Name: </td><td><input name='product_name' type='text' value='{$plist['product_name']}' /></td></tr>
							<input type='hidden' name='product_id' value='{$plist['product_id']}' />
							<tr><td style='padding:5px'>Product type: </td>
							<td><select name='product_type'>";
							
							$dept_set = mysql_query("select dept_id, dept_name from department");
					while($row = mysql_fetch_array($dept_set))
						if($row['dept_id']==$plist['product_type']) echo "<option value='{$row['dept_id']}' selected='selected'>{$row['dept_name']}</option>";
						else echo "<option value='{$row['dept_id']}'>{$row['dept_name']}</option>";
																		
						echo"</select>
							</td></tr>
							<tr><td style='padding:5px'>Supplier ID: </td>
							<td><select name='supplier'>";
							
							$supplier_set = mysql_query("select sid, sname from supplier");
					while($row = mysql_fetch_array($supplier_set))
						if($row['sid']==$plist['supplier_id']) echo "<option value='{$row['sid']}' selected='selected'>{$row['sname']}</option>";
						else echo "<option value='{$row['sid']}'>{$row['sname']}</option>";
							
							echo"</select></td></tr>
							<tr><td style='padding:5px'>Quantity: </td><td><input name='quantity' type='text' value='{$plist['quantity']}' /></td></tr>
							<tr><td style='padding:5px'>Market Price: </td><td><input name='mprice' type='text' value='{$plist['market_price']}' /></td></tr>  
							<tr><td style='padding:5px'>Cost Price: </td><td><input name='cprice' type='text' value='{$plist['cost_price']}' /></td></tr>
							<tr><td style='padding:5px' colspan='2'><input type='submit' value='submit' /></td></tr>
						  </table></form>";
				echo"</div>";
				}
				elseif(!strcmp(strtolower($_GET['name']),"employee")){
					$plist=mysql_query("select * from employee where id='{$_GET['id']}'");
					$plist=mysql_fetch_array($plist);
					echo "<form method='post' action='editlist.php?name=employee&success=1'>
		        	<table>
		            	<tr><td style='padding:5px'>First Name:</td>
		                    <td><input type='text' name='fname' /></td></tr>               
		                <tr><td style='padding:5px'>Last Name:</td>
		                    <td><input type='text' name='lname' /></td></tr>
							<tr><td style='padding:5px'>Dept: </td>
								<td><input list='depts' name='dept_id' placeholder='0' value='NULL'><datalist id='depts'>";
								
								$dept_set = mysql_query("select dept_id, dept_name from department where manager_id='0'");
						while($row = mysql_fetch_array($dept_set))
							echo "<option value='{$row['dept_id']}'>{$row['dept_name']}</option>";
																			
							echo"</datalist>
								</td></tr> 
		                 <tr><td style='padding:5px'>Salary</td>
		                 <td><input type='text' name='salary' /></td></tr>
		                 <tr><td style='padding:5px'>Phone No.</td>
		                 <td><input type='text' placeholder='+91..' name='pnum' /></td></tr>
		                 <tr><td style='padding:5px'>Address</td>
		                 <td><input type='text' name='address' /></td></tr>
		                 <tr><td style='padding:5px'>Uid</td>
		                 <td><input type='text' name='uid' /></td></tr>
		                 <tr><td style='padding:5px'>Dob</td>
		                 <td><input type='text' name='bdate' placeholder='YYYY-MM-DD' /></td></tr>
		                 
						 <input type='hidden' name='jdate' value='{$time}' />
						 
		                 <input type='hidden' name='edate' value='0000-00-00' />
						           
		                 <input type='hidden' name='perks' value='0'/>
						 <tr><td style='padding:5px'>Admin</td><td><select name='admin'>
						 	<option value='1'>Admin</option>
							<option value='0'>Not Admin</option>
							</select></td></tr>
		                 <tr><td colspan='2'><input type='submit' name='submit' value='Submit' /></td></tr>
		        </table></form>";
				}
			}
	  }
	  ?>
       
    </div>
</div>
<!-- body ends -->
<?php 
	require_once("include/footer.php");
?>