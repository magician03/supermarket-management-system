<?php 
	require_once("include/header.php");
?>
<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
        <h1><span>Supplier Details:</span></h1>
        <div id="data">To view list of suppliers <a style="text-decoration:underline" href="viewlist.php?list=supplier">click here</a><br /><br />
       		<?php 
			if(isset($_GET['success'])){
				$result=mysql_query("INSERT INTO supplier VALUES('{$_POST['dealer']}','{$_POST['email']}',NULL,'{$_POST['address']}','{$_POST['name']}',{$_POST['phone']})");
				if(!$result)echo "Addition not successful";
	   			else echo"Addition of supplier data successful";
			}
			else{
				echo "<form method='post' action='addsupplier.php?success=1'>
					  <table>
					    <tr><td style='padding:5px'>Name: </td><td><input name='name' type='text' /></td></tr>
						<tr><td style='padding:5px'>Address: </td><td><input name='address' type='text' /></td></tr>
						<tr><td style='padding:5px'>Dealer: </td><td><input name='dealer' type='text' /></td></tr>
						<tr><td style='padding:5px'>Phone: </td><td><input name='phone' placeholder='+91..' type='text' /></td></tr>
						<tr><td style='padding:5px'>Email: </td><td><input name='email' placeholder='name@email.com' type='text' /></td></tr>
						<tr><td style='padding:5px' colspan='2'><input type='submit' value='submit' /></td></tr>
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