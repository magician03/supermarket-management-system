<?php
require_once("include/connection.php");
echo"<script type='text/javascript' src='js/script.js'></script>
<style type='text/css'>
#list{
	width:100%;
}
#list a{
	color:#006b68;
}
#list a:hover{
	color:#006b68;
	text-decoration:underline;
}
#list th,td{
	padding:2px;
	text-align:center;
}

#list tr:nth-child(even){
	background-color: #CCC;
	opacity:0.5;
}
#list tr:nth-child(odd){
}
#list tr:nth-child(1){
	background-color:#006b68;
	opacity:0.5;
	color:#fff;
}
</style>";
if(isset($_GET['id'])){
	mysql_query("delete from transaction where id='{$_GET['id']}'");
}
if(isset($_GET['pid']) & isset($_GET['q'])){
	$pid = $_GET['pid'];
	$quan = $_GET['q'];
	$plist = mysql_query("select product_name, cost_price from product where product_id='{$pid}'");
	if(!$plist) die("error");
	if(mysql_num_rows($plist)){	
		while($row = mysql_fetch_array($plist)){
			$pname = $row['product_name'];
			$price = $row['cost_price'];
			$price*=$quan;	
		}
	}
	mysql_query("insert into transaction values('{$pname}',$pid,$quan,$price,NULL)");
}
	$translist = mysql_query("select * from transaction");
	$transmax = mysql_query("select sum(price) from transaction");
	$transmax = mysql_fetch_array($transmax);
	if(mysql_num_rows($translist)){
		echo "<table id='list' style='width:100%'>
		  <tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Options</th></tr>";
		  
		while($row = mysql_fetch_array($translist)){
			//transtable.php?id={$row['id']}
			echo "<tr><td>{$row['p_name']}</td><td>{$row['quantity']}</td><td>{$row['price']}</td>
			<td><a href='javascript:delData({$row['id']})'>Delete</a></td>
			</tr>";
		}echo "</table><table style='width:100%'><tr><td style='float:right'>Total Rs. {$transmax['sum(price)']}</td></tr></table>";
	}
	else echo "No items added yet.";
?>