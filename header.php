<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>header</title>
    <style>
      h2{
        padding:10px;
        font-weight: 700;
      }
      .faa{
        color: white;
        font-weight: 700;
        font-size: 200%;
      }
      .s1{
        font-size: 72px;
         background: -webkit-linear-gradient(teal, rgb(88, 88, 206));
          -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-left:3%;
      }
      .s2{
        font-size: 72px;
         background: -webkit-linear-gradient(cyan, rgb(88, 88, 206));
          -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }
      .sess{
        float:right;
        margin-right:10%;
        padding-top:15px;
        color:white;
      }
      .ses{
        float:right;
        margin-right:5%;
        padding-top:15px;
      }
      li{
        list-style-type: none;
      }
      #register{
        float:right;
        margin-right:2%;
        padding-top:15px;
      }
      a:hover{
        text-decoration:none;
      }
      header.sticky{
        position: -webkit-sticky;
        position: sticky;
        top:0;
        width: 100%;
        background-color:black;
        opacity:1;
        z-index:10;
        padding:1px;
      }
    </style>
</head>
<body>
<header class="sticky">
<h2><span><a href="index.php"><i class="fa faa fa-free-code-camp" aria-hidden="true"></i></a></span><span class="s1">Online</span><span class="s2">Test</span>

<span class="sess">  
<?php 
  if( isset($_SESSION['user'])){
    header('location:user/index.php');
}else if(isset($_SESSION['admin'])){
    header('location:admin/index.php');
}
?>
  </span><span class="ses">
    <a href="login.php" class="btn btn-outline-warning">Login</a>
</span>
<span id="register"><a href="register.php" class='btn btn-outline-success'>Register</a></span>
</h2>
</header>
</body>
</html>