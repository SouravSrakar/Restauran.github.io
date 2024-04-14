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
    <title>Invoice Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .address {
            margin-top: 20px;
        }

        .invoice-details {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Invoice</h1>
    </header>

    <div class="container">
        <div class="address">
            
            <h2>Billing Address:</h2>
            <p>
            <?php
            $id=$_GET['id'];
        $sql = "SELECT address,town,state,postcode,number FROM order_booking where id='$id'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "Address: " . $row["address"] . "<br>";
                echo "City: " . $row["town"] . "<br>";
                echo "State: " . $row["state"] . "<br>";
                echo "PostCode: " . $row["postcode"] . "<br>";
                echo "Phone: " . $row["number"] . "<br>";
                echo "<br>";
            }
        }

        ?>
            </p>
        </div>

        <div class="invoice-details">
            <h2>Invoice Details:</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT ob.foodname, ob.quantity, ob.price, f.des
        FROM order_booking AS ob
        INNER JOIN food AS f ON ob.foodname = f.Foodname
        WHERE ob.id = $id";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $total = 0;
            
        ?>
                   
                
                    <tr>
                        <?php
                    while ($row = $result->fetch_assoc()) {
        ?>
                        <td><?php echo $row["foodname"]; ?></td>
                        <td><?php echo $row["des"];?></td>
                        <td><?php echo $row["quantity"];?></td>
                        <td><?php echo $row["price"]?></td>
                        <?php
                        $line_total = $row["quantity"] * $row["price"];
                        
                        echo "<td>$line_total</td>";
                        $total += $line_total;
            }
        }
                        ?>
                    </tr>
                   

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php
}
?>