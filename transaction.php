<?php
session_start(); 
	require_once("include/connection.php");
	//check login
		//if from another page, check for session existence
	if(!isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>Supermarket Backend</title>        
        <link rel="stylesheet" type="text/css" href="css/outline.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />		
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/design.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
</head>

<body onload="addData()">
<div class="container">
            <div class="header">
            <a href='index.php'><img src="images/logo.png" width="120" height="80" alt='Logo' /></a>
                <span class="right">
                    <?php if(isset($_SESSION['username']))
						echo "<a href='logout.php'>Logout</a>";
						else
						echo "<a href='login.php'>Log In</a>";
					?>|
                    <a href="mydetails.php">
                        <strong><?php echo $_SESSION['username']?></strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
    	<h1><span>Transaction</span></h1>
        <div id="data">
        <?php
		if(isset($_POST['cancel'])) mysql_query("truncate table transaction"); ?>
        <span id="transalert"></span>
        	<form action="sell.php" method="post">
        		<table border="0" style="width:100%">
                <tr><td style="vertical-align:top; padding:10px; width:40%">
                	<table style="margin-left:auto; margin-right:auto">
                        <tr><td>Product ID:</td><td><input type="text" id='prodid' name="prodid" onChange="pidChange(id,this.value)"/></td></tr>
                        <tr><td>Product Name:</td><td><input type="text" id='prodname' onchange='pnameChange(name,this.value)' name="prodname"/></td></tr>      					<tr><td>Quantity:</td><td><input type="text" id='quantity' name="quantity" size="6"/><span id='quantityDisp'></span></td></tr>
                        <tr><td>Price:</td><td>Rs.&nbsp;<span id="itemPrice">0</span></td></tr>            
                        <tr><td colspan="2" style="float:right"><input type="button" id='add' value="add" onClick="transadd()" /></td></tr>
                        <tr><td>PromoCode:</td><td><input type="text" id='discount' name="discount" size="6"/></td></tr>
                        <tr><td>Customer Id:</td><td><input type="text" id='cid' name="cid" size="6" placeholder="0 for Guest"/></td></tr>
                    </table>
        			</td>
        			<td style="vertical-align:top; padding:10px; width:50%">
                    
                        <span id="transtable" style="overflow:auto">
						<?php if($_SESSION['transaction']==0) echo "No Items added yet.";
							  else if($_SESSION['transaction']==1) echo "<script type='text/javascript'>addData()</script>"; ?>
                        </span>
                    
            		</td>
                </tr>                        
                <tr><td><input type="submit" name="submit" onclick="validate()" value="Pay & Print"/></form></td><td>
                <form action="transaction.php" method="post"><input type="submit" value="cancel" name="cancel"/></form></td></tr>       
                </table>                      
        <div class="clear" style="clear:both"></div><br /><br />
        </div>
         </div>
    </div>

<!-- body ends -->
<?php 
	require_once("include/footer.php");
?>