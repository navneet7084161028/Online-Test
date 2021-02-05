<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form{
            margin: auto;
            width: 60%;
            margin-top: 3%;
        }
        .div1{
            margin:auto;
            width:60%;
            margin-top:1%;
            text-decoration:none;
        }
    </style>
</head>
<body>
<?php require "header.php"; ?>
<form id="Login">
    <div class="form-group">
        <label>Email</label><br>
            <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label>Password</label><br>
            <input type="password" class="form-control" id="password" name="password">
    </div>
    <input type="submit" name="submit" class="btn btn-danger form-control" value="Login"> 
</form>

<div class="div1">
    <a href="register.php">Register Here....</a>
</div>
 <?php require "footer.php"; ?>   
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('#Login').submit(function(e){
        e.preventDefault();
        let email = $('#email').val();
        let password = $('#password').val();
        if(email=="" || password=="")
        {
            alert("Both field are mandatory");
        }
        else
        {
            $.ajax({
                method:'POST',
                url:'control.php',
                data:$(this).serialize()+"&action=show",
                success:function(data)
                {
                    console.log(data);
                        if(data==1)
                        {
                            alert('wrong username and password');
                        }
                        else if(data==2)
                        {
                            alert('Welcome Admin');
                            window.location.href="admin/index.php";
                        }
                        else if(data==3)
                        {
                            alert('welcome user');
                            window.location.href="user/index.php";
                        }
                },
            });
        }
    });
});
</script>