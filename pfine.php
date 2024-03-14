<?php 
    include 'header.php';
    if (!isset($_SESSION['loggedin'])) {
        // Redirect to the login page
        header("location: admin login.php");
        exit;
    } 

  
    
    // Fetch data from pfine table
    $sql = "SELECT * FROM pfine";
    $result = $conn->query($sql);
    
    if (isset($_POST['delete_confirm'])) {
        $id = $_POST['delete_id'];
    
        // Retrieve data before deletion
        $delete_sql = "SELECT * FROM pfine WHERE id='$id'";
        $delete_result = $conn->query($delete_sql);
        
        if ($delete_result && $row = $delete_result->fetch_assoc()) {
            // Insert data into finerecod table
            $insert_sql = "INSERT INTO finerecod (bookid, student_name, library_id, email, phone, issued_date, return_date, fine_date, amount, paydate) 
                            VALUES ('" . $row["bookid"] . "', '" . $row["student_name"] . "', '" . $row["library_id"] . "', 
                                    '" . $row["email"] . "', '" . $row["phone"] . "', '" . $row["issued_date"] . "', '" . $row["return_date"] . "',
                                    '" . $row["fine_date"] . "', '" . $row["amount"] . "', CURDATE())";
    
            if ($conn->query($insert_sql) === TRUE) {
                // Delete data from pfine table
                $delete_sql = "DELETE FROM pfine WHERE id='$id'";
                if ($conn->query($delete_sql) === TRUE) {
                    echo "<script>alert('Data moved successfully!');</script>";
                } else {
                    echo "<script>alert('Error moving data: " . $conn->error . "');</script>";
                }
            } else {
                echo "<script>alert('Error inserting data: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Error retrieving data: " . $conn->error . "');</script>";
        }
    }
    ?>
    <style>
        .table tbody td {
            vertical-align: middle;
        }
    </style>
    <div>
        <h1>&nbsp;</h1>
        <h1>&nbsp;</h1>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Student Registration</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-sm mx-auto">
                                <thead>
                                    <tr>
                                        <th>Book id</th>
                                        <th>Student name</th>
                                        <th>Library id</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Issued date</th>
                                        <th>Return date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["bookid"] . "</td>";
                                            echo "<td>" . $row["student_name"] . "</td>";
                                            echo "<td>" . $row["library_id"] . "</td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["phone"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["return_date"] . "</td>";
                                            echo "<td>
                                                    <form method='post'>
                                                        <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                                        <button type='submit' name='delete_confirm' class='btn btn-success'>OK</button>
                                                    </form>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    