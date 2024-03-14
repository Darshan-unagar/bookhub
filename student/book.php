<?php 
    include 'header.php';
    if (!isset($_SESSION['sloggedin'])) {
        // Redirect to the login page
        header("location: slogin.php");
        exit;
    } 

    // Fetch data from books table
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);
?>

<section class="content" style=" background-image: url('2.jpg');">
    <div class="container-fluid" >
        <div class="row" >
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-3">
    <div class="card mb-3" style="width:220px;" >
   
        <div class="card-body" style="height: 260px;">
       
                        <img class="card-img-top" src="./bimg/<?php echo $row['img']; ?>" alt="Book Image" style="width: 180px; height:220px">
                 </div>
        <div class="card-footer">
       
            <p class="card-text">Name: <?php echo $row['name']; ?></p>
            <p class="card-text">Price: <?php echo $row['price']; ?></p> 
             <button type="button" class="btn btn-success"><a href="checkout.php?bookid=<?php echo $row['bookid']; ?>&name=<?php echo urlencode($row['name']); ?>&categories=<?php echo urlencode($row['categories']); ?>&img=<?php echo $row['img']; ?>&price=<?php echo $row['price']; ?>&authorname=<?php echo $row['authorname']; ?>" style="color: #ffff;">Purchase</a></button>
        </div>
    </div>
</div>

            <?php
                }
            } else {
                echo "<div class='col-md-12'><p class='text-center'>No books available.</p></div>";
            }
            ?>
        </div>
    </div>
</section>
