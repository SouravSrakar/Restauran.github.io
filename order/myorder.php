<?php
include("dbconnection.php");
session_start();
if(empty($_SESSION['ses_user'])){
  header("Location:../login/index.php");
}
else{
    

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }
        
        h1 {
            text-align: center;
            background-color: #2e7d32;
            color: #fff;
            padding: 20px 0;
            margin: 0;
        }

        #order-list {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #order-list th, #order-list td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        #order-list th {
            background-color: #2e7d32;
            color: #fff;
        }

        .print-button {
            display: block;
            text-align: center;
            margin: 20px 0;
        }

        .print-button button {
            background-color: #2e7d32;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        @media print {
            .print-button {
                display: none;
            }

            body {
                background-color: #fff;
            }
        }
    </style>
</head>
<body>
    <h1>My Orders</h1>

    <table id="order-list">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Invoice</th>
            </tr>
        </thead>
        <tbody>
            <!-- Your order data here -->
            <?php
            $stmt = $con->prepare("select * from order_booking");
            $stmt->execute();
            $products = $stmt->get_result();
            if (!empty($products)){
                foreach($products as $product) {
                    ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['foodname']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td><?php echo $product['price']; ?>    </td>
                <td>
    <?php
    $orderStatus=$product['status'];
    if ($orderStatus !== 'Pending') {
        echo '<a href="invoice.php?id=' . htmlentities($product["id"]) . '">Invoice</a>';
    }
    else
     echo 'Please Wait';
    ?>
</td>
            </tr>
            <?php
    }}
            ?>
            
        </tbody>
    </table>

    <div class="print-button">
        <button onclick="window.print()">Print</button>
        <button onclick="showBilling()">Billing</button>
    </div>
    <script>
        function showBilling(){
            alert("Billing Information will be displayed here.");
        }
        </script>
</body>
</html>
<?php
}
?>