<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create category</title>
    <style>
        label{
            font-weight:bolder;
            font-size:20px;
        }
        form{
            margin: auto;
            width: 60%;
            margin-top: 5%;
            margin-bottom:19%;
        }
    </style>
</head>
<body>
<?php require "header.php"; ?>

<form id="create">
    <div class="form-group">
        <label>Add Category</label><br>
            <input type="text" name="category" id="category" class="form-control" >
    </div>
        <input type="submit" name="submit" value="ADD" class="btn btn-danger" >
 </form>

<?php require "footer.php"; ?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('#create').submit(function(e){
        e.preventDefault();
        let category = $('#category').val();
        if(category=="")
        {
            alert('please fill category');
        }
        else
        {
        $.ajax({
            method:'POST',
            url:'../control.php',
           data:$(this).serialize()+"&action=create",
            success:function(data){
                console.log(data);
                    if(data==1){
                        alert('category not created');
                    }else if(data==2){
                        alert('category created successfull..');
                        window.location.href="admin.php";
                    }
                },
            });
        }
    });
});
</script>