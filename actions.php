<?php
session_start();

include 'config.php';

$conn1 = mysqli_connect("localhost","root","","transfers1");


if($conn1){

}
else{
    die("no connection".mysqli_connect_error());
}


if(isset($_POST['submit'])){
    
    $customer1=$_POST['customer1'];

    $customer2 = $_POST['customer2'];

    $amount=$_POST['amount'];


    $transfer_amount=$_SESSION['tbalance'];
    $Receiver_amount=$_SESSION['ramount'];
    $transaction = $_REQUEST['amount'];

    $amount_valid = false;
    $customer_valid=false;


    if(!empty($amount)){
        if($transfer_amount>$transaction){
            $amount_valid = true;
        }else{
            echo "<p style='font-size: 50px;'>Insufficient Amount!! Please enter valid amount.</p>";}
    }else{
        echo "<p style='font-size: 50px;'>Amount must be filled.\n</p>";
    }



    if($customer1==$customer2){
        echo "<p style='font-size: 50px;'>Transaction not possible.\n</p>";
    }
    else{
        $customer_valid =true;
    }

    if($amount_valid && $customer_valid){
    
        $insertquery = "INSERT INTO transactions1(Transferer,Receiver,Amount)
                        VALUES ('$customer1','$customer2','$amount')";

        $rst=mysqli_query($conn1,$insertquery);

        if($rst){
            echo "<p style='font-size: 50px;'>Transaction successful!!</p>";
        }

        }
    }
?>


<?php

$con = mysqli_connect('localhost','root','','customer');

if(isset($_POST['submit'])){

    if($amount_valid && $customer_valid){

        $query_from =" UPDATE customers SET Balance = Balance-$transaction where Balance=$transfer_amount";

        $query1 = mysqli_query($con,$query_from);

        $query_to = "UPDATE customers SET Balance = Balance+$transaction where Balance=$Receiver_amount";
        
        $query2 = mysqli_query($con,$query_to);

    }
}
?>