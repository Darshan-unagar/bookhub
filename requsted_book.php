<?php 
include 'header.php';
if (!isset($_SESSION['loggedin'])) {
    // Redirect to the login page
    header("location: admin login.php");
    exit;
}

$res3 = mysqli_query($conn, "SELECT * FROM book_requests WHERE `key`='n'");
$knot = mysqli_num_rows($res3);
$status = ($knot > 0) ? "New" : "";

if ($knot > 0) {
    mysqli_query($conn, "UPDATE book_requests SET `key` = 'y'");
}

$sql = "SELECT * FROM book_requests";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Book Requests</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body  >
    <div><h1>&nbsp</h1></div>
    <div class="container">
        <h2 class="mb-4">Book Requests</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID <?php echo $status; ?></th>
                        <th>Student Name</th>
                        <th>LID</th>
                        <th>Email</th>
                        <th>Book Name</th>
                        <th>Author Name</th>
                        <th>Book URL</th>
                        <th>Date Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row["id"] . '</td>';
                        echo '<td>' . $row["student_name"] . '</td>';
                        echo '<td>' . $row["lid"] . '</td>';
                        echo '<td>' . $row["email"] . '</td>';
                        echo '<td>' . $row["book_name"] . '</td>';
                        echo '<td>' . $row["author_name"] . '</td>';
                        echo '<td>' . $row["book_url"] . '</td>';
                        echo '<td>' . $row["date_created"] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <a href="msg.php" class="btn btn-primary">Message</a>
        </div>
    </div>
</body>
</html>
