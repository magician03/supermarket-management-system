<?php
session_start();
 if(isset($_SESSION['username'])){
        session_destroy(); 
		}
require_once("include/connection.php");
?>
<html>
    <head>
        <title>Supermarket Backend</title>        
        <link rel="stylesheet" type="text/css" href="css/outline.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />		
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/design.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
    </head>

<body>
<div class="container">
            <div class="header">
                <a href="#">
                    <strong>Logo Supermarket</strong> Backend
                </a>
                <span class="right">
                    <?php echo "<a href='login.php'>Log In</a>"; ?>    
                </span>
                <div class="clr"></div>
            </div>
<div id="body">
	<div align="center">
    <div class="mcontent">
    	<?php if(isset($_SESSION['username'])){
        		echo "Logout Successful.<div id='data'>Click <a href='login.php'>here</a> to Login again</div>"; }
		   else echo "<h1><span>No session detected.</span></h1><div id='data'>Please login <a href='login.php'>here</a></div>";
		?>
    </div>
</div>
<!-- body ends -->
<?php 
	//require_once("include/footer.php");
?>
