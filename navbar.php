<!DOCTYPE html>
<html>
	<head>
	<title>
        home
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	</head>
	<body>
        <nav class="navbar navbar-light bg-light justify-content-between" id="mainnav">
                <a class="navbar-brand">eWholeFoods</a>
                <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php ?></span></a>
                <a href="logout.php">Sign Out &nbsp;&nbsp; <i style='font-size:24px' class='fas'>&#xf2f5;</i></a>
        </nav>
        <nav class="navbar navbar-light bg-light justify-content-between " id="productnav">
        
            <form class="form-inline" name="category" action="BrowseProductsPage.php" method="POST" >
                <input type="submit" value="Fruit" name="category" class="">
                <input type="submit" value="Vegetable" name="category"class="">
                <input type="submit" value="Meat" name="category"class="">
                <input type="submit" value="Dairy" name="category"class="">
                <input type="submit" value="Grain" name="category"class="">
                <input type="submit" value="Frozen" name="category"class="">
                <input type="submit" value="Beverage" name="category"class="">
                <input type="submit" value="Bakery" name="category"class="">
            </form>
</nav>
        <div class="container">

