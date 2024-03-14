<?php
include 'header.php';
if (!isset($_SESSION['loggedin'])) {
    // Redirect to the login page
    header("location: admin login.php");
    
}



// Fetch course bookings from the database
$sql = "SELECT * FROM courcebooking";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Course Bookings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="mt-4 mb-4">Course Bookings</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Course Name</th>
                <th>Apply Date</th>
                <th>Fee</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["cource_id"] . "</td>";
                    echo "<td>" . $row["sname"] . "</td>";
                    echo "<td>" . $row["semail"] . "</td>";
                    echo "<td>" . $row["courcename"] . "</td>";
                    echo "<td>" . $row["apply_date"] . "</td>";
                    echo "<td>" . $row["fee"] . "</td>";
                    echo "<td>" . $row["duration"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No course bookings found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
