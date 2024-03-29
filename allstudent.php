<?php 
      include 'header.php';
      if (!isset($_SESSION['loggedin'])) {
        // Redirect to the login page
        header("location: admin login.php");
        exit;
    } ?>
   <?php
// Database connection


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch data from reg_student table
$sql = "SELECT * FROM reg_student";
$result = $conn->query($sql);

if(isset($_POST['cid'])){
    $cid = $_POST['cid'];
    $sql = "DELETE FROM reg_student WHERE cid='$cid'";
    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
  }
// Close connection
$conn->close();
?>
<style>
    .table tbody td {
        vertical-align: middle;
    }
   

</style>
<div>
    <h1>&nbsp  </h1>
    <h1>  &nbsp</h1>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Student Registration</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                   
                        <table class="table table-sm mx-auto">
                            <thead>
                                <tr>
                                    
                                    <th>image</th>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Semester</th>
                                    <th>Department</th>
                                    <th>LID</th>
                                    <th>CID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if ($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>"; ?><img src="<?php echo $row["photo"]; ?> " height="100" width="100" alt=""> <?php echo "</td>";
                                    echo "<td>" . $row["cid"] . "</td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["gender"] . "</td>";
                                    echo "<td>" . $row["address"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["phone"] . "</td>";
                                    echo "<td>" . $row["sem"] . "</td>";
                                    echo "<td>" . $row["dept"] . "</td>";
                                    echo "<td>" . $row["lid"] . "</td>";
                                    echo "<td>" . $row["rdate"] . "</td>";
                                    echo "<td><button class='btn btn-danger delete-btn' data-id='" . $row["cid"] . "'>Delete</button></td>";
                                    echo "</tr>";
                                  }
                                } else {
                                  echo "0 results";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  $('.delete-btn').click(function(){
    var cid = $(this).data('id');
    $.ajax({
      url: 'delete.php',
      method: 'post',
      data: {cid: cid},
      success: function(response){
        alert('Data deleted successfully');
        location.reload();
      }
    });
  });
});
</script>
