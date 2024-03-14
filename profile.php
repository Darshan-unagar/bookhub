<?php
include 'inc/config.php';
include 'header.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin_login.php");
    exit;
}

// Fetch user information based on username
$username = $_SESSION['loggedin'];
$sql = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Handle form submission for updating user information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // Handle file upload
    $photo = $_FILES["photo"]["name"];
    $temp_name = $_FILES["photo"]["tmp_name"];
    $target_dir = "bimg/";
    $target_file = $target_dir . basename($photo);

    // Move the uploaded file to the specified directory
    
        // File uploaded successfully, now update the database with the new profile information
        $sql = "UPDATE faculty SET name='$name', mobile='$phone', email='$email', photo='$target_file' WHERE fid='$username'";
        if (mysqli_query($conn, $sql)) {
  
echo '<script>alert("PROFILE UPDATE SUCESSFULLY");</script>';


            echo '<script type="text/javascript">window.location="profile.php";</script>';

            exit;
        } else {
            // Error updating profile
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Failed to upload file
        echo " ";
    }

?>

<!-- Your HTML and profile display code here -->



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div>
    <h1>&nbsp;</h1>
    </div>
    <div class="wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 mx-auto"> <!-- Added mx-auto class for centering -->
                    
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
     src="<?php echo $row['photo']; ?>"
     alt="User profile picture"
     style="width: 150px; height: 150px;">

                                </div>
                             
                               
                                <ul class="list-group list-group-unbordered mb-3">
                                <div class="card-header">
    <h3 class="card-title">User Profile</h3>
</div>
<div class="card-body">
    

    

    <ul class="list-group list-group-unbordered mb-3">
        
        <li class="list-group-item">
        <strong><i class="fas fa-user mr-1"></i> Name</strong>
    <p class="text-muted"><?php echo $row['name']; ?></p>
        </li>
        <li class="list-group-item">
            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
            <p class="text-muted"><?php echo $row['email']; ?></p>
        </li>
        <li class="list-group-item">
            <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
            <p class="text-muted"><?php echo $row['phone']; ?></p>
        </li>
       
    </ul>

    <hr>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
        Edit Profile
    </button>
</div>

                               
    </div>
</body>

</body>

    <!-- Main content -->
  

                        <!-- Modal -->
                        <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Your edit profile form here -->
                                        <form action="profile.php" method="POST" enctype="multipart/form-data">
    <!-- Add your form fields for editing profile here -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
    </div>
    <!-- <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
    </div> -->
    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control-file" id="photo" name="photo" >
    </div>
    <!-- Add other fields as needed -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  </div>
</div>
</body>
</html>
