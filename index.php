<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    $productName = "Facebook Course";
    $productDescription = "The best course in Egypt";

    $clientName = $_POST["name"];
    $clientMobile = $_POST["mobile"];
    $clientCity = $_POST["city"];

    $orderSubject = "New Order: $productName";
    $orderMessage = "Product: $productName\nDescription: $productDescription\nClient Name: $clientName\nMobile: $clientMobile\nCity: $clientCity";

    $to = "example@gmail.com";
    $subject = $orderSubject;
    $message = $orderMessage;
    $headers = "From: ossamadarouiche@gmail.com";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        $successMessage = "Your order has been successfully submitted!";
    } else {
        $errorMessage = "Failed to send the order. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Course</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: white; /* Set background color to white */
        }
    </style>
</head>
<body>
    <header class="black-nav">
        <!-- Your logo and navigation here -->
        <!-- Adjust styling based on your requirements -->
    </header>

    <div class="product-container">
        <!-- Product details -->
        <div class="product-info" style="width: 60%;">
            <h1><?php echo $productName; ?></h1>
            <p><?php echo $productDescription; ?></p>
            <p>Before: 1000 L.E | After Offer: 800 L.E</p>
        </div>

        <!-- Image slider (you can use a library like Slick for this) -->
        <div class="image-slider">
            <!-- Left and right image slides -->
            <!-- Adjust styling based on your requirements -->
            <img src="1.jpg" alt="Image 1">
            <img src="2.jpg" alt="Image 2">
        </div>
    </div>

    <?php if (isset($successMessage)): ?>
        <div class="success-message" style="color: red;">
            <?php echo $successMessage; ?>
        </div>
        <script>
            setTimeout(function () {
                location.reload();
            }, 5000); // Refresh page after 5 seconds
        </script>
    <?php endif; ?>

    <!-- Order form -->
    <div class="order-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" required>

            <label for="city">City:</label>
            <input type="text" name="city" required>

            <button type="submit">Order Now</button>
        </form>
    </div>

    <script>
        // Add any additional scripts or styling for the image slider and form here
    </script>
</body>
</html>
