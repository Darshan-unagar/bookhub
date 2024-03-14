<?php include 'inc/config.php';
      include 'header.php';
      if (!isset($_SESSION['loggedin'])) {
        // Redirect to the login page
        header("location: admin login.php");
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

    $result1 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM course");
    $row1 = mysqli_fetch_assoc($result1);
    $totalcourse = $row1['total'];

    $result2 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders");
    $row2 = mysqli_fetch_assoc($result2);
    $totalorders = $row2['total'];

    $result3 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM courcebooking");
    $row3 = mysqli_fetch_assoc($result3);
    $cb = $row3['total'];

    $result3 = mysqli_query($conn, "SELECT SUM(amount) AS total_amount FROM finerecod;");
    $row3 = mysqli_fetch_assoc($result3);
    $fine = $row3['total_amount'];

    $result4 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM books");
    $row4 = mysqli_fetch_assoc($result4);
    $books = $row4['total'];

    $result5 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM book_requests");
    $row5 = mysqli_fetch_assoc($result5);
    $rb = $row5['total'];

    $result6 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM issuedbook");
    $row6 = mysqli_fetch_assoc($result6);
    $eb = $row6['total'];
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
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-laptop-code"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Courses</span>
                <span class="info-box-number"><?php echo $totalcourse;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Books sold</span>
                <span class="info-box-number"><?php echo $totalorders;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Student pursing course </span>
                <span class="info-box-number"><?php echo $cb;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>



          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-rupee-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total fine</span>
                <span class="info-box-number"><?php echo $fine;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total books</span>
                <span class="info-box-number"><?php echo $books;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Requested books</span>
                <span class="info-box-number"><?php echo $rb;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Issued books</span>
                <span class="info-box-number"><?php echo $eb;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>