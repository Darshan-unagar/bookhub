<?php include 'config.php';
      include 'header.php';
      if (!isset($_SESSION['sloggedin'])) {
        // Redirect to the login page
        header("location: slogin.php");
        exit;
    } ?>
  <section class="content" style="margin: 8px;">
<div >  
 <div>
    <h1>&nbsp  </h1>
    
</div>  
    
<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <?php
     
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM reg_student");
    $row = mysqli_fetch_assoc($result);
    $totalStudents = $row['total'];
?>
<div class="info-box-content">
   <span class="info-box-text">Student</span>
    <span class="info-box-number">
        <?php echo $totalStudents; ?>
        
    </span>
</div>

              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <?php
          $specific_student_email = $_SESSION['sloggedin'];
          $sql = "SELECT * FROM attendance WHERE student_id = '$specific_student_email'";

          // Execute the query
          $result = mysqli_query($conn, $sql);
          
          // Initialize variables to count total attendance records and present records
          $totalRecords = 0;
          $presentRecords = 0;
          
          // Check if there are any records
          if (mysqli_num_rows($result) > 0) {
              // Loop through each row of the result
              while ($row = mysqli_fetch_assoc($result)) {
                  // Increment the total records count
                  $totalRecords++;
                  
                  // Check if the status is 'present'
                  if ($row["status"] == "present") {
                      // If present, increment the present records count
                      $presentRecords++;
                  }
              }
            }
              // Calculate the attendance percentage
              $attendancePercentage = ($totalRecords > 0) ? (($presentRecords / $totalRecords) * 100) : 0;
          
          
          ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Attendence</span>
                <?php echo "<span class='info-box-number'>" . number_format($attendancePercentage, 2) . "%</span>";?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
            /.info-box-content -->
            <!-- </div>
            /.info-box -->
          <!-- </div>   -->




          <!-- /.col -->


          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->
        <!-- </div> -->
        <!-- /.row -->
        <!-- </div> -->