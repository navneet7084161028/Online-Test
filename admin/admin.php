<?php
 require "../model.php";
 $user = new Model();

 $data = $user->display_Category();
//  print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    <style>
        form{
            margin:auto;
            width:60%;
            margin-top:3%;
        }
    </style>
</head>
<body>
<?php require "header.php"; ?>

<form id="addData">
    <div class="form-group">
        <label>Choose Category</label><br>
            <select class="form-control" name="select" id="select">
                <option>Choose</option>
                    <?php
                        foreach($data as $key => $value)
                        {
                            foreach($value as $key => $value1)
                            {
                                if($key!='topic_id')
                                {
                                    echo "<option value='$value1'>$value1</option>";
                                }
                            }
                        }
                    ?>
            </select>
    </div>
    <div class="form-group">
        <label>Add Question</label>
            <input type="text" name="question" id="question" class="form-control">
    </div>

    <div class="form-group">
        <label>Option 1</label>
            <input type="text" name="ans1" id="ans1" class="form-control">
    </div>

    <div class="form-group">
        <label>Option 2</label>
            <input type="text" name="ans2" id="ans2" class="form-control">
    </div>

    <div class="form-group">
        <label>Option 3</label>
            <input type="text" name="ans3" id="ans3" class="form-control">
    </div>

    <div class="form-group">
        <label>Option 4</label>
            <input type="text" name="ans4" id="ans4" class="form-control">
    </div>

    <div class="form-group">
        <label>Correct Answer</label>
            <input type="text" name="answer" id="answer" class="form-control">
    </div>
        <input type="submit" name="submit" value="Create Category" class="btn btn-info form-control">
</form>
<?php require "footer.php"; ?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('#addData').submit(function(e){
        e.preventDefault();
        let question = $('#question').val();
        let ans1 = $('#ans1').val();
        let ans2 = $('#ans2').val();
        let ans3 = $('#ans3').val();
        let ans4 = $('#ans4').val();
        let answer = $('#answer').val();
        if(question=="" || ans1=="" || ans2=="" || ans3=="" || ans4=="" || answer=="")
        {
            alert('all fields are mandatory');
        }
        else
        {
       $.ajax({
           method:'POST',
           url:'../control.php',
           data:$(this).serialize()+"&action=add_Question",
           success:function(data){
               console.log(data);
                if(data==1)
                {
                    alert('question not created');
                }
                else if(data==2)
                {
                    alert('question created successfully');
                    location.reload();
                }
            },
         });
       }
    });
});

</script>