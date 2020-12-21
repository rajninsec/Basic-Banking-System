<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="form.css">
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
            </ul>
        </nav>
    </header>
        <h1 id="form-head">Money Transfer</h1>



        <div class='transfer-form'>
        <form method='POST' action='actions.php'>
        <?php
            include 'config.php';

            $id = (isset($_GET['id']) ? $_GET['id'] : '');


            $selectquery = "SELECT * from customers where id=$id";


            $query = mysqli_query($con,$selectquery);

            $res = mysqli_fetch_array($query);

            $ramount=$res['Balance'];
            ?>

            <?php
            session_start();
            $_SESSION['ramount']=$ramount;
            ?>
            <label for='c1'>CustomerID of person who transfers money</label><br>
            <input type='text' id='c1' name='customer1' value="<?php echo $_SESSION["tid"];?>"/><br><br>
            <label for='c2'>CustomerID of person who receives money</label><br>
            <input type='text' id='c2' name='customer2' value="<?php echo $res['CustomerID'];?>"/><br><br>
            <label for='c3'>Amount to be transfered</label><br>
            <input type='text' id='c3' name='amount'/><br><br>
            <input type='submit'  id="button" name='submit' value='Transfer'/>
        
            </div>
        </form> 
    </body>
</html>














