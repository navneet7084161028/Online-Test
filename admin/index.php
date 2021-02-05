<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdmindashBoard</title>
    <style>
       #d1{
           background-image:url('https://thumbs.dreamstime.com/b/student-passing-online-exam-home-student-passing-online-exam-home-closeup-181815762.jpg');
           background-size:cover;
           background-position: center;
           background-repeat: no-repeat;
           width: 100%;
           height:68vh;
       }
       .container-fluid{
           padding-top:80px;
       }
       .bt{
            margin:auto;
            text-align:center;
            width:100%;

       }
    </style>
</head>
<body>
 <?php require "header.php";?>
 
 <div id="d1" class="container-fluid">


 <div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body bg-info">
        <h5 class="card-title text-center">All User</h5>
        <p class="card-text text-center">With supporting text below as a natural lead-in to additional content.</p>
        <a href="alluser.php" class="btn bt btn-outline-warning">All User</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body bg-info">
        <h5 class="card-title text-center">Add Questions</h5>
        <p class="card-text text-center">With supporting text below as a natural lead-in to additional content.</p>
        <a href="admin.php" class="btn bt btn-outline-warning">Add Question</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body bg-info">
        <h5 class="card-title text-center">Add Category</h5>
        <p class="card-text text-center">With supporting text below as a natural lead-in to additional content.</p>
        <a href="category.php" class="btn bt btn-outline-warning">Add category</a>
      </div>
    </div>
  </div>
</div>
 </div>
 <?php require "footer.php"; ?>
</body>
</html>