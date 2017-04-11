<?php
session_start(); 
	require_once("connection.php");
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
		<!--[if IE]>
			<link rel="stylesheet" type="text/css" href="css/styleIE.css" />
		<![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css' />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>
<div class="container">
            <div class="header">
                <a href="#">
                    <strong>Logo Supermarket</strong> Backend
                </a>
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