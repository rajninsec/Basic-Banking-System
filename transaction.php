<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="table.css">
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
            </ul>
        </nav>
    </header>
<div class='main-div'>
    <h1 id='table-head'>Transaction Details</h1>
    <div class="c-table">
    <table id ="customers">
        <thead>
            <tr>
                <th>Transferer</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

        $conn1 = mysqli_connect("localhost","root","","transfers1");


        if($conn1){

        }
        else{
            die("no connection".mysqli_connect_error());
        }

            $selectquery =" select * from transactions1 ORDER BY id DESC LIMIT 10";

            $query = mysqli_query($conn1,$selectquery);

            $num= mysqli_num_rows($query);


            while($res = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $res['Transferer']; ?></td>
                    <td><?php echo $res['Receiver']; ?></td>
                    <td><?php echo $res['Amount']; ?></td>
                    <td><?php echo $res['datetime'];?></td>
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
