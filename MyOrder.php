<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Now</title>
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="order" id="Order">
        <h1><span>Order</span>Now</h1>

        <div class="order_main">

            <div class="order_image">
                <img src="order_image.png">
            </div>

            <form action="MyOrder.php" method="POST" name="Form">

                <div class="input">
                    <p>Name</p>
                    <input type="text" placeholder="Enter name" name="Name">
                </div>

                <div class="input">
                    <p>Email</p>
                    <input type="email" placeholder="Enter email" name = "email">
                </div>

                <div class="input">
                    <p>Number</p>
                    <input placeholder="Enter number" name= "phone">
                </div>

                <div class="input">
                    <p>How Much</p>
                    <input type="number" placeholder="how many order" name="qty">
                </div>

                <div class="input">
                    <p>You Order</p>
                    <input placeholder="Enter food item" name="item">
                </div>

                <div class="input">
                    <p>Address</p>
                    <input placeholder="Enter Address" name="address">
                </div>

                <input type="submit" value="Order Now" name="order" class="order_btn">               
            </form>
            
        </div>

    </div>
</body>

</html>

<?php
if (isset($_POST['order'])) {
    $con = mysqli_connect("localhost", "root", "", "git");
    if ($con) {
        $name = mysqli_real_escape_string($con, $_POST['Name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $qty = mysqli_real_escape_string($con, $_POST['qty']);
        $item = mysqli_real_escape_string($con, $_POST['item']);
        $add = mysqli_real_escape_string($con, $_POST['address']);

        $sql = "INSERT INTO myorder(Name, Email, Phone, Qty, ItemName, Address) VALUES ('$name', '$email', '$phone', '$qty', '$item', '$add')";

        if (mysqli_query($con, $sql)) {
            mysqli_close($con);
            header("Location: order1.php?name=$name");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Connection failed: " . mysqli_connect_error();
    }
}
?>
