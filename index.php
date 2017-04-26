<?php 
	require_once("include/header.php");
?>
<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
        <div id="contentbox">
            <div id="data">Statistics:<br/><br/>
            <?php
			$query = "select sum(total_amount),sum(profit) from buy";
			$moneylist=mysql_query($query);
			$moneylist = mysql_fetch_array($moneylist);
			   echo"<b>Earnings</b><br />
					Total Earnings for today: INR 100<br />
					This Month Earnings: INR 10000<br />
					Overall Earnings: Rs. {$moneylist['sum(total_amount)']}<br /><br />
					<b>Profits</b><br />
					Total Profits for today: INR 40<br />
					This Month Profits: INR 4000<br />
					Overall Profits: INR {$moneylist['sum(profit)']}<br /><br />";
			?>
            </div>
        </div>
    </div>
</div>
<!-- body ends -->
<?php 
	require_once("include/footer.php");
?>