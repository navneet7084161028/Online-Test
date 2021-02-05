<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        form{
            margin: auto;
            width: 60%;
            margin-top: 3%;
        }
    </style>
</head>
<body>
<?php require "header.php"; ?>
<div class="container-fluid">
    <form id="Signup">
        <div class="form-group">
            <label>Enter-Email</label><br>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label>Enter-Name</label><br>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label>Number</label><br>
            <input type="number" class="form-control" id="number" name="number" >
        </div>

        <div class="form-group">
            <label>password</label><br>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <div>
        <input type="submit" name="submit" class="btn btn-success form-control" value="SignUp">
        </div>  
    </form>
</div>
</div>
<?php require "footer.php"; ?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('#Signup').submit(function(e){
        e.preventDefault();
        let email = $('#email').val();
        let name = $('#name').val();
        let number = $('#number').val();
        let password = $('#password').val();
        if(email=="" || name=="" || number=="" || password==""){
            alert('Please fill all fields');
        }else{
        $.ajax({
            method:'POST',
            url:'control.php',
            data:$(this).serialize()+"&action=insert",
            success:function(data){
                console.log(data);
                    if(data == 1){
                        alert('error occured');
                    }else if(data == 2){
                        alert('success');
                        window.location.href="login.php";
                    }
                },
            });
        };
    });
});
</script>