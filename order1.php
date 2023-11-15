<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link rel="stylesheet" href="order1.css">
    
</head>

<body>

    <h1>YOUR ORDER IS : </h1>
    <div class="order">
        <?php
        $con = mysqli_connect("localhost", "root", "", "git");
        if ($con) {
            $nameToFetch = mysqli_real_escape_string($con, $_GET['name']);

            $sql = "SELECT * FROM myorder WHERE Name='$nameToFetch'";
            $result = mysqli_query($con, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Qty</th>
                                <th>ItemName</th>
                                <th>Address</th>
                            </tr>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $row['Name'] . "</td>
                                <td>" . $row['Email'] . "</td>
                                <td>" . $row['Phone'] . "</td>
                                <td>" . $row['Qty'] . "</td>
                                <td>" . $row['ItemName'] . "</td>
                                <td>" . $row['Address'] . "</td>
                            </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No records found for the given name.";
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_close($con);
        } else {
            echo "Connection failed: " . mysqli_connect_error();
        }
        echo "<p>Thank You <br>Visit Again!</p>"
        ?>
    </div>
    
</body>

</html>
