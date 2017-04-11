<?php 
	require_once("include/header.php");
?>
<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
    	<h1><span>Customer Details:</span></h1>
        <div id="data">To view list of customers <a style="text-decoration:underline" href="viewlist.php?list=customer">click here</a><br /><br />
        <?php 
		if(isset($_GET['success'])){
			
				$result=mysql_query("INSERT INTO customer VALUES(NULL,'{$_POST['fname']}','{$_POST['lname']}','{$_POST['cjoindate']}',{$_POST['cmoneyspent']},'{$_POST['caddress']}',{$_POST['cmoney_spent_reset']},{$_POST['cphone']})");
				if(!$result)echo "Addition not successful";
	   			else echo"Addition of customer data successful";
			}
			else{
				$time = date("Y-m-d");
				echo "<form method='post' action='addcustomer.php?success=1'>
					<table>
						<tr><td style='padding:5px'>First Name: </td><td><input name='fname' type='text' /></td></tr>
						<tr><td style='padding:5px'>Last Name: </td><td><input name='lname' type='text' /></td></tr>
						<tr><td style='padding:5px'>Address: </td><td><input name='caddress' type='text' /></td></tr>
						<input name='cjoindate' type='hidden' value='{$time}' />
						<input name='cmoneyspent' type='hidden' value='0'/>
						<input type='hidden' name='cmoney_spent_reset' value='0' />	
						<tr><td style='padding:5px'>Phone no.</td><td><input type='text' placeholder='+91..' name='cphone' /></td></tr>
						<tr><td colspan='2'><input type='submit' value='submit' /></td></tr>
					</table></form>";
			}
        ?>
         </div>
    </div>
</div>
<!-- body ends -->
<?php 
	require_once("include/footer.php");
?>