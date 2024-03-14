<?php
include 'header.php';
if (!isset($_SESSION['sloggedin'])) {
    // Redirect to the login page
    header("location: slogin.php");
    exit; // Exit script to prevent further execution
}

// Assuming you have already established a database connection

// Define the specific student's email
$specific_student_email = $_SESSION['sloggedin'];

// SQL query to select student data
$sql = "SELECT * FROM courcebooking WHERE semlid = '$specific_student_email'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
    // Display the table headers
    echo "<div class='container mt-5'>&nbsp;&nbsp";
    echo "<table class='table table-bordered'>";
    echo "<thead class='thead-dark'><tr><th>Course ID</th><th>Email</th><th>Library ID</th><th>Course Name</th><th>Apply Date</th><th>Fee</th><th>Duration</th></tr></thead>";
    echo "<tbody>";

    // Fetch and display each row of the result
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["cource_id"] . "</td>";
       
        echo "<td>" . $row["semail"] . "</td>";
        echo "<td>" . $row["semlid"] . "</td>";
        echo "<td>" . $row["courcename"] . "</td>";
        echo "<td>" . $row["apply_date"] . "</td>";
        echo "<td>" . $row["fee"] . "</td>";
        echo "<td>" . $row["duration"] . "</td>";
        echo "</tr>";
    }

    // Close the table
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "No records found";
}

// Close the database connection
mysqli_close($conn);
?>
