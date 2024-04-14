<!DOCTYPE html>
<html>
<head>
    <title>Admin Feedback Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        a {
            display: block;
            text-align: center;
            margin: 20px;
            text-decoration: none;
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Feedback Page</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>
        <?php
        // Database connection parameters
        include("dbconnection.php");

        // Fetch feedback data from the database
        $sql = "SELECT * FROM feedback";
        $result = $con->query($sql);

        // Display feedback data in a table
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "</tr>";
        }

        // Close the database connection
        $con->close();
        ?>
    </table>

    <a href="fooddisplay.php">HOME</a>
</body>
</html>
