<?php
include("dbconnection.php");
if(isset($_GET['delid']))
{
    $rid=intval($_GET['delid']);
    $sql=mysqli_query($con,"delete from order_booking where id=$rid");
    echo "<script>alert('Data deleted');</script>"; 
    echo "<script>window.location.href = 'ordered.php'</script>"; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard - User Orders</title>
    <style>
        /* Style for the "HOME" button */
        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a.button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard - User Orders</h1>
    </header>
    <section class="filters">
        <!-- ... Your filters section ... -->
    </section>
    <section class="orders">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Foodname</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ret=mysqli_query($con,"select * from order_booking");
                $row=mysqli_num_rows($ret);
                if($row>0){
                    while ($row=mysqli_fetch_array($ret)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['foodname']?></td>
                            <td><?php echo $row['quantity']?></td>
                            <td><?php echo $row['price']?></td>
                            <td><?php echo $row['address']?></td>
                            <?php
                            $date=$row['date_vulue'];
                            ?>
                            <td><?php echo $date?></td>
                            <td><?php echo $row['status']?></td>
                            <td>
                                <form method="post" action="update.php">
                                    <select name="newStatus">
                                        <option value="pending">Pending</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="out of stock">Out of stock</option>
                                    </select>
                                    <input type="hidden" name="orderID" value="<?php echo $row['id']; ?>">
                                    <button type="submit">Change Status</button>
                                </form>
                                <a href="ordered.php?delid=<?php echo $row['id']; ?>"><button class="delete-button">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                }
                else {
                    echo "No results found.";
                }
                ?>
                <!-- Add more rows here -->
            </tbody>
        </table>
    </section>
    <a href="fooddisplay.php" class="button">HOME</a>
    <nav class="pagination">
        <button>Previous</button>
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <button>Next</button>
    </nav>
</body>
</html>
