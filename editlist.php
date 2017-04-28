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
				if(!$result)echo "Editing not successful ".mysql_error();
	   			else echo"<h1><span>Editting of product data successful</span></h1>";
			}
			elseif(!strcmp(strtolower($_GET['name']),"employee")){
				$result = mysql_query("update employee set first_name='{$_POST['fname']}', last_name='{$_POST['lname']}', dept_id='{$_POST['dept_id']}', salary='{$_POST['salary']}', phone_number='{$_POST['pnum']}', address='{$_POST['address']}', uid='{$_POST['uid']}', dob='{$_POST['bdate']}', join_date='{$_POST['jdate']}', end_date='{$_POST['edate']}', perks='{$_POST['perks']}', admin='{$_POST['admin']}' where id='{$_POST['id']}'");
				if(!$result)echo "Editing not successful".mysql_error();
				else echo"<h1><span>Editing of employee data is successful</span></h1>"; 
			}
			elseif(!strcmp(strtolower($_GET['name']),"supplier")){
				$result = mysql_query("update supplier set sname='{$_POST['name']}', saddress='{$_POST['address']}', sdealer='{$_POST['dealer']}', sphone='{$_POST['phone']}', semail='{$_POST['email']}' where sid='{$_POST['id']}' ");
				if(!$result)echo "Editing not successful".mysql_error();
				else echo "<h1><span>Editing of supplier data is successful</span></h1>";
			}
			elseif (!strcmp(strtolower($_GET['name']),"customer")) {
				$result = mysql_query("update customer set first_name='{$_POST['fname']}', last_name='{$_POST['lname']}', caddress='{$_POST['caddress']}', cphone='{$_POST['cphone']}', cjoin_date={$_POST['cjoindate']}, cmoney_spent='{$_POST['cmoneyspent']}', cmoney_spent_reset='{$_POST['cmoney_spent_reset']}' where cid='{$_POST['id']}' ");
				if(!$result)echo "Editing is not successful".mysql_error();
				else echo"<h1><span>Editing of customer is successful</span></h1>";
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
                    <td><input type='text' name='fname' value='{$plist['first_name']}' /></td></tr>               
                <tr><td style='padding:5px'>Last Name:</td>
                    <td><input type='text' name='lname' value='{$plist['last_name']}' /></td></tr>
					<tr><td style='padding:5px'>Dept: </td>
						<td><select list='depts' name='dept_id' placeholder='0' value='{$plist['dept_id']}' /><datalist id='depts'>";
						
						$dept_set = mysql_query("select dept_name, dept_id from department");
				while($row = mysql_fetch_array($dept_set))
					echo "<option value='{$row['dept_id']}'>{$row['dept_name']}</option>";
																	
					echo"</select></datalist>
						</td></tr> 
                 <tr><td style='padding:5px'>Salary</td>
                 <td><input type='text' name='salary' value='{$plist['salary']}' /></td></tr>
                 <tr><td style='padding:5px'>Phone No.</td>
                 <td><input type='text' placeholder='+91..' name='pnum' value='{$plist['phone_number']}' /></td></tr>
                 <tr><td style='padding:5px'>Address</td>
                 <td><input type='text' name='address' value='{$plist['address']}' /></td></tr>
                 <input value='{$plist['id']}'  name='id' type='hidden'>
                 <tr><td style='padding:5px'>Uid</td>
                 <td><input type='text' name='uid' value='{$plist['uid']}' /></td></tr>
                 <tr><td style='padding:5px'>Dob</td>
                 <td><input type='text' name='bdate' placeholder='YYYY-MM-DD' value='{$plist['dob']}' /></td></tr>
                 
				 <input type='hidden' name='jdate' value='{$time}' value='{$plist['join_date']}' />
				 
                 <input type='hidden' name='edate' value='0000-00-00' value='{$plist['end_date']}' />
				           
                 <input type='hidden' name='perks' value='0' value='{$plist['perks']}'/>
				 <tr><td style='padding:5px'>Admin</td><td><select name='admin'>
				 	<option value='1'>Admin</option>
					<option value='0'>Not Admin</option>
					</select></td></tr>
                 <tr><td colspan='2'><button class='waves-effect waves-light btn' type='submit' name='submit' value='Submit' />Submit</button></td></tr>
        </table></form>";
				}
				elseif (!strcmp(strtolower($_GET['name']),"supplier")) {
					$plist=mysql_query("select * from supplier where sid='{$_GET['id']}'");
					$plist=mysql_fetch_array($plist);
					echo "<form method='post' action='editlist.php?name=supplier&success=1'>
					  <table>
					    <tr><td style='padding:5px'>Name: </td><td><input name='name' type='text' value='{$plist['sname']}' /></td></tr>
						<tr><td style='padding:5px'>Address: </td><td><input name='address' type='text' value='{$plist['saddress']}' /></td></tr>
						<tr><td style='padding:5px'>Dealer: </td><td><input name='dealer' type='text' value='{$plist['sdealer']}' /></td></tr>
						<tr><td style='padding:5px'>Phone: </td><td><input name='phone' placeholder='+91..' type='text' value='{$plist['sdealer']}' /></td></tr>
						<input value='{$plist['sid']}' name='id' type='hidden'>
						<tr><td style='padding:5px'>Email: </td><td><input name='email' placeholder='name@email.com' type='text' value='{$plist['semail']}' /></td></tr>
						<tr><td style='padding:5px' colspan='2'><button class='waves-effect waves-light btn' type='submit' value='submit' />Submit</button></td></tr>
					  </table></form>";
				}
				elseif (!strcmp(strtolower($_GET['name']),"customer")) {
					$plist = mysql_query("select * from customer where cid='{$_GET['id']}'");	
					$plist = mysql_fetch_array($plist);
					echo "<form method='post' action='editlist.php?name=customer&success=1'>
					<table>
						<tr><td style='padding:5px'>First Name: </td><td><input name='fname' type='text' value='{$plist['first_name']}' /></td></tr>
						<tr><td style='padding:5px'>Last Name: </td><td><input name='lname' type='text' value='{$plist['last_name']}' /></td></tr>
						<tr><td style='padding:5px'>Address: </td><td><input name='caddress' type='text' value='{$plist['caddress']}' /></td></tr>
						<tr><td style='padding:5px'>Phone no.</td><td><input type='text' placeholder='+91..' name='cphone' value='{$plist['cphone']}' /></td></tr>
						<input type='hidden' name='id' value='{$plist['cid']}' />
						<input name='cjoindate' type='hidden' value='{$plist['cjoin_date']}' />
						<input name='cmoneyspent' type='hidden' value='{$plist['cmoney_spent']}'/>
						<input type='hidden' name='cmoney_spent_reset' value='{$plist['cmoney_spent_reset']}' />	
						<tr><td colspan='2'><button class='waves-effect waves-light btn' type='submit' value='submit' />Submit</button></td></tr>
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
