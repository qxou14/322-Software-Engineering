<?php 
    include "sectionStart.php";
    include "database.php";

    

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
			.menu {
				margin-bottom: 15px;
				max-width: 1200px;
    			margin: 0 auto;
			}
			.menu_restName {
				text-align: center;
    			font-size: 70px;
    			margin-top: 0;
			}
			.menu_title {
				text-align: center;
			}
			.menu_section {
				margin-bottom: 30px;
			}
			.menu_section h3 {
				font-style: italic;
			}
			.menu_item {
				margin: 0 15px;
				position: relative;
			}
			.menu_item h4 {
				margin-bottom: 0px;
			}
			.price {
				display: block;
				float: right;
				position: absolute;
				bottom: 0px;
				right: 0;
				background-color: white;
				font-weight: bold;
			}
			.description {
				margin-top: 5px;
				font-style: italic;
				background-color: white;
				display: inline-block;
				max-width: 50%;
			}
			hr {
				border: none;
    			border-top: 1px dotted black;
    			margin-top: -20px;
			}
			footer:not(.app-footer) {
				text-align: center;
    			font-size: 11px;
				font-style: italic;
			}
			@media (max-width: 575px) {
				.menu_title {
					text-align: center;
					font-size: 30px;
				}
				.menu_section h3 {
					text-align: center;
    				font-size: 30px;
				}
				.menu_item {
					text-align: center;
				}
				.price {
					float: none;
					position: static;
					margin-top: 15px;
				}
				hr {
					display: none;
				}
			}
        </style>
<link rel = "stylesheet" type = "text/css" href ="style.css">

<div class = "introduction"> The Online Restaurant </div>
<div class = "look">
    <span><a href="index.php"> Home </a></span>
    <span><a href = "AboutUs.html">About Us</a></span>
    <span><a href = "Contact.html">Contact</a></span>
    <span><a href = "deposit.php"> Deposit</a></span>
    <span><a href = "logout.php"> Log out</a></span>
</div>
</head>
<body>
<section class="menu"><h2 class="menu_title">Our Menu</h2>
						<div class="menu_section Chef_1_Dishes"><h3>Popular Dishes</h3>
						<div class="menu_item Yoshinoya_beef_bowl">
							<h4 class="name">Yoshinoya beef bowl</h4>
							<span class="price">$10.99  <button>Add to Order</button><input type="number" id="qty" name="qty"
       min="0" max="20"></span>
							<p class="description">Food description</p>
							
							<hr>
						</div>
					
						<div class="menu_item Nigirizushi">
							<h4 class="name">Nigirizushi</h4>
							<span class="price">$10.99  <button>Add to Order</button><input type="number" id="qty" name="qty"
       min="0" max="20"></span>							<p class="description">Food Description</p>
							<hr>
						</div>
						<div class="menu_item Tamagoyaki">
							<h4 class="name">Tamagoyaki</h4>
							<span class="price">$10.99  <button>Add to Order</button><input type="number" id="qty" name="qty"
       min="0" max="20"></span>							<p class="description">Food Description</p>
							<hr>
						</div>
					</div>
					<div class="menu_section Chef_2_Dishes"><h3>Cultural Dishes</h3>
						<div class="menu_item Unadon">
							<h4 class="name">Unadon</h4>
							<span class="price">$10.99  <button>Add to Order</button><input type="number" id="qty" name="qty"
       min="0" max="20"></span>							<p class="description">Dish Description</p>
							<hr>
						</div>
					
						<div class="menu_item Aburi_zushi">
							<h4 class="name">Aburi zushi</h4>
							<span class="price">$10.99  <button>Add to Order</button><input type="number" id="qty" name="qty"
       min="0" max="20"></span>							<p class="description">Dish Description</p>
							<hr>
						</div>
						<div class="menu_item japanese_dumpling">
							<h4 class="name">japanese dumpling</h4>
							<span class="price">$10.99  <button>Add to Order</button><input type="number" id="qty" name="qty"
       min="0" max="20"></span>							<p class="description">Dish Description</p>
							<hr>
						</div>
					</div></section>




</body>
</html>

<h3><i>Username: <?php echo $_SESSION['username']; ?> <i></h3>

<?php 
    $username = $_SESSION['username'];
    $sql = "SELECT saving FROM info  WHERE username = '$username' ";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<h3><i> Money left: {$row['saving']} </i></h3>";

    $sql = "SELECT warning FROM info  WHERE username = '$username' ";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();
    echo "<h3><i> Warnings: {$row['warning']} </i></h3>";

?>

