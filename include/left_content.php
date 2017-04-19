<?php if(isset($_SESSION['username'])){
	echo"<div class='lcontent'>
                <ul class='bmenu'>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='settings.php'>Settings</a></li>
                    <li><a href='transaction.php'>Transaction</a></li>";                   
                    if(isset($_SESSION['admin']) & $_SESSION['admin']!=0){
						echo "<li><a href='addproduct.php'>+ Product</a></li>
							  <li><a href='addemp.php'>+ Employee</a></li>
							  <li><a href='addsupplier.php'>+ Supplier</a></li>
							  <li><a href='addcustomer.php'>+ Customer</a></li>
							  <li><a href='addpromo.php'>+ Promo</a></li>";
							  if($_SESSION['admin']==2) echo "<li><a href='adddept.php'>+ Dept</a></li>";    
					}
    echo"</ul></div>";
              //btw above ul and div <!-- <div class='more'></div>-->
} ?>