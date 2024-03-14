<?php 
session_start();
include 'header.php';
if (!isset($_SESSION['loggedin'])) {
    // Redirect to the login page
    header("location: admin login.php");
    exit;
} 


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the 'orders' table
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

$totalPrice = 0;
$totalRows = $result->num_rows; // Get the total number of rows

// Check if any rows were returned
if ($totalRows > 0) {
    echo '<div class="container mt-5">';
    echo '<table class="table table-bordered">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th>Order ID</th>';
    echo '<th>Book ID</th>';
    // echo '<th>Payment ID</th>';
    echo '<th>Date</th>';
    echo '<th>Student Name</th>';
    echo '<th>LID</th>';
    echo '<th>Address</th>';
    echo '<th>Contact</th>';
    // echo '<th>Email</th>';
    echo '<th>Book Name</th>';
    echo '<th>Author Name</th>';
    echo '<th>Price</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["order_id"] . "</td>";
        echo "<td>" . $row["product_id"] . "</td>";
        // echo "<td>" . $row["payment_id"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["studentname"] . "</td>";
        echo "<td>" . $row["lid"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["contact"] . "</td>";
        // echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["bookname"] . "</td>";
        echo "<td>" . $row["author"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "</tr>";
        // Accumulate total price
        $totalPrice += $row["price"];
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    // Display total price and total number of rows with animation
    echo '<div class="container mt-3">';
    echo '<h5 class="text-success font-weight-bold mb-4">Total Book Selling Info</h5>';
    echo '<p class="text-info font-weight-bold animated fadeInUp">Total Number of Books Sold: ' . $totalRows . '</p>';
    echo '<p class="text-primary font-weight-bold animated fadeInUp">Total Price: &#8377;' . number_format($totalPrice, 2) . '</p>'; // '&#8377;' is the Rupee symbol
    echo '</div>';
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
