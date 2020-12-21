<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title></title>
</head>
<body>
<header>
        <nav id="navbar">
            <div id="logo">
                
            </div>
            <ul id="navlist">
                <li class="item"><a href="home.html">Home</a></li>
                <li class="item"><a href="customer.php">Customers</a></li>
                <li class="item"><a href="transaction.php">Transaction</a></li>
                <li class="item"><a href="/contact">Contact Us</a></li>
            </ul>
        </nav>
</header>
    <br>
    <?php
            include 'config.php';

            $id = (isset($_GET['id']) ? $_GET['id'] : '');


            $selectquery = "SELECT * from customers where id=$id";


            $query = mysqli_query($con,$selectquery);

            $res = mysqli_fetch_array($query);

            ?>
    <br>
    <div style="color:darkorange;opacity:0.4;padding-left:80px;"><i class="fa fa-user fa-5x" aria-hidden="true"></i></div>
    <section class='sec'>
    <hr>
    <div class="details">Customer Name:  <?php echo $res['Name'];?></div>
    <br>
    <div class="details">Customer ID:  <?php echo $res['CustomerID'];?></div>
    <br>
    <div class="details">Balance:  <?php echo $res['Balance'];?></div>
    <br>
    <div class="details">Email:  <?php echo $res['Email'];?></div>
    <br>
    <div class="details">Address:  <?php echo $res['Address'];?></div>
    <br>
    <div class="details">Contact no: <?php echo $res['Contact'];?></div>
    <hr>
</section>

</body>
</html>
