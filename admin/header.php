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
        padding-top:15px;
        color:white;
      }
      .ses{
        float:right;
        margin-right:2%;
        padding-top:18px;
        color:white;
      }
      li{
        list-style-type: none;
      }
      .ull{
        float:right;
        padding-top:18px;
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
<h2>
  <span><i class="fa faa fa-free-code-camp" aria-hidden="true"></i></span><span class="s1">Online</span><span class="s2">Test</span>
    <span class="sess">Hiiii  
      <?php 
        if( !isset($_SESSION['admin'])){
          header('location:../login.php');
        }
        else
        {
          echo $_SESSION['admin'];
        }
      ?>
      </span><span class="ses">
          <?php 	
              if( !isset($_SESSION["admin"]))
            {
						    echo "<li><a href='login.php' class='btn btn-outline-success'>Login</a></li>";		
            }
            else
            {
					      echo "<li><a href='../logout.php' class='btn btn-outline-danger'>Logout</a></li>";
				    }
	        ?>
        </span>
        <span class="ull">
            <ul>
                <li>
                    <a href="index.php" class="btn btn-outline-info" >Home</a>&nbsp;
                    <a href="category.php" class="btn btn-outline-primary" >Add Category</a>&nbsp;
                    <a href="admin.php" class="btn btn-outline-warning" >Add Question</a>&nbsp;&nbsp;
                </li>
            </ul>
        </span>
</h2>
</header>
</body>
</html>
