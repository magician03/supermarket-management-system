<?php 
	require_once("include/header.php");
?>
<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
      <h1><span> Hello<?php echo" ".ucfirst($_SESSION['username']) ?></span></h1>
        <div id="contentbox">
            <div id="data">Stats:<br />
            <?php
			$query = "select sum(total_amount),sum(profit) from buy";
			$moneylist=mysql_query($query);
			$moneylist = mysql_fetch_array($moneylist);
			   echo"<b>Earnings</b><br />
					Total Earnings for today:<br />
					This Month Earnings:<br />
					Overall Earnings: Rs. {$moneylist['sum(total_amount)']}<br /><br />
					<b>Profits</b><br />
					Total Profits for today:<br />
					This Month Profits:<br />
					Overall Profits: Rs. {$moneylist['sum(profit)']}<br /><br />";
			?>
            </div>
        </div>
    </div>
</div>
<!-- body ends -->
<?php 
	require_once("include/footer.php");
?>