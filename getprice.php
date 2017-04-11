<?php
require_once("include/connection.php");
	if(isset($_GET['pid'])){
		$plist = mysql_query("select product_name, cost_price, quantity from product where product_id='{$_GET['pid']}'");
		while($row = mysql_fetch_array($plist)){
			echo"{$row['product_name']},{$row['cost_price']},{$row['quantity']}";
		}
	}
	else if(isset($_GET['pname'])){
		$plist = mysql_query("select product_id, cost_price, quantity from product where product_name='{$_GET['pname']}'");
		while($row = mysql_fetch_array($plist)){
			echo"{$row['product_id']},{$row['cost_price']},{$row['quantity']}";
		}
	}
?>