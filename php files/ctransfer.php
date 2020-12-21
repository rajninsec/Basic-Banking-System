<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="table.css">
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

<div class='main-div'>
    <h1 id="table-head">List of Customers </h1>
    <div class="c-table">
    <table id="customers">
        <thead>
            <tr>
                <th>CustomerID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Transfer To</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $id = (isset($_GET['id']) ? $_GET['id'] : '');

            $select_query = "SELECT * from customers where id=$id";

            $query1 = mysqli_query($con,$select_query);

            $res1 = mysqli_fetch_array($query1);

            $cid= $res1['CustomerID'];

            $tamount = $res1['Balance'];

            ?>

            <?php
            
            session_start();

            $_SESSION['tid']=$cid;

            $_SESSION['tbalance']=$tamount;

    

            ?>

            
            <?php

            $selectquery =" select * from customers ";

            $query = mysqli_query($con,$selectquery);

            $num= mysqli_num_rows($query);

            while($res = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $res['CustomerID']; ?></td>
                    <td><?php echo $res['Name']; ?></td>
                    <td><?php echo $res['Email']; ?></td>
                    <td><?php echo $res['Balance']; ?></td>
                    <td>
                        <a href="mtransfer.php?id=<?php echo $res['id']; ?>">
                        <input type='submit' class="button" name='transfer' value='Transfer To'/>
                        </a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>
